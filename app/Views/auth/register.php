<?= $this->extend('layouts/layout'); ?>

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
                    <form>
                        <!-- <div class="select-role">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn active">
                                    <input type="radio" name="options" id="admin">
                                    <div class="icon"><img src="<?= base_url(); ?>/images/briefcase.svg" class="svg" alt=""></div>
                                    <span>I'm</span>
                                    Manager
                                </label>
                                <label class="btn">
                                    <input type="radio" name="options" id="user">
                                    <div class="icon"><img src="<?= base_url(); ?>/images/person.svg" class="svg" alt=""></div>
                                    <span>I'm</span>
                                    Employee
                                </label>
                            </div>
                        </div> -->
                        <div class="input-group custom">
                            <input type="text" name="username" class="form-control form-control-lg" placeholder="Username">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-email"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="**********">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
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