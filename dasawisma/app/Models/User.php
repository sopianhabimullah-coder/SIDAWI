<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'rt_id',
        'nomor_rw',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isKader()
    {
        return $this->role === 'kader';
    }

    public function isRt()
    {
        return $this->role === 'rt';
    }

    public function isRw()
    {
    return $this->role === 'rw';
    }

    public function isKepalaDesa()
    {
    return $this->role === 'kepala_desa';
    }

    public function isCamat()
    {
    return $this->role === 'camat';
    }

    public function isReadOnly()
    {
    return in_array($this->role, ['rw', 'kepala_desa', 'camat']);
    }
}
