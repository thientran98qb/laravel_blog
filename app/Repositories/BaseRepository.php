<?php
namespace App\Repositories;
use App\Repositories\RepositoryInterface;
use PDO;

abstract class BaseRepository implements RepositoryInterface{
    /**
     * model muon tuong tac 
     */
    protected $model;
    public function __construct()
    {
        $this->setModel();
    }
    /**
     * lay model tuong ung
     */
    abstract function getModel();
    /**
     * set model
     */
    public function setModel(){
        $this->model=app()->make($this->getModel());
    }

    public function getAll(){
        return $this->model->all();
    }
    public function find($id){
        $result= $this->model->find($id);
        return $result;
    }
    public function create($attribute=[]){
        return $this->model->create($attribute);
    }
    public function update($id,$attribute=[]){
        $result=$this->find($id);
        if($result){
            $result->update($attribute);
            return $result;
        }
        return false;
    }
    public function delete($id){
        $result=$this->find($id);
        if($result){
            $result->delete();
            return true;
        }
        return false;
    }
}