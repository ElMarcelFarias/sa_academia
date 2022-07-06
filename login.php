
<!DOCTYPE html>
<html lang="pt-br">

    

<head>
    <meta charset="utf-8" />
    <title>Login | FocusBody</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Version" content="v2.2" />
    <link rel="shortcut icon" href="images/favicon.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../../unicons.iconscout.com/release/v2.1.7/css/unicons.css">
    <link href="css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="css/colors/default.css" rel="stylesheet" id="color-opt">
</head>

    <body>
        
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        
        <div class="back-to-home rounded d-none d-sm-block">
            <a href="index.html" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
        </div>

        
        <section class="cover-user bg-white">
            <div class="container-fluid px-0">
                <div class="row no-gutters position-relative">
                    <div class="col-lg-4 cover-my-30 order-2">
                        <div class="cover-user-img d-flex align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card login-page border-0" style="z-index: 1">
                                        <div class="card-body p-0">
                                            <h4 class="card-title text-center">Login</h4>  
                                            <form action="php/autenticacao.php" class="login-form mt-4" method="POST">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group position-relative">
                                                            <label>Nome de Usuário <span class="text-danger">*</span></label>
                                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                                            <input class="form-control pl-5" placeholder="Nome de Usuário" name="nomeUsuario" required="">
                                                        </div>
                                                    </div>
        
                                                    <div class="col-lg-12">
                                                        <div class="form-group position-relative">
                                                            <label>Senha <span class="text-danger">*</span></label>
                                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                                            <input type="password" name="senha" class="form-control pl-5" placeholder="Password" required="">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 mb-0">
                                                        <button class="btn btn-primary btn-block">Sign in</button>
                                                    </div>

                                                    <div class="col-lg-12 mt-4 text-center">
                                                        <h6>Contate-nos</h6>
                                                        <ul class="list-unstyled social-icon mb-0 mt-3">
                                                            <li class="list-inline-item"><a href="https://www.facebook.com/Focus-Body-100111169200014" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                                            <li class="list-inline-item"><a href="https://github.com/ElMarcelFarias/sa_academia" class="rounded"><i data-feather="github" class="fea icon-sm fea-social"></i></a></li>
                                                            <li class="list-inline-item"><a href="https://www.instagram.com/focusbodyy/" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>    

                    <div class="col-lg-8 offset-lg-4 padding-less img order-1" style="background-image:url('images/fundo-login-oficial.jpg')" data-jarallax='{"speed": 0.5}'></div>
                </div>
            </div>
        </section>
        

  
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <script src="js/feather.min.js"></script>
        <script src="../../../unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js"></script>
        <script src="js/switcher.js"></script>
        <script src="js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.all.min.js"></script>
        <script src="../js/jquery.mask.js"></script>
        <script src="../js/jquery.mask.min.js"></script>
        
    </body>

    

    <?php if(isset($_GET['return'])) { ?>

        <script>
            Swal.fire(
                    'Erro',
                    'Usuário ou/e senha incorreto! Por favor, tente novamente.',
                    'error'
                    )
        </script>
    <?php } ?>


    

</html>