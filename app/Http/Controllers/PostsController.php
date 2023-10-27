<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;
use Illuminate\Support\Facades\Storage;

use Spatie\Html\FormFacade as Form;//

class PostsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10); 
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' =>'image|nullable|max:1999'
        ]);
        // Handle File Upload
         if ($request->hasFile('cover_image')) {
            // Get file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // FileName to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

       // Create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        //check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        $post = Post::find($id);
        // Handle File Upload
         if ($request->hasFile('cover_image')) {
            // Get file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // FileName to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

             // Delete the previous cover image if it's not the default one
            if ($post->cover_image !== 'noimage.jpg') {
                Storage::delete('public/cover_images/' . $post->cover_image);
            }

            // Update the post with the new cover image
            $post->cover_image = $fileNameToStore;
        }

        // Update other post attributes
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy($id)
{
    $post =Post::find($id);

    //check for correct user
    if(auth()->user()->id !==$post->user_id){
        return redirect('/posts')->with('error', 'Unauthorized Page');
    }
    // Fetch the cover image before deleting
    $coverImage = $post->cover_image;

    // Delete the post
    $post->delete();

    // Delete the previous cover image if it's not the default one
    if ($coverImage !== 'noimage.jpg') {
        Storage::delete('public/cover_images/' . $coverImage);
    }

    return redirect('/posts')->with('success', 'Post Removed');

}


}
