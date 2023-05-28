<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
      define('CSS_PATHLLOGIN', 'css/');
	  define('JS_PATHLLOGIN', 'js/');
	  define('IMG_PATHLLOGIN', 'img/');
    ?>
    <link rel="stylesheet" href="<?php echo CSS_PATHLLOGIN;?>loginusuario.css" />

</head>
<body>

    <h1 class="bienvenida">WELCOME TO SELFL!</h1>
    <br></br>
    <br></br>
    
<div class="container" id="container">
	<div class="form-container sign-in-container">


		<form action="../app/controllers/login/ingreso.php" method="post">

			<h1>SIGN IN</h1><br>
            <?php
    session_start();
    if(isset($_SESSION['mensaje'])){
        $respuesta = $_SESSION['mensaje']; ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '<?php echo $respuesta;?>',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
    }
    ?>
			<span>System of English Language Teaching at the Faculty of Languages</span>
			<br>
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password_user" placeholder="Password" />
			<br>
			<button>Continue</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Don't you have an account yet?</h1>
				<p>Remember to request your access credentials, otherwise you won't be able to access the system.</p>
			</div>
		</div>
	</div>
</div>
</div>

<script src="<?php echo JS_PATHLLOGIN;?>loginusuario.js" ></script>
<!-- jQuery -->
<script src="../public/templeates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/templeates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->

</body>
</html>


