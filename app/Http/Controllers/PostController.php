<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
    {
   //index
    public function index(){
        $postsfromdb=Post::with('user')->paginate(10);
        return view('posts.index',['all'=>$postsfromdb]);
    }
    //show
    public function show(Post $post) {


      //  $object =Post::findOrFail($postid); // if id not found error 404
      //  $singleid=Post::where('id',$postid)->first();
      //  $singleid=Post::where('id',$postid)->get();

        return view('posts.show',['post'=>$post]);
    }
    //create
    public function create(){
        return view('posts.creat');
    }
     ///////
     public function store(){
        //1 - get the user data
        //2- store user data in data base
        //3-redireaction to posts.index
//         if(Auth::guest()){
//            return to_route('auth.login');
//        }

           request()->validate([
                'title'=>['required','min:3'],
                'description'=>['required'],
            ]);
        $description=request()->description;
        $creator=Auth::user()->id;
        $title=request()->title;
        $post =new Post;
        $post->title=$title;
        $post->description=$description;
        $post->user_id=$creator;
        $post->save();

         \Illuminate\Support\Facades\Mail::to($post->user->email)->queue(new \App\Mail\Postcreated($post));

        return to_route('posts.index');
     }
     public function edit(Post $post){
        return view('posts.edit',['post'=>$post]);
     }


    public function update(Post $post){
    // validate
    // authorize
    // update
    // persist
    // redirect

/*
  if(Auth::guest() ){
    return to_route('auth.login');
}
if( $post->user->isNot(Auth::user())){
    return to_route('posts.index');
}*/

        $validataed= request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required '],
            ]);


    $post->update($validataed);
    return to_route('posts.show',$post);

    }
    public function destroy(Post $post){
    //$post=Post::find($postid);
        /*
if(Auth::user()->can('edit-post',$post)){
    dd("deleted");
}
        Gate::authorize('edit-post',$post);
*/
        $post->delete();
        return to_route('posts.index');
    }


}

