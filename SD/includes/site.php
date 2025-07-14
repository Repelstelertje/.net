<?php
require_once __DIR__ . '/utils.php';

function configure_error_handling() {
    $appDebug = getenv('APP_DEBUG');
    if (filter_var($appDebug, FILTER_VALIDATE_BOOLEAN)) {
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
    } else {
        ini_set('display_errors', '0');
        ini_set('display_startup_errors', '0');
    }
}

function generate_canonical_meta(array $cfg, array $province = []) {
    $base = rtrim($cfg['base_url'], '/');
    $canonical = $base;
    $pageTitle = $cfg['default_title'];
    $ogImage = $cfg['default_og_image'];
    $metaDescription = '';

    if (isset($_GET['item'])) {
        $item = filter_var($_GET['item'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (basename($_SERVER['PHP_SELF']) === 'datingtips.php') {
            $map = [
                'datingtips' => ['slug' => 'datingtips', 'title' => $cfg['tips_title_prefix']],
                'nl' => ['slug' => 'datingtips-nederland', 'title' => $cfg['tips_title_prefix'] . ' Nederland'],
                'be' => ['slug' => 'datingtips-belgie', 'title' => $cfg['tips_title_prefix'] . ' België'],
                'de' => ['slug' => 'datingtips-duitsland', 'title' => $cfg['tips_title_prefix'] . ' Duitsland'],
                'uk' => ['slug' => 'datingtips-verenigd-koninkrijk', 'title' => $cfg['tips_title_prefix'] . ' Verenigd Koninkrijk'],
                'at' => ['slug' => 'datingtips-oostenrijk', 'title' => $cfg['tips_title_prefix'] . ' Oostenrijk'],
                'ch' => ['slug' => 'datingtips-zwitserland', 'title' => $cfg['tips_title_prefix'] . ' Zwitserland'],
            ];
            if (isset($map[$item])) {
                $canonical = $base . '/' . $map[$item]['slug'];
                $pageTitle = $map[$item]['title'] . ' | ' . $cfg['site_name'];
            }
        } else {
            $item = preg_replace($cfg['item_remove_regex'], '', $item);
            $canonical = $base . '/' . $cfg['item_prefix'] . '-' . $item;
            $pageTitle = $cfg['item_page_title_prefix'] . ' ' . $item . ' | ' . $cfg['site_name'];
            if (isset($province['img'])) {
                $ogImage = $base . '/img/front/' . $province['img'] . '.jpg';
            }
        }
    } elseif (isset($_GET['id'])) {
        $id = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $slugParam = isset($_GET['slug']) ?
            filter_var($_GET['slug'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
        $country = isset($_GET['country']) ? $_GET['country'] : '';
        switch ($country) {
            case 'nl':
                $api_url = api_base('nl') . '/profile/get0/6/';
                break;
            case 'be':
                $api_url = api_base('be') . '/profile/get0/7/';
                break;
            case 'de':
            case 'at':
            case 'ch':
                $api_url = api_base('de') . '/profile/get/';
                break;
            case 'uk':
                $api_url = api_base('uk') . '/profile/get/';
                break;
            default:
                $api_url = api_base() . '/profile/get/';
        }
        $profile_json = @file_get_contents($api_url . $id);
        $profile_name = '';
        $profile_img = '';
        $profile_about = '';
        if ($profile_json) {
            $data = json_decode($profile_json, true);
            if (isset($data['profile']['name'])) {
                $profile_name = $data['profile']['name'];
            }
            if (isset($data['profile']['profile_image_big'])) {
                $profile_img = $data['profile']['profile_image_big'];
            }
            if (isset($data['profile']['aboutme'])) {
                $profile_about = $data['profile']['aboutme'];
            }
        }
        if ($profile_name) {
            $slug = slugify($profile_name);
            $params = [];
            if ($country) {
                $params[] = 'country=' . urlencode($country);
            }
            $params[] = 'id=' . urlencode($id);
            $query = implode('&', $params);

            if ($slugParam) {
                $canonical = $base . '/' . $cfg['profile_prefix'] . '-' . $slugParam . '?' . $query;
            } elseif ($slug) {
                $canonical = $base . '/' . $cfg['profile_prefix'] . '-' . $slug . '?' . $query;
            } else {
                $canonical = $base . '/profile?' . $query;
            }
            $pageTitle = $cfg['profile_title_prefix'] . ' ' . htmlspecialchars($profile_name, ENT_QUOTES, 'UTF-8');
            if ($profile_about) {
                $cleanAbout = strip_tags($profile_about);
                $cleanAbout = html_entity_decode($cleanAbout, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $metaDescription = mb_substr(trim($cleanAbout), 0, 160);
            }
        } else {
            $params = [];
            if ($country) {
                $params[] = 'country=' . urlencode($country);
            }
            $params[] = 'id=' . urlencode($id);
            $query = implode('&', $params);

            $canonical = $base . '/profile?' . $query;
            $pageTitle = $cfg['missing_profile_prefix'] . ' ' . $id . ' | ' . $cfg['site_name'];
        }
        if ($profile_img) {
            $ogImage = $profile_img;
        }
    } elseif (isset($_GET['slug'])) {
        $slugParam = filter_var($_GET['slug'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $canonical = $base . '/' . $cfg['slug_prefix'] . '-' . $slugParam;
        $pageTitle = $cfg['profile_title_prefix'] . ' ' . $slugParam . ' | ' . $cfg['site_name'];
    }

    $canonical = preg_replace('/([?&])ref=[^&]*(&|$)/', '$1', $canonical);
    $canonical = rtrim($canonical, '?&');

    return [$canonical, $pageTitle, $ogImage, $metaDescription];
}

function output_meta_tags($canonical, $pageTitle, $description, $ogImage) {
    echo '<link rel="canonical" href="' . $canonical . '">';
    echo '<title>' . htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') . '</title>';
    echo '<meta property="og:type" content="website">';
    echo '<meta property="og:url" content="' . $canonical . '">';
    echo '<meta property="og:title" content="' . htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') . '">';
    echo '<meta property="og:description" content="' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '">';
    echo '<meta property="og:image" content="' . $ogImage . '">';
    echo '<meta name="twitter:card" content="summary_large_image">';
    echo '<meta name="twitter:title" content="' . htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') . '">';
    echo '<meta name="twitter:description" content="' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '">';
    echo '<meta name="twitter:image" content="' . $ogImage . '">';
}
?>
