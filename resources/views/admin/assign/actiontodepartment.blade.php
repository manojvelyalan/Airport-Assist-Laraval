@extends('layouts.common')

@section('content')
<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-pencil-square-o"></i>Assign Action To Department</h1>
            </div>
        </div>
        <div class="row">
        <div class="container">
                <div class="tile pb-5">

                    <div class="tile-body ">
                    @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                            <div id="assignStatus" class="alert alert-success d-none text-center"></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-control-label">DEPARTMENTS</label>
                                </div>
                                <div class="col-md-6 form-group">
                                   <select name="department" id="admindepartment" class="form-control field_size place_holder">
                                       <option value="">Select Department</option>
                                       @foreach($departments as $department)
                                        <option value="{{$department->id}}" {{ ($departmentId == $department->id) ? "selected":"" }}>{{$department->title}}</option>
                                    @endforeach
                                   </select>
                                   @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="row">
                                  <div class="col-md-12 mt-3 mb-3">
                                      <h3 class="text-center">ACTIONS</h3>
                                  </div>
                            </div>
                            <div class="row">
                                @foreach($actions as $action)
                                    <div class="col-md-4"> <input type = "checkbox" value ="{{$action->id}}" name = "action[]" {{(in_array($action->id,$actionList))?"checked":""}}>
                                        <label class = "form-control-label">{{$action->title}}</label>
                                    </div>
                                @endforeach



                            </div>

                            @error('action')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="row">
                                  <div class="col-md-12">
                                    <button type="submit" name="assign" class="btn btn-danger text-uppercase float-right {{($departmentId == '')?'d-none':''}}" id="assign">Assign</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
@endsection
