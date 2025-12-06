<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Store file distorage/app/public/post-images
            // Method store() akan generate nama file unit otomatis
            $imagePath = $request->file('image')->store('post-images', 'public');
        }

        // Validasi input dengan custome message
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            // aturan untuk menambah gambar: opsional(nullable), harus berupa image,format tertentu, maksimal 2MB
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
        ], [ // custme message
            'title.required' => 'Title is required.',
            'title.max' => 'Title cannot exceed 255 characters.',
            'excerpt.required' => 'Excerpt is required.',
            'body.required' => 'Body is required.',
            'category_id.required' => 'Category is required.',
            'category_id.exists' => 'Selected category does not exist.',
            'image.image' => 'Uploaded file must be an image.',
            'image.mimes' => 'format gambar must be jpeg, png, jpg, or gif.',
            'image.max' => 'Image size cannot exceed 2MB.',
        ]);

        // jika validasi gagal, redirect kembali dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // megirim pesan error kemabli
                ->withInput();         // mengirim semua data yang sudah diinput ( old data)
        }

        // Create Post
        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'image' => $imagePath,
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
