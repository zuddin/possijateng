<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_event',
        'tempat_pelaksanaan',
        'tanggal_mulai',
        'tanggal_akhir',
        'venue_event',
        'slug',
    ];
    public function nomorPerlombaan()
    {
        return $this->hasMany(NomorPerlombaan::class);
    }
    protected static function boot()
    {
        parent::boot();

        // Generate slug before saving
        static::saving(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->nama_event);
            }
        });
    }
}
