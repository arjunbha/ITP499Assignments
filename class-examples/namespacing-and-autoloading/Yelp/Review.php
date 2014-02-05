<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/4/14
 * Time: 5:12 PM
 */

namespace Yelp\Reviews;

use DateTime;

class Review {
    protected $createdAt;

    public function __construct() {
        $this->createdAt = (new DateTime())->format('m-d-YY');
    }

}