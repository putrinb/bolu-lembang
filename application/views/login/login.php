<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?=$title?></title>
        <link href="<?=base_url();?>assets/icon/logo.jpg" rel="icon">
        <link href="<?=base_url()?>/assets/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">

                                    <?php
                                        if($this->session->flashdata('sukses')) {
                                        $message = $this->session->flashdata('sukses');
                                    ?>
                                        <div class="alert alert-success" ><?php echo $message; ?>
                                        </div>
                                        <?php } ?>
                                        
                                    <?php
                                        if($this->session->flashdata('error')) {
                                        $message = $this->session->flashdata('error');
                                    ?>
                                        <div class="alert alert-danger" ><?php echo $message; ?>
                                        </div>
                                        <?php } ?>
                                        <form method="post" action="<?=site_url('auth')?>">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="text" name="username" placeholder="Enter Username"/>
                                                <small class="text-danger"><?=form_error('username')?></small>
                                            </div>

                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" /><small class="text-danger"><?=form_error('password')?></small>
                                            </div>
                                            <div class="form-group">
                                                <!--<div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
                                            </div>-->
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-4"><!--<a class="small" href="">Forgot Password?</a>--><button class="btn btn-primary btn-block">Login</button></div>
                                        </form>
                                    </div>
                                    <!--<div class="card-footer text-center">
                                        <div class="small"><a href="<?=site_url('auth/register')?>">Need an account? Sign up!</a></div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Putri Nabila 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?=base_url()?>assets/js/scripts.js"></script>
    </body>
</html>
