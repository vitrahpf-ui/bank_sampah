<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'username', 'password', 'email', 'role', 'no_hp', 'alamat' , 'is_active'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'password' => 'hashed',
        ];
    }

    // role
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isPetugas(): bool
    {
        return $this->role === 'petugas';
    }

    public function isNasabah(): bool
    {
        return $this->role === 'nasabah';
    }

    // relasi
    public function nasabah() 
    {
        return $this->hasOne(Nasabah::class, 'user_id');
    }
    public function setoranDiinput()
    {
        return $this->hasMany(Setoran::class, 'petugas_id');
    }
    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class, 'user_id');
    }
}

    
