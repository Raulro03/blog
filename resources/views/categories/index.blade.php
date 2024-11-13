<x-blog-layout meta-title="Blog Categorias" meta-description="Categorias del Blog">
    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-4 text-center font-serif text-4xl font-extrabold text-sky-600 md:text-5xl">
            Blog Categorias
        </h1>
            @auth()
                <div class="flex items-center justify-center">
                    <a
                        href="{{ route('categories.create') }}"
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
            @endauth

        <!-- Formulario para el order en el que se muestra segun su creacion -->
        <form class="mt-4" action="{{ route('categories.index') }}" method="GET">

                <label class=" mr-3 text-xl font-semibold leading-tight text-slate-800 dark:text-slate-200" for="order">Ordenar por fecha de creacion:</label>
                <select class="rounded-2xl bg-sky-600 p-2 text-sky-100 " name="order" id="order" >
                    <option value="" {{ request('order') == '' ? 'selected' : '' }}>Sin Ordernar</option>
                    <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Más recientes primero</option>
                    <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Más antiguos primero</option>
                </select>

                <br><br>

            <!-- Formulario para buscar por titulo -->
            <p class="mr-3 text-xl font-semibold leading-tight text-slate-800 dark:text-slate-200 float-left">Dime el nombre de la categoria: </p>
            <x-text-input name="search" id="search" value="{{ request('search') }}" ></x-text-input>

            <button type="submit" class="rounded-2xl bg-sky-600 p-2 text-sky-100 ml-2">Buscar</button>
        </form>

            <div
                class="mx-auto mt-8 grid max-w-6xl gap-4 md:grid-cols-2 lg:grid-cols-3"
            >

                @foreach($categories as $category)
                    <article
                        class="flex flex-col overflow-hidden rounded bg-white shadow dark:bg-slate-900"
                    >

                        <div class="flex-1 space-y-3 p-5">

                            <h2
                                class="text-xl font-semibold leading-tight text-slate-800 dark:text-slate-200"
                            >
                                <a class="hover:underline" href="{{ route("categories.show", $category) }}">
                                    {{ $category->name }}
                                </a>
                            </h2>
                            <p
                                class="hidden text-slate-500 dark:text-slate-400 md:block"
                            >
                                {{ $category->description }}
                            </p>
                            <p
                                class="hidden text-slate-500 dark:text-slate-400 md:block"
                            >
                                {{ $category->created_at->diffForHumans() }}
                            </p>

                        </div>

                    </article>

                @endforeach

            </div>

        </div>
    <div class="d-flex mt-3 px-6 justify-content-center">
        {{ $categories->links() }}
    </div>

</x-blog-layout>
