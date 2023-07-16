<x-apps>
    <x-slot name="title">
        Pelanggan
    </x-slot>
    <div class="container">
        <div class="media bg-primary rounded mb-3 text-white p-3">
            <img class="align-self-center mr-3" width="230px" src="/layouts/drawKit/vector (3).svg"
                alt="Generic placeholder image">
            <div class="media-body">
                <small>
                    <strong><i class="fas fa-regular fa-bell"></i> Peringatan!!!</strong> <br>
                    Sebelum Anda menambah, mengedit, atau menghapus data pada aplikasi ini, pastikan Anda telah
                    memeriksa kembali data yang Anda masukkan atau pilih. Data yang telah diubah atau dihapus tidak
                    dapat dikembalikan lagi. Jika Anda yakin dengan pilihan Anda, klik tombol konfirmasi. Jika
                    tidak, klik tombol batal.
                </small>
            </div>
        </div>
    </div>

    <div class="card shadow m-3">
        <div class="card-body">
            <table id="mytable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pelanggan</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td><a class="btn btn-primary btn-sm" href="{{ Route('customer.order.detail', $item->id) }}"
                                    role="button">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



</x-apps>
