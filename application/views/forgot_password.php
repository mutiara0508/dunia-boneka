<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Forgot Password</title>
    <link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: #67b0f0;">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-lg-5 mt-5">
                    <?php if($this->session->flashdata('message')): ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('message'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Forgot Password</h3></div>
                        <div class="card-body">
                            <p class="mb-3 text-center">Enter your email address and we'll send you a link to reset your password.</p>
                            <?= form_open('dashboard/forgot_password_action') ?>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="email" type="email" placeholder="name@example.com" required />
                                    <label for="email">Email address</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="<?= site_url('dashboard/login') ?>">Back to login</a>
                                    <button type="submit" class="btn btn-primary">Reset Password</button>
                                </div>
                            <?= form_close() ?>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="<?= site_url('dashboard/register') ?>">Need an account? Sign up!</a></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/scripts.js') ?>"></script>
</body>
</html>
