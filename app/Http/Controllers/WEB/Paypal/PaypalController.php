<?php

namespace App\Http\Controllers\WEB\Paypal;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class PaypalController extends Controller
{
    public function payment(Request $request)
    {
        return redirect('api/paypal/es');   
    }

    public function status(Request $request)
    {
        
        $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    'AaWfgK41Zazbu6gPYFrOPj3QYX-Jydo-xvJDk8-05Ik1H9us00H_AzFBI7KxmCDeKqW2ji177sQiWdzn',
                    'EP_MuhpYZClaPPobZt18qYskEGfvW_41wpuQZL1tufhie4Ia-lt8-bl0Xk-rarVYSN8kJtI0bS3bw_K_',     // ClientSecret
                )
        );
        
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

        $execution = new \PayPal\Api\PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $apiContext);

        dd($result);

    }

    public function postSuc(Request $request)
    {
        
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        $payment =  \PayPal\Api\Payment::get($paymentId, $this->apiContext);
        dd($payment);

        $execution = new \PayPal\Api\PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        dd($result);

    }

    public function cancel()
    {

    }
}
