<x-layout meta-title="Blog" meta-description="Descripcion de la pagina de Blog">

    <h1>Blog</h1>
    <a href="{{ route('posts.create') }}">Create a new Posts</a>
    @foreach($posts as $post)
        <div style="display: flex; align-items: baseline">
            <h2>
                <a href="{{ route('posts.show',$post) }}">{{ $post->title }}</a>
            </h2>
            <a href="{{ route('posts.edit', $post) }}">Edit</a>
        </div>
    @endforeach
</x-layout>
