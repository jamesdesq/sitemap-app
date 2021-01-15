<?php


namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SiteMapController extends AbstractController {

  public function homepage() {

    return new Response('It\'s for generating sitemaps');
  }

  public function sitemap() {

    $slug = 'foo';

    $answers = ['foo'];

//    $response = $this->render("MarketplaceBundle:sitemap:sitemap.xml.twig", array(
//      'urls' => $urls
//    ));
//    $response->headers->add(array('Content-Type' => 'application/xml'));
//    return $response;

    $response = $this->render('sitemap.xml.twig', [
      'question' => ucwords(str_replace('-', ' ', $slug)),
      'answers' => $answers,
    ]);

//    $response->headers->set('Content-Type', 'text/xml');
    $response->headers->add(array('Content-Type' => 'application/xml'));


    return $response;
  }
}