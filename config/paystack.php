<?php

/*
 * This file is part of the Laravel Paystack package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /**
     * Public Key From Paystack Dashboard
     *
     */
    'publicKey' => env('PAYSTACK_PUBLIC_KEY', 'pk_test_861768aad573be79b9b34aa6673670d0bfe0bcb6'),

    /**
     * Secret Key From Paystack Dashboard
     *
     */
    'secretKey' => env('PAYSTACK_SECRET_KEY', 'sk_test_bec9826ca933b1c7b4f841c4c1cd3a1d44fa3b35'),

    /**
     * Paystack Payment URL
     *
     */
    'paymentUrl' => env('PAYSTACK_PAYMENT_URL', 'https://api.paystack.co'),

    /**
     * Optional email address of the merchant
     *
     */
    'merchantEmail' => env('MERCHANT_EMAIL', 'support@filemarket.com'),

];
