@extends('template')
@section('contents')
{{-- @extends('templatecrud') --}}
<h1 class="m-2">Edit Package</h1>
{{-- @section('content') --}}
<div class="col-lg-12">

    <form action="{{ route('Package.update', ['Package' => $packet->id]) }}" method="POST">
        @method('put')
        @csrf
    <label for="nama" class="mb-3">Outlet :</label><br>
    <select name="id_outlet" id="" class="form-control">
        <option value="">--Chose Outlet--</option>   
        @foreach ($Outlet as $item)
            <option value="{{ ($item->id) }}">{{ ($item->nama) }}</option>
        @endforeach
    </select><br>
    <label for="nama_paket"></label>Name :<br>
    <input type="text" name="nama_paket" id="nama_paket" placeholder="packet name" required class="form-control mt-3" value="{{ $packet->nama_paket }}"><br>
    <label for="alamat" class="mb-3"></label>Type :<br>
    <select name="jenis" id="" class="form-control">
        <option value="">--Chose Type--</option>
        <option value="kilos" @if ($packet->jenis == "kilos")
            selected
        @endif>Kilos</option>
        <option value="blanket" @if ($packet->jenis == "blanket")
            selected
        @endif>blanket</option>
        <option value="bed_cover" @if ($packet->jenis == "bed_cover")
            selected
        @endif>Bed Cover</option>
        <option value="cloth" @if ($packet->jenis == "cloth")
            selected
        @endif>Cloth</option>
        <option value="other" @if ($packet->jenis == "other")
            selected
        @endif>Other</option>
    </select><br>
    <label for="harga">Price :</label><br>
    <input type="number" name="harga" id="harga" placeholder="00000" required class="form-control mt-3" value="{{ $packet->harga }}"><br>
    <a href="{{ route('Package.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">Edit package</button>
    </form>
</div>
 {{-- @endsection --}}
 @endsection