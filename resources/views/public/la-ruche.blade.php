@extends('public.main')

@section('description',
    'La miellerie de Morgan Jaubert, apiculteur récoltant, situé à Fouillouse dans les
    Hautes-Alpes')
@section('title', 'La ruche | Apie De Lop')
@section('link')
    <script src="{{ url('') }}/front/js/mielsModal.js" defer></script>
@endsection
@section('content')

    <section class="firstview firstviewAjust ">
        <aside>
            <a href="{{ url('/') }}/"><img src="{{ url('') }}/front/images/home/logo-abeille.png"
                    alt="Logo abeille Apie de lop"></a>
            <hr>
            <p>La ruche</p>
        </aside>
        <article>
            <img src="{{ url('') }}/front/images/blog/first-view.jpg" alt="Apiculteur Récoltant Morgan Jaubert">
            <p>L'incroyable activitée des abeilles</p>
            <hr>
        </article>
    </section>
    <!-- Search -->
    <div class="search">
        <select name="" id="category">
            @if (request('category'))
                <option value="{{ route('laruche') }}">{{ __('post.infos.all') }}</option>
            @else
                <option value="{{ route('laruche') }}" selected>{{ __('post.infos.category') }}</option>
            @endif
            @foreach (App\Models\Category::all() as $category)
                <option
                    value="{{ route('laruche') }}/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
                    @if ($category->slug == request('category')) selected @endif>
                    {{ $category->name }}

                </option>
            @endforeach
        </select>
        <form method="GET" action="{{ route('laruche') }}">
            <input type="hidden" name="category" value="{{ request('category') }}">
            <input type="text" name="search" placeholder="{{ __('form.button.search') }}"
                class="text-sm font-semibold placeholder-black bg-transparent border-none focus:outline-none focus:ring-0"
                value="{{ request('search') }}">
        </form>
    </div>

    <section class="la-ruche">
        @if ($posts->count() == 0)
            <p class="text-center">{{ __('post.infos.no-posts') }}</p>
            <a href="{{ route('laruche') }}">{{ __('post.infos.back-blog') }}</a>
        @else
            @foreach ($posts as $post)
                <article>
                    <img @if (!str_contains($post->image, 'http')) src="{{ asset('storage/' . $post->image) }}" 
                @else
                    src="{{ $post->image }}" @endif
                        alt="{{ $post->title }}">
                    <h1>{{ $post->title }}</h1>
                    <div>
                        @if (str_contains($post->excerpt, '<p>'))
                            {!! $post->excerpt !!}
                        @else
                            <p>{{ $post->excerpt }}</p>
                        @endif
                    </div>
                    <a href="{{ route('posts.show', $post) }}">{{ __('post.infos.read-more') }}</a>
                </article>
            @endforeach
            {{ $posts->links() }}
        @endif
    </section>
    <section class="saviezvous">
        <img src="{{ url('') }}/front/images/laruche.jpg" alt="Abeille posé sur de la cire">
        <article>
            <h3>Le Rucher Du Loup</h3>
            <hr>
            <h2><span>Le saviez</span>-vous ? </h2>
            <p>Les abeilles sont capable de reconnaitre les formes, les couleurs mais aussi de compter.</p>
            <p>Cela leur permet de se reparer dans la nature pendant leur déplacement.</p>
            <p>Une ruche bien décoré aec différentes forme et couleur permet aux abeilles de ne pas se perdre <span>entre
                    deux ruches</span>.</p>
        </article>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#category").change(function() {
                window.location = $(this).val();
            });
        });
    </script>
@endsection
