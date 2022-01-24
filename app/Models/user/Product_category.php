<?php

namespace App\Models\user;

use CodeIgniter\Model;

class Product_category extends Model
{
    protected $prd, $cPrd;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->prd = $db->table('product_category');
        $this->cPrd = $db->table('product');
    }

    public function getCategory($val, $type)
    {
        if ($type == 'resultCount') {
            $result1 = $this->prd->get()->getResultArray();

            foreach ($result1 as $ctgry) {
                $num = $this->cPrd->where('category', $ctgry['category_name'])->countAllResults();
                $result2[] = ['count' => $num];
            }
            for ($r2 = 0; $r2 < count($result2); $r2++) {
                $RESULT[] = array_merge($result1[$r2], $result2[$r2]);
            }
        }

        return $RESULT;
    }
}
