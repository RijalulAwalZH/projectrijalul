<?php $__env->startSection('content'); ?>
<center><h1>Data golongan</h1></center>
<hr>
<table class="table table-striped table bordered table-hover">
<table class="table table-default">
<tr class="danger">

<a href="<?php echo e(url('/golongan/create')); ?>"class="btn btn-success">Tambah Data</a>

	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>kode golongan</center></th>
		<th><center>nama golongan</center></th>
		<th><center>besaran uang</center></th>
		
		<th colspan="3">Action</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		 ?>
		<?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $golongans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($no++); ?></td>
			<td><?php echo e($golongans->kode_golongan); ?></td>
			<td><?php echo e($golongans->nama_golongan); ?></td>
			<td><?php echo e($golongans->besaran_uang); ?></td>
			
		<td><a href="<?php echo e(route('golongan.edit',$golongans->id)); ?>" class="btn btn-warning">Update</a></td>	
		</td>
		<td>
		<?php echo Form::open(['method'=>'DELETE','route'=>['golongan.destroy',$golongans->id]]); ?>

		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		<?php echo Form::close(); ?>

		</td>
		</tr>
		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

	</tbody>
</table>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>