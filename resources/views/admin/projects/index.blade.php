@extends('layouts.app')
@section('cdn')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css"> 
@endsection
@section('content')
    
  <div class="container">

    <h1 class="mt-4 mb-5">Project List</h1>
    <div class="row">
      <div class="col-6">
        <form class="d-flex my-2 my-lg-0">
          <input class="form-control me-sm-2" name="term" type="text" placeholder="Search projects">
          <button class="btn btn-dark my-2 my-sm-0 fw-bold" type="submit">Search Project</button>
        </form>
      </div>
      <div class="col-6 d-flex justify-content-end">
        {{-- <a type="button" class="btn btn-success fw-bold" href="{{route('projects.create')}}">Create New project Link</a> --}}
      </div>
    </div>
    
        
    
    <table class="table table-light table-striped  mt-5 p-3">
      <thead class="table-head">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Commits</th>
          <th scope="col">Contributors</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($projects as $project)
            
        <tr class="table-dark">
          <th scope="row">{{$project->id}}</th>
          <td>{{$project->name}}</td>
          <td>{{$project->commits}}</td>
          <td>{{$project->contributors}}</td>
          <td>{{$project->description}}</td>
          <td class="text-center pt-5">
            <a class="" href="{{ route('admin.projects.show', ['project' => $project ])}}"><i class="bi bi-sliders2-vertical text-primary fs-3 "></i></a>
            <a class="" href="{{ route('admin.projects.edit', ['project' => $project ])}}"><i class="bi bi-bandaid-fill text-primary fs-3 "></i></a>
            
            
          </td>
          
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $projects->links('') }}
  </div>
@endsection

      
      
      
      

{{-- <td class="d-flex justify-content-between">
  <a class="" href="{{ route('projects.show', ['project' => $project ])}}"><i class="bi bi-sliders2-vertical text-success fs-3"></i></a>
  <a class="" href="{{ route('projects.edit', ['project' => $project ])}}"><i class="bi bi-bandaid-fill text-success fs-3"></i></a>
 
  <button class="bi bi-clipboard2-x-fill text-danger delete-icon fs-3" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$project->id}}"></button>
</td> --}}