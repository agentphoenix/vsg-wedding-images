@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="font-bold uppercase tracking-wide text-2xl mb-6">Create Post</h1>

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label class="flex mb-1 text-xs uppercase tracking-wide font-semibold text-grey-dark">Caption</label>
                <textarea name="caption" class="w-full border-2 rounded" rows="5"></textarea>
            </div>

            <div class="mb-6">
                <label class="flex mb-1 text-xs uppercase tracking-wide font-semibold text-grey-dark">Image</label>
                <upload></upload>
                {{-- <input type="file" name="media[]" class="form-control" capture="camera" multiple> --}}
            </div>

            <div>
                <button type="submit" class="w-full border-2 border-guava-dark py-4 rounded text-guava-dark font-bold uppercase tracking-wide text-sm">Create Post</button>
            </div>
        </form>
    </div>
@endsection
