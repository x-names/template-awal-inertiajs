<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    protected string $avatarPath = 'public/uploads/images/avatars/';

    public function index(): \Inertia\Response
    {
        $search = '%' . request()->get('search') . '%';

        $users = User::with('roles')
            ->when(request()->filled('search'), function ($q) use ($search) {
                $q->where('name', 'like', $search)
                    ->orWhere('email', 'like', $search)
                    ->orWhere('code', 'like', $search)
                    ->orWhere('phone', 'like', $search)
                    ->orWhere('username', 'like', $search);
            })
            ->latest()
            ->simplePaginate();

        return inertia('Users/Index', [
            'total_users' => User::select('id')->count(),
            'users' => $users,
            'filters' => [
                'search' => request()->query('search') ?? '',
                'per_page' => request()->get('per_page') ?? '15'
            ],
        ]);
    }

    public function create(): \Inertia\Response
    {
        return inertia('Users/Create');
    }

    public function store(StoreUserRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        // sementara role & branch dibuat null dulu
        unset($validated['password_confirmation'], $validated['role_id'], $validated['branch_id']);

        if ($request->file('avatar') && $request->file('avatar')->isValid()) {

            $filename = $request->file('avatar')->hashName();

            if (!Storage::disk('local')->exists($this->avatarPath)) {
                Storage::disk('local')->makeDirectory($this->avatarPath);
            }

            Image::make($request->file('avatar')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(storage_path('app/' . $this->avatarPath . $filename));

            $validated['avatar'] = $filename;
        }

        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);

        if (isset($validated['role_id'])) {
            $user->assignRole($validated['role_id']);
        }

        return to_route('users.index')
            ->with('flash', [
                'message' => __('Yeay, pengguna baru telah berhasil ditambahkan.'),
                'type' => 'success',
            ]);
    }

    public function show(User $user): \Inertia\Response
    {
        return inertia('Users/Show', compact('user'));
    }

    public function edit(User $user, Request $request): \Inertia\Response
    {
        return inertia('Users/Edit', compact('user'));
    }

    public function update(User $user, UpdateUserRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        // sementara role & branch dibuat null dulu
        unset($validated['password_confirmation'], $validated['role_id'], $validated['branch_id']);

        if ($request->file('avatar') && $request->file('avatar')->isValid()) {
            $filename = $request->file('avatar')->hashName();

            if (!Storage::disk('local')->exists($this->avatarPath)) {
                Storage::disk('local')->makeDirectory($this->avatarPath);
            }

            Image::make($request->file('avatar')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(storage_path('app/' . $this->avatarPath . $filename));

            if ($user->avatar != null && Storage::disk('local')->exists($oldAvatar = $this->avatarPath . $user->avatar)) {
                Storage::disk('local')->delete($oldAvatar);
            }

            $validated['avatar'] = $filename;
        }

        if ($request->password != null) {
            $validated['password'] = bcrypt($request->password);
        } else {
            $validated['password'] = $user->password;
        }

        $user->update($validated);

        // $user->syncRoles($request->role);

        return to_route('users.index')
            ->with('flash', [
                'message' => __('Yeay, pengguna telah berhasil diubah.'),
                'type' => 'success',
            ]);
    }

    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        if ($user->avatar != null && Storage::disk('local')->exists($oldAvatar = $this->avatarPath . $user->avatar)) {
            Storage::disk('local')->delete($oldAvatar);
        }

        $user->delete();

        return to_route('users.index')
            ->with('flash', [
                'message' => __('Yeay, pengguna telah berhasil dihapus.'),
                'type' => 'success',
            ]);
    }
}
