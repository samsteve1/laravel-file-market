<?php

namespace App\Jobs\Checkout;

use App\Models\{File, Sale};
use Illuminate\Bus\Queueable;
use App\Events\Checkout\SaleCreated;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateSale implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $_file;
    public $_email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(File $file, $email)
    {
        $this->_file = $file;
        $this->_email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sale = new Sale;

        $sale->fill([
            'identifier'    =>  uniqid(true),
            'buyer_email'   =>  $this->_email,
            'sale_price'    =>  $this->_file->price,
            'sale_commission' => $this->_file->calculateCommission()
        ]);

        $sale->file()->associate($this->_file);
        $sale->user()->associate($this->_file->user);

        $sale->save();

        event(new SaleCreated($sale));
    }
}
