<?php
namespace App\Repositories;
interface RepositoryInterface{
    /*
     * Get all
     * @return mixed
     */
    public function getAll();
    /**
     * get one 
     * @param $id
     * @return mixed
     */
    public function find($id);
    /**
     * create
     * @param array $attribute
     */
    public function create($attribute=[]);
    /**
     * update 
     * @param $id,array $attribute
     */
    public function update($id,$attribute=[]);
    /**
     * delete
     * @param $id
     */
    public function delete($id);
}