<?php

namespace App\Services\Crawlers;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class BidHistory
{
    protected string $url = 'https://bidhistory.org/search/?search=';

    private array $userAgents = [
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.1.2 Safari/605.1.15',
        // Add more user agents if needed
    ];

    protected Client $client;

    public function __construct(protected string $vin)
    {
        $this->client = new Client([
            'headers' => [
                'User-Agent' => $this->userAgents[array_rand($this->userAgents)],
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                'Accept-Language' => 'en-US,en;q=0.5',
                'Referer' => 'https://bidfax.info',
                'Connection' => 'keep-alive'
            ],
            'cookies' => true,
        ]);

        $this->url .= $this->vin;
    }

    public function findByVin()
    {
        $response = $this->client->request('GET', $this->url);
        $html = $response->getBody()->getContents();

        // Use DomCrawler to extract all links
        $crawler = new Crawler($html);
        $links = $crawler->filter('a')->each(function (Crawler $node) {
            if (str_contains($node->attr('href'), strtolower($this->vin))) {
                return str_replace('//','', $node->attr('href'));
            }
            return null;
        });

        $links = array_filter($links, function ($link) {
            return $link !== null;
        });

        return !empty($links) ? array_shift($links): null;
    }
}
