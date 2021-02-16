<?php


namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpClient\HttpClient;

class SiteMapController extends AbstractController {

  private $space;

  private $accessToken;

  private $environment;

  public function __construct(string $environment, string $space, string $accessToken) {

    $this->environment = $environment;

    if ($environment === 'prod') {
      $this->space = getenv('CONTENTFUL_SPACE');
      $this->accessToken = getenv('CONTENTFUL_ACCESS_TOKEN');
    }
    else {
      $this->space = $space;
      $this->accessToken = $accessToken;
    }
  }

  public function homepage() {
    return new Response("Environment: $this->environment. Space: $this->space" );
  }

  public function sitemap() {
    $url = "https://cdn.contentful.com/spaces/$this->space/environments/master/entries?access_token=$this->accessToken&content_type=story";
    $client = HttpClient::create();
    $response = $client->request('GET', $url);
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