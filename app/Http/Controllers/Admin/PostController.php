<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Mail\SendEmail;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category = Category::all();
        $posts = Post::all();
        return view('admin.posts.index', compact('posts', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::orderBy('label', 'ASC')->get();
        $categories = Category::all();
        $post = new Post;
        return view('admin.posts.create', compact('tags', 'post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $data = $request->all();
        $post = new Post();

        if (array_key_exists('image', $data)) {
            $img_url = Storage::put('post_images', $data['image']);

            $data['image'] = $img_url;
        }
        $post->fill($data);

        $post->save();
        // VA MESSO DOPO IL SAVE
        if (array_key_exists('tags', $data)) {
            $post->tags()->attach($data['tags']);
        }
        // EMAIL MANDATA DOPO IL SAVE
        $mail = new SendEmail();
        $receiver = Auth::user()->email;
        Mail::to($receiver)->send($mail);


        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.show', compact('post', 'tags', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $post_tags_ids = $post->tags->pluck('id')->toArray();

        return view('admin.posts.edit', compact('tags', 'post', 'categories', 'post_tags_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $data = $request->all();
        $post->fill($data);
        $post->save();
        // VA MESSO DOPO L'UPDATE
        if (!array_key_exists('tags', $data)) $post->tags()->detach();
        else $post->tags()->sync($data['tags']);

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
