@extends('template')
@section('contents')
{{-- @extends('templatecrud') --}}
<h1 class="m-2">Add Transaction</h1>
{{-- @section('content') --}}
<div class="col-lg-12">

<form action="{{ route('Transaction.store') }}" method="POST" class="form">
        @csrf
    <input type="hidden" name="code" id="kode_invoice" placeholder="kode_invoice"  class="form-control mt-2"><br>
    <label for="member" class="mb-3">Member :</label><br>
    <select name="id_member" id="" class="form-control">   
        @foreach ($member as $item)
            <option value="{{ ($item->id)}}" id="harga">{{ ($item->nama) }}</option>
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
        @foreach ($packets as $item)
            <option value="{{ ($item->id) }}">{{ ($item->nama_paket) }}</option>
        @endforeach
    </select><br>
    <label for="packets" class="mb-3">Harga :</label><br>
    <select name="id_packets" class="form-control">   
        @foreach ($packets as $item)
            <option value="{{ ($item->id) }}" >{{ ($item->harga) }}</option>
        @endforeach
    </select><br>
    <label for="tgl">Tanggal :</label><br>
    <input type="date" name="tgl" id="tgl" placeholder="Tanggal" required class="form-control mt-3"><br>
    <label for="tgl_bayar">Tanggal bayar :<br></label>
    <input type="date" name="tgl_bayar" id="tgl_bayar" placeholder="Tanggal bayar" required class="form-control mt-3"><br>
    <label for="batas_waktu">Batas waktu :</label><br>
    <input type="date" name="batas_waktu" id="batas_waktu" placeholder="Batas waktu" required class="form-control mt-3"><br>
    <label for="BiayaTambahan">Biaya tambahan :</label><br>
    <input type="number" name="biaya_tambahan" id="BiayaTambahan" placeholder="Biaya tambahan"  class="form-control mt-3"><br>
    <label for="diskon">Diskon :</label><br>
    <input type="number" name="diskon" id="diskon" placeholder="Diskon"  class="form-control mt-3"><br>
    <label for="pajak">Pajak :</label><br>
    <input type="number" name="pajak" id="pajak" placeholder="Pajak" required class="form-control mt-3"><br>
    <label for="" class="mb-3">Status :</label><br>
    <select name="status" id="" class="form-control">
        <option value="baru">Baru</option>
        <option value="proses">Proses</option>
        <option value="selesai">Selesai</option>
        <option value="diambil">diambil</option>
    </select><br>
    <label for="" class="mb-3">Status pembayaran :</label><br>
    <select name="status_bayar" id="" class="form-control">
        <option value="dibayar">Dibayar</option>
        <option value="belum_dibayar">Belum dibayar</option>
    </select><br>
    <label for="qty">Quantity :</label><br>
    <input type="number" name="qty" id="qty" placeholder="00000" required class="form-control mt-3"><br>
    {{-- <label for="total">Jumlah harga :</label><br>  
    <input type="number" name="jumlah_harga" id="total" placeholder="00000" required class="form-control mt-3" ><br> --}}
    <a href="{{ route('Transaction.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">Add transaction</button>
</form>
</div>
 {{-- @endsection --}}
 <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
 <script type="text/javascript">
    $(".form-control").keyup(function(){
        var bil1 = parseInt($("#harga").val())
        var bil2 = parseInt($("#BiayaTambahan").val())
        var bil3 = parseInt($("#diskon").val())
        var bil4 = parseInt($("#pajak").val())

        var cekDiskon = bil3 / 100
        var cekPajak = bil4 / 100
        var totalHarga = bil1 + bil2 * cekDiskon / cekPajak;

        $("#total").attr("value", hasil)

    });
</script>
 @endsection