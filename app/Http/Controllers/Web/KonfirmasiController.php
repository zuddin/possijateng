<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class KonfirmasiController extends Controller
{
    public function index($transactionId)
    {
        $transaction = Transaction::with('atlets', 'transactionDetail')->find($transactionId);

        if (!$transaction) {
            return redirect()->route('home')->with('error', 'Transaksi tidak ditemukan.');
        }

        return view('web.konfirmasi', [
            'transaction' => $transaction,
        ]);
    }
}
