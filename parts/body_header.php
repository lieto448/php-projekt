
<?php 
  include_once "functions/menu.php";
  $menu = getMenu("header");
?>

<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Host <em>Cloud</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <?php 

              foreach ($menu as $key => $menuItem){
                echo '<li class="nav-item">
                <a class="nav-link" href="'.$menuItem['path'].'">'.$menuItem['name'].'
                  <span class="sr-only">(current)</span>
                </a>
              </li>';
              }
              //printMenu($menu);
              ?>
            </ul>
          </div>
          <div class="functional-buttons">
            <ul>
              <li><a href="login.php">Log in</a></li>
              <li><a href="signup.php">Sign Up</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>