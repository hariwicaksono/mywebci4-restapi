<?php namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['post_id', 'name', 'email', 'body', 'active', 'created_at', 'updated_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $skipValidation     = true;

    public function getComment($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['post_id' => $id, 'active' => 'true'])->getResultArray();
        }  
    }
     
    public function insertComment($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
 
    public function updateComment($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
 
    public function deleteComment($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

    public function count_comment()
	{
		return $this->countAll();
	}

}