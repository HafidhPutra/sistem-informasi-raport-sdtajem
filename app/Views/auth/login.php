<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-6"><br><br>

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-8">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="h4 text-gray-900 mb-4 text-center">
                                    <h2 class="h2 text-gray-900 mb-4"><?= lang('Auth.loginTitle') ?></h2>
                                    <h1 class=" h4 text-gray-900 mb-4">Sistem Informasi Raport</h1>
                                    <h1 class="h4 text-gray-900 mb-4">SD Negeri Tajem</h1>
                                </div>

                                <?= view('Myth\Auth\Views\_message_block') ?>


                                <form action="<?= route_to('login') ?>" method="post" class="user">
                                    <?= csrf_field() ?>

                                    <?php if ($config->validFields === ['email']) : ?>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" aria-describedby="emailHelp">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="password" placeholder="<?= lang('Auth.password') ?>">
<!--                                         <span class="show-hide">
                                            <i class="fa fa-eye"></i>
                                        </span> -->
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>

                                    <?php if ($config->allowRemembering) : ?>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="form-check-input" onclick="showpassword()">
                                                <label class="form-check-label" for="check">
                                                    Show Password
                                                </label>
<!--                                                 <input type="checkbox" class="custom-control-input" name="remembering" id="costumCheck" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                <label class="custom-control-label" for="customCheck">
                                                    Remember Me
                                                </label> -->
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        <?= lang('Auth.loginAction') ?>
                                    </button>
                                </form>
                                <!-- <?php if ($config->activeResetter) : ?>
                                    <div class="text-center">
                                        <a class="small" href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                                    </div>
                                <?php endif; ?> -->

                                <!-- <?php if ($config->allowRegistration) : ?>
                                    <div class="text-center">
                                        <a class="small" href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a>
                                    </div>
                                <?php endif; ?>
 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
    function showpassword(){
        var myinput = document.getElementById('password')
        if (myinput.type==="password"){
            myinput.type="text";
        }else{
            myinput.type="password";
        }
    }
</script>

<!-- <script type="text/javascript">
    cons password = document.querySelector("input");
    cons btn_show = document.querySelector("i");
    btn_show.addEventListener("click", function(){
        if(password.type === "password") {
            password.type = "text";
            btn_show.classList.add("hide");
        } else {
            password.type = "password";
            btn_show.classList.remove("hide");
        }
    })
</script> -->

<?= $this->endSection(); ?>