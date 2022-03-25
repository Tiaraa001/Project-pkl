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
            <h2>Laporan Pemasukan</h2>
        </center>
        <table border="1">

            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Nama Barang</th>
                <th>Total Pembelian</th>
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
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nama_barang }}</td>
                        <td>{{ number_format($data->total_bayar, 2) }}</td>
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
    {{-- <div class="form-group">
        <button type="submit" class="btn btn-outline-primary"><a href="{{ route('transaksi.index') }}"
                class="btn btn-outline-info"><b>Back</b></a> </button>
    </div> --}}

</body>

</html>
