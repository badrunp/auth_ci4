<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Users</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('/'); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col">
                    <div class="pd-20 card-box">
                        <div class="clearfix mb-20">
                            <div class="pull-left">
                                <h4 class="text-blue h4">User Table</h4>
                            </div>
                            <div class="pull-right">
                                <a href="/admin/user/create" class="btn btn-primary btn-sm scroll-click">Add User</a>
                            </div>
                        </div>

                        <?php if (session()->getFlashdata('message')) : ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('message'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $user['name']; ?></td>
                                        <td><?= $user['email']; ?></td>
                                        <td>
                                            <form onsubmit="confirm('Are your sure?') ? true : event.preventDefault()" action="<?= base_url('/admin/user/delete/' . $user['id']); ?>" method="POST">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="role" value="<?= $user['role']; ?>" readonly>
                                                <input type="hidden" name="image" value="<?= $user['image']; ?>" readonly>
                                                <button type="submit" class="badge badge-danger" style="border: none;">Delete</button>
                                            </form>         
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>