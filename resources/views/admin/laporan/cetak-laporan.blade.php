<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <title>Document</title>
</head>

<body>
    <div class="form-group">
        <center>
            <h2>Laporan Transaksi</h2>
            <h3>Apotek Azzahra</h3>
        </center>
        <table border="1">

            <tr>
                <th>No</th>
                <th>Kode Pesanan</th>
                <th>Nama Pelanggan</th>
                <th>Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total Bayar</th>
                <th>Uang Pembayaran</th>
                <th>Kembalian</th>
                <th>Tanggal Transaksi</th>
                <div class="form-group">
                </div>
            </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach ($request as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>POAA{{ $data->kode_pesanan }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nama_barang }}</td>
                        <td>Rp.{{ number_format($data->harga, 2) }}</td>
                        <td>{{ $data->jumlah }}</td>
                        <td>Rp.{{ number_format($data->total_bayar, 2) }}</td>
                        <td>Rp.{{ number_format($data->uang, 2) }}</td>
                        <td>Rp.{{ number_format($data->kembalian, 2) }}</td>
                        <td>{{ $data->tanggal_transaksi }}</td>

                    </tr>
                @endforeach

        </table>
    </div>
    <script type="text/javascript">
        window.print();
        $
    </script>
    <br>

</body>

</html>
