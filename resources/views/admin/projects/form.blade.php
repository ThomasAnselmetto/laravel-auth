@extends('layouts.app')

@section('content')
<section class="container">
  @section('title')
  <h1 class="mt-4 mb-5">Create and Edit</h1>
  @endsection

  @include('partials.errors')

  <div class="card">
    <div class="card-body">
      {{-- rendo riutilizzabile il form sia per il create che per l'edit --}}
      {{-- aggiungo enctype perche avendo aggiunto le immagini al portfolio ho bisogno di enctype per i file
         --}}
      @if ($project->id)
      <form method="POST" action="{{route('admin.projects.update', $project)}}" enctype="multipart/form-data" class="row">
      @method('PUT')
  @else
      <form method="POST" action="{{route('admin.projects.store')}}" enctype="multipart/form-data" class="row">
  @endif 
      @csrf
      <div class="col-8">

        <div class="col-10">
          <label class="form-label" for="project_preview_img">project_preview_img</label>

          <input type="file" name="project_preview_img" id="project_preview_img" class="@error('project_preview_img') is-invalid @enderror form-control">
          
          @error('project_preview_img')
          <div class="invalid-feedback">
              {{$message}}
          </div>
        @enderror
        </div>
        
        
        <div class="col-6">
          <label class="form-label" for="name">name</label>
          <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror form-control" value="{{old('name', $project->name)}}">
          @error('name')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
            

      
        
    
        <div class="col-2">
          <label class="form-label" for="commits">commits</label>
          <input type="number" name="commits" id="commits" class="@error('commits') is-invalid @enderror form-control" value="{{old('commits', $project->commits)}}">
          @error('commits')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>
    
        
        <div class="col-2">
          <label class="form-label" for="contributors">contributors</label>
          <input type="number" name="contributors" id="contributors" class="@error('contributors') is-invalid @enderror form-control" value="{{old('contributors', $project->contributors)}}">
          @error('contributors')
          <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
      </div>
      
    
        <div class="col-10">
          <label class="form-label" for="description">description</label>
          <input type="text" name="description" id="description" class="@error('description') is-invalid @enderror form-control" value="{{old('description', $project->description)}}">
          @error('description')
          <div class="invalid-feedback">
            {{$message}}
          </div> 
          @enderror
      </div>
      </div>
      <div class="col-4 d-flex flex-wrap align-items-">
        <img src="{{$project->getImageUri()}}" class="img-fluid" alt="">
        <input type="submit" class="btn btn-primary align-self-end" value="Save">
      </div>
    </form>
        
        
      
        
        

      

    </div>
  </div>
</section>
@endsection

      



