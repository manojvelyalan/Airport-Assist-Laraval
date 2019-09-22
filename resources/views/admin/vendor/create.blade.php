@extends('layouts.common')

@section('content')

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-pencil-square-o"></i> Create Vendor</h1>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="tile pb-5">    
                    
                    <div class="tile-body ">
                        <form id="createAction" action="{{ action('VendorController@store') }}" method="post">
                                @csrf               
                            <div class="form-group row">
                                <label for="actionVendorName" class="col-md-3 col-form-label text-md-right">{{ __('Vendor Name') }}</label>

                                <div class="col-md-9">
                                    <input id="vendorName" type="text" class="form-control @error('vendorName') is-invalid @enderror" name="vendorName"  autocomplete="vendorName">

                                    @error('vendorName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>   
                            <div class="form-group row">
                                <label for="actionContactName" class="col-md-3 col-form-label text-md-right">{{ __('Contact Name') }}</label>

                                <div class="col-md-9">
                                    <input id="contactName" type="text" class="form-control @error('contactName') is-invalid @enderror" name="contactName"  autocomplete="contactName">

                                    @error('contactName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>   
                            <div class="form-group row">
                                <label for="actionContactNumber" class="col-md-3 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                                <div class="col-md-9">
                                    <input id="contactNumber" type="text" class="form-control @error('contactNumber') is-invalid @enderror" name="contactNumber"  autocomplete="contactNumber">

                                    @error('contactNumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label for="actionEmail" class="col-md-3 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-9">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"  autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>   
                            <button name="createVendor" type="submit" class="btn btn-danger float-right" id="createVendor">Submit</button>
                    
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </main>
</section>

@endsection