@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data mahasiswa</a></div>
                    <div class="breadcrumb-item">Edit Data Mahasiswa</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $mahasiswa->nama }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ $mahasiswa->nim }}">
                                @error('nim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ $mahasiswa->nohp }}">
                                @error('nohp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Matakuliah</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="matakuliah" value="Pemrograman Berbasis Web" {{ $mahasiswa->matakuliah == 'Pemrograman Berbasis Web' ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        Pemrograman Berbasis WEb
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="matakuliah" value="Struktur Data" {{ $mahasiswa->matakuliah == 'Struktur Data' ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        Struktur Data
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="matakuliah" value="Kewirausahaan" {{ $mahasiswa->matakuliah == 'Kewirausahaan' ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        Kewirausahaan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="matakuliah" value="Statistika" {{ $mahasiswa->matakuliah == 'Statistika' ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        Statistika
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="matakuliah" value="Algoritma" {{ $mahasiswa->matakuliah == 'Algoritma' ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        Algoritma
                                    </label>
                                </div>

                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jam</label>
                                <select class="form-control @error('jam') is-invalid @enderror" name="jam">
                                    <option value="1 Jam Pelajaran" {{ $mahasiswa->jam == '1 Jam Pelajaran' ? 'selected' : '' }}>1 Jam Pelajaran</option>
                                    <option value="2 Jam Pelajaran" {{ $mahasiswa->jam == '2 Jam Pelajaran' ? 'selected' : '' }}>2 Jam Pelajaran</option>
                                    <option value="3 Jam Pelajaran" {{ $mahasiswa->jam == '3 Jam Pelajaran' ? 'selected' : '' }}>3 Jam Pelajaran</option>
                                    <option value="4 Jam Pelajaran" {{ $mahasiswa->jam == '4 Jam Pelajaran' ? 'selected' : '' }}>4 Jam Pelajaran</option>
                                </select>
                                @error('jam')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <label>Saran/Komentar</label>
                                <textarea class="form-control @error('saran') is-invalid @enderror" data-height="150" name="saran">{{ $mahasiswa->saran }}</textarea>
                                @error('saran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <!-- Page Specific JS File -->
@endpush