<?php

namespace App\Livewire\Web\Cart;

use App\Models\Cart;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        //get carts by customer
        $carts = Cart::query()
            ->with('NomorPerlombaan')
            ->where('atlets_id', auth()->guard('atlet')->user()->id)
            ->latest()
            ->get();

        

        return view('livewire.web.cart.index', compact('carts'));
    }
}