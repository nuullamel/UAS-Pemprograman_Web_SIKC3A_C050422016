@extends('layouts.app')

@section('title', 'Mahasiswa')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All Data Mahasiswa</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Mahasiswa</a></div>
                    <div class="breadcrumb-item">All Data Mahasisa</div>
                </div>
            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Data</h4>
                                <div class="section-header-button">
                                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">New Data</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET", action="{{ route('mahasiswa.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="nim">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Nomor Telepon</th>
                                            <th>Matakuliah</th>
                                            <th>Jam</th>
                                            <th>Saran/Komentar</th>
                                            <th>Action</th>

                                        </tr>
                                        
                                            @foreach ($mahasiswas as $mahasiswa)
                                            <tr>
                                                <td>
                                                    {{ $mahasiswa->nama }}
                                                </td>
                                                <td>
                                                    {{ $mahasiswa->nim }}
                                                </td>
                                                <td>
                                                    {{ $mahasiswa->nohp }}
                                                </td>
                                                <td>
                                                    {{ $mahasiswa->matakuliah }}
                                                </td>
                                                <td>
                                                    {{ $mahasiswa->jam }}
                                                </td>
                                                <td>
                                                    {{ $mahasiswa->saran }}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('mahasiswa.edit', $mahasiswa->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST"
                                                            class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $mahasiswas->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush