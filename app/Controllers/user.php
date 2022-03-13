<?php

namespace App\Controllers;
use App\Models\Product_model;
use App\Models\barangbekas_model;
class user extends BaseController
{
    protected $product_model;
    public function __construct()
    {
        $this->session = session();
        
        // $this->session = session()->get('isLogin');
        $this->product_model = new Product_model();
        $this->barangbekas_model = new barangbekas_model();
    }
    
    public function index() 
    {

        //cek apakah ada session bernama isLogin
        if(!$this->session->get('isLogin')){
            return redirect()->to('/auth/login');
        }
        
        $model = new Product_model();
        $data=[
        'title' =>'Home | Rongsokan',
        'cart' => \Config\Services::cart(),
        'produk' => $model->getProduct()->getResult(),
         'kategori'=> $model->getCategory()->getResult()
        ];
        return view('user/index',$data);
    }

    public function pesan()
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->get('isLogin')){
            return redirect()->to('/auth/login');
        }

        //cek role dari session
        $model = new Product_model();
        $barangbekas= $this->barangbekas_model->findAll();
        $title=[
            'title' =>'Pesan | Rongsokan',
            'product' => $model->getProduct()->getResult(),
            'category'=> $model->getCategory()->getResult(),
            'barangbekas' =>$barangbekas

        ];       
        return view('pesan/index',$title);
    }


    public function proses_order()
    {   
        $filegambar = $this->request->getFile('gambar');
        if ($filegambar->getError() == 4) {
            $namagambar = 'default.jpg';
        } else {
            $namagambar = $filegambar->getName();
            // $namagambar = $filegambar->getRandomName();
            $filegambar->move('assets/image/jualan/', $namagambar);
        } 
        $lat =$this->request->getVar('latitude');
        $lng =$this->request->getVar('longitude');
        $model = new Product_model();
        //-------------------------Input data pelanggan--------------------------
        $data_pelanggan = array(
                'nama_pen' => $this->request->getPost('nama_pen'),
                'nohp_pel' => $this->request->getPost('nohp_pel'),
                'latitude_pel' => $lat,
                'longitude_pel' => $lng,
                'tanggal'=>date('Y-m-d')
                        );
         $model->tambah_pelanggan($data_pelanggan);
         $id_pelanggan =$model->insertID(); 
        //-------------------------Input data order------------------------------
        $data_order = array(
            'pelanggan_id' => $id_pelanggan,
            'produk_id' =>$this->request->getPost('product_category'),
            'brg_bekas_id' => $this->request->getPost('id_toko'),
            'berat' =>  $this->request->getPost('berat'),
            'gambar'     => $namagambar);
         $model->tambah_penjualan($data_order);
         $id_order =$model->insertID();

         $data=[
            'title' =>'Orderan | Rongsokan',
            'product' => $model->getProduct()->getResult(),
             'category'=> $model->getCategory()->getResult()
            ];

        return view('shopping/sukses',$data);
    }
}           