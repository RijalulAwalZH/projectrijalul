<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">tunjangan</div>
                <div class="panel-body">

                     <?php echo Form::open(['url' => 'tunjangan']); ?>

                    <div class="col-md-6">
                        <?php echo Form::label('jabatan', 'jabatan'); ?>

        
                         <select name="jabatan_id" class="form-control">
                                <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($jabatans->id); ?>">
                                        <?php echo e($jabatans->nama_jabatan); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                    </div>
                    <div class="col-md-6">
                        <?php echo Form::label('golongan', 'golongan'); ?>

                        
                        <select name="golongan_id" class="form-control">
                                <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $golongans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($golongans->id); ?>">
                                        <?php echo e($golongans->nama_golongan); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                    </div>

                    <div class="col-md-6">

                                <label>Kode Tunjangan</label>
                                <input type="text" class="form-control" name="kode_tunjangan" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_tunjangan')); ?></strong>
                                    </span>
                            </div>

                    <div class="col-md-6">
                        <label>ststus</label>

                        <select class="col-md-8" form="form-control" name="status">
                        <option name="status">menikah</option>
                        <option name="status">belum menikah</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <?php echo Form::label('jumlah anak', 'jumlah anak'); ?>

                        <?php echo Form::text('jumlah_anak',null,['class'=>'form-control','required']); ?>

                    </div>
                    <div class="col-md-6">
                        <?php echo Form::label('besaran uang', 'besaran uang'); ?>

                        <?php echo Form::text('besaran_uang',null,['class'=>'form-control','required']); ?>

                    </div>
                    <div class="col-md-12">
                        <?php echo Form::submit('SAVE', ['class' => 'btn btn-primary form-control']); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>