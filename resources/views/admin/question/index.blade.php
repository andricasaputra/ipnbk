@extends('admin.layouts.app')

@section('title', 'E-IPNBK | Setting Pertanyaan')

@section('barside.title', 'IPNBK Sumbawa')

@section('header')
  <div class="page-header flex-wrap">
    <h3 class="mb-0"> Pertanyaan IPNBK <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Pertanyaan IPNBK.</span>
    </h3>
    <div class="d-flex">
      <a href="{{ route('admin.question.create') }}" class="btn btn-sm ml-3 btn-success"> Tambah Pertanyaan </a>
    </div>
  </div>
@endsection

@section('content')


<div class="card">
<div class="card-body">
    <h4 class="card-title">Tahun 2022</h4>
    <p class="card-description"> Add class <code>.table</code>
    </p>
    <div class="table-responsive">
      
    	<table class="table table-striped table-bordered text-center datatable" width="100%">
	      <thead>
	        <tr>
	          <th>No</th>
	          <th>Pertanyaan</th>
	          <th>Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	@foreach($questions as $question)
	      		<tr>
		      		<td>{{ $loop->index + 1 }}</td>
		      		<td>{{ $question->question }}</td>
		      		<td>
		      			<a href="{{ route('admin.question.edit', $question->id) }}" class="badge badge-success badge-xs"> Edit</a>
		      			<br>
		      			<a href="{{ route('admin.question.show', $question->id) }}" class="badge badge-warning badge-xs"> Detail Pertanyaan</a>
		      			<form action="{{ route('admin.question.destroy', $question->id) }}" method="POST">
		      				@csrf
	      					@method('DELETE')
			      			<button type="submit" class="badge badge-danger badge-xs" onclick=" return confirm('Apakah Anda Yakin Ingin Menghapus File Ini?')">
	      						Delete
	      					</button>
		      			</form>
		      		</td>
	      		</tr>
	      	@endforeach
	      </tbody>
	    </table>

    </div>
  </div>
</div>


{{-- <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Pertanyaan IPNBK</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('admin.question.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Pertanyaan</a>
	    <ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content pb-20">
	    <table class="table table-striped table-bordered text-center datatable" width="100%">
	      <thead>
	        <tr>
	          <th>No</th>
	          <th>Pertanyaan</th>
	          <th>Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	@foreach($questions as $question)
	      		<tr>
		      		<td>{{ $loop->index + 1 }}</td>
		      		<td>{{ $question->question }}</td>
		      		<td>
		      			<a href="{{ route('admin.question.edit', $question->id) }}" class="btn btn-success btn-xs"> Edit</a>
		      			<br>
		      			<a href="{{ route('admin.question.show', $question->id) }}" class="btn btn-warning btn-xs"> Detail Pertanyaan</a>
		      			<form action="{{ route('admin.question.destroy', $question->id) }}" method="POST">
		      				@csrf
	      					@method('DELETE')
			      			<button type="submit" class="btn btn-danger btn-xs" onclick=" return confirm('Apakah Anda Yakin Ingin Menghapus File Ini?')">
	      						Delete
	      					</button>
		      			</form>
		      		</td>
	      		</tr>
	      	@endforeach
	      </tbody>
	    </table>
	  </div>
	</div>
</div>
 --}}



@endsection