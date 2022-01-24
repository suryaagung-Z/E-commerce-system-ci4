<?php

namespace App\Controllers;

class IndexUser extends BaseController
{

    public function index()
    {
        $data = [
            'CSS' => ['user/css/swiper-bundle.min.css'],
            'JS'  => [
                'user/js/swiperjs/swiper-bundle.min.js',
                'user/js/core/index.js'
            ],
            'dataSlider'   => $this->dbProduct->getProduct(NULL, 'get8OrderSold'),
            'dataCategory' => $this->dbCategory->getCategory(NULL, 'resultCount')
        ];

        return view('user/pages/index', $data);
    }
}
