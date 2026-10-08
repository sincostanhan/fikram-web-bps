<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Publikasi</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">Tambah Publikasi</h1>

    <form action="{{ route('publikasi.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        {{-- Judul --}}
        <div class="mb-3">
            <label for="judul" class="form-label">
                Judul Publikasi
            </label>

            <input type="text"
                   class="form-control"
                   id="judul"
                   name="judul"
                   value="{{ old('judul') }}"
                   required>

            @error('judul')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Tanggal Rilis --}}
        <div class="mb-3">
            <label for="tanggal_rilis" class="form-label">
                Tanggal Rilis
            </label>

            <input type="date"
                   class="form-control"
                   id="tanggal_rilis"
                   name="tanggal_rilis"
                   value="{{ old('tanggal_rilis') }}"
                   required>

            @error('tanggal_rilis')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Sampul --}}
        <div class="mb-3">
            <label for="sampul" class="form-label">
                Sampul Publikasi
            </label>

            <input type="file"
                   class="form-control"
                   id="sampul"
                   name="sampul"
                   accept="image/*">

            @error('sampul')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('publikasi.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>