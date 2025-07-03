<?php
$base = __DIR__;
define('TITLE', 'Partnerlinks');
$canonical = 'https://18date.net/partnerlinks';
$pageTitle = 'Partnerlinks | 18Date.net';
include $base . '/includes/header.php';
include $base . '/includes/partner_links.php';
?>
<div class="container">
    <div class="jumbotron my-4">
        <h1 class="text-center">Partnerlinks:</h1>
        <div class="row">
            <?php
            $chunks = array_chunk($partnerLinks, ceil(count($partnerLinks) / 2));
            foreach ($chunks as $chunk) {
                echo '<div class="col-md-6 col-12">';
                echo '<ul>';
                foreach ($chunk as $link) {
                    $url = htmlspecialchars($link['url'], ENT_QUOTES, 'UTF-8');
                    $label = htmlspecialchars($link['label'], ENT_QUOTES, 'UTF-8');
                    echo "<li><a href=\"$url\" target=\"_blank\" class=\"m-0\">$label</a></li>";
                }
                echo '</ul>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
<?php
include $base . '/includes/footer.php';
?>
