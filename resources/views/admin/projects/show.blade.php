@extends('layouts.app')

@section('content')
<section class="container">
  <h1 class="my-4">Project: {{$project->name}}</h1>
  <div class="dettaglio-canzone row mt-1 mb-5">
    <div class="col-8 offset-2">
      <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active fw-bold" aria-current="true" href="#">Your Song</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="{{ route('admin.projects.index') }}">Back to the Projects list</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          
          <h2 class="card-title mb-3">Name:  {{$project->name}}</h2>
          <h2 class="card-title mb-3">Commits:  {{$project->commits}}</h2>
          <h4 class="card-title mb-3">Contributors:  {{$project->contributors}}</h4>
          <h4 class="card-text mb-3">Description:  {{$project->description}}</h4>
          <a href="https://open.spotify.com/" class="btn btn-primary">Apri la Repo su Github</a>
        </div>
      </div>
    </div>
  </div>

  
</section>
@endsection