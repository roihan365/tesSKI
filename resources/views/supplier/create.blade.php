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
                                {{ __('Tambah Supplier') }}
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
                    <h6 class="mb-0">{{ __('Data Supplier') }}</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="{{ route('supplier.store') }}" method="POST" role="form text-left">
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
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama_supplier" class="form-control-label">{{ __('Nama Supplier') }}</label>
                                    <div class="@error('nama_supplier')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text" placeholder="Name" id="nama_supplier"
                                            name="nama_supplier">
                                        @error('nama_supplier')
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
