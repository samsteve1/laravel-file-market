<?php

namespace App\Mail\Checkout;

use App\Models\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaleConfirmation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $_sale;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Sale $sale)
    {
        $this->_sale = $sale;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your purchase confirmation')->markdown('emails.checkout.confirmation');
    }
}
