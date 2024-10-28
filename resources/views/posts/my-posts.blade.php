<x-blog-layout meta-title="Mis Posts" meta-description="Posts asociados a mi usuario">
    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-4 text-center font-serif text-4xl font-extrabold text-sky-600 md:text-5xl">
            Mis Posts
        </h1>
        <div
            class="mx-auto mt-8 grid max-w-6xl gap-4 md:grid-cols-2 lg:grid-cols-3"
        >
            @foreach($posts as $post)
                <article
                    class="flex flex-col overflow-hidden rounded bg-white shadow dark:bg-slate-900"
                >

                    <div class="flex-1 space-y-3 p-5">

                        <h2
                            class="text-xl font-semibold leading-tight text-slate-800 dark:text-slate-200"
                        >
                            <a class="hover:underline" href="{{ route('posts.show', $post) }}">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <p
                            class="hidden text-slate-500 dark:text-slate-400 md:block"
                        >
                            {{ $post->body }}
                        </p>
                        <p
                            class="hidden text-slate-500 dark:text-slate-400 md:block"
                        >
                            {{ $post->published_at }}
                        </p>
                    </div>

                </article>
            @endforeach
        </div>
    </div>
</x-blog-layout>
