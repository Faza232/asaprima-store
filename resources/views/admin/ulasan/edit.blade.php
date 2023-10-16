@extends('layout.admin')

@section('container')
    <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Ulasan</h1>
    </div>
    <div class="col-lg-8 ml-20">
        <form method="POST" action="/dashboard/ulasan/{{ $ulasan->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $ulasan->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email', $ulasan->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status/label>
                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" required autofocus value="{{ old('status', $ulasan->status) }}">
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Body</label>
                <input id="isi" type="text" name="isi" value="{{ old('isi', $ulasan->isi) }}">
                <trix-editor input="isi"></trix-editor>
                @error('isi')
                    <p class="text-danger mb-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Ulasan</button>
        </form>
    </div>
@endsection