<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/login.css'); ?>" rel="stylesheet">

    <meta name="theme-color" content="#7952b3">
    
  </head>
  <body class="text-center">
    <main class="form-signin">
        <form action="<?php echo base_url(); ?>" method="post">
            <h1 class="h3 mb-3 fw-normal">Admin Login</h1>
            <div style="color:red;"><?php echo validation_errors(); ?></div>
            <div class="form-floating">
              <input type="text" class="form-control" id="uemail" name="uemail" required>
              <label for="uemail">Username or email address</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" id="password" name="password" required>
              <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        </form>
    </main>
  </body>
</html>
