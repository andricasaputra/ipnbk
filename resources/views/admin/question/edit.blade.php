@extends('admin.layouts.app')

@section('title', 'Ubah Jawaban IPNBK')

@section('barside.title', 'IPNBK Sumbawa')

@section('header')
  <div class="page-header flex-wrap">
    <h3 class="mb-0"> Edit Pertanyaan IPNBK <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Edit Pertanyaan IPNBK.</span>
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
       <form action="{{ route('admin.question.update', $question->id) }}" method="post" class="form-sample">

	  		@csrf
	  		@method('PUT')

	  		<div class="form-group">
	  			<label for="pertanyaan"><b>Pertanyaan</b></label>
	  			<input type="text" name="pertanyaan" class="form-control" value="{{ $question->question }}">
	  		</div>
	  		<div class="form-group"> 


	  			@foreach($answers as $index => $answer)

	  			<br>

	  			<label for="jawabans"><b>Jawaban {{ $index + 1 }}</b></label>
	  			<input type="text" name="jawabans[]" class="form-control" value="{{ $answer->answer }}">

	  			<br>

	  			<label for="nilai"><b>Nilai Jawaban {{ $index + 1 }}</b></label>
	  			<select name="nilai[]" id="nilai" class="form-control">
	  				<option value="{{ $answer->nilai }}">{{ $answer->nilai }}</option>

	  				<option value="1">1</option>
	  				<option value="2">2</option>
	  				<option value="3">3</option>
	  				<option value="4">4</option>
	  			</select>

	  			<br>

	  			<label for="penjelasan"><b>Penjelasan Jawaban {{ $index + 1 }}</b></label>
	  			<textarea name="penjelasan[]" class="form-control" cols="15" rows="10">
	  				{{ $answer->penjelasan }}
	  			</textarea>

	  			@endforeach

	  			<div id="input_container"></div>

	  			<button class="btn btn-success" id="tambah_pertanyaan"><i class="fa fa-plus" aria-hidden="true"></i></button>
	  			
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

@section('script')
	<script>
		const button = document.querySelector('#tambah_pertanyaan');
		const container = document.querySelector('#input_container');

		let no = Number('{{ $index + 1}}');

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

			no += Number('{{ $index }}');

			e.preventDefault();

			appendHtml(container, `

				<div id="container_input_${no}">
					
					<br>
					<label for="jawabans"><b>Jawaban ${no}</b></label>
					<input type="text" name="jawabans[]" class="form-control">

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
			  			<textarea name="penjelasan[]" class="form-control" cols="15" rows="10"></textarea>
	  			</div>

			`);

			appendHtml(container, `
		
	  			<button onClick="event.preventDefault(); deletePertanyaan(${no})" class="btn btn-danger pull-right" id="delete_jawaban_${no}"><i class="fa fa-trash" aria-hidden="true"></i></button>

			`);

		});
	</script>
@endsection
