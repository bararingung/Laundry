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
        <h1 class="h3 mb-2 text-gray-800">Outlets</h1>
        <p class="mb-4">Outlets update</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="mt-3 font-weight-bold text-primary p-2 flex-grow-1">Outlets Data</h6>
                <div class="p-2"></div>
                <div class="p-2">
                <form class="d-flex flex-row-reverse d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-body border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
                </div>
            </div>
            <div class="card-body">
                <a href="{{ route('outlet.create') }}" class="btn btn-success mb-3">Add Outlet <span class="ms-2"></span> <i class="fas fa-fw fa-plus fa-sm"></i></a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead  class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Telephone</th>
                                <th>Addres</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($Outlet as $O)
                            <tr>
                                <input type="hidden" class="delete_id" value="{{ $O->id }}">
                                <td>{{ $i++ }}</td>
                                <td>{{ $O->nama }}</td>
                                <td>{{ $O->tlp }}</td>
                                <td>{{ $O->alamat }}</td>
                                <td >
                                    {{-- <form action="{{ route('outlet.destroy', ['outlet' => $O->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form> --}}

                                    <form action="{{ route('outlet.destroy', $O->id) }}" method="POST" class="float-end">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('outlet.edit', ['outlet' => $O->id]) }}" class="btn btn-info btn-sm "><i class="fas fa-fw fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm btndelete"><i class="fas fa-fw fa-trash"></i></button>
                                    </form>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btndelete').click(function (e) {
            e.preventDefault();

            var deleteid = $(this).closest("tr").find('.delete_id').val();

            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you can't recover these Data anymore!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name=_token]').val(),
                            'id': deleteid,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: 'outlet/' + deleteid,
                            data: data,
                            success: function (response) {
                                swal(response.status, {
                                        icon: "success",
                                    })
                                    .then((result) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });
        });

    });

</script>

<!-- End of Main Content -->
</body>

</html>

@endsection