<?php

//Subscriber Interface
interface Subscriber {
    public function update($postId);
}

//Publisher
class HealthyMe {
    private $subscribers = array();
    private $post;

    public  function  registerSubscriber(Subscriber $subscriber) {
        $this->subscribers[] = $subscriber;
        echo "Subscriber added! \n";
    }

    public function  notifySubscribers(){
        foreach ($this->subscribers as $subscriber) {
            $subscriber->update($this->post);
        }
    }

    public function  publishPost($post){
        $this->post = $post;
        $this->notifySubscribers();
    }
}

//Concrete Subscriber
class FoodUpdateSubscribers implements Subscriber {
    public function update($postId) {
        echo "Food eaters receiving: $postId \n";
    }
}

class VeganUpdateSubscribers implements  Subscriber {
    public function update($postId) {
        echo "Vegan eaters receiving: $postId \n";
    }
}

$publisher = new HealthyMe();
$subscriber1 = new FoodUpdateSubscribers();
$subscriber2 = new VeganUpdateSubscribers();

$publisher->registerSubscriber($subscriber1);

$publisher->publishPost("##a comer pizza##");
$publisher->publishPost("<<a comer paella>>");

$publisher->registerSubscriber($subscriber2);

$publisher->publishPost("@@a comer kebab@@");