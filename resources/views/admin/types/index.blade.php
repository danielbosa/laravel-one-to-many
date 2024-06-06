@extends('layouts.admin')
@section('title', 'Types')

@section('content')
<section id='index'>
    @if(session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center py-4">
        <h1>Types</h1>
        <a href="{{route('admin.types.create')}}" class="btn btn-danger">Create new type</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col" class="d-none d-md-block">Slug</th>
                <th scope="col" class="">Created At</th>
                <th scope="col" class="">Update At</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($types as $type)
            <tr>
                <td>{{$type->id}}</td>
                <td>{{$type->name}}</td>
                <td class="col-slug d-none d-md-block">{{$type->slug}}</td>
                <td class="">{{$type->created_at}}</td>
                <td class="">{{$type->updated_at}}</td>
                <td>
                    <a href="{{route('admin.types.show', $type->slug)}}" title="Show" class="text-black px-2"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.types.edit', $type->slug)}}" title="Edit" class="text-black px-2"><i class="fa-solid fa-pen"></i></a>
                    <form action="{{route('admin.types.destroy', $type->slug)}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        {{--
                            bottone ha classe delete-button perché mi serve per JS! Non per lo stile-scss
                            C'è anche attributo data-item-title --> è attributo che poi vado a mostrare nella modale!
                            --}}
                        <button type="submit" class="delete-button border-0 bg-transparent"  data-item-title="{{ $type->name }}">
                        <i class="fa-solid fa-trash"></i>
                        </button>

                    </form>


                </td>
                </tr>
            @endforeach


            </tbody>
        </table>
</section>
{{ $types->links('vendor.pagination.bootstrap-5') }}
@include('partials.modal-delete')
@endsection