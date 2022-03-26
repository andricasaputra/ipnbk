@if($jadwal === null)
<script>

  window.location = '{{ route('survey.close') }}';

</script>

<?php exit; ?>

@endif
@extends('survey.layouts.app')

@section('link')

<!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <!-- Demo styles -->
    <style>
      html,
      body {
        position: relative;
        height: 100%;
      }

      body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
      }

      .swiper {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .card{
        cursor: pointer;
      }
    </style>
@endsection

@section('content')

  @include('survey.inc.ipnbk_navbar')

  <form method="post" id="form_submit">

  <!-- Swiper -->
    <div class="swiper mySwiper" >
      <div class="swiper-wrapper">
        <div ></div>

        @php $no = 1 @endphp

        @foreach($questions as $question)

          <div class="swiper-slide text-center" >

            <div class="form-group" style="padding-top: 30px;">

              <h3>Kuisioner {{ $jadwal->keterangan }}</h3>

               <h5><b>{{ $no++ }}. {{ $question->question }}</b></h5>
               <div class="container">
                  <div class="row">

                    @csrf

                    @foreach($question->answer as $i =>  $answer)

                        <div class="col-lg-3" >

                          <div class="card border-primary d-flex align-items-center pt-3" style="height: 300px; vertical-align: middle;" onClick="clickCard('{{ $question->id }}', '{{ $answer->id }}', '{{ $jadwal->id }}', '{{ $user->id }}', this)">

                            <img class="card-img-top" src="{{ asset($images[$loop->index]) }}" alt="Card image cap" style="width: 50%">

                            <div class="card-body">
                              <h5 class="card-title"><b>{{ $answer->answer }}</b></h5>
                              <p class="card-text" style="font-size: 15px; line-height: normal">{{ $answer->penjelasan }}</p>

                              <input style="display: none;" class="{{ $question->id }}_{{ $answer->id }}" type="radio" value="{{ $answer->id }}" name="{{ $question->id }}[]">
                              
                            </div>
                          </div>

                        </div> 
                      @endforeach
                  </div>
                </div>
            </div>
          </div>
        @endforeach  

      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>

    </div>

      <!-- Modal -->
      <div  id="end_modal" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Satu langkah lagi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
              <b>Klik tombol kirim dibawah ini untuk menyelesaikan survey</b>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="submit" class="btn btn-dark btn-lg text-center" id="btn_submit">Kirim Kuisioner</button>
            </div>
          </div>
        </div>
      </div>

  </form>

@endsection 

@section('script')

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    allowSlideNext : false,
  });
</script>

<script>

const question_answer = [];

function clickCard(id, a_id, j_id, u_id, el)
{
    $('.card').removeClass('bg-success');
    el.classList.add("bg-success")

     //$(`.${id}_${a_id}`).val() this is answer id
    let question_id = id;
    let answer_id = a_id;
    let ipnbk_id = j_id;
    let responden_id = u_id;

     push(question_answer, {
      question_id, 
      answer_id, 
      ipnbk_id, 
      responden_id
    });

     let indextotal = $(this).find('.indextotal').first().val();
     let inputQuestion = $(this).find('.input_question').first().val();
     let inputAswer = $(this).find('.answer_question').first().val();

     if (swiper.isEnd) {

      $('#end_modal').modal('show');
     }

    if (inputQuestion !== '' && inputAswer !=='') {

      setTimeout(function () {

        swiper.allowSlideNext = true;
        swiper.slideNext()

      }, 500);

    }
}

$(document).on('submit', '#form_submit', function(e){
    e.preventDefault();
    submitSurvey(question_answer);
});

function submitSurvey(datas)
{
  fetch('{{ route('survey.store') }}', {
    method: 'POST', // or 'PUT'
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify(datas),
  })
  .then(response => response.json())
  .then(data => {
    window.location = '{{ route('survey.success') }}';
  })
  .catch((error) => {
    console.error('Error:', error);
  });
}

function push(array, item) {
  if (!array.find(({answer_id}) => answer_id === item.answer_id)) {

      array.push(item);
  }
}

</script>

@endsection







