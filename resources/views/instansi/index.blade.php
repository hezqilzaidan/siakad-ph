@extends('layouts.master')

@section('content')
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <h4><i class="nav-icon fas fa-warehouse my-1 btn-sm-1"></i> Profil Sekolah</h4>
    <hr>
    @if(session('sukses'))
    <div class="callout callout-success alert alert-success alert-dismissible fade show" role="alert">
        <h5><i class="fas fa-check"></i> Sukses :</h5>
        {{session('sukses')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session('warning'))
    <div class="callout callout-warning alert alert-warning alert-dismissible fade show" role="alert">
        <h5><i class="fas fa-info"></i> Informasi :</h5>
        {{session('warning')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if ($errors->any())
    <div class="callout callout-danger alert alert-danger alert-dismissible fade show">
        <h5><i class="fas fa-exclamation-triangle"></i> Peringatan :</h5>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if ($instansi->count() >= 1)
    @foreach ($instansi as $item_ins)
    <div class="row">
        <div class="col-md-12">
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-9">
                        <h3 class="font-weight-bold">{{ $item_ins->nama }}</h3>
                        <ul class="ml-4 mb-0 fa-ul text-black">
                            <li class="my-3"><span class="fa-li"><i class="fas fa-lg fa-user-tie"></i></span>
                                <h4>Pimpinan
                                    &nbsp;: {{ $item_ins->pimpinan }}</h4>
                            </li>
                            <li class="my-3"><span class="fa-li"><i class="fas fa-lg fa-map-marker-alt"></i></span>
                                <h4>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item_ins->alamat }}</h4>
                            </li>
                            <li><span class="fa-li"><i class="fas fa-lg fa-at"></i></span>
                                <h4>Email
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item_ins->email }}</h4>
                            </li>
                        </ul>
                    </div>
                    <a href="{{ asset($item_ins->file) }}" data-toggle="lightbox" data-title="Lihat Logo Instansi">
                    </a>
                </div>
            </div>
            <hr>
            <div class="col-12 text-center">
                <a class="btn btn-primary" href="{{ route('instansi.edit', $item_ins->id) }}" role="button"><i class="fas fa-edit"></i> Edit Data Sekolah</a>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="col-md-6">
        <a class="btn btn-primary btn-md" href="{{ route('instansi.create') }}" role="button"><i class="fas fa-plus"></i> Setting Data Sekolah</a>
    </div>
    @endif
</section>
@endsection