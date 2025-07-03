<?php
$base = __DIR__;
include $base . '/includes/header.php';
?>
<!-- Page Content -->
    <div class="container" id="profiel">
      <div id="top-banner"></div>
      <div class="jumbotron my-4">
        <h1 class="text-center">Shemale {{ profile.name }} uit {{ profile.city }}</h1>
        <hr>
        <div class="row">

          <div class="col-sm-4 text-center">
            <img class="profile-pic" :src="profile.profile_image_big" @error="imgError" :alt="'Dating in ' + profile.province + ' met ' + profile.name" :title="'Profielfoto van ' + profile.name">
          </div>

          <div class="col-sm-8">
            <h4>Over {{ profile.name }}:</h4>
            <p>{{ profile.aboutme }}</p>
            <h4>Persoonlijke informatie:</h4>
            <ul class="list-group">
              <li class="list-group-item">Provincie: {{ profile.province }}</li>
              <li class="list-group-item">Stad: {{ profile.city }}</li>
              <li class="list-group-item">Leeftijd: {{ profile.age }}</li>
              <li class="list-group-item">Relatiestatus: {{ profile.relationship }}</li>
              <li class="list-group-item">Lengte: {{ profile.length }}</li>
            </ul>
            <a :href="profile.url + '?ref=32'" class="btn btn-primary mt-1" id="send-msg-btn">Stuur gratis bericht</a>
          </div>  
        </div>
      </div><!-- /.row -->
      <div id="footer-banner"></div>
    </div><!-- Container -->

<?php
  $country = isset($_GET['country']) ? $_GET['country'] : '';
  switch ($country) {
    case 'nl':
      $api_url = api_base('nl') . '/profile/get0/80/';
      $ref_id = '80';
      break;
    case 'be':
      $api_url = api_base('be') . '/profile/get0/83/';
      $ref_id = '83';
      break;
    case 'uk':
      $api_url = api_base('uk') . '/profile/get0/180/';
      $ref_id = '180';
      break;
    case 'de':
      $api_url = api_base('de') . '/profile/get0/280/';
      $ref_id = '280';
      break;
    case 'at':
      $api_url = api_base('at') . '/profile/get0/680/';
      $ref_id = '680';
      break;
    case 'ch':
      $api_url = api_base('ch') . '/profile/get0/580/';
      $ref_id = '580';
      break;
    default:
      $api_url = api_base() . '/profile/get/';
      $ref_id = '180';
  }
?>
<script>
  var api_url = "<?= $api_url ?>";
  var profile_slug = "<?= isset($_GET['slug']) ? htmlspecialchars($_GET['slug'], ENT_QUOTES, 'UTF-8') : '' ?>";
</script>

<?php 
  $type = "profile";
  include $base . '/includes/footer.php'; 
?>
