<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
    $this->middleware('rights:25',['only'=>['create']]);
    $this->middleware('rights:26',['only'=>['index']]);
    $this->middleware('rights:27',['only'=>['update']]);
    $this->middleware('rights:28',['only'=>['destroy']]);

  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $blogs = Blog::where('status',true)->orderBy('id','desc')->get();
        return view('admin.blogs.index',['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategories = BlogCategory::where('status',true)->orderBy('id','asc')->get();
        return view('admin.blogs.create',['blogCategories'=>$blogCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required'],
            'details'=>['required'],
            'tags'=>['required'],
            'blogCategory'=>['required'],
            'postImage' => ['required','image','mimes:jpeg,png,jpg','max:2048']
        ]);
        if($request->file('postImage') != null){
          // save the file in images/blog folder..

            $image = $request->file('postImage');
            $salt = date('m-d-Y h:i:s')."Airport_Assist_Blog_";
            $newImageName = md5(uniqid($salt).'.'.$image->getClientOriginalExtension());
            $image->move(public_path("images/blog"),$newImageName);

            // create the blog...

            Blog::create([
              'title'=>$request->title,
              'content'=>$request->details,
              'tags'=>$request->tags,
              'type'=>'airport',
              'blog_category_id'=>$request->blogCategory,
              'status'=>true,
              'image'=>$newImageName,
            ]);
            //new blog is created and redirect to listing all the blogs page..

            successFlash('Successfully added the blog');
            return redirect('admin/blogs');

        }else{
          //error happened.. redirect to create page..

          errorFlash('Something went wrong, Please try after soome time');
          return redirect('admin/create');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
      return view('admin.blogs.show',["blog"=>$blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $blogCategories = BlogCategory::where('status',true)->orderBy('id','asc')->get();
        return view('admin/blogs.edit',['blog'=>$blog,'blogCategories'=>$blogCategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
      $request->validate([
          'title'=>['required'],
          'details'=>['required'],
          'tags'=>['required'],
          'blogCategory'=>['required'],
          'postImage' => ['nullable','image','mimes:jpeg,png,jpg','max:2048']
      ]);
      if($request->file('postImage') != null){
        // save the file in images/blog folder..

          $image = $request->file('postImage');
          $salt = date('m-d-Y h:i:s')."Airport_Assist_Blog_";
          $newImageName = md5(uniqid($salt).'.'.$image->getClientOriginalExtension());
          $image->move(public_path("images/blog"),$newImageName);
      }else{
        $newImageName = $blog->image;
      }
      $blog->update([
        'title'=>$request->title,
        'content'=>$request->details,
        'tags'=>$request->tags,
        'blog_category_id'=>$request->blogCategory,
        'image'=>$newImageName,
      ]);
      successFlash('Successfully updated blog');
      return redirect('admin/blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
      $blog->update([
          'status'=>false
      ]);
      successFlash('Successfully deleted the blog.');
      return redirect("admin/blogs");
    }
}
