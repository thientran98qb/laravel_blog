<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\Post\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PostController extends Controller
{
    protected $postRepo;
    public function __construct(PostRepository $postRepo)
    {
        $this->postRepo=$postRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=$this->postRepo->getAll();
        return view('backend.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('backend.posts.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
        $user=$request->user()->id;
        $data=[
            'title'=>$request->title,
            'content'=>$request->content,
            'slug'=>Str::slug($request->title),
            'user_id'=>$user
        ];
        $post=$this->postRepo->create($data);
        $post->categories()->sync($request->category);
        return redirect()->route('admin-post-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::whereId($id)->firstOrFail();
        $categories=Category::all();
        $categorySelected=$post->categories->pluck('id')->toArray();
        return view('backend.posts.edit',compact('post','categories','categorySelected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=$request->user()->id;
        $post=$this->postRepo->update($id,[
            'title'=>$request->title,
            'content'=>$request->content,
            'slug'=>Str::slug($request->title),
            'user_id'=>$user
        ]);
        $post->categories()->sync($request->category);
        return redirect()->route('admin-post-index')->with('update','updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=$this->postRepo->delete($id);
        if($post==true){
            return redirect()->route('admin-post-index')->with('success','Delete Success');
        }
        return redirect()->route('admin-post-index')->with('fail','Delete Fail');
    }
}
