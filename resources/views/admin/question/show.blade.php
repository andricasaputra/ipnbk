@extends('admin.layouts.app')

@section('title', 'Detail Pertanyaan IPNBK')

@section('barside.title', 'IPNBK Sumbawa')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Detail Pertanyaan</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('admin.question.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    {{-- <ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul> --}}
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content mt-4">
	  	<h4><b>{{$question->question}} </b></h4>
	  	@foreach($answers as $key => $answer)
		  	<p><b>Jawaban {{$key+1}} : <u> {{ $answer->answer }} </u>  | Nilai : {{ $answer->nilai }} </b></p>
	  	@endforeach
	  </div>
	</div>
</div>

@endsection



