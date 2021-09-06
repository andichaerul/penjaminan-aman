<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Nama Lengkap</label>
					<input type="text" class="form-control" id="nama_lengkap" value="<?php echo $this->session->userdata("nama_lengkap") ?>">
				</div>
				<div class="form-group">
					<label for="">Level User</label>
					<input type="text" class="form-control" readonly value="<?php echo $this->session->userdata("level") ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" class="form-control" id="username" value="<?php echo $this->session->userdata("username") ?>">
				</div>
				<div class=" form-group">
					<label for="">New Password</label>
					<input type="password" class="form-control" id="password">
				</div>
				<div class=" form-group">
					<label for="">Confirm Password</label>
					<input type="password" class="form-control" id="c_password">
				</div>
				<button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$("#simpan").click(function(e) {
			e.preventDefault();
			$.ajax({
				type: "post",
				url: "<?php echo base_url("user_profile/simpan") ?>",
				data: {
					"nama_lengkap": $("#nama_lengkap").val(),
					"username": $("#username").val(),
					"password": $("#password").val(),
					"c_password": $("#c_password").val()
				},
				dataType: "json",
				success: function(response) {
					if (response["status"] == "success") {
						alert("Berhasil mengupdate data");
						location.replace("<?php echo base_url("login") ?>");
					} else {
						alert(response["pesan"]);
						return false;
					}
				},
				beforeSend: function() {},
			});
		});
	});
</script>
