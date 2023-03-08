@include('sweetalert::alert')
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
        <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
        {{-- <p class="mb-4">Transaksi baru</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('Transaction.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" cellpadding="10">

                        <thead  class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>Kode Invoice</th>
                                <th>Member</th>
                                <th>Outlet</th>
                                <th>Paket</th>
                                <th>Harga</th>
                                <th>Quantity</th>
                                <th>Tanggal</th>
                                <th>Tanggal bayar</th>
                                <th>Batas waktu</th>
                                <th>Biaya tambahan</th>
                                <th>Diskon</th>
                                <th>Pajak</th>
                                <th>Status</th>
                                <th>Status dibayar</th>
                                <th>Jumlah Harga</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                        <tbody>
                            @foreach ($transaksi as $t)
                            <tr class="m-3">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $t->code}}</td>
                                <td>{{ $t->member->nama}}</td>
                                <td>{{ $t->Outlet->nama}}</td>
                                <td>{{ $t->packets->nama_paket}}</td>
                                <td>IDR {{ $t->packets->harga}}</td>
                                <td>{{ $t->qty }}</td>
                                <td>{{ $t->tgl}}</td>
                                <td>{{ $t->tgl_bayar}}</td>
                                <td>{{ $t->batas_waktu}}</td>
                                <td>IDR {{ $t->biaya_tambahan}}</td>
                                <td>{{ $t->diskon}} %</td>
                                <td>{{ $t->pajak}} %</td>
                                <td> <select name="status" id="">
                                    <option value="baru">New</option>
                                    <option value="proses">Proccess</option>
                                    <option value="selesai">Done</option>
                                    <option value="diambil">Taken</option>
                                    </select></td>
                                <td> <select name="status_bayar" id="">
                                    <option value="dibayar">Paid</option>
                                    <option value="belum_dibayar">Unpaid</option>
                                </select> </td>
                                <td>IDR {{ $t->jumlah_harga}}</td>
                                <td>
                                    <a href="{{ route('Transaction.edit', $t->id) }}" class="btn btn-primary mb-3">Edit</a>
                                    <form action="{{ route('Transaction.destroy', $t->id ) }}" method="POST" class="mb-3">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                    <a href="{{ route('Cetak.show', $t->id) }}" class="btn btn-success">Print</a>
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
<!-- End of Main Content -->
</body>

</html>

@endsection