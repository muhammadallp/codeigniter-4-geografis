<?php
 namespace App\Controllers; 
use App\Models\Product_model;

class Product extends BaseController
{
    protected $product_model;
    public function __construct()
    {
   
        //membuat user model untuk konek ke database 
        $this->product_model = new Product_model();
       
       
        //meload validation
        $this->validation = \Config\Services::validation();
        
        //meload session
        $this->session = \Config\Services::session();
        
    }
    public function index()
    {

        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

        $model = new Product_model();
        $data=[
        'title' =>'Produk | Rongsokan',
        'product' => $model->getProduct()->getResult(),
         'category'=> $model->getCategory()->getResult()
        ];
        return view('product/index', $data);
    }

    public function save()
    {

        $filegambar = $this->request->getFile('image');
        if ($filegambar->getError() == 4) {
            $namagambar = 'default.jpg';
        } else {
            $namagambar = $filegambar->getName();
            // $namagambar = $filegambar->getRandomName();
            $filegambar->move('assets/image/product/', $namagambar);
        } 

        $model = new Product_model();
        $data = array(
            'product_name'        => $this->request->getPost('product_name'),
            'product_price'       => $this->request->getPost('product_price'),
            'product_category_id' => $this->request->getPost('product_category'),
            'deskripsi'           => $this->request->getPost('deskripsi'),
            'image'               => $namagambar
        );
        $model->saveProduct($data);
        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Diedit!
      </div>');
        return redirect()->to('/product');
    }



    public function edit($id)
    {
        $filegambar = $this->request->getFile('image');
        if ($filegambar->getError() == 4) {
            $namagambar =$this->request->getVar('gambarlama');
        }else{
            $namagambar = $filegambar->getName();
            $filegambar->move('assets/image/product/', $namagambar);
            unlink('assets/image/product/'.$this->request->getVar('gambarlama'));
        }
        $data = array(
            'product_name'        => $this->request->getPost('product_name'),
            'product_price'       => $this->request->getPost('product_price'),
            'product_category_id' => $this->request->getPost('product_category'),
            'deskripsi'           => $this->request->getPost('deskripsi'),
            'image'               => $namagambar
        );
        $this->product_model->updateProduct($data,$id);
        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Di Update!
      </div>');
       return redirect()->to('/product');
        
    }


    public function delete($product_id)
    {

        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }
        
        // $product=$this->$this->db->table('product');
        $product=$this->product_model->find($product_id);

        //cek file gambar default
        // if($product=array('image') !='default.jp'){
        // menghapus gambar
            unlink('assets/image/product/'.$product['image']);
     
         $this->product_model->deleteProduct($product_id);

        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
      </div>');

        return redirect()->to('/product');
    }

  
}