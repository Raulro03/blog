<x-layout meta-title="Blog" meta-description="Descripcion de la pagina de Blog">
    <h1>Blog</h1>
    @foreach($posts as $post)
    <h2>{{ $post['title'] }}</h2>
    @endforeach
</x-layout>
