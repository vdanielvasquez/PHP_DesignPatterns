<?php

//Base Component
interface Pizza{
    public function getDescription(): String;
    public function getCost(): Float;
}

//Concrete Component
class Pepperoni implements Pizza {
    public $cost;
    public function getDescription(): String {
        return "Pizza: <<Pepperoni>>";
    }

    public function getCost(): float {
        return 35;
    }
}

class Barbacoa implements Pizza {
    public function getDescription(): String {
        return "Pizza: <<Barbacoa>>";
    }

    public function getCost(): float {
        return 90;
    }
}

//Base Decorator
class PizzaToppings implements Pizza{
    protected $pizza;

    public function __construct(Pizza $pizza){
        $this->pizza = $pizza;
    }

    public function getDescription(): String {
        return $this->pizza->getDescription();
    }

    public function getCost(): float {
        return $this->pizza->getCost();
    }
}

class Cheese extends PizzaToppings {

    public function getDescription(): String {
        return parent::getDescription(). " with extra cheese";
    }

    public function getCost(): float {
        return parent::getCost() + 3;
    }
}

class Ham extends PizzaToppings {

    public function getDescription(): String {
        return parent::getDescription(). " with Ham";
    }

    public function getCost(): float {
        return parent::getCost() + 0.3;
    }
}

function makePizza(Pizza $pizza) {
    echo ">>> Your order: ". $pizza->getDescription(). " costs:". $pizza->getCost(). " \n\n";
}

$pizza = new Pepperoni();
$pizza = new Cheese($pizza);
//$pizza = new Ham($pizza);

makePizza($pizza);

//$pizza2 = new Barbacoa();
//$pizza2 = new Cheese($pizza2);
//makePizza($pizza2);