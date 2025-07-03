<?php
$base = __DIR__;
	define("TITLE", "Home");
  include $base . '/includes/header.php';
?>

<div class="container">
	<!-- Jumbotron Header -->
	<div class="jumbotron my-4 text-center">
  	<h1>Shemale Daten - Shemales zoeken Man</h1>
    <hr>
    <h2>Zoek hier shemales bij jou in buurt!</h2>
    <div class="button-area">
        <a class="btn btn-primary prov-btn" href="#land-nl">Nederland</a>
        </div>
        <div class="button-area">
        <a class="btn btn-primary prov-btn" href="#land-be">België</a>
        </div>
        <div class="button-area">
        <a class="btn btn-primary prov-btn" href="#land-uk">UK</a>
        </div>
        <div class="button-area">
        <a class="btn btn-primary prov-btn" href="#land-de">Duitsland</a>
        </div>
        <div class="button-area">
        <a class="btn btn-primary prov-btn" href="#land-at">Oostenrijk</a>
        </div>
        <div class="button-area">
        <a class="btn btn-primary prov-btn" href="#land-ch">Zwitserland</a>
        </div>
    </div>
    <div id="top-banner"></div>
  <div class="jumbotron jumbotron-sm text-center" id="land-nl">
        <h2>Nieuwste shemales Nederland op zoek naar een sexdate!</h2>
    </div>
    <div class="row country-section" id="oproepjes-nl" v-cloak>
        <div class="col-12" v-if="dataError">
            <div class="alert alert-warning data-error">Profieldata kon niet geladen worden.</div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 portfolio-item profile-card" :id="'profile-' + profile.id" v-for="profile in filtered_profiles">
            <div class="card h-100">
                <a :href="'daten-met-' + slugify(profile.name) + '?id=' + profile.id"><img class="card-img-top" :src="profile.src.replace('150x150', '300x300')" :alt="profile.name + ' daten in Nederland'" @error="imgError"></a>
                <div class="card-body">
                    <div class="card-top">
                        <h4 class="card-title">{{ profile.name }}</h4>  
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Leeftijd: {{ profile.age }}</li>
                        <li class="list-group-item">Relatie: {{ profile.relationship }}</li>
                        <li class="list-group-item">Stad: {{ profile.city }}</li>
                        <li class="list-group-item">Provincie: {{ profile.province }}</li>
                    </ul>
                </div>
                <a :href="'profile.php?country=<?php echo $country; ?>&id=' + profile.id" class="card-footer btn btn-primary">Bekijk profiel</a>
            </div>
        </div>
        <script>
            window.addEventListener('load', function(){
                createOproepjes('#oproepjes-nl', "<?= api_base('nl'); ?>/profile/banner/120");
            });
        </script>
        <!-- Pagination -->
        <nav class="nav-pag" aria-label="Page navigation">
            <ul class="pagination flex-wrap justify-content-center">
                <li class="page-item">
                    <a class="page-link" aria-label="Vorige" v-on:click="set_page_number(page-1)" ><span aria-hidden="true">&laquo;</span><span class="sr-only">Vorige</span></a>
                </li> 
                <li v-for="page_number in max_page_number" class="page-item" v-bind:class="{ active: page_number == page }" >
                  <a class="page-link" v-on:click="set_page_number(page_number)">{{ page_number }}</a>
                </li> 
                <li class="page-item">
                  <a class="page-link" aria-label="Volgende" v-on:click="set_page_number(page+1)" ><span aria-hidden="true">&raquo;</span><span class="sr-only">Volgende</span></a>
                </li>
            </ul>
        </nav>
    </div><!-- /.row -->
    <div class="jumbotron jumbotron-sm text-center" id="land-be">
        <h2>Nieuwste shemales België op zoek naar een sexdate!</h2>
    </div>
    <div class="row country-section" id="oproepjes-be" v-cloak>
        <div class="col-12" v-if="dataError">
            <div class="alert alert-warning data-error">Profieldata kon niet geladen worden.</div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 portfolio-item profile-card" :id="'profile-' + profile.id" v-for="profile in filtered_profiles">
            <div class="card h-100">
                <a :href="'daten-met-' + slugify(profile.name) + '?id=' + profile.id"><img class="card-img-top" :src="profile.src.replace('150x150', '300x300')" :alt="profile.name + ' daten in België'" @error="imgError"></a>
                <div class="card-body">
                    <div class="card-top">
                        <h4 class="card-title">{{ profile.name }}</h4>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Leeftijd: {{ profile.age }}</li>
                        <li class="list-group-item">Relatie: {{ profile.relationship }}</li>
                        <li class="list-group-item">Stad: {{ profile.city }}</li>
                        <li class="list-group-item">Provincie: {{ profile.province }}</li>
                    </ul>
                </div>
                <a :href="'profile.php?country=<?php echo $country; ?>&id=' + profile.id" class="card-footer btn btn-primary">Bekijk profiel</a>
            </div>
        </div>
        <script>
            window.addEventListener('load', function(){
                createOproepjes('#oproepjes-be', "<?= api_base('be'); ?>/profile/banner/120");
            });
        </script>
        <!-- Pagination -->
        <nav class="nav-pag" aria-label="Page navigation">
            <ul class="pagination flex-wrap justify-content-center">
                <li class="page-item">
                    <a class="page-link" aria-label="Vorige" v-on:click="set_page_number(page-1)" ><span aria-hidden="true">&laquo;</span><span class="sr-only">Vorige</span></a>
                </li> 
                <li v-for="page_number in max_page_number" class="page-item" v-bind:class="{ active: page_number == page }" >
                  <a class="page-link" v-on:click="set_page_number(page_number)">{{ page_number }}</a>
                </li> 
                <li class="page-item">
                  <a class="page-link" aria-label="Volgende" v-on:click="set_page_number(page+1)" ><span aria-hidden="true">&raquo;</span><span class="sr-only">Volgende</span></a>
                </li>
            </ul>
        </nav>
    </div><!-- /.row -->
    <div class="jumbotron jumbotron-sm text-center" id="land-uk">
        <h2>Nieuwste shemales United Kingdom op zoek naar een sexdate!</h2>
    </div>
    <div class="row country-section" id="oproepjes-uk" v-cloak>
        <div class="col-12" v-if="dataError">
            <div class="alert alert-warning data-error">Profieldata kon niet geladen worden.</div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 portfolio-item profile-card" :id="'profile-' + profile.id" v-for="profile in filtered_profiles">
            <div class="card h-100">
                <a :href="'daten-met-' + slugify(profile.name) + '?id=' + profile.id"><img class="card-img-top" :src="profile.src.replace('150x150', '300x300')" :alt="profile.name + ' daten in United Kingdom'" @error="imgError"></a>
                <div class="card-body">
                    <div class="card-top">
                        <h4 class="card-title">{{ profile.name }}</h4>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Leeftijd: {{ profile.age }}</li>
                        <li class="list-group-item">Relatie: {{ profile.relationship }}</li>
                        <li class="list-group-item">Stad: {{ profile.city }}</li>
                        <li class="list-group-item">Regio: {{ profile.province }}</li>
                    </ul>
                </div>
                <a :href="'profile.php?country=<?php echo $country; ?>&id=' + profile.id" class="card-footer btn btn-primary">Bekijk profiel</a>
            </div>
        </div>
        <script>
            window.addEventListener('load', function(){
                createOproepjes('#oproepjes-uk', "<?= api_base('uk'); ?>/profile/banner/120");
            });
        </script>
        <!-- Pagination -->
        <nav class="nav-pag" aria-label="Page navigation">
            <ul class="pagination flex-wrap justify-content-center">
                <li class="page-item">
                    <a class="page-link" aria-label="Vorige" v-on:click="set_page_number(page-1)" ><span aria-hidden="true">&laquo;</span><span class="sr-only">Vorige</span></a>
                </li> 
                <li v-for="page_number in max_page_number" class="page-item" v-bind:class="{ active: page_number == page }" >
                  <a class="page-link" v-on:click="set_page_number(page_number)">{{ page_number }}</a>
                </li> 
                <li class="page-item">
                  <a class="page-link" aria-label="Volgende" v-on:click="set_page_number(page+1)" ><span aria-hidden="true">&raquo;</span><span class="sr-only">Volgende</span></a>
                </li>
            </ul>
        </nav>
    </div><!-- /.row -->
    <div class="jumbotron jumbotron-sm text-center" id="land-de">
        <h2>Nieuwste shemales Duitsland op zoek naar een sexdate!</h2>
    </div>
    <div class="row country-section" id="oproepjes-de" v-cloak>
        <div class="col-12" v-if="dataError">
            <div class="alert alert-warning data-error">Profieldata kon niet geladen worden.</div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 portfolio-item profile-card" :id="'profile-' + profile.id" v-for="profile in filtered_profiles">
            <div class="card h-100">
                <a :href="'daten-met-' + slugify(profile.name) + '?id=' + profile.id"><img class="card-img-top" :src="profile.src.replace('150x150', '300x300')" :alt="profile.name + ' daten in Duitsland'" @error="imgError"></a>
                <div class="card-body">
                    <div class="card-top">
                        <h4 class="card-title">{{ profile.name }}</h4>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Leeftijd: {{ profile.age }}</li>
                        <li class="list-group-item">Relatie: {{ profile.relationship }}</li>
                        <li class="list-group-item">Stad: {{ profile.city }}</li>
                        <li class="list-group-item">Provincie: {{ profile.province }}</li>
                    </ul>
                </div>
                <a :href="'profile.php?country=<?php echo $country; ?>&id=' + profile.id" class="card-footer btn btn-primary">Bekijk profiel</a>
            </div>
        </div>
        <script>
            window.addEventListener('load', function(){
                createOproepjes('#oproepjes-de', "<?= api_base('de'); ?>/profile/banner3/120");
            });
        </script>
        <!-- Pagination -->
        <nav class="nav-pag" aria-label="Page navigation">
            <ul class="pagination flex-wrap justify-content-center">
                <li class="page-item">
                    <a class="page-link" aria-label="Vorige" v-on:click="set_page_number(page-1)" ><span aria-hidden="true">&laquo;</span><span class="sr-only">Vorige</span></a>
                </li> 
                <li v-for="page_number in max_page_number" class="page-item" v-bind:class="{ active: page_number == page }" >
                  <a class="page-link" v-on:click="set_page_number(page_number)">{{ page_number }}</a>
                </li> 
                <li class="page-item">
                  <a class="page-link" aria-label="Volgende" v-on:click="set_page_number(page+1)" ><span aria-hidden="true">&raquo;</span><span class="sr-only">Volgende</span></a>
                </li>
            </ul>
        </nav>
    </div><!-- /.row -->
    <div class="jumbotron jumbotron-sm text-center" id="land-at">
        <h2>Nieuwste shemales Oostenrijk op zoek naar een sexdate!</h2>
    </div>
    <div class="row country-section" id="oproepjes-at" v-cloak>
        <div class="col-12" v-if="dataError">
            <div class="alert alert-warning data-error">Profieldata kon niet geladen worden.</div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 portfolio-item profile-card" :id="'profile-' + profile.id" v-for="profile in filtered_profiles">
            <div class="card h-100">
                <a :href="'daten-met-' + slugify(profile.name) + '?id=' + profile.id"><img class="card-img-top" :src="profile.src.replace('150x150', '300x300')" :alt="profile.name + ' daten in Oostenrijk'" @error="imgError"></a>
                <div class="card-body">
                    <div class="card-top">
                        <h4 class="card-title">{{ profile.name }}</h4>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Leeftijd: {{ profile.age }}</li>
                        <li class="list-group-item">Relatie: {{ profile.relationship }}</li>
                        <li class="list-group-item">Stad: {{ profile.city }}</li>
                        <li class="list-group-item">Provincie: {{ profile.province }}</li>
                    </ul>
                </div>
                <a :href="'profile.php?country=<?php echo $country; ?>&id=' + profile.id" class="card-footer btn btn-primary">Bekijk profiel</a>
            </div>
        </div>
        <script>
            window.addEventListener('load', function(){
                createOproepjes('#oproepjes-at', "<?= api_base('at'); ?>/profile/banner3/120");
            });
        </script>
        <!-- Pagination -->
        <nav class="nav-pag" aria-label="Page navigation">
            <ul class="pagination flex-wrap justify-content-center">
                <li class="page-item">
                    <a class="page-link" aria-label="Vorige" v-on:click="set_page_number(page-1)" ><span aria-hidden="true">&laquo;</span><span class="sr-only">Vorige</span></a>
                </li> 
                <li v-for="page_number in max_page_number" class="page-item" v-bind:class="{ active: page_number == page }" >
                  <a class="page-link" v-on:click="set_page_number(page_number)">{{ page_number }}</a>
                </li> 
                <li class="page-item">
                  <a class="page-link" aria-label="Volgende" v-on:click="set_page_number(page+1)" ><span aria-hidden="true">&raquo;</span><span class="sr-only">Volgende</span></a>
                </li>
            </ul>
        </nav>
    </div><!-- /.row -->
    <div class="jumbotron jumbotron-sm text-center" id="land-ch">
        <h2>Nieuwste shemales Zwitserland op zoek naar een sexdate!</h2>
    </div>
    <div class="row country-section" id="oproepjes-ch" v-cloak>
        <div class="col-12" v-if="dataError">
            <div class="alert alert-warning data-error">Profieldata kon niet geladen worden.</div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 portfolio-item profile-card" :id="'profile-' + profile.id" v-for="profile in filtered_profiles">
            <div class="card h-100">
                <a :href="'daten-met-' + slugify(profile.name) + '?id=' + profile.id"><img class="card-img-top" :src="profile.src.replace('150x150', '300x300')" :alt="profile.name + ' daten in Zwitserland'" @error="imgError"></a>
                <div class="card-body">
                    <div class="card-top">
                        <h4 class="card-title">{{ profile.name }}</h4>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Leeftijd: {{ profile.age }}</li>
                        <li class="list-group-item">Relatie: {{ profile.relationship }}</li>
                        <li class="list-group-item">Stad: {{ profile.city }}</li>
                        <li class="list-group-item">Regio: {{ profile.province }}</li>
                    </ul>
                </div>
                <a :href="'profile.php?country=<?php echo $country; ?>&id=' + profile.id" class="card-footer btn btn-primary">Bekijk profiel</a>
            </div>
        </div>
        <script>
            window.addEventListener('load', function(){
                createOproepjes('#oproepjes-ch', "<?= api_base('ch'); ?>/profile/banner3/120");
            });
        </script>
        <!-- Pagination -->
        <nav class="nav-pag" aria-label="Page navigation">
            <ul class="pagination flex-wrap justify-content-center">
                <li class="page-item">
                    <a class="page-link" aria-label="Vorige" v-on:click="set_page_number(page-1)" ><span aria-hidden="true">&laquo;</span><span class="sr-only">Vorige</span></a>
                </li> 
                <li v-for="page_number in max_page_number" class="page-item" v-bind:class="{ active: page_number == page }" >
                  <a class="page-link" v-on:click="set_page_number(page_number)">{{ page_number }}</a>
                </li> 
                <li class="page-item">
                  <a class="page-link" aria-label="Volgende" v-on:click="set_page_number(page+1)" ><span aria-hidden="true">&raquo;</span><span class="sr-only">Volgende</span></a>
                </li>
            </ul>
        </nav>
    </div><!-- /.row -->
  <div id="footer-banner"></div>
  <div class="jumbotron text-center">
    <h6>Nederland</h6>
    <a href="https://transgrinder.nl" target="_blank" class="m-0" title="TransGrinder.nl - Verbind met Trans Contacten in Nederland!">Transgrinder</a> - 
    <a href="https://shemalezoekt.com" target="_blank" class="m-0" title="ShemaleZoekt.com - Shemales Zoeken Contact in Nederland!">Shemale Zoekt</a> - 
    <a href="https://trannymarkt.com" target="_blank" class="m-0" title="TrannyMarkt.com - Markt voor Shemale Contacten in Nederland!">Tranny Markt</a> - 
    <a href="https://shemalecontacten.com" target="_blank" class="m-0" title="ShemaleContacten.com - Shemale Contact Vinden in Nederland!">Shemale Contacten</a>
    <hr>
    <h6>België</h6>
    <a href="https://transgrinder.be" target="_blank" class="m-0" title="TransGrinder.be - Trans Contacten Vinden in België!">Transgrinder</a> - 
    <a href="https://trannyzoekt.com" target="_blank" class="m-0" title="TrannyZoekt.com - Shemales Zoeken Contact in België!">Tranny Zoekt</a> - 
    <a href="https://shemalemarkt.com" target="_blank" class="m-0" title="ShemaleMarkt.com - Markt voor Shemale Contacten in België!">Shemale Markt</a> - 
    <a href="https://trannycontacten.com" target="_blank" class="m-0" title="Trannycontacten.com - Shemale Contacten Ontdekken in België!">Tranny Contacten</a>
    <hr>
    <h6>United Kingdom</h6>
    <a href="https://myshemalecontact.com" target="_blank" class="m-0" title="MySheMaleContact.com - Connect with Shemale Singles, Today!">MySheMaleContact</a> - 
    <a href="https://contactshemale.com" target="_blank" class="m-0" title="ContactShemale.com - Connect with Transgenders in Your Area!">ContactShemale</a> - 
    <a href="https://matchshemale.com" target="_blank" class="m-0" title="MatchShemale.com - Match and Discover Shemales Near You!">MatchShemale</a> - 
    <a href="https://eroticshemales.com" target="_blank" class="m-0" title="EroticShemales.com - Explore Shemale Contacts in the UK!">EroticShemales</a>
    <hr>
    <h6>Deutschland</h6>
    <a href="https://meintranskontakt.com" target="_blank" class="m-0" title="Meintranskontakt.com - Transkontakte in Deutschland finden">Meintranskontakt</a> - 
    <a href="https://trannytreffen.com" target="_blank" class="m-0" title="Trannytreffen - Finde Trans-Kontakte in Ihrer Nähe heute!">Trannytreffen</a> - 
    <a href="https://transgenderkontakt.com" target="_blank" class="m-0" title="Transgenderkontakt - Finde lokale Trans in Deiner Nähe!">Transgenderkontakt</a> - 
    <a href="https://lokalshemale.com" target="_blank" class="m-0" title="Lokalshemale.com - Diskret Shemale Kontakt in Deiner Nähe">Lokalshemale</a>
  </div>
</div><!-- container -->
<?php include $base . '/includes/footer.php'; ?>
