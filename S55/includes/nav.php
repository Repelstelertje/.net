<ul class="navbar-nav ml-auto">
  <li class="nav-item">
    <a class="nav-link" href="sexdate-nederland">Nederland</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="sexdate-belgie">België</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="sexdate-verenigd-koninkrijk">Verenigd Koninkrijk</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="sexdate-duitsland">Duitsland</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="sexdate-oostenrijk">Oostenrijk</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="sexdate-zwitserland">Zwitserland</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle drpdwn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Datingtips</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <?php
      foreach ($navItemsTips as $item) {
        echo "<a class=\"dropdown-item\" href=\"$item[slug]\">$item[title]</a>";
      }
      ?>
    </div>
  </li>
</ul>
