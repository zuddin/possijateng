<?php

namespace App\Livewire\Web\Home;

use App\Models\Slider;
use App\Models\Event;
use App\Models\NomorPerlombaan;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.web.home.index', [

            //get sliders
            'sliders' => Slider::latest()->get(),
            //get event
            'events' => Event::latest()->get(),
            //get nomor perlombaan
            'nomor_perlombaan' => NomorPerlombaan::latest()->get(),
            

            
        ]);
    }
}