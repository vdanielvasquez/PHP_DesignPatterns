<?php

//base model
interface Transport {
    public function ready(): void;
    public function  dispatch(): void;
    public function deliver(): void;
}

class PlaneTransport implements  Transport {
    public function ready(): void {
        echo "Courier ready to be sent to the plane \n";
    }

    public function dispatch(): void {
        echo "Courier is on its way to the plane \n";
    }

    public function deliver(): void {
        echo "Courier from the plane is delivered to you \n";
    }
}

class TruckTransport implements Transport {
    public function ready(): void {
        echo "Courier ready to be sent to the truck \n";
    }

    public function dispatch(): void {
        echo "Courier is on its way to the truck \n";
    }

    public function deliver(): void {
        echo "Courier from the truck is delivered to you \n";
    }
}

//creational object
abstract class Courier {
    abstract function  getCourierTransport(): Transport;

    public function sendCourier() {
        $transport = $this->getCourierTransport();
        $transport->ready();
        $transport->dispatch();
        $transport->deliver();
    }
}

class AirCourier extends Courier {

    function getCourierTransport(): Transport {
        return new PlaneTransport();
    }
}

class GroundCourier extends Courier {

    function getCourierTransport(): Transport {
        return new TruckTransport();
    }
}


//client code
function deliverCourier(Courier $courier){
    $courier->sendCourier();
}


//creates specific instances
echo "From the air ... \n";
deliverCourier(new AirCourier());

echo "From the ground ... \n";
deliverCourier(new GroundCourier());