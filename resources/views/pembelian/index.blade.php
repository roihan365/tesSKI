@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="row mb-4">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Daftar Pembelian</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-dark mb-0" href="{{ route('pembelian.create') }}"><i
                                            class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Pembelian</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
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
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No Transaksi</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama Supplier</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tanggal Trx</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order as $item)
                                            <tr>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $item->kode_order }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->nama_order }}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{ $item->satuan }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('order.edit', $item->id) }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
