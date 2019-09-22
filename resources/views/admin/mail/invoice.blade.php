@extends('layouts.common')

@section('content')


<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-envelope-o"></i> Send Invoice</h1>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="tile pb-5">
                <form id="createAction" action="{{ action('MailController@sendInvoice') }}" method="post">
                    @csrf
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="form-group row">
                            <label for="lblInvoiceNumber" class="col-md-3 col-form-label text-md-right">{{ __('Invoice Number') }}</label>

                            <div class="col-md-9">
                                <input id="invoice" type="text" class="form-control @error('invoice') is-invalid @enderror" name="invoice"  autocomplete="invoice" placeholder="Invoice Number">

                                @error('invoice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>




                            <button name="sendInvoice" type="submit" class="btn btn-danger float-right" id="sendInvoice">Send Invoice</button>
                </form>
                    <div class="tile-body ">
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
@endsection
