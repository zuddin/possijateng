<div>
    <div class="container">
        <div class="row justify-content-center mt-0" style="margin-bottom: 320px;">
            <div class="col-md-6">
                <div class="bg-white rounded-bottom-custom shadow-sm p-3">
                    <h2>Konfirmasi Checkout</h2>
                    <p>Terima kasih telah melakukan checkout. Berikut adalah detail transaksi Anda:</p>
                    <h3>Invoice: {{ $transaction->invoice }}</h3>
                    <h3>Total: Rp {{ number_format($transaction->total, 0, ',', '.') }}</h3>
                    <h4>Detail Transaksi:</h4>
                    <ul>
                        @foreach ($transaction->transactionDetails as $detail)
                            <li>
                                {{ $detail->nomorPerlombaan->noperlombaan }} - 
                                Rp {{ number_format($detail->biaya_pendaftaran, 0, ',', '.') }}
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
</div>
