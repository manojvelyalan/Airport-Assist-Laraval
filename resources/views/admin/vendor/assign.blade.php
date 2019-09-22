@extends('layouts.common')

@section('content')

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-arrow-circle-o-right"></i> Assign Vendor </h1>
            </div>
            <span class="float-right"><a href="{{URL::to('/admin/vendor/create')}}" class="btn btn-success text-uppercase">Create Vendor</a></span>
        </div>
        <div class="row">
            <div class="container">
                <div class="tile pb-5">                      
                    <div class="tile-body">
                        <form id="assignVendor" action="{{ action('VendorController@assignVendor') }}" method="post">
                                @csrf               
                            <div class="form-group row">
                                <label for="labelVendorName" class="col-md-3 col-form-label text-md-right">{{ __('Vendor Name') }}</label>

                                <div class="col-md-9">
                                    <select id="vendor" type="text" class="form-control @error('vendor') is-invalid @enderror" name="vendor"  autocomplete="vendor" placeholder="Select Vendor">
                                    <option value="" selected>Select Vendor</option>
                                    @foreach($vendors as $vendor)
                                    <option value="{{$vendor->id}}">{{ucwords($vendor->name)}}</option>
                                    @endforeach
                                    </select>

                                    @error('vendor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label for="labelAirportName" class="col-md-3 col-form-label text-md-right">{{ __('Airport Name') }}</label>

                                <div class="col-md-9">
                                    <input  class="form-control" name="airportName" placeholder ="Airport Name" id="airportName">
                                    @error('airportName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            
                            <div class="form-group row">
                                <label for="labelPriority" class="col-md-3 col-form-label text-md-right">{{ __('Priority') }}</label>

                                <div class="col-md-9">
                                <select id="priority" type="text" class="form-control @error('priority') is-invalid @enderror" name="priority"  autocomplete="priority" placeholder="Select Priority">
                                    <option value="" selected>Select Priority</option>
                                    @for ($i = 1; $i <= 10; $i++)
                                    <option value=" {{ $i }}"> {{ $i }}</option>
                                    @endfor
                                    </select>

                                    @error('priority')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            <button name="assignVendor" type="submit" class="btn btn-danger float-right" id="assignVendor">Assign</button> 
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
@endsection

@push('scripts')
<script>
$("#airportName").autocomplete({
    minLength: 3,
    source: "/admin/airport/autocomplete",
    focus: function(event, ui) {
        $("#airportName").val(ui.item.airportName.replace(/\w\S*/g, function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }));
        return false;
    },
    select: function(event, ui) {
        $("#airportName").val(ui.item.airportName.replace(/\w\S*/g, function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }));
        return false;
    }
}).data("ui-autocomplete")._renderItem = function(ul, item) {
    return $("<li>").data("ui-autocomplete-item", item).append("<span class='airport-code'>" + item.iata + "</span>" + " " + "<span class='airport-name'>" + item.airportName + "</span>" + "<div class='autocomplete-divider'></div>").appendTo(ul);
};
</script>
@endpush