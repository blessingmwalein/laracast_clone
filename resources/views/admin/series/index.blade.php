@extends('layouts.app')


@section('header')
  <header class="header header-inverse bg-fixed" style="background-image: url(/assets/img/bg-laptop.jpg)" data-overlay="8">
      <div class="container text-center">

        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2">

            <h1>{{ $series->title }}</h1>
            <p class="fs-18 opacity-70">Customize your series lessons</p>

          </div>
        </div>

      </div>
    </header>
@endsection

@section('content')
 <div class="section bg-gray">
        <div class="container">
          <div class="row gap-y">
            <div class="col-12">

                <vue-lessons default_lessons="{{ $series->lessons }}" series_id="{{ $series->id }}">  </vue-lessons>
                {{-- <vue-create-lesson-modal></vue-create-lesson-modal> --}}
                <vue-noty></vue-noty>
            </div>
          </div>
        </div>
      </div>
@endsection
