@extends('resume')

@section('main')
<a href="{{ url("resumes/create") }}" class="btn btn-success mb-3">Tambah Data</a>

    @if (session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session()->get('updatesuccess'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('updatesuccess') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <form class="form-inline" action="{{ url("/") }}" method="GET">
            <div class="form-group mx-sm-3 mb-2">
            <input value="{{ Request::get('cari_keyword') }}" type="text" class="form-control" name="cari_keyword" placeholder="Cari Nama">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Cari</button>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telp.</th>
                        <th>Alamat</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $i=1
                    @endphp

                    @foreach ($resumes as $resume)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $resume->name }}</td>
                        <td>{{ $resume->email }}</td>
                        <td>{{ $resume->phone }}</td>
                        <td>{{ $resume->address }}</td>
                        <td>
                            <a href="{{ url("resumes/{$resume->id}/edit") }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ url("resumes/{$resume->id}") }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
              {{-- {{ $resumes->links('resume.pagination') }} --}}

        </div>
    </div>
    <a href="{{ url('laporan-pdf') }}" class="btn btn-secondary">Cetak PDF</a>

@endsection