@extends('layouts.common')

@section('content')

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-arrow-circle-o-right"></i> Assigned Airport List </h1>
            </div>
            <span class="float-right"><a href="{{URL::to('/admin/vendors/assign')}}" class="btn btn-success text-uppercase">Assign Vendor</a></span>
        </div>
        <div class="row">
            <div class="container">
                <div class="tile pb-5">                      
                    <div class="tile-body">          
                            <div class="form-group row">
                                <label for="labelVendorName" class="col-md-3 col-form-label text-md-right">{{ __('Vendor Name') }}</label>
                                <div class="col-md-9">
                                    <select id="vendor" type="text" class="form-control @error('vendor') is-invalid @enderror" name="vendor"  autocomplete="vendor" placeholder="Select Vendor">
                                    <option value="" selected>Select Vendor</option>
                                    @foreach($vendors as $vendor)
                                    <option value="{{$vendor->id}}" {{($vendorId == $vendor->id)?"selected":""}}>{{ucwords($vendor->name)}}</option>
                                    @endforeach
                                    </select>
                                    @error('vendor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>        
                    </div>
                </div>
                @if(count($airports) > 0)
                <div class="tile pb-5"> 
                    <div class="tile-body">  
                    @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif 
                    <table class="table table-hover table-bordered" id="tblVendor">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Airport Name</th>  
                                    <th>Priority</th>                                                           
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($airports as $airport)
                                    <tr>
                                        <td>{{++$count }}</td>                                     
                                        <td>{{$airport->airportName}}</td>  
                                        <td>{{$airport->pivot->priority}}</td>
                                        <td>
                                        {{ Form::open(array('url' => '/admin/vendors/' . $vendorId.'/'.$airport->id.'/detach', 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{Form::button('<i class="fa fa-trash"></i>', ['type' =>'submit', 'class' => 'btn btn-danger'])}}
                                        {{ Form::close() }}
                                        </td>             
                                       
                                    </tr>
                                @endforeach
                                      
                            </tbody>
                        </table>
                    </div>
                </div>
                @else 
                    <div class="alert alert-danger"><p>No Airports are available.</p></div>
                @endif
            </div>
        </div>
    </main>
</section>
@endsection

@push('scripts')
<script>
    $("#vendor").change(function(){
        if($("#vendor").val() != ""){
            window.location.replace("/admin/vendors/"+$("#vendor").val()+"/airportlist");		
        }		
    });
</script>
@endpush