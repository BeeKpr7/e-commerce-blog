@extends('public.main')

@section('description',
    'Cette exploitation gérée par Morgan Jaubert, issue de plusieurs générations
    d\'expériences, propose tout un éventail de miel issue de différent territoir.')
@section('title', 'Apiculteur Récoltant')

@section('content')


    <section class="firstview">
        <aside>
            <a href="{{ route('home') }}"><img src="{{ url('') }}/front/images/home/logo-abeille.png"
                    alt="Logo abeille Apie de lop"></a>
            <hr>
            <p>Miellerie 100% Artisanale</p>
        </aside>
        <article>
            <img src="{{ url('') }}/front/images/home/firstview.png" alt="Apiculteur Récoltant Morgan Jaubert">
            <a href="{{ route('lamiellerie') }}"">La miellerie</a>
            <a href="{{ route('contact') }}">Contactez-Nous</a>
        </article>
    </section>

    <section class="miellerie">
        <article>
            <h3>Le Rucher du Loup</h3>
            <hr>
            <h2><span>Entre Provence </span>et Alpes du Sud</h2>
            <p>Le rucher du loup est une petite exploitation apicole, situé entre <span>la Provence et les Alpes du
                    sud</span> sur
                la petite commune de Fouillouse dans les Hautes-Alpes. Cette exploitation gérée par Morgan Jaubert, est
                issue de <span> plusieurs générations
                    d'expériences</span>. Il a la chance de vivre dans un environnement encore épargné par diverses
                pollutions, et nous avons
                plaisir à produire des miels de qualité.</p>
            <p>Nous exploitons un cheptel de 300 colonies d'abeilles, et nous les déplaçons, suivant les saisons aux quatre
                coins de la région Sud-Est. <span>C'est un système transhumant</span> qui nous permet de proposer suivant
                les années, différents miels issus de différents territoirs.</p>
            <a href="{{ route('lamiellerie') }}">En savoir plus</a>
            <hr>
        </article>
        <img src="{{ url('') }}/front/images/home/alveole-illu.png"
            alt="Récoltes de miel de montagne Ruches Apiculteur">
    </section>

    <section class="francais">

        <article>
            <h3>Le Rucher Du Loup</h3>
            <img src="{{ url('') }}/front/images/home/france-flag.png" alt="Récoltes du miel de lavandes">
            <h2>Notre miel est labellisé Hautes-Alpes naturellement et IGP Provence</h2>
            <p>Nous sommes dans un système ou nous vendons notre miel en vrac, en semi-gros et au détail. Nous avons la
                chance et le plaisir d'être dans un environnement qui nous permet de produire des miels d'exceptions: <span>
                    Romarin, Thym, Bruyère, Serpolet, Framboisier, Acacia, Châtaignier, Montagne et de Haute-montagne et
                    Lavande.</span></p>
            <a href="{{ route('notrehistoire') }}">En savoir plus</a>
        </article>
    </section>

    <section class="marcher">
        <article>
            <img src="{{ url('') }}/front/images/home/montagne1.png" alt="Masif du Dévoluy">
            <img src="{{ url('') }}/front/images/home/cadremiel.png" alt="Désopercule d'un carde">
            <img src="{{ url('') }}/front/images/home/apiculteur.png" alt="Récoltes d'une ruche">
        </article>
        <article>
            <h3>Le Rucher Du Loup</h3>
            <hr>
            <h2><span>Agriculture locale à échelle humaine</span> Et vente directe</h2>
            <p>Nous avons plaisir à nous insérer dans <span>l'activité locale</span>, par le biais d'événements syndicat, et
                <span>de vente directe</span>. Nous sommes sur le marché de Gap tous les samedis matin, et suivant les
                années sur les marchés: "Les Orres" , "la Joue du Loup". Nous collaborons aussi avec la chambre
                d'agriculture des Hautes-Alpes dans le carde du label <span>Hautes-Alpes naturellement</span>.
            </p>
            <p>Vous pouvez trouvez nos produits grâce à des commerçants locaux comme le magasin "Fromages et Traditions" à
                Crots, "Mon Paysan Alpin" à Veynes, le restaurant "Les Olivades" à Gap, et "Le Panier des Aiguilles" à
                Réallon.</p>
            <a href="{{ route('contact') }}">En savoir plus</a>
            <hr>
        </article>
    </section>
@endsection
