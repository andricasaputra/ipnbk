@extends('admin.layouts.app')

@section('title', 'IPNBK | Grafik')

@section('barside.title', 'ipnbk Sumbawa')

@section('content')

<style type="text/css">
	#total_responden, #nilai_ipnbk, #layanan_kh, #layanan_kt{
		width: 100%;
		min-height: 310px
	}
</style>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Statistik & Grafik {{ $keterangan->ipnbk_ket->keterangan }}</h3>
	    <h5>
	    	Periode Survey : 
	    	{{ date('d-M-Y', strtotime($keterangan->ipnbk_ket->start_date)) }} 
	    	s/d 
	    	{{ date('d-M-Y', strtotime($keterangan->ipnbk_ket->end_date)) }}
	    </h5>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12">
	<div class="row" style="margin-bottom: 1%">
		<div class="col-sm-4 col-sm-12 col-xs-12">
			<div class="row">
				<label for="select_ipnbk">Pilih ipnbk</label>
				<select name="select_ipnbk" id="select_ipnbk" class="form-control">
					<option disabled selected>-- Pilih Periode ipnbk --</option>
					@foreach($keterangan->ipnbk as $i)
						<option value="{{ $i->id }}">{{ $i->keterangan }}</option>
					@endforeach
				</select>
			</div>
		 </div>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_content">
			  	<div class="row">
			  		<div class="col-md-12 text-center" id="nilai_ipnbk">
						<h2></h2>
						<div class="card card-default">
						  <div class="card-body" style="margin: 70px 0">
						  	<h1 style="font-size: 50pt"></h1>
						  	<i class="fa fa-check-circle" style="font-size: 30pt"></i>
						  </div>
						</div>
					</div>
			  	</div>
			  </div>
			</div>
		</div>

		<div class="col-md-3 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_content">
			  	<div class="row">
			  		<div class="col-md-12 text-center" id="total_responden">
						<h2></h2>
						  <div class="card-body" style="margin: 70px 0">
						  	<h1 style="font-size: 50pt"></h1>
						  	<i class="fa fa-line-chart" style="font-size: 30pt"></i>
						  </div>
					</div>
			  	</div>
			  </div>
			</div>
		</div>

		<div class="col-md-3 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_content">
			  	<div class="row">
			  		<div class="col-md-12 text-center" id="layanan_kh">
						<h2></h2>
						  <div class="card-body" style="margin: 70px 0">
						  	<h1 style="font-size: 50pt"></h1>
						  	<i class="fa fa-paw" style="font-size: 30pt"></i>
						  </div>
					</div>
			  	</div>
			  </div>
			</div>
		</div>

		<div class="col-md-3 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_content">
			  	<div class="row">
			  		<div class="col-md-12 text-center" id="layanan_kt">
						<h2></h2>
						  <div class="card-body" style="margin: 70px 0">
						  	<h1 style="font-size: 50pt"></h1>
						  	<i class="fa fa-leaf" style="font-size: 30pt"></i>
						  </div>
					</div>
			  	</div>
			  </div>
			</div>
		</div>
	</div>
</div>

@include('admin.grafik.chart')

@endsection

@include('admin.grafik.script')