<main>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 bg-body-tertiary p-5">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <?php Flasher::flash(); ?>
                        <form action="<?= BASEURL; ?>/register/register" method="post">
                            <h1 class="h3 mb-5 fw-normal text-center"><strong>Registrasi</strong></h1>

                            <div class="form-floating mt-2">
                                <input type="email" class="form-control" id="email" name='email' placeholder="name@example.com" required>
                                <label for="email">Email address</label>
                            </div>

                            <div class="form-floating mt-2">
                                <input type="number" class="form-control" id="nim" name="nim" placeholder="NIM" required>
                                <label for="nim">NIM</label>
                            </div>

                            <div class="form-floating mt-2">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>

                            <div class="form-floating mt-2">
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password" required>
                                <label for="password2">Confirm Password</label>
                            </div>

                            <button class="btn btn-primary w-100 py-2 mt-5" type="submit">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>