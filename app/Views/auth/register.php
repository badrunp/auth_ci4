<?= $this->extend('layouts/guest'); ?>

<?= $this->section('content'); ?>

<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="login.html">
                <img src="<?= base_url(); ?>/images/deskapp-logo.svg" alt="">
            </a>
        </div>
        <div class="login-menu">
            <ul>
                <li><a href="<?= base_url('/login'); ?>">Login</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="<?= base_url(); ?>/images/register-page-img.png" alt="">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Register To DeskApp</h2>
                    </div>

                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('/register'); ?>" method="POST">
                        <?= csrf_field(); ?>
                        <div class="select-role">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn <?= old('role') == 1 ? 'active' : ''; ?> <?= $validation->getError('role') ? 'error' : ''; ?>">
                                    <input type="radio" name="role" value="1" id="admin" <?= old('role') == 1 ? 'checked' : ''; ?>>
                                    <div class="icon"><img src="<?= base_url(); ?>/images/briefcase.svg" class="svg" alt=""></div>
                                    <span>I'm</span>
                                    Admin
                                </label>
                                <label class="btn <?= old('role') == 2 ? 'active' : ''; ?> <?= $validation->getError('role') ? 'error' : ''; ?>">
                                    <input type="radio" name="role" value="2" id="user" <?= old('role') == 2 ? 'checked' : ''; ?>>
                                    <div class="icon"><img src="<?= base_url(); ?>/images/person.svg" class="svg" alt=""></div>
                                    <span>I'm</span>
                                    User
                                </label>
                            </div>
                            <?php if ($validation->getError('role')) : ?>
                                <div class="text-danger" style="margin-left: -5px;">
                                    <small><?= $validation->getError('role'); ?></small>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="input-group custom">
                            <input type="text" name="name" value="<?= old('name'); ?>" class="form-control form-control-lg <?= $validation->getError('name') ? 'is-invalid' : ''; ?>" placeholder="Name">
                            <div class="invalid-feedback">
                                <?= $validation->getError('name'); ?>
                            </div>
                            <?php if (!$validation->getError('name')) : ?>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="input-group custom">
                            <input type="email" name="email" value="<?= old('email'); ?>" class="form-control form-control-lg <?= $validation->getError('email') ? 'is-invalid' : ''; ?>" placeholder="Email">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                            <?php if (!$validation->getError('email')) : ?>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-email"></i></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="input-group custom">
                            <input type="password" name="password" value="<?= old('password'); ?>" class="form-control form-control-lg <?= $validation->getError('password') ? 'is-invalid' : ''; ?>" placeholder="**********">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                            <?php if (!$validation->getError('password')) : ?>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
                                </div>
                                <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
                                <div class="input-group mb-0">
                                    <a class="btn btn-outline-primary btn-lg btn-block" href="<?= base_url('/login'); ?>">Login To Alrealdy Account</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>