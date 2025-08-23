@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Tambah Data Pegawai</h2>
    <form action="{{ route('pegawais.store') }}" method="POST">
        @csrf
        @include('pegawai.form')
        <button class="btn btn-primary" type="submit">Simpan</button>
        <a href="{{ route('pegawais.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection