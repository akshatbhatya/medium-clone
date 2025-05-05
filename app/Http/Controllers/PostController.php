<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;
use Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=Category::all();
        $posts=Post::orderByDesc("created_at")->paginate(10);
        return view("dashboard",[
            'category'=>$category,
            'posts'=>$posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::all();
        return view("post",[
            "categories"=>$category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $validation = $request->validated();

        $validation["user_id"] = auth()->id();
        $validation["slug"] = Str::slug($request->title);
        $validation["published_at"] = now();
    
        if ($request->hasFile('image')) {
            $image = $request->file(key: 'image');
            $ext = $image->getClientOriginalExtension();
            $imageName = "img_" . time() . '.' . $ext;
            $image->move(public_path('images'), $imageName);
            $url = asset('images/' . $imageName);
            $validation['image'] = $url;
        }
    
        try {
            $res = Post::create($validation);
            if ($res) {
                return redirect()->route("dashboard");
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong: ' . $th->getMessage());
        }
      
    }

    /**
     * Display the specified resource.
     */
    // public function show($username,post $post,$id)
    // {
    //    dd("here");
    // }

    public function show($username, $post, $id)
    {
        $res = Post::find($id);
        return view("detailpage",["data"=>$res]);
    
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}
