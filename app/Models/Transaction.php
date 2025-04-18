<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'atlets_id',
        'invoice',
        'total',
        'status',
    ];

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
    
    public function atlets()
    {
        return $this->belongsTo(Atlet::class);
    }
}
