<?php

//Strategy interface
interface PaymentGateway {
    public function pay($amount);
}

//Concrete strategy
class PayByDcCc implements PaymentGateway {
    public function pay($amount) {
        echo "Paid $amount via Debit / Credit card \n";
    }
}

//Concrete strategy
class PayByPaypal implements PaymentGateway {
    public function pay($amount) {
        echo "Paid $amount via PayPal \n";
    }
}

//Context
class Order {
    private PaymentGateway $paymentGateway;

    public function setPaymentGateway(PaymentGateway $paymentGateway){
        $this->paymentGateway = $paymentGateway;
    }

    public function pay($amount){
        $this->paymentGateway->pay($amount);
    }
}

//Client code
$order = new Order();
$order->setPaymentGateway(new PayByDcCc());
$order->pay(200);


$order->setPaymentGateway(new PayByPaypal());
$order->pay(133);