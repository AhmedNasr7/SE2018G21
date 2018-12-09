<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Helth-Tech</a>
  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav-bar" aria-controls="main-nav-bar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="main-nav-bar">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="./">Home</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <?php
          if(isset($_SESSION['loggedinUser'])):
        ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php if( $_SESSION['loggedinUser']->acc_type==1){ echo DIRS::URL['doctor-profile'].'&drid='.$_SESSION['loggedinUser']->id; } ?>">Profile</a>
          </li>
        <?php
          else:
        ?> 

          <li class="nav-item active">
            <span><a class="nav-link d-inline" href="#">login</a> or <a class="nav-link d-inline" href="#">Signup</a></span>
          </li>

        <?php
          endif;
        ?>
      </ul>
    </div>
  </div>
</nav>