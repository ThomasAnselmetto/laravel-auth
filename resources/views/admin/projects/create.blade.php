@extends('layouts.app')

@section('content')
<section class="container">
  @section('title')
  <h1 class="mt-4 mb-5">Project Creator</h1>
  @endsection

  
  <div class="card">
    <div class="card-body">
      <form method="POST" action="{{route('admin.projects.store')}}" class="row g-4">
      @csrf
        <div class="col-7">
          <label class="form-label" for="project_preview_img">project_preview_img</label>
          <input type="text" name="project_preview_img" id="project_preview_img" class="form-control">
        </div>
    
    
        <div class="col-5">
          <label class="form-label" for="name">name</label>
          <input type="text" name="name" id="name" class="form-control"> 
        </div>
    
    
        <div class="col-2">
          <label class="form-label" for="commits">commits</label>
          <input type="number" name="commits" id="commits" class="form-control"> 
        </div>
    
    
        <div class="col-2">
          <label class="form-label" for="contributors">contributors</label>
          <input type="number" name="contributors" id="contributors" class="form-control"> 
        </div>
    
    
        <div class="col-8">
          <label class="form-label" for="description">description</label>
          <input type="text" name="description" id="description" class="form-control"> 
        </div>
      </form>

    </div>
  </div>
</section>
@endsection

      


