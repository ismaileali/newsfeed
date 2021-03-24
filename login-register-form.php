<?php global $addlinks; ?>
<!DOCTYPE html>
<html>
<head>
<title><?php wp_title('|',true,'right'); ?> <?php bloginfo('name'); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
   <?php wp_body_open();?>
<?php 
/*
  Template Name: login
*/
?>
<div class="sign-reg-Page">
  <div class="container">
    <div class="row">
      <div class="signPg-bd">
        <div class="sign-form bg-light text-center">
          <h3 class="login-title text-color">sign in to from</h3>
          <div class="socail-links py-3">
            <a href="#"><span class="facebook"><i class="fab fa-facebook-f"></i></span></a>
            <a href="#"><span class="google"><i class="fab fa-google-plus-g"></i></span></a>
          </div>
          <h5 class="text-muted nuted">or use your email account</h5>
            <form action="#" method="post" class="sign-in-form">
              <div class="input-group mb-2">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control" placeholder="Username">
              </div>
              <div class="input-group">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                  <input type="password" class="form-control" name="" id="" placeholder="Password">
              </div>
              <div id="remember-check">
                  <input type="checkbox" id="valid" name="rem">  Remember Me 
              </div>
              <div id="submit-btn text-center">
                     <a href="#" class="btn btn-primary sing">SIGN IN</a>
               </div>
               <div id="fog-pass" class="form-footer">
                   <a href="#" class="create-account">Need an Account</a>
                   <a href="#" class="fog-pass text-right">Forgot your Password?</a>
               </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
</body>
</html>

