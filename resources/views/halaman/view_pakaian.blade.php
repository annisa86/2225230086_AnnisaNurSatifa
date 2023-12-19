@extends('index')
@section('title', 'pakaian')

@section('isihalaman')
    <h3><center>Daftar Pakaian</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPakaianTambah"> 
        Tambah Data Pakaian 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">ID Pakaian</td>
                <td align="center">Merek Pakaian</td>
                <td align="center">Jenis Pakaian</td>
                <td align="center">ukuran</td>
                <td align="center">Harga</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pakaian as $index=>$pk)
                <tr>
                    <td>{{$pk->id_pakaian}}</td>
                    <td>{{$pk->merek_pakaian}}</td>
                    <td>{{$pk->jenis_pakaian}}</td>
                    <td>{{$pk->ukuran}}</td>
                    <td>{{$pk->harga}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPakaianEdit{{$pk->id_pakaian}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Pakaian -->
                        <div class="modal fade" id="modalPakaianEdit{{$pk->id_pakaian}}" tabindex="-1" role="dialog" aria-labelledby="modalPakaianEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPakaianEditLabel">Form Edit Data Pakaian</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formpakaianedit" id="formpakaianedit" action="/pakaian/edit/{{ $pk->id_pakaian}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_pakaian" class="col-sm-4 col-form-label">Id Pakaian</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="id_pakaian" name="id_pakaian" placeholder="Masukan Id Pakaian">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="merek_pakaian" class="col-sm-4 col-form-label">Merek Pakaian</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="merek_pakaian" name="merek_pakaian" placeholder="Masukan Merek Pakaian">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="jenis_pakaian" class="col-sm-4 col-form-label">Jenis Pakaian</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="jenis_pakaian" name="jenis_pakaian" value="{{ $pk->jenis_pakaian}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="ukuran" class="col-sm-4 col-form-label">Ukuran</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="ukuran" name="ukuran" value="{{ $pk->ukuran}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="harga" name="harga" value="{{ $pk->harga}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="pakaiantambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data pakaian -->
                        |
                        <a href="pakaian/hapus/{{$pk->id_pakaian}}" onclick="return confirm('Yakin mau dihapus?')">
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
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Buku -->
    <div class="modal fade" id="modalPakaianTambah" tabindex="-1" role="dialog" aria-labelledby="modalPakaianTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPakaianTambahLabel">Form Input Data Pakaian</h5>
                </div>
                <div class="modal-body">
                    <form name="formpakaiantambah" id="formpakaiantambah" action="/pakaian/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_pakaian" class="col-sm-4 col-form-label">Id Pakaian</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="id_pakaian" name="id_pakaian" placeholder="Masukan Id Pakaian">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="merek_pakaian" class="col-sm-4 col-form-label">Merek Pakaian</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="merek_pakaian" name="merek_pakaian" placeholder="Masukan Merek Pakaian">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="jenis_pakaian" class="col-sm-4 col-form-label">Jenis Pakaian</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jenis_pakaian" name="jenis_pakaian" placeholder="Masukan Jenis Pakaian">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="ukuran" class="col-sm-4 col-form-label">Ukuran</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ukuran" name="ukuran" placeholder="Masukan Ukuran">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukan harga">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="ukurantambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data ukuran -->
    
@endsection