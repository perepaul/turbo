<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::latest()->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => ['required', 'string'],
            'link' => ['required', 'url'],
            'excerpt' => ['required', 'string', 'min:300'],
            'created_at' => ['required', 'date'],
            'image' => ['required', 'image']
        ]);
        $valid['image'] = $this->uploadFile($request->file('image'));
        Post::create($valid);
        session()->flash('success', 'Post created successfully');
        return redirect()->route('admin.post.index');
    }

    private function uploadFile(UploadedFile $file)
    {
        $filename = Str::random(5) . rand() . Str::random(5) . '.' . $file->extension();
        $file->move(public_path(config('dir.posts')), $filename);
        return $filename;
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
        return view('admin.posts.edit', ['post' => Post::findOrFail($id)]);
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
        $valid = $request->validate([
            'title' => ['required', 'string'],
            'link' => ['required', 'url'],
            'excerpt' => ['required', 'string', 'min:300'],
            'created_at' => ['required', 'date'],
            'image' => ['nullable', 'image']
        ]);
        $post = Post::findOrFail($id);
        if ($request->hasFile('image')) {
            $valid['image'] = $this->uploadFile($request->file('image'));
            if (file_exists($file = public_path(config('dir.posts') . $post->image))) unlink($file);
        }
        $post->update($valid);
        session()->flash('success', 'Post updated successfully');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if (file_exists($file = public_path(config('dir.posts')) . $post->image)) {
            unlink($file);
        }
        $post->delete();
        session()->flash('success', 'Post deleted successfully');
        return back();
    }
}
