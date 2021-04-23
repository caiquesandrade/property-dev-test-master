<?php

namespace App\Command;

use App\Entity\Location;
use App\Entity\Property;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Viny\Point;

class AddLocations extends Command {

    protected static $defaultName = 'import.locations';
    CONST LOCATIONS = [
        [
            'name' => 'London',
            'slug' => 'london',
            'latitude' => '51.57238',
            'longitude' => '-0.19586',
        ],
        [
            'name' => 'Golders Green',
            'slug' => 'golders-green',
            'latitude' => '51.57238',
            'longitude' => '-0.19586',
        ],
        [
            'name' => 'Neasden',
            'slug' => 'neasden',
            'latitude' => '51.56094',
            'longitude' => '-0.25359',
        ],
        [
            'name' => 'Chelmsford',
            'slug' => 'chelmsford',
            'latitude' => '51.75148',
            'longitude' => '0.48782',
        ]
    ];

    protected $em;

    function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
        $this->em->getConnection()->getConfiguration()->setSQLLogger(null);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        foreach(self::LOCATIONS as $loc){
            $location = new Location();

            $location->setName($loc['name']);
            $location->setSlug($loc['slug']);
            $location->setLatitude($loc['latitude']);
            $location->setLongitude($loc['longitude']);

            $this->em->persist($location);
            $this->em->flush();
        }

        $output->writeln('Locations added with success');

        return COMMAND::SUCCESS;
    }
}