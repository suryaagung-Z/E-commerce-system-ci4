<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class Contact extends BaseController
{
    public function index()
    {

        $data = [
            'CSS'      => ['user/css/contact.css'],
            'JS'       => ['user/js/core/contact.js']
        ];

        return view('user/pages/Contact', $data);
    }
}
