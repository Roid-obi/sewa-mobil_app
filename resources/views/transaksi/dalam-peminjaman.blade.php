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
            <li class="breadcrumb-item">Transaksi</li>
            <li class="breadcrumb-item active">Dalam Peminjaman</li>
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
                        <h3 class="card-title">Daftar Semua Pesanan</h3>
                        {{-- <form action="{{ route('transaksi.index') }}" method="GET" class="form-inline ml-auto">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Cari" name="search" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <button class="btn btn-success mb-2" data-toggle="modal" data-target="#createModal">Buat Pesanan</button>
                <table id="example1" class="table table-bordered table-striped">
                    
                    
                    <thead>
                        <tr>
                            <th>Nama Peminkam</th>
                            <th>Tipe Mobil</th>
                            <th>Sopir</th>
                            <th>Total Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis->where('status', 'dalam-peminjaman') as $transaksi)
                        <tr>
                            <td>{{ $transaksi->nama_peminkam }}</td>
                            <td>{{ $transaksi->tipe_mobil }}</td>
                            <td>{{ $transaksi->sopir }}</td>
                            <td>{{ $transaksi->total_pembayaran }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $transaksi->id }}">Batal</button>
                            </td>
                        </tr>
                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal{{ $transaksi->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Batal Pesanan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Batalkan</button>
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
                        {{-- {{ $transaksis->links('vendor.pagination.bootstrap-4') }} --}}
                    </div>
                </div>
                <!-- /.card-body -->

                <!-- Modal Create -->
                <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Buat Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tipe_mobil">Tipe Mobil:</label>
                        <select name="status" class="form-control">
                            @foreach ($mobils as $mobil)
                            <option value="{{ $mobil->tipe_mobil }}">{{ $mobil->tipe_mobil }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah:</label>
                        <input type="number" name="jumlah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status">Sopir:</label>
                        <select name="status" class="form-control">
                            <option value="pakai">Pakai</option>
                            <option value="tidak pakai">Tidak Pakai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total_pembayaran">Total Pembayaran</label>
                        <input type="number" name="total_pembayaran" class="form-control">
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