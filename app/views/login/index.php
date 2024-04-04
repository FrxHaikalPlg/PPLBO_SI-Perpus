<main>
    <div class="container mt-2 text-center p-5 bg-body-tertiary" style="width: 50%;" >
        <div class="row">
            <div class="col">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <form class="w-auto mx-auto" action="<?= BASEURL; ?>/Login/login" method="post">
            <h1 class="h3 mb-5 fw-normal "><strong>Login</strong></h1>

            <div class="form-floating mt-2">
            <input type="email" class="form-control" id="email" name='email' placeholder="name@example.com">
            <label for="email">Email address</label>
            </div>

            <div class="form-floating mt-2">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <label for="password">Password</label>
            </div>

            <button class="btn btn-primary w-50 py-2 mt-5" type="submit">Sign In</button>
        </form>
    </div>
</main>