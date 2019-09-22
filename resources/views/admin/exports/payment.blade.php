<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
      <th>Airport Served</th>
        <th>Service Type</th>
        <th>Transaction Id</th>
        <th>Amount</th>
        <th>Vendor Amount</th>
        <th>Vendor Name</th>
        <th>Vendor Currency</th>
        <th>Payment Date</th>
        <th>Created Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($requests as $request)
        <tr>
            <td>{{ ucwords($request->firstName." ". $request->lastName)}}</td>
            <td>{{ $request->email }}</td>
            <td>{{ ucwords($request->originAirport) }}</td>
            <td>{{ ucwords($request->serviceType->title) }}</td>
            <td>{{$request->paymentdetails->paymentId}}</td>
            <td>{{$request->totalAmount}}</td>
            <td>{{($request->vendorAmount != "")?$request->vendorAmount:"-"}}</td>
            <td>{{($request->vendor_list_id != "")?$request->vendor->name:"-"}}</td>
            <td>{{($request->vendorCurrency != "")?$request->vendorCurrency->currencyName:"-"}}</td>
            <td>{{date('d/m/Y',strtotime($request->paymentdetails->created_at))}}</td>
            <td>{{date('d/m/Y',strtotime($request->created_at))}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
