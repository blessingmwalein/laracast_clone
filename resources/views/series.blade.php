@@extends('layouts.app')
@section('header')
  <header class="header header-inverse bg-fixed" style="background-image: url({{$series->image_path}})" data-overlay="8">
      <div class="container text-center">

        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2">

            <h1>All Series</h1>
            <p class="fs-18 opacity-70">Main page for cerating a series of casts</p>

          </div>
        </div>

      </div>
    </header>
@endsection

@section('content')
    
@endsection