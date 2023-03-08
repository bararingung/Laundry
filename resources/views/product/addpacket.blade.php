@extends('template')
@section('contents')
{{-- @extends('templatecrud') --}}
<h1 class="m-2">Add Packet</h1>
{{-- @section('content') --}}
<div class="col-lg-12">

    <form action="{{ route('Package.store') }}" method="POST">
        @csrf
    <label for="nama" class="mb-3">Outlet :</label><br>
    <select name="id_outlet" id="" class="form-control">   
        @foreach ($Outlet as $item)
            <option value="{{ ($item->id) }}">{{ ($item->nama) }}</option>
        @endforeach
    </select><br>
    <label for="nama_paket"></label>Name :<br>
    <input type="text" name="nama_paket" id="nama_paket" placeholder="packet name" required class="form-control mt-3"><br>
    <label for="alamat" class="mb-3"></label>Type :<br>
    <select name="jenis" id="" class="form-control">
        <option value="kiloan">Kilos</option>
        <option value="selimut">blanket</option>
        <option value="bed_cover">Bed Cover</option>
        <option value="kaos">Cloth</option>
        <option value="lain-lain">Other</option>
    </select><br>
    <label for="harga"></label>Price :<br>
    <input type="number" name="harga" id="harga" placeholder="00000" required class="form-control mt-3"><br>
    <a href="{{ route('Package.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">Add packet</button>
    </form>
</div>
 {{-- @endsection --}}
 @endsection