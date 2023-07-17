<x-apps>
    <x-slot name="title">
        Informasi Toko
    </x-slot>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">INFORMASI TOKO</h1>
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
    </div>
    <div class="card shadow m-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.pengaturan.updatealamat', ['id' => $id]) }}" method="POST">
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
                    var urlNya = url.substring(0, url.lastIndexOf('/ubahalamat/'));
                    $.ajax({
                        type: 'GET',
                        url: urlNya + '/alamat/getcity/' + id,
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
