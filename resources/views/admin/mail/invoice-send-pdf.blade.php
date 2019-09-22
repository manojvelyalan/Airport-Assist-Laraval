<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Murgency Airport Assistance | Invoice</title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

	<style>
	body{
		font-family: "Lato", sans-serif;
	}
	#InvoiceHeader{
		border: collapse;
	}
	#InvoiceHeader .InvoiceHeaderInner{
		border-collapse: collapse;
	}
	.InvoiceHeaderInner tr{
		border-bottom: 1px solid #555;
	}
	.InvoiceHeaderInner td{
		padding: 10px 0;
		font-weight: 100;
		font-size: 15px; 
	}

	#InvoiceName{
		margin:50px auto;
	}

	#InvoiceName th{
		color: #c82328;
		font-size: 30px;
	}

	#InvoiceName td > hr{
		border: 2px dotted #c82328;
		width: 50%;
	}

	#InvoiceDetails{
		border: collapse;
		border-top:3px solid #222; 
	}

	#InvoiceDetails th{
		font-size: 15px;
		font-weight: 600;
		padding: 10px 0;
	}

	#InvoiceDetails td hr{
		border: 1px dotted #222;
	}

	#InvoiceFinalDetails{
		margin-top: 100px;
	}

	#InvoiceFooter {
		border-top: 2px solid #222;
	}

	#InvoiceThankYou{
		margin-top: 100px;
	}

</style>
</head>
<body>

	<table id="InvoiceHeader" width="90%" align="center">
		<tr>
			<th align="left">
				<img src="https://image.ibb.co/moMWnH/logo.png" alt="logo">
			</th>
			<th>
				<table class="InvoiceHeaderInner" width="100%">
					<tr >
						<td align="left" style="border-bottom: 1px solid #222;">Date</td>
						<td align="right" style="border-bottom: 1px solid #222;">{{date('Y/m/d')}}</td>
					</tr>
                                       
					<tr>
						<td align="left" style="border-bottom: 1px solid #222;">Invoice No.</td>
						<td align="right" style="border-bottom: 1px solid #222;">{{strtoupper("INV".$requestDetails->serviceCode)}}</td>
					</tr>
					<tr>
						<td colspan="2" align="left" style="border-bottom: 1px solid #222;">
							<span>To <br>{{ucwords($requestDetails->companyName)}}</span>
						</td>
					</tr>
				</table>
			</th>
		</tr>
	</table>

	<table id="InvoiceName" width="90%" align="center">
		<tr>
			<th align="left" >Invoice</th>
		</tr>
		
	</table>

	<table id="InvoiceDetails" width="90%" align="center">
            <thead>
                <tr>
                    <th><b>Date</b></th>
                    <th><b>Confirmation No.</b></th>
                    <th><b>Guest Name</b></th>
                    <th><b>Service Type</b></th>
                    <th><b>Airport Served</b></th>
                    <th><b>No.</b></th>
                    <th><b>Total Amount<br>(USD)</b></th>
                </tr>
                <tr>
                    <th colspan="7">
                        <hr style="border-color: #000;">					
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td  style="text-align: center">{{($requestDetails->arrivalDate !="")?date('Y/m/d',strtotime($requestDetails->arrivalDate))." ". $requestDetails->arrivalTime : date('Y/m/d',strtotime($requestDetails->departureDate))." ".$requestDetails->departureTime}}</td>
                    <td style="text-align: center">{{$requestDetails->serviceCode}}</td>
                    <td style="text-align: center">{{ucwords($requestDetails->titleName.$requestDetails->firstName." ".$requestDetails->lastName)}}</td>
                    <td style="text-align: center">{{ucwords($requestDetails->service->title)}}</td>
                    <td style="text-align: center">{{ucwords($requestDetails->originAirport)}}</td>
                    <td style="text-align: center">{{(int)$requestDetails->adults + (int)$requestDetails->children + (int)$requestDetails->infants}}</td>
                    <td style="text-align: center">${{number_format($requestDetails->totalAmount,2)}}</td>
                </tr>
                <tr>
                    <td colspan="7"><hr></td>
                </tr>
                <tr>
                    <td><br>Remarks</td>
                    <td colspan="5">{{$requestDetails->invoiceRemarks}}</td>
                </tr>
            </tbody>
	</table>
	<table id="InvoiceThankYou" width="90%" align="center">
            <tr>
                <td align="left">
                        <i>This is computer generated invoice. No signature required.</i>
                </td>
                <td align="right">
                        <h2>THANK YOU</h2>
                </td>
            </tr>
	</table>
	<table id="InvoiceFooter" width="90%" align="center">
            <tr>
                <td>
                    Airport Assist by MUrgency<br>
                    MUrgency Inc.<br>
                    3500 S. DuPont Hwy<br>
                    Dover, DE 19901<br> 
                    USA<br>
                </td>
                <td>
                    Tel / WhatsApp No. +1 650 308 9964
                </td>
                <td>
                    Email. MUAirportAssist@MUrgency.com
                </td>
            </tr>	
	</table>
    </body>
</html>