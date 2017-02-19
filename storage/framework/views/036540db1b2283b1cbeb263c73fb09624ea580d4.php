<?php $__env->startSection('content'); ?>
<center><h1>Pegawai</h1></center>
<hr>
<table class="table table-striped table bordered table-hover">
<table class="table table-default">
<tr class="danger">
<a href="<?php echo e(url('/tunjangan/create')); ?>"class="btn btn-success">Tambah Data</a>

	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>jabatan </center></th>
		<th><center>golongan </center></th>
		<th><center>status</center></th>
		<th>jumlah anak</th>
		<th>besaran uang</th>
		<th colspan="3">Action</th>
	</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		 ?>
		<?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tunjangans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($no++); ?></td>
			<td><?php echo e($tunjangans->jabatanModel->jabatan_id); ?></td>
			<td><?php echo e($tunjangans->golonganModel->golongan_id); ?></td>
			<td><?php echo e($tunjangans->status); ?></td>
			<td><?php echo e($tunjangans->jumlah_anak); ?></td>
			<td><?php echo e($tunjangans->besaran_uang); ?></td>


		<td><a href="<?php echo e(route('tunjangan.edit',$tunjangans->id)); ?>"class="btn btn-warning">edit</a></td>	
		</td>
		<td>
		<?php echo Form::open(['method'=>'DELETE','route'=>['tunjangan.destroy',$tunjangans->id]]); ?>

		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		<?php echo Form::close(); ?>

		</td>
		</tr>
		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

	</tbody>
</table>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>