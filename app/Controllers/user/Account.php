<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class Account extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            'CSS' => ['user/css/account.css'],
            'JS'  => ['user/js/core/account.js']
        ];
    }

    public function index()
    {
        if ($this->loginRequire() === null) {
            return redirect()->to('/auth')->with('popup', ['text' => '🙂 Login terlebih dahulu', 'bg' => 'popup-y']);
        } else if (!$this->loginRequire()) {
            return redirect()->to('')->with('popup', ['text' => '❌ Error: Persyaratan tidak dikenali', 'bg' => 'popup-r']);
        } else if ($this->loginRequire()) {
            $dataUser = $this->loginRequire();
        }

        $data = [
            'dataUser' => $dataUser
        ];

        return view('user/pages/Account', array_merge($this->data, $data));
    }

    public function personaldata()
    {
        if (!$this->reqGet->isAJAX()) {
            return redirect()->back()->with('popup', ['text' => '❌ Tidak mendapatkan izin', 'bg' => 'popup-r']);
        } else {
            if (!isset($_POST['data'])) {
                // ERROR CODE : edp_01
                $data = [
                    'message' => '❌ Error: edp_01',
                    'bg'      => 'popup-r',
                    'die'     => true
                ];
                echo json_encode($data);
                die();
            } else {
                $data = json_decode($_POST['data']);
                if (
                    !isset($data->nama) ||
                    !isset($data->provinsi) ||
                    !isset($data->kota) ||
                    !isset($data->kec) ||
                    !isset($data->desa) ||
                    !isset($data->alamat_detail) ||
                    !isset($data->kodepos) ||
                    !isset($data->telepon)
                ) {
                    // ERROR CODE : edp_02
                    $data = [
                        'message' => '❌ Error: edp_02',
                        'bg'      => 'popup-r',
                        'die'     => true
                    ];
                    echo json_encode($data);
                    die();
                }
            }

            if ($this->loginRequire() === null) {
                $this->mySess->setFlashdata('popup', ['text' => '🙂 Login terlebih dahulu', 'bg' => 'popup-y']);
                $data = [
                    'redirect' => base_url('auth')
                ];
                echo json_encode($data);
                die();
            } else if (!$this->loginRequire()) {
                $this->mySess->setFlashdata('popup', ['text' => '❌ Error: Persyaratan tidak dikenali', 'bg' => 'popup-r']);
                $data = [
                    'redirect' => base_url('auth')
                ];
                echo json_encode($data);
                die();
            } else if ($this->loginRequire()) {
                $dataUser = $this->loginRequire();
            }

            $getData = json_decode($_POST['data']);
            $updateData = $this->dbUser->updateDataPersonal($getData, $dataUser['id']);

            if ($updateData == 'none') {
                echo json_encode([
                    'message' => '✔️ Data berhasil dihapus',
                    'bg'      => 'popup-g'
                ]);
                die;
            } else if ($updateData > 0) {
                echo json_encode([
                    'message' => '✔️ Data berhasil diperbarui',
                    'bg'      => 'popup-g'
                ]);
                die;
            } else {
                echo json_encode([
                    'message' => '❌ Data gagal diperbarui',
                    'bg'      => 'popup-r'
                ]);
                die;
            }
        }
    }

    public function logout()
    {
        if ($this->loginRequire() === null) {
            return redirect()->to('/auth')->with('popup', ['text' => '🙂 Login terlebih dahulu', 'bg' => 'popup-y']);
        } else if (!$this->loginRequire()) {
            return redirect()->to('')->with('popup', ['text' => '❌ Error: Persyaratan tidak dikenali', 'bg' => 'popup-r']);
        } else if ($this->loginRequire()) {
            $dataUser = $this->loginRequire();

            if (isset($_COOKIE[$this->idCookieName])) {
                // ERROR CODE : L_rc_1
                if ($this->dbCookie->cookieDelete($dataUser['id']) <= 0) {
                    return redirect()->to('/account')->with('popup', ['text' => '❌ Error: L_rc_1', 'bg' => 'popup-r']);
                    die();
                }
            }

            $this->mySess->remove($this->idSessionName);

            $this->mySess->stop();

            return redirect()->to('')->with('popup', ['text' => '✔️ Berhasil logout!', 'bg' => 'popup-g'])->deleteCookie($this->idCookieName);
        }
    }
}
