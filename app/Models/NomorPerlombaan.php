<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NomorPerlombaan extends Model
{
    use HasFactory;
    protected $table = 'nomor_perlombaan'; 

    protected $fillable = [
        'event_id',
        'noperlombaan',
        'kelompokumur',
        'kelompok',
        'nomor_acara',
        'waktu_pelaksanaan',
        'jenislomba',
        'biaya_pendaftaran',
        'slug',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    protected static function boot()
    {
        parent::boot();

        // Generate slug before saving
        static::saving(function ($nomorPerlombaan) {
            if (empty($nomorPerlombaan->slug)) {
                $nomorPerlombaan->slug = Str::slug($nomorPerlombaan->noperlombaan);
            }
        });
         
    }
    
}

