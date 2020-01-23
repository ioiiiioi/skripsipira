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
																								<select name="sub" id="sub" class="form-control select2" style="width: 100%;">
																										<option selected="selected">Pilih Sub-Bagian</option>
																										<?php
																												$no=1;
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
																							<select name="anggaran" id="anggaran" class="form-control select2" style="width: 100%;">
																									<option value="">Pilih Anggaran</option>
																							</select>
																						</div>
	
																						<br>
																						<div>
																							<label>Tahun Akademik</label>
																							<select class="form-control select2" name="tahun_akademik">
																									<option>Pilih</option>
																									<?php
																									$no=1;
																									$query="SELECT * FROM tb_ta";
																									$result=$db->query($query);
																									$num_result=$result->num_rows;
																									if ($num_result > 0 ) { 
																											while ($data=mysqli_fetch_assoc($result)) {
																											extract($data);
																							?>
																											<option value="<?php echo $id_ta; ?>">
																													<?php echo $id_ta; ?>
																											</option>
																											<?php }} ?>
																							</select>
																						</div>
																						<!-- <label>Nomer Mahasiswa</label> -->
																						<!-- <label>Tanggal</label>
																				<input type="date" class="form-control"> -->
																					
																						<br>
																						<div>
																							<label>Keterangan</label>
																							<input type="text" name="keterangan" class="form-control">
																						</div>
																							
																						<br>
																						<div>
																							<label>Nominal</label>
																							<input type="text" name="nominal" class="form-control">
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
$(document).ready(function(){
		$('#sub').on('change',function(){
				var subId = $(this).val();
				if(subId){
						$.ajax({
								type:'POST',
								url:'ajax_sub.php',
								data:'sub_id='+subId,
								success:function(html){
										$('#anggaran').html(html); 
								}
						}); 
				}else{
						$('#anggaran').html('<option value="">Pilih Subbgian</option>');
				}
		});
});
</script>
<?php
				}else{
						echo "<script>window.location='../../login.php';</script>";
				}
?>

		