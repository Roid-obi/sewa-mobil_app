@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Armada Mobil</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Armada Mobil</li>
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
                        <h3 class="card-title">Daftar Semua Master Mobil</h3>
                        <form action="{{ route('armada-mobil.list') }}" method="GET" class="form-inline ml-auto">
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
                <table id="example1" class="table table-bordered table-striped">
                    
                    
                    <thead>
                        <tr>
                            <th>Tipe Mobil</th>
                            <th>Plat Nomor</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mobils as $mobil)
                        <tr>
                            <td>{{ $mobil->tipe_mobil }}</td>
                            <td>{{ $mobil->plat_nomor }}</td>
                            <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $mobil->id }}">Atur</button>
                            </td>
                        </tr>
                         <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $mobil->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Plat Mobil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('armada-mobil.update', $mobil->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="plat_nomor">Plat Nomor:</label>
                                                <input type="text" name="plat_nomor" class="form-control" value="{{ $mobil->plat_nomor }}">
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
                            

                        @endforeach
                    </tbody>
                   
                </table>
                    <!-- menampilkan pagination links -->
                    <div class="d-flex justify-content-end mt-3">
                        {{ $mobils->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
@endsection