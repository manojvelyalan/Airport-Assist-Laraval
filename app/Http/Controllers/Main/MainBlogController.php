<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\BlogCategory;
use App\BlogComment;
use App\Common;

class MainBlogController extends Controller
{
  public function __construct(){

    $this->middleware('airport.name');

  }
  public function rules(){
        return [
          'name'=>['required','string'],
          'commentEmail'=>['email','required'],
          'message'=>['required']
        ];
  }

  public function attributes(){
      return [
        'name'=>'name',
        'commentEmail'=>'email',
        'message'=>'comments'
      ];
  }

  public function index(Request $request){

    $blogs = Blog::where('status',1)->orderBy('id','desc')->get();
    $categories = BlogCategory::where('status',1)->get();
    $popularBlogs = Blog::where('status',1)
    ->where('commentsCount','!=',null)
    ->orderBy('commentsCount','desc')->get();

    $pageTitle = "MUrgency Airport Assistance – Travel Tips";
    $pageDescription = "Get the latest in the world of Travel, Airport assistance &amp; ground handling services here";


    return view('main.traveltips.index',['pageTitle'=>$pageTitle,'pageDescription'=>$pageDescription,'displayAirportName'=>$request->session()->get('displayName'),'blogs'=>$blogs,'categories'=>$categories,'popularBlogs'=>$popularBlogs]);

  }

  public function details(Request $request, Blog $blog){
    $pageTitle = "MUrgency Airport Assistance – $blog->title";
    $pageDescription = "Get the latest in the world of Travel, Airport assistance &amp; ground handling services here";

    return view('main.traveltips.details',['blog'=>$blog]);
  }



  public function comments(Request $request){
    Common::validator($request->all(), $this->rules(), $this->attributes())->validate();

    BlogComment::create([
        'author' => strtolower($request->name),
        'status' => false,
        'isDelete'=>false,
        'content'=>$request->message,
        'email'=>strtolower($request->commentEmail),
        'blog_id'=>$request->blog_id,
    ]);
    $title = str_replace(' ','-',$request->title);
    successFlash('Successfully created the comments.');
    return redirect("traveltips/$request->blog_id/$title");
  }

}
