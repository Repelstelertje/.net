<?php
$base = __DIR__;
define('TITLE', 'Daten in');
require_once $base . '/includes/utils.php';

$country = isset($_GET['country']) ? strtolower($_GET['country']) : '';
$allowed = ['nl','be','uk','de','at','ch'];
if (!in_array($country, $allowed)) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    include $base . '/404.php';
    exit;
}

$settings = [
    'nl' => ['file' => '/includes/arr_prov_nl.php', 'var' => 'nl', 'suffix' => '-nl'],
    'be' => ['file' => '/includes/arr_prov_be.php', 'var' => 'be', 'suffix' => '-be'],
    'uk' => ['file' => '/includes/arr_prov_uk.php', 'var' => 'uk', 'suffix' => ''],
    'de' => ['file' => '/includes/arr_prov_de.php', 'var' => 'de', 'suffix' => ''],
    'at' => ['file' => '/includes/arr_prov_at.php', 'var' => 'at', 'suffix' => ''],
    'ch' => ['file' => '/includes/arr_prov_ch.php', 'var' => 'ch', 'suffix' => ''],
];

$info = $settings[$country];
include $base . $info['file'];
$provArray = ${$info['var']};

$province = null;
if (isset($_GET['item'])) {
    $slug = strip_bad_chars($_GET['item']);
    $slug = preg_replace('/^sexdate-/', '', $slug);
    if ($info['suffix']) {
        $slug = preg_replace('/' . preg_quote($info['suffix'], '/') . '$/', '', $slug);
    }
    if (isset($provArray[$slug])) {
        $province = $provArray[$slug];
    }
}

if (!$province) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    include $base . '/404.php';
    exit;
}

$metaDescription = $province['meta'];
include $base . '/includes/header.php';
?>

<div class="container">
    <div class="jumbotron my-4">
        <h1 class="text-center"><?php echo $province['title']; ?></h1>
        <hr>
        <p><?php echo $province['intro']; ?></p>
    </div>
    <div class="row" id="oproepjes-list" v-cloak>
        <div class="col-12" v-if="dataError">
            <div class="alert alert-warning data-error">Profieldata kon niet geladen worden.</div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item profile-card" :id="'profile-' + profile.id" v-for="profile in filtered_profiles">
            <div class="card h-100">
                <a :href="'profile.php?country=<?php echo $country; ?>&id=' + profile.id"><img class="card-img-top" :src="profile.src.replace('150x150', '300x300')" :alt="profile.name" @error="imgError"></a>
                <div class="card-body">
                    <div class="card-top">
                        <h4 class="card-title">{{ profile.name }}</h4>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Leeftijd: {{ profile.age }}</li>
                        <li class="list-group-item">Relatie: {{ profile.relationship }}</li>
                        <li class="list-group-item">Stad: {{ profile.city }}</li>
                        <li class="list-group-item"><?php echo ($country === 'nl' || $country === 'be') ? 'Provincie' : 'Regio'; ?>: {{ profile.province }}</li>
                    </ul>
                </div>
                <a :href="'profile.php?country=<?php echo $country; ?>&id=' + profile.id" class="card-footer btn btn-primary">Bekijk profiel</a></div>
        </div>
        <script>
            window.addEventListener('load', function(){
                createOproepjes('#oproepjes-list', "<?= api_base($country); ?>/profile/province_age/<?= $country; ?>/<?= rawurlencode($province['name']); ?>/18/45/120/S");
            });
        </script>
        <!-- Pagination -->
        <nav class="nav-pag" aria-label="Page navigation">
            <ul class="pagination flex-wrap justify-content-center">
                <li class="page-item">
                    <a class="page-link" aria-label="Vorige" v-on:click="set_page_number(page-1)" ><span aria-hidden="true">&laquo;</span><span class="sr-only">Vorige</span></a>
                </li>
                <li v-for="page_number in max_page_number"  class="page-item" v-bind:class="{ active: page_number == page }" >
                    <a class="page-link" v-on:click="set_page_number(page_number)">{{ page_number }}</a>
                </li>
                <li class="page-item">
                    <a class="page-link" aria-label="Volgende" v-on:click="set_page_number(page+1)" ><span aria-hidden="true">&raquo;</span><span class="sr-only">Volgende</span></a>
                </li>
            </ul>
        </nav>
    </div><!-- /.row -->
    <div class="container">
        <div id="footer-banner"></div>
        <div class="jumbotron">
            <?php echo $province['tekst']; ?>
        </div>
        <div class="jumbotron text-center">
            <?php
            $cleanSlug = preg_replace('/-(nl|be)$/', '', $province['img']);
            if ($country === 'nl') {
                echo '<a href="https://oproepjesnederland.nl/dating-' . $cleanSlug . '" class="btn btn-primary prov-btn" target="_blank">Dating Advertenties ' . $province['name'] . '</a>';
            } elseif ($country === 'be') {
                echo '<a href="https://zoekertjesbelgie.be/dating-' . $cleanSlug . '" class="btn btn-primary prov-btn" target="_blank">Dating Zoekertjes ' . $province['name'] . '</a>';
            } elseif ($country === 'uk') {
                echo '<a href="https://datingcontact.co.uk/dating-' . $province['img'] . '" class="btn btn-primary prov-btn" target="_blank">Dating Contact ' . $province['name'] . '</a>';
            } elseif (in_array($country, [ 'de', 'at', 'ch' ], true)) {
                echo '<a href="https://datingnebenan.de/dating-' . $province['img'] . '" class="btn btn-primary prov-btn" target="_blank">Dating Nebenan ' . $province['name'] . '</a>';
            }
            ?>
            <a href="https://sex55.net/sexdate-<?php echo $province['img']; ?>" class="btn btn-primary prov-btn" target="_blank">55+ Sexdate <?php echo $province['name']; ?></a>
            <a href="https://shemaledaten.net/shemale-<?php echo $province['img']; ?>" class="btn btn-primary prov-btn" target="_blank">Shemale sexdate <?php echo $province['name']; ?></a>
        </div>
    </div>
</div> <!-- container -->
<?php
include $base . '/includes/footer.php';
?>
