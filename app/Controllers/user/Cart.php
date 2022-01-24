<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Cart extends BaseController
{
    use ResponseTrait;

    protected $data;

    public function __construct()
    {
        $this->data = [
            'CSS' => ['user/css/cart.css'],
            'JS'  => [
                'user/js/animated/lottie.js',
                'user/js/core/cart.js'
            ]
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

        $cartData = NULL;
        $subtotal = NULL;

        $getCart = $this->dbCart->getCartWhere($dataUser['id'], 'byUserResults');
        if (!($getCart == NULL)) {
            foreach ($getCart as $gc) {
                $eachP = $this->dbProduct->getProduct($gc['id_product'], 'byId');
                $eachC = [
                    'quantity' => $gc['quantity'],
                    'subtotal' => $gc['subtotal']
                ];
                $cartData[] = array_merge($eachP, $eachC);

                $dataSubtotal[] = intval($gc['subtotal']);
                $subtotal = array_sum($dataSubtotal);
            }
        }

        $data = [
            'cartData' => $cartData,
            'subtotal' => $subtotal
        ];

        return view('user/pages/Cart', array_merge($this->data, $data));
    }

    public function add()
    {
        if (!$this->reqGet->isAJAX()) {
            return redirect()->back()->with('popup', ['text' => '❌ Tidak mendapatkan izin', 'bg' => 'popup-r']);
        } else {

            if (!isset($_POST['data'])) {
                // ERROR CODE : eda_01
                $data = [
                    'message' => '❌ Error: eda_01',
                    'bg'       => 'popup-r'
                ];
                echo json_encode($data);
                die();
            } else {
                $data = json_decode($_POST['data']);
                if (empty($data->idP) || empty($data->quantity)) {
                    // ERROR CODE : eda_02
                    $data = [
                        'message' => '❌ Error: eda_02',
                        'bg'       => 'popup-r'
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
                $data = [
                    'message' => '❌ Error: Persyaratan tidak dikenali',
                    'bg'       => 'popup-r'
                ];
                echo json_encode($data);
                die();
            } else if ($this->loginRequire()) {
                $dataUser = $this->loginRequire();
            }


            $userId = $dataUser['id'];
            $data = json_decode($_POST['data']);
            $productId = $data->idP;

            isset($data->quantity) ? $quantity = $data->quantity : $quantity = 1;

            if ($quantity < 1) {
                $data = [
                    'message' => '🙂 Jumlah item melebihi batas minimal',
                    'bg'       => 'popup-y'
                ];
                echo json_encode($data);
                die();
            } else if ($quantity > 20) {
                $data = [
                    'message' => '🙂 Jumlah item melebihi batas maksimal',
                    'bg'       => 'popup-y'
                ];
                echo json_encode($data);
                die();
            }

            $dProduct = $this->dbProduct->getProduct($productId, 'byId');
            $dCart = $this->dbCart->getCartWhere(['id_user' => $userId, 'id_product' => $productId], 'byUser&product');

            if ($dCart != NULL) {
                $data = [
                    'message' => '🙂 Item sudah ada di keranjang',
                    'bg'       => 'popup-y'
                ];
                echo json_encode($data);
                die();
            } else {
                if (!($dProduct == NULL)) {
                    if ($this->dbCart->cartInsert($userId, $dProduct['id'], $quantity) > 0) {
                        $data = [
                            'status'   => true,
                            'message' => '✔️ Berhasil menambahkan item',
                            'bg'       => 'popup-g'
                        ];
                        echo json_encode($data);
                        die();
                    } else {
                        $data = [
                            'message' => '🙂 Gagal menambahkan item',
                            'bg'       => 'popup-r'
                        ];
                        echo json_encode($data);
                        die();
                    }
                } else {
                    $data = [
                        'message' => '🙂 Produk tidak ditemukan',
                        'bg'       => 'popup-y'
                    ];
                    echo json_encode($data);
                    die();
                }
            }
        }
    }

    public function updatemultiple()
    {
        if (!$this->reqGet->isAJAX()) {
            return redirect()->back()->with('popup', ['text' => '❌ Tidak mendapatkan izin', 'bg' => 'popup-r']);
        } else {
            if (!isset($_POST['data'])) {
                // ERROR CODE : edum_01
                $data = [
                    'message' => '❌ Error: edum_01',
                    'bg'      => 'popup-r',
                    'die'     => true
                ];
                echo json_encode($data);
                die();
            } else {
                $data = json_decode($_POST['data']);
                for ($cd = 0; $cd < count($data); $cd++) {
                    if (empty($data[$cd]->idP) || empty($data[$cd]->quantity)) {
                        // ERROR CODE : edum_02
                        $data = [
                            'message' => '❌ Error: edum_02',
                            'bg'      => 'popup-r',
                            'die'     => true
                        ];
                        echo json_encode($data);
                        die();
                    }
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

            $userId = $dataUser['id'];
            $getData = json_decode($_POST['data']);
            $success = [];
            $dataU = ['dataUpdate' => []];
            $subTotal = [];

            for ($x = 0; $x < count($getData); $x++) {
                $resultDb = $this->dbCart->updateItem($getData[$x], $userId);

                if ($resultDb != NULL) {
                    $success[] = $resultDb['success'];
                    array_push($dataU['dataUpdate'], $resultDb);
                    $subTotal[] = $resultDb['subtotal'];
                } else {
                    $success[] = 'NULL';
                }
            }

            $countSuc = array_count_values($success);
            $popup = ['popup' => []];
            if (isset($countSuc['1'])) {
                $textPopup = [
                    'text' => "{$countSuc['1']} Produk berhasil diperbarui ✔️",
                    'bg'   => 'popup-g'
                ];
                array_push($popup['popup'], $textPopup);
            }

            if (isset($countSuc['same'])) {
                $textPopup = [
                    'text' => "{$countSuc['same']} Produk tidak diperbarui ❌",
                    'bg'   => 'popup-g'
                ];
                array_push($popup['popup'], $textPopup);
            }

            if (isset($countSuc['0'])) {
                $textPopup = [
                    'text' => "{$countSuc['0']} Produk gagal diperbarui 😢",
                    'bg'   => 'popup-r'
                ];
                array_push($popup['popup'], $textPopup);
            }

            if (isset($countSuc['quantityX'])) {
                $textPopup = [
                    'text' => "{$countSuc['quantityX']} Kuantitas produk tidak diizinkan ❌",
                    'bg'   => 'popup-r'
                ];
                array_push($popup['popup'], $textPopup);
            }

            if (isset($countSuc['NULL'])) {
                $textPopup = [
                    'text' => "{$countSuc['NULL']} Produk tidak ditemukan 🙂",
                    'bg'   => 'popup-r'
                ];
                array_push($popup['popup'], $textPopup);
            }

            $merge1 = array_merge($dataU, $popup);
            $total = ['total' => array_sum($subTotal)];
            $merge2 = array_merge($merge1, $total);

            echo json_encode($merge2);
            die();
        }
    }

    public function deleteitem()
    {
        if (!$this->reqGet->isAJAX()) {
            return redirect()->back()->with('popup', ['text' => '❌ Tidak mendapatkan izin', 'bg' => 'popup-r']);
        } else {
            if (!isset($_POST['data'])) {
                // ERROR CODE : edd_01
                $data = [
                    'message' => '❌ Error: edd_01',
                    'bg'      => 'popup-r',
                    'die'     => true
                ];
                echo json_encode($data);
                die();
            } else {
                $data = json_decode($_POST['data']);
                if (empty($data->idP)) {
                    // ERROR CODE : edd_02
                    $data = [
                        'message' => '❌ Error: edd_02',
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

            $dCart = $this->dbCart->getCartWhere(['id_user' => $dataUser['id'], 'id_product' => $data->idP], 'byUser&product');

            if (!($dCart == NULL)) {
                $dataDelete = [
                    'id'         => $dCart['id'],
                    'id_user'    => $dCart['id_user'],
                    'id_product' => $dCart['id_product']
                ];
                if ($this->dbCart->deleteItem($dataDelete) > 0) {
                    $getCart = $this->dbCart->getCartWhere($dataUser['id'], 'byUserResults');
                    if (!($getCart == NULL)) {
                        foreach ($getCart as $gc) {
                            $dataSubtotal[] = intval($gc['subtotal']);
                            $subtotal = array_sum($dataSubtotal);
                        }
                    } else {
                        $subtotal = NULL;
                    }

                    $data = [
                        'message' => '✔️ Berhasil menghapus item!',
                        'bg'       => 'popup-g',
                        'subtotal' => $subtotal,
                        'status'   => true
                    ];
                    echo json_encode($data);
                    die();
                } else {
                    $data = [
                        'message' => '😢 Gagal menghapus item!',
                        'bg'       => 'popup-r'
                    ];
                    echo json_encode($data);
                    die();
                }
            } else {
                $data = [
                    'message' => '🙂 Product tidak ditemukan!',
                    'bg'       => 'popup-r'
                ];
                echo json_encode($data);
                die();
            }
        }
    }
}
