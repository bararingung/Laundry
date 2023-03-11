<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        	@media print{
				.no-print{
					display: none;
				}
			}
            table{
                border-collapse: collapse;
            }
            table tr th{
                width: 50px;
                height: 30px;
            }
            table tr td{
                width: 100px;
                height: 30px;
            }
            .no-print{
                margin-top: 20px;
            }
            h1{
                text-align: center;
            }
    </style>
</head>
<body>
    <h1>Print Report</h1>

    <table border="1">
        <tr>
            <th>No.</th>
            <th>Code Invoice</th>
            <th>Member</th>
            <th>Outlet</th>
            <th>Package</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>Pay Date</th>
            <th>Deadline</th>
            <th>Additional costs</th>
            <th>Discount</th>
            <th>Tax </th>
            <th>Status</th>
            <th>Payment Status</th>
            <th>Pay Total</th>
            @php
                $total = 0;
            @endphp
        </tr>
        @foreach ($transaksi as $t)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $t->code}}</td>
            <td>{{ $t->member->nama}}</td>
            <td>{{ $t->Outlet->nama}}</td>
            <td>{{ $t->packets->nama_paket}}</td>
            <td>IDR. {{ $t->packets->harga}}</td>
            <td>{{ $t->qty }}</td>
            <td>{{ $t->tgl}}</td>
            <td>{{ $t->tgl_bayar}}</td>
            <td>{{ $t->batas_waktu}}</td>
            <td>IDR. {{ $t->biaya_tambahan}}</td>
            <td>{{ $t->diskon}} %</td>
            <td>{{ $t->pajak}} %</td>
            <td>{{ $t->status }}</td>
            <td>{{$t->status_bayar}}</td>
            <td>IDR. {{ $t->jumlah_harga}}</td>
            @php
                $total += $t->jumlah_harga;
            @endphp
        </tr>
        @endforeach

    </table>
    <h3 style="text-align: end;">Total : IDR. {{ $total }}</h3>
    <button class="no-print" onclick="printTransaksi()">print!</button>
			<a href="{{ route('laporan.index') }}" class="btn btn-primary btn-sm no-print">back!</a>
            <script>
                function printTransaksi() {
                    window.print();
                }
            </script>
</body>
</html>