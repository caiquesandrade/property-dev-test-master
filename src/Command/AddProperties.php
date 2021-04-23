<?php

namespace App\Command;

use App\Entity\Property;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Viny\Point;

class AddProperties extends Command {

    protected static $defaultName = 'import.properties';

    CONST PROPERTIES = [
      'House in Golders Green' => '51.57208, -0.19321',
      'Flat in Golders Green' => '51.57127, -0.20275',
      'Flat in Garden Suburb' => '51.57599, -0.19861',
      'House in Neasden' => '51.56143, -0.24515',
      'Farm in Chelmsford' => '51.75148, 0.48782',
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
        $runTimes = 3;

        for($i = 1; $i <= $runTimes; $i++ ){
            foreach(self::PROPERTIES as $title => $location){
                $bedroom = rand(1, 5);
                $latLng = explode(',', $location);
                $latitude = trim($latLng[0]);
                $longitude = trim($latLng[1]);

                $property = new Property();
                $property->setBedrooms($bedroom);
                $property->setTitle($bedroom.' Bedroom '.$title);
                $property->setLatitude($latitude);
                $property->setLongitude($longitude);
                $property->setPoint(new Point($latitude, $longitude));

                $this->em->persist($property);
                $this->em->flush();
            }
        }

        $output->writeln('Properties added with success');

        return COMMAND::SUCCESS;
    }
}