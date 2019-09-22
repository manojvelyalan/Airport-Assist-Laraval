@extends('layouts.common')

@section('content')

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> List All Actions</h1>
                </div>
            <span class="float-right"><a href="{{URL::to('/admin/action/create')}}" class="btn btn-danger text-uppercase">Create Action</a></span>
            
        </div>

        <div class="row">
        <div class="container">
                <div class="tile pb-5">    
                    
                    <div class="tile-body ">
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        @if($allActions->count() > 0)
                            <table class="table table-hover table-bordered" id="tblAction">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Action Title</th>                                                              
                                    <th>Status</th>
                                    <th>Created Time</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allActions as $allAction)
                                    <tr>
                                        <td>{{++$count }}</td>                                     
                                        <td>{{($allAction->title != "" ? $allAction->title:"-")}}</td>  
                                        <td>{{($allAction->status == 1 ?"Active":"Not Active")}}</td> 
                                        <td>{{$allAction->created_at}}</td> 
                                       
                                        <td>
                                        {{ Form::open(array('url' => '/admin/action/' . $allAction->id, 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{Form::button('<i class="fa fa-trash"></i>', ['type' =>'submit', 'class' => 'btn btn-danger'])}}
                                        {{ Form::close() }}
                                        </td>             
                                        <td><a href = "{{ URL::to('/admin/action/' . $allAction->id . '/edit') }}" class="btn btn-info "><i class="fa fa-pencil-square-o"></i></a></td>
                                    </tr>
                                @endforeach
                                      
                            </tbody>
                        </table>
                        
                         @else
                            <div class="alert alert-danger"><p>No Actions are available.</p></div>
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

@endsection