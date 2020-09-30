@extends('layouts.app')


@section('header')
 <header class="header header-inverse h-fullscreen pb-80" style="background-color: #00aff0">
            <div class="container text-center">

                <div class="row h-full">
                <div class="col-12 col-lg-8 offset-lg-2 align-self-center">

                    <h1 class="display-1 hidden-sm-down">BAHDCASTS</h1>
                    <h1 class="fs-40 hidden-md-up">BAHDCASTS</h1>
                    <br>
                    <p class="fs-20 w-600 mx-auto hidden-sm-down">Video or voice call anyone in the world, for free. Bring family and friends together on a free group video call.</p>
                    <p class="fs-16 hidden-md-up">Video or voice call anyone in the world, for free.</p>

                    <hr class="w-80">
                    <br>

                    <a class="btn btn-xl btn-round btn-white w-300 mr-12 hidden-sm-down" href="#">Get Started</a>
                    <a class="btn btn-lg btn-round btn-white w-250 hidden-md-up" href="#">Download Skype</a>
                    <a class="btn btn-xl btn-round btn-outline btn-white w-300 hidden-sm-down" href="#">Start a conversation</a>

                </div>

                <div class="col-12 align-self-end text-center">
                    <a class="scroll-down-1 scroll-down-inverse" href="#" data-scrollto="section-intro"><span></span></a>
                </div>

                </div>

            </div>
        </header>

         <main class="main-content">




      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Basic cards
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section bg-gray">
        <div class="container">

            @forelse ($series as $s)
                 <div class="card mb-30">
                    <div class="row align-items-center h-full">
                    <div class="col-12 col-md-4">
                        <a href="blog-single.html"><img src="assets/img/blog-1.jpg" alt="..."></a>
                    </div>

                    <div class="col-12 col-md-8">
                        <div class="card-block">
                        <h4 class="card-title">{{ $s->title }}</h4>
                        <p class="card-text">{{ $s->description }}</p>
                        <a class="fw-600 fs-12" href="blog-single.html">Read more <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                        </div>
                    </div>
                    </div>
                </div>
            @empty

            @endforelse
       
        </div>
      </section>






    </main>
@endsection
