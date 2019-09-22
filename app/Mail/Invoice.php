<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use PDF;
class Invoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $requestDetails;
    public function __construct($requestDetails)
    {
        $this->requestDetails = $requestDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = $this->createPDF();
        
        return $this->view('emails.invoice-send')
                ->with([
                    'requestDetails' => $this->requestDetails,
                ])
                ->subject("Invoice Details - INV".$this->requestDetails->serviceCode)
                ->attachData($pdf, 'invoice.pdf', [
                    'mime' => 'application/pdf',
                ]);
    }
    public function createPDF(){
		$pdf = PDF::loadView('admin.mail.invoice-send-pdf', ['requestDetails'=>$this->requestDetails]);
		return $pdf->Output();
    }
}
