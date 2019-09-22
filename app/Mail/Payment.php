<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Payment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $creditcardCharge = "";
      if($this->request->creditCardCharges != 0){
          $cardCharge = $this->request->creditCardCharges;
          $creditcardCharge = "including  $cardCharge% credit card charges ";
      }
      $titleName = ($this->request->titleName != "")?$this->request->titleName.". ":"";
      $arrivalDate = ($this->request->arrivalDate != "")? date("d/m/Y",strtotime($this->request->arrivalDate)):"";
      $arrivalTime = ($this->request->arrivalTime != "")?$this->request->arrivalTime:"";
      $departureDate = ($this->request->departureDate != "")?date("d/m/Y",strtotime($this->request->departureDate)):"";
      $departureTime = ($this->request->departureTime != "")?$this->request->departureTime:"";
      $serviceCode = $this->request->serviceCode;
       $data = [
        'fullName' => ucwords($titleName.$this->request->firstName." ".$this->request->lastName),
        'serviceDate' => ($arrivalDate !="")?$arrivalDate." ".$arrivalTime: $departureDate." ".$departureTime,
        'serviceType' =>  ucwords($this->request->serviceType->title),
        'amount' =>  number_format($this->request->totalAmount,2),
        'airport'=> ucwords($this->request->originAirport),
        'creditcardCharge'=>$creditcardCharge,
        'serviceCode'=>$serviceCode,
      ];
      return $this->view('emails.payment')
          ->with([
              'data' => $data,
          ])
          ->subject("Payment Link From Airport Assist by MUrgency - $serviceCode");
    }
}
