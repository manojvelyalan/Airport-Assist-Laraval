@extends('layouts.common')
@section('content')
    <section class="adminpage-section">

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-file-text"></i> Blog Details</h1>
                </div>
            </div>

            <div class="tile">
                <div class="tile-header">
                    <h3>Blog Details</h3>
                </div>
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="payment-detaile-table">
                        <tbody>
                            <tr>
                                <td>Title</td>
                                <td>{{$blog->title}}</td>
                            </tr>
                            <tr>
                                <td>Content</td>
                                  <td><div>{!! $blog->content !!}</div></td>
                            </tr>
                            <tr>
                                <td>Tags</td>
                                <td>{{$blog->tags}}</td>
                            </tr>

                            <tr>
                                <td>Type</td>
                                <td>{{$blog->type}}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{$blog->category->title}}</td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td><img src="{{URL::asset('images/blog/'.$blog->image)}}" class="img-thumbnail" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </main>
    </section>
@endsection
