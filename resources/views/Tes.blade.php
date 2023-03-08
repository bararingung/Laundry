<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>

      form{
        width: 1000px;
        margin: auto;
      }


    </style>
  </head>
  <body>

  <form action="" method="head" class="">

    <div class="container text-center mt-5">
        <div class="row justify-content-center rounded">
            <div class="row justify-content-evenly shadow">
            <div class="col-4">
            <img class="pe-5 my-3 rounded" src="{{ ('img/machine.jpg') }}" alt="laundry machine" width= "400px" height= "350px">
            </div>
            <div class="col-4">
            <h1 class= "text-center mt-5 mb-2">Sign In!</h1>
            <p class="text-center"> hallo welcome back!</p>
                <div class="input-group mt-3 mb-3 ms-5">
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="username">
                <span class="input-group-text">
                  <img src="../img/person.png" alt="user">
                </span>
                </div>
                <div class="input-group mt-3 mb-3 ms-5">
                <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="password">
                <span class="input-group-text">
                  <img src="img/lock.png" alt="password">
                </span>
                </div>
                <button type="submit" class="btn btn-info text-white mb-5"><h6>Login!</h6></button>
            </div>
            </div>
        </div>

    </div>
    </form>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>