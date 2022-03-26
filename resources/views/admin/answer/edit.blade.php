@extends('admin.layouts.app')

@section('title', 'Ubah Jawaban IPNBK')

@section('barside.title', 'IPNBK Sumbawa')

@extends('admin.layouts.app')

@section('title', 'Ubah Jawaban IPNBK')

@section('barside.title', 'IPNBK Sumbawa')

@section('header')
  <div class="page-header flex-wrap">
    <h3 class="mb-0"> Edit Jawaban IPNBK <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Edit Jawaban IPNBK.</span>
    </h3>
    <div class="d-flex">
      <a href="{{ route('admin.answer.index') }}" type="button" class="btn btn-sm ml-3 btn-success"><i class="fa fa-arrow-left"></i> Kembali </a>
    </div>
  </div>
@endsection

@section('content')

<div class="row">

  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic form elements</h4>
        <p class="card-description">Basic form elements</p>
       <form action="{{ route('admin.answer.update', $answer->id) }}" method="post" class="form-sample">

	  		@csrf
	  		@method('PUT')


	  		<div class="form-group">
	  			<label for="judul">Jawaban</label>
	  			<input type="text" name="jawaban" class="form-control" value="{{ $answer->answer }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="penjelasan">Penjelasan</label>
	  			<textarea name="penjelasan" class="form-control" cols="30" rows="10">{{ $answer->penjelasan }}</textarea>
	  		</div>
	  		<div class="pull-right">
	  			<input type="submit" name="submit" value="Simpan" class="btn btn-warning">
	  		</div>

	  	</form>
      </div>
    </div>
  </div>

  {{-- <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Typeahead</h4>
        <p class="card-description">A simple suggestion engine</p>
      </div>
    </div>
  </div> --}}
</div>

<!-- main-panel ends -->

@endsection



