@extends('admin.layouts.app')

@section('title', 'E-IPNBK | Setting Jawaban')

@section('barside.title', 'IPNBK Sumbawa')

@section('header')
  <div class="page-header flex-wrap">
    <h3 class="mb-0"> Jawaban IPNBK <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Jawaban IPNBK.</span>
    </h3>
    <div class="d-flex">
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
    	<table class="table text-center datatable text-wrap" width="100%">
	      <thead>
	        <tr>
	          <th>No</th>
	          <th>Pertanyaan</th>
	          <th>Jawaban</th>
	          <th>Nilai</th>
	          <th>Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	@foreach($answers as $answer)
	      		<tr>
		      		<td>{{ $loop->index + 1 }}</td>
		      		<td class="text-wrap">{{ $answer->question->question }}</td>
		      		<td>{{ $answer->answer }}</td>
		      		<td>{{ $answer->nilai }}</td>
		      		<td>
		      			<a href="{{ route('admin.answer.edit', $answer->id) }}" class="badge badge-success badge-xs"> Edit</a>
		      			<form action="{{ route('admin.answer.destroy', $answer->id) }}" method="POST">
		      				@csrf
	      					@method('DELETE')
			      			<button type="submit" class="badge badge-primary badge-xs" onclick=" return confirm('Apakah Anda Yakin Ingin Menghapus File Ini?')">
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

@endsection