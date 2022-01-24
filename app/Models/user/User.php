<?php

namespace App\Models\user;

use CodeIgniter\Model;

class User extends Model
{
    protected $userTbl, $currentTbl, $myDb;

    public function __construct()
    {
        $this->myDb = \Config\Database::connect();
        $this->userTbl = $this->myDb->table('user');
        $this->currentTbl = $this->myDb->table('current');
    }

    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~USER TABLE
    public function getUser($val, $type)
    {
        if ($type == 'byEmail') {
            return $this->currentTbl->getWhere(['email' => $val])->getRowArray();
        } else if ($type == 'byUsernameOrEmail') {
            $this->userTbl->where('username', $val);
            $this->userTbl->orWhere('email', $val);
            return $this->userTbl->get()->getRowArray();
        } else if ($type == 'byId') {
            $this->userTbl->where('id', $val);
            return $this->userTbl->get()->getRowArray();
        }
    }

    public function regisInsert($vals)
    {
        $data = [
            'username'     => $this->myDb->escapeString(htmlspecialchars($vals['username'])),
            'email'        => $this->myDb->escapeString(htmlspecialchars($vals['email'])),
            'pass'         => $this->myDb->escapeString(htmlspecialchars(password_hash($vals['pass'], PASSWORD_DEFAULT))),
            'photo'        => $vals['photo'],
            'date_created' => $vals['created'],
            'active'       => $vals['active']
        ];
        $this->userTbl->insert($data);
        if ($this->myDb->affectedRows() > 0) {
            return [true, $this->myDb->insertID()];
        } else {
            return [false];
        }
    }

    public function updateUser($val, $type)
    {
        if ($type == 'byEmail') {
            $this->userTbl->where('email', $val);
            $this->userTbl->update(['active' => 1]);
            return $this->myDb->affectedRows();
        }
    }

    public function updateDataPersonal($val, $userId)
    {
        $dataOld = $this->getUser($userId, 'byId');

        $nama = htmlspecialchars($val->nama);
        $prov = htmlspecialchars($val->provinsi);
        $kota = htmlspecialchars($val->kota);
        $kec = htmlspecialchars($val->kec);
        $desa = htmlspecialchars($val->desa);
        $alamat_detail = htmlspecialchars($val->alamat_detail);
        $kodepos = htmlspecialchars($val->kodepos);
        $telepon = htmlspecialchars($val->telepon);

        $this->userTbl->where('id', $dataOld['id']);
        $this->userTbl->update([
            'nama'          => $this->myDb->escapeString($nama),
            'prov'          => $this->myDb->escapeString($prov),
            'kota'          => $this->myDb->escapeString($kota),
            'kec'           => $this->myDb->escapeString($kec),
            'desa'          => $this->myDb->escapeString($desa),
            'alamat_detail' => $this->myDb->escapeString($alamat_detail),
            'kode_pos'      => $this->myDb->escapeString($kodepos),
            'no_telp'       => $this->myDb->escapeString($telepon)
        ]);

        if (($nama == '') &&
            ($prov == '') &&
            ($kota == '') &&
            ($kec == '') &&
            ($desa == '') &&
            ($alamat_detail == '') &&
            ($kodepos == '') &&
            ($telepon == '')
        ) {
            return 'none';
        }

        if (($nama == $dataOld['nama']) &&
            ($prov == $dataOld['prov']) &&
            ($kota == $dataOld['kota']) &&
            ($kec == $dataOld['kec']) &&
            ($desa == $dataOld['desa']) &&
            ($alamat_detail == $dataOld['alamat_detail']) &&
            ($kodepos == $dataOld['kode_pos']) &&
            ($telepon == $dataOld['no_telp'])
        ) {
            return 1;
        }

        return $this->myDb->affectedRows();
    }

    public function deleteUserById($id)
    {
        $this->userTbl->delete(['id' => $id]);
        return $this->myDb->affectedRows();
    }

    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~CURRENT TABLE
    public function getCurrent($val, $type)
    {
        if ($type == 'byEmail&Token') {
            return $this->currentTbl->getWhere([
                'email' => $val['email'],
                'token' => $val['token']
            ])->getRowArray();
        }
    }

    public function currentInsert($vals)
    {
        $data = [
            'email'        => $this->myDb->escapeString(htmlspecialchars($vals['email'])),
            'token'        => $this->myDb->escapeString(htmlspecialchars($vals['random'])),
            'date_created' => $vals['created']
        ];

        $this->currentTbl->insert($data);
        if ($this->myDb->affectedRows() > 0) {
            return [true, $this->myDb->insertID()];
        } else {
            return [false];
        }
    }

    public function deleteCurrent($val, $type)
    {
        if ($type == 'byEmail&Token') {
            $this->currentTbl->delete([
                'email' => $val['email'],
                'token' => $val['token']
            ]);
            return $this->myDb->affectedRows();
        } else if ($type == 'byId') {
            $this->currentTbl->delete(['id' => $val]);
            return $this->myDb->affectedRows();
        }
    }
}
