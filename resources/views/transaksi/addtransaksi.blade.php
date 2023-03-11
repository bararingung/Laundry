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
        <option value="">--Chose Members--</option>   
        @foreach ($member as $item)
            <option value="{{ ($item->id)}}" id="harga">{{ ($item->nama) }}</option>
        @endforeach
    </select><br>
    <label for="Outlet" class="mb-3">Outlet :</label><br>
    <select name="id_Outlet" id="" class="form-control">
        <option value="">--Chose Outlets--</option>   
        @foreach ($Outlet as $item)
            <option value="{{ ($item->id) }}">{{ ($item->nama) }}</option>
        @endforeach
    </select><br>
    <label for="packets" class="mb-3">Package :</label><br>
    <select name="id_packets" id="id_packet" class="form-control">
        <option value="">--Chose Packages--</option>   
        @foreach ($packets as $item)
            <option value="{{ ($item->id) }}" data-price="{{ $item->harga }}">{{ ($item->nama_paket) }}</option>
        @endforeach
    </select><br>
    <label for="packets" class="mb-3">Price :</label><br>
    <input type="text" id="price" name="harga" placeholder="Price" readonly class="form-control">
    <label for="tgl">Date :</label><br>
    <input type="date" name="tgl" id="tgl" placeholder="Date" required class="form-control mt-3"><br>
    <label for="tgl_bayar">Pay Date :<br></label>
    <input type="date" name="tgl_bayar" id="tgl_bayar" placeholder="Pay Date" required class="form-control mt-3"><br>
    <label for="batas_waktu">Deadline :</label><br>
    <input type="date" name="batas_waktu" id="batas_waktu" placeholder="Deadline" required class="form-control mt-3"><br>
    <label for="BiayaTambahan">Additional Cost :</label><br>
    <input type="number" name="biaya_tambahan" id="BiayaTambahan" placeholder="Additional Cost"  class="form-control mt-3"><br>
    <label for="diskon">Discount :</label><br>
    <input type="number" name="diskon" id="diskon" placeholder="Discount"  class="form-control mt-3"><br>
    <label for="pajak">Tax :</label><br>
    <input type="number" name="pajak" id="pajak" placeholder="Tax" required class="form-control mt-3"><br>
    <label for="" class="mb-3">Status :</label><br>
    <select name="status" id="" class="form-control">
        <option value="">--Chose Status--</option>
        <option value="new">New</option>
        <option value="proccess">Proccess</option>
        <option value="done">Done</option>
        <option value="taken">Taken</option>
    </select><br>
    <label for="" class="mb-3">Payment Status :</label><br>
    <select name="status_bayar" id="" class="form-control">
        <option value="">--Chose Payment Status--</option>
        <option value="paid">Paid</option>
        <option value="unpaid">unpaid</option>
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
    $(document).ready(function () {
        $('#id_packet').on('change',function () {
            var price=$('#id_packet option:selected').data('price')
            $('#price').val(price);
        })
    })
</script>
 @endsection