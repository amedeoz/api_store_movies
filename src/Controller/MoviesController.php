<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
Use Symfony\Component\HttpFoundation\Request;
use App\Entity\Movies;

/**
* @Route("/movies", name="movie_")
*/
class MoviesController extends AbstractController
{
    
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index()
    {
        $movies = $this->getDoctrine()->getRepository(Movies::class)->findAll();
        return $this->json([
            'data' => $movies
        ]);
    }

    /**
     * @Route("/{moviesId}", name="show", methods={"GET"})
     */
    public function show($moviesId)
    {
        $movies = $this->getDoctrine()->getRepository(Movies::class)->find($moviesId);
        return $this->json([
            'data' => $movies
        ]);
    }

    /**
     * @Route("/", name="create", methods={"POST"})
     */
    public function create(Request $request)
    {
        $data = $request->request->all();
        
        $movie = new Movies();
        $movie->setGenre($data['genre']);
        $movie->setTitle($data['title']);
        $movie->setPoster($data['poster']);
        $movie->setReleaseDate(\DateTime::createFromFormat('Y-m-d', $data['release_date']));
        $movie->setDuration($data['duration']);
        $movie->setDescription($data['description']);
        $movie->setUrlTrailer($data['url_trailer']);
        $movie->setWeekNumber($data['week_number']);
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
     */
    public function update($moviesId, Request $request)
    {
        $data = $request->request->all();
        $movie = $this->getDoctrine()->getRepository(Movies::class)->find($moviesId);

        if($request->request->has('genre'))
            $movie->setGenre($data['genre']);

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

        if($request->request->has('week_number'))
            $movie->setWeekNumber($data['week_number']);

    
        $movie->setUpdatedAt(new \DateTime('now', new \DateTimezone('America/Bahia')));
        
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->flush();

        return $this->json([
            'data' => 'Film update OK'
        ]);
    }

    /**
     * @Route("/{moviesId}", name="delete", methods={"DELETE"})
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
     * @Route("/search_genre/{genre}", name="search_genre", methods={"GET"})
     */
    public function search_genre($genre)
    {
        if(strlen($genre) > 3){
            $movies = $this->getDoctrine()->getRepository(Movies::class)->findByGenre($genre);
            return $this->json([
                'message' => 'List film by genre',
                'data' => $movies
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
     */
    public function search_title($title)
    {
        $movies = $this->getDoctrine()->getRepository(Movies::class)->findBy(['title' => $title]);
        if(strlen($title) > 3){
            $movies = $this->getDoctrine()->getRepository(Movies::class)->findByTitle($title);
            return $this->json([
                'message' => 'List film by title',
                'data' => $movies
            ]);
        }else{
            return $this->json([
                'message' => 'Min 3 length',
                'data' => strlen($title)
            ]);
        }

    }

}
