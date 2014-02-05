<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/4/14
 * Time: 5:12 PM
 */

//require_once __DIR__ . '/Yelp/Review.php';
//require_once __DIR__ . '/OpenTable/Review.php';

require __DIR__ . '/vendor/autoload.php';

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();



use Yelp\Reviews\Review as YelpReview;
use OpenTable\Reviews\Review as OpenTableReview;

$billing = new Hunger\Billing\PayPal();

$review1 = new YelpReview();
$review2 = new OpenTableReview();