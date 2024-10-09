<x-layout meta-title="Blog" meta-description="Descripcion de la pagina de Blog">
    <h1>Blog</h1>
    @foreach($posts as $post)
    <h2><a href="/blog/{{ $post->id }}">{{ $post->title }}</a> </h2> <!--Flecha porque al pedir datos de una base de datos lo devuelve como objeto entonces
    pasamos de $post['title'] que serua para una array a lo otro que es para objeto-->
    @endforeach
</x-layout>
