<x-layout meta-title="Create a new Post" meta-description="Create a new Post">

    <h1> {{ __('Create a new Post') }} </h1>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        @include('posts.form-fields')

    </form>
    <a href="{{ route('posts.index') }}">{{__("Back")}}</a>
</x-layout>
