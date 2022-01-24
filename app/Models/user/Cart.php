<?php

namespace App\Models\user;

use CodeIgniter\Model;

class Cart extends Model
{

    protected $cart, $myDb, $dbProduct;
    public function __construct()
    {
        $this->dbProduct = new \App\Models\user\Product;

        $this->myDb = \Config\Database::connect();
        $this->cart = $this->myDb->table('cart');
    }

    public function getCartWhere($val, $type)
    {
        if ($type == 'byUser&product') {
            return $this->cart->getWhere([
                'id_user' => $val['id_user'],
                'id_product' => $val['id_product']
            ])->getRowArray();
        } else if ($type == 'byUserResults') {
            return $this->cart->getWhere(['id_user' => $val])->getResultArray();
        }
    }

    public function cartInsert($userId, $productId, $quantity)
    {
        $productData = $this->dbProduct->getProduct($productId, 'byId');

        $this->cart->insert([
            'id_user'    => $this->myDb->escapeString($userId),
            'id_product' => $this->myDb->escapeString($productData['id']),
            'quantity'   => $this->myDb->escapeString($quantity),
            'subtotal'   => $this->myDb->escapeString(($productData['price'] * $quantity))
        ]);
        return $this->myDb->affectedRows();
    }

    public function updateItem($val, $userId)
    {
        $idProduct = $val->idP;
        $quantity = $val->quantity;

        $dCart = $this->getCartWhere(['id_user' => $userId, 'id_product' => $idProduct], 'byUser&product');
        if ($dCart != NULL) {
            $dataProduct = $this->dbProduct->getProduct($dCart['id_product'], 'byId');

            if (($quantity < 1) || ($quantity > 20)) {
                $affec = ['success' => 'quantityX'];
            } else {
                $this->cart->where('id_user', $userId);
                $this->cart->where('id_product', $idProduct);
                $this->cart->update([
                    'quantity' => $this->myDb->escapeString(htmlspecialchars($quantity)),
                    'subtotal' => $this->myDb->escapeString(htmlspecialchars($dataProduct['price'] * $quantity))
                ]);
                $affec = ['success' => $this->myDb->affectedRows()];
            }

            if ($dCart['quantity'] == $quantity) $affec = ['success' => 'same'];

            $resultGetCart = $this->getCartWhere(['id_user' => $userId, 'id_product' => $idProduct], 'byUser&product');

            return array_merge($resultGetCart, $affec);
        }
    }

    public function deleteitem($val)
    {
        $this->cart->delete([
            'id'         => $val['id'],
            'id_user'    => $val['id_user'],
            'id_product' => $val['id_product']
        ]);

        return $this->myDb->affectedRows();
    }
}
