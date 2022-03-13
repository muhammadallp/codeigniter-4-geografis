<?php
 namespace App\Controllers; 
use App\Models\Product_model;
 
class category extends BaseController
{
    protected $product_model;
    public function __construct()
    {
   
        //membuat user model untuk konek ke database 
        $this->product_model = new Product_model();
        
        //meload validation
        // $this->validation = \Config\Services::validation();
        
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
        'title' =>'Category | Rongsokan',
         'category'=> $model->getCategory()->getResult()
        ];
        return view('category/index', $data);
    }

    public function save()
    {
        $model = new Product_model();
        $data = array(
            'category_name' => $this->request->getPost('category_name'),
            
        );
        $model->savekategori($data);
        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Diedit!
      </div>');
        return redirect()->to('category/');
    }



    public function edit($id)
    {
        $data = array(
            'category_name' => $this->request->getPost('category_name'),
            
        );
        $this->product_model->updatekatagori($data,$id);
        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Di Update!
      </div>');
       return redirect()->to('/category');
        
    }


    public function delete($category_id)
    {
        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

         $this->product_model->deletekatagori($category_id);

        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
      </div>');

        return redirect()->to('/category');
    }

}