@extends('layouts.common')

@section('content')

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> List All Actions</h1>
                </div>
            <span class="float-right"><a href="{{URL::to('/admin/blogs/create')}}" class="btn btn-danger text-uppercase">Create Blog</a></span>

        </div>

        <div class="row">
            <div class="container">
                <div class="tile pb-5">
                  <div class="tile-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                      @if($blogs->count() > 0)
                        @foreach($blogs as $blog)
                          <div class="row mb-4">
                              <div class="col-md-4"><img src="{{URL::asset('images/blog/'.$blog->image)}}" class="img-thumbnail" alt="{{$blog->tags}}"></div>
                              <div class="col-md-8">
                                  <p><a href="{{URL::to('/admin/blogs/'. $blog->id)}}" class="text-dark"><h4>{{$blog->title}}</h4></a></p>
                                  <p><?=substr(strip_tags($blog->content),0,200);?></p>
                                  <span class="float-right">
                                      {{date('d/M/Y',strtotime($blog->created_at))}}<br><br>
                                      {{ Form::open(array('url' => '/admin/blogs/' . $blog->id, 'class' => 'pull-right')) }}
                                      {{ Form::hidden('_method', 'DELETE') }}
                                      {{Form::button('<i class="fa fa-trash"></i>', ['type' =>'submit', 'class' => 'btn btn-danger'])}}
                                      {{ Form::close() }}
                                      <a href = "{{ URL::to('/admin/blogs/' . $blog->id . '/edit') }}" class="btn btn-info mr-1"><i class="fa fa-pencil-square-o"></i></a>
                                 </span>
                              </div>
                          </div>
                        @endforeach

                      @else
                      <div class="alert alert-danger"><p>No blogs are available.</p></div>
                      @endif
                  </div>
                </div>
            </div>
        </div>
  </main>
</section>
@endsection
