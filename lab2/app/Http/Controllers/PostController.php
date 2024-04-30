<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    private $posts = [
        ['id' => 1, 'title' => 'First Post', 'body' => 'This is the body of the first post.', 'image' => 'post.jpg'],
        ['id' => 2, 'title' => 'Second Post', 'body' => 'This is the body of the second post.', 'image' => 'post2.jpeg'],
        ['id' => 3, 'title' => 'Third Post', 'body' => 'This is the body of the third post.', 'image' => 'post.jpg'],
        ['id' => 4, 'title' => 'Fourth Post', 'body' => 'This is the body of the fourth post.', 'image' => 'post2.jpeg'],
    ];

    public function index()
    {
        // return view('index', ["posts" => $this->posts]);
        //---------------------------------------------------------
        // $posts = DB::table('posts')->get();
        // return $posts;
        //--------------------------------------------------------
        $posts = Post::all();
        return view('index', ["posts" => $posts]);
    }

    public function show($id)
    {
        // $post = $this->findPost($id);
        // if ($post) {
        //     return view('show', ["post" => $post]);
        // }
        // return abort(404);
        $post = Post::find($id);
        if($post){
            return view('show', ["post" => $post]);
        }else{
            return abort(404);
        }
    }

    private function file_operation($request){
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $filepath = $image->store($filename,"posts_uploads");
            return $filepath;
        }
        return null;
    }

    public function create()
    {
        return view('create');
    }

    public function store(){
        $request_parms = request();
        $file_path = $this->file_operation($request_parms);
        $request_parms = request()->all();

        $post = new Post();
        $post->title = $request_parms['title'];
        $post->body = $request_parms['body'];
        $post->creator = $request_parms['creator'];
        $post->image = $file_path;
        $post->save();
        //-------------------------
        $posts = Post::all();
        return view('index', ["posts" => $posts]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if($post){
            return view('edit', ["post" => $post]);
        }else{
            return abort(404);
        }
    }

    public function update($id){
        $postData = request()->all();
        $post = Post::find($id);
        
        if($post){
            $post->title = $postData['title'];
            $post->body = $postData['body'];
            $post->creator = $postData['creator'];
            $post->image = $postData['image'];
    
            $post->save();
            return view('show', ["post" => $post]);
        }else{
            return abort(404);
        }
    }
    

    public function destroy($id)
    {
        // $post = $this->findPost($id);
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            $posts = Post::all();
            return view('index', ["posts" => $posts]);
        }
        return abort(404);
    }

    // private function findPost($id)
    // {
    //     foreach ($this->posts as $post) {
    //         if ($post['id'] == $id) {
    //             return $post;
    //         }
    //     }
    //     return null;
    // }
}