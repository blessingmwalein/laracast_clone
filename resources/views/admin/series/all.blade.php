@extends('layouts.app')


@section('header')
  <header class="header header-inverse bg-fixed" style="background-image: url(/assets/img/bg-laptop.jpg)" data-overlay="8">
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
 <div class="section bg-gray">
        <div class="container">
          <div class="row gap-y">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @forelse ($series as $s)
                           <tr>
                               <td>{{ $s->title }}</td>
                               <td><a href="{{ route('series.edit', $s->slug) }}" class="btn btn-info">Edit</a></td>
                                   <td><a href="" class="btn btn-danger">Delete</a></td>
                           </tr>
                        @empty
                            <p class="text-center">No series yet</p>
                        @endforelse
                    </tbody>
                </table>
          </div>
        </div>
      </div>
@endsection
