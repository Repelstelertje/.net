<?php
$base = __DIR__;
	define("TITLE", "404 | Page not found");
	include $base . '/includes/header.php';
?>

<div class="container">
	<div class="jumbotron my-4">
    	<div class="text-center" style="min-height: 400px;">
       		<h1>Oeps!</h1>
       		<h2>Helaas is de opgevraagde pagina niet gevonden.</h2>
          	<p>	Redenen hiervoor kunnen zijn:<br />1. Het profiel dat je probeert te benaderen bestaat niet meer.<br />2. Het webadres is niet correct ingevoerd.<br /><br />Gebruik het menu op deze pagina om een nieuwe keuze te maken.</p>
        	<a href="index.php" class="btn btn-primary"> Startpagina </a>
		  	<?php
                        foreach ($navItemsNL as $item) {
                        echo "<a class=\"btn btn-primary\" href=\"$item[slug]\" style=\"margin: 1px;\">$item[title]</a>";
                        }
                    ?>
                    <?php
            foreach ($navItemsBE as $item2) {
                echo "<a class=\"btn btn-primary\" href=\"$item2[slug]\" style=\"margin: 1px;\">$item2[title]</a>";
            }
          	?>
        </div>
	</div>
</div>
<?php
	include $base . '/includes/footer.php';
?>
