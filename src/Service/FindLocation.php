<?php

namespace App\Service;

use App\Entity\Location;

class FindLocation {

    public function findLocation($slug): Location{
        // return property with given $slug
        return new Location();
    }

}