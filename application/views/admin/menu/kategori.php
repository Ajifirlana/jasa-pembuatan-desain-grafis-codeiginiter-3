		<div class="row small-spacing">
			<div class="col-lg-4 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Form Penambahan Kategori Barang</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form method="post" action="<?php echo base_url() ?>admin/simpanKategori">
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Kategori</label>
								<input type="text" class="form-control" placeholder="Masukkan Nama Pemilik Rekening" name="nama" required="">
							</div>
							<input type="submit" id="submit_form" style="display: none" name="tambah_kategori">
							<center><button type="submit" class="btn btn-primary btn-sm waves-effect waves-light" >Tambah Kategori</button></center>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->

			<div class="col-lg-8 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">List Kategori</h4>
					<div class="card-content">
						<div class="form-group">
							<table id="tabel-data" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Kategori</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($kategori as $key => $value) : $no = $key + 1; ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $value->nama ?></td>
											<td align="center">
												<a href="<?= base_url() ?>admin/kategori/<?= $value->no ?>"><button type="button" class="btn btn-xs btn-social waves-effect waves-light btn-facebook" title="Edit Kategori"><i class="ico fa fa-file-text-o"></i></button></a>
												<a href="<?= base_url() ?>admin/hapusKategori/<?= $value->no ?>"><button type="button" class="btn btn-xs btn-social waves-effect waves-light btn-danger" title="Hapus Kategori"><i class="ico fa fa-trash"></i></button></a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>


		</div>
		<script src="<?php echo base_url('assets/jquery.min.js') ?>"></script>