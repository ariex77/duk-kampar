@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Data Pegawai</h2>
    <form action="{{ route('pegawais.update', $pegawai->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('pegawai.form', ['pegawai' => $pegawai])
        <button class="btn btn-primary" type="submit">Update</button>
        <a href="{{ route('pegawais.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection