<section id="HOME-PAGE" class="vw-100 vh-100">
<div class="row vh-100">
    <section id="SEARCH-AREA" class="col-12 col-lg-8 text-center position-relative px-5">
        <div class="position-absolute v-center">
            <div class="logo my-5 text-white">
                <h1 class="display-1">HEALTH-TECH</h1>
            </div>
            <div class="search px-5 my-5">

            <div class="btn-group">
                <a class="btn btn-outline-light" href="<?= DIRS::URL['clinic-list'] ?>">Discover All Clinics</a>
            </div>

            </div>
        </div>
    </section>


    <section id="Login-AREA" class="col-12 col-lg-4 position-relative px-5">
        <div class="position-absolute v-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">

                    <?php
                        if(isset($_SESSION['loggedinUser'])):
                    ?>

                        <h5> Hi <?= $_SESSION['loggedinUser']->username ?> </h5>
                        <form action="./signup-login.php" method="POST">
                            <input type="hidden" name="type" value="logout">
                            <input type="submit" class="btn btn-block btn-danger" value="Logout">
                        </form>
                    <?php
                        else:
                    ?> 
                    <h5 class="text-center">
                        <a class="card-title" id="signup-form-toggler" data-toggle="collapse" href="#signup-form" role="button" aria-expanded="false" aria-controls="signup-form">Signup</a>
                        <small>or</small>
                        <a class="card-title" id="login-form-toggler" data-toggle="collapse" href="#login-form" role="button" aria-expanded="false" aria-controls="login-form">Login</a>
                    </h5>
                    
                    <?php
                        if(isset($_SESSION['Error-login'])):
                    ?>

                            <p class="alert alert-danger">wrong username or password</p>

                    <?php
                        unset($_SESSION['Error-login']);
                        elseif(isset($_SESSION['Error-signup-username'])):
                    ?>
                            <p class="alert alert-danger">wrong username</p>

                    <?php
                        unset($_SESSION['Error-signup-username']);
                        elseif(isset($_SESSION['Error-signup-password'])):
                    ?>
                            <p class="alert alert-danger">wrong password</p>
                    <?php
                        unset($_SESSION['Error-signup-password']);
                        endif;
                    ?>

                    <div id="signup-form" class="collapse show">
                        <form action="./signup-login.php" method="POST">
                            <input type="hidden" name="type" value='signup'>
                            <div class="form-group">
                                <label for="sign-up-username">Username</label>
                                <input name="username" type="text" class="form-control shadow-sm bg-white border-0" id="sign-up-username" aria-describedby="emailHelp" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="sign-up-email">Email</label>
                                <input name="usermail" type="email" class="form-control shadow-sm bg-white border-0" id="sign-up-email" aria-describedby="emailHelp" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="sign-up-password">Password</label>
                                <input name="password" type="password" class="form-control shadow-sm bg-white border-0" id="sign-up-password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="sign-up-repassword">Confirm Password</label>
                                <input name="repassword" type="password" class="form-control shadow-sm bg-white border-0" id="sign-up-repassword" placeholder="Re Password">
                            </div>

                            <div class="form-check">
                                <input class = "form-check-input" style ="margin: 0 10px 0 10px;" type="radio" name="acc_type" id = "drRadio" value="1">
                                <label class = "form-check-label" for="drRadio">
                                    Doctor
                                 </label>
                            </div>

                            <div class="form-check">
                                <input class = "form-check-input" style ="margin: 0 10px 0 10px;" type="radio" name="acc_type" id = "patRadio" value="0">
                                <label class = "form-check-label" for="patRadio">
                                    Patient
                                 </label>
                            </div>


                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>

                    <div id="login-form" class="collapse">
                        <form action="./signup-login.php" method="POST">
                            <input type="hidden" name="type" value='login'>
                            <div class="form-group">
                                <label for="sign-up-username">Username</label>
                                <input name="username" type="text" class="form-control shadow-sm bg-white border-0" id="sign-up-username" aria-describedby="emailHelp" placeholder="Enter username">
                             
 
                            </div>
                            <div class="form-group">
                                <label for="sign-up-password">Password</label>
                                <input name="password" type="password" class="form-control shadow-sm bg-white border-0" id="sign-up-password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </form>
                    </div>
                    
                    <?php
                        endif;
                    ?>


                </div>
            </div>
        </div>
    </section>
</div>
</section>



