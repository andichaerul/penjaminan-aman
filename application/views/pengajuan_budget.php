<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<div class="form-group">
					<label for="">Tanggal</label>
					<input type="text" readonly class="form-control" id="tgl" value="<?php echo date("Y-m-d") ?>">
				</div>
				<div class="form-group">
					<label for="">Nama Lengkap</label>
					<input type="text" readonly class="form-control" id="nama_lengkap" value="<?php echo $this->session->userdata("nama_lengkap") ?>">
				</div>
				<div class="form-group">
					<label for="">Budget Nominal</label>
					<input type="text" class="form-control" id="nominal">
				</div>
				<div class="form-group">
					<label for="">Request Description</label>
					<textarea class="form-control" id="deskripsi"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" id="simpan" class="btn btn-primary btn-block">Simpan</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$("#simpan").click(function(e) {
			e.preventDefault();
			if (confirm('Anda yakin?')) {
				null;
			} else {
				return false;
			}
			$.ajax({
				type: "post",
				url: "<?php echo base_url("pengajuan-budget/simpan") ?>",
				data: {
					"nominal": $("#nominal").val(),
					"deskripsi": $("#deskripsi").val(),
				},
				dataType: "json",
				success: function(response) {
					if (response["status"] == "success") {
						alert("Berhasil menyimpan data");
						location.replace("<?php echo base_url("dashboard") ?>")
					}
				},
				beforeSend: function() {

				},
			});
		});
	});
</script>
