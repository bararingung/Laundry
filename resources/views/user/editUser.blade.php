@extends('template')
@section('contents')
{{-- @extends('templatecrud') --}}
<h1 class="m-2">Edit User</h1>
{{-- @section('content') --}}
<div class="col-lg-12">

    <form action="{{ route('Userdata.update', $Userdata->id) }}" method="POST">
        @method('put')
        @csrf
    <label for="nama" class="mb-3">Name :</label><br>
    <input type="text" name="name" id="nama" placeholder="your name" autofocus required class="form-control" value="{{ $Userdata->name }}"><br>
    <label for="tlp"></label>Username :<br>
    <input type="text" name="username" id="tlp" placeholder="Your Username" required class="form-control mt-3" value="{{ $Userdata->username }}"><br>
    <label for="tlp"></label>Email :<br>
    <input type="text" name="email" id="tlp" placeholder="youremail@gmail.com" required class="form-control mt-3" value="{{ $Userdata->email }}"><br>
    <label for="alamat" class="mb-3"></label>Password :<br>
    <input type="text" name="password" id="password" class="form-control" placeholder="your password" required mt-3 bcrypt value="{{ $Userdata->password }}"><br>
    <label for="role">Role :</label>
    <select name="role" id="" class="form-control">
        <option value="1" @if ($Userdata->role == 1)
            selected
        @endif>Admin</option>
        <option value="2" @if ($Userdata->role == 2)
            selected
            @endif>Cashier</option>
        <option value="3" @if ($Userdata->role == 3)
            selected
            @endif>Owner</option>
    </select><br>
    <a href="{{ route('Userdata.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">Save change</button>
    </form>
 {{-- @endsection --}}
</div>
 @endsection