<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>App Laundry - Dashboard</title>

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-BTX3qA+lZ9p/lGVbBRPLelYwNNrBrlrjK8sTxcTJJT1ry6U1K6UQk6aA89fUkQeJnBzm7VdKvYG8nKjZLIs9xA==" crossorigin="anonymous">


    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.css') }}" rel="stylesheet">

</head>
<body>
    <h1 class="">Add Outlet</h1>
<form action="{{ route('outlet.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Name :</label>
      <input type="email" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Telephone :</label>
      <input type="email" name="tlp" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Addres</label>
      <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Outlet</button>
    <a href="{{ route('outlet.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</body>
</html>