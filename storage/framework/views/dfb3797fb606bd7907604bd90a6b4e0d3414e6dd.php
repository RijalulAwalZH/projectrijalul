<?php $__env->startSection('content'); ?>
<center><h1>Data tunjangan pegawai</h1></center>
<hr>
<div class="col-md-11"></div>
<table class="table table-striped table bordered table-hover">
<table class="table table-default">
<tr class="danger">

<a href="<?php echo e(url('/tunjangan_pegawai/create')); ?>"class="btn btn-primary form-control">Tambah Data</a><br><br>s

	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>Nip</center></th>
		<th><center>Nama pegawai</center></th>
		<th colspan="2">Jabatan dan Golongan</th>
		<th><center>Status</center></th>
		<th><center>Jumalah anak</center></th>
		<th><center>Besaran uang</center></th>
		<th colspan="2">Action</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		 ?>
		<?php $__currentLoopData = $tunjangan_pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tunjangan_pegawais): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($no++); ?></td>
			<td><?php echo e($tunjangan_pegawais->tunjanganModel->kode_tunjangan); ?></td>
			<td><?php echo e($tunjangan_pegawais->pegawaiModel->nip); ?></td>
			<td><?php echo e($tunjangan_pegawais->pegawaiModel->User->name); ?></td>
			<td><?php echo e($tunjangan_pegawais->pegawaiModel->jabatanModel->nama_jabatan); ?></td>
			<td><?php echo e($tunjangan_pegawais->pegawaiModel->golonganModel->nama_golongan); ?></td>
			<td><?php echo e($tunjangan_pegawais->tunjanganModel->jumlah_anak); ?></td>
			<td><?php echo e($tunjangan_pegawais->tunjanganModel->besaran_uang); ?></td>
		<td><a href="<?php echo e(route('tunjangan_pegawai.edit',$tunjangan_pegawais->id)); ?>" class="btn btn-warning">Update</a></td>	
		</td>
		<td>
		<?php echo Form::open(['method'=>'DELETE','route'=>['tunjangan_pegawai.destroy',$tunjangan_pegawais->id]]); ?>

		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		<?php echo Form::close(); ?>

		</td>
		</tr>
		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

	</tbody>
</table>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>