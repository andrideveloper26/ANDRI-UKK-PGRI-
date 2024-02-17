


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  <title>REGIS | PETUGAS</title>
</head>
<body>
  <div class="container mt-3 shadow p-3 mb-3 bg-body-tertiary rounded">
    <h2>INPUT KARYAWAN</h2>
    <form action="proses-input-petugas.php" method="post" enctype="multipart/form-data">
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Nama lengkap" aria-label="Username" aria-describedby="basic-addon1" name="namaLengkap">
      </div>
      
      <div class="input-group mb-3 ">
        <select class="form-select" aria-label="Default select example" id="jk" name="jk">
          <option selected>Jenis Kelamin</option>
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
        
        </select>
      </div>
      
      <div class="input-group">
        <span class="input-group-text">Alamat</span>
        <textarea class="form-control" aria-label="With textarea" id="alamat" name="alamat"></textarea>
      </div>
      
      <div class="mb-3">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="formFile" name="image">
      </div>
      
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username">
      </div>
      
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" name="pass">
      </div>
      
      <div class="submit">
        <button class="btn btn-primary" type="submit" name="submit">KIRIM</button>
      </div>

    </form>
  </div>
  
  
 
 
 
   <!-- ... (script Bootstrap tetap sama) ... -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
          
        </script> 
</body>
</html>