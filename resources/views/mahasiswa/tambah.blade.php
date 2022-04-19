@extends('layouts.main')
@section('title', 'Tambah Mahasiswa')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Mahasiswa</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('mahasiswa.store') }}" method="post">
                @csrf

                <div class="form-group mb-3">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" class="@error('nim') is-invalid @enderror form-control" value="{{ old('nim') }}" required>

                    @error('nim')
                        <div class="mt-1">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nama_lengkap">Nama</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" class="form-control" value="{{ old('kelas') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="prodi">Prodi</label>
                    <input type="text" name="prodi" class="form-control" value="{{ old('prodi') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                   <select name="jenis_kelamin" class="form-control">
                       <option value="">Pilih Jenis Kelamin</option>
                       <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                       <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                   </select>
                </div>

                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
                </div>
                
                <div class="form-group d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection