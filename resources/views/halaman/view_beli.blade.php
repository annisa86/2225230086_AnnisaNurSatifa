@extends('index')
@section('title', 'Pembelian')

@section('isihalaman')
    <h3><center>Data Pembelian Pakaian</center><h3>
    <h3><center>My Online Shopping Fashion</center></h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalbeliTambah"> 
        Tambah Data Pembelian 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pembelian</td>
                <td align="center">ID Pakaian</td>
                <td align="center">Ukuran</td>
                <td align="center">Harga</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pembelian as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $pembelian->firstItem() }}</td>
                    <td align="center">{{$p->id_pembelian}}</td>
                    <td>{{$p->id_pakaian->ukuran}}</td>
                    <td>{{$p->anggota->nama_anggota}}</td>
                    <td>{{$p->pakaian->harga}}</td>
                    <td align="center">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPembelianEdit{{$p->id_pembelian}}"> 
                            Edit
                        </button>

                        <!-- Awal Modal EDIT data Pembelian -->
                        <div class="modal fade" id="modalPembelianEdit{{$p->id_pembelian}}" tabindex="-1" role="dialog" aria-labelledby="modalPembelianEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPembelianEditLabel">Form Edit Data Pembelian</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formpembelianmedit" id="formpembelianedit" action="/pembelian/edit/{{ $p->id_pembelian}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_pembelian" class="col-sm-4 col-form-label">ID Pembelian</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="id_pembelian" name="id_pembelian" value="{{ $p->id_pembelian}}" readonly>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="pakaian" class="col-sm-4 col-form-label">Id pakaian</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_pakaian" name="id_pakaian">
                                                        @foreach ($pakaian as $pk)
                                                            @if ($pk->id_pakaian == $p->id_pakaian)
                                                                <option value="{{ $pk->id_pakaian }}" selected>{{ $pk->id_pakaian }}</option>
                                                            @else
                                                                <option value="{{ $pk->id_pakaian }}">{{ $pk->id_pakaian }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="ukuran" class="col-sm-4 col-form-label">Nomor Ukuran</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_ukuran" name="id_ukuran">
                                                        @foreach ($ukuran as $u)
                                                            @if ($u->id_ukuran == $u->id_ukuran)
                                                                <option value="{{ $u->id_ukuran }}" selected>{{ $u->ukuran }}</option>
                                                            @else
                                                                <option value="{{ $u->id_ukuran }}">{{ $a->ukuran }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="harga" class="col-sm-4 col-form-label">Harga Pakaian</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_pakaian" name="id_pakaian">
                                                        @foreach ($pakaian as $pk)
                                                            @if ($pk->id_pakaian == $p->id_pakaian)
                                                                <option value="{{ $pk->id_pakaian }}" selected>{{ $pk->harga }}</option>
                                                            @else
                                                                <option value="{{ $pk->id_pakaian}}">{{ $pk->harga }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="pembeliantambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data Pembelian -->
                        |
                        <a href="pinjam/hapus/{{$p->id_pinjam}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $pinjam->currentPage() }} <br />
    Jumlah Data : {{ $pinjam->total() }} <br />
    Data Per Halaman : {{ $pinjam->perPage() }} <br />

    {{ $pinjam->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Peminjaman -->
    <div class="modal fade" id="modalPinjamTambah" tabindex="-1" role="dialog" aria-labelledby="modalPinjamTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPinjamTambahLabel">Form Input Data Peminjaman</h5>
                </div>
                <div class="modal-body">

                    <form name="formpinjamtambah" id="formpinjamtambah" action="/pinjam/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_petugas" name="id_petugas" placeholder="Pilih Nama Petugas">
                                    <option></option>
                                    @foreach($petugas as $pt)
                                        <option value="{{ $pt->id_petugas }}">{{ $pt->nama_petugas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_anggota" name="id_anggota" placeholder="Pilih Nama Anggota">
                                    <option></option>
                                    @foreach($anggota as $a)
                                        <option value="{{ $a->id_anggota }}">{{ $a->nama_anggota }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_buku" class="col-sm-4 col-form-label">Judul Buku</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_buku" name="id_buku" placeholder="Pilih Judul Buku">
                                    <option></option>
                                    @foreach($buku as $bk)
                                        <option value="{{ $bk->id_buku }}">{{ $bk->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="pinjamtambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Peminjaman -->
    
@endsection