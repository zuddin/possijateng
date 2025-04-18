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
        <div class="row justify-content-center mt-0" style="margin-bottom: 270px;">
            <div class="col-md-6">
                <div class="bg-white rounded-bottom-custom shadow-sm p-3 sticky-top mb-5">
                    <div class="d-flex justify-content-start">
                        <div>
                            <x-buttons.back />
                        </div>
                    </div>
                </div>

                <div class="row">

                    @forelse ($carts as $cart)
                        <div class="col-12 col-md-12 mb-4">
                            <div class="card rounded border-0 shadow-sm">
                                <div class="row g-0">
                                    <!-- <div class="col-5 col-md-4">
                                           </div> -->
                                    <div class="col-7 col-md-8">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mt-4">
                                                <div class="text-start">
                                                    <h6 class="card-title">{{ $cart->nomorperlombaan->noperlombaan }}</h6>
                                                </div>
                                                <div class="text-end">
                                                    
                                                    <!-- btn delete -->
                                                    <livewire:web.cart.btn-delete :cart_id="$cart->id" />

                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-4">
                                                <div class="text-start">
                                                    <span class="text-success fw-bold">Rp. {{ number_format($cart->nomorperlombaan->biaya_pendaftaran) }}</span>
                                                </div>
                                                <div class="text-end">
                                                    <div class="input-group justify-content-center align-items-center group-btn-qty">
                                                        
                                                        <!-- qty cart -->
                                                        <input type="number" step="1" max="10" value="{{ $cart->qty }}" name="quantity" class="quantity-field border-0 text-center w-25" style="background: transparent;">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 col-md-12 mb-4">
                            <div class="card rounded border mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <div class="mt-2">
                                            <span class="fw-bold">Kamu Belum mendaftar perlombaan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>

            </div>
        </div>
    </div>

    @if(count($carts) > 0)
        <div class="container fixed-total">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="card rounded shadow-sm border-0 mb-5 ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="fw-bold mb-0">Total</h6>
                                </div>
                                <div class="ms-auto">
                                    <h6 class="fw-bold mb-0">Rp. {{ number_format($cart->nomorperlombaan->biaya_pendaftaran) }}</h6>
                                </div>
                            </div>
                            <hr style="border: dotted 1px #e92715;">
                            <a href="/checkout" wire:navigate class="btn btn-orange-2 rounded border-0 shadow-sm w-100">Process to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>