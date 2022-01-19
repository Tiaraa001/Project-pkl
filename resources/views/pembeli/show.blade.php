@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Pembeli</div>
                    <div class="card-body">
                        <form action="{{ route('beli-obat') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{ $pembeli->id }}">
                            <td>
                                <select name="id_obat[]">
                                    @foreach ($obat as $data)
                                        <option value="{{ $data->id }}">nama obat ({{ $data->harga }})</option>
                                    @endforeach
                                </select>
                            </td>
                        @endsection
