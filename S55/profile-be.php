<?php
	define("TITLE", "Daten");
	include('includes/header.php');
?>
<!-- Page Content -->
<div class="container" id="profiel" v-cloak>
    <div id="top-banner"></div>
    <div class="jumbotron my-4">
        <h1 class="text-center">Sexdate met {{ profile.name }} uit {{ profile.city }}</h1>
        <hr>
        <div class="row">
            <div class="col-sm-4 text-center">
                <img class="profile-pic" :src="profile.profile_image_big">
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
                <a :href="profile.url + '?ref=' + ref_id" class="btn btn-primary mt-1">Stuur gratis bericht</a>
            </div>
        </div><!-- /.row -->
    </div>
    <div id="footer-banner"></div>
</div><!-- Container -->

<script nonce="2726c7f26c">    
    var api_url= "https://20fhbe2020.be/profile/get0/11/";
    var ref_id= "32"; //de ref_id vd landingwebsite
</script>
<?php 
    $type = "profile";
    include('includes/footer.php'); 
?>