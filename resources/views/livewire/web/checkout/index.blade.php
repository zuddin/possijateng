@section('title')
POSSI JATENG
@stop

@section('keywords')
Sistem Informasi Atlet dan Event Selam POSSI JAWA TENGAH
@stop

@section('description')
Sistem Informasi Atlet dan Event Selam POSSI JAWA TENGAH
@stop

@section('image')
{{ asset('images/logo.png') }}
@stop

<div>
    <div class="container">
        <div class="row justify-content-center mt-0" style="margin-bottom: 320px;">
            <div class="col-md-6">
                <div class="bg-white rounded-bottom-custom shadow-sm p-3 sticky-top">
                    <h2>Keranjang Anda</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Perlombaan</th>
                                <th>Biaya Pendaftaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nomor_perlombaan as $item)
                                <tr>
                                    <td>{{ $item->nomorPerlombaan->nomor_acara }} | {{ $item->nomorPerlombaan->noperlombaan }} {{ $item->nomorPerlombaan->kelompokumur }} {{ $item->nomorPerlombaan->kelompok }}</td>
                                    <td>Rp {{ number_format($item->nomorPerlombaan->biaya_pendaftaran, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h3>Total Biaya: Rp {{ number_format($grandTotal, 0, ',', '.') }}</h3>
                    <livewire:web.checkout.btn-checkout />
                </div>
            </div>
        </div>
    </div>
</div>
