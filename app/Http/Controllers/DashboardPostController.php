<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Factory ; 
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index' , [
            'posts' => Post::where('user_id' , Auth::user()->id)->get()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => Category::all()
        ]) ; 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'title' => 'required|max:255', 
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'body' => 'required'
        ]) ; 


        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images') ;
        }

        $validatedData['user_id'] = Auth::user()->id ; 
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body) , 100);

        Post::create($validatedData) ; 
        return redirect('/dashboard/posts')->with('success', 'post telah ditambahkan!') ;
        

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // agar kita tidak bisa melihat dan mengubah post buatan author lain 
        if($post->user->id !== Auth::user()->id) {
            abort(403);
        }
        return view('dashboard.posts.show', [
            'post' => $post 
        ]) ; 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // agar kita tidak bisa melihat dan mengubah post buatan author lain 
        if($post->user->id !== Auth::user()->id) {
            abort(403);
        }

        return view('dashboard.posts.edit',[
            'post' => $post , 
            'categories' => Category::all()
        ]) ; 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255', 
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ] ; 
        
        //jadi di cek terlebih dahulu slug yang dikirim ada tidak di database,jika ada langsung lolos kan tanpa melakukan validasi 
        if($request->slug != $post->slug) {
            $rules["slug"] = 'required|unique:posts' ;
        }

        //isi dari rules yang telah dikirim melalui form edit divalidasi terlebih dahulu
        $validatedData = $request->validate($rules) ; 

        //logika ini harus disimpan sesudah di validasi, karena code ini hanya akan menyimpan file nya ke direktori kita bukan untuk dikirim ke database
        if ($request->file('image')) {
            if ($request->oldImage) {
                //storage adalah nama yg diberikan laravel
                //masuk ke storage dan hapus file yang ada di dir yang bernama sesuai request oldImage
                Storage::delete($request->oldImage) ;
            }
            $validatedData['image'] = $request->file('image')->store('post-images') ;
        }

        //jika sudah divalidasi masukan user_id yang diambil dari author atau yang sedang login (ketika login terdapat sesion[id] yang diambil dari id user yang sedang login dan itu otomatis dibuatkan oleh laravel)
        //buat juga excerpt nya yang diambil dari data body yang lolos masuk kategori
        $validatedData['user_id'] = Auth::user()->id ; 
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body) , 100);

        //masukan data ke database
        Post::where('id' , $post->id )  
                ->update($validatedData) ; 

        //redurect jika data berhasil 
        return redirect('/dashboard/posts')->with('success', 'Data berhasil didiupdate') ;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image) ;
        }
        Post::destroy($post->id) ; 
        return redirect('/dashboard/posts')->with('success', 'post telah sukses dihapus') ;
        
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        // Post::class tergantung nama table yg mempunyai data tentang postingan 
        //slug itu mengambil dari field slug 

        return response()->json([
            'slug'=>$slug
            ]) ;
    }
}
