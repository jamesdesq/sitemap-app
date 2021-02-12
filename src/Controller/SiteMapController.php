<?php


namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpClient\HttpClient;

class SiteMapController extends AbstractController {

  public function homepage() {

    return new Response('It\'s for generating sitemaps');
  }

  public function sitemap() {

    $url = 'https://cdn.contentful.com/spaces/plxxptld3t56/environments/master/entries?access_token=ppzAQqtPhUDeTP-Pa00NLpk1FNKxECmXHaMqluuf-Gk&content_type=story';

    $client = HttpClient::create();
    $response = $client->request('GET', $url);
    $statusCode = $response->getStatusCode();
    $content = $response->toArray();

    $urls = [];
    foreach($content['items'] as $item) {
      $urls[] = $item['fields']['url'];
    }

    $response = $this->render('sitemap.xml.twig', [
      'items' => $urls,
    ]);
    $response->headers->add(array('Content-Type' => 'application/xml'));
    return $response;
  }
}