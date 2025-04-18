<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transaction_id',
        'nomor_perlombaan_id',
        'catatan_waktu',
        'biaya_pendaftaran',
    ];
    public function nomorPerlombaan()
    {
        return $this->belongsTo(NomorPerlombaan::class, 'nomor_perlombaan_id');
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
