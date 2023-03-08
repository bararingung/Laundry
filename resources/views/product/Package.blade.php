
@extends('template')

@section('contents')
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Outlet</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Package</h1>
        <p class="mb-4">Package update</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Package Data</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('Package.create') }}" class="btn btn-primary mb-3">Add Pacakge</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead  class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>Outlet</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        <tbody>
                            @php
                               $i = 1; 
                            @endphp
                            @foreach ($produk as $p)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ ($p->outlet->nama) }}</td>
                                <td>{{ ($p->nama_paket) }}</td>
                                <td>{{ ($p->jenis) }}</td>
                                <td>Rp.{{ ($p->harga) }}</td>
                                <td>
                                        <div class="col-2 ">
                                    <a href="{{ route('Package.edit', $p->id ) }}" class="btn btn-primary mb-2" >Edit</a>
                                        </div>
                                        <div class="col-2 ">
                                    <form action="{{ route('Package.destroy', $p->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                        </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
@include('sweetalert::alert')
<!-- End of Main Content -->
</body>

</html>
@endsection