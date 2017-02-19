<?php $__env->startSection('content'); ?>
<center><h1>Data golongan</h1></center>
<hr>
<table class="table table-striped table bordered table-hover">
<table class="table table-default">
<tr class="danger">

<a href="<?php echo e(url('/lembur_pegawai/create')); ?>"class="btn btn-success">Tambah Data</a>

	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>kode lembur </center></th>
		<th><center>pegawai id </center></th>
		<th><center>jumlah jam</center></th>
		
		<th colspan="3">Action</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		 ?>
		<?php $__currentLoopData = $lembur_pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lembur_pegawais): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($no++); ?></td>
			<td><?php echo e($lembur_pegawais->kode_lembur_id); ?></td>
			<td><?php echo e($lembur_pegawais->pegawaiModel->pegawai_id); ?></td>
			<td><?php echo e($lembur_pegawais->jumlah_jam); ?></td>
			
		<td><a href="<?php echo e(route('lembur_pegawai.edit',$lembur_pegawais->id)); ?>" class="btn btn-warning">Update</a></td>	
		</td>
		<td>
		<?php echo Form::open(['method'=>'DELETE','route'=>['lembur_pegawai.destroy',$lembur_pegawais->id]]); ?>

		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		<?php echo Form::close(); ?>

		</td>
		</tr>
		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

	</tbody>
</table>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>