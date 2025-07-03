<?php
$base = __DIR__;
$pageTitle = '55+ Sexdating | sex55.net';
include $base . '/includes/header.php';
?>

<div class="container">
    <!-- Jumbotron Header -->
    <div class="jumbotron my-4 text-center">
        <h1>sex55.net - Vind hier jouw gratis sexdate!</h1>
        <hr>
        <h2>Zoek hier vrouwen bij jou in buurt!</h2>
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
        <h2>Nieuwste leden Nederland op zoek naar een sexdate!</h2>
    </div>
    <div class="row country-section" id="oproepjes-nl" v-cloak>
        <div class="col-12" v-if="dataError">
            <div class="alert alert-warning data-error">Profieldata kon niet geladen worden.</div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 portfolio-item profile-card" :id="'profile-' + profile.id" v-for="profile in filtered_profiles">
            <div class="card h-100">
                <a :href="'profile.php?country=<?php echo $country; ?>&id=' + profile.id"><img class="card-img-top" :src="profile.src.replace('150x150', '300x300')" :alt="profile.name + ' daten in Nederland'" @error="imgError"></a>
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
        <h2>Nieuwste leden België op zoek naar een sexdate!</h2>
    </div>
    <div class="row country-section" id="oproepjes-be" v-cloak>
        <div class="col-12" v-if="dataError">
            <div class="alert alert-warning data-error">Profieldata kon niet geladen worden.</div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 portfolio-item profile-card" :id="'profile-' + profile.id" v-for="profile in filtered_profiles">
            <div class="card h-100">
                <a :href="'profile.php?country=<?php echo $country; ?>&id=' + profile.id"><img class="card-img-top" :src="profile.src.replace('150x150', '300x300')" :alt="profile.name + ' daten in België'" @error="imgError"></a>
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
        <h2>Nieuwste leden United Kingdom op zoek naar een sexdate!</h2>
    </div>
    <div class="row country-section" id="oproepjes-uk" v-cloak>
        <div class="col-12" v-if="dataError">
            <div class="alert alert-warning data-error">Profieldata kon niet geladen worden.</div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 portfolio-item profile-card" :id="'profile-' + profile.id" v-for="profile in filtered_profiles">
            <div class="card h-100">
                <a :href="'profile.php?country=<?php echo $country; ?>&id=' + profile.id"><img class="card-img-top" :src="profile.src.replace('150x150', '300x300')" :alt="profile.name + ' daten in United Kingdom'" @error="imgError"></a>
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
        <h2>Nieuwste leden Duitsland op zoek naar een sexdate!</h2>
    </div>
    <div class="row country-section" id="oproepjes-de" v-cloak>
        <div class="col-12" v-if="dataError">
            <div class="alert alert-warning data-error">Profieldata kon niet geladen worden.</div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 portfolio-item profile-card" :id="'profile-' + profile.id" v-for="profile in filtered_profiles">
            <div class="card h-100">
                <a :href="'profile.php?country=<?php echo $country; ?>&id=' + profile.id"><img class="card-img-top" :src="profile.src.replace('150x150', '300x300')" :alt="profile.name + ' daten in Duitsland'" @error="imgError"></a>
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
        <h2>Nieuwste leden Oostenrijk op zoek naar een sexdate!</h2>
    </div>
    <div class="row country-section" id="oproepjes-at" v-cloak>
        <div class="col-12" v-if="dataError">
            <div class="alert alert-warning data-error">Profieldata kon niet geladen worden.</div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 portfolio-item profile-card" :id="'profile-' + profile.id" v-for="profile in filtered_profiles">
            <div class="card h-100">
                <a :href="'profile.php?country=<?php echo $country; ?>&id=' + profile.id"><img class="card-img-top" :src="profile.src.replace('150x150', '300x300')" :alt="profile.name + ' daten in Oostenrijk'" @error="imgError"></a>
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
        <h2>Nieuwste leden Zwitserland op zoek naar een sexdate!</h2>
    </div>
    <div class="row country-section" id="oproepjes-ch" v-cloak>
        <div class="col-12" v-if="dataError">
            <div class="alert alert-warning data-error">Profieldata kon niet geladen worden.</div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 portfolio-item profile-card" :id="'profile-' + profile.id" v-for="profile in filtered_profiles">
            <div class="card h-100">
                <a :href="'profile.php?country=<?php echo $country; ?>&id=' + profile.id"><img class="card-img-top" :src="profile.src.replace('150x150', '300x300')" :alt="profile.name + ' daten in Zwitserland'" @error="imgError"></a>
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
      <a href="https://buurtmilfs.nl" target="_blank" class="m-0" title="BuurtMilfs.nl - Vind Milfs in Jouw Buurt voor Contact!">BuurtMilfs</a> - 
      <a href="https://bd4xxx.nl" target="_blank" class="m-0" title="BD4XXX.nl - Ervaar Spanning en Sensualiteit in Nederland!">BD4XXX</a> - 
      <a href="https://sletplaats.nl" target="_blank" class="m-0" title="Sletplaats.nl - Contacten en Volwassen Plezier in Nederland!">Sletplaats</a> - 
      <a href="https://stout-contact.nl" target="_blank" class="m-0" title="Stout-Contact.nl - Stout en Spannend Contact in Nederland!">Stout Contact</a> - 
      <a href="https://oudevrouwenchat.nl" target="_blank" class="m-0" title="OudeVrouwenChat.nl - Chat met Rijpe Dames in Nederland">Oude Vrouwen Chat</a> - 
      <a href="https://rijpeomachat.nl" target="_blank" class="m-0" title="RijpeOmaChat.nl - Chat met Ervaren Dames in Nederland">Rijpe Oma Chat</a> - 
      <a href="https://rijpemilfchat.nl" target="_blank" class="m-0" title="RijpeMilfChat.nl - Chat met Ervaren Milfs in Nederland">Rijpe Milf Chat</a> - 
      <a href="https://rijpemilfmarkt.nl" target="_blank" class="m-0" title="RijpeMilfMarkt.nl - Markt voor Ervaren Milfs in Nederland">Rijpe Milf Markt</a> - 
      <a href="https://milfmarkt.nl" target="_blank" class="m-0" title="MilfMarkt.nl - Markt voor Contact met Milfs in Nederland">Milf Markt</a> - 
      <a href="https://hetebuurvrouwen.nl" target="_blank" class="m-0" title="HeteBuurVrouwen.nl - Contact met Buurvrouwen in Nederland">Hete Buurvrouwen</a> - 
      <a href="https://slettenchat.nl" target="_blank" class="m-0" title="SlettenChat.nl - Chat met Geile Sletten in Nederland">Sletten Chat</a> - 
      <a href="https://kinkycontacten.nl" target="_blank" class="m-0" title="KinkyContacten.nl - Ontdek Kinky contacten in Nederland">Kinky Contacten</a>
      <hr>
      <h6>België</h6>
      <a href="https://buurtmilfs.be" target="_blank" class="m-0" title="BuurtMilfs.be - Vind Milfs in Jouw Buurt voor Contact!">BuurtMilfs</a> - 
      <a href="https://bd4xxx.be" target="_blank" class="m-0" title="BD4XXX.be - Ervaar Spanning en Sensualiteit in België!">BD4XXX</a> - 
      <a href="https://sletplaats.be" target="_blank" class="m-0" title="Sletplaats.be - Contacten en Volwassen Plezier in België!">Sletplaats</a> - 
      <a href="https://stout-contact.be" target="_blank" class="m-0" title="Stout-Contact.be - Stoute en Spannende Connecties in België!">Stout Contact</a> - 
      <a href="https://oudevrouwenchat.be" target="_blank" class="m-0" title="OudeVrouwenChat.be - Chat met Rijpe Dames in België">Oude Vrouwen Chat</a> - 
      <a href="https://rijpeomachat.be" target="_blank" class="m-0" title="RijpeOmaChat.be - Chat met Ervaren Dames in België">Rijpe Oma Chat</a> - 
      <a href="https://rijpemilfchat.be" target="_blank" class="m-0" title="RijpeMilfChat.be - Chat met Ervaren Milfs in België">Rijpe Milf Chat</a> - 
      <a href="https://rijpemilfmarkt.be" target="_blank" class="m-0" title="RijpeMilfMarkt.be - Markt voor Contact met Milfs in België">Rijpe Milf Markt</a> - 
      <a href="https://milfmarkt.be" target="_blank" class="m-0" title="MilfMarkt.be - Contactmarkt voor Geile Milfs in België">Milf Markt</a> - 
      <a href="https://hetebuurvrouwen.be" target="_blank" class="m-0" title="HeteBuurVrouwen.be - Chat met Hete Buurvrouwen in België">Hete Buurvrouwen</a> - 
      <a href="https://slettenchat.be" target="_blank" class="m-0" title="SlettenChat.be - Chatten met Geile Sletten in België">Sletten Chat</a> - 
      <a href="https://kinkycontacten.be" target="_blank" class="m-0" title="KinkyContacten.be - Ontdek Kinky Contacten in België">Kinky Contacten</a>
      <hr>
      <h6>United Kingdom</h6>
      <a href="https://mymilfmatch.com" target="_blank" class="m-0" title="MyMilfMatch.com - Discover Your Ideal Connection with MILF!">MyMilfMatch</a> - 
      <a href="https://mymatureflirt.com" target="_blank" class="m-0" title="MyMatureFlirt.com - Connect with Mature Singles Flirt Today!">MyMatureFlirt</a> - 
      <a href="https://secretsexchat.com" target="_blank" class="m-0" title="SecretsexChat.com - Private Chats in a Discreet Setting!">SecretsexChat</a> - 
      <a href="https://milfsexchat.co.uk" target="_blank" class="m-0" title="MilfSexChat.co.uk - Engage in Milf Chats in the UK!">MilfSexChat</a> - 
      <a href="https://maturesexchat.co.uk" target="_blank" class="m-0" title="MatureSexChat.co.uk - Explore Mature Chat in the UK!">MatureSexChat</a> - 
      <a href="https://maturetemptations.co.uk" target="_blank" class="m-0" title="MatureTemptations.co.uk - Tempting Encounters in the UK!">MatureTemptations</a> - 
      <a href="https://milftemptations.co.uk" target="_blank" class="m-0" title="MilfTemptations.co.uk - Satisfying Temptations in the UK!">MilfTemptations</a> - 
      <a href="https://secrethookups.co.uk" target="_blank" class="m-0" title="SecretHookupsUK.co.uk - Find Discreet Connections in the UK">SecretHookupsUK</a> - 
      <a href="https://discreethookups.co.uk" target="_blank" class="m-0" title="DiscreetHookupsUK.co.uk - Private Connections in the UK">DiscreetHookupsUK</a> - 
      <a href="https://myhookups.co.uk" target="_blank" class="m-0" title="MyHookupsUK.co.uk - Connecting for Hookups in the UK!">MyHookupsUK</a> - 
      <a href="https://discreetsexfinder.co.uk" target="_blank" class="m-0" title="DiscreetSexFinder.co.uk - Find Private Encounters in the UK">DiscreetSexFinder</a> - 
      <a href="https://secretsexfinder.co.uk" target="_blank" class="m-0" title="SecretSexFinder.co.uk - Find Discreet Connections in the UK">SecretSexFinder</a>
      <hr>
      <h6>Deutschland</h6>
      <a href="https://ficklokal.com" target="_blank" class="m-0" title="Ficklokal.com - Finde einen guten Fick in deiner Gegend">Ficklokal</a> - 
      <a href="https://hitzigemilfs.com" target="_blank" class="m-0" title="HitzigeMilfs.com - Finde heiße MILFs in Deiner Nähe heute!">HitzigeMilfs</a> - 
      <a href="https://lustigemilfs.com" target="_blank" class="m-0" title="LustigeMilfs.com - Spaß mit MILFs in Deiner Nähe heute!">LustigeMilfs</a> - 
      <a href="https://reifefrauenchat.com" target="_blank" class="m-0" title="ReifeFrauenChat.com - Chat mit reifen Frauen in Deiner Nähe!">ReifeFrauenChat</a> - 
      <a href="https://reifefrauenfinder.com" target="_blank" class="m-0" title="ReifeFrauenFinder.com - Finde reife Frauen in Deiner Nähe!">ReifeFrauenFinder</a> - 
      <a href="https://reifemilfkontakte.com" target="_blank" class="m-0" title="ReifeMilfKontakte.com - Reife MILFs in Deiner Nähe finden!">ReifeMilfKontakte</a> - 
      <a href="https://reifemilfchat.com" target="_blank" class="m-0" title="ReifeMilfChat.com - Chatte mit reifen MILFs in Deiner Nähe!">ReifeMilfChat</a> - 
      <a href="https://sexchatfinden.com" target="_blank" class="m-0" title="SexChatFinden.com - Finde Sex-Chats in Deiner Nähe heute!">SexChatFinden</a> - 
      <a href="https://ficksingles.com" target="_blank" class="m-0" title="FickSingles.com - Heiße Singles für Spaß in Deiner Nähe!">FickSingles</a> - 
      <a href="https://lustfinden.com" target="_blank" class="m-0" title="LustFinden.com - Finde Lust & Spaß in Deiner Nähe heute!">LustFinden</a> - 
      <a href="https://geheimesexchat.com" target="_blank" class="m-0" title="GeheimerSexChat.com - Diskreter Sex-Chat in Deiner Nähe!">GeheimerSexChat</a> - 
      <a href="https://geheimelustchat.com" target="_blank" class="m-0" title="GeheimeLustChat.com - Diskreter Lust-Chat in Deiner Nähe!">GeheimeLustChat</a>
    </div>
</div><!-- container -->
<?php include $base . '/includes/footer.php'; ?>
