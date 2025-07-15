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
$slugPrefix = 'sexdate-';
if (strpos($baseUrl, 'shemaledaten.net') !== false) {
    $profilePrefix = 'shemale-';
    $slugPrefix = 'shemale-';
}

$urls = [];
$static = ['', 'datingtips', 'partnerlinks', 'privacy', 'cookie-policy'];
foreach ($static as $page) {
    $urls[] = rtrim($baseUrl, '/') . '/' . ltrim($page, '/');
}

$countryMap = [
    'nl' => ['slug' => $slugPrefix . 'nederland',       'prov' => $nl],
    'be' => ['slug' => $slugPrefix . 'belgie',          'prov' => $be],
    'uk' => ['slug' => $slugPrefix . 'verenigd-koninkrijk', 'prov' => $uk],
    'de' => ['slug' => $slugPrefix . 'duitsland',       'prov' => $de],
    'at' => ['slug' => $slugPrefix . 'oostenrijk',      'prov' => $at],
    'ch' => ['slug' => $slugPrefix . 'zwitserland',     'prov' => $ch],
];

$profileUrls = [];
foreach ($countryMap as $code => $info) {
    $urls[] = $baseUrl . '/' . $info['slug'];
    foreach ($info['prov'] as $slug => $prov) {
        $provSlug = $slugPrefix . $slug;
        if (($code === 'nl' || $code === 'be') && $slug === 'limburg') {
            $provSlug = $slugPrefix . 'limburg-' . $code;
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
            $profileUrls[$p['id']] = $baseUrl . '/' . $profilePrefix . $slugified . '?country=' . $code . '&id=' . $p['id'];
        }
    }
}

foreach (array_keys($datingtips) as $tip) {
    $urls[] = $baseUrl . '/datingtips-' . $tip;
}

foreach ($profileUrls as $url) {
    $urls[] = $url;
}

$urls = array_filter($urls, static function ($u) {
    return is_string($u) && trim($u) !== '';
});

$added = merge_into_sitemap($urls, __DIR__ . '/sitemap.xml');
echo "Added $added new URLs to sitemap\n";
