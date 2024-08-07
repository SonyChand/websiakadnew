<div class="card card-primary">
    <div class="card-header  with-border">
        <h3 class="card-title">Data Table Siswa</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <!-- button add -->
        <?php
        echo anchor('siswa/add', '<button class="btn bg-navy btn-flat margin">Tambah Data</button>');
        echo anchor('siswa/form', '<button class="btn btn-warning btn-flat margin">Import Data</button>');
        echo anchor('siswa/naik_kelas', '<button class="btn btn-info btn-flat margin">Naik Kelas</button>');
        ?>

        <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>FOTO</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>TEMPAT LAHIR</th>
                    <th>TANGGAL LAHIR</th>
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
            "ajax": '<?php echo site_url('siswa/data'); ?>',
            "order": [
                [2, 'asc']
            ],
            "columns": [{
                    "data": null,
                    "width": "50px",
                    "class": "text-center",
                    "orderable": false,
                },
                {
                    "data": "foto",
                    "class": "text-center"
                },
                {
                    "data": "nim",
                    "width": "120px",
                    "class": "text-center"
                },
                {
                    "data": "nama",
                },
                {
                    "data": "tempat_lahir",
                    "width": "150px"
                },
                {
                    "data": "tanggal_lahir",
                    "width": "150px",
                    "class": "text-center"
                },
                {
                    "data": "aksi",
                    "width": "80px",
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