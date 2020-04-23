<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;
use App\Entity\Movies;

/**
* @Route("/weeks", name="week_")
*/
class WeekController extends AbstractController
{
    /**
     * @Route("/{weekNum}", name="show", methods={"GET"})
     * @SWG\Get(
	 * 		path="/weeks/{weekNum}",
	 * 		tags={"weeks"},
	 * 		operationId="weeks",
	 * 		summary="List movies by number week.",
	 * 		@SWG\Response(
	 * 			response=200,
	 * 			description="success",
	 * 		),
	 * 		@SWG\Response(
	 * 			response=400,
	 * 			description="Bad request",
	 * 		),
	 * 	)
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
