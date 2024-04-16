<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= BASEURL; ?>/css/bootstrap.css" rel="stylesheet">
    <title><?= $data['judul']; ?></title>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-info-subtle">
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
                        <a class="nav-link active" href="#">Search</a>
                    </li>
                    <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= BASEURL; ?>/history">History</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <div class="d-flex">
                    <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
                        <a href="<?= BASEURL; ?>/AuthController/logout" class="btn btn-secondary">Logout</a>
                    <?php else: ?>
                        <a href="<?= BASEURL; ?>/login" class="btn btn-outline-primary me-2">Login</a>
                        <a href="<?= BASEURL; ?>/register" class="btn btn-primary">Sign-up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>