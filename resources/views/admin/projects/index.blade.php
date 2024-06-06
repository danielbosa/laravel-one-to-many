@extends('layouts.admin')
@section('title', 'Projects')

@section('content')
<section id='index'>
    @if(session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center py-4">
        <h1>Projects</h1>
        <a href="{{route('admin.projects.create')}}" class="btn btn-danger">Create new project</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col" class="d-none d-md-block">Slug</th>
                <th scope="col" class="">Created At</th>
                <th scope="col" class="">Update At</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->title}}</td>
                <td class="col-slug d-none d-md-block">{{$project->slug}}</td>
                <td class="">{{$project->created_at}}</td>
                <td class="">{{$project->updated_at}}</td>
                <td>
                    <a href="{{route('admin.projects.show', $project->slug)}}" title="Show" class="text-black px-2"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.projects.edit', $project->slug)}}" title="Edit" class="text-black px-2"><i class="fa-solid fa-pen"></i></a>
                    <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        {{--
                            bottone ha classe delete-button perché mi serve per JS! Non per lo stile-scss
                            C'è anche attributo data-item-title --> è attributo che poi vado a mostrare nella modale!
                            --}}
                        <button type="submit" class="delete-button border-0 bg-transparent"  data-item-title="{{ $project->title }}">
                        <i class="fa-solid fa-trash"></i>
                        </button>

                    </form>


                </td>
                </tr>
            @endforeach


            </tbody>
        </table>
</section>
{{ $projects->links('vendor.pagination.bootstrap-5') }}
@include('partials.modal-delete')
@endsection