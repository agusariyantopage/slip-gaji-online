<link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Berita
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php?p=dasboard">Dashboard</a></li>
                    <li class="active">Berita</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
                <div class="col-md-12">
                <a href="index.php?p=tambahberita"><h4><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Berita</h4></a>
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Table
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kategori</th>
                                            <th>Judul Berita</th>
                                            <th>Pengirim</th>
                                            <th>Post</th>
                                            <th>Gambar</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
        $sql=mysql_query("SELECT A.id_berita, B.nm_kategori, A.judul_berita,A.isi_berita,
A.pengirim, A.post,A.gambar
FROM berita A, kategori B WHERE
A.id_kategori=B.id_kategori
ORDER BY A.id_berita");
        while ($r=mysql_fetch_array($sql)){ 
			echo "<tr>
					<td>$r[id_berita]</td>
					<td>$r[nm_kategori]</td>
					<td>$r[judul_berita]</td>
					<td>$r[pengirim]</td>
					<td>$r[post]</td>
					<td>$r[gambar]</td>
					<td><a href=index.php?p=ubahberita&id_berita='$r[id_berita]'><i class='fa fa-edit'></i></a></td>
					<td><a href=deleteberitaaksi.php?id_berita='$r[id_berita]' onClick='return tanya()'><i class='fa fa-close'></i></a></td> 
				</tr>";
		}
	?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>