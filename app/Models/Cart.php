<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    
    protected $fillable = [
        'atlets_id', 'nomor_perlombaan_id', 'catatan_waktu'
    ];
    public function nomorPerlombaan()
    {
        return $this->belongsTo(NomorPerlombaan::class, 'nomor_perlombaan_id');
    }
    public function atlets()
    {
        return $this->belongsTo(Atlet::class, 'atlets_id');
    }
    
}
