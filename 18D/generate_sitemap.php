<?php
// Simple sitemap generator for 18date.net

require_once __DIR__ . '/config.php';

$baseUrl = 'https://18date.net';

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

function add_url(array &$urls, $loc, $priority = '0.80')
{
    $urls[] = [
        'loc' => $loc,
        'lastmod' => gmdate('c'),
        'priority' => $priority,
    ];
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
        add_url($urls, $slug, '0.64');
    }

    foreach (fetch_profile_slugs($country) as $profileSlug) {
        add_url($urls, 'date-' . $profileSlug, '0.50');
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

$dom = new DOMDocument('1.0', 'UTF-8');
$dom->formatOutput = true;
$urlset = $dom->createElement('urlset');
$urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
$dom->appendChild($urlset);

foreach ($urls as $u) {
    $url = $dom->createElement('url');
    $loc = $dom->createElement('loc', rtrim($baseUrl, '/') . '/' . ltrim($u['loc'], '/'));
    $lastmod = $dom->createElement('lastmod', $u['lastmod']);
    $priority = $dom->createElement('priority', $u['priority']);
    $url->appendChild($loc);
    $url->appendChild($lastmod);
    $url->appendChild($priority);
    $urlset->appendChild($url);
}

$dom->save(__DIR__ . '/sitemap.xml');
