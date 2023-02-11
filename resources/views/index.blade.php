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
          <div style="padding-top: 1.25rem">
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

        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="pb-3">
                  <form class="d-flex" action="{{ url ('karyawan') }}" method="get">
                      <input class="form-control me-1" type="search" name="pencarian" value="{{ Request::get('pencarian') }}" placeholder="Masukkan nama karyawan" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <div class="pb-3">
                  <a href='{{ url ('karyawan/create') }}' class="btn btn-primary">Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">Nama Karyawan</th>
                            <th class="col-md-3">Alamat Karyawan</th>
                            <th class="col-md-1">Umur</th>
                            <th class="col-md-2">Nomor Telepon Karyawan</th>
                            <th class="col-md-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $i = $data->firstItem()?>
                      @foreach($data as $item)
                      <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->umur }}</td>
                            <td>{{ $item->nomortelepon }}</td>
                            <td>
                                <a href='{{ url ('karyawan/'.$item->nama.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Apakah data karyawan ini benar-benar mau dihapus?')"style="display:inline" action="{{ url('karyawan/'.$item->nama) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" name ="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                      @endforeach
                    </tbody>
                </table>
               {{ $data->withQueryString()->links() }}
          </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>