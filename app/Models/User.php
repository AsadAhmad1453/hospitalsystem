<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'role_id',
    ];

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
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Accessor to get the role name as text
    public function getRoleNameAttribute()
    {
        return $this->role ? $this->role->name : null;
    }

    public function latestActiveRound()
    {
        return $this->hasOneThrough(
            \App\Models\Round::class,
            \App\Models\Patient::class,
            'user_id',        // Foreign key on Patient (points to users table)
            'patient_id',     // Foreign key on Round (points to patients table)
            'id',             // Local key on User
            'id'              // Local key on Patient
        )
        ->where('doctor_status', '1')
        ->where('round_status', '1')
        ->orderBy('token', 'asc');
    }
}
