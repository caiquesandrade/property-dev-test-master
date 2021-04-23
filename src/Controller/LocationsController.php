<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LocationsController extends AbstractController{

    /**
    * @Route("/")
    */
    public function homePage(){

        return $this->render('home.twig');
    }
}