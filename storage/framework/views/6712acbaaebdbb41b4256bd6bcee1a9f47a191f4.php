<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">buat lembur pegawai </div>
                <div class="panel-body">


                     <?php echo Form::open(['url' => 'lembur_pegawai']); ?>

                    <div class="form-group">
                        <?php echo Form::label('kode lembur ', 'kode lembur'); ?>

                        <?php echo Form::text('kode_lembur_id',null,['class'=>'form-control','required']); ?>


                        <div class="col-md-6">
                        <?php echo Form::label('Nip Dan Nama Pegawai ', 'Nip Dan Nama Pegawai '); ?>

                                    <select class="col-md-12 form-control" name="pegawai_id">
                                        <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawais): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($pegawais->id); ?>" >
                                            <?php echo e($pegawais->nip); ?> <?php echo e($pegawais->User->name); ?>

                                                </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                
                    <div class="form-group">
                        <?php echo Form::label('jumlah jam', 'jumlah jam'); ?>

                        <?php echo Form::text('jumlah_jam',null,['class'=>'form-control','required']); ?>

                    </div>
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