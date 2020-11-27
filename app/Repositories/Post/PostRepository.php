<?php
namespace App\Repositories\Post;

use App\Repositories\BaseRepository;
use App\Repositories\Post\PostRepositoryInterface;

class PostRepository extends BaseRepository implements PostRepositoryInterface{
    public function getModel()
    {
        return \App\Models\Post::class;
    }
    public function getPost()
    {
        return $this->model->select('title')->take(5)->get();
    }
}