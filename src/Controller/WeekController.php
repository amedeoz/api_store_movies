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
     * @Route("/{week_num}", name="show", methods={"GET"})
     */
    public function show($week_num)
    {
        $movies = $this->getDoctrine()->getRepository(Movies::class)->findBy(['week_number' => $week_num]);
        return $this->json([
            'message' => 'List film week',
            'data' => $movies
        ]);

    }
}
