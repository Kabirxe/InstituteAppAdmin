<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login -XYZ Institute</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
</head>
<body>
    <div class="container ">
        <div class="row">
            <div class="col-8 border border-1 mx-auto mt-5 pd-5">
                <h2 class="text-center">Admin Login</h2>
                <form action="functions.php" method="post" class="col-8 mx-auto">
                    <div class="form-group">
                        <input type="email" class="form-control text-center" placeholder="Enter your Email" name="uemail" id="uemail">
                    </div>
                    <div class="form-group mt-4">
                        <input type="password" class="form-control text-center" placeholder="Enter your Password" name="upass" id="upass">
                    </div>
                    <div class="form-group mt-4">
                        <input type="submit" name="btnLogin" value="Login" class="form-control btn btn-info">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>