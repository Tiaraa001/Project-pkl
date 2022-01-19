@extends('layouts.admin')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Data Obat</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <a href="{{ route('obat.create') }}" class="btn btn-sm btn-primary float-right">Tambah
                            Data Obat</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>NO</th>
                                    <th>Kode Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                    <th>Aksi</th>

                                </tr>
                                @php $no=1; @endphp
                                @foreach ($obat as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->kode }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->harga }}</td>
                                        <td>{{ $data->stok }}</td>
                                        <td>{{ $data->satuan }}</td>
                                        <td>
                                            <form action="{{ route('obat.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('obat.edit', $data->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('obat.show', $data->id) }}"
                                                    class="btn btn-warning">Show</a>
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah anda yakin menghapus ini?');">Delete</button>
                                                
                                    </tr>
                                    </form>
                                    <script type="text/javascript">
                                        var i = 0;

                                        $("#add").click(function() {

                                            ++i;

                                            $("#dynamicTable").append('<tr><td><input type="number" name="transaksi[' + i +
                                                '][nama_obat]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="transaksi[' +
                                                i +
                                                '][jumlah_bayar]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="transaksi[' +
                                                i +
                                            ]
                                        );
                                        });

                                        $(obat).on('click', '.remove-tr', function() {
                                            $(this).parents('tr').remove();
                                        });
                                    </script>
                                    </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
