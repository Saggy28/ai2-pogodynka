<?php

namespace App\Controller;

use App\Entity\Location;
use App\Repository\MeasurementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WeatherController extends AbstractController
{
    #[Route('/weather/{name}', name: 'app_weather')]
    public function city(Location $name, MeasurementRepository $repository): Response
    {
        $measurements = $repository->findByLocationName($name);



        return $this->render('weather/city.html.twig', [
            'location' => $measurements[0]->getLocation(),
            'measurements' => $measurements,
        ]);
    }
}
