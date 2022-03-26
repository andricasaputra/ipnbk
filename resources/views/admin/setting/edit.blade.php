@extends('admin.layouts.app')

@section('title', 'Ubah Jadwal IKM')

@section('barside.title', 'IKM Sumbawa')

@section('header')
  <div class="page-header flex-wrap">
    <h3 class="mb-0"> Edit Jadwal IPNBK <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Edit Jadwal IPNBK.</span>
    </h3>
    <div class="d-flex">
      <a href="{{ route('admin.setting.index') }}" type="button" class="btn btn-sm ml-3 btn-success"><i class="fa fa-arrow-left"></i> Kembali </a>
    </div>
  </div>
@endsection

@section('content')

<div class="row">

  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Jadwal IPNBK</h4>
        <p class="card-description">Jadwal</p>
       <form action="{{ route('admin.setting.update', $setting->id) }}" method="post" class="form-sample">

	  		@csrf
	  		@method('PUT')

	  		<div class="form-group">
	  			<label for="start_date">Waktu Mulai</label>
	  			<input type="date" name="start_date" class="form-control" value="{{ $setting->start_date }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="end_date">Waktu Selesai</label>
	  			<input type="date" name="end_date" class="form-control" value="{{ $setting->end_date }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="keterangan">Keterangan</label>
	  			<input type="text" name="keterangan" class="form-control" value="{{ $setting->keterangan }}">
	  		</div>
	  		<div class="pull-right">
	  			<input type="submit" name="submit" value="Simpan" class="btn btn-warning">
	  		</div>

	  	</form>
      </div>
    </div>
  </div>
</div>

<!-- main-panel ends -->

@endsection
