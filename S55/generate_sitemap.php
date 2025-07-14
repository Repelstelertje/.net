<?php
// Simple sitemap generator for sex55.net

require_once __DIR__ . '/includes/config.php';

$baseUrl = $BASE_URL;

// Determine the prefix used for profile pages based on domain
$profilePrefix = 'date-';
if (strpos($baseUrl, 'shemaledaten.net') !== false) {
    $profilePrefix = 'shemale-';
}

/**
 * Fetch profile slugs from the remote API.
 * Expects JSON {"slugs": ["foo", "bar", ...]}
 *
 * @param string $country Two letter code
 * @return array
 */
function fetch_profile_slugs($country)
{
    $endpoint = rtrim(api_base($country), '/') . '/profile/slugs';
    $json = @file_get_contents($endpoint);
    if ($json === false) {
        return [];
    }
    $data = json_decode($json, true);
    if (!$data || !isset($data['slugs']) || !is_array($data['slugs'])) {
        return [];
    }
    return $data['slugs'];
}

function add_url(array &$urls, $loc)
{
    $urls[] = [
        'loc' => $loc,
        'lastmod' => gmdate('c'),
    ];
}

/**
 * Merge generated URLs into the existing sitemap without duplicating entries.
 *
 * @param array  $urls       Array with loc and lastmod keys
 * @param string $sitemap    Path to sitemap.xml
 */
function merge_into_sitemap(array $urls, $sitemap, $baseUrl)
{
    $ordered = [];
    $seen = [];

    if (file_exists($sitemap)) {
        $existingDom = new DOMDocument();
        $existingDom->load($sitemap);
        foreach ($existingDom->getElementsByTagName('url') as $urlNode) {
            $locNode = $urlNode->getElementsByTagName('loc')->item(0);
            if (!$locNode) {
                continue;
            }
            $loc = trim($locNode->textContent);
            if (isset($seen[$loc])) {
                continue;
            }
            $lastmodNode = $urlNode->getElementsByTagName('lastmod')->item(0);
            $ordered[] = [
                'loc' => $loc,
                'lastmod' => $lastmodNode ? $lastmodNode->textContent : gmdate('c'),
            ];
            $seen[$loc] = true;
        }
    }

    foreach ($urls as $u) {
        $locVal = rtrim($baseUrl, '/') . '/' . ltrim($u['loc'], '/');
        if (isset($seen[$locVal])) {
            continue;
        }
        $ordered[] = [
            'loc' => $locVal,
            'lastmod' => $u['lastmod'],
        ];
        $seen[$locVal] = true;
    }

    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;
    $urlset = $dom->createElement('urlset');
    $urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
    $dom->appendChild($urlset);

    foreach ($ordered as $entry) {
        $url = $dom->createElement('url');
        $url->appendChild($dom->createElement('loc', $entry['loc']));
        $url->appendChild($dom->createElement('lastmod', $entry['lastmod']));
        $urlset->appendChild($url);
    }

    $dom->save($sitemap);
}

$urls = [];

add_url($urls, '');

$countries = [
    'nl' => ['file' => 'includes/arr_prov_nl.php', 'var' => 'nl', 'slug' => 'sexdate-nederland'],
    'be' => ['file' => 'includes/arr_prov_be.php', 'var' => 'be', 'slug' => 'sexdate-belgie'],
    'uk' => ['file' => 'includes/arr_prov_uk.php', 'var' => 'uk', 'slug' => 'sexdate-verenigd-koninkrijk'],
    'de' => ['file' => 'includes/arr_prov_de.php', 'var' => 'de', 'slug' => 'sexdate-duitsland'],
    'at' => ['file' => 'includes/arr_prov_at.php', 'var' => 'at', 'slug' => 'sexdate-oostenrijk'],
    'ch' => ['file' => 'includes/arr_prov_ch.php', 'var' => 'ch', 'slug' => 'sexdate-zwitserland'],
];

foreach ($countries as $country => $info) {
    add_url($urls, $info['slug']);
    require __DIR__ . '/' . $info['file'];
    $provArray = ${$info['var']};
    foreach ($provArray as $slugKey => $item) {
        $slug = 'sexdate-' . $slugKey;
        if (($country === 'nl' || $country === 'be') && $slugKey === 'limburg') {
            $slug = 'sexdate-limburg-' . $country;
        }
        add_url($urls, $slug);
    }

    foreach (fetch_profile_slugs($country) as $profileSlug) {
        add_url($urls, $profilePrefix . $profileSlug);
    }
}

// Dating tips
$datingtips = [
    'datingtips',
    'datingtips-nederland',
    'datingtips-belgie',
    'datingtips-verenigd-koninkrijk',
    'datingtips-duitsland',
    'datingtips-oostenrijk',
    'datingtips-zwitserland',
];
foreach ($datingtips as $tip) {
    add_url($urls, $tip);
}

// Static pages
foreach (['partnerlinks', 'privacy', 'cookie-policy'] as $page) {
    add_url($urls, $page);
}

merge_into_sitemap($urls, __DIR__ . '/sitemap.xml', $baseUrl);
echo sprintf("Sitemap updated with %d URLs\n", count($urls));
