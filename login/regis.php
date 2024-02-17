<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Login</h2>
    <form action="p-regis.php" method="post">
        Username: <input type="text" name="namaUsers"><br>
        Password: <input type="password" name="pass"><br>
        Level   : 
        <select name="level" id="level">
          <option value="admin">ADMINISTRATOR</option>
          <option value="petugas">KARYAWAN</option>
        </select>
        <input type="submit" value="Login" name="submit">
    </form>
</body>
</html>