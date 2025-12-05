<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menggunakna user_id dari user yang sedang login
        $posts = Post::where('user_id', auth()->user()->id);

        if(request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        // menampilkan 5 data per halaman dengan pagination
        return view('dashboard.index', [
            'posts' => $posts->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua kategories
        $categories = Category::all();
        return view('dashboard.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Generate slug dari title
        $slug = Str::slug($request->title);

        // Pastikan slug unique - jika sudah ada, tambahkan angka di belakangnya
        $original_slug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $original_slug . '-' . $counter;
            $counter++;
        }


        // Create Post
        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
        ]);


        return redirect()->route('dashboard.index')->with('success', 'Post created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
