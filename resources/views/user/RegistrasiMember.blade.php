@extends('template')
@section('contents')
{{-- @extends('templatecrud') --}}
<h1 class="m-2">Registration Member</h1>
{{-- @section('contents') --}}
    <div class="col-lg-12">

        <form action="{{ route('Registrasi.store') }}" method="POST">
            @csrf
        <label for="nama">Name :</label><br>
        <input type="text" name="nama" class="form-control mb-2" id="nama" placeholder="your name" autofocus required>
        <label for="tlp"> Telephone : </label>
        <input type="text" name="tlp" class="form-control mb-2" id="tlp" placeholder="08xxx" required>
        <label for="alamat"> Addres</label><br>
        <textarea name="alamat" class="form-control mb-2" id="alamat" placeholder="your addres" cols="30" rows="10" required></textarea>
        <label for="Gender">Gender :</label>
        <select name="jenis_kelamin" id="Gender" required class="form-control ">
            {{-- <option value="">Gender</option> --}}
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select><br>
        <a href="{{ route('Registrasi.index') }}" class="btn btn-secondary mb-5">Cancel</a>
        <button type="submit" class="btn btn-primary mb-5">Registration</button>
    
        
        </form>
    </div>
{{-- @endsection --}}
@endsection
