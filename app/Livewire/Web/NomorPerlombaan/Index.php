<?php

namespace App\Livewire\Web\NomorPerlombaan;

use App\Models\NomorPerlombaan;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        //get products
       //get nomor perlombaan


        return view('livewire.web.nomor-perlombaan.index', [
            'nomor_perlombaan' => NomorPerlombaan::latest()->get(),
        ]);
    }
}