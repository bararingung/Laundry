@extends('template')
@section('contents')
{{-- @extends('templatecrud') --}}
<h1 class="m-2">Edit Member</h1>
{{-- @section('content') --}}
<div class="col-lg-12">
    

    <form action="{{ route('Registrasi.update', ['Registrasi' => $Registrasi->id]) }}" method="POST">
        @method('put')
        @csrf
    <label for="nama">Name :</label>
    <input type="text" name="nama" id="nama" class="form-control mb-2" placeholder="your name" autofocus  value="{{ $Registrasi->nama }}" required>
    <label for="tlp">Telephone :</label>
    <input type="text" name="tlp" id="tlp" placeholder="tlp" required class="form-control mb-2" value="{{ $Registrasi->tlp }}">
    <label for="alamat">Address :</label>
    <textarea name="alamat" id="alamat" required class="form-control" cols="30" rows="10">{{$Registrasi->alamat }}</textarea>
    <label for="Gender"> Gender : </label>
    <select name="jenis_kelamin" id="Gender" class="form-control mb-3" required>
        <option value="">--Chose Gender--</option>
        <option value="M" @if ($Registrasi->jenis_kelamin == "L")
            selected
        @endif>Male</option>
        <option value="F" @if ($Registrasi->jenis_kelamin == "P")
            selected
        @endif>Female</option>
    </select>
    <a href="{{ route('Registrasi.index') }}" class="btn btn-secondary mb-5">Cancel</a>
    <button type="submit" class="btn btn-primary mb-5">Save change</button>
    
    </form>
{{-- @endsection --}}
</div>
@endsection
