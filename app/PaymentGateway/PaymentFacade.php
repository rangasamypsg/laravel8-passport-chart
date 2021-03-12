<?php

namespace App\PaymentGateway;

class PaymentFacade {

    public static function getFacadeAccessor(){

        return "payment";
        
    }
}