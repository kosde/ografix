//import conekta from '../conekta-node/lib/conekta.js';
//import { customer } from '../conekta-node/lib/conekta.js';
//const conekta = createR
//import conekta from "../conekta-node/lib/conekta.js";
//import { default as conekta } from "../conekta-node/lib/conekta.js";
//import { conekta as conekta } from "../conekta-node/lib/conekta.js";
const assert = require('assert');
const nock = require('nock');
const fs = require('fs');
const _ = require('underscore');

const conekta = require("../conekta-node/lib/conekta.js");
//var conekta = require("../conekta-node/lib/conekta.js");
api_key = 'key_shUYg3ZZr5wxdpD1fs9kqA';
locale = 'es';
let customer = conekta.create({
    name: "Payment Link Name",
    email: "juan.perez@conekta.com"
  }, function(err, res) {
      if(err){
        console.log(err);
        return;
      }
      console.log(res.toObject());
  });
/*
conekta.Order.create({
    "currency": "MXN",
    "customer_info": {
        "name": "Jul Ceballos",
        "phone": "+5215555555555",
        "email": "jul@conekta.io"
    },
    "line_items": [{
        "name": "Box of Cohiba S1s",
        "unit_price": 35000,
        "quantity": 1
    }],
    "charges": [{
        "payment_method": {
        "type": "card",
        "token_id": "tok_test_visa_4242"
        }
    }]
}).then(function (result) 
{
    console.log(result.toObject())
},function (error){
    console.log(error)
})
let checkoutOrderObject = {
    "currency": "MXN",
    "customer_info": {
        "customer_id": customer.id
    },
    "line_items": [{
        "name": "Box of Cohiba S1s",
        "unit_price": 300000,
        "quantity": 1
    }],
    "checkout": {
        "allowed_payment_methods": ["cash", "card", "bank_transfer"],
        "force_3ds_flow": false,
        "monthly_installments_enabled": false,
        "monthly_installments_options": [3,6,9,12,18],
        "expires_at": 1609891200
    },
    "shipping_contact": {
        "phone": "5555555555",
        "receiver": "Marvin Fuller"
    }
};
conekta.Order.create(checkoutOrderObject, function(err, res) {
    if(err){
        console.log(err);
        return;
    }
    console.log(res.toObject());
});*/
