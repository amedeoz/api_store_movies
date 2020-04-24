<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
Use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;
use App\Entity\Weeks;
use App\Entity\Movies;


/**
* @Route("/weeks", name="week_")
*/
class WeekController extends AbstractController
{
    /**
     * @Route("/search_week/{weekNum}", name="search_week", methods={"GET"})
     * @SWG\Get(
	 * 		path="/weeks/search_week/{weekNum}",
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
    public function search_week($weekNum)
    {
		if(strlen($weekNum) == 2){
			$movies = $this->getDoctrine()->getRepository(Weeks::class)->findByWeeks($weekNum);
			return $this->json($movies, 200, [], [
                'groups' => ['movies']
            ]);
		}else{
            return $this->json([
                'message' => 'Min 2 length. Value 01 - 48',
                'data' => strlen($weekNum)
            ]);
		}
		
    }
}
