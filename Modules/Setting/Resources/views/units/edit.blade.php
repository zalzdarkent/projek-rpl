@extends('layouts.app')

@section('title', 'Ubah Unit')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('units.index') }}">Units</a></li>
        <li class="breadcrumb-item active">Ubah</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{ route('units.update', $unit) }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Nama Unit <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" required value="{{ $unit->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="short_name">Singkatan Unit <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="short_name" required value="{{ $unit->short_name }}">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="operator">Operator</label>
                                        <input type="text" class="form-control" name="operator" value="{{ $unit->operator }}">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="operation_value">Operation Value</label>
                                        <input type="text" class="form-control" name="operation_value" value="{{ $unit->operation_value }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-start"> <!-- Changed from 'justify-content-end' to 'justify-content-start' -->
                    <div class="form-group">
                        <button class="btn btn-primary">Perbarui <i class="bi bi-check"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
