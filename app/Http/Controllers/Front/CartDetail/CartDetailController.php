<?php

namespace App\Http\Controllers\Front\CartDetail;

use App\Cart;
use App\CartDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartDetailController extends Controller
{
    public function store(Request $request){
    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;
    	$cartDetail->quantity = $request->quantity;
    	$cartDetail->product_id = $request->product_id;

        if ($cartDetail->save()) {
            $status ='Producto añadido exitosamente';
        	return back()->with(compact('status'));
        }

        $status ='El producto no se pudo añadir al carrito de compras, intente nuevamente por favor';
        return back()->with(compact('status'));
    }

    public function index(){
        $cart = auth()->user()->cart;
        if ($cart) {
            $details = $cart->details;
            return view('cart.index')->with(compact('details'));
        }
        return view('cart.index');
    }

    public function destroy(Request $request, $id){
        
        $detail = CartDetail::find($id);

        if (!$detail) {
            $message = [
                'message' => 'Hubo un problema al eliminar el detalle, intente nuevamente mas tarde.',
                'success' => false,
                'typeAlert' => 'error'
            ];
            return $message;
        }

        if ($detail->cart_id == auth()->user()->cart->id) {
            if ($detail->delete()) {
                $message = [
                    'message' => 'El detalle se elimino exitosamente.',
                    'success' => true,
                    'typeAlert' => 'message'
                ];
                // return $message;
                // $message = 'El detalle se elimino exitosamente.';
                return $message;
            } else {
                $message = [
                    'message' => 'Hubo un problema al eliminar el detalle, intente nuevamente mas tarde.',
                    'success' => false,
                    'typeAlert' => 'error'
                ];
                return $message;
            }
        }

        
    }
}
