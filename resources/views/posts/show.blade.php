@extends('public.main')
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

    <article class="show-article">
        <a href="{{ route('laruche') }}">{{ __('post.infos.back-blog') }}</a>
        <h1>{{ $post->title }}</h1>
        <hr>
        <div class="content">
            <figure class="">
                <img
                    @if (!str_contains($post->image, 'http')) src="{{ asset('storage/' . $post->image) }}"
                    @else
                        src="{{ $post->image }}" @endif />
                <figcaption class="">
                    {{ __('post.infos.published') }} <time>{{ $post->created_at->diffForHumans() }}</time>
                </figcaption>
            </figure>
            <div class="body">
                {!! $post->body !!}
            </div>
            <div class="category">
                @foreach ($post->categories as $category)
                    <a href="{{ route('laruche') }}/?category={{ $category->slug }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        {{-- <div class="">
                <div class="">
                    <a href="{{ route('laruche') }}" class="">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>
                        {{ __('post.infos.back-blog') }}
                    </a>

                    <div class="space-x-2">
                        <x-category-button :category="$post->category" />
                    </div>
                </div>
            </div> --}}
        <div class="author">
            <img src="https://i.pravatar.cc/150?u={{ $post->author->id }}" alt="Lary avatar">

            <a href="{{ route('laruche') }}/?author={{ $post->author->username }}">
                <h5 class="">{{ $post->author->name }}</h5>
            </a>

        </div>

    </article>


    <x-post.comment :comments="$post->comments" :post="$post" />
@endsection
