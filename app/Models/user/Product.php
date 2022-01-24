<?php

namespace App\Models\user;

use CodeIgniter\Model;

class Product extends Model
{
    protected $productTbl, $myDb;

    public function __construct()
    {
        $this->myDb = \Config\Database::connect();
        $this->productTbl = $this->myDb->table('product');
    }

    public function getProduct($val, $type)
    {
        if ($type == 'get8OrderSold') {
            $this->productTbl->orderBy('sold', 'DESC');
            return $this->productTbl->get(8, 0)->getResultArray();
        } else if ($type == 'getWhereByName') {
            $result = $this->productTbl->getWhere(['product_name' => $this->myDb->escapeString($val)])->getRowArray();
            if ($result == NULL) {
                $result = FALSE;
            }
            return $result;
        } else if ($type == 'byId') {
            return $this->productTbl->getWhere(['id' => $val])->getRowArray();
        }
    }

    public function filterShop($get)
    {
        $productCount = 10;
        if (isset($get['ctg'])) {
            $this->productTbl->where('category', urldecode($get['ctg']));
        }

        if (isset($get['src'])) {
            $getSrc = urldecode($get['src']);
            $this->productTbl->where("(`category` LIKE '%" . $this->myDb->escapeLikeString($getSrc) . "%' ESCAPE '!' OR `product_name` LIKE '%" . $this->myDb->escapeLikeString($getSrc) . "%' ESCAPE '!')");
        }

        if (isset($get['price'])) {
            $getPrice = explode('|', urldecode($get['price']));
            $min = $getPrice[0];
            $max = $getPrice[1];
            $this->productTbl->where("price BETWEEN '$min' and '$max'");
        }

        if (isset($get['fs'])) {
            $getFS = urldecode($get['fs']);

            if ($getFS == 'default') {
                $this->productTbl->orderBy('id', 'ASC');
            } else if ($getFS == 'bestSeller') {
                $this->productTbl->orderBy('sold', 'DESC');
            } else if ($getFS == 'latest') {
                $this->productTbl->orderBy('id', 'DESC');
            } else if ($getFS == 'lowToHigh') {
                $this->productTbl->orderBy('price', 'ASC');
            } else if ($getFS == 'highToLow') {
                $this->productTbl->orderBy('price', 'DESC');
            } else {
                // IF FILTER SELECT NOT CONDITION
                $this->productTbl->where('id', NULL);
            }
        }

        return $this->productTbl->get()->getResultArray();
    }
}
