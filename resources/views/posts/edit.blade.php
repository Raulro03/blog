<x-layout :meta-title="$post->title" :meta-description="$post->body">

    <h1> Edit Post </h1>
    <a href="{{ route('posts.index') }}">{{__("Back")}}</a>
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PATCH')

        @include('posts.form-fields')

    </form>
</x-layout>


