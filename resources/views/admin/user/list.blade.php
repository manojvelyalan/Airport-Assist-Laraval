@extends('layouts.common')

@section('content')
<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> Admin List</h1>
                </div>
            <span class="float-right"><a href="{{URL::to('/admin/register')}}" class="btn btn-danger text-uppercase">Create Admin</a></span>

        </div>

        <div class="row">
        <div class="container">
                <div class="tile pb-5">

                    <div class="tile-body ">
                    @if(session('success'))
                            <div class="alert alert-success">{!!session('success')!!}</div>
                        @endif
                        @if($admins->count() > 0)

                            <table class="table table-hover table-bordered" id="tblAdmin">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Admin ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Department</th>
                                    <th>Created Time</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $admin)
                            <tr>
                                        <td>{{++$count }}</td>
                                        <td>{{$admin->id }}</td>
                                        <td>{{($admin->firstName != "" ? ucfirst($admin->firstName):"-")}}</td> <td>{{($admin->lastName != "" ? ucfirst($admin->lastName):"-")}}</td>
                                        <td>{{($admin->username != "" ? $admin->username:"-")}}</td>
                                        <td>{{$admin->department->title}}</td>
                                        <td>{{$admin->created_at}}</td>

                                        <td>
                                        {{ Form::open(array('url' => '/admin/user/' . $admin->id, 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{Form::button('<i class="fa fa-trash"></i>', ['type' =>'submit', 'class' => 'btn btn-danger'])}}
                                        {{ Form::close() }}
                                        </td>
                                        <td><a href = "{{ URL::to('/admin/user/' . $admin->id . '/edit') }}" class="btn btn-info "><i class="fa fa-pencil-square-o"></i></a></td>
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
