<div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <form action="" class="form-signin" method="post"> 
              <h3 class="">DAFTAR AKUN</h3>
                <div class="card-body">
                  <form action="" method="post">
                    
                    <div class="mb-3 mt-3">
                      <table for="" class="form-label">Nama</table>
                      <input type="text" name="Username" class="form-control" require autofocus>
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="" class="form-label">Password</label>
                      <input type="password" name="Password" class="form-control" require >
                    </div>
                    <div class="mb-3">
                      <label for="level" class="form-label">Level<span style="color: red;"> *</span></label>
                      <select class="form-control" name="Level" id="level">
                              <option value="">Pilih Level</option>
                              <option value="Admin">Admin</option>
                              <option value="Petugas">Petugas</option>
                      </select>
                    </div>
                    
                      <button name="daftar" class="btn btn-primary">Daftar</button>
                      
                    </div> 
                  </form>
                  <?php 
      include '../koneksi/koneksi.php';
        if(isset($_POST['daftar'])){
          $Username = $_POST['Username'];
          $Level = $_POST['Level'];
          $Password = md5($_POST['Password']);

          $result = mysqli_query($koneksi, "INSERT INTO user (Username, Password, Level) VALUES('$Username','$Password','$Level')");
          if($result){
            echo "<script>alert('Berhasil mendaftar akun')</script>";
            echo "<script>location='location:user.php?p=daftar';</script>";
          }
        }
       ?>
                </div>
            </div>
          </div>
        </div>
      </div>
