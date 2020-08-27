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
                        <!-- USER DATA-->
                        <div class="user-data m-b-30">
                            <h3 class="title-3 m-b-30">
                                <i class="zmdi zmdi-edit"></i>Visualisasi TTE
                                <span class="m-l-20"><a href="" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah TTE </a></span>
                                <!-- <span class="m-l-5"><a href="" class="btn btn-success btn-sm"><i class="fa fa-upload"></i>Unggah File </a></span> -->
                                <span class="float-right">
                                    <input class="form-control" id="searchInput" type="text" placeholder="Search..">
                                </span>
                            </h3>
                            <div class="table-responsive table-data">
                                <table class="table">
                                    <thead>
                                        <th>#</th>
                                        <th>Nama User</th>
                                        <th>Tanggal</th>
                                        <th>Perihal</th>
                                        <th class="text-center">Aksi</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> 1 </td>
                                            <td>
                                                User 1
                                            </td>
                                            <td>
                                                25-08-2020
                                            </td>
                                            <td>
                                                Surat rekomendasi
                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                        <i class="zmdi zmdi-mail-send"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Detail">
                                                        <i class="zmdi zmdi-eye"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END USER DATA-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>
<script src="<?= base_url('assets/backend/') ?>vendor/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<script src="<?= base_url('assets/backend/') ?>vendor/jquery.tablePagination.js"></script>
<script>
    $('table').tablePagination({
        perPage: 5,
        paginationClass:'tablePagination'
    });
</script>