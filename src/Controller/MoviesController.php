<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
Use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;
use App\Entity\Genres;
use App\Entity\Movies;

/**
* @Route("/movies", name="movie_")
*/
class MoviesController extends AbstractController
{
    
    /**
     * @Route("/", name="index", methods={"GET"})
     * @SWG\Get(
	 * 		path="/movies/",
	 * 		tags={"movies"},
	 * 		operationId="index",
	 * 		summary="List movies all.",
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
    public function index()
    {
        $movies = $this->getDoctrine()->getRepository(Movies::class)->findAll();
        return $this->json($movies, 200, [], [
            'groups' => ['movies']
        ]);
    }
    
    /**
     * @Route("/{moviesId}", name="show", methods={"GET"})
     * @SWG\Get(
	 * 		path="/movies/{moviesId}",
	 * 		tags={"movies"},
	 * 		operationId="show",
	 * 		summary="List movie by id.",
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
    public function show($moviesId)
    {
        $movies = $this->getDoctrine()->getRepository(Movies::class)->find($moviesId);
        return $this->json($movies, 200, [], [
            'groups' => ['movies']
        ]);
    }

    /**
     * @Route("/", name="create", methods={"POST"})
     * @SWG\Post(
	 * 		path="/movies/",
	 * 		tags={"movies"},
	 * 		operationId="create",
	 * 		summary="Add new movies.",
     *      consumes={"application/x-www-form-urlencoded"},
     *      produces={"application/json"},
     *      @SWG\Parameter(
	 * 			name="genre",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="genre", type="string", example="action"),
     *		),
     *      @SWG\Parameter(
	 * 			name="title",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="title", type="string", example="Nem Name movie"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="poster",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="poster", type="string", example="Nem URL poster"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="release_date",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="release_date", type="string", example="YYYY-mm-dd"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="duration",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="duration", type="string", example="120 minutes"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="description",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="description", type="string", example="Description movie"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="url_trailer",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="url_trailer", type="string", example="URL trailer"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="week_number",
	 * 			in="formData",
     *          type="integer",
	 * 			@SWG\Property(property="week_number", type="string", example="10"),
	 *		),	
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
    public function create(Request $request)
    {
        $data = $request->request->all();
        
        $movie = new Movies();
        $movie->setTitle($data['title']);
        $movie->setPoster($data['poster']);
        $movie->setReleaseDate(\DateTime::createFromFormat('Y-m-d', $data['release_date']));
        $movie->setDuration($data['duration']);
        $movie->setDescription($data['description']);
        $movie->setUrlTrailer($data['url_trailer']);
        $movie->setCreatedAt(new \DateTime('now', new \DateTimezone('America/Bahia')));
        $movie->setUpdatedAt(new \DateTime('now', new \DateTimezone('America/Bahia')));
        
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($movie);
        $doctrine->flush();

        return $this->json([
            'data' => 'Film Add ok'
        ]);
    }

    /**
     * @Route("/{moviesId}", name="update", methods={"PUT" , "PATCH"})
     * @SWG\Put(
	 * 		path="/movies/{moviesId}",
	 * 		tags={"movies"},
	 * 		operationId="updatePut",
	 * 		summary="Update movies.",
     *      consumes={"application/x-www-form-urlencoded"},
     *      produces={"application/json"},
     *      @SWG\Parameter(
	 * 			name="id",
	 * 			in="path",
     *          required=true,
     *          type="integer",
     *          description="Put id movies",
     *		),
     *      @SWG\Parameter(
	 * 			name="genre",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="genre", type="string", example="action"),
     *		),
     *      @SWG\Parameter(
	 * 			name="title",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="title", type="string", example="Nem Name movie"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="poster",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="poster", type="string", example="Nem URL poster"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="release_date",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="release_date", type="string", example="YYYY-mm-dd"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="duration",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="duration", type="string", example="120 minutes"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="description",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="description", type="string", example="Description movie"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="url_trailer",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="url_trailer", type="string", example="URL trailer"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="week_number",
	 * 			in="formData",
     *          type="integer",
	 * 			@SWG\Property(property="week_number", type="string", example="10"),
	 *		),	
	 * 		@SWG\Response(
	 * 			response=200,
	 * 			description="success",
	 * 		),
	 * 		@SWG\Response(
	 * 			response=400,
	 * 			description="Bad request",
	 * 		),
	 * 	)
     *  @SWG\Patch(
	 * 		path="/movies/{moviesId}",
	 * 		tags={"movies"},
	 * 		operationId="updatePatch",
	 * 		summary="Update movies.",
     *      consumes={"application/x-www-form-urlencoded"},
     *      produces={"application/json"},
     *      @SWG\Parameter(
	 * 			name="id",
	 * 			in="path",
     *          required=true,
     *          type="integer",
     *          description="Put id movies",
     *		),
     *      @SWG\Parameter(
	 * 			name="genre",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="genre", type="string", example="action"),
     *		),
     *      @SWG\Parameter(
	 * 			name="title",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="title", type="string", example="Nem Name movie"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="poster",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="poster", type="string", example="Nem URL poster"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="release_date",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="release_date", type="string", example="YYYY-mm-dd"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="duration",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="duration", type="string", example="120 minutes"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="description",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="description", type="string", example="Description movie"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="url_trailer",
	 * 			in="formData",
     *          type="string",
	 * 			@SWG\Property(property="url_trailer", type="string", example="URL trailer"),
     *		),
     * 		@SWG\Parameter(
	 * 			name="week_number",
	 * 			in="formData",
     *          type="integer",
	 * 			@SWG\Property(property="week_number", type="string", example="10"),
	 *		),	
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
    public function update($moviesId, Request $request)
    {
        $data = $request->request->all();
        $movie = $this->getDoctrine()->getRepository(Movies::class)->find($moviesId);

        if($request->request->has('title'))
            $movie->setTitle($data['title']);

        if($request->request->has('poster'))
            $movie->setPoster($data['poster']);

        if($request->request->has('release_date'))
            $movie->setReleaseDate(\DateTime::createFromFormat('Y-m-d', $data['release_date']));

        if($request->request->has('duration'))
            $movie->setDuration($data['duration']);

        if($request->request->has('description'))
            $movie->setDescription($data['description']);

        if($request->request->has('url_trailer'))
            $movie->setUrlTrailer($data['url_trailer']);

        $movie->setUpdatedAt(new \DateTime('now', new \DateTimezone('America/Bahia')));
        
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->flush();

        return $this->json([
            'data' => 'Film update OK'
        ]);
    }

    /**
     * @Route("/{moviesId}", name="delete", methods={"DELETE"})
     * @SWG\Delete(
	 * 		path="/movies/{moviesId}",
	 * 		tags={"movies"},
	 * 		operationId="delete",
	 * 		summary="Remove movie by id",
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
    public function delete($moviesId)
    {
        
        $movie = $this->getDoctrine()->getRepository(Movies::class)->find($moviesId);
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($movie);
        $manager->flush();

        return $this->json([
            'data' => 'Film delete OK'
        ]);
    }

    /**
     * @Route("/search/{valueFull}", name="search", methods={"GET"})
     * @SWG\Get(
	 * 		path="/movies/search/{valueFull}",
	 * 		tags={"movies"},
	 * 		operationId="search",
	 * 		summary="Search movies for title or genre.",
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
    public function search($valueFull)
    {
        if(strlen($valueFull) > 3){
            $resultGenre = $this->getDoctrine()->getRepository(Genres::class)->findByGenre($valueFull);
            $resultMovies = $this->getDoctrine()->getRepository(Movies::class)->findByTitle($valueFull);
            return $this->json(['genres' => $resultGenre, 'movies' => $resultMovies], 200, [], [
                'groups' => ['movies']
            ]);
        }else{
            return $this->json([
                'message' => 'Min 3 length',
                'data' => strlen($valueFull)
            ]);
        }
    }

    /**
     * @Route("/search_genre/{genre}", name="search_genre", methods={"GET"})
     * @SWG\Get(
	 * 		path="/movies/search_genre/{genre}",
	 * 		tags={"movies"},
	 * 		operationId="search_genre",
	 * 		summary="Search movies for genre.",
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
    public function search_genre($genre)
    {
        if(strlen($genre) > 3){
            $movies = $this->getDoctrine()->getRepository(Genres::class)->findByGenre($genre);
            return $this->json($movies, 200, [], [
                'groups' => ['movies']
            ]);
        }else{
            return $this->json([
                'message' => 'Min 3 length',
                'data' => strlen($genre)
            ]);
        }
    }

    /**
     * @Route("/search_title/{title}", name="search_title", methods={"GET"})
     * @SWG\Get(
	 * 		path="/movies/search_title/{title}",
	 * 		tags={"movies"},
	 * 		operationId="search_title",
	 * 		summary="Search movies for title.",
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
    public function search_title($title)
    {
        if(strlen($title) > 3){
            $movies = $this->getDoctrine()->getRepository(Movies::class)->findByTitle($title);
            return $this->json($movies, 200, [], [
                'groups' => ['movies']
            ]);
        }else{
            return $this->json([
                'message' => 'Min 3 length',
                'data' => strlen($title)
            ]);
        }

    }

}
