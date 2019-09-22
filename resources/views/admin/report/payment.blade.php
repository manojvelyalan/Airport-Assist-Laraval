@extends('layouts.common')

@section('content')

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-pencil-square-o"></i> Payment Report</h1>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="tile pb-5">

                    <div class="tile-body ">
                        <form id="createAction" action="{{ action('ReportController@processPaid') }}" method="post">
                                @csrf
                            <div class="form-group row">
                            <label for="lblFromDate" class="col-md-3 col-form-label text-md-right">{{ __('From Date') }}</label>

                            <div class="col-md-9">
                                <input id="fromDate" type="text" class="form-control @error('fromDate') is-invalid @enderror" name="fromDate"  autocomplete="fromDate">

                                @error('fromDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="lblToDate" class="col-md-3 col-form-label text-md-right">{{ __('To Date') }}</label>

                            <div class="col-md-9">
                                <input id="toDate" type="text" class="form-control @error('toDate') is-invalid @enderror" name="toDate"  autocomplete="toDate">

                                @error('toDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>




                            <button name="createDepartment" type="submit" class="btn btn-danger float-right" id="createDepartment">Submit</button>

                        </form>
                        </div>
                </div>
            </div>
        </div>
    </main>
</section>

@endsection
@push('scripts')
<script type="text/javascript">
    $("#fromDate").datepicker();
    $("#toDate").datepicker();
</script>
@endpush
