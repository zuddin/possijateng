<?php

namespace App\Livewire\Web\Cart;

use App\Models\Cart;
use Livewire\Component;

class BtnAddToCart extends Component
{   
    /**
     * nomor_perlombaan_id
     *
     * @var mixed
     */
    public $nomor_perlombaan_id;
    
    /**
     * addToCart
     *
     * @param  mixed $nomor_perlombaan_id
     * @return void
     */
    public function addToCart()
    {
        //check user is logged in
        if(!auth()->guard('atlet')->check()) {

            session()->flash('warning', 'Silahkan login terlebih dahulu');

            return $this->redirect('/login', navigate: true);
        }
        
        //check cart
        $item = Cart::where('nomor_perlombaan_id', $this->nomor_perlombaan_id)
                    ->where('atlets_id', auth()->guard('atlet')->user()->id)
                    ->first();
        
        //if cart already exist
        if ($item) {

            //update cart qty
            //$item->increment('qty');

        } else {

            //store cart
            $item = Cart::create([
                'atlets_id'   => auth()->guard('atlet')->user()->id,
                'nomor_perlombaan_id'    => $this->nomor_perlombaan_id,
                //'catatan_waktu'           => '00:00:00'
            ]);

        }

        // session flash
        session()->flash('success', 'Pendaftaran ditambahkan ke keranjang');

        //redirect to cart
        return $this->redirect('/cart', navigate: true);

    }
    
    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.web.cart.btn-add-to-cart');
    }
}