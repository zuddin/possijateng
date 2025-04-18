<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Atlet extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'created_by',
        'name',
        'email',
        'password',
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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'tanggal_lahir' => 'date',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function pengkabpengkotUser()
    {
        return $this->belongsTo(User::class, 'pengkabpengkot');
    }
}
