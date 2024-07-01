<?php

namespace App\Http\Controllers;

use App\Services\Crawlers\BidHistory;
use GuzzleHttp\Client;
use Illuminate\View\View;
use Symfony\Component\DomCrawler\Crawler;

class ParseController extends Controller
{

    private $userAgents = [
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.1.2 Safari/605.1.15',
        // Add more user agents if needed
    ];

    /*
     * show index page site
     */
    public function parseVin()
    {

        $bidHistory = new BidHistory(request()->get('vin'));
        dd($bidHistory->findByVin());
        $url = 'https://bidhistory.org/search/?search=WMWXP7C30H2A46288';

        // Create a Guzzle client
        $client = new Client([
            'headers' => [
                'User-Agent' => $this->userAgents[array_rand($this->userAgents)],
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                'Accept-Language' => 'en-US,en;q=0.5',
                'Referer' => 'https://bidfax.info',
                'Connection' => 'keep-alive'
            ],
            'cookies' => true,
        ]);


        $response = $client->request('GET', $url);
        $html = $response->getBody()->getContents();

        // Use DomCrawler to extract all links
        $crawler = new Crawler($html);
        $links = $crawler->filter('a')->each(function (Crawler $node) {
            return $node->attr('href');
        });
        $filterLink = '';
        foreach ($links as $link) {
            if (str_contains($link, strtolower('WMWXP7C30H2A46288'))) {
                $filterLink = str_replace('//','', $link);
            }
        }

        $response = $client->request('GET', $filterLink);
        $carHtml = $response->getBody()->getContents();

        $crawler = new Crawler($carHtml);
        $lis = $crawler->filter('div.pricing-list-container ul li')->each(function (Crawler $node) {
            $key = $node->filter('h5')->text();
            $value = $node->filter('span')->text();
            return [$key => $value];
        });

        $jpgLinks = $crawler->filter('a')->each(function (Crawler $node) {
            $href = $node->attr('href');
            if (substr($href, -4) === '.jpg') {
                return $href;
            }
            return null; // Return null for non-matching links
        });

        $jpgLinks = array_filter($jpgLinks, function ($link) {
            return $link !== null;
        });

        dd($jpgLinks);



        return response($html)->header('Content-Type', 'text/html');


    }
}
