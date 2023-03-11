@extends('template')
@section('contents')
{{-- @extends('templatecrud') --}}
<h1 class="m-2">Edit Transaction</h1>
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
    <label for="packets" class="mb-3">Package :</label><br>
    <select name="id_packets" id="" class="form-control">   
        @foreach ($packet as $item)
            <option value="{{ ($item->id) }}">{{ ($item->nama_paket) }}</option>
        @endforeach
    </select><br>
    <label for="packets" class="mb-3">Price :</label><br>
    <input type="text" id="price" name="harga" placeholder="Price" readonly class="form-control">
    <label for="tgl">Date :</label><br>
    <input type="date" name="tgl" id="tgl" placeholder="Date" required class="form-control mt-3" value="{{ $transaksi->tgl }}"><br>
    <label for="tgl_bayar">Payment Date :<br></label>
    <input type="date" name="tgl_bayar" id="tgl_bayar" placeholder="Payment Date" required class="form-control mt-3" value="{{ $transaksi->tgl_bayar }}"><br>
    <label for="batas_waktu">Deadline :</label><br>
    <input type="date" name="batas_waktu" id="batas_waktu" placeholder="Deadline" required class="form-control mt-3" value="{{ $transaksi->batas_waktu }}"><br>
    <label for="biaya_tambahan">Additional Cost :</label><br>
    <input type="text" name="biaya_tambahan" id="biaya_tambahan" placeholder="Additional Cost" required class="form-control mt-3" value="{{ $transaksi->biaya_tambahan }}"><br>
    <label for="diskon">Discount :</label><br>
    <input type="text" name="diskon" id="diskon" placeholder="Discount" required class="form-control mt-3" value="{{ $transaksi->diskon }}"><br>
    <label for="pajak">Tax :</label><br>
    <input type="text" name="pajak" id="pajak" placeholder="Tax" required class="form-control mt-3" value="{{ $transaksi->pajak }}"><br>
    <label for="" class="mb-3">Status :</label><br>
    <select name="status" id="" class="form-control">
        <option value="new" @if ($transaksi->status == "new")
            selected
        @endif>New</option>
        <option value="proccess" @if ($transaksi->status == "proccess")
            selected
        @endif>Proccess</option>
        <option value="done" @if ($transaksi->status == "done")
            selected
        @endif>Done</option>
        <option value="taken" @if ($transaksi->status == "taken")
            selected
        @endif>Taken</option>
    </select><br>
    <label for="" class="mb-3">Payment Status :</label><br>
    <select name="status_bayar" id="" class="form-control">
        <option value="paid" @if ($transaksi->status_bayar == "paid")
            selected
        @endif>Paid</option>
        <option value="unpaid" @if ($transaksi->status_bayar == "unpaid")
            selected
        @endif>Unpaid</option>
    </select><br>
    <label for="harga">Jumlah harga :</label><br>
    <input type="number" name="jumlah_harga" id="harga" placeholder="00000" required class="form-control mt-3" value="{{ $transaksi->jumlah_harga }}" readonly><br>
    <a href="{{ route('Transaction.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">Edit packet</button>
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