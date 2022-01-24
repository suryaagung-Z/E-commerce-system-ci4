<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class Checkout extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            'CSS' => [
                'user/css/checkout.css',
                'user/css/swiper-bundle.min.css'
            ],
            'JS'  => ['user/js/core/checkout.js']
        ];
    }

    public function index()
    {
        if (!$this->loginRequire()) {
            return redirect()->to('')->with('popup', ['text' => '❌ Error: Persyaratan tidak dikenali', 'bg' => 'popup-r']);
        } else if ($this->loginRequire() == 'null') {
            return redirect()->to('/auth')->with('popup', ['text' => '🙂 Login terlebih dahulu', 'bg' => 'popup-y']);
        } else if ($this->loginRequire()) {
            $dataUser = $this->loginRequire();
        }

        $getDataCart = $this->dbCart->getCartWhere($dataUser['id'], 'byUserResults');
        if ($getDataCart == NULL) return redirect()->back()->with('popup', ['text' => '🙂 Keranjang kosong', 'bg' => 'popup-y']);

        $dataProduct = [];
        $dataSubtotal = [];

        for ($d = 0; $d < count($getDataCart); $d++) {
            $dp = $this->dbProduct->getProduct($getDataCart[$d]['id_product'], 'byId');

            $dataSubtotal[] = $getDataCart[$d]['subtotal'];
            $dataProduct[] = array_merge(['product_name' => $dp['product_name']], $getDataCart[$d]);
        }

        // dd($dataProduct);

        $data = [
            'dataCart' => $dataProduct,
            'total'    => array_sum($dataSubtotal),
            'dataUser' => $dataUser
        ];

        return view('user/pages/Checkout', array_merge($this->data, $data));
    }
}
