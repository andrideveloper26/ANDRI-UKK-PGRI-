<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            margin: 50px auto;
            width: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <h2 class="text-center">Login</h2>
            <form action="proses-login.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="namaUsers">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="pass">
                </div>
                <button type="submit" class="btn btn-primary mt-2 text-center" name="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>