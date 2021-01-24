<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet"  href="../css/app.css">
        <script type="text/javascript" src="js/app.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <title>IT 110</title>
    </head>
    
    <body>
        <div class="container">    
            <div id="signupbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">Sign Up</div>
                                <div class="signinlink"><a id="signinlink" href="../index.php" >Sign In</a></div>
                            </div>  
                            <div class="panel-body" >
                                <?php 
                                    if(@$_GET['Error']==true)
                                    {
                                ?>
                                    <div id="login-alert" class="alert alert-danger col-sm-12">
                                        <?php echo $_GET['Error'] ?></div>
                                                          
                                <?php
                                    }
                                ?>

                                <?php 
                                    if(@$_GET['Success']==true)
                                    {
                                ?>
                                    <div id="login-alert" class="alert alert-success col-sm-12"><?php echo $_GET['Success'] ?></div>
                                                                
                                <?php
                                    }
                                ?>
                                
                                <form id="signupform" class="form-horizontal" role="form" action="../php/register.php" method="POST">
                                    
                                    <div class="form-group" id="emails">
                                        <label for="email" class="col-md-3 control-label">Email</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="email" placeholder="Email Address" id="emailForm">
                                        </div>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label for="firstname" class="col-md-3 control-label">First Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control " name="firstname" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-md-3 control-label">Password</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm password" class="col-md-3 control-label">CFM Password</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="icode" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <!-- Button -->                                        
                                        <div class="col-md-offset-3 col-md-9">
                                        
                                            <button class="btn btn-primary mt-3" name="register" >Register </button>
                                            <span>or</span>  
                                            <a href="../index.php">
                                            <button type="button" class="btn btn-primary mt-3" name="SignIn">Sign In</button>
                                        </a>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group" id="footerline">
                                                                                                             
                                    </div>  
                                    <?php 
                                        if(@$_GET['Error']==true)
                                        {
                                    ?>
                                        <!-- <script>$('#emails').addClass('has-error')</script> -->
                                                          
                                    <?php
                                        }
                                    ?>                     
                                </form>
                            </div>
                        </div>            
            </div> 
        </div>
       
    </body>
    <script>
$(document).ready(function() {
    $('#signupform').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    emailAddress: {
                        message: 'The value is not a valid email address'
                    }
                }
            }
        }
    });
});
</script>
    
</html>