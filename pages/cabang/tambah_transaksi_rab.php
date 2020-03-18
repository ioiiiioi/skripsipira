<?php 

if (!isset($_SESSION)) {
				session_start();
		}

		require_once '../../command/connection.php';


		if (isset($_SESSION["cabang"])) {
			$hal = @$_GET['hal'];
			$id = $_SESSION['cabang'];
 ?>

<body>
	<div id="right-panel" class="">
		<section class="content-header">
			<div class="container">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-6 p-5">
							<div class="card">
								<div class="card-header">
									<h2>Form Tambah Rab</h2>
								</div>
								<div class="card-body card-block">
									<form action="../../command/curd.php" method="POST" class="">
										<div class="form-group">
											<div>
												<label>Sub-Bagian</label>
												<select name="sub" required onchange="cekSub()" id="subID" class="form-control" style="width: 100%;">
													<option selected="selected" value="" hidden="true">Pilih Sub-Bagian</option>
														<?php
															// $no=1;
															$query="SELECT * FROM tb_subbagian";
															$result=$db->query($query);
															$num_result=$result->num_rows;
															if ($num_result > 0 ) { 
																	while ($data=mysqli_fetch_assoc($result)) {
																	extract($data);
														?>
															<option value="<?php echo $id_subbagian; ?>">
																	<?php echo $nm_subbagian; ?>
															</option>
														<?php }} ?>
												</select>
											</div>

											<br>
											<div>
												<label>Anggaran</label>
												<select name="anggaran" required id="anggaran" class="form-control" style="width: 100%;">
													<option value="" selected="selected" hidden="true">Pilih Anggaran</option>
													
												</select>
											</div>

											<br>
											<div>
												<label>Tahun Akademik</label>
												<select class="form-control" name="tahun_akademik" required>
													<option>Pilih</option>
													<?php
													// $no=1;
													$query="SELECT * FROM tb_ta";
													$result=$db->query($query);
													$num_result=$result->num_rows;
													if ($num_result > 0 ) { 
															while ($data=mysqli_fetch_assoc($result)) {
															extract($data);
													?>
														<option value="<?php echo $id_ta; ?>">
																<?php echo $tahun; ?>
														</option>
													<?php }} ?>
												</select>
											</div>
																		
											<br>
											<div>
												<label>Keterangan</label>
												<input type="text" name="keterangan" required class="form-control">
											</div>
												
											<br>
											<div>
												<label>Nominal</label>
												<input type="text" name="nominal" required class="form-control">
											</div>

											<br>
											<div class="form-actions form-group float-left">
												<input type="text" class="form-control" name="user" value="<?php echo $id; ?>" hidden>
												<button type="submit" class="btn btn-info" name="transaksi_rab">Simpan</button>
												<a href="index.php?hal=transaksi_rab" class="btn btn-danger">Batal</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</body>

<script type="text/javascript">
	function cekSub(){
		var subId = $('#subID').val();
			console.log(subId);
		$.ajax({
			type:'POST',
			url:'ajax_sub.php',
			data:'sub_id='+subId,
			success:function(hasil){
				// console.log(hasil);
				$('#anggaran').html(hasil); 
			}
		});
		
		// if(subId != ""){
		// 	$.ajax({
		// 		htmls = ""
		// 		type:'POST',
		// 		url:'ajax_sub.php',
		// 		data:'sub_id='+subId,
		// 		success:function(hasil){
		// 			console.log(hasil);
		// 			// $('#anggaran').html(hasil); 
		// 		}
		// 	}); 
		// }else{
		// 		$('#anggaran').html('<option value="" selected="selected" hidden="true">Pilih Subbgian terlebih dahulu</option>');
		// }
	}

</script>
<?php
	}else{
		echo "<script>window.location='../../login.php';</script>";
	}
?>

		