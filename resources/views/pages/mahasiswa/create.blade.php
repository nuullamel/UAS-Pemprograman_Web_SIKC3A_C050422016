@extends('layouts.app')

@section('title', 'New Data Mahasiswa')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>New Data</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Mahasiswa</a></div>
                    <div class="breadcrumb-item">New Data Mahasiswa</div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('mahasiswa.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>New Mahasiswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text"
                                    class="form-control @error('nama')
                                    is-invalid
                                @enderror"
                                    name="nama">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text"
                                    class="form-control @error('nim')
                                    is-invalid
                                @enderror"
                                    name="nim">
                                @error('nim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" class="form-control" name="nohp">
                            </div>
                            <div class="form-group">
                                <label>Matakuliah</label>
                                <div class="form-check form-check">
                                    <input class="form-check-input" type="radio" name="matakuliah" id="matakuliah_pemrograman" value="Pemrograman Berbasis Web" {{ old('matakuliah') === 'Pemrograman Berbasis Web' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="matakuliah_pemrograman">Pemrograman Berbasis Web</label>
                                </div>
                                <div class="form-check form-check">
                                     <input class="form-check-input" type="radio" name="matakuliah" id="matakuliah_struktur_data" value="Struktur Data" {{ old('matakuliah') === 'Struktur Data' ? 'checked' : '' }}>
                                     <label class="form-check-label" for="matakuliah_struktur_data">Struktur Data</label>
                                </div>
                                <div class="form-check form-check">
                                    <input class="form-check-input" type="radio" name="matakuliah" id="matakuliah_kewirausahaan" value="Kewirausahaan" {{ old('matakuliah') === 'Kewirausahaan' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="matakuliah_kewirausahaan">Kewirausahaan</label>
                                </div>
                                <div class="form-check form-check">
                                     <input class="form-check-input" type="radio" name="matakuliah" id="matakuliah_statistika" value="Statistika" {{ old('matakuliah') === 'Statistika' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="matakuliah_statistika">Statistika</label>
                                </div>
                                <div class="form-check form-check">
                                    <input class="form-check-input" type="radio" name="matakuliah" id="matakuliah_algoritma" value="Algoritma" {{ old('matakuliah') === 'Algoritma' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="matakuliah_algoritma">Algoritma</label>
                                </div>
                            </div>
                            <div class="form-group">
                            <label>Jam</label>
                                <select class="form-control @error('jam') is-invalid @enderror" name="jam">
                                <option value="" {{ old('jam') === '' ? 'selected' : '' }}>Pilih Jam Pelajaran</option>
                                <option value="1 Jam Pelajaran" {{ old('jam') === '1 Jam Pelajaran' ? 'selected' : '' }}>1 Jam Pelajaran</option>
                                <option value="2 Jam Pelajaran" {{ old('jam') === '2 Jam Pelajaran' ? 'selected' : '' }}>2 Jam Pelajaran</option>
                                <option value="3 Jam Pelajaran" {{ old('jam') === '3 Jam Pelajaran' ? 'selected' : '' }}>3 Jam Pelajaran</option>
                                <option value="4 Jam Pelajaran" {{ old('jam') === '4 Jam Pelajaran' ? 'selected' : '' }}>4 Jam Pelajaran</option>
                            </select>
                            </div>
                            
                            <div class="form-group mb-0">
                                <label>Saran/Komentar</label>
                                <textarea class="form-control" data-height="150" name="saran"></textarea>
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
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush