@extends('template')
@section('contents')
{{-- @extends('templatecrud') --}}
<h1 class="m-2">Add User</h1>
{{-- @section('content') --}}
<div class="col-lg-12">

    <form action="{{ route('Userdata.store') }}" method="POST">
        @csrf
    <label for="nama" class="mb-3">Name :</label><br>
    <input type="text" name="name" id="nama" placeholder="your name" autofocus required class="form-control"><br>
    <label for="tlp"></label>Username :<br>
    <input type="text" name="username" id="tlp" placeholder="Your Username" required class="form-control mt-3"><br>
    <label for="tlp"></label>Email :<br>
    <input type="email" name="email" id="tlp" placeholder="youremail@gmail.com" required class="form-control mt-3"><br>
    <label for="alamat" class="mb-3"></label>Password :<br>
    <input type="password" name="password" id="password" class="form-control" placeholder="your password" required mt-3 ><br>
    <label for="role">Role :</label>
    <select name="role" id="" class="form-control">
        <option value="">--Chose Role--</option>
        <option value="1">Admin</option>
        <option value="2">Cashier</option>
        <option value="3">Owner</option>
    </select><br>
    <a href="{{ route('Userdata.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">Add User</button>
    </form>
</div>
 {{-- @endsection --}}
 @endsection