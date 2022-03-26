@extends('admin.layouts.app')

@section('title', 'Setting Jadwal Aplikasi IPNBK')

@section('barside.title', 'IPNBK Sumbawa')

@section('header')
  <div class="page-header flex-wrap">
    <h3 class="mb-0"> Buat Jadwal IPNBK <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Buat Jadwal IPNBK.</span>
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
       	<form action="{{ route('admin.setting.store') }}" method="post" class="form-sample">

	  		@csrf

	  		<div class="form-group">
	  			<label for="start_date"><b>Waktu Mulai</b></label>
	  			<input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="end_date"><b>Waktu Selesai</b></label>
	  			<input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="keterangan"><b>Keterangan</b></label>
	  			<input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}">
	  		</div>
	  		<div class="pull-right">
	  			<input type="submit" name="submit" value="Simpan" class="btn btn-warning">
	  		</div>

	  	</form>
	  	</form>
      </div>
    </div>
  </div>
</div>

<!-- main-panel ends -->
@endsection
