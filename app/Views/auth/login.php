<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->

                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <marquee behavior="" direction="left" style="padding: 100px; font-size: 25pt;">
                                "Makin aku banyak membaca, makin aku banyak berpikir makin aku banyak belajar, makin aku sadar bahwa aku tak mengetahui apa pun." - Voltaire ||

                                "Kamu calon konglomerat ya? kamu harus rajin belajar dan membaca, tapi jangan ditelan sendiri. Berbagilah dengan teman-teman yang tak dapat pendidikan." - Wiji Thukul ||

                                "Ilmu itu ada di mana-mana, pengetahuan di mana-mana tersebar, kalau kita bersedia membaca, dan bersedia mendengar." - Felix Siauw ||

                                "Kalau engkau hanya membaca buku yang dibaca semua orang, engkau hanya bisa berpikir sama seperti semua orang." - Haruki Murakami ||

                                "Ada dua motif untuk membaca buku. Pertama, kau menikmatinya dan yang lain, kau bisa menyombongkannya." - Bertrand Russell ||

                                "Saya membaca buku dan berbicara dengan orang lain. Maksud saya, itulah cara seseorang belajar sesuatu. Ada banyak buku bagus di luar sana dan ada banyak orang pintar." - Elon Musk ||

                            </marquee>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.loginTitle') ?></h1>
                                </div>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form class="user" action="<?= route_to('login') ?>" method="post">
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
                                            <input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control  form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>

                                    <?php if ($config->allowRemembering) : ?>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                <?= lang('Auth.rememberMe') ?>
                                            </label>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block"><?= lang('Auth.loginAction') ?></button>
                                </form>
                                <hr>

                                <div class="text-center">
                                    <?php if ($config->allowRegistration) : ?>
                                        <p><a class="small" href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
                                    <?php endif; ?>
                                    <?php if ($config->activeResetter) : ?>
                                        <a class="small" href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="<?php //echo base_url('img/a.png'); ?>" alt="" srcset="">
                        </div>
                        <div class="col-lg-6">
                        </div>
                    </div> -->
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>