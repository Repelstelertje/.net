<?php
$base = __DIR__;

$country = isset($_GET['country']) ? strtolower($_GET['country']) : '';
$allowed = ['nl','be','uk','de','at','ch'];
if (!in_array($country, $allowed)) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    include $base . '/404.php';
    exit;
}

$data = [
    'nl' => [
        'file' => '/includes/arr_prov_nl.php',
        'var' => 'nl',
        'landVar' => 'nlLand',
        'title' => 'Sexdate Nederland',
        'canonical' => 'https://18date.net/sexdate-nederland',
        'pageTitle' => 'Sexdate Nederland | 18Date.net',
        'id' => 'nederland'
    ],
    'be' => [
        'file' => '/includes/arr_prov_be.php',
        'var' => 'be',
        'landVar' => 'beLand',
        'title' => 'Sexdate België',
        'canonical' => 'https://18date.net/sexdate-belgie',
        'pageTitle' => 'Sexdate België | 18Date.net',
        'id' => 'belgie'
    ],
    'uk' => [
        'file' => '/includes/arr_prov_uk.php',
        'var' => 'uk',
        'landVar' => 'ukLand',
        'title' => 'Sexdate United Kingdom',
        'canonical' => 'https://18date.net/sexdate-verenigd-koninkrijk',
        'pageTitle' => 'Sexdate United Kingdom | 18Date.net',
        'id' => 'uk'
    ],
    'de' => [
        'file' => '/includes/arr_prov_de.php',
        'var' => 'de',
        'landVar' => 'deLand',
        'title' => 'Sexdate Duitsland',
        'canonical' => 'https://18date.net/sexdate-duitsland',
        'pageTitle' => 'Sexdate Duitsland | 18Date.net',
        'id' => 'duitsland'
    ],
    'at' => [
        'file' => '/includes/arr_prov_at.php',
        'var' => 'at',
        'landVar' => 'atLand',
        'title' => 'Sexdate Oostenrijk',
        'canonical' => 'https://18date.net/sexdate-oostenrijk',
        'pageTitle' => 'Sexdate Oostenrijk | 18Date.net',
        'id' => 'oostenrijk'
    ],
    'ch' => [
        'file' => '/includes/arr_prov_ch.php',
        'var' => 'ch',
        'landVar' => 'chLand',
        'title' => 'Sexdate Zwitserland',
        'canonical' => 'https://18date.net/sexdate-zwitserland',
        'pageTitle' => 'Sexdate Zwitserland | 18Date.net',
        'id' => 'zwitserland'
    ],
];

$info = $data[$country];

include $base . $info['file'];
$provArray = ${$info['var']};
$landInfo = ${$info['landVar']};

$canonical = $info['canonical'];
$pageTitle = $info['pageTitle'];
define('TITLE', $info['title']);
$metaDescription = $landInfo['meta'];

include $base . '/includes/header.php';
?>
<div class="container">
    <div class="jumbotron my-4" id="<?php echo $info['id']; ?>">
        <h1 class="text-center"><?php echo $landInfo['title']; ?></h1>
        <hr>
        <p><?php echo $landInfo['intro']; ?></p>
    </div>
    <div class="row text-center" id="keuze">
    <?php
      foreach ($provArray as $slugKey => $item) {
          $slug = 'sexdate-' . $slugKey;
          if (($country === 'nl' || $country === 'be') && $slugKey === 'limburg') {
              $slug = 'sexdate-limburg-' . $country;
          }
    ?>
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card h-100 text-left">
        <a href="<?php echo $slug; ?>"><img class="card-img-top" src="img/front/<?php echo $item['img']; ?>.jpeg" alt="Sexdate <?php echo $item['name']; ?>" @error="imgError"></a>
        <div class="card-body">
          <a href="<?php echo $slug; ?>"><h4 class="card-title"><?php echo $item['name']; ?></h4></a>
          <hr>
          <p class="card-text"><?php echo $item['meta']; ?></p>
        </div>
        <a href="<?php echo $slug; ?>" class="card-footer btn btn-primary">Sexdate <?php echo $item['name']; ?></a>
      </div>
    </div>
    <?php } ?>
    </div>
    <div class="jumbotron">
        <?php echo $landInfo['tekst']; ?>
    </div>
</div><!-- container -->
<?php include $base . '/includes/footer.php'; ?>

