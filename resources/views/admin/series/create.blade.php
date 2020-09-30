@extends('layouts.app')


@section('header')
  <header class="header header-inverse bg-fixed" style="background-image: url(/assets/img/bg-laptop.jpg)" data-overlay="8">
      <div class="container text-center">

        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2">

            <h1>Create New Series</h1>
            <p class="fs-18 opacity-70">Main page for cerating a series of casts</p>

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

              <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <input class="form-control form-control-lg" type="text" name="title" placeholder="Your Series Title">
                </div>

                <div class="form-group">
                  <input class="form-control form-control-lg" type="file" name="image" >
                </div>

                <div class="form-group">
                  <textarea class="form-control form-control-lg" name="description" rows="4" placeholder="Your Description"></textarea>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Create Series</button>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
