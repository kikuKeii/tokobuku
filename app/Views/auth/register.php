<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block">

                    <marquee behavior="" direction="left" style="padding: 100px; font-size: 25pt;">
                        "Makin aku banyak membaca, makin aku banyak berpikir makin aku banyak belajar, makin aku sadar bahwa aku tak mengetahui apa pun." - Voltaire ||

                        "Kamu calon konglomerat ya? kamu harus rajin belajar dan membaca, tapi jangan ditelan sendiri. Berbagilah dengan teman-teman yang tak dapat pendidikan." - Wiji Thukul ||

                        "Ilmu itu ada di mana-mana, pengetahuan di mana-mana tersebar, kalau kita bersedia membaca, dan bersedia mendengar." - Felix Siauw ||

                        "Kalau engkau hanya membaca buku yang dibaca semua orang, engkau hanya bisa berpikir sama seperti semua orang." - Haruki Murakami ||

                        "Ada dua motif untuk membaca buku. Pertama, kau menikmatinya dan yang lain, kau bisa menyombongkannya." - Bertrand Russell ||

                        "Saya membaca buku dan berbicara dengan orang lain. Maksud saya, itulah cara seseorang belajar sesuatu. Ada banyak buku bagus di luar sana dan ada banyak orang pintar." - Elon Musk ||

                    </marquee>
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.register') ?></h1>
                        </div>
                        <?= view('Myth\Auth\Views\_message_block') ?>

                        <form class="user" action="<?= route_to('register') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <input type="txt" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="pass_confirm" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                <?= lang('Auth.register') ?>
                            </button>

                        </form>
                        <hr>

                        <div class="text-center">
                            <a class="small" href="<?= route_to('login') ?>"><?= lang('Auth.alreadyRegistered') ?> <?= lang('Auth.signIn') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>