<?php
require_once "db_connection.php";

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.84.0">
        <title>Sign In</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/">
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
            
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>


        <!-- Custom styles for this template -->
        <link href="signin.css" rel="stylesheet">
    </head>

    <body class="text-center">

        <main class="form-signin">
            <form>
                <img class="mb-4" src="Cat_world_logo.png" alt="Jumping Cat" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Please Sign Up</h1>


                <div class="form-floating">
                    <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Donald Simons">
                    <label for="floatingInput">Full Name</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="telephone" class="form-control" id="floatingInput" placeholder="(012) 345 6789">
                    <label for="floatingInput">Telephone</label>
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">New Password</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="re_pass" class="form-control" id="floatingPassword" placeholder="Re-enter Password">
                    <label for="floatingPassword">Re-enter Password</label>
                </div>

                <a href="signIn_page.php">
                    <h6 class="h3 mb-3 fw-normal">Already a member? Sign in here</h6>
                </a>

                <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign Up</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
            </form>


        </main>


    </body>

    </html>