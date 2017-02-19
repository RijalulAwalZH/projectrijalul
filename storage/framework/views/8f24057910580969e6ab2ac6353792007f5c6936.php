<?php $__env->startSection('content'); ?>

<center><h1>Data kategori lembur</h1></center>
<hr>
<div class="col-md-11 "> 
<table class="table table-striped table-bordered table-hover">
<!-- <table class="table table-default"> -->
<tr class="danger">

<a href="<?php echo e(url('/kategori_lembur/create')); ?>"class="btn btn-primary form-control">Tambah Data</a>
<br><br>
	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>kode lembur</center></th>
		<th><center>jabatan </center></th>
		<th><center>golongan </center></th>
		<th><center>besaran_uang </center></th>
		<th colspan="3">Action</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		 ?>
		<?php $__currentLoopData = $kategori_lembur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori_lemburs): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($no++); ?></td>
			<td><?php echo e($kategori_lemburs->kode_lembur); ?></td>
			<td><?php echo e($kategori_lemburs->jabatanModel->nama_jabatan); ?></td>
			<td><?php echo e($kategori_lemburs->golonganModel->nama_golongan); ?></td>
			<td><?php echo e($kategori_lemburs->besaran_uang); ?></td>
			
		<td><a href="<?php echo e(route('kategori_lembur.edit',$kategori_lemburs->id)); ?>" class="btn btn-warning">Update</a></td>	
		</td>
		<td>
		<?php echo Form::open(['method'=>'DELETE','route'=>['kategori_lembur.destroy',$kategori_lemburs->id]]); ?>

		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		<?php echo Form::close(); ?>

		</td>
		</tr>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

	</tbody>
</table>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>