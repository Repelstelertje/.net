<?php 
$base = __DIR__;
define("TITLE", "Datingtips");

$canonical = 'https://18date.net/datingtips';
$pageTitle = 'Datingtips | 18Date.net';

include $base . '/includes/array_tips.php';

require_once $base . '/includes/utils.php';

$datingtip = 'datingtips';
if(isset($_GET['item'])) {
        $candidate = strip_bad_chars($_GET['item']);
        if (isset($datingtips[$candidate])) {
                $datingtip = $candidate;
        }
}
$tips = $datingtips[$datingtip] ?? null;

if (!$tips) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        include $base . '/404.php';
        exit;
}

$metaDescription = $tips['meta'];
include $base . '/includes/header.php';
?>

<div class="container">
        <div class='jumbotron my-4'>
                <h1 class='text-center'><?php echo htmlspecialchars($tips["title"], ENT_QUOTES, 'UTF-8'); ?></h1>
                <?php echo $tips["intro"]; ?>
        </div>
        <div class='jumbotron my-4'>
                <?php echo $tips["tekst"]; ?>
        </div>
</div>

<?php include $base . '/includes/footer.php'; ?>
