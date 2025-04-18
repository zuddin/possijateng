<div>
    <div class="container">
        <div class="row justify-content-center mt-0" style="margin-bottom: 320px;">
            <div class="col-md-6">
                <div class="bg-white rounded-bottom-custom shadow-sm p-3 sticky-top">
                    <h3>Total Biaya: Rp {{ number_format($grandTotal, 0, ',', '.') }}</h3>
                    
                    <button wire:click="processCheckout" wire:loading.attr="disabled" class="btn btn-primary mt-3">
                        <span wire:loading.remove>Process to Checkout</span>
                        <span wire:loading>Processing...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
