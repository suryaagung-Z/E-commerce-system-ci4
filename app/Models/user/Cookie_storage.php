<?php

namespace App\Models\user;

use CodeIgniter\Model;

class Cookie_storage extends Model
{
    protected $cookieTbl, $myDb;

    public function __construct()
    {
        $this->myDb = \Config\Database::connect();
        $this->cookieTbl = $this->myDb->table('cookie_storage');
    }

    public function getCookie($val, $type)
    {
        if ($type == 'byId') {
            return $this->cookieTbl->getWhere(['user_id' => $val])->getRowArray();
        }
    }

    public function cookieInsert($val)
    {
        $this->cookieTbl->insert([
            'user_id'     => $this->myDb->escapeString($val['idUser']),
            'user_id_enc' => $this->myDb->escapeString($val['val'])
        ]);
        return $this->myDb->affectedRows();
    }

    public function cookieDelete($val)
    {
        $this->cookieTbl->delete(['user_id' => $val]);
        return $this->myDb->affectedRows();
    }
}
