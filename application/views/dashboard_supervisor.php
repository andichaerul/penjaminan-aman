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
							<th>No Pengajuan</th>
							<th>Nama Staf</th>
							<th>Tgl</th>
							<th>Deskripsi</th>
							<th>Status</th>
							<th>Total</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($list->result() as $row) : ?>
							<tr>
								<td><?php echo $i++ ?></td>
								<td><?php echo $noSurat = noSurat($row->user_id, $row->id, $row->tgl) ?></td>
								<td><?php echo $row->nama_lengkap ?></td>
								<td><?php echo $row->tgl ?></td>
								<td><?php echo $row->req_deskripsi ?></td>
								<td><?php echo $row->strStatus ?></td>
								<td><?php echo  number_format($row->budget_nominal) ?></td>
								<td>
									<button class="btn btn-primary" onclick="showFormApproved('<?php echo $noSurat ?>','<?php echo $row->nama_lengkap ?>','<?php echo $row->budget_nominal ?>','<?php echo $row->req_deskripsi ?>','<?php echo $row->id_pengajuan ?>')">Pilih</button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal_confirm">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Pengajuan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" class="form-control" id="id_pengajuan" readonly>
				<div class="form-group">
					<label for="">Nama Lengkap</label>
					<input type="text" class="form-control" id="nama_lengkap" readonly>
				</div>
				<div class="form-group">
					<label for="">Budget</label>
					<input type="text" class="form-control" id="budget" readonly>
				</div>
				<div class="form-group">
					<label for="">Pengajuan</label>
					<select class="form-control" id="pengajuan">
						<option>Pilih Pengajuan</option>
						<option value="2">Disetujui</option>
						<option value="3">Ditolak</option>
					</select>
				</div>
				<div class="form-group" id="html_alasan_tolak">
					<label for="">Alasan Ditolak</label>
					<textarea id="alasan_tolak" class="form-control"></textarea>
				</div>
			</div>
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="simpan">Simpan</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$("#html_alasan_tolak").css("display", "none");
		$("#pengajuan").change(function(e) {
			e.preventDefault();
			let pengajuan = $("#pengajuan").val();
			if (pengajuan == 3) {
				$("#html_alasan_tolak").css("display", "block");
			} else {
				$("#html_alasan_tolak").css("display", "none");
			}
		});

		$("#simpan").click(function(e) {
			e.preventDefault();
			if (confirm('Anda yakin?')) {
				null;
			} else {
				return false;
			}
			$.ajax({
				type: "post",
				url: "<?php echo base_url("pengajuan-budget/konfirmasi") ?>",
				data: {
					id: $("#id_pengajuan").val(),
					alasan_tolak: $("#alasan_tolak").val(),
					alasan_tolak: $("#alasan_tolak").val(),
					pengajuan: $("#pengajuan").val(),
				},
				dataType: "json",
				success: function(response) {
					if (response["status"] == "success") {
						alert("Berhasil menyimpan data");
						location.reload();
					}
				},
				beforeSend: function() {},
			});
		});
	});

	function showFormApproved(noSurat, namaLengkap, budget, deskripsi, id_pengajuan) {
		$("#id_pengajuan").val(id_pengajuan);
		$("#nama_lengkap").val(namaLengkap);
		$("#budget").val(budget);
		$("#deskripsi").val(deskripsi);
		$("#modal_confirm").appendTo("body").modal("show");
	}
</script>
