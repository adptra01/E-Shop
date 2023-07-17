<x-layout>
    <x-slot name="title">Laporan Penjualan</x-slot>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">LAPORAN PENJUALAN</h1>
    </div>
    <div class="card m-3">
        <div class="card-header text-center">
            <strong>LAPORAN PENJUALAN</strong>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="mytable">
                    <thead>
                        <tr>
                            <th> NO </th>
                            <th> Invoice </th>
                            <th> Pemesan </th>
                            <th> Total(+Ongkir) </th>
                            <th> Status Pesanan </th>
                            <th> Tanggal transaksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $no => $item)
                            <tr>
                                <td> {{ ++$no }} </td>
                                <td> {{ $item->invoice }} </td>
                                <td> {{ $item->nama_pemesan }} </td>
                                <td> {{ $item->subtotal + $item->ongkir }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->created_at->format('Y-m-d') }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-layout>
