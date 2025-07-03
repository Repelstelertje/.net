<!-- Footer -->
<footer class="bg-dark">
	<ul class="footer-links">
		<li><a href="https://sex55.net/" target="_blank" class="m-0">Sex55</a> - </li>
		<li><a href="https://shemaledaten.net/" target="_blank" class="m-0">Shemale Daten</a> - </li>
		<li><a href="https://oproepjesnederland.nl/" target="_blank" class="m-0">Oproepjes Nederland</a> - </li>
		<li><a href="https://zoekertjesbelgie.be/" target="_blank" class="m-0">Zoekertjes België</a> - </li>
    <li><a href="https://datingcontact.co.uk/" target="_blank" class="m-0">Dating Contact UK</a> - </li>
    <li><a href="https://datingnebenan.de/" target="_blank" class="m-0">Dating Nebenan</a> - </li>
    <li><a href="https://e-notifyer.nl/" target="_blank" class="m-0">E-notifyer</a> - </li>
    <li><a href="/partnerlinks.php" class="m-0">Meer partnerlinks...</a></li>
	</ul>
  	<span class="sub-text">Copyright &copy; <?php echo date('Y'); ?> <?php echo $companyName; ?> | Vind hier jouw gratis sexdate!</span>
    <span class="policy-links sub-text"><a href="/privacy.php">Privacybeleid</a> | <a href="/cookie-policy.php">Cookiebeleid</a></span>
</footer>
<!-- Cookie Consent Banner -->
<div id="cookie-banner" style="position: fixed; bottom: 0; left: 0; right: 0; background: #fff; border-top: 1px solid #ccc; font-family: Arial, sans-serif; padding: 20px; z-index: 10000; display: none;">
  <div style="max-width: 960px; margin: auto;">
    <p style="margin-bottom: 10px;">We use cookies to personalize content and ads, to provide social media features and to analyze our traffic. For more details, see our <a href="/cookie-policy.php" target="_blank">Cookie Policy</a>.</p>
    <form id="cookie-form">
      <label><input type="checkbox" disabled checked> Necessary (required)</label><br>
      <label><input type="checkbox" id="cookie-statistics"> Statistics (e.g. Google Analytics)</label><br>
      <label><input type="checkbox" id="cookie-marketing"> Marketing (e.g. Google Ads, Meta Pixel)</label><br><br>
      <button type="submit" style="background-color: #007BFF; color: white; border: none; padding: 10px 15px; margin-right: 10px; cursor: pointer;">Save preferences</button>
      <button type="button" id="cookie-accept-all" style="background-color: #28a745; color: white; border: none; padding: 10px 15px; cursor: pointer;">Accept all</button>
    </form>
  </div>
</div>
</main>
</div> <!-- /.oproepjes -->
<script src="js/vendor/vue.2.5.13.min.js"></script>
<script src="js/vendor/axios.0.17.1.min.js"></script>
<script src="js/vendor/jquery.min.js"></script>
<script src="js/vendor/bootstrap.bundle.min.js"></script>
<script src="js/cookie-consent.js"></script>
<script type="text/javascript">
	var topper = ['1.gif', '2.gif', '3.gif', '4.gif', '5.gif', '6.gif', '7.gif', '8.gif', '9.gif', '10.gif'];
	$('<a href="https://testars-consin.icu/543064f4-6080-4845-8f43-30f049426cdf?site={18D}"><img class="align-center" src="img/banners/' + topper[Math.floor(Math.random() * topper.length)] + '" alt="Spannende plekken om contact te maken"></a>').appendTo('#top-banner');
	var footer = ['1.gif', '2.gif', '3.gif', '4.gif', '5.gif', '6.gif', '7.gif', '8.gif', '9.gif', '10.gif'];
	$('<a href="https://testars-consin.icu/543064f4-6080-4845-8f43-30f049426cdf?site={18D}"><img class="align-center" src="img/banners/' + footer[Math.floor(Math.random() * footer.length)] + '" alt="Spannende plekken om contact te maken"></a>').appendTo('#footer-banner');
</script>
<script src="https://unpkg.com/vue-router@3.5.3/dist/vue-router.js"></script>
<?php 
  if(isset ($type) && $type == "profile"){
    echo '<script src="js/profile.js"></script>';
  } else {
    echo '<script src="js/oproepjes.js"></script>';
  }
?>
</body>
</html>
