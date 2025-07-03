<?php
$base = __DIR__;
define("TITLE", "Home");
include $base . '/includes/header.php';
?>

<div class="container">
    <!-- Jumbotron Header -->
    <div class="jumbotron my-4 text-center">
        <h1>18Date.net - Vind hier jouw gratis sexdate!</h1>
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
        <h2>Nieuwste leden België op zoek naar een sexdate!</h2>
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
        <h2>Nieuwste leden United Kingdom op zoek naar een sexdate!</h2>
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
        <h2>Nieuwste leden Duitsland op zoek naar een sexdate!</h2>
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
        <h2>Nieuwste leden Oostenrijk op zoek naar een sexdate!</h2>
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
        <h2>Nieuwste leden Zwitserland op zoek naar een sexdate!</h2>
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
      <a href="https://flirthonk.nl" target="_blank" class="m-0" title="FlirtHonk.nl - Vind Flirts & Contacten in Nederland!">Flirthonk</a> - 
      <a href="https://localflirt.nl" target="_blank" class="m-0" title="LocalFlirt.nl - Voor Jouw Perfecte Flirts in Nederland!">LocalFlirt</a> -
      <a href="https://65pluscontact.nl" target="_blank" class="m-0" title="65PlusContact.nl - 65+ Vriendschappen Vinden in Nederland!">65Plus Contact</a> - 
      <a href="https://lagelandenchat.nl" target="_blank" class="m-0" title="LageLandenChat.nl - Chat met landgenoten in Nederland!">Lage Landen Chat</a> - 
      <a href="https://oranjechat.nl" target="_blank" class="m-0" title="OranjeChat.nl - Vind Spannende Gesprekken in Nederlander">Oranje Chat</a> - 
      <a href="https://anoniemecontacten.nl" target="_blank" class="m-0" title="AnoniemeContacten.nl - Discreet Verbinden in Nederland">Anonieme Contacten</a> - 
      <a href="https://casualflirten.nl" target="_blank" class="m-0" title="CasualFlirten.nl - Ontspannen Flirten in heel Nederland">Casual Flirten</a> - 
      <a href="https://geheimegesprekken.nl" target="_blank" class="m-0" title="GeheimeGesprekken.nl - Vertrouwelijke Chats in Nederland">Geheime Gesprekken</a>
      <hr>
      <h6>België</h6>
      <a href="https://flirthonk.be" target="_blank" class="m-0" title="FlirtHonk.be - Ontdek Flirts & Contacten in België!">Flirthonk</a> - 
      <a href="https://localflirt.be" target="_blank" class="m-0" title="LocalFlirt.be - Jouw Perfecte Flirt Dichtbij Huis in België!">LocalFlirt</a> -
      <a href="https://65pluscontact.be" target="_blank" class="m-0" title="65PlusContact.be - 65+ Vriendschappen Vinden in België!">65Plus Contact</a> - 
      <a href="https://belgenchat.be" target="_blank" class="m-0" title="BelgenChat.be - Chatten met Landgenoten in België!">Belgen Chat</a> - 
      <a href="https://bechat.be" target="_blank" class="m-0" title="BeChat.be - Verbind met Belgen in Spannende Gesprekken">BEChat</a> - 
      <a href="https://anoniemecontacten.be" target="_blank" class="m-0" title="AnoniemeContacten.be - Discreet Verbinden met Belgen">Anonieme Contacten</a> - 
      <a href="https://casualflirten.be" target="_blank" class="m-0" title="CasualFlirten.be - Ontspannen flirten in heel België">Casual Flirten</a> - 
      <a href="https://geheimegesprekken.be" target="_blank" class="m-0" title="GeheimeGesprekken.be - Vertrouwelijke Chats in België">Geheime Gesprekken</a>
      <hr>
      <h6>United Kingdom</h6>
      <a href="https://mylocalflirt.com" target="_blank" class="m-0" title="MyLocalFlirt.com - Find Your Flirt in Your Area Today!">MyLocalFlirt</a> - 
      <a href="https://myflings.co.uk" target="_blank" class="m-0" title="MyFlings.co.uk - Discover Exciting Connections in the UK!">MyFlings</a> -
      <a href="https://myaffairs.co.uk" target="_blank" class="m-0" title="MyAffairs.co.uk - Explore Discreet Affairs in the UK!">MyAffairs</a> - 
      <a href="https://ukflirt.co.uk" target="_blank" class="m-0" title="UKFlirt.co.uk - Find Flirts and Connections in the UK!">UKFlirt</a> - 
      <a href="https://uktease.co.uk" target="_blank" class="m-0" title="UKTease.co.uk - Tease and Connect in the United Kingdom!">UKTease</a> - 
      <a href="https://ukdesire.co.uk" target="_blank" class="m-0" title="UKDesire.co.uk - Explore Your Desires in the United Kingdom!!">UKDesire</a> - 
      <a href="https://discreetfling.co.uk" target="_blank" class="m-0" title="DiscreetFling.co.uk - Explore Private Flings in the UK!">DiscreetFling</a>
      <hr>
      <h6>Deutschland</h6>
      <a href="https://flirtsuche.com" target="_blank" class="m-0" title="FlirtSuche.com - Finde Deinen perfekten Flirt heute online!">FlirtSuche</a> - 
      <a href="https://lokaltreffen.com" target="_blank" class="m-0" title="LokalTreffen - Finde Gleichgesinnte in Deiner Nähe heute!">LokalTreffen</a> -
      <a href="https://meinlokalflirt.com" target="_blank" class="m-0" title="MeinLokalFlirt - Finde heute Deinen Flirt in Deiner Stadt!">MeinLokalFlirt</a> - 
      <a href="https://meinlokalesingles.com" target="_blank" class="m-0" title="MeinLokaleSingles.com - Singles in Deiner Stadt heute!">MeinLokaleSingles</a> - 
      <a href="https://meinsingleschat.com" target="_blank" class="m-0" title="MeinSingleChat.com - Chat mit Singles in Deiner Nähe!">MeinSingleChat</a> - 
      <a href="https://hitzigesingles.com" target="_blank" class="m-0" title="HitzigeSingles.com - Heiße Singles in Deiner Nähe heute!">HitzigeSingles</a> - 
      <a href="https://lustigesingles.com" target="_blank" class="m-0" title="LustigeSingles.com - Spaß & Liebe in Deiner Nähe heute!">LustigeSingles</a>
  </div>
</div><!-- container -->
<?php include $base . '/includes/footer.php'; ?>
