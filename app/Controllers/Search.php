<?php namespace App\Controllers;

use App\Models\BlogModel;
use CodeIgniter\RESTful\ResourceController;

class Search extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\BlogModel';
    
    public function index()
    {
        $id=$this->request->getVar('id');

        if ($id == null) {
			return $this->respond(['status' => '0','data'=> 'id tidak boleh kosong']);
		} else {
			$search = $this->model->searchBlog($id);
		}
		
        if ($search) {
            $response = [
                'status' => '200',
                'data' => $search
            ];
            return $this->respond($response, 200);
        } else {
            $response = [
                'status' => '404',
                'data' => 'Data Not Found'
            ];
            return $this->respond($response, 404);
        }
    }

}