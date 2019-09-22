<?php

namespace App\Http\Controllers;

use App\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('rights:29',['only'=>['index']]);
         $this->middleware('rights:30',['only'=>['destroy']]);
         $this->middleware('rights:33',['only'=>['approve']]);
     }
    public function index()
    {
        $comments = BlogComment::where('isDelete',false)->orderby('id','desc')->get();
        return view('admin.blog-comment.index',['comments'=>$comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function show(BlogComment $blogComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogComment $blogComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogComment $blogComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogComment $blogComment)
    {
        $blogComment->update([
          'isDelete'=>true,
        ]);
        successFlash('Successfully deleted the blog comment');
        return redirect('admin/blog-comments');
    }
    public function approve(BlogComment $blogComment)
    {
        $blogComment->update([
          'status'=>1,
        ]);
        successFlash('Successfully approved the blog comment');
        return redirect('admin/blog-comments');
    }

}
