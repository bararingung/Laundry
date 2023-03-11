@extends('template')
@section('contents')
{{-- @extends('templatecrud') --}}

<h1 class="m-2">Edit Outlet</h1>
<div class="col-lg-12">
{{-- @section('content') --}}
    <form action="{{ route('outlet.update', ['outlet' => $outlet->id]) }}" method="POST">
        @method('put')
        @csrf
    <label for="nama">Name :</label><br>
    <input type="text" name="nama" class="form-control" id="nama" placeholder="Outlet name" autofocus  value="{{ $outlet->nama }}" required><br>
    <label for="tlp">Telephone :</label><br>
    <input type="text" name="tlp" class="form-control" id="tlp" placeholder="tlp" autofocus value="{{ $outlet->tlp }}" required><br>
    <label for="alamat">Address :</label><br>
    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control mb-3" placeholder="alamat" required>{{ $outlet->alamat }}</textarea>
    <a href="{{ route('outlet.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">Save change</button>
    
    </form>
</div>

    {{-- @endsection --}}
    @endsection
