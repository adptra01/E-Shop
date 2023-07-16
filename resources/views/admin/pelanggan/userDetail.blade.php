<x-apps>
    <x-slot name="title">
        Detail Pelanggan
    </x-slot>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header text-center bg-primary text-white">
                <h4 class="font-weight-bold">User</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" value="{{ $pelanggan->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" value="{{ $pelanggan->email }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="" class="form-label">Alamat Kota</label>
                            <input type="text" class="form-control"
                                value="{{ App\City::where('city_id', $address->id)->first()->title ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="" class="form-label">Detail Alamat</label>
                            <input type="text" class="form-control" value="{{ $address->detail }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-center bg-primary text-white">
                <h4 class="font-weight-bold">Order</span>
            </div>
            <div class="card-body">
                <table id="mytable" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Invoice</th>
                            <th>Subtotal</th>
                            <th>No. Resi</th>
                            <th>Status</th>
                            <th>Metode Pembayaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $no => $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $item->invoice }}</td>
                                <td>{{ $item->subtotal }}</td>
                                <td>{{ $item->no_resi }}</td>
                                <td>
                                    @if ($item->status_order_id == 1)
                                        <button class="btn btn-warning btn-sm">
                                            Belum Bayar
                                        </button>
                                    @elseif ($item->status_order_id == 2)
                                        <button class="btn btn-danger btn-sm">
                                            Perlu di Cek
                                        </button>
                                    @elseif ($item->status_order_id == 3)
                                        <button class="btn btn-danger btn-sm">
                                            Telah di Bayar
                                        </button>
                                    @elseif ($item->status_order_id == 4)
                                        <button class="btn btn-dark btn-sm">
                                            Barang di Kirim
                                        </button>
                                    @elseif ($item->status_order_id == 5)
                                        <button class="btn btn-success btn-sm">
                                            Barang Telah Sampai
                                        </button>
                                    @elseif ($item->status_order_id == 6)
                                        <button class="btn btn-success btn-sm">
                                            Pesanan di Batalkan
                                        </button>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->metode_pembayaran == 'cod')
                                        <button class="btn btn-primary btn-sm">
                                            Cash On Delivery
                                        </button>
                                    @else
                                        <button class="btn btn-primary btn-sm">
                                            Transfer
                                        </button>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin.transaksi.detail', $item->id) }}"
                                        role="button">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-apps>
