# Frenet PHP SDK
This is the official PHP SDK for Integration with Frenet API.

[![Build Status](https://travis-ci.org/FrenetGatewaydeFretes/frenet-php.svg?branch=1.1-develop)](https://travis-ci.org/FrenetGatewaydeFretes/frenet-php)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/57757e8f0394478eb32772438bea5178)](https://www.codacy.com/app/tiagoosampaio/Frenet-PHP?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=tiagosampaio/Frenet-PHP&amp;utm_campaign=Badge_Grade)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/57757e8f0394478eb32772438bea5178)](https://www.codacy.com/app/tiagoosampaio/Frenet-PHP?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=tiagosampaio/Frenet-PHP&amp;utm_campaign=Badge_Coverage)

### About

This is the official SDK (Software Development Kit) for Frenet API. This SDK is intended to help with PHP systems and Frenet API.

### Installation

##### Installing using composer

To install using composer you'll need to have composer installed on your computer so you will be able to install this SDK into your project easily.

Once you have composer installed you just need to require this SDK:

```sh
> composer require frenet/frenet-php
```

### Usage

To start using this SDK into your PHP system is really simple. Take a look in the example right below on how it's really easy to use:

```php
<?php

/**
 * First we need to require the composer autoloader.
 */
require_once './vendor/autoload';

/**
 * This is your token from FRENET API.
 */
$token = '<YOUR TOKEN COMES RIGHT HERE>';

/** @var \Frenet\ApiInterface $api */
$api = \Frenet\ApiFactory::create($token);

/**
 * Here we will create a quote request for sending to API.
 * 
 * @var \Frenet\Command\Shipping\QuoteInterface $quote
 */
$quote = $api->shipping()->quote()
    ->setRecipientCountry('BR')
    ->setSellerPostcode('13015300')
    ->setRecipientPostcode('04011060')
    ->setShipmentInvoiceValue(100.87)
    ->addShippingItem('CWZ_75673_P', 1, 2.1, 14, 20, 15, 'Accessories')
    ->addShippingItem('CWZ_75673_F', 1, 2.1, 14, 20, 17, 'Accessories');

/**
 * The method `execute()` sends the request and parse the body result to a object type.
 * 
 * @var \Frenet\ObjectType\Entity\Shipping\QuoteInterface $result 
 */
$result = $quote->execute();
$services = $result->getShippingServices();

/** @var Frenet\ObjectType\Entity\Shipping\Quote\ServiceInterface $service */
foreach ($services as $service) {
    $price        = $service->getShippingPrice();
    $carrier      = $service->getCarrier();
    $deliveryTime = $service->getDeliveryTime();
    $responseTime = $service->getResponseTime();
    
    /** Do anything you want with this quotation. */
}
``` 
