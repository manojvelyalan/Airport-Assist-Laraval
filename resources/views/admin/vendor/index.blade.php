@extends('layouts.common')

@section('content')

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> List All Vendors</h1>
                </div>
            <span class="float-right"><a href="{{URL::to('/admin/vendor/create')}}" class="btn btn-danger text-uppercase">Create Vendor</a></span>
            
        </div>

        <div class="row">
        <div class="container">
                <div class="tile pb-5">    
                    
                    <div class="tile-body " style="overflow-x:auto;"> 
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        @if($vendors->count() > 0)
                            <table class="table table-hover table-bordered" id="tblVendor">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>                                                         <th>Contact Person</th>   
                                    <th>Contact Number</th>  
                                    <th>Email</th>      
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vendors as $vendor)
                                    <tr>
                                        <td>{{++$count }}</td>                                     
                                        <td>{{($vendor->name != "") ? $vendor->name:"-"}}</td>  
                                        <td>{{($vendor->contactPerson != "") ? $vendor->name:"-"}}</td> 
                                        <td>{{($vendor->contactNumber != "" )? $vendor->contactNumber:"-"}}</td> 
                                        <td>{{($vendor->email != "" )? $vendor->email:"-"}}</td> 
                                        
                                       
                                        <td>
                                        {{ Form::open(array('url' => '/admin/vendor/' . $vendor->id, 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{Form::button('<i class="fa fa-trash"></i>', ['type' =>'submit', 'class' => 'btn btn-danger'])}}
                                        {{ Form::close() }}
                                        </td>             
                                        <td><a href = "{{ URL::to('/admin/vendor/' . $vendor->id . '/edit') }}" class="btn btn-info "><i class="fa fa-pencil-square-o"></i></a></td>
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