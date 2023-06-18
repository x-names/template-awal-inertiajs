<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\Uid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Uid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime:d/m/Y H:i:s',
        'created_at' => 'datetime:d/m/Y H:i:s',
        'updated_at' => 'datetime:d/m/Y H:i:s',
        'birth_date' => 'datetime:Y-m-d',
        'password' => 'hashed',
    ];


    /**
     * Interact with the user's avatar.
     */
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value != null ? asset('storage/uploads/images/avatars/' . $value) : "https://www.gravatar.com/avatar/" . md5(strtolower(trim(auth()->user()->email))). "&s=500",
        );
    }
}
