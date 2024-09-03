<?php

declare(strict_types=1);

use Symfony\Component\DomCrawler\Crawler;

include_once __DIR__ . '/vendor/autoload.php';

$html = <<<HTML
<div>
  <div class="foo">
    <div class="card"><a class="link" href="#">Foo Link</a></div>
  </div>
  <div class="bar">
  
  </div>
</div>
HTML;

$crawler = new Crawler($html, useHtml5Parser: true);
$bar = $crawler->filter('.bar')->getNode(0);

$card = <<<HTML
<div class="card">
  <a class="link" href="#">Bar Link</a>
</div>
HTML;

$html5 = new \Masterminds\HTML5();
$dom = $html5->loadHTML($card);

$root = $bar->ownerDocument->importNode($dom->documentElement, true);
$bar->appendChild($root->firstElementChild);

echo "Find by `a`:\n";
$crawler->filter('a')
    ->each(
        function (Crawler $node) {
            echo $node->getNode(0)->textContent . "\n";
        }
    );

echo "\n";

echo "Find by `.link`:\n";
$crawler->filter('.link')
    ->each(
        function (Crawler $node) {
            echo $node->getNode(0)->textContent . "\n";
        }
    );
