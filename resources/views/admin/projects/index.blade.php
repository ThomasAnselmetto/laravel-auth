@extends('layouts.app')
@section('cdn')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css"> 
@endsection
@section('content')

@if (session('message'))
<div class="alert alert-danger">
    {{ session('message') }}
</div>
@endif
  <div class="container">
    @section('title')
    <h1 class="mt-4 mb-5">Projects List</h1>
    @endsection
    
    <div class="row">
     
      <div class="col-12 d-flex justify-content-end">
        <a type="button" class="btn btn-success fw-bold" href="{{route('admin.projects.create')}}">Create New project Link</a>
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
          <td class="description">{{$project->getAbstract()}}</td>
          <td class="d-flex flex-column align-items-center justify-content-between">
            <a class="" href="{{ route('admin.projects.show', ['project' => $project ])}}"><i class="bi bi-aspect-ratio-fill text-primary fs-3 "></i></a>
            <a class="" href="{{ route('admin.projects.edit', ['project' => $project ])}}"><i class="bi bi-pencil text-primary fs-3 "></i></a>
            <button class="bi bi-clipboard2-x-fill text-danger delete-icon fs-3" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$project->id}}"></button>
            
            
          </td>
          
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $projects->links('') }}
  </div>


  @section('modals')
@foreach($projects as $project)
<div class="modal fade" id="delete-modal-{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-4  fw-bold" id="exampleModalLabel">Attention</h1>

        {{-- per i button possiamo usare i tooltips 
          <button type="button" class="btn btn-secondary"
        data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-custom-class="custom-tooltip"
        data-bs-title="This top tooltip is themed via CSS variables.">
  Custom tooltip
</button> --}}


        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-2 fw-bold">
        Are you sure you want to delete the project with Name {{$project->name}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info text-light border fw-bold" data-bs-dismiss="modal">Close</button>
        <form class="" action="{{ route('admin.projects.destroy', ['project' => $project ])}}" method="POST">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger border fw-bold">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection 

@endsection

      
      
      
      

{{-- <td class="d-flex justify-content-between">
  <a class="" href="{{ route('projects.show', ['project' => $project ])}}"><i class="bi bi-sliders2-vertical text-success fs-3"></i></a>
  <a class="" href="{{ route('projects.edit', ['project' => $project ])}}"><i class="bi bi-bandaid-fill text-success fs-3"></i></a>
 
  <button class="bi bi-clipboard2-x-fill text-danger delete-icon fs-3" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$project->id}}"></button>
</td> --}}