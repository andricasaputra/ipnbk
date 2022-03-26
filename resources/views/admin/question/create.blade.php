@extends('admin.layouts.app')

@section('title', 'Tambah Data Pertanyaan IPNBK')

@section('barside.title', 'IPNBK Sumbawa')

@section('header')
  <div class="page-header flex-wrap">
    <h3 class="mb-0"> Buat Pertanyaan IPNBK <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Buat Pertanyaan IPNBK.</span>
    </h3>
    <div class="d-flex">
      <a href="{{ route('admin.question.index') }}" type="button" class="btn btn-sm ml-3 btn-success"><i class="fa fa-arrow-left"></i> Kembali </a>
    </div>
  </div>
@endsection

@section('content')

<div class="row">

  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Pertanyaan IPNBK</h4>
        <p class="card-description">Pertanyaan</p>
       <form action="{{ route('admin.question.store') }}" method="post" class="form-sample">

	  		@csrf

	  		<div class="form-group">
	  			<label for="pertanyaan"><b>Pertanyaan</b></label>
	  			<input type="text" name="pertanyaan" class="form-control" value="{{ old('pertanyaan') }}">
	  		</div>

	  		<div class="form-group">
	  			<label for="jawabans"><b>Jawaban 1</b></label>
	  			<input type="text" name="jawabans[]" class="form-control">

	  			<br>

	  			<label for="nilai"><b>Nilai Jawaban 1</b></label>
	  			<select name="nilai[]" id="nilai" class="form-control">
	  				<option value="1">1</option>
	  				<option value="2">2</option>
	  				<option value="3">3</option>
	  				<option value="4">4</option>
	  			</select>

	  			<br>

	  			<label for="penjelasan"><b>Penjelasan Jawaban 1<b/></label>
	  			<textarea name="penjelasan[]" class="form-control" cols="15" rows="10"></textarea>

	  			<div id="input_container"></div>

	  			<button class="btn btn-success" id="tambah_jawaban"><i class="fa fa-plus" aria-hidden="true"></i></button>

	  			
	  			
	  		</div>

	  		<input type="submit" name="submit" value="Simpan" class="btn btn-warning pull-right">
	  	</form>
      </div>
    </div>
  </div>
</div>

<!-- main-panel ends -->

@endsection

@section('script')
	<script>
		const button = document.querySelector('#tambah_jawaban');
		const container = document.querySelector('#input_container');
		const btn = document.querySelector('#btn_container');

		let no = 1;

		function appendHtml(el, str) {
  			let div = document.createElement('div'); //container to append to
		  div.innerHTML = str;
		  	while (div.children.length > 0) {
		    	el.appendChild(div.children[0]);
		  	}
		}

		function deletePertanyaan(id){
			console.log(id)

			const btnDelete = document.querySelector(`#delete_jawaban_${id}`);
			const containerDelete = document.querySelector(`#container_input_${id}`);

			btnDelete.remove();
			containerDelete.remove();
		}

		button.addEventListener('click', (e) => {

			no += 1;

			e.preventDefault();

			appendHtml(container, `

				<div id="container_input_${no}">
			
					<br>
					<label for="jawabans"><b>Jawaban ${no}</b></label>
					<input type="text" name="jawabans[]" id="input_jawaban_${no}" class="form-control">
					<br>
					<label for="nilai"><b>Nilai Jawaban ${no}</b></label>
	  			<select name="nilai[]" id="nilai" class="form-control">
	  				<option value="1">1</option>
	  				<option value="2">2</option>
	  				<option value="3">3</option>
	  				<option value="4">4</option>
	  			</select>

	  			<br>
					<label for="penjelasan"><b>Penjelasan Jawaban ${no}</b></label>
			  			<textarea name="penjelasan[]" id="input_penjelasan_${no}" class="form-control" cols="15" rows="10"></textarea>

	  			</div>

			`);

			appendHtml(container, `
		
	  			<button onClick="event.preventDefault(); deletePertanyaan(${no})" class="btn btn-danger pull-right" id="delete_jawaban_${no}"><i class="fa fa-trash" aria-hidden="true"></i></button>

			`);

		});
	</script>
@endsection
