@extends('layouts.common')

@section('content')

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-excel-o"></i> Individual Report</h1>
            </div>
        </div>
        <div class="row">
        <div class="container">
                <div class="tile pb-5">
                    <div class="tile-body ">
                      <form method="post" id="search" action="{{ action('ReportController@respond') }}">
                        @csrf
                          <div class="row mt-4 mb-4">
                              <div class="col">
                                   <input type="text" name="fromDate" value="{{$fromDate}}" placeholder="From Date" class="form-control" id="fromDate">
                              </div>
                              <div class="col">
                                  <input type="text" name="toDate" value="{{$toDate}}" placeholder="To Date" class="form-control" id="toDate">
                              </div>
                              <div class="col-md-2">
                                <input type="submit" name="search" value="Search" class="btn btn-danger mb-2">
                              </div>
                          </div>

                      </form>

                    </div>

                </div>
        </div>
      </div>
      <div class="row">
        <div class="container">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-bordered" id="requestTable">
                  <thead>
                      <tr>
                          <th>Total Request</th>
                           @foreach($users as $user)
                          <th>{{$user->username}}</th>
                           @endforeach
                      </tr>
                      <tr>
                        <td>{{$totalRequest}}</td>
                          @foreach($users as $user)
                            <td>{{$user->userResponded($user->id,$fromDate,$toDate)}}</td>
                          @endforeach
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </main>
</section>
@push('scripts')
<script type="text/javascript">
    $("#fromDate").datepicker();
    $("#toDate").datepicker();
</script>
@endpush
