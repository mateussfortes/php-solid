<?php
    // OCP VIOLATION

    class PaymentRequest {
        public function payWithCreditCard() {

        }

        public function payWithPayPal() {
            
        }
    }

    public function pay(Request $request) {
        $payment = new Payment();
        switch($request->type) {
            case 'credit-card':
                $payment->payWithCreditCard();
                break;
            case 'paypal':
                $payment->payWithPayPal();
                break;
            default
                break;
        }
    }


    // FOLLOWING OCP
    interface PayableInterface {
        public function pay();
    }

    class CreditCardPayment implements PayableInterface {
        public function pay() {
            // logic here
        }
    }

    class PaypalPayment implements PayableInterface 
    {
        public function pay() 
        {
            // logic here
        }
    }

    class PaymentFactory {
        public function initialize(string $type): PayableInterface
        {
            switch ($type):
                case 'credit';
                    return new CreditCardPayment(); 
                case 'paypal';
                    return new PaypalPayment();
                default 
                    throw new \Exception("Paymetn method not suported"); 
                    break;

        }
    }

    public function pay(Request $request) 
    {
        $paymentFactory = new PaymentFactory();
        $payment = $paymentFactory->initialize($request->type);
        return $payment->pay();
    }