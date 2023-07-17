<x-apps>
    <x-slot name="title">
        Informasi Toko
    </x-slot>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">INFORMASI TOKO</h1>
        @if (session('success'))
            <div class="alert alert-primary" role="alert">
                <strong>{{ session('success') }}</strong>
            </div>
        @elseif($errors->any())
            <div class="alert alert-danger" role="alert">
                <strong> Ada yang salah dengan inputan anda, silahkan input ulang 🥱</strong>
            </div>
        @else
            <div class="media bg-primary rounded mb-3 text-white p-3">
                <img class="align-self-center mr-3" width="230px" src="/layouts/drawKit/vector (18).svg"
                    alt="Generic placeholder image">
                <div class="media-body">
                    <small>
                        <strong><i class="fas fa-regular fa-bell"></i> Peringatan!!!</strong> <br>
                        Pengaturan alamat toko untuk memberikan kepercayaan ke pada pelanggan, harap pastikan nginputkan
                        alamat yang benar dan tepat.
                    </small>
                </div>
            </div>
        @endif
    </div>
    <div class="card shadow m-3">
        <form action="/identity/{{ $store->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="name_store" class="form-label font-weight-bold">Nama Toko</label>
                            <input type="text" name="name_store" id="name_store" class="form-control"
                                value="{{ $store->name_store }}" aria-describedby="helpId">
                            @error('name_store')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="telp" class="form-label font-weight-bold">Telp Toko</label>
                            <input type="telp" name="telp" id="telp" class="form-control"
                                value="{{ $store->telp }}" aria-describedby="helpId">
                            @error('telp')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label font-weight-bold">Deskripsi Toko</label>
                    <textarea class="form-control" name="description" id="description" rows="3">{{ $store->description }}</textarea>
                    @error('description')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mab-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card shadow m-3">
        <div class="card-body">
            @if ($cekalamat < 1)
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.pengaturan.simpanalamat') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select required name="province_id" id="province_id" class="form-control">
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->province_id }}">{{ $province->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-grup">
                                <label for="">Kota/Kabupaten</label>
                                <select name="cities_id" id="cities_id" class="form-control" required>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label>Detail Alamat</label>
                                <input type="text" class="form-control" name="detail" required>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary text-right">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <table>
                            <tr>
                                <th>Alamat Sekarang</th>
                                <th>:</th>
                                <td>{{ $alamat->detail }} , {{ $alamat->kota }} , {{ $alamat->prov }}</td>
                            </tr>
                        </table>
                        <small><a href="{{ route('admin.pengaturan.ubahalamat', ['id' => $alamat->id]) }}">Klik untuk
                                mengubah alamat toko</a></small>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @section('js')
        <script type="text/javascript">
            var toHtml = (tag, value) => {
                $(tag).html(value);
            }
            $(document).ready(function() {
                //  $('#province_id').select2();
                //  $('#cities_id').select2();
                $('#province_id').on('change', function() {
                    var id = $('#province_id').val();
                    var url = window.location.href;
                    $.ajax({
                        type: 'GET',
                        url: url + '/getcity/' + id,
                        dataType: 'json',
                        success: function(data) {
                            var op = '<option value="">Pilih Kota</option>';
                            if (data.length > 0) {
                                var i = 0;
                                for (i = 0; i < data.length; i++) {
                                    op +=
                                        `<option value="${data[i].city_id}">${data[i].title}</option>`
                                }
                            }
                            toHtml('[name="cities_id"]', op);
                        }
                    })
                })
            });
        </script>
    @endsection
</x-apps>
