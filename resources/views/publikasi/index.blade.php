<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Publikasi</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">Daftar Publikasi</h1>

    {{-- Pesan berhasil --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol tambah publikasi --}}
    <a href="{{ route('publikasi.create') }}" class="btn btn-primary mb-4">
        + Tambah Publikasi
    </a>

    {{-- Daftar publikasi --}}
    @if($publikasis->count() > 0)

        <div class="row">

            @foreach($publikasis as $publikasi)

                <div class="col-md-4 mb-4">

                    <div class="card">

                        {{-- Gambar sampul --}}
                        @if($publikasi->sampul)
                            <img src="{{ asset('images/' . $publikasi->sampul) }}"
                                 class="card-img-top"
                                 alt="{{ $publikasi->judul }}">
                        @endif

                        <div class="card-body">

                            {{-- Judul --}}
                            <h5 class="card-title">
                                {{ $publikasi->judul }}
                            </h5>

                            {{-- Tanggal rilis --}}
                            <p class="card-text">
                                Tanggal rilis:
                                {{ $publikasi->tanggal_rilis }}
                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="alert alert-info">
            Belum ada data publikasi.
        </div>

    @endif

</div>

</body>
</html>