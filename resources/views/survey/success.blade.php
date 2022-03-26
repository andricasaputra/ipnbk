@extends('survey.layouts.app')


@section('link')

<link href="{{asset('assets/css/ipnbk.css')}}" rel="stylesheet">

@endsection

@section('content')

  @include('survey.inc.ipnbk_navbar')


  <!--==========================

    Intro Section

  ============================-->

  <section id="about">

  <!-- Set up your HTML -->

	<div class="container mb-5">

    	<div class="alert alert-primary text-center"> 

        <img class="card-img-top" src="{{ asset('assets/images/boy.png') }}" alt="Card image cap" style="width: 10%; margin-bottom: 30px">
        <br>

          	<h5 style="color: #0C2E8A">

	            Terimakasih telah mengikuti survey Indeks Penerapan Nilai Budaya Kerja Ini.

              Sampai Jumpa Di lain Kesempatan!

          	</h5>

            <br/>
            <a href="{{ route('admin.home.index') }}" class="send_ikm btn btn-primary text-white" style="color: #0c2e8a; text-decoration: none; font-weight: bold; background-color: rgb(12,46,138);"> 

            <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Kembali

          </a>

	      	</a>

	      	<br/>

	      	<br/>

         </div>

	</div>

  </section><!-- #intro -->

  <main>

  <!--==========================

      Contact Section

    ============================-->

    <section id="contact">

      <div class="container">

        <div class="section-header">

          <h2>Kontak kami</h2>

          <p>Jika anda memiliki keluhan, saran atau masukan atas pelayanan yang kami berikan,

            silahkan hubungi kami melalui call center dibawah ini. Kami informasikan bahwa petugas kami

            <b>tidak</b> menerima <b>suap</b> dan <b>gratifikasi</b> dalam bentuk apapun!

          </p>

        </div>

        <div class="row contact-info">

          <div class="col-md-4">

            <div class="contact-address">

              <i class="ion-ios-location-outline"></i>

              <h3>Alamat</h3>

              <address>Jln. Pelabuhan Badas No. 01 Sumbawa Besar</address>

            </div>

          </div>

          <div class="col-md-4">

            <div class="contact-phone">

              <i class="ion-ios-telephone-outline"></i>

              <h3>Telepon</h3>

              <p><a href="tel:+155895548855">(0371) 2629152</a></p>

            </div>

          </div>

          <div class="col-md-4">

            <div class="contact-email">

              <i class="ion-ios-email-outline"></i>

              <h3>Email</h3>

              <p><a href="#">karantinasumbawa@pertanian.go.id</a></p>

            </div>

          </div>

        </div>

      </div>

    </section><!-- #contact -->

  </main>

@endsection	