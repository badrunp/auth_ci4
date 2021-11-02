<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Profile</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('/'); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="profile-photo">
                            <img src="<?= base_url('uploads/' . auth('image')); ?>" alt="" class="avatar-photo">
                        </div>
                        <h5 class="text-center h5 mb-0"><?= auth('name'); ?></h5>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                            <ul>
                                <li>
                                    <span>Email Address:</span>
                                    <?= auth('email'); ?>
                                </li>
                                <li>
                                    <span>User Role:</span>
                                    <?= auth('role_name'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <div class="tab height-100-p">
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#setting" role="tab">Settings</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Setting Tab start -->

                                    <div class="tab-pane fade show active height-100-p" id="setting" role="tabpanel">
                                        <div class="profile-setting">


                                            <form action="<?= esc(base_url('user/profile/update')); ?>" method="POST" enctype="multipart/form-data">
                                                <ul class="profile-edit-list row">
                                                    <?php if ($validation->getErrors()) : ?>
                                                        <li class="weight-500 col-md-12">
                                                            <div class="alert alert-danger">
                                                                <?= $validation->listErrors(); ?>
                                                            </div>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (session()->getFlashdata('message')) : ?>
                                                        <li class="weight-500 col-md-12">
                                                            <div class="alert alert-success">
                                                                <?= session()->getFlashdata('message'); ?>
                                                            </div>
                                                        </li>
                                                    <?php endif; ?>
                                                    <li class="weight-500 col-md-12">
                                                        <!-- <h4 class="text-blue h5 mb-20">Edit Social Media links</h4> -->
                                                        <div class="form-group">
                                                            <label>Profil</label>
                                                            <input type="file" class="form-control form-control-lg" name="image">
                                                        </div>
                                                    </li>
                                                    <li class="weight-500 col-md-6">
                                                        <!-- <h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4> -->
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input class="form-control form-control-lg" name="name" type="text" value="<?= auth('name'); ?>">
                                                        </div>
                                                    </li>
                                                    <li class="weight-500 col-md-6">
                                                        <!-- <h4 class="text-blue h5 mb-20">Edit Social Media links</h4> -->
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control form-control-lg" name="email" type="email" value="<?= auth('email'); ?>" readonly>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="profile-edit-list row">
                                                    <li class="weight-500 col-md-6">
                                                        <button type="submit" class="btn btn-primary">Update Profil</button>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Setting Tab End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>