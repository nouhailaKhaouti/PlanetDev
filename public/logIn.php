<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../asset/logstyle.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="body d-md-flex align-items-center justify-content-between">
            <div class="box-1 m-0">
                <img src="https://images.pexels.com/photos/2033997/pexels-photo-2033997.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500">
            </div>
            <div class="box-2 d-flex flex-column h-100 mx-0">
                <div class="mt-5">
                    <p class="mb-1 h-1">Log to your Account.</p>
                    <p class="text-muted mb-2">Share your thouhts with the world form today.</p>
                    <form action="../user/controller.php" method="POST">
                        <div class="fw-bold">
                            <br />
                            <div class="nowrap">
                                <label for="email"> Email
                                    Address:</label><br />
                                <input class="form-control input-md m-1 cart shadow-sm" style="background: #fffef5;" type="email" name="email" id="email" placeholder="enter your email address" required>
                            </div>
                            <div class="nowrap">
                                <label for="password"> Password:</label><br />
                                <input class="form-control input-md m-1 cart shadow-sm" style="background: #fffef5;" type="password" name="password" placeholder="enter the choosing password" id="password" required>
                            </div>
                            </br>
                            <div class="modal-footer modal_body" id="button">
                                <button type="submit" class=" btn text-white" name="logIn" id="hide" style="background: #1D3124;" >Log In</button>
                            </div>
                        </div>
                    </form>

                    <!-- <div class="d-flex flex-column ">
                        <p class="text-muted mb-2">Continue with...</p>
                        <div class="d-flex align-items-center">
                            <a href="#" class="box me-2 selectio">
                                <span class="fab fa-facebook-f mb-2"></span>
                                <p class="mb-0">Facebook</p>
                            </a>
                            <a href="#" class="box me-2">
                                <span class="fab fa-google mb-2"></span>
                                <p class="mb-0">Google</p>
                            </a>
                            <a href="#" class="box">
                                <span class="far fa-envelope mb-2"></span>
                                <p class="mb-0">Email</p>
                            </a>
                        </div> -->
                    <!-- <div class="mt-3">
                            <p class="mb-0 text-muted">Already have an account?</p>
                            <div class="btn btn-primary">Log in<span class="fas fa-chevron-right ms-1"></span></div>
                        </div> -->
                </div>
                <div class="mt-auto">
                    <p class="footer text-muted mb-0 mt-md-0 mt-4">By register you agree with our
                        <span class="p-color me-1">terms and conditions</span>and
                        <span class="p-color ms-1">privacy policy</span>
                    </p>
                </div>
            </div>
        </div>
        <span class="fas fa-times"></span>
    </div>
</body>

</html>