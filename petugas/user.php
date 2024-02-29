<div class="row">
    <div class="col-lg-12 grid-margin strerch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Pengguna</h4>
                    <?php
                    if ($_SESSION['Level'] == "Admin") {
                    ?>
                    <a href="?page=tambah-user" class="btn btn-primary btn-sm">Tambah User</a>
                    <?php
                    }
                    ?>
                <p class="card-description">
                </p>

                <body style="background-color:">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <?php if ($_SESSION['Level'] == "Admin") { ?>
                            <th>Opsi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        $sql = $koneksi->query("SELECT * FROM user");
                        while ($data= $sql->fetch_assoc()){

                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['Username'];?></td>
                        <td><?php echo $data['Password'];?></td>
                        <td><?php echo $data['Level'];?></td>
                        <?php if ($_SESSION['Level'] == "Admin") { ?>
                        <td><a type='button'href='?page=edit-user&id=<?= $data['UserID']; ?>' class='btn btn-sm btn-warning'>Edit</a> <a type='button' href='?page=hapus-user&UserID=<?= $data['UserID']; ?>' class='btn btn-sm btn-danger'>Delete</a></td>
                       <?php } ?>
                    </tr>
                <?php } ?>