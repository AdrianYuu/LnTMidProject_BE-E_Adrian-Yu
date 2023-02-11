<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body class="bg-primary">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="{{ URL::to('/assets/Logo.png') }}" alt="Logo" width="80" height="55" style="margin-left:0.75rem; margin-right:0.75rem">
        <a class="nav-link" href="/" style="margin-right:1.25rem"><strong>PT Meksiko</strong></span></a>    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/"><strong>Home</strong></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/karyawan"><strong>Data Karyawan</strong></a>
            </li>
            </ul>
        </div>
    </nav>
    
    <main class="container">
        @if(Session::has('success'))
            <div class="pt3">
                <div class="alert alert-success">
                {{ Session::get('success') }}
                </div>
            </div>
            @endif
        @if($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <form action='{{url ('karyawan/'.$data->nama) }}' method='post'>
            @csrf
            @method('PUT')
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <a href="{{ url ('karyawan') }}" class = "btn btn-secondary" style="margin-bottom: 1rem">Kembali</a>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        {{ $data->nama }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='alamat' id="alamat" value="{{ $data->alamat }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='umur' id="umur" value="{{ $data->umur }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nomortelepon" class="col-sm-2 col-form-label">Nomor Telepon Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nomortelepon' id="nomortelepon" value="{{ $data->nomortelepon }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="submit" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Simpan Data</button></div>
                </div>
            </div>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>