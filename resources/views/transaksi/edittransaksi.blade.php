@extends('template')
@section('contents')
{{-- @extends('templatecrud') --}}
<h1 class="m-2">Add Transaction</h1>
{{-- @section('content') --}}
<div class="col-lg-12">

    <form action="{{ route('Transaction.update', $transaksi->id) }}" method="POST">
        @method('put')
        @csrf
    <input type="hidden" name="code" id="kode_invoice" placeholder="kode_invoice"  class="form-control mt-2" value="{{ $transaksi->code }}"><br>
    <label for="member" class="mb-3">Member :</label><br>
    <select name="id_member" id="" class="form-control">   
        @foreach ($member as $item)
            <option value="{{ ($item->id) }}">{{ ($item->nama) }}</option>
        @endforeach
    </select><br>
    <label for="Outlet" class="mb-3">Outlet :</label><br>
    <select name="id_Outlet" id="" class="form-control">   
        @foreach ($Outlet as $item)
            <option value="{{ ($item->id) }}">{{ ($item->nama) }}</option>
        @endforeach
    </select><br>
    <label for="packets" class="mb-3">Paket :</label><br>
    <select name="id_packets" id="" class="form-control">   
        @foreach ($packet as $item)
            <option value="{{ ($item->id) }}">{{ ($item->nama_paket) }}</option>
        @endforeach
    </select><br>
    <label for="packets" class="mb-3">Harga :</label><br>
    <select name="id_packets" id="" class="form-control">   
        @foreach ($packet as $item)
            <option value="{{ ($item->id) }}">{{ ($item->harga) }}</option>
        @endforeach
    </select><br>
    <label for="tgl">Tanggal :</label><br>
    <input type="date" name="tgl" id="tgl" placeholder="Tanggal" required class="form-control mt-3" value="{{ $transaksi->tgl }}"><br>
    <label for="tgl_bayar">Tanggal bayar :<br></label>
    <input type="date" name="tgl_bayar" id="tgl_bayar" placeholder="Tanggal bayar" required class="form-control mt-3" value="{{ $transaksi->tgl_bayar }}"><br>
    <label for="batas_waktu">Batas waktu :</label><br>
    <input type="date" name="batas_waktu" id="batas_waktu" placeholder="Batas waktu" required class="form-control mt-3" value="{{ $transaksi->batas_waktu }}"><br>
    <label for="biaya_tambahan">Biaya tambahan :</label><br>
    <input type="text" name="biaya_tambahan" id="biaya_tambahan" placeholder="Biaya tambahan" required class="form-control mt-3" value="{{ $transaksi->biaya_tambahan }}"><br>
    <label for="diskon">Diskon :</label><br>
    <input type="text" name="diskon" id="diskon" placeholder="Diskon" required class="form-control mt-3" value="{{ $transaksi->diskon }}"><br>
    <label for="pajak">Pajak :</label><br>
    <input type="text" name="pajak" id="pajak" placeholder="Pajak" required class="form-control mt-3" value="{{ $transaksi->pajak }}"><br>
    <label for="" class="mb-3">Status :</label><br>
    <select name="status" id="" class="form-control">
        <option value="baru" @if ($transaksi->status == "baru")
            selected
        @endif>Baru</option>
        <option value="proses" @if ($transaksi->status == "proses")
            selected
        @endif>Proses</option>
        <option value="selesai" @if ($transaksi->status == "selesai")
            selected
        @endif>Selesai</option>
        <option value="diambil" @if ($transaksi->status == "diambil")
            selected
        @endif>diambil</option>
    </select><br>
    <label for="" class="mb-3">Status pembayaran :</label><br>
    <select name="status_bayar" id="" class="form-control">
        <option value="dibayar" @if ($transaksi->status_bayar == "dibayar")
            selected
        @endif>Dibayar</option>
        <option value="belum_dibayar" @if ($transaksi->status_bayar == "belum_dibayar")
            selected
        @endif>Belum dibayar</option>
    </select><br>
    <label for="harga">Jumlah harga :</label><br>
    <input type="number" name="jumlah_harga" id="harga" placeholder="00000" required class="form-control mt-3" value="{{ $transaksi->jumlah_harga }}"><br>
    <a href="{{ route('Transaction.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">Edit packet</button>
    </form>
</div>
 {{-- @endsection --}}
 @endsection