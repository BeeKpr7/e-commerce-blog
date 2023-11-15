@extends('public.main')

@section('description',
    'Nous produisons des cuvées d\'exception que nous mettons en pots, suivant une technique qui
    rend le miel ultra crémeux.')
@section('title', 'La Miellerie | Apie De Lop')
@section('link')
    <script src="{{ url('') }}/front/js/mielsModal.js" defer></script>
    @livewireStyles
@endsection
@section('content')

    <section class="firstview firstviewAjust ">
        <aside>
            <a href="{{ url('/') }}/"><img src="{{ url('') }}/front/images/home/logo-abeille.png"
                    alt="Logo abeille Apie de lop"></a>
            <hr>
            <p>La miellerie</p>
        </aside>
        <article>
            <img src="{{ url('') }}/front/images/miellerie/firstview.png" alt="Apiculteur Récoltant Morgan Jaubert">
            <p>Miel récolté avec 100% d'Amour</p>
            <hr>
        </article>
    </section>
    <section class="description">
        <article>
            <h3>Le Rucher Du Loup</h3>
            <hr>
            <h2><span>Entre Alpes du sud</span> et Provence</h2>
            <p>Nous vendons une partie de notre production en vrac, à la coopérative "Provence Miel" où il est analysé et
                labellisé IGP Provence.
                Mais nous produisons aussi des cuvées d'exception que nous mettons en pots, suivant une technique qui rend
                le miel ultra crémeux.
                Nous récoltons certaines années dans le Var du miel de romarin et du miel de bruyère blanche.</p>
            <p>Plus tard dans la saison, nous produisons du miel toutes fleurs de montagne dans le magnifique département
                des <span>Hautes-Alpes</span>, mais aussi
                du miel d'acacia, du tilleul et du châtaignier dans les fôrets humides de la région
                <span>Rhône-Alpes</span>.
            </p>
            <p>Quelquefois, nous arrivons à récolter des cuvées rares telles que le miel de serpolet (thym de montagne) ou
                encore du miel de framboisier sur
                des sites d'exception aux bordures <span>du parc national des Écrins</span> , dans la vallée du Dévoluy,
                Haut-Buëch.
                Et comme la plupart des apiculteurs travaillant dans cette zone géographique, nous avons la chance de
                pouvoir produire un miel de lavande
                de grande qualité sur des emplacements situés sur le plateau de <span>Valensole et la montagne de
                    Lure</span>.</p>
        </article>

        <img src="{{ url('') }}/front/images/miellerie/miel.png" alt="Miel de lavande">
    </section>
    <section class="produits">
        <h3>Le Rucher Du Loup</h3>
        <hr>
        <h2><span>Découvrez</span> nos Miels</h2>
        <p>L'apiculture est un métier très incertain, donc suivant les années, des miels que nous produisons d'habitude ne
            seront pas
            disponible, et des miels que nous faisons très rarement, peuvent être produits. Vous pouvez nous commander du
            miel par téléphone ou par mail.
        </p>
        <p>Voici les miels que nous proposons :
        </p>
        {{-- @foreach ($articles as $article)
            <article>
                <a href="{{route('pages.article',$article->slug)}}" id="overlay"></a>
                <img src="{{url('')}}/{{$article->image}}" title="{{$article->title_img}}" alt="{{$article->alt_img}}">
                <h6>{{$article->theme}}</h6>
                <p>{{$article->title}}</p>
                <a href="{{route('pages.article',$article->slug)}}">En savoir plus</a>
            </article>
        @endforeach --}}
        <section class="miel">
            @foreach ($products as $product)
                <article x-data="{ test(id) { console.log('clicked ' + id) } }" @click="test({{ $product->id }})">
                    <img @if (!str_contains($product->image, 'http')) src="{{ asset('storage/' . $product->image) }}" 
                @else
                    src="{{ $product->image }}" @endif
                        alt="{{ $product->name }}">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                </article>
            @endforeach
        </section>

    </section>
    <section class="saviezvous">
        <img src="{{ url('') }}/front/images/miellerie/abeille-cire2.png" alt="Abeille posé sur de la cire">
        <article>
            <h3>Le Rucher Du Loup</h3>
            <hr>
            <h2><span>Le saviez</span>-vous ? </h2>
            <p>La cristallisation du miel est un procédé naturel, le miel mit frais en pots peut cristalliser de différentes
                façons, allant du ressenti d'un léger grain de sable sous le palet jusqu'à de gros grumeaux.</p>
            <p>Par tradition nous avons opté pour la cristallisation mécanique suivant un <span>savoir-faire
                    spécifique</span> basé sur le malaxage du miel.</p>
            <p>Notre miel est donc ce que l'on appelle : crémeux, c'est une façon de travailler le miel dans notre région et
                nous sommes fiers de <span>perpétuer ces traditions</span> .</p>
        </article>
    </section>
@endsection
@section('scripts')
    @livewireScripts
@endsection
