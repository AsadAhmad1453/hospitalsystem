<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Contracts\Permission as PermissionContract;
use Spatie\Permission\Traits\HasRoles;

class Permission extends Model implements PermissionContract
{
    use HasFactory, HasRoles;
    
    protected $table = 'permissions';
    protected $guarded = [];
}
