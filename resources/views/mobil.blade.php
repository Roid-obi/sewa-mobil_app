@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Mobil</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Master-Mobil</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Daftar Semua Mobil</h3>
                        <form action="{{ route('mobil.list') }}" method="GET" class="form-inline ml-auto">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Cari nama atau email" name="search" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <button class="btn btn-success mb-2" data-toggle="modal" data-target="#createModal">Create Master-Mobil</button>
                <table id="example1" class="table table-bordered table-striped">
                    
                    
                    <thead>
                        <tr>
                            <th>Tipe Mobil</th>
                            <th>Plat Nomor</th>
                            <th>Bensin</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Jumlah Mobil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mobils as $mobil)
                        <tr>
                            <td>{{ $mobil->tipe_mobil }}</td>
                            <td>{{ $mobil->plat_nomor }}</td>
                            <td>{{ $mobil->bensin }}</td>
                            <td>{{ $mobil->jumlah }}</td>
                            <td>{{ $mobil->status }}</td>
                            <td>{{ $mobil->jumlah_mobil }}</td>
                            <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $mobil->id }}">Edit</button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $mobil->id }}">Delete</button>
                            </td>
                        </tr>
                         <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $mobil->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Mobil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('mobil.update', $Mobil->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="tipe_mobil">Tipe Mobil:</label>
                                                <input type="text" name="tipe_mobil" class="form-control" value="{{ $mobil->tipe_mobil }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="plat_nomor">Plat Nomor:</label>
                                                <input type="text" name="plat_nomor" class="form-control" value="{{ $mobil->plat_nomor }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="plat_nomor">Bensin:</label>
                                                <input type="text" name="bensin" class="form-control" value="{{ $mobil->bensin }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">Jumlah:</label>
                                                <input type="text" name="jumlah" class="form-control" value="{{ $mobil->jumlah }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status:</label>
                                                <select name="status" class="form-control">
                                                    <option value="tersedia" {{ $mobil->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                                    <option value="disewa" {{ $mobil->status == 'disewa' ? 'selected' : '' }}>Disewa</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah_mobil">Jumlah Mobil:</label>
                                                <input type="text" name="jumlah_mobil" class="form-control" value="{{ $mobil->jumlah_mobil }}">
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal{{ $mobil->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Delete Sopir</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete {{ $mobil-> }}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form action="{{ route('sopir.destroy', $sopir->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </tbody>
                   
                </table>
                    <!-- menampilkan pagination links -->
                    <div class="d-flex justify-content-end mt-3">
                        {{ $mobils->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
                <!-- /.card-body -->

                <!-- Modal Create -->
                <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel">Create Mobil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('sopir.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama:</label>
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat:</label>
                                        <input type="text" name="alamat" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <select name="status" class="form-control">
                                            <option value="tersedia">Tersedia</option>
                                            <option value="tidak tersedia">Tidak Tersedia</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
@endsection