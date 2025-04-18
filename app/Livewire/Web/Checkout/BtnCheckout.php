<?php

namespace App\Livewire\Web\Checkout;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BtnCheckout extends Component
{
    public $grandTotal;
    public $loading = false;

    public function mount()
    {
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
    public function processCheckout()
    {
        DB::beginTransaction();

       
            // Ambil semua item cart user saat ini
            $carts = Cart::with('nomorPerlombaan')
                ->where('atlets_id', Auth::id())
                ->get();

            if ($carts->isEmpty()) {
                session()->flash('error', 'Keranjang kosong.');
                return;
            }

            // Hitung total biaya pendaftaran dari semua item cart
            $totalBiaya = $carts->sum(function ($cart) {
                return $cart->nomorPerlombaan->biaya_pendaftaran ?? 0;
            });

            // Buat invoice unik (misal timestamp + user id)
            $invoice = 'INV-' . time() . '-' . Auth::id();

            // Simpan ke tabel transactions
            $transaction = Transaction::create([
                'atlets_id' => Auth::id(),
                'invoice' => $invoice,
                'total' => $totalBiaya,
                'status' => 'pending',
             ]);

             // Simpan detail transaksi per item keranjang
             foreach ($carts as $cart) {
                 TransactionDetail::create([
                     'transaction_id' => $transaction->id,
                     'nomor_perlombaan_id' => $cart->nomor_perlombaan_id,
                     'biaya_pendaftaran' =>  $cart->nomorPerlombaan->biaya_pendaftaran ?? 0,
                 ]);
             }

             // Hapus semua item keranjang user setelah checkout sukses
             Cart::where('atlets_id', Auth::id())->delete();

             DB:commit();

             session()->flash('success', "Transaksi berhasil dibuat dengan invoice: {$invoice}");

         
     }

    
    public function render()
    {
        return view('livewire.web.checkout.btn-checkout');
    }
}
