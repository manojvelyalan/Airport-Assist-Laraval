<!DOCTYPE html>
<html>
    <head>
        <title>Welcome Mail</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            /* latin-ext */
            @font-face {
              font-family: 'Lato';
              font-style: normal;
              font-weight: 400;
              src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v14/S6uyw4BMUTPHjxAwXjeu.woff2) format('woff2');
              unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
              font-family: 'Lato';
              font-style: normal;
              font-weight: 400;
              src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v14/S6uyw4BMUTPHjx4wXg.woff2) format('woff2');
              unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }
            body{
                font-family: 'Lato', sans-serif;
            }
        </style>
    </head>
    <body>
        <div >
            <table style="margin:0px auto;width:710px;box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);" cellpadding="0" cellspacing="0">
                <tr>
                    <td> <img src='https://image.ibb.co/mJ3G27/emailer_two.jpg' width="100%" alt='banner' title="header">

                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="margin-left: 80px;margin-top: 20px;margin-bottom: 20px;">
                            Dear {{$data['fullName']}},
                        </div>
                        <div style='margin-left: 80px;margin-top: 20px;padding-right: 20px;text-align: justify;'>
                            <p>
                                We are pleased to process your request for {{$data['serviceType']}} service at {{$data['airport']}} on {{$data['serviceDate']}}.
                            </p>
                            <p>
                                Please make the payment of USD {{$data['amount']}} {{$data['creditcardCharge']}}by clicking the link
                            </p>
                            <p>
                                <a href="https://www.murgencyairportassistance.com/payment/show/{{$data['serviceCode']}}">https://www.murgencyairportassistance.com/payment/show/{{$data['serviceCode']}}</a>
                            </p>
                            <p>
                                The service will be confirmed by email after receiving the payment.
                            </p>

                            <h3> General Terms & Conditions:</h3>
                            <p>Airports around the world are highly sensitive security clearance required areas. Often, Security Agencies, Airport Authorities and Governments impose unforeseen security restrictions based on their assessment of the security situation at the Airport or even for undisclosed reasons. In some cases, all Airport Assistance services are suspended without notice by Security Agencies, Airport Authorities and Governments which may result in our inability to provide confirmed services due to suspension of services. In such cases, we will provide 100.00% refund of fees paid to us but we will have no choice but to express our regret for not providing the service for reasons beyond our control.</p>
                            <p>Failure to contact Airport Assist by MUrgency, in case the Lead Passenger cannot locate the Airport Assistant, will result as 'Passenger No Show' and no refund will be offered.</p>
                            <p>There is an amendment surcharge of 50% of total booking cost for all amendments made within 48 hours of service time. All amendments made outside 48 hours are free of charge. Some amendments within 48 hours of the service time are not allowed and will be treated as a cancellation, you will be required to make a new booking.</p>
                            <p>No refunds will be offered for any cancellations within 48 hours of the service time. All cancellations made outside 48 hours will be refunded less 5% processing charges.</p>
                            <p>Please feel free to contact us if you have any queries.</p>


                        </div>
                        <div style='margin-left: 80px;margin-top: 20px;margin-bottom: 20px;'>
                            Customer Service Team<br>
                            Airport Assist by MUrgency<br>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="https://preview.ibb.co/eGw6sx/emailer_footer_band.png" width="100%" alt="email_footer" title="footer"/>
                    </td>

                </tr>
                <tr>

                    <td style="text-align: center;"><img src="https://preview.ibb.co/cNfipc/footer_img.png" style="height:70px;width:370px;" alt="MUrgency_logo" title="MUrgency_logo"/>
                    </td>
                </tr>
                <tr>
                     <td style="text-align: center;padding-left: 70px;padding-bottom: 30px;">
                        <a href="https://www.facebook.com/MUAirportAssist"><img  alt="facebook_icon" title="facebook_icon" src="https://murgencyairportassistance.com/assets/images/icons/FacebookDesat.png" style="width:30px;"></a>
                        <a href="https://plus.google.com/s/MUAirportAssist/top"><img  alt="googleplus_icon" title="googleplus_icon" src="https://murgencyairportassistance.com/assets/images/icons/GoogleDesat.png" style="width:30px;" ></a>
                        <a href="https://www.instagram.com/muairportassist/"><img  alt="instagram_icon" title="instagram_icon" src="https://murgencyairportassistance.com/assets/images/icons/InstagramDesat.png" style="width:30px;" ></a>
                        <a href=" https://www.pinterest.com/muairportas0334"><img  alt="pinterest_icon" title="pinterest_icon" src="https://murgencyairportassistance.com/assets/images/icons/PinterstDesat.png" style="width:30px;" ></a>
                        <a href=" https://twitter.com/MUAirportAssist"><img  alt="twitter_icon" title="twitter_icon" src="https://murgencyairportassistance.com/assets/images/icons/TwitterDesat.png" style="width:30px;"></a>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
