<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movies;

/**
* @Route("/weeks", name="week_")
*/
class WeekController extends AbstractController
{
    /**
     * @Route("/{weekNum}", name="show", methods={"GET"})
     */
    public function show($weekNum)
    {
        $movies = $this->getDoctrine()->getRepository(Movies::class)->findBy(['week_number' => $weekNum]);
        return $this->json([
            'message' => 'List film week',
            'data' => $movies
        ]);

    }
}
