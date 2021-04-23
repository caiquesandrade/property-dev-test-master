<?php

namespace App\Service;

use App\Entity\Property;
use App\Entity\Location;

class FindProperty {

    /**
     * @param Location $location
     * @param int      $rangeMiles
     * @return Property[]
     */
    public function findProperties(Location $location, int $rangeMiles = 1): array{
        // find properties within $rangeMiles mile range from location
        return [];
    }

    public function findProperty(int $id): Property{
        // return property with given id
        return new Property();
    }

}