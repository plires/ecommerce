<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function formularioCheckaout()
    {
        return view('checkout');
    }

    public function test()
    {
        $order = [
            'id' => 33,
            'title' => 'titulo de la OT',
            'quantity' => 1,
            'currency_id' => 'ARS',
            'unit_price' => 200,
            'total_price' => 330,
            'featured_img' => 'https://www.oberlo.es/wp-content/uploads/sites/2/2018/04/what-should-I-sell-800x470.png',
            'email' => 'test_user_94915103@testuser.com',
        ];
        
        $order = (object) $order;

        // Genero la OT, doy aviso y redirijo
        $this->createOrder(/*PreOrder $preOrder, Request $request*/ $order);
    }

    public function thanks()
    {
        dd('thanks');
    }

    public function pending()
    {
        dd('pending');
    }

    public function error()
    {
        dd('error');
    }

    public function notification()
    {
        dd('notification');
    }

    public function createOrder(/*PreOrder $preOrder, Request $request*/ $order)
        {
            $allowedPaymentMethods = config('payment-methods.enabled');
            
            /*
            $request->validate([
                'payment_method' => [
                    'required',
                    Rule::in($allowedPaymentMethods),
                ],
                'terms' => 'accepted',
            ]);
            */

            //$order = $this->setUpOrder($preOrder, $request); //implementar metodos para crear una nueva orden en el sistema para el cliente

            //$this->notify($order); //implementar metodos para notificar a los administradores de la plataforma sobre dicha orden
            
            $url = $this->generatePaymentGateway(
                     'mercadopago'/*$request->get('payment_method')*/, 
                     $order
                 );
            dd($url);
            return redirect()->to($url);
        }

        protected function generatePaymentGateway($paymentMethod, /*Order*/ $order) : string
        {
            $method = new \App\PaymentMethods\MercadoPago;

            return $method->setupPaymentAndGetRedirectURL($order);
        }

}
