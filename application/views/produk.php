<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Fast Print | Produk</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>resources/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url()?>resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>resources/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url()?>resources/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url()?>resources/plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="<?= base_url()?>resources/plugins/sweetalert2/sweetalert2.all.min.js">
<link rel="stylesheet" href="<?= base_url() ?>/resources/izitoast/dist/css/iziToast.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/resources/izitoast/dist/css/iziToast.min.css">
	<script src="<?= base_url() ?>/resources/izitoast/dist/js/iziToast.min.js" type="text/javascript"></script>
  <script src="https://kit.fontawesome.com/c03789affe.js" crossorigin="anonymous"></script>
  <style>
    .end-position{
      float:right;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Admin Fast Print</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Produk
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
				<div class="row">
					<div class="col-6">
			    		<button type="button" class="btn bg-gradient-primary btn-sm" onclick="filter()" <?php if (!isset($_GET['stat'])) {
			echo 'disabled';
		} ?>>Semua Produk</button>
			    		<button type="button" class="btn bg-gradient-success btn-sm" onclick="nofilter()" href="../fastprint?stat=bisa dijual" <?php if (isset($_GET['stat'])) {
			echo 'disabled';
		} ?>>Produk Bisa Dijual</button>
					</div>
          <div class="col-6">
			    		<button type="button" class="btn bg-gradient-primary btn-sm end-position" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus pe-2 text-sm" aria-hidden="true"></i> Produk</button>
					</div>
				</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php
				foreach ($produk as $key => $value) :
				?>
                  <tr>
                    <td><?= $value->nama_produk ?></td>
                    <td><?= $value->harga ?>
                    </td>
                    <td><?= $value->kategori ?></td>
                    <td><?= $value->status ?></td>
                    <td><i class="fas fa-trash mx-2 text-danger" data-toggle="modal" data-target="#modal-delete" onclick="deletemenuinit(<?= $value->id_produk ?>)"></i>
												<i class="fas fa-edit mx-2" onclick="editme(<?= $value->id_produk ?>)" style="cursor: pointer;" data-toggle="modal" data-target="#modal-edit"></i></td>
                  </tr>
				<?php endforeach; ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- start modal -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Produk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body tambah-modal">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                      <label >Nama Produk</label>
                      <input type="text" class="form-control" placeholder="Nama Produk" name="nama_produk">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Harga Produk</label>
                      <input type="number" class="form-control" placeholder="Harga Produk" name="harga">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                      <label >Kategori Produk</label>
                      <input type="text" class="form-control" placeholder="Kategori Produk" name="kategori">
                  </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                      <label>Status Produk</label>
                      <select class="form-control" name="status">
                      <option value="bisa dijual">bisa dijual</option>
                      <option value="tidak bisa dijual">tidak bisa dijual</option>
                      </select>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="save()">Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <!-- end modal -->
    <!-- modal delete -->
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi Delete Produk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="py-3 text-center">
							<i class="ni ni-bell-55 ni-3x"></i>
							<h4 class="text-gradient text-danger mt-4">Anda yakin menghapus data ini?!</h4>
							<p>Data tidak akan bisa dikembalikan setelah dihapus.</p>
						</div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="hapusmenuconf" onclick="deletemenu(this)">Yes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <!-- end modal delete -->
    <!-- edit modal -->
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Produk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body edit-modal">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                      <label >Nama Produk</label>
                      <input type="text" class="form-control x" placeholder="Nama Produk" name="nama_produk">
                      <input type="hidden" class="form-control x" placeholder="Nama Produk" name="id_produk">
                    </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Harga Produk</label>
                      <input type="number" class="form-control x" placeholder="Harga Produk" name="harga">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                      <label >Kategori Produk</label>
                      <input type="text" class="form-control x" placeholder="Kategori Produk" name="kategori">
                  </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                      <label>Status Produk</label>
                      <select class="form-control x" name="status">
                      <option value="bisa dijual">bisa dijual</option>
                      <option value="tidak bisa dijual">tidak bisa dijual</option>
                      </select>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="edit()">Edit</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <!-- end edit modal -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?= base_url()?>resources/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url()?>resources/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>resources/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url()?>resources/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>resources/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url()?>resources/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url()?>resources/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url()?>resources/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url()?>resources/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url()?>resources/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url()?>resources/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>resources/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url()?>resources/dist/js/demo.js"></script>
<!-- Page specific script -->
<!-- SweetAlert2 -->
<script src="<?= base_url()?>resources/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url()?>resources/plugins/toastr/toastr.min.js"></script>
<script>
    function filter(){
      window.location.href = '../fastprint'
  }
  function nofilter(){
      window.location.href = '?stat=bisa dijual'
  }
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  function save() {
			var n = 0
			var input = $('.tambah-modal').find('input');
			var select = $('.tambah-modal').find('select');
			var formdata = new FormData

			$.each(input, function(i, v) {
				if ($(v).val() != "") {
					formdata.append($(v).attr('name'), $(v).val())
					n++
				}
			});

			$.each(select, function(i, v) {
				if ($(v).find('option:selected').val() != "") {
					formdata.append($(v).attr('name'), $(v).find('option:selected').val())
					n++
				}
			});


			// for (var pair of formdata.entries()) {
			//     console.log(pair[0] + ', ' + pair[1]);
			// }
			if (n == 4) {
				//2. Validasi Cek Username = DB
				$.ajax({
					type: "post",
					url: "produk/add",
					data: formdata,
					processData: false,
					contentType: false,
					dataType: "html",
					success: function(response) {
						if (response == 'true') {
							iziToast.success({
								title: 'Berhasil',
								message: 'Data Berhasil Disimpan',
								position: 'topRight',
							});
							setTimeout(function() {
								location.reload();
							}, 2000)
						} else {
							iziToast.error({
								title: 'Gagal',
								message: 'Data Gagal Disimpan',
								position: 'topRight',
							});
						}
					}
				});

			} else {
        iziToast.error({
								title: 'Gagal',
								message: 'Silahkan Isi Semua Kolom',
								position: 'topRight',
							});
			}

		}


    function editme(me) {
			var data = {
				'id_produk': me
			}
			$.ajax({
				type: "post",
				url: "produk/getdata",
				data: data,
				dataType: "json",
				success: function(response) {
          $.each(response, function(i, v) {
						$('#modal-edit').find('input[name="' + i + '"]').val(v)
					});
					$.each(response, function(i, v) {
						$('#modal-edit').find('select[name="' + i + '"]').find('option[value="' + v + '"]').prop('selected', true)
					});
				}

			});
		}

    function deletemenuinit(id) {
			$('#hapusmenuconf').val(id)
		}

		function deletemenu(me) {
			var id = $(me).val()
			$.ajax({
				type: "post",
				url: "produk/delete",
				data: {
					'id_produk': id
				},
				dataType: "html",
				success: function(response) {
					if (response == 'true') {
						iziToast.success({
							title: 'Berhasil',
							message: 'Data Berhasil Dihapus',
							position: 'topRight',
						});
						setTimeout(function() {
							location.reload();
						}, 2000)
					}
				}
			});
		}

    function edit() {
			var n = 0
			var input = $('.edit-modal').find('input');
			var select = $('.edit-modal').find('select');
			var formdata = new FormData

			$.each(input, function(i, v) {
				if ($(v).val() != "") {
					formdata.append($(v).attr('name'), $(v).val())
					n++
				}
			});

			$.each(select, function(i, v) {
				if ($(v).find('option:selected').val() != "") {
					formdata.append($(v).attr('name'), $(v).find('option:selected').val())
					n++
				}
			});


			// for (var pair of formdata.entries()) {
			//     console.log(pair[0] + ', ' + pair[1]);
			// }
			if (n == 5) {
				//2. Validasi Cek Username = DB
				$.ajax({
					type: "post",
					url: "produk/edit",
					data: formdata,
					processData: false,
					contentType: false,
					dataType: "html",
					success: function(response) {
						if (response == 'true') {
							iziToast.success({
								title: 'Berhasil',
								message: 'Data Berhasil Disimpan',
								position: 'topRight',
							});
							setTimeout(function() {
								location.reload();
							}, 2000)
						} else {
							iziToast.error({
								title: 'Gagal',
								message: 'Data Gagal Disimpan',
								position: 'topRight',
							});
						}
					}
				});

			} else {
        iziToast.error({
								title: 'Gagal',
								message: 'Silahkan Isi Semua Kolom',
								position: 'topRight',
							});
			}

		}
</script>
</body>
</html>
