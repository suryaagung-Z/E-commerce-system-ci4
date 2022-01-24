<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class Shop extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            'CSS' => [
                'user/css/shop.css',
                'user/css/nouislider.min.css'
            ],
            'JS'  => [
                'user/js/animated/lottie.js',
                'user/js/range/nouislider.min.js',
                'user/js/core/shop.js'
            ]
        ];
    }

    public function index()
    {
        $data = [
            'dataProduct'  => $this->dbProduct->filterShop($_GET),
            'dataCategory' => $this->dbCategory->getCategory(NULL, 'resultCount')
        ];

        return view('user/pages/shop', array_merge($data, $this->data));
    }
}
