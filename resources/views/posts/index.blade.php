<x-blog-layout meta-title="Blog" meta-description="Descripcion de la pagina de Blog">
    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-4 text-center font-serif text-4xl font-extrabold text-sky-600 md:text-5xl">
            Blog
        </h1>
            @auth()
                <div class="flex items-center justify-center">
                    <a
                        href="{{ route('posts.create') }}"
                        class="group rounded-full bg-sky-600 p-2 text-sky-100 shadow-lg duration-300 hover:bg-sky-700 active:bg-sky-800"
                    >
                        <svg
                            class="h-6 w-6 duration-300 group-hover:rotate-12"
                            data-slot="icon"
                            fill="none"
                            stroke-width="1.5"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 4.5v15m7.5-7.5h-15"
                            ></path>
                        </svg>
                    </a>
                </div>
            <div class="flex items-center justify-left">
                <a
                    href="{{ route('posts.my-posts') }}"
                    class="group rounded-full bg-sky-600 p-2 text-sky-100 shadow-lg duration-300 hover:bg-sky-700 active:bg-sky-800"
                >
                    <button>Mis Posts</button>
                </a>
            </div>
            @endauth

        <!-- Formulario para el order en el que se muestra segun su publicacion -->
        <form class="mt-4" action="{{ route('posts.index') }}" method="GET">

                <label class=" text-xl font-semibold leading-tight text-slate-800 dark:text-slate-200" for="order">Ordenar por fecha de publicación:</label>
                <select class="rounded-2xl bg-sky-600 p-2 text-sky-100 " name="order" id="order" onchange="this.form.submit()">
                    <option value="" {{ request('order') == '' ? 'selected' : '' }}>Sin Ordernar</option>
                    <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Más recientes primero</option>
                    <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Más antiguos primero</option>
                </select>
            <!--Para mantener la opcion de search-->
            <input type="hidden" name="search" value="{{ request('search') }}">
            <input type="hidden" name="category" value="{{request("category")}}">
        </form>

        <form class="mt-4 float-left" action="{{ route('posts.index') }}" method="GET">
            <!-- Formulario para buscar por titulo -->
            <p class=" text-xl font-semibold leading-tight text-slate-800 dark:text-slate-200 float-left">Dime el titulo del post: </p>
            <x-text-input name="search" id="search" value="{{ request('search') }}" ></x-text-input>

            <!--Para mantener la opcion de order-->
            <input type="hidden" name="order" value="{{ request('order') }}">
            <input type="hidden" name="category" value="{{request("category")}}">

            <button type="submit" class="rounded-2xl bg-sky-600 p-2 text-sky-100 ml-2">Buscar</button>
        </form>

        <form class="mt-4 text-right" action="{{ route('posts.index') }}" method="GET">

            <label class=" text-xl font-semibold leading-tight text-slate-800 dark:text-slate-200" for="category">Categorias:</label>
            <select class="rounded-2xl bg-sky-600 p-2 text-sky-100 " name="category" id="category" onchange="this.form.submit()">
                <option value="" {{ request('category') == '' ? 'selected' : '' }}>Sin Ordernar</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{ request('category') == $category->id ? "selected" : "" }}>{{$category->name}}</option>
                @endforeach
            </select>
            <!--Para mantener la opcion de search-->
            <input type="hidden" name="search" value="{{ request('search') }}">
            <input type="hidden" name="order" value="{{ request('order') }}">
        </form>


            <div
                class="mx-auto mt-8 grid max-w-6xl gap-4 md:grid-cols-2 lg:grid-cols-3"
            >

                @foreach($posts as $post)
                    <article
                        class="flex flex-col overflow-hidden rounded bg-white shadow dark:bg-slate-900"
                    >
                        {{--<div class="h-52">
                            <a
                                class="duration-300 hover:opacity-75"
                                href="/article.html"
                            >
                                <img
                                    class="h-full w-full object-cover object-center"
                                    src="/img/article-1.jpg"
                                    alt="Boost your conversion rate"
                                />
                            </a>
                        </div>--}}
                        <div class="flex-1 space-y-3 p-5">
                            {{--<h3 class="text-sm font-semibold text-sky-500">
                                Desk and Office
                            </h3>--}}
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
                            <div>
                                <img
                                    class="h-6 w-6 rounded-full float-left mr-5"
                                    src="https://ui-avatars.com/api?name={{ $post->user->name . " " .  $post->user->last_name }}"
                                    alt="{{ $post->user->name . " " .  $post->user->last_name }}"/>

                                <p
                                    class=" text-slate-500 dark:text-slate-400 md:block"
                                >
                                    {{ $post->user->name . " " .  $post->user->last_name}}
                                </p>
                            </div>

                        </div>
                        {{--<div class="flex space-x-2 p-5">
                            <img
                                class="h-10 w-10 rounded-full"
                                src="https://ui-avatars.com/api?name=Roel Aufderehar"
                                alt="Roel Aufderehar"
                            />
                            <div class="flex flex-col justify-center">
                                <span
                                    class="text-sm font-semibold leading-4 text-slate-600 dark:text-slate-400"
                                >
                                    Roel Aufderehar
                                </span>
                                <span class="text-sm text-slate-500">
                                        Mar 16, 2023
                                </span>
                            </div>
                        </div>--}}
                    </article>

                @endforeach

            </div>

        </div>
    <div class="d-flex mt-3 px-6 justify-content-center">
        {{ $posts->links() }}
    </div>

</x-blog-layout>
