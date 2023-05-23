<!DOCTYPE html>
<html lang="en">

    <?php include_once "parts/header.php"; ?>

    <body>
           

    <?php include_once "parts/preloader.php"; ?> 

    <?php include_once "parts/body_header.php"; ?>

    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            
          </div>
        </div>
      </div>
    </div>

    <div class="contact-us">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="contact-form">
              <form id="login" action="functions/login_action.php" method="post">
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text"   placeholder="Username/Email" required="">
                    </fieldset>
                  </div>
                  
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="pwd" type="password" placeholder="Password" required="">
                    </fieldset>
                  </div>
                  
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit"  class="main-button">Log In</button>
                    </fieldset>
                  </div>
                </div>
              </form>
          </div>
          </div>
        </div>
      </div>
    </div>

    <?php include_once "parts/footer.php"; ?>

    <?php include_once "parts/scripts.php"; ?>

    </body>
</html>