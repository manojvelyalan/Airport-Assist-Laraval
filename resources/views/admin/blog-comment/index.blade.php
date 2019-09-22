@extends('layouts.common')

@section('content')

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> List All Blog Comment</h1>
                </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="tile">
                  @if(session('success'))
                      <div class="alert alert-success">{{session('success')}}</div>
                  @endif
                  @if($comments->count() > 0)

                      <table class="table table-bordered pt-5" id="tblBlogComments" >
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Comments</th>
                                  <th>Email</th>
                                  <th>Blog</th>
                                  <th>Created At</th>
                                  <th></th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                          @php ($c = 0)
                          @foreach($comments as $comment)
                              <td>{{++$c}}</td>
                              <td>{{ucfirst($comment->author)}}</td>
                              <td>{{$comment->content}}</td>
                              <td>{{$comment->email}}</td>
                              <td><a href="{{ URL::to('/admin/blogs/' . $comment->id)}}" class="btn btn-info">Details</a></td>
                              <td>{{date("d/m/Y",strtotime($comment->created_at))}}</td>
                              <td>
                                @if(!$comment->status)

                                {{ Form::open(array('url' => '/admin/blog-comment/' . $comment->id. '/approve', 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'PUT') }}
                                {{Form::button('<i class="fa fa-check"></i>', ['type' =>'submit', 'class' => 'btn btn-success'])}}
                                {{ Form::close() }}

                                @else
                                  -
                                @endif
                              <td>
                                  {{ Form::open(array('url' => '/admin/blog-comments/' . $comment->id, 'class' => 'pull-right')) }}
                                  {{ Form::hidden('_method', 'DELETE') }}
                                  {{Form::button('<i class="fa fa-trash"></i>', ['type' =>'submit', 'class' => 'btn btn-danger'])}}
                                  {{ Form::close() }}

                                </td>



                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                  @else
                  <div class="alert alert-danger">Sorry, No blog comments are available</div>
                  @endif
                </div>
            </div>
        </div>
    </main>
</section>
