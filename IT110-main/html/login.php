<?php
date_default_timezone_set('Asia/Manila');
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet"  href="../css/app.css">
        <script type="text/javascript" src="../js/app.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <title>NOTES</title>
    </head>
    <body>

        <div class="container">    
            <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                        <div class="panel-heading">
                            <div class="panel-title">Sign In</div>
                            <div><a href="#">Forgot password?</a></div>
                        </div>     

                        <div class="panel-body" >

                            <?php 
                                if(@$_GET['Empty']==true)
                                {
                            ?>
                                <div id="login-alert" class="alert alert-danger col-sm-12">
                                <?php echo $_GET['Empty'] ?></div>
                                                            
                            <?php
                                }
                            ?>


                            <?php 
                                if(@$_GET['Invalid']==true)
                                {
                            ?>
                                <div id="login-alert" class="alert alert-danger col-sm-12">
                                <?php echo $_GET['Invalid'] ?></div>                                
                            <?php
                                }
                            ?>
                                
                            <form id="loginform" class="form-horizontal" role="form" action="../php/login.php" method="POST">
                                        
                                <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                                </div>
                                    
                                <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                </div>

                                <div class="input-group">
                                        <div class="checkbox">
                                            <label>
                                            <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                            </label>
                                        </div>
                                </div>


                                <div class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
                                        <button class="btn btn-primary mt-3" name="Login">Login</button>
                                        <a href="signup.php">
                                            <button type="button" class="btn btn-primary mt-3" name="SignUp">Sign Up</button>
                                        </a>
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div class="form-footer">
                                            Don't have an account! 
                                        <a href="signup.php">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     
                        </div>                     
                </div>  
            </div>
        </div>
    </body>
</html>