@extends('layouts.control-panel')
  
@section('content')
  <div class="card-group">
    @foreach ($statistics as $entity => $count)
      <div style="border-radius: 10px;" class="card">
        <div class="card-body">
            <h3 class="card-title ">{{ $count }}</h3>
            <p class="card-text"><h5 class="text-muted">{{ $entity }}</h5></p>
          </div>
        </div>
        @endforeach
        <div class="container py-4">@include('calender')</div>
  </div>
@endsection
