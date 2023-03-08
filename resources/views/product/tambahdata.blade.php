@extends('template')
@section('contents')
{{-- @extends('templatecrud') --}}
<h1 class="m-2">Add Outlet</h1>
{{-- @section('content') --}}
<div class="col-lg-12">

    <form action="{{ route('outlet.store') }}" method="POST">
        @csrf
    <label for="nama" class="mb-3">Name :</label><br>
    <input type="text" name="nama" id="nama" placeholder="your name" autofocus required class="form-control"><br>
    <label for="tlp"></label>Telephone :<br>
    <input type="text" name="tlp" id="tlp" placeholder="08xxx" autofocus required class="form-control mt-3"><br>
    <label for="alamat" class="mb-3"></label>Addres :<br>
    <textarea name="alamat" id="alamat" placeholder="your adrres" cols="30" rows="10" required class="form-control mb-3 mt-3"></textarea>
    <a href="{{ route('outlet.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">Add Outlet</button>
    </form>
 {{-- @endsection --}}
</div>
 @endsection