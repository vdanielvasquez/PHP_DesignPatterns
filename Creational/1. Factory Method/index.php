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
        echo "Ready to be sent to the truck \n";
    }
    public function dispatch(): void {
        echo "On its way to the truck \n";
    }
    public function deliver(): void {
        echo "From the truck is delivered to you \n";
    }
}

class ShipTransport implements  Transport {
    public function ready(): void {
        echo "Ready to be sent to the ship \n";
    }
    public function dispatch(): void {
        echo "From the ship is its way \n";
    }
    public function deliver(): void {
        echo "From the ship is delivered to you \n";
    }
}

interface ITransportFactory {
    public static function getTransport(String $type): Transport;
}

class TransportFactory implements  ITransportFactory {
    public static function getTransport(String $type): Transport
    {
        switch ($type) {
            case "Air":
                return new PlaneTransport();
                break;
            case "Ground":
                return new TruckTransport();
                break;
            case "Sea":
                return new ShipTransport();
                break;
            default:
                throw new \Exception('courier transport not associated \n');
        }
    }
}

//client code
function deliverCourier(String $type){
    try {
        $transport = TransportFactory::getTransport($type);
        $transport->ready();
        $transport->dispatch();
        $transport->deliver();
    } catch (Exception $e) {
        echo "The transport can't be retrieved \n";
    }
}


//creates specific instances
echo "From the air ... \n";
deliverCourier("Air");
echo "-------------------------\n";
echo "From the ground ... \n";
deliverCourier("Ground");
echo "-------------------------\n";
deliverCourier("Sea");
echo "-------------------------\n";
deliverCourier("Nada");
echo "-------------END-------\n";