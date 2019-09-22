@extends('layouts.common')

@section('content')
<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-pencil-square-o"></i> Update Department</h1>
            </div>
        </div>
        <div class="row">
        <div class="container">
                <div class="tile pb-5">    
                    
                    <div class="tile-body ">
                        <form id="createAction" action="{{ action('DepartmentController@update',[$department->id]) }}" method="post">
                        @method('PUT')
                                @csrf               
                            <div class="form-group row">
                            <label for="actionTitle" class="col-md-3 col-form-label text-md-right">{{ __('Department Title') }}</label>

                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"  autocomplete="title" value="{{ $department->title }}">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>   
                            <button name="updateDepartment" type="submit" class="btn btn-danger float-right" id="updateDepartment">Update</button>
                    
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </main>
</section>

@endsection