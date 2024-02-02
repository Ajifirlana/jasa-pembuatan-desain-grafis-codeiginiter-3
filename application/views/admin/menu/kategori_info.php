		<div class="row small-spacing">
			<div class="col-lg-4 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Form Edit Kategori</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form method="post" action="<?php echo base_url('admin/updateKategori') ?>">
							<div class="form-group">
								<input type="hidden" name="no" value="<?= $kategori_info->no ?>">
								<label for="exampleInputEmail1">Nama Kategori</label>
								<input type="text" class="form-control" placeholder="Masukkan Kategori" id="nama" name="nama" value="<?= $kategori_info->nama ?>">
							</div>
						
							<center id="edit_button_true"><button type="submit" class="btn btn-success btn-sm waves-effect waves-light">Edit Kategori</button> &nbsp &nbsp<a role="button" href="<?php echo base_url('admin/kategori') ?>" type="button" class="btn btn-danger btn-sm waves-effect waves-light">Cancel Edit</a></center>
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
										<th>Jenis</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($kategori as $key => $kat) : $no = $key + 1; ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $kat->nama ?></td>
											<td align="center">
												<a href="<?= base_url() ?>admin/kategori/<?= $kat->no ?>"><button type="button" class="btn btn-xs btn-social waves-effect waves-light btn-facebook" title="Edit kategori"><i class="ico fa fa-file-text-o"></i></button></a>
												<a href="<?= base_url() ?>admin/hapusKategori/<?= $kat->no ?>"><button type="button" class="btn btn-xs btn-social waves-effect waves-light btn-danger" title="Hapus Kategori"><i class="ico fa fa-trash"></i></button></a>
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