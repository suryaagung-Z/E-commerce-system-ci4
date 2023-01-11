<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            'CSS'      => ['user/css/auth.css'],
            'JS'       => ['user/js/core/auth.js']
        ];
    }

    public function index()
    {
        if ($this->loginRequire()) {
            return redirect()->back()->with('popup', ['text' => '🙂 Logout terlebih dahulu', 'bg' => 'popup-y']);
        }

        $data = [
            'formValid' => $this->formValid
        ];

        return view('user/pages/Auth', array_merge($this->data, $data));
    }

    public function login()
    {
        if ($this->loginRequire()) {
            return redirect()->back()->with('popup', ['text' => '🙂 Logout terlebih dahulu', 'bg' => 'popup-y']);
        }

        $this->formValid->setRules([
            'username_L' => [
                'label'  => 'Username',
                'rules'  => 'required|trim',
                'errors' => [
                    'required'   => '{field} diperlukan'
                ]
            ],
            'password_L' => [
                'label'  => 'Password',
                'rules'  => 'required|trim',
                'errors' => [
                    'required'    => '{field} diperlukan'
                ]
            ]
        ]);

        if ($this->formValid->withRequest($this->request)->run()) {
            $username = $this->reqGet->getPost('username_L');
            $pass     = $this->reqGet->getPost('password_L');

            $checkUser = $this->dbUser->getUser($username, 'byUsernameOrEmail');
            if ($checkUser != NULL) {
                if ($checkUser['active'] == 1) {
                    if (password_verify($pass, $checkUser['pass'])) {
                        if ($this->reqGet->getPost('rememberMe') == 'on') {
                            $valCookieEnc = bin2hex($this->enc->encrypt($checkUser['id']));

                            // CODE ERROR : log_c1;
                            if ($this->dbCookie->cookieInsert(['idUser' => $checkUser['id'], 'val'    => $valCookieEnc]) <= 0) {
                                return redirect()->to('/auth')->with('popup', ['text' => '❌ Error:log_c1', 'bg' => 'popup-r']);
                            }
                            $valCookie = urlencode($valCookieEnc);
                            return redirect()->to('')->with('popup', ['text' => '✔️ Berhasil login!', 'bg' => 'popup-g'])->setCookie($this->idCookieName, $valCookie, YEAR);
                        } else {
                            $this->mySess->set($this->idSessionName, $checkUser['id']);
                            return redirect()->to('')->with('popup', ['text' => '✔️ Berhasil login!', 'bg' => 'popup-g']);
                        }
                    } else {
                        return redirect()->to('/auth')->withInput()->with('message_L', '<div class="alert alert-y"> Nama Pengguna / kata sandi salah! </div>');
                    }
                } else {
                    return redirect()->to(base_url('/auth'))->with('message_L', '<div class="alert alert-y"> Email belum diaktivasi! </div>');
                }
            } else {
                return redirect()->to('/auth')->withInput()->with('message_L', '<div class="alert alert-y"> Nama Pengguna / kata sandi salah! </div>');
            }
        } else {
            return redirect()->to('/auth')->withInput();
        }
    }

    public function regis()
    {
        if ($this->loginRequire()) {
            return redirect()->back()->with('popup', ['text' => '🙂 Logout terlebih dahulu', 'bg' => 'popup-y']);
        }

        $this->formValid->setRules([
            'username_R' => [
                'label'  => 'Nama Pengguna',
                'rules'  => 'required|trim|min_length[6]|max_length[128]|is_unique[user.username]',
                'errors' => [
                    'required'   => '{field} diperlukan',
                    'min_length' => 'Minimal 6 karakter',
                    'max_length' => 'Maksimal 128 karakter',
                    'is_unique'  => 'Nama pengguna tidak tersedia'
                ]
            ],
            'email_R' => [
                'label'  => 'Email',
                'rules'  => 'required|trim|valid_email|is_unique[user.email]',
                'errors' => [
                    'required'    => '{field} diperlukan',
                    'valid_email' => 'Alamat email tidak valid',
                    'is_unique'   => 'Email tidak tersedia'
                ]
            ],
            'pass1' => [
                'label'  => 'Kata Sandi',
                'rules'  => 'required|trim|min_length[6]|max_length[64]|matches[pass2]',
                'errors' => [
                    'required'   => '{field} diperlukan',
                    'min_length' => 'Minimal 6 karakter',
                    'max_length' => 'Maksimal 64 karakter',
                    'matches'    => 'Tidak cocok dengan password 2'
                ]
            ],
            'pass2' => [
                'label'  => 'Ulangi Kata sandi',
                'rules'  => 'required|trim',
                'errors' => [
                    'required'   => '{field} diperlukan'
                ]
            ]
        ]);

        if ($this->formValid->withRequest($this->request)->run()) {
            $username     = $this->reqGet->getPost('username_R');
            $email        = $this->reqGet->getPost('email_R');
            $pass         = $this->reqGet->getPost('pass1');
            $photo        = 'default.png';
            $date_created = time();
            $active       = 0;
            $random       = base64_encode(random_bytes(32));

            $dataRegis = [
                'username' => $username,
                'email'    => $email,
                'pass'     => $pass,
                'photo'    => $photo,
                'created'  => $date_created,
                'active'   => $active
            ];
            // CODE ERROR : reg_01
            $insRegis = $this->dbUser->regisInsert($dataRegis);
            if ($insRegis[0]) {
                $idFromRegis = $insRegis[1];
            } else {
                return redirect()->to(base_url('/auth'))->with('popup', ['text' => '❌ Terjadi kesalahan sistem. Error:reg_01', 'bg' => 'popup-r']);
            }

            $dataCurrent = [
                'email'   => $email,
                'random'  => $random,
                'created' => $date_created
            ];
            // CODE ERROR : reg_02
            $insCurrent = $this->dbUser->currentInsert($dataCurrent);
            if ($insCurrent[0]) {
                $idFromCurrent = $insCurrent[1];
            } else {
                return redirect()->to('/auth')->with('popup', ['text' => '❌ Terjadi kesalahan sistem. Error:reg_02', 'bg' => 'popup-r']);
            }

            // CODE ERROR : reg_03
            if ($this->_sendEmail($email, $random) === 1) {
                return redirect()->to('/auth')->with('message_R', '<div class="alert alert-g"> Cek email anda untuk verifikasi! </div>')->with('popup', ['text' => '✔️ Berhasil mengirim email', 'bg' => 'popup-g']);
            } else {
                // CODE ERROR : fail_em_01
                if ($this->dbUser->deleteUserById($idFromRegis) <= 0) {
                    return redirect()->to('/auth')->with('popup', ['text' => '❌ Error:fail_em_01', 'bg' => 'popup-r']);
                }
                // CODE ERROR : fail_em_02
                if ($this->dbUser->deleteCurrent($idFromCurrent, 'byId') <= 0) {
                    return redirect()->to('/auth')->with('popup', ['text' => '❌ Error:fail_em_02', 'bg' => 'popup-r']);
                }
                // return redirect()->to('/auth')->with('popup', ['text' => '❌ Gagal mengirim code. Error:reg_03', 'bg' => 'popup-r']);
            }
        } else {
            return redirect()->to('/auth')->withInput();
        }
    }

    public function _sendEmail($email, $token)
    {
        if ($this->loginRequire()) {
            return redirect()->back()->with('popup', ['text' => '🙂 Logout terlebih dahulu', 'bg' => 'popup-y']);
        }

        $conEmail = \Config\Services::email();

        $config = [
            'protocol'   => 'smtp',
            'SMTPHost'   => 'smtp.gmail.com',
            'SMTPUser'   => 'suryaagungmix@gmail.com',
            'SMTPPass'   => 'kczkdbyypzkwijno',
            'SMTPPort'   => 465,
            'SMTPCrypto' => 'ssl',
            'mailType'   => 'html',
            'charset'    => 'UTF-8',
            'newline'    => "\r\n"
        ];

        $conEmail->initialize($config);

        $conEmail->setFrom('suryaagungmix.com', 'DIDOL.SHOP');
        $conEmail->setTo($email);
        $conEmail->setSubject('VERIFIKASI DIDOL.SHOP');
        $conEmail->setMessage('Klik untuk verifikasi akun <b>DIDOL.SHOP</b> <br>
                               PERHATIAN : Hiraukan saja jika merasa ini bukan anda<br><br>
        <a href="' . base_url('verify?email=' . $email . '&token=' . urlencode($token)) . '" style="letter-spacing: 2px; font-weight: 600; font-size: 0.8rem;"> KLIK </a>');

        // Just Debug
        // var_dump($conEmail->send());
        // var_dump($conEmail->printDebugger());

        $send = $conEmail->send() ?  1 : 0;
        return $send;
    }

    public function verify()
    {
        if ($this->loginRequire()) {
            return redirect()->back()->with('popup', ['text' => '🙂 Logout terlebih dahulu', 'bg' => 'popup-y']);
        }

        $email = $_GET['email'];
        $token = $_GET['token'];

        $checkToken = $this->dbUser->getCurrent([
            'email' => $email,
            'token' => $token
        ], 'byEmail&Token');

        if ($checkToken != NULL) {
            $getUserTbl = $this->dbUser->getUser($checkToken['email'], 'byEmail');
            if ((time() - $checkToken['date_created']) < DAY) {
                // CODE ERROR : fail_vf_01
                if ($this->dbUser->deleteCurrent(['email' => $email, 'token' => $token], 'byEmail&Token') <= 0) {
                    return redirect()->to('/auth')->with('popup', ['text' => '❌ Error:fail_vf_01', 'bg' => 'popup-r']);
                } else {
                    // CODE ERROR : fail_vf_02
                    if ($this->dbUser->updateUser($email, 'byEmail') <= 0) {
                        return redirect()->to('/auth')->with('popup', ['text' => '❌ Error:fail_vf_02', 'bg' => 'popup-r']);
                    } else {
                        return redirect()->to('/auth')->with('message_R', '<div class="alert alert-g"> ' . $getUserTbl['email'] . ' telah diverifikasi! </div>')->with('popup', ['text' => '✔️ ' . $getUserTbl['email'] . ' telah diverifikasi', 'bg' => 'popup-g']);
                    }
                    // END
                }
            } else {

                return redirect()->to('/auth')->with('popup', ['text' => '❌ Email / Token tidak ditemukan', 'bg' => 'popup-r']);
            }
        } else {
            return redirect()->to('/auth')->with('popup', ['text' => '❌ Email / Token tidak ditemukan', 'bg' => 'popup-r']);
        }
    }
}
