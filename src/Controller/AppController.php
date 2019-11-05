<?php

namespace App\Controller;

use App\Helper\Paginator;
use App\Model\MovieModel;
use App\Model\ShowcaseModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;

class AppController extends AbstractController
{
    public function index(int $page){
        $cache = new FilesystemAdapter();
        $raw_data = $cache->get('raw_data', [$this, 'rawDataCacheCallable']);

        $paginator = new Paginator($page, count($raw_data));

        $movies = [];
        foreach($raw_data as $i => $raw_movie){
            if($paginator->isInPage($i)){
                $movies[] = new MovieModel($raw_movie);
            }
        }

        $render_data = [
            'paginator' => $paginator,
            'page_title' => 'Moooovies',
            'movies' => $movies
        ];
        return $this->render('index.html.twig', $render_data);
    }

    public function rawDataCacheCallable(ItemInterface $item){
        $item->expiresAfter(new \DateInterval('P1D')); // expires after 1 day
        $url = $this->getParameter('app.json_url');
        $showcase = new ShowcaseModel($url);
        $data = $showcase->getData();

        return $data;
    }
}
