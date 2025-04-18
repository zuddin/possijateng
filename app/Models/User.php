<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable  implements FilamentUser
{
    use HasFactory, Notifiable;

    public const ROLE_ADMIN = 'admin';
    public const ROLE_PENGKABPENGKOT = 'pengkabpengkot';
    public const ROLE_CLUB = 'club';
    public const ROLE_ATLET = 'atlet';

    protected $fillable = [
        'created_by',
        'name',
        'email',
        'password',
        'role',
        'alamat',
        'notelp',
        'nik',
        'nama_ibu',
        'nama_ayah',
        'nias',
        'tanggal_lahir',
        'asal_sekolah_instansi',
        'jenis_kelamin',
        'pengkabpengkot',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function pengkabPengkotUser()
    {
        return $this->belongsTo(User::class, 'pengkabpengkot');
    }
    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

}
