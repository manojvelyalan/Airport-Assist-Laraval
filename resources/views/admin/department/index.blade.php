@extends('layouts.common')

@section('content')

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> List All Department</h1>
                </div>
            <span class="float-right"><a href="{{URL::to('/admin/department/create')}}" class="btn btn-danger text-uppercase">Create Department</a></span>
            
        </div>

        <div class="row">
        <div class="container">
                <div class="tile pb-5">    
                    
                    <div class="tile-body ">
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        @if($departments->count() > 0)
                            <table class="table table-hover table-bordered" id="tblDepartment">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Department Name</th>                                                              
                                    <th>Status</th>
                                    <th>Created Time</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $department)
                                    <tr>
                                        <td>{{++$count }}</td>                                     
                                        <td>{{($department->title != "" ? $department->title:"-")}}</td>  
                                        <td>{{($department->status == 1 ?"Active":"Not Active")}}</td> 
                                        <td>{{$department->created_at}}</td> 
                                       
                                        <td>
                                        {{ Form::open(array('url' => '/admin/department/' . $department->id, 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{Form::button('<i class="fa fa-trash"></i>', ['type' =>'submit', 'class' => 'btn btn-danger'])}}
                                        {{ Form::close() }}
                                        </td>             
                                        <td><a href = "{{ URL::to('/admin/department/' . $department->id . '/edit') }}" class="btn btn-info "><i class="fa fa-pencil-square-o"></i></a></td>
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