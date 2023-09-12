<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Models\Category;
use Faker\Core\File;

class ContentController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('content.home',['blogs'=>$blogs]);
    }
    public function createBlog(){
        $blog = new Blog();
        $cats = Category::all();
        return view('content.write_blog',['blog'=>$blog,'cats'=>$cats]);
    }
    public function storeBlog(BlogRequest $request){

        date_default_timezone_set("Asia/Bangkok");
        $name = $request->file('image')->hashName();
        $request->file('image')->storeAs('public/images/',$name);

        $blog = new Blog();
        $blog->user_id = 1;
        $blog->topic = $request->topic;
        $blog->category_id = $request->category;
        $blog->content = $request->content;
        $blog->image_name = $name;
        $blog->last_update = date('Y-m-d H:i:s');
        $blog->save();
        return redirect('/');
    }

    public function editBlog($id){
        $blog = Blog::findORFail($id);
        $cats = Category::all();
        return view('content.write_blog',['blog'=>$blog,'cats'=>$cats]);
    }
    public function updateBlog(BlogRequest $request, $id){
        date_default_timezone_set("Asia/Bangkok");
        
        

        $blog = Blog::findOrFail($id);
        $blog->topic = $request->topic;
        $blog->category_id = $request->category;
        $blog->content = $request->content;
        if($request->hasFile('image')){
            $oldImage = $blog->image_name;;
            unlink(storage_path('app/public/images/'.$oldImage));
            $name = $request->file('image')->hashName();
            $request->file('image')->storeAs('public/images/',$name);
            $blog->image_name = $name;
        }
       
        $blog->last_update = date('Y-m-d H:i:s');
        $blog->save();
        return redirect('/');
        return "Update Success";
    }
}

