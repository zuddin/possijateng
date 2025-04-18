<?php

namespace App\Livewire\Account\MyOrders;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\NomorPerlombaan;

class Show extends Component
{
    public $transaction;

    public function mount($id)
    {
        // Ambil transaksi berdasarkan ID dan user yang login (security)
        $this->transaction = Transaction::with('transactionDetail.nomorPerlombaan')
            ->where('id', $id)
            ->where('atlets_id', auth()->id())
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.account.my-orders.show');
    }
}
