<?php $__env->startSection('content'); ?>
<center><h1>Pegawai</h1></center>
<hr>
<table class="table table-striped table bordered table-hover">
<table class="table table-default">
<tr class="danger">
<center><a href="<?php echo e(url('/pegawai/create')); ?>"class="btn btn-success">Tambah Data</a></center>

	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>Nama</center></th>
		<th><center>Email</center></th>
		<th><center>Permision</center></th>
		<th>Nip</th>
		<th>Jabatan</th>
		<th>Golongan</th>
		<th>Foto</th>
		<th colspan="3">Action</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		 ?>
		<?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawais): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($no++); ?></td>
			<td><?php echo e($pegawais->User->name); ?></td>
			<td><?php echo e($pegawais->User->email); ?></td>
			<td><?php echo e($pegawais->User->permision); ?></td>
			<td><?php echo e($pegawais->nip); ?></td>
			<td><?php echo e($pegawais->golonganModel->kode_golongan); ?></td>
			<td><?php echo e($pegawais->jabatanModel->kode_jabatan); ?></td>



	<td><img src="assets/image/<?php echo e($pegawais->foto); ?>" height="80" width="80"></td>
		<td><a href="<?php echo e(route('pegawai.create',$pegawais->id)); ?>"class="btn btn-warning">edit</a></td>	
		</td>
		<td>
		<?php echo Form::open(['method'=>'DELETE','route'=>['pegawai.destroy',$pegawais->id]]); ?>

		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		<?php echo Form::close(); ?>

		</td>
		</tr>
		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

	</tbody>
</table>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>