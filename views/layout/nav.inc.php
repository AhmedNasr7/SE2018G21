<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="./">Helth-Tech</a>
  
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
          <li class="nav-item">
            <a class="nav-link" href="<?php if( $_SESSION['loggedinUser']->acc_type==1){
               echo DIRS::URL['doctor-profile'].'&drid='.$_SESSION['loggedinUser']->id; 
               } elseif( $_SESSION['loggedinUser']->acc_type==0){
                  echo DIRS::URL['patient-profile'].'&patid='.$_SESSION['loggedinUser']->id;
                   }?>">Profile</a>
          </li>
          <li class="nav-item">
            <form action="./signup-login.php" method="POST" class="d-inline">
                <input type="hidden" name="type" value="logout">
                <input type="submit" class="btn btn-block btn-outline-dark border-0" value="Logout">
            </form>
          </li>
        <?php
          else:
        ?> 

          <li class="nav-item active">
            <a class="nav-link" href="#">Signup</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Login</a>
          </li>

        <?php
          endif;
        ?>
      </ul>
    </div>
  </div>
</nav>