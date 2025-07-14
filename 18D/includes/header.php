<?php
  $companyName = "18Date.net";
  include $base . '/includes/nav_items.php';
  // Config is required for API lookups when rendering profile pages
  include_once $base . '/includes/config.php';
  require_once $base . '/includes/utils.php';
  require_once $base . '/includes/site.php';

  configure_error_handling();

  $cfg = [
    'base_url' => $BASE_URL,
    'site_name' => '18Date.net',
    'default_title' => '18+ Sexdating | 18Date.net',
    'default_og_image' => $BASE_URL . '/img/fb.png',
    'item_prefix' => 'sexdate',
    'item_remove_regex' => '/^sexdate-/',
    'item_page_title_prefix' => 'Sexdate',
    'slug_prefix' => 'date',
    'profile_prefix' => 'date',
    'profile_title_prefix' => 'Date',
    'missing_profile_prefix' => 'Sexdate met',
    'tips_title_prefix' => 'Sexdatingtips',
  ];

  list($generatedCanonical, $generatedPageTitle, $generatedOgImage, $generatedMetaDescription) = generate_canonical_meta($cfg, isset($province) ? $province : []);
  $canonical = isset($canonical) ? $canonical : $generatedCanonical;
  $pageTitle = isset($pageTitle) ? $pageTitle : $generatedPageTitle;
  $ogImage   = isset($ogImage) ? $ogImage : $generatedOgImage;
  if (!isset($metaDescription) && $generatedMetaDescription) {
    $metaDescription = $generatedMetaDescription;
  }

?>

<!DOCTYPE html>
<html lang="nl-NL">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php
  $defaultDescription = "Discover real adult encounters on 18date.net – your trusted platform for casual sex dating with singles across Europe.";
  $description = isset($metaDescription) ? $metaDescription : $defaultDescription;
?>
<meta name="description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="author" content="18Date">
<link rel="icon" type="image/png" href="img/fav/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="img/fav/favicon.svg" />
<link rel="shortcut icon" href="img/fav/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="img/fav/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="18date" />
<link rel="manifest" href="img/fav/site.webmanifest" />
<?php
  output_meta_tags($canonical, $pageTitle, $description, $ogImage);
?>

<!-- Bootstrap core CSS -->
<link href="css/vendor/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">

</head>

<body id="top">
  <div id="oproepjes">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="https://18date.net/"><img class="logo" src="img/logo.png" alt="18Date"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu</button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <?php include $base . '/includes/nav.php'; ?>
        </div>
      </div>
    </nav>
  <main>
