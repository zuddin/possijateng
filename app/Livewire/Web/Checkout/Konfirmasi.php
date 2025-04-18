<?php

namespace App\Http\Livewire\Web\Checkout;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class Konfirmasi extends Component
{
    public $transaction;

    public function mount($transaction_id)
    {
        $this->transaction = Transaction::with('transactionDetails.nomorPerlombaan')
            ->where('id', $transaction_id)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.web.checkout.konfirmasi');
    }
}
