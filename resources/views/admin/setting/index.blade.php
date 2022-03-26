@extends('admin.layouts.app')

@section('title', 'E-IPNBK | Setting Jadwal IPNBK')

@section('barside.title', 'IPNBK Sumbawa')

@section('header')
  <div class="page-header flex-wrap">
    <h3 class="mb-0"> Setting Jadwal IPNBK <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Setting Jadwal IPNBK.</span>
    </h3>
    <div class="d-flex">
      <a href="{{ route('admin.setting.create') }}" type="button" class="btn btn-sm ml-3 btn-success"> Tambah Survey </a>
    </div>
  </div>
@endsection

@section('content')

<div class="card">
<div class="card-body">
    <h4 class="card-title">Jadwal Srvey IPNBK</h4>
    {{-- <p class="card-description"> Add class <code>.table</code> --}}
    </p>
    <div class="table-responsive">
      <table class="table text-center">
	      <thead>
	        <tr>
	          <th>No</th>
	          <th>Waktu Mulai</th>
	          <th>Selesai</th>
	          <th>Status</th>
	          <th>Keterangan</th>
	          <th>Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	@foreach($setting as $setting)
	      		<tr>
		      		<td>{{ $loop->index + 1 }}</td>
		      		<td>{{ $setting->start_date }}</td>
		      		<td>{{ $setting->end_date }}</td>
		      		<td>	
	      				@if($setting->is_open === NULL)
	      					{{ 'Tidak Aktif/ Expired' }}
		      				<form action="{{ route('admin.setting.show', $setting->id) }}" method="POST">
			      				@csrf
				      			<input type="hidden" name="is_open" value="1">
				      			<input type="submit" name="submit" class="btn btn-success btn-xs" value="Open">
			      			</form>
	      				@else
	      					{{ 'Aktif/ Sedang berlangsung' }}
	      					<form action="{{ route('admin.setting.show', $setting->id) }}" method="POST">
			      				@csrf
				      			<input type="hidden" name="is_open" value="">
				      			
				      			<button type="submit" class="badge badge-primary badge-xs">Close</button>
			      			</form>
	      				@endif	

		      		</td>
		      		<td>{{ $setting->keterangan }}</td>
		      		<td>
		      			<a href="{{ route('admin.setting.edit', $setting->id) }}" class="badge badge-success badge-xs"> Edit</a>
		      			<form action="{{ route('admin.setting.destroy', $setting->id) }}" method="POST">
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

	    <small><i class="fa fa-bell" aria-hidden="true"></i> Keterangan : <br>
	    	<i class="fa fa-check" aria-hidden="true"></i> Untuk membuka atau menutup periode IPNBK silahkan tekan tombol close atau open di kolom status <br>
	    	<i class="fa fa-check" aria-hidden="true"></i> Untuk membuat periode IPNBK baru silahkan tekan tombol Tambah Jadwal
	    </small>

    </div>
  </div>
</div>

@endsection