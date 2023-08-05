<?php 
    include 'process_login.php';
    // session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../asset/css/css-login.css" rel="stylesheet">


</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-12 col-md-10">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-5">
            <div class="row">
              <div class="col-lg-12">
                <div class="grid">
                <h1 style="color: #4e73df; margin-bottom: 0px;">Welcome back</h1>
                <h6 style="margin-top: 0px; color: #7491E6;;">Welcome back! Please enter you details.</h6>
                <form action="login.php" method="POST" class="form login" style="margin-top: 30px;">
                  <div class="form__field">
                    <label for="login__username" style="margin-bottom: -0.5px;"><svg class="icon">
                        <use xlink:href="#icon-user"></use>
                      </svg><span class="hidden">Username</span></label>
                    <input autocomplete="username" id="login__username" type="text" name="username" class="form__input" placeholder="Enter your username" required>
                  </div>
                  <div class="form__field">
                    <label for="login__password" style="margin-bottom: -0.5px;"><svg class="icon">
                        <use xlink:href="#icon-lock"></use>
                      </svg><span class="hidden">Password</span></label>
                    <input id="login__password" type="password" name="password" class="form__input" placeholder="Enter your password" required>
                  </div>
                  <div class="form__field">
                    <input type="submit" value="Sign In" name="login">
                  </div>
                </form>
    <!-- <p class="text--center">Not a member? <a href="#">Sign up now</a> <svg class="icon">
        <use xlink:href="#icon-arrow-right"></use>
      </svg></p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'import_js.php' ?>
</body>
</html>