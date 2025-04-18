<?php


namespace App\Livewire\Web\Checkout;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\NomorPerlombaan;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $nomor_perlombaan;
    public $grandTotal;

    public function mount()
    {
        $this->nomor_perlombaan = Cart::with('nomorPerlombaan')
            ->where('atlets_id', Auth::id())
            ->get();

        $this->calculateGrandTotal();
    }

    public function calculateGrandTotal()
    {
        $carts = Cart::with('nomorPerlombaan')
            ->where('atlets_id', Auth::id())
            ->get();

        $this->grandTotal = $carts->sum(function ($cart) {
            return $cart->nomorPerlombaan ? $cart->nomorPerlombaan->biaya_pendaftaran : 0;
        });
    }

    public function render()
    {
        return view('livewire.web.checkout.index');
    }
}
