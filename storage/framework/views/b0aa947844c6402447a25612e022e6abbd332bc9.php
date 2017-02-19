<?php $__env->startSection('content'); ?>
            <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <center>
                <h3>MY APPLICATION</h3>
                    <h5>HALAMAN WEB</h5>
                    <div class="collapse navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-center">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a class="" href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                </div>

                <div class="panel-body" align="center">
                    <a class="btn btn-primary form-control" href="<?php echo e(url('jabatan')); ?>">Jabatan</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('golongan')); ?>">Golongan</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('pegawai')); ?>">Pegawai</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('kategori_lembur')); ?>">Kategori Lembur</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('lemburpegawai')); ?>">Lembur Pegawai</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('tunjangan')); ?>">Tunjangan</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('tunjanganpegawai')); ?>">Tunjangan Karyawan</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('penggajian')); ?>">Penggajian Karyawan</a><hr>  

                </div>
            </div>
        </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Register</h3> </div>
                    <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/pegawai')); ?>">
                        <?php echo e(csrf_field()); ?>


                            <div class="col-md-6">
                                <label for="name" >Nama Pegawai</label>
                                <input id="name" type="text" class="form-control" name="name" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label for="email" >E-MAIL</label>
                                <input id="email" type="email" class="form-control" name="email" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                            </div>

                             <div class="col-md-12">
                                <label >Type User</label>
                                   <select name="permision" class="col-md-12 form-control">
                                       <option>Admin</option>
                                       <option>HRD</option>
                                       <option>Bagian Administrasi</option>
                                       <option>Pegawai</option>
                                   </select>
                            </div>

                            <div class="col-md-6">
                                <label >Password</label>
                                    <input id="password" type="password" class="form-control" name="password" autofocus>

                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                            </div>

                            <div class="col-md-6">
                                <label >Confirm Password</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autofocus>
                            </div>
                        </div>
                    </div>
                <div>
            </div>
        </div>


        
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Tambah Data Pegawai</h3> </div>
                        <div class="panel-body">

                            <div class="col-md-12">
                                <label for="nip" >NIP Pegawai</label>
                                <input id="nip" type="text" class="form-control" name="nip" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nip')); ?></strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label for="Jabatan">Jabatan</label>
                                    <select class="col-md-6 form-control" name="jabatan_id">
                                        <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datajabatan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($datajabatan->id); ?>" ><?php echo e($datajabatan->nama_jabatan); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <span><?php echo e($errors->first('jabatan_id')); ?></span>
                            </div>

                            <div class="col-md-6">
                                <label for="Jabatan">Golongan</label>
                                    <select class="col-md-6 form-control" name="golongan_id">
                                        <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datagolongan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($datagolongan->id); ?>" ><?php echo e($datagolongan->nama_golongan); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <span class="help-block">
                                        <?php echo e($errors->first('golongan_id')); ?>

                                    </span>
                            </div>

                            <div class="col-md-12">
                                <label >Foto Pegawai</label>
                                    <input type="file" class="form-control" name="foto" autofocus>

                                    <?php if($errors->has('foto')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('foto')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                            </div>

                            <div class="col-md-12" >
                                <button type="submit" class="btn btn-primary form-control">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>