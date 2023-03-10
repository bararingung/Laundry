<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Print Transaction</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}
			.invoice-box table tr.item td:nth-child(3) {
				text-align: right;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(3) {
				border-top: 2px solid #eee;
				font-weight: bold;
				text-align: right;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
			@media print{
				.no-print{
					display: none;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0" >
				<tr class="top">
					<td colspan="3">
						<table>
									

							<tr>
								<td class="title">
									<img src="{{ asset('img/four.png') }}" style="width: 80px; max-width: 300px" />
								</td>

								<td>
									Invoice #: {{ $transaksi->code }}<br />
									Created: {{ $transaksi->tgl }}<br />
									Due: {{ $transaksi->tgl_bayar }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="3">
						<table>
							<tr>
								<td>
									The fourth Laundry.<br />
									Cisayong, 46153<br />
									Tasikmalaya City
								</td>
		

								<td>
									{{ $transaksi->Outlet->nama }}<br />
									{{ $transaksi->Outlet->tlp }}<br />
									{{ $transaksi->Outlet->alamat }}
								</td>
							</tr>
							<tr>
								<td> <b>Laundry Status :</b> {{ $transaksi->status }} <br>
								<b>Payment Status :</b> {{ $transaksi->status_bayar }} 
							</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					{{-- <td>Payment Method</td>

					<td>Check #</td> --}}
				</tr>

				<tr class="details">
					{{-- <td>Check</td>

					<td>1000</td> --}}
				</tr>

				<tr class="heading">
					<td>Item</td>
					<td>Quantity</td>
					<td style="text-align: right;">Price</td>
				</tr>

				<tr class="item">
					<td>{{ $transaksi->packets->nama_paket }}</td>
					<td >{{ $transaksi->qty }}</td>
					<td>IDR. {{ $transaksi->packets->harga }}</td>
				</tr>
				<tr class="item">
					<td></td>
					<td >Additional Cost</td>
					<td>IDR. {{ $transaksi->biaya_tambahan }}</td>
				</tr>

				<tr class="item">
					<td></td>
					<td>Discount</td>

					<td>{{ $transaksi->diskon }}%</td>
				</tr>

				<tr class="item">
					<td></td>
					<td>Tax</td>

					<td>{{ $transaksi->pajak }}%</td>
				</tr>
				<tr class="total">
					<td></td>
					<td></td>
					<td>Total: IDR. {{ $transaksi->jumlah_harga }}</td>
				</tr>
			</table>

            <button class="no-print" onclick="printTransaksi()">print!</button>
			<a href="{{ route('Transaction.index') }}" class="btn btn-primary btn-sm no-print">back!</a>

            <script>
                function printTransaksi() {
                    window.print();
                }
            </script>
		</div>
	</body>
</html>