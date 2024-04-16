<main>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 bg-body-tertiary py-5 px-3">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <?php Flasher::flash(); ?>
                        <form action="<?= BASEURL; ?>/Login/login" method="post">
                            <h1 class="h3 mb-5 fw-normal text-center"><strong>Login</strong></h1>

                            <div class="form-floating mt-2">
                                <input type="email" class="form-control" id="email" name='email' placeholder="name@example.com" required>
                                <label for="email">Alamat Email</label>
                            </div>

                            <div class="form-floating mt-2">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <label for="password">Kata Sandi</label>
                            </div>

                            <button class="btn btn-primary w-100 py-2 mt-5" type="submit">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>