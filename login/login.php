<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>SIAKAD SMP SATAP Tolulos | Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./../assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="./../assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./../assets/css/pages/auth-light.css" rel="stylesheet" />
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
			<img src="./../assets/img/logosekolah.png" />
			<br>
            <a class="link" href="#">SIAKAD SMP SATAP Tolulos</a>
        </div>
        <form id="login-form"  method="post">
            <h2 class="login-title">Halaman Login</h2>  
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="text" name="username" id="username" placeholder="Username" autocomplete="off" required> 
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                </div>
            </div>
           
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Login</button>
            </div>          
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="./../assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./../assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./../assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./../assets/js/app.js" type="text/javascript"></script>
    <script src="./../assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
    $(document).ready(function() {       
        $('#login-form').on('submit', function() {
            var username = $('#username').val(); 
            var password = $('#password').val();    
            $.ajax({
                url: "cek_user.php",
                type: "POST",
                beforeSend: function() {
                    Swal.fire({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                },
                data: {
                    username: username
                },
                dataType: 'json',
                success: function(json) {
                    if (json.status == 0) {
                        $.ajax({
                            type: "post",
                            url: "cek_login.php",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Menunggu',
                                    html: 'Memproses data',
                                    onOpen: () => {
                                        swal.showLoading()
                                    }
                                })
                            },
                            data: {
                                username: username,
                                password: password
                            }, 
                            dataType: 'json',
                            success: function(json) {
                                if (json.status == 0) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Login Berhasil!',
                                        text: 'Anda akan di arahkan dalam 3 Detik',
                                        timer: 3000,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    })
                                    .then (function() {
                                        window.location.href = "../index.php";
                                    });
                                }
                                if (json.status == 1) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Password Salah',
                                        text: 'Maaf Password yang anda masukkan salah',
                                        showConfirmButton: true,
                                        timer: 1500
                                    })
                                }
                            }
                        })
                        return false;                  
                    }
                    if (json.status == 1) {
                         Swal.fire({
                            icon: 'error',
                            title: 'Username Salah',
                            text: 'Maaf Username Salah Salah/Tidak Terdaftar'
                        });
                    }
                }
            });
            return false;
        });

    });
</script>
</body>

</html>