@extends('template')
@section('contents')
    <form action="{{ route('laporan.create') }}" class="m-4" method="GET">

        @csrf
        <h1 class="mb-5">Print Report</h1>

        <label for="">Transaction Date :</label>
        <input type="date" name="tgl" class="form-control">
        <label for="">end date :</label>
        <input type="date" name="batas_waktu" class="form-control mb-3">

        <button type="submit" class="btn btn-primary">Print!</button>
    </form>
@endsection