<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(isset($data['cssMDB'])) : ?>
        <link href="<?= BASEURL; ?>/css/mdb.min.css" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
    <?php endif; ?>
    <link href="<?= BASEURL; ?>/css/bootstrap.css" rel="stylesheet">
    <title><?= $data['judul']; ?></title>
</head>
<body class="d-flex flex-column min-vh-100">
    <?php if(!isset($data['cssMDB'])) : ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-0">
        <div class="container">
            <a class="navbar-brand" href="<?= BASEURL; ?>"><strong>Sistem Informasi Perpustakaan</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Browse</a>
                    </li>
                    <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= BASEURL; ?>/history">History</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <div class="d-flex">
                    <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
                        <a href="<?= BASEURL; ?>/AuthController/logout" class="btn btn-danger">Logout</a>
                    <?php else: ?>
                        <a href="<?= BASEURL; ?>/login" class="btn btn-outline-primary me-2">Login</a>
                        <a href="<?= BASEURL; ?>/register" class="btn btn-primary">Sign-up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <?php endif; ?>
    <?php if(isset($data['cssMDB'])) : ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-0">
            <div class="container">
            <a class="navbar-brand" href="<?= BASEURL; ?>"><strong>Sistem Informasi Perpustakaan</strong></a>
                <button
                data-mdb-collapse-init
                class="navbar-toggler"
                type="button"
                data-mdb-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Browse</a>
                        </li>
                        <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= BASEURL; ?>/history">History</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <div class="d-flex ms-auto">
                        <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
                            <a href="<?= BASEURL; ?>/AuthController/logout" class="btn btn-danger">Logout</a>
                        <?php else: ?>
                            <a href="<?= BASEURL; ?>/login" class="btn btn-outline-primary me-2">Login</a>
                            <a href="<?= BASEURL; ?>/register" class="btn btn-primary">Sign-up</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    <?php endif; ?>