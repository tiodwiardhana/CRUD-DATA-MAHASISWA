@extends('layouts.main')
@section('title', 'Data Mahasiswa')
@section('content')

@if(session()->has('berhasil'))
    <div class="alert alert-success">
        {{ session()->get('berhasil') }}
    </div>
@endif
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Data Mahasiswa</h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <a href="{{ route('mahasiswa.create') }}"class="btn btn-success">Tambah</a>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Prodi</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $increment = 1;
                    @endphp
                    @foreach ($mahasiswa as $item)
                    <tr>
                        <td>{{ $increment++ }}</td>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->prodi }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->tempat_lahir }}</td>
                        <td>{{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a href=""{{ route('mahasiswa.edit', $item->id) }}class="btn btn-warning">Edit</a>
                            <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection