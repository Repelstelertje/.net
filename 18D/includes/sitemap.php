<?php
function merge_into_sitemap(array $urls, string $sitemapPath): int {
    $namespace = 'http://www.sitemaps.org/schemas/sitemap/0.9';

    $doc = new DOMDocument('1.0', 'UTF-8');
    $doc->preserveWhiteSpace = false;
    $doc->formatOutput = true;

    if (file_exists($sitemapPath)) {
        @$doc->load($sitemapPath);
        if (!$doc->documentElement) {
            $doc->loadXML('<urlset xmlns="' . $namespace . '"/>');
        }
    } else {
        $doc->loadXML('<urlset xmlns="' . $namespace . '"/>');
    }

    $xpath = new DOMXPath($doc);
    $xpath->registerNamespace('sm', $namespace);

    $existing = [];
    foreach ($xpath->query('//sm:url') as $node) {
        $locNode = $xpath->query('sm:loc', $node)->item(0);
        if ($locNode) {
            $loc = $locNode->textContent;
            if (isset($existing[$loc])) {
                $node->parentNode->removeChild($node);
                continue;
            }
            $existing[$loc] = true;
        }
    }

    $lastMod = date('c');
    $added = 0;
    foreach (array_unique($urls) as $loc) {
        if (!is_string($loc) || trim($loc) === '' || isset($existing[$loc])) {
            continue;
        }
        $urlEl = $doc->createElementNS($namespace, 'url');
        $urlEl->appendChild($doc->createElementNS($namespace, 'loc', $loc));
        $urlEl->appendChild($doc->createElementNS($namespace, 'lastmod', $lastMod));
        $doc->documentElement->appendChild($urlEl);
        $existing[$loc] = true;
        $added++;
    }

    $doc->save($sitemapPath);
    return $added;
}
?>
