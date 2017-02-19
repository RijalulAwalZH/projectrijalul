<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">kategori lembur </div>
                <div class="panel-body">

                     <?php echo Form::open(['url' => 'kategori_lembur']); ?>

                    <div class="form-group">
                        <?php echo Form::label('kode lembur', 'kode lembur'); ?>

                        <?php echo Form::text('kode_lembur',null,['class'=>'form-control']); ?>

                          <?php if($errors->has('kode_lembur')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_lembur')); ?></strong>
                                    </span>
                            <?php endif; ?>
                    </div>

                     <div class="col-md-6 col-sm-6 col-xs-12">
                     <?php echo Form::label('jabatan','jabatan'); ?>


                        <select class="form-control" col-md-7 col-sx-12 name="jabatan_id">
                            <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <option value="<?php echo e($jabatans->id); ?>"><?php echo e($jabatans->nama_jabatan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                    </div>
                    

                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <?php echo Form::label('golongan','golongan'); ?>

                        <select class="form-control" col-md-7 col-sx-12 name="golongan_id">
                            <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <option value="<?php echo e($jabatans->id); ?>"><?php echo e($jabatans->nama_golongan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                    </div>                    
                    <div class="form-group">
                        <?php echo Form::label('besaran uang', 'besaran uang'); ?>

                        <?php echo Form::text('besaran_uang',null,['class'=>'form-control']); ?>

                    </div>
                    <?php if($errors->has('besaran_uang')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('besaran_uang')); ?></strong>
                                    </span>
                    <?php endif; ?>
                    <div class="form-group">
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