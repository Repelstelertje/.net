<?php
  $companyName = "ShemaleDaten.net";
  include $base . '/includes/nav_items.php';
  // Config is required for API lookups when rendering profile pages
  include_once $base . '/config.php';
  /**
   * Convert a string to a URL friendly slug.
   *
   * @param string $text
   * @return string
   */
  function slugify($text) {
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    return trim($text, '-');
  }

  // Control error visibility through an environment variable. By default
  // errors are hidden in production unless APP_DEBUG is truthy.
  $appDebug = getenv('APP_DEBUG');

  if (filter_var($appDebug, FILTER_VALIDATE_BOOLEAN)) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
  } else {
    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');
  }

?>

<!DOCTYPE html>
<html lang="nl-NL">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php
  $defaultDescription = "Find sexy shemale dates near you on shemaledaten.net – the top site for trans dating and steamy encounters.";
  $description = isset($metaDescription) ? $metaDescription : $defaultDescription;
?>
<meta name="description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="author" content="ShemaleDaten">

<link rel="apple-touch-icon" sizes="57x57" href="img/fav/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="img/fav/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/fav/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="img/fav/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/fav/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="img/fav/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="img/fav/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="img/fav/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="img/fav/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="img/fav/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="img/fav/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/fav/favicon-16x16.png">
<link rel="manifest" href="img/fav/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="img/fav/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<?php
  $canonical = $canonical ?? 'https://shemaledaten.net';
  $pageTitle = $pageTitle ?? 'Shemale Sexdating | shemaledaten.net';
  $ogImage = $ogImage ?? 'https://shemaledaten.net/img/fb.png';

  if(isset($_GET['item'])){
    $item = filter_var($_GET['item'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(basename($_SERVER['PHP_SELF']) === 'datingtips.php'){
      switch($item){
        case 'datingtips':
          $canonical = 'https://shemaledaten.net/datingtips';
          $pageTitle = 'Datingtips | shemaledaten.net';
          break;
        case 'nl':
          $canonical = 'https://shemaledaten.net/datingtips-nederland';
          $pageTitle = 'Datingtips Nederland | shemaledaten.net';
          break;
        case 'be':
          $canonical = 'https://shemaledaten.net/datingtips-belgie';
          $pageTitle = 'Datingtips België | shemaledaten.net';
          break;
        case 'de':
          $canonical = 'https://shemaledaten.net/datingtips-duitsland';
          $pageTitle = 'Datingtips Duitsland | shemaledaten.net';
          break;
        case 'uk':
          $canonical = 'https://shemaledaten.net/datingtips-verenigd-koninkrijk';
          $pageTitle = 'Datingtips Verenigd Koninkrijk | shemaledaten.net';
          break;
        case 'at':
          $canonical = 'https://shemaledaten.net/datingtips-oostenrijk';
          $pageTitle = 'Datingtips Oostenrijk | shemaledaten.net';
          break;
        case 'ch':
          $canonical = 'https://shemaledaten.net/datingtips-zwitserland';
          $pageTitle = 'Datingtips Zwitserland | shemaledaten.net';
          break;
      }
    } else {
      $item = preg_replace('/^(?:sexdate|shemale)-/', '', $item);
      $canonical = 'https://shemaledaten.net/shemale-' . $item;
      $pageTitle = 'Shemale ' . $item . ' | shemaledaten.net';
      if(isset($province['img'])){
        $ogImage = 'https://shemaledaten.net/img/front/' . $province['img'] . '.jpg';
      }
    }
  } elseif(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
    if($profile_json){
      $data = json_decode($profile_json, true);
      if(isset($data['profile']['name'])){
        $profile_name = $data['profile']['name'];
      }
      if(isset($data['profile']['profile_image_big'])){
        $profile_img = $data['profile']['profile_image_big'];
      }
    }
    if($profile_name){
      $slug = slugify($profile_name);
      $canonical = 'https://shemaledaten.net/shemale-' . $slug;
      $pageTitle = 'Date ' . htmlspecialchars($profile_name, ENT_QUOTES, 'UTF-8');
    } else {
      $canonical = 'https://shemaledaten.net/profile?id=' . $id;
      $pageTitle = 'Shemale ' . $id . ' | shemaledaten.net';
    }
    if($profile_img){
      $ogImage = $profile_img;
    }
  } elseif(isset($_GET['slug'])){
    $slugParam = filter_var($_GET['slug'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $canonical = 'https://shemaledaten.net/sexdate-' . $slugParam;
    $pageTitle = 'Shemale ' . $slugParam . ' | shemaledaten.net';
  }

  echo '<link rel="canonical" href="' . $canonical . '" >';
  echo '<title>' . htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') . '</title>';
  echo '<meta property="og:type" content="website">';
  echo '<meta property="og:url" content="' . $canonical . '">';
  echo '<meta property="og:title" content="' . htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') . '">';
  echo '<meta property="og:description" content="' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '">';
  echo '<meta property="og:image" content="' . $ogImage . '">';
  // Twitter Card metadata
  echo '<meta name="twitter:card" content="summary_large_image">';
  echo '<meta name="twitter:title" content="' . htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') . '">';
  echo '<meta name="twitter:description" content="' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '">';
  echo '<meta name="twitter:image" content="' . $ogImage . '">';
?>

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">

</head>

<body id="top">
  <div id="oproepjes">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="https://shemaledaten.net/">Shemale Daten</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu</button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <?php
            include $base . '/includes/nav.php';
          ?>
        </div>
      </div>
    </nav>
    <main>
      



