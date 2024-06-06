@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center py-4">
            <h2>Edit project: {{$project->title}}</h2>
            <a href="{{route('admin.projects.show', $project->slug)}}" class="btn btn-danger">Show Project</a>
        </div>

        <form action="{{ route('admin.projects.update', $project->slug)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $project->title) }}" minlength="3" maxlength="200" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                {{-- <div id="titleHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div> --}}
            </div>
            
            {{-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 
                Preview block 
            !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! --}}
            <div class="media me-4">
                @if($project->image)
                <img class="shadow" width="150" src="{{asset('storage/' . $project->image)}}" alt="{{$project->title}}" id="uploadPreview">
                @else
                <img class="shadow" width="150" src="/images/logoDB.png" alt="{{$project->title}}" id="uploadPreview">
                @endif
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $project->image) }}" maxlength="255">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">Url</label>
                <input type="url" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url', $project->url) }}" maxlength="255">
                @error('url')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" required>
                {{ old('content') }}
                </textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> --}}
            <div class="mb-3">
                <button type="submit" class="btn btn-danger">Save</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>


    </section>

@endsection