<div class="overlay">
    <div class="loader"></div>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- SweetAlert -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/custom/sweetalert/sweetalert2.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
    .overlay {
	width: 100%;
	height: 100%;
	background-color: rgb(0, 0, 0, .5);
	position: fixed;
    top: 0;
    z-index: 999;
	left: 0;
    }

    .loader {
        position: absolute;
        top: calc(50% - 55px);
        left: calc(50% - 55px);
        transform: translate(-50%, -50%);
        border: 5px solid transparent;
        border-top: 5px solid rgb(241, 196, 14);
        border-bottom: 5px solid rgb(142, 82, 169);
        width: 150px;
        height: 150px;
        border-radius: 50%;
        animation: animate 2s linear infinite;

    }

    .loader::before {
        content: "";
        position: absolute;
        top: 12px;
        right: 12px;
        bottom: 12px;
        left: 12px;
        border: 5px solid transparent;
        border-top: 5px solid rgb(49, 140, 202);
        border-bottom: 5px solid rgb(224, 130, 44);
        border-radius: 50%;
        animation: animate 3s linear infinite;
    }

    .loader::after {
        content: "";
        position: absolute;
        top: 30px;
        right: 30px;
        bottom: 30px;
        left: 30px;
        border: 5px solid transparent;
        border-top: 5px solid rgb(47, 206, 115);
        border-bottom: 5px solid rgb(201, 67, 52);
        border-radius: 50%;
        animation: animate 4s linear infinite;
    }

    @keyframes animate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
<a href="<?= base_url() ?>">Lapor<b>IN</b></a>
</div>
<!-- /.login-logo -->
<div class="login-box-body">
<p class="login-box-msg">Sign in to start your session</p>

<form action="#" id="form_login" method="post">
    <div class="form-group has-feedback">
        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <?php echo form_error('username') ?>
    <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <?php echo form_error('password') ?>
    <div class="row">
    <div class="col-xs-8">
        <div class="checkbox icheck">
        <label>
            <input type="checkbox"> Remember Me
        </label>
        </div>
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
    </div>
    <!-- /.col -->
    </div>
</form>

<div class="social-auth-links text-center">
    <!-- <p>- OR -</p>
    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
    Facebook</a>
    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
    Google+</a> -->
</div>
<!-- /.social-auth-links -->

<a href="#">I forgot my password</a><br>
<a href="register.html" class="text-center">Register a new membership</a>

</div>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SweetAlert -->
<script src="<?= base_url() ?>assets/custom/sweetalert/sweetalert2.all.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
$(function () {
$('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' /* optional */
});
});

$(document).ready(function() {
    $(".overlay").css("display","none");
});
$("#form_login").on("submit",function(e){
    e.preventDefault();
    // alert("helo");
	$.ajax({
		url:"user/login",
		type:"post",
		data:$(this).serialize(),
		dataType:"JSON",
		success:function(login){
            console.log(login);
			if (login.status == true && login.not_found == true) {
				$('div.form-group').removeClass('has-success').removeClass('has-error')
					.find('.text-danger').remove();
				Swal({
					title: 'Berhasil',
					text: 'Login Berhasil',
					type: 'success'
				}).then((result) => {
					if (result.value) {
						location = login.redirect;
						return;
					}
				})
			}
			else if(login.status == true && login.not_found == false){
				Swal({
					title: 'Gagal !',
					text: 'Login Gagal Check User dan Pass',
					type: 'warning'
				}).then((result)=>{
                    if (result.value) {
                        $("#form_login #username").val('');
                        $("#form_login #password").val('');
                    }
                })
			} 
			else {
				$.each(login.msg, function (key, value) {
					var element = $('#' + key);
					console.log(login.msg);
					element.closest('div.form-group')
						.removeClass('has-error')
						.addClass(value.length > 0 ? 'has-error' : 'has-success')
						.find('.text-danger').remove();
					element.after(value);
					return;
				})
			}
		}
	});
});

</script>
</body>
</html>