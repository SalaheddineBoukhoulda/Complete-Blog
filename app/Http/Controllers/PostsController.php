<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Post;
use App\Tag;
use Session;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if($categories->count() == 0){
            Session::flash('info','Make sure you have at least one category for the post');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $featured = $request->featured;
        $featured_image_identical_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_image_identical_name);

        $post = Post::create([
            'title' => $request->title,
            'featured' => 'uploads/posts/' . $featured_image_identical_name,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)
        ]);

        $post->tags()->attach($request->tags);

        return redirect()->back();
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
        $post = Post::find($id);
        return view('admin.posts.update')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
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
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $post = Post::find($id);
        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_image_identical_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featured_image_identical_name);
            $post->featured = 'uploads/posts/' . $featured_image_identical_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->update();

        $post->tags()->sync($request->tags);
        Session::flash('success','Post updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','Post has been trashed');
        return redirect()->back();
    }


    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts',$posts);
    }


    public function trunc($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();

        Session::flash('success','Deleted post permanently');

        return redirect()->back();
    }


    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post restored');
        return redirect()->back();
    }



}
