<?php
require_once __DIR__ . '/includes/utils.php';
require_once __DIR__ . '/includes/sitemap.php';
require_once __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/arr_prov_nl.php';
require __DIR__ . '/includes/arr_prov_be.php';
require __DIR__ . '/includes/arr_prov_uk.php';
require __DIR__ . '/includes/arr_prov_de.php';
require __DIR__ . '/includes/arr_prov_at.php';
require __DIR__ . '/includes/arr_prov_ch.php';
require __DIR__ . '/includes/array_tips.php';

$baseUrl = $BASE_URL;

$profilePrefix = 'date-';
if (strpos($baseUrl, 'shemaledaten.net') !== false) {
    $profilePrefix = 'shemale-';
}

$urls = [];
$static = ['', 'datingtips', 'partnerlinks', 'privacy', 'cookie-policy'];
foreach ($static as $page) {
    $urls[] = rtrim($baseUrl, '/') . '/' . ltrim($page, '/');
}

$countryMap = [
    'nl' => ['slug' => 'sexdate-nederland',       'prov' => $nl],
    'be' => ['slug' => 'sexdate-belgie',          'prov' => $be],
    'uk' => ['slug' => 'sexdate-verenigd-koninkrijk', 'prov' => $uk],
    'de' => ['slug' => 'sexdate-duitsland',       'prov' => $de],
    'at' => ['slug' => 'sexdate-oostenrijk',      'prov' => $at],
    'ch' => ['slug' => 'sexdate-zwitserland',     'prov' => $ch],
];

$profileUrls = [];
foreach ($countryMap as $code => $info) {
    $urls[] = $baseUrl . '/' . $info['slug'];
    foreach ($info['prov'] as $slug => $prov) {
        $provSlug = 'sexdate-' . $slug;
        if (($code === 'nl' || $code === 'be') && $slug === 'limburg') {
            $provSlug = 'sexdate-limburg-' . $code;
        }
        $urls[] = $baseUrl . '/' . $provSlug;

        $endpoint = rtrim(api_base($code), '/') . '/profile/province/' . $code . '/' . rawurlencode($prov['name']) . '/120';
        $json = @file_get_contents($endpoint);
        if ($json === false) {
            continue;
        }
        $data = json_decode($json, true);
        if (!$data || !isset($data['profiles']) || !is_array($data['profiles'])) {
            continue;
        }
        foreach ($data['profiles'] as $p) {
            if (empty($p['id']) || empty($p['name'])) {
                continue;
            }
            $slugified = slugify($p['name']);
            $profileUrls[$p['id']] = $baseUrl . '/' . $profilePrefix . $slugified . '?id=' . $p['id'];
        }
    }
}

foreach (array_keys($datingtips) as $tip) {
    $urls[] = $baseUrl . '/datingtips-' . $tip;
}

foreach ($profileUrls as $url) {
    $urls[] = $url;
}

$added = merge_into_sitemap($urls, __DIR__ . '/sitemap.xml');
echo "Added $added new URLs to sitemap\n";
