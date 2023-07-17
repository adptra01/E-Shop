<x-apps>
    <x-slot name="title">No. Rekening</x-slot>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">REKENING TOKO <small>/ {{ $rekening->atas_nama }}</small></h1>
        @if (session('success'))
            <div class="alert alert-primary shadow" role="alert">
                {{ session('success') }}
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger shadow" role="alert">
                Ada yang salah dengan inputan anda, silahkan input ulang.
            </div>
        @else
            <div class="media bg-primary rounded mb-3 text-white p-3">
                <img class="align-self-center mr-3" width="230px" src="/layouts/drawKit/vector (17).svg"
                    alt="Generic placeholder image">
                <div class="media-body">
                    <small>
                        <strong><i class="fas fa-regular fa-bell"></i> Peringatan!!!</strong><br>Anda akan mengedit
                        data rekening yang sudah ada. Pastikan data yang Anda masukkan sudah benar dan sesuai dengan
                        buku rekening. Data rekening yang sudah diedit tidak dapat dikembalikan ke data sebelumnya.
                    </small>
                </div>
            </div>
        @endif
    </div>
    <div class="card shadow m-4">
        <p class="text-center font-weight-bold my-2">UBAH NO. REKENING</p>
        <div class="card-header mx-3 rounded text-white bg-primary">
            <small>Input kan ulang semua formulir dibawah atau pilih batal.</small>
        </div>
        <div class="card-header bg-white mb-3">
            <form action="{{ route('admin.rekening.update', ['id' => $rekening->id]) }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Nama Bank <small class="text-danger">Lama</small></label>
                        <input type="text" class="form-control" disabled value="{{ $rekening->bank_name }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Nama Bank <small class="text-success">Baru</small></label>
                        <input type="text" class="form-control" name="bank_name" value="{{ old('bank_name') }}">
                        @error('bank_name')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Atas Nama <small class="text-danger">Lama</small></label>
                        <input type="text" class="form-control" disabled value="{{ $rekening->atas_nama }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Atas Nama <small class="text-success">Baru</small></label>
                        <input type="text" class="form-control" name="atas_nama" value="{{ old('atas_nama') }}">
                        @error('atas_nama')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">No Rekening <small class="text-danger">Lama</small></label>
                        <input type="number" class="form-control" disabled value="{{ $rekening->no_rekening }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">No Rekening <small class="text-success">Baru</small></label>
                        <input type="number" class="form-control" name="no_rekening" value="{{ old('no_rekening') }}">
                        @error('no_rekening')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-right">
                        <a href="/admin/rekening" class="btn btn-secondary"><i class="fa fa-times"
                                aria-hidden="true"></i> Batal</a>
                        <button type="submit" class="btn btn-primary text-right"><i class="fas fa-check"></i>
                            Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table id="mytable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Bank</th>
                        <th>Atas Nama</th>
                        <th>No Rekening</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bank as $no => $rek)
                        <tr>
                            <td align="center">{{ ++$no }}</td>
                            <td>{{ $rek->bank_name }}</td>
                            <td>{{ $rek->atas_nama }}</td>
                            <td>{{ $rek->no_rekening }}</td>
                            <td style="gap: 3px">
                                <a href="{{ route('admin.rekening.edit', ['id' => $rek->id]) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fa fa-gavel" aria-hidden="true"></i> Ubah
                                </a>
                                <a href="{{ route('admin.rekening.delete', ['id' => $rek->id]) }}"
                                    onclick="return confirm('Yakin Hapus data')" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-apps>
