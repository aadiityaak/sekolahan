<?php add_thickbox(); ?>
<div class="wrap">
	<h2 class="mb-3">Data Siswa</h2>
	<div class="sweet-wrap">
		<div class="mb-2">
			<a class="add-btn btn btn-success btn-sm text-white" data-toggle="modal" data-target="#modal-siswa">Tambah Siswa</a>
		</div>
		<div class="sweet-content">
		<table id="tablesiswa" class="table table-striped" style="width:100%">

			<thead>
				<tr>
					<th>ID</th>
					<th>Nama</th>
					<th>Telfon</th>
					<th>Kelas</th>
					<th>Email</th>
					<th>Alamat</th>
					<th>Jenis Kelamin</th>
					<th>Tempat Lahir</th>
					<th>Tanggal Lahir</th>
					<th>Nama Ayah</th>
					<th>Nama Ibu</th>
					<th>Nama Wali</th>
					<th>Saudara (Sekolah Disini)</th>
					<th>Pendapatan Ortu</th>
					<th>SPP</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Nama</th>
					<th>Telfon</th>
					<th>Kelas</th>
					<th>Email</th>
					<th>Alamat</th>
					<th>Jenis Kelamin</th>
					<th>Tempat Lahir</th>
					<th>Tanggal Lahir</th>
					<th>Nama Ayah</th>
					<th>Nama Ibu</th>
					<th>Nama Wali</th>
					<th>Saudara (Sekolah Disini)</th>
					<th>Pendapatan Ortu</th>
					<th>SPP</th>
					<th></th>
					<th></th>
				</tr>
			</tfoot>
		</table>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-siswa" tabindex="-1" role="dialog" aria-labelledby="modal-siswaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-siswaLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="max-height:70vh;overflow-y:auto;">
        <form class="form-siswa">

		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save-btn">Save changes</button>
      </div>
    </div>
  </div>
</div>