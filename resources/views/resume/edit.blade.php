@extends('resume')

@section('main')
    <div class="row">
        <div class="col-md-8 offset-sm-2">
            <h2 class="display-6">Edit Data</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-sm-2">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url("/resumes/{$resume->id}") }}" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap :</label>
                    <input value="{{ old('nama_lengkap', $resume->name) }}" class="form-control" type="text" name="nama_lengkap">
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input value="{{ old('email', $resume->email) }}" class="form-control" type="text" name="email">
                </div>
                <div class="form-group">
                    <label for="phone">No. Hp :</label>
                    <input value="{{ old('phone', $resume->phone) }}" class="form-control" type="text" name="phone">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat :</label>
                    <textarea name="alamat" class="form-control">{{ old('alamat', $resume->address) }}</textarea>
                </div>
                <button style="submit" class="btn btn-primary">Simpan</button>
            </form>
            <a href="{{ url('/') }}" class="btn btn-warning mt-3">Kembali</a>
        </div>
    </div>
@endsection