<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::with(['photo', 'user', 'postcategory'])
            ->latest()
            ->paginate(5);

        $timeNow = Carbon::now()->toDateString();

        return view('admin.posts.index', compact('posts', 'timeNow'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $postcategories = PostCategory::pluck('name', 'id')
            ->all();
        $users = User::pluck('name', 'id')
            ->all();

        return view('admin.posts.create',compact('postcategories', 'users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->postcategory_id = $request->postcategories[0];
        $post->user_id = Auth::user()->id;
        $post->book = $request->datePost;


        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images/posts', $name);

            $photo = Photo::create(['file'=>$name]);
            $post->photo_id = $photo->id;
        }
        $post['slug'] = Str::slug($request->title, '-');

        $post->save();

        return redirect('admin/posts');
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
        //
        $post = Post::findOrFail($id);
        $postcategories = PostCategory::pluck('name','id')
            ->all();

        return view('admin.posts.edit', compact('post', 'postcategories'));

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
        //
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->postcategory_id = $request->postcategory_id;
        $post->book = $request->datePost;

        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images/posts', $name);
            $photo = Photo::create(['file'=>$name]);
            $post->photo_id = $photo->id;
        }
        $post['slug'] = Str::slug($request->title, '-');

        $post->update();
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
