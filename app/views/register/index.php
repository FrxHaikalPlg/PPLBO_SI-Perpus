<main>
    <div class="container mt-2 text-center p-5 bg-body-tertiary" style="width: 50%;" >
        <div class="row">
            <div class="col">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <form class="w-auto mx-auto" action="<?= BASEURL; ?>/register/register" method="post">
            <h1 class="h3 mb-5 fw-normal "><strong>Registrasi</strong></h1>

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

            <button class="btn btn-primary w-50 py-2 mt-5" type="submit">Sign Up</button>
        </form>
    </div>
</main>