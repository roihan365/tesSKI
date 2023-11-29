@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6">
                <div class="row gx-4">
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ __('Transaksi Baru') }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{ __('Masukkan data sesuai form dibawah') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('Data transaksi') }}</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="{{ route('pembelian.store') }}" method="POST" role="form text-left">
                        @csrf
                        @if ($errors->any())
                            <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-text text-white">
                                    {{ $errors->first() }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success"
                                role="alert">
                                <span class="alert-text text-white">
                                    {{ session('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="satuan" class="form-control-label">{{ __('Supplier') }}</label>
                                    <div class="@error('satuan')border border-danger rounded-3 @enderror">
                                        <select class="form-control" type="text" id="number" name="kode_supplier">
                                            <option value="">Pilih Supplier</option>
                                            @foreach ($supplier as $item)
                                                <option value="{{ $item->kode_supplier }}">{{ $item->nama_supplier }}</option>
                                            @endforeach
                                        </select>
                                        @error('satuan')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="satuan" class="form-control-label">{{ __('Barang') }}</label>
                                    <div class="@error('satuan')border border-danger rounded-3 @enderror">
                                        <select class="form-control" type="text" id="number" name="kode_barang">
                                            <option value="">Pilih Barang</option>
                                            @foreach ($barang as $item)
                                                <option value="{{ $item->kode_barang }}">{{ $item->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                        @error('satuan')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="qty" class="form-control-label">{{ __('Qty') }}</label>
                                    <div class="@error('qty')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text" placeholder="Jumlah pembelian" id="qty"
                                            name="qty">
                                        @error('qty')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="diskon" class="form-control-label">{{ __('Diskon (persen)') }}</label>
                                    <div class="@error('diskon')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="number" placeholder="Diskon dalam persen" id="diskon"
                                            name="diskon">
                                        @error('diskon')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit"
                                class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Simpan Data' }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
