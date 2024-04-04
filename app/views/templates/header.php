<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= BASEURL; ?>/css/bootstrap.css" rel="stylesheet">
    <title><?= $data['judul']; ?></title>
</head>
<body class="d-flex flex-column h-100">
    <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="</?= BASEURL; ?>">PPLBO_SI-Perpus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="</?= BASEURL; ?>">Home</a>
            <a class="nav-link" href="</?= BASEURL; ?>/mahasiswa">Mahasiswa</a>
            <a class="nav-link" href="</?= BASEURL; ?>/about">About</a>
        </div>
        </div>
    </div>
    </nav> -->

    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="<?= BASEURL; ?>" class="d-inline-flex link-body-emphasis text-decoration-none">
            <span class="fs-4">Sistem Informasi Perpustakaan</span>
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="<?= BASEURL; ?>" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2">History</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <a href="<?= BASEURL; ?>/login" class="link-offset-2 link-underline link-underline-opacity-0">
            <button type="button" class="btn btn-outline-primary me-2">Login</button>
            </a>
            <a href="<?= BASEURL; ?>/register" class="link-offset-2 link-underline link-underline-opacity-0">
            <button type="button" class="btn btn-primary">Sign-up</button>
            </a>
        </div>
        </header>
    </div>