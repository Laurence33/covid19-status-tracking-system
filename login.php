<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <title>Admin Login</title>
    <style>
        body {
            background-color: #343a40;
        }
        .form {
            width: 300px;
            margin-top: 12em;
        }                                                   
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="form text-center mx-auto">
            <img class="mb-3" src="img/covid-check-white.png" width="150px" height="150px" alt="Covid-check-logo">
            <form action="includes/login.inc.php" method="POST">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Username" name="uname">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Password" name="pword">
                </div>
                <button class="btn btn-primary mt-2" type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
</body>
</html>