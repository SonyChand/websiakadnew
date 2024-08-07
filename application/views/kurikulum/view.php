<div class="card card-primary">
    <div class="card-header  with-border">
        <h3 class="card-title">Data Table Kurikulum</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <!-- button add -->
        <?php
        echo anchor('kurikulum/add', '<button class="btn bg-navy btn-flat margin">Tambah Data</button>');
        ?>

        <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA KURIKULUM</th>
                    <th>IS AKTIF</th>
                    <th>AKSI</th>
                </tr>
            </thead>
        </table>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- punya lama -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script> -->

<!-- baru tapi cdn -->
<!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"> -->

<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<script>
    $(document).ready(function() {
        var t = $('#mytable').DataTable({
            "ajax": '<?php echo site_url('kurikulum/data'); ?>',
            "order": [
                [1, 'desc']
            ],
            "columns": [{
                    "data": null,
                    "width": "50px",
                    "class": "text-center",
                    "orderable": false,
                },
                {
                    "data": "nama_kurikulum",
                },
                {
                    "data": "is_aktif",
                    "width": "150px",
                    "class": "text-center"
                },
                {
                    "data": "aksi",
                    "width": "120px",
                    "class": "text-center"
                },
            ]
        });

        t.on('order.dt search.dt', function() {
            t.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });
</script>