<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Create</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('/'); ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('/role'); ?>">Menu</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col">
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix pb-4">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Add menu form</h4>
                            </div>
                            <div class="pull-right">
                                <a href="/menu" class="btn btn-warning btn-sm scroll-click">Back</a>
                            </div>
                        </div>
                        <form action="<?= base_url('/menu/store'); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Title</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control <?= $validate->getError('title') ? 'is-invalid' : ''; ?>" type="text" name="title" placeholder="Title" value="<?= old('title'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validate->getError('title'); ?>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?= $this->endSection(); ?>