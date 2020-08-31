<!-- ALERT GAGAL LOGIN -->
<?php 
    if ($this->session->flashdata('users_check')) {
        if($this->session->flashdata('cond')=='0'){
?>
        <script>
            swal({
                title: "Failed !",
                text: "<?= $this->session->flashdata('users_check') ?>",
                icon: "error",
            });
        </script>
<?php
        }else{
?>
        <script>
            swal({
                title: "Success !",
                text: "<?= $this->session->flashdata('users_check') ?>",
                icon: "success",
            });
        </script>
<?php
        }
    } 
?>  
<!-- END OF ALERT -->

<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <?php $this->load->view('backend/include/header_dekstop') ?>
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="overview-wrap mb-3">
                                <h3 class="ml-4 mt-4 mb-2 d-inline font-weight-normal">
                                    <i class="zmdi zmdi-file-text mr-3"></i>Surat Rekomendasi SE
                                </h3>
                                <span class="float-right mr-3 mt-3">
                                    <i class="fa fa-home"></i> <a href="<?= base_url('dashboard') ?>"> Dashboard</a> / surat rekomendasi
                                </span>
                            </div>
                            <div class="overwiew-wrap">
                                <!-- <span class="m-l-20">
                                    <form action="#" class="d-inline">
                                        <select name="" id="" class="form-control form-control-sm filter">
                                            <option value="nama">Nama</option>
                                            <option value="nik">NIK</option>
                                            <option value="nip">NIP</option>
                                        </select>
                                        <select name="" id="" class="form-control form-control-sm filter">
                                            <option value="nama">Nama</option>
                                            <option value="nik">NIK</option>
                                            <option value="nip">NIP</option>
                                        </select>
                                        <input type="submit" class="btn btn-success btn-sm mt-1" value="Filters">
                                    </form>
                                </span> -->
                                <span class="float-right mr-2">
                                    <input class="form-control" id="searchInput" type="text" placeholder="Search..">
                                </span>
                                <span class="float-right mr-2">
                                    <a href="<?= base_url('users/listSoftDeleted') ?>" class="btn btn-danger btn-sm mt-1"><i class="zmdi zmdi-time-restore mr-2"></i>List Surat Deleted</a>
                                </span>
                                <span class="float-right mr-2">
                                    <a href="<?= base_url('users/add') ?>" data-toggle="modal" data-target="#tambahSE" class="btn btn-primary btn-sm mt-1"><i class="fa fa-plus mr-2"></i>Tambah Surat Baru</a>
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-data">
                                    <table class="table">
                                        <thead>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>NIP</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Status</th>
                                            <th class="text-center">Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if(empty($users)){
                                                    echo "<tr> <td colspan='8' class='text-center'> Data tidak tersedia ! </td></tr>";
                                                }else{

                                                $no = 1;
                                                foreach($users as $user): 
                                                // encrypt id
                                                $encrypt_id = $this->encrypt->encode($user->user_id);
                                            ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $user->user_nama ?></td>
                                                <td><?= $user->user_nik ?></td>
                                                <td><?= $user->user_nip ?></td>
                                                <td><?= $user->user_email ?></td>
                                                <td><?= $user->user_telepon ?></td>
                                                <td>
                                                    <?php 
                                                        if($user->user_status == 0){
                                                            echo "<span class='badge badge-danger p-2'> Passpharse";
                                                        }else {
                                                            echo "<span class='badge badge-success p-2'> issue";
                                                        }
                                                    ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <!-- <a href="<?= base_url('users/detail/'.str_replace(array('=','+','/'),array('-','_','~'),$encrypt_id.'')) ?>" class="item"  title="Detail">
                                                            <i class="zmdi zmdi-eye"></i>
                                                        </a> -->
                                                        <a href="<?= base_url('users/edit/'.str_replace(array('=','+','/'),array('-','_','~'),$encrypt_id.'')) ?>" class="item item-warning"  title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="<?= base_url('users/softDelete/'.str_replace(array('=','+','/'),array('-','_','~'),$encrypt_id.'')) ?>" class="item item-danger" id="delete-user<?= $no ?>" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>
                                                        <!-- script ALERT DELETE -->
                                                        <script src="<?= base_url('assets/backend/') ?>vendor/jquery-3.2.1.min.js"></script>
                                                        <script>
                                                            $('#delete-user<?= $no ?>').on('click', function (e) {
                                                                e.preventDefault();
                                                                const url = $(this).attr('href');
                                                                swal({
                                                                    title: 'Are you sure?',
                                                                    text: 'This record and it`s details will be deleted but not permanently !',
                                                                    icon: 'warning',
                                                                    buttons: ["Cancel", "Yes!"],
                                                                }).then(function(value) {
                                                                    if (value) {
                                                                        swal({
                                                                            title: "Your Data has been deleted! but not permanently ",
                                                                            text: "Please wait, This alert will close automaticly and reload the page :) ",
                                                                            icon: "success",
                                                                            showConfirmButton: false
                                                                        });
                                                                        setTimeout(function(){
                                                                            window.location.href = url;
                                                                        },3000);
                                                                    }else{
                                                                        swal("Okay :) ");
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                        <!-- END SCRIPT ALERT DELETE -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php 
                                                $no++; endforeach; 
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>

<!-- modal Tambah TTE -->
<div class="modal fade" id="tambahSE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-white" id="exampleModalLabel">Surat Rekomendasi SE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="<?= base_url('TTE/generateTTE') ?>" method="post">
            <div class="form-group">
                <label for="unit_organisasi" class="form-control-label">Pilih Tipe Surat </label>
                <select name="tipeSE" id="" class="form-control">
                    <option selected disabled>-- PILIH --</option>
                    <option value="">Tipe 1</option>
                    <option value="">Tipe 2</option>
                </select>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="unit_organisasi" class="form-control-label">Masukan Unit Organisasi : </label>
                        <input type="text" name="unit_organisasi" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-success" value="Simpan">
        </div>
    </form>
    </div>
  </div>
</div>
<!-- end modal Tambah TTE -->

<script src="<?= base_url('assets/backend/') ?>vendor/jquery-3.2.1.min.js"></script>
<!-- function SEARCH -->
<script>
    $(document).ready(function(){
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<!-- function PAGINATION -->
<script src="<?= base_url('assets/backend/') ?>vendor/jquery.tablePagination.js"></script>
<script>
    $('table').tablePagination({
        perPage: 5,
        paginationClass:'tablePagination'
    });
</script>
