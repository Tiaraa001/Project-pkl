<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 5px;
        }

        th {
            padding: 5px;
            background: whitesmoke;
        }

    </style>

    <center><br>
        <h2>Laporan Transaksi</h2>
        <br>

        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Barang</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Total Bayar</th>
                    <th>Uang Pembayaran</th>
                    <th>Kembalian</th>
                    <th>Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no=1 @endphp
                <!-- data -->
                @foreach ($transaksi as $data)
                    <tr>
                        <td>
                            <center>{{ $no++ }}</center>
                        </td>
                        <td>{{ $data->kode_pesanan }}</td>
                        <td>{{ $data->orders->nama }}</td>
                        <td>{{ $data->orders->barangs->nama_barang }}</td>
                        <td>{{ $data->orders->barangs->harga }}</td>
                        <td>{{ $data->orders->jumlah }}</td>
                        <td>{{ $data->total_bayar }}</td>
                        <td>{{ $data->uang }}</td>
                        <td>{{ $data->kembalian }}</td>
                        <td>{{ $data->tanggal_transaksi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>
    <script type="text/javascript">
        window.print();
        $
    </script>
</body>

</html>
