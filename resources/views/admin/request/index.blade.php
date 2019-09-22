@extends('layouts.common')

@section('content')

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> List All Request</h1>
                </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="tile">
                    <div class="tile-body" style="overflow-x:auto;">
                        @foreach($requestStatus as $requestStat)
                        <div class="d-inline-block mb-2 p-2 ml-2 {{$requestStat->className}}"><h6>{{ucwords($requestStat->title)}}</h6></div>
                        @endforeach
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        @if($requests->count() > 0)

                            <table class="table table-bordered pt-5" id="tblRequest" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Request Id</th>
                                        <th>Email</th>
                                        <th>Airport</th>
                                        <th>Service</th>
                                        <th>Arr Date & Time</th>
                                        <th>Dep Date & Time</th>
                                        <th>Repeat</th>
                                        <th>Responded By</th>
                                        <th>Requested Date</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($requests as $request)
                                
                                <tr class="{{$request->requestStatus->className}}">
                                    <td>{{++$count}}</td>
                                    <td><a href="{{ URL::to('/admin/request/' . $request->id)}}" class="text-danger">{{$request->serviceCode}}</a></td>

                                    <td>{{$request->email}}</td>
                                    <td>{{$request->originAirport}}</td>
                                    <td>{{$request->serviceType->title}}</td>
                                    <td>{{$request->arrivalDate." ".$request->arrivalTime}}</td>
                                    <td>{{$request->departureDate." ".$request->departureTime}}</td>
                                    <td>{{($request->isRepeat)?"Yes":"No"}}</td>
                                    <td>{{($request->respondedBy !="")?$request->respondedUser->email:""}}</td>
                                    <td>{{$request->created_at}}</td>
                                    <td>
                                    @if(in_array($request->request_status_id,[1,2,3]))

                                        {{ Form::open(array('url' => '/admin/request/' . $request->id.'/status')) }}
                                        {{ Form::hidden('_method', 'PUT') }}
                                        {{Form::button(ucwords($request->requestStatus->title), ['type' =>'submit', 'class' => 'btn btn-secondary',])}}
                                        {{ Form::close() }}
                                    @else
                                        {{ucwords($request->requestStatus->title)}}
                                    @endif
                                    </td>
                                    <td>
                                        {{ Form::open(array('url' => '/admin/request/' . $request->id, 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{Form::button('<i class="fa fa-trash"></i>', ['type' =>'submit', 'class' => 'btn btn-danger'])}}
                                        {{ Form::close() }}
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
@endsection
