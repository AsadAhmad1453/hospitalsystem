<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Traits\HasPermissions;

class Role extends SpatieRole
{
    use HasFactory, HasPermissions;
    
    protected $table = 'roles';
    protected $guarded = [];

    // public function users()
    // {
    //     return $this->hasMany(User::class, 'role_id');
    // }


}
