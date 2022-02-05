<?php

/**
 * First we need to require the composer autoloader.
 */

use Frenet\ApiFactory;
use Frenet\ApiInterface;
use Frenet\Command\Shipping\QuoteInterface;
use Frenet\ObjectType\Entity\Shipping\Quote\ServiceInterface;

require_once './vendor/autoload.php';

/**
 * This is your token from FRENET API.
 */
$token = '<YOUR TOKEN COMES RIGHT HERE>';

/** @var ApiInterface $api */
$api = ApiFactory::create($token);

$qty = 1;
$weight = 2.1;
$length = 14;
$height = 20;
$width = 15;
$category = 'Accessories';

/**
 * Here we will create a quote request for sending to API.
 *
 * @var QuoteInterface $quote
 */
$quote = $api->shipping()->quote()
    ->setRecipientCountry('BR')
    ->setSellerPostcode('13015300')
    ->setRecipientPostcode('04011060')
    ->setShipmentInvoiceValue(100.87)
    ->addShippingItem('CWZ_75673_P', $qty, $weight, $length, $height, $width, $category)
    ->addShippingItem('CWZ_75673_F', $qty, $weight, $length, $height, $width, $category);

/**
 * The method `execute()` sends the request and parse the body result to a object type.
 *
 * @var \Frenet\ObjectType\Entity\Shipping\QuoteInterface $result
 */
$result = $quote->execute();
$services = $result->getShippingServices();

/** @var ServiceInterface $service */
foreach ($services as $service) {
    $price        = $service->getShippingPrice();
    $carrier      = $service->getCarrier();
    $deliveryTime = $service->getDeliveryTime();
    $responseTime = $service->getResponseTime();

    /** Do anything you want with this quotation. */
}
