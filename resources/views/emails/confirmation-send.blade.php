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

		</tr>
	</table>
    <table style="border:1px solid black;"  width="90%" align="center" cellpadding="0" cellspacing="0">
        <tr >
            <td style="border-bottom:1px solid black;text-align: center;padding: 10px;width:300px">CONFIRMATION NO.:</td>
            <td style="border-bottom:1px solid black;border-left:1px solid black;text-align: left;padding: 10px;">{{$request->cNumber}}</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid black;text-align: center;padding: 10px;">PASSENGER'S NAME(S)</td>
            <td style="border-bottom:1px solid black;border-left:1px solid black;text-align: left;padding: 10px;">{{$request->pName}}</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid black;text-align: center;padding: 10px;">NO. OF PASSENGER</td>
            <td style="border-bottom:1px solid black;border-left:1px solid black;text-align: left;padding: 10px;">{{$request->noPassengers}}</td>
        </tr>

        <tr>
            <td style="border-bottom:1px solid black;text-align: center;padding: 10px;">SERVICE LOCATION (AIRPORT)</td>
            <td style="border-bottom:1px solid black;border-left:1px solid black;text-align: left;padding: 10px;">{{$request->serviceLocation}}</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid black;text-align: center;padding: 10px;">SERVICE TYPE</td>
            <td style="border-bottom:1px solid black;border-left:1px solid black;text-align: left;padding: 10px;">{{$request->serviceType}}</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid black;text-align: center;padding: 10px;">ARRIVAL DATE</td>
            <td style="border-bottom:1px solid black;border-left:1px solid black;text-align: left;padding: 10px;">{{$request->arrivalDate}}</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid black;text-align: center;padding: 10px;">ETA </td>
            <td style="border-bottom:1px solid black;border-left:1px solid black;text-align: left;padding: 10px;">{{$request->eta}}</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid black;text-align: center;padding: 10px;">DEPARTURE DATE</td>
            <td style="border-bottom:1px solid black;border-left:1px solid black;text-align: left;padding: 10px;">{{$request->departureDate}}</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid black;text-align: center;padding: 10px;">ETD </td>
            <td style="border-bottom:1px solid black;border-left:1px solid black;text-align: left;padding: 10px;">{{$request->etd}}</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid black;text-align: center;padding: 10px;">FLIGHT NO</td>
            <td style="border-bottom:1px solid black;border-left:1px solid black;text-align: left;padding: 10px;">{{$request->flightNumber}}</td>
        </tr>

        <tr>
            <td style="border-bottom:1px solid black;text-align: center;padding: 10px;">PASSENGER CONTACT NO.</td>
            <td style="border-bottom:1px solid black;border-left:1px solid black;text-align: left;padding: 10px;">{{$request->pNumber}}</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid black;text-align: center;padding: 10px;">DRIVER CONTACT NO.</td>
            <td style="border-bottom:1px solid black;border-left:1px solid black;text-align: left;padding: 10px;">{{$request->dNumber}}</td>
        </tr>

        <tr>
            <td style="border-bottom:1px solid black;text-align: center;padding: 10px;">NAME SIGN</td>
            <td style="border-bottom:1px solid black;border-left:1px solid black;text-align: left;padding: 10px;">{{$request->nameSign}}</td>
        </tr>

        <tr>
            <td style="text-align: center;padding: 10px;">REMARKS</td>
            <td style="border-left:1px solid black;text-align: left;padding: 10px;">{{$request->remarks}}</td>
        </tr>

    </table>
    <div style="font-style:italic;font-weight: bold;font-size:12px;margin-left: 65px;">*Kindly please cross-check above mentioned details as our common reference.</div>
    <div style="margin-left:65px;margin-top: 30px;width: 90%;">
        <label style="font-weight:bold;text-decoration: underline;font-size:25px;"><b>Product Details</b></label>
    </div>
    <div style="margin-left:65px;margin-top: 30px;width: 90%;">
        <label style="font-weight:bold;font-size:18px;"><b>ARRIVAL MEET AND ASSIST SERVICE:</b></label>
        <p>
            Please note that the greeter will be waiting in arrivals gate holding a Nameboard with passenger’s name. In this, kindly inform the passenger to approach the greeter holding a name sign with his/her name.
        </p>
    </div>
    <div style="margin-left:65px;margin-top: 30px;width: 90%;">
        <label style="font-weight:bold;font-size:18px;"><b>DEPARTURE MEET AND ASSIST SERVICE:</b></label>
        <p>
            Kindly please make sure that transportation details or passengers number has been provided 3 days to minimum 1 day prior to the service date to coordinate the meeting point and exact time of service prior to the Expected Time of Departure of the passenger on the above-mentioned service location.
        </p>
    </div>
    <div style="margin-left:65px;margin-top: 30px;width: 90%;">
        <label style="font-weight:bold;font-size:18px;"><b>TRANSIT MEET AND ASSIST SERVICE:</b></label>
        <p>
        For Transit Meet and Assist please note and make sure that the luggage’ are checked through till the final destination.  The greeter will be waiting in aerobridge holding a Nameboard with passenger’s name. In this, kindly inform the passenger to approach the greeter holding a name sign with his/her name.
       </p>
    </div>
 <div style="margin-left:65px;margin-top: 30px;width: 90%;">
     <label style="font-weight:bold;font-size:18px;"><b>BOOKING TERMS AND CONDITIONS:</b></label>

        <ul>
            <li>Booked and bindingly confirmed services can be cancelled / rescheduled free of charge up to 96 hours ((local time of airport, arrival / departure) before the service is to be
performed.</li>
            <li>Booked and bindingly confirmed services will incur 50% of fees upto 48 hours (local time of airport, arrival /departure) before the service is to be
performed.</li>
            <li>Booked and bindingly confirmed services will incur 100% of fees upto 24 hours (local time of airport, arrival /departure) before the service is to be
performed.</li>
            <li>Cancellations / Rescheduling must be done in e-mail with date and time stamp.</li>
            <li>Passengers, who do not show up for their booked services (no show departure) or who are not seen at their booked flight (no show arrival / transit) will be charged 100 % of the service charge.</li>
        </ul>

    </div>
    <br><br>
	<table id="InvoiceFooter" width="90%" align="center">
            <tr>
                <td>
                    E-LOB Office No: E-14F-07<br>
                    Hamriya Free Zone - Sharjah<br>
                    United Arab Emirates, PO Box No: 53900
                </td>
                <td>
                    Tel. +971 4 324 5690
                </td>
                <td>
                    Email. MUAirportAssist@MUrgency.com
                </td>
            </tr>
	</table>
    </body>
</html>
