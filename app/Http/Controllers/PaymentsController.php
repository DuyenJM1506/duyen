<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;
use Sanpham;
use Donhang;

class PaymentsController extends Controller
{
    public function paypal()
    {
        $provider = new ExpressCheckout;      // To use express checkout.
        $provider = new AdaptivePayments;     // To use adaptive payments.
        $provider->setApiCredentials($config);

        $provider->setCurrency('USD')->setExpressCheckout($data);

        $options = [
            'BRANDNAME' => 'ARMY FASHION Shop',
            'LOGOIMG' => '',
        ];
        $provider->addOptions($options)->setExpressCheckout($data);
    }

    public function ExpressCheckout()
    {
        $data = [];
        $data['items'] = [
            [
                'name' => $sp_ten,
                'price' => $sp_giaBan/22000,
                'qty' => $dh_soLuong
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = url('/payment/success');
        $data['cancel_url'] = url('/cart');

        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }

        $data['total'] = $total;

        $response = $provider->setExpressCheckout($data);

        // Use the following line when creating recurring payment profiles (subscriptions)
        $response = $provider->setExpressCheckout($data, true);

        // This will redirect user to PayPal
        return redirect($response['paypal_link']);

        $response = $provider->getExpressCheckoutDetails($token);
        $response = $provider->doExpressCheckoutPayment($data, $token, $PayerID);
    }
    
    public function Pay()
    {
        PayPal::setProvider('adaptive_payments');
        $data = [
            'receivers'  => [
                [
                    'email' => 'janedoe@example.com',
                    'amount' => $dh_tongcong/22000,
                    'primary' => true
                ]
            ],
            'payer' => 'EACHRECEIVER', // (Optional) Describes who pays PayPal fees. Allowed values are: 'SENDER', 'PRIMARYRECEIVER', 'EACHRECEIVER' (Default), 'SECONDARYONLY'
            'return_url' => url('payment/success'), 
            'cancel_url' => url('payment/cancel'),
        ];
        
        $response = $provider->createPayRequest($data);
        $redirect_url = $provider->getRedirectUrl('approved', $response['payKey']);
        return redirect($redirect_url);
    }
 
}
