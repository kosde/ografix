<?php
    echo " inicio ";
    /*require "/path/to/file";
    require_once __DIR__."conekta-php\lib\Conekta.php";
    require_once("conekta-php\lib\Conekta.php");*/
    
    require_once("./lib/conekta/Conekta.php");
    echo " require_once ";
    \Conekta\Conekta::setApiKey("key_CphnWhrFkgdtLGVeixFT2zQ");
    \Conekta\Conekta::setApiVersion("2.0.0");//4.3.0  2.0.0
    echo " setApiVersion ";
    $validCustomer = [
        'name' => "Payment Link Name",
        'email' => "Juan Perez",
        'phone' => "4443154529"
    ];
    echo " validCustomer ";
    $customer = Customer::create($validCustomer);
    //$customer = Customer::create($validCustomer);
    echo " customer ";
    echo $customer->livemode;
    echo $customer->name;
    echo $customer->email;
    echo $customer->id;
    echo $customer->object;
