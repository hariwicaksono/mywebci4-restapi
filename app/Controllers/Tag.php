<?php namespace App\Controllers;

use App\Models\BlogModel;
use CodeIgniter\RESTful\ResourceController;

class Tag extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\BlogModel';
    
    public function index()
    {
        $id=$this->request->getVar('category');

        if ($id == null) {
			return $this->respond(['status' => '0','data'=> 'id tidak boleh kosong']);
		} else {
			$data = $this->model->searchTag($id);
		}
		
        if ($data) {
            $response = [
                'status' => '200',
                'data' => $data
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