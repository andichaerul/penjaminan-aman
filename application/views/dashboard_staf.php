<div class="row">
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-primary">
				<i class="far fa-user"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>T.pengajuan</h4>
				</div>
				<div class="card-body">
					<?php echo $amount["total"] ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-danger">
				<i class="far fa-newspaper"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>T.Reject</h4>
				</div>
				<div class="card-body">
					<?php echo $amount["ditolak"] ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-warning">
				<i class="far fa-file"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>T.Menunggu Persetujuan</h4>
				</div>
				<div class="card-body">
					<?php echo $amount["menunggu"] ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-success">
				<i class="fas fa-circle"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>T.Disetujui</h4>
				</div>
				<div class="card-body">
					<?php echo $amount["disetujui"] ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-12 col-sm-12">
		<div class="card">
			<div class="card-header">
				<h4>List Pengajuan</h4>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Tgl</th>
							<th>Deskripsi</th>
							<th>Status</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($list->result() as $row) : ?>
							<tr>
								<td><?php echo $i++ ?></td>
								<td><?php echo $row->tgl ?></td>
								<td><?php echo $row->req_deskripsi ?></td>
								<td><?php echo $row->strStatus ?></td>
								<td><?php echo  number_format($row->budget_nominal) ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
