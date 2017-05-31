<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Koperasi</title>

    <link href="<?php echo base_url()?>aset/css/bootstrap.min.css ?>" rel="stylesheet">
    <link href="<?php echo base_url()?>aset/font-awesome/css/font-awesome.css ?>" rel="stylesheet">

    <link href="<?php echo base_url()?>aset/css/animate.css" rel="stylesheet ?>">
    <link href="<?php echo base_url()?>aset/css/style.css" rel="stylesheet ?>">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            
            <br>
            <br>
            <br>
            <h2>Welcome To<br>Sistem Infomasi Koperasi</h2>
            <br>
            <br>
            <form class="m-t" role="form" action="<?php echo base_url('index.php/C_login/aksi_login'); ?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <link href="<?php echo base_url()?>aset/js/jquery-2.1.1.js ?>" rel="stylesheet">
    <link href="<?php echo base_url()?>aset/js/bootstrap.min.js ?>" rel="stylesheet">

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Dec 2015 00:53:03 GMT -->
</html>
