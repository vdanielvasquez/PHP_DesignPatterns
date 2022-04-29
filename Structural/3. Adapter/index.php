<?php

//Target / client
interface  Share {
    public function shareData(); //Request
}

//Adapted / Service
class WhatsAppShare {
    public function waShare(String $string) {
        echo "Share data via Whatsapp: ' $string ' \n";
    }
}

class FacebookShare {
    public function fbShare(String $string) {
        echo "<<<< FACEBOOK >>>> ' $string ' \n";
    }
}

class FacebookShareAdapter implements  Share {
    private $facebook;
    private $data;

    public function __construct(FacebookShare $fb, String $data){
        $this->facebook = $fb;
        $this->data = $data;
    }

    public function shareData(){
        $this->facebook->fbShare($this->data);
    }
}

class WhatsAppShareAdapter implements  Share {
    private $whatsapp;
    private $data;

    public function  __construct(WhatsAppShare $whatsapp, String $data){
        $this->whatsapp = $whatsapp;
        $this->data = $data;
    }

    public function shareData(){
        $this->whatsapp->waShare($this->data);
    }
}

function clientCode(Share $share){
    $share->shareData();
}

$wa = new WhatsAppShare();
$waShare = new WhatsAppShareAdapter($wa, "Hello Whatsapp!");
clientCode($waShare);

$fb = new FacebookShare();
$fbShare = new FacebookShareAdapter($fb, "Hello Facebook!");
clientCode($fbShare);