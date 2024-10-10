<x-layout meta-title="Create a new Post" meta-description="Create a new Post">


    <h1> Create a new Post </h1>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <label>
            Title<br />
            <input type="text" name="title">
        </label>
        <br />
        <label>

            Body <br />
            <textarea name="body"></textarea>
        </label>
        <br />
        <label>
            <button type="submit">Send</button>
        </label>

    </form>
    <a href="{{ route('posts.index') }}"></a>
</x-layout>
