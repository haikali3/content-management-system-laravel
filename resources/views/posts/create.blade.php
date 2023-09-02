@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{ isset($post) ? 'Edit Post' : 'Create Post' }}
    </div>

    <div class="card-body">
        <form action="{{  isset($post) ? route('posts.update', $post->id) : route('posts.store')}}"  method="POST" enctype="multipart/form-data">
            @csrf

            @if (isset($post))
                @method('PUT')
            @endif

            <div class="form-group mb-2">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ isset($post) ? $post->title:'' }}">
            </div>

            <div class="form-group mb-2">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols=5" rows="5" class="form-control">
                    {{ isset($post) ? $post->description:'' }}
                </textarea>
            </div>
            <div class="form-group mb-2">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content:'' }}">
                <trix-editor input="content"></trix-editor>
            </div>

            <div class="form-group mb-2">
                <label for="published_at">Published  at</label>
                <input type="text" class="form-control" name="published_at" id="published_at" value="{{ isset($post) ? $post->published_at:'' }}">
            </div>

            @if (isset($post))
                <div class="form-group">
                    <img src="{{ asset($post->image) }}" alt="" style="width: 30%">
                </div>
            @endif
            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($post) ? 'Update Post' : 'Create Post' }}
                </button>

            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#published_at", {
            enableTime: true,
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
