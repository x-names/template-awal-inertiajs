<?php

namespace App\Models;

use App\Traits\Uid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory, Uid;
}
