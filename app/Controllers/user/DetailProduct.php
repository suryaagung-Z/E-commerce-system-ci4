<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class DetailProduct extends BaseController
{
    public function index($name)
    {
        $detailData = $this->dbProduct->getProduct(urldecode($name), 'getWhereByName');
        if (!$detailData) {
            return redirect()->to(base_url('/shop'))->with('popup', ['text' => '🙂 Produk tidak ditemukan!', 'bg' => 'popup-y']);
        }


        $cartData = NULL;
        if ($this->loginRequire()) {
            $dataUser = $this->loginRequire();

            $dCart = $this->dbCart->getCartWhere(['id_user' => $dataUser['id'], 'id_product' => $detailData['id']], 'byUser&product');
            if ($dCart != NULL) {
                $cartData = [
                    'quantity' => $dCart['quantity'],
                    'status'   => true
                ];
            }
        }

        $data = [
            'CSS'        => ['user/css/detail-product.css'],
            'JS'         => ['user/js/core/detail-product.js'],
            'detailData' => $detailData,
            'cartData'   => $cartData
        ];

        return view('user/pages/detail-product', $data);
    }
}
