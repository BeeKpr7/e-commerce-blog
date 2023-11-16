@extends('public.main')

@section('description', 'Cette exploitation gérée par Morgan Jaubert, est issue de plusieurs générations d\'expériences.
    Il a la chance de vivre dans un environnement encore épargné par diverses pollutions.')
@section('title', 'Notre histoire | Apie De Lop')

@section('content')

    <section class="firstview notreHistoire">
        <aside>
            <a href="{{ url('/') }}/"><img src="{{ url('') }}/front/images/home/logo-abeille.png"
                    alt="Logo abeille Apie de lop"></a>
            <hr>
            <p>Notre histoire</p>
        </aside>
        <article>
            <img src="{{ url('') }}/front/images/notrehistoire/firstview.png" alt="Apiculteur Récoltant Morgan Jaubert">
            <p>D'une génération à une autre </p>
            <hr>
        </article>
    </section>
    <section class="apiculteur">
        <article>
            <h3>Le Rucher Du Loup</h3>
            <hr>
            <h2>Morgan <span>Jaubert</span> </h2>
            <p>Le rucher du loup est une petite exploitation apicole, situé entre la Provence et les Alpes du sud sur la
                petite commune de Fouillouse dans les Hautes-Alpes. Cette exploitation gérée par Morgan Jaubert, est issue
                de plusieurs générations d'expériences. Il a la chance de vivre dans un environnement encore épargné par
                diverses pollutions, et nous avons plaisir à produire des miels de qualité. Nous exploitons un cheptel de
                300 colonies d'abeilles, et nous les déplaçons, suivant les saisons aux quatre coins de la région Sud-Est.
                C'est un système transhumant qui nous permet de proposer suivant les années, différents miels issus de
                différents territoires.</p>
            <p>" J'ai toujours entendu parler d'apiculture pendant les repas de familles. C'est mon grand-père, sa mère, sa
                grand-mère et son beau frère qui était lui un des premiers exploitants apicoles professionnels dans les
                Hautes-Alpes qui ont permis d'entretenir cette tradition familiale.</p>
            <p>J'ai ouvert mes premières ruches tard, vers 20 ans pour aider mon grand-père à récolter ses ruches ou encore
                faire des essaims. C'est après quelques années, en tant qu'apiculteur amateur, et après des études agricoles
                que j'ai décidé de me lancer à temps plein. Et je suis fier de produire un miel de qualité et d'entretenir
                cette tradition familiale. </p>
            <h4>C'est mon grand-père qui m'a donné le virus de l'apiculture</h4>
        </article>

        <img src="{{ url('') }}/front/images/notrehistoire/apiculteur2.png" alt="L'apiculteur">



    </section>
    <section class="timeline">
        <article>
            <div>
                <h5>2007</h5>
                <hr>
            </div>
            <div>
                <h2>Le nez dans la ruche</h2>
                <p>Mon grand-père m'a offert ma première colonie d'abeilles, et d'autres colonies suivront très vite.
                    J'obtiens cette année là mon brevet de technicien supérieur agricole en gestion des espaces naturels.
                </p>
            </div>

        </article>
        <article>
            <div>
                <h5>2008</h5>
                <hr>
            </div>
            <div>
                <h2>Deux tableaux</h2>
                <p>Je gère en amateur plusieurs dizaines de colonies, en plus de mon travail principal.</p>
            </div>

        </article>
        <article>
            <div>
                <h5>2015</h5>
                <hr>
            </div>
            <div>
                <h2>L'Apprentissage</h2>
                <p>Je continue ma formation auprès de M. Bianco éleveur de reines</p>
            </div>

        </article>
        <article>
            <div>
                <h5>2016</h5>
                <hr>
            </div>
            <div>
                <h2>Apie de Lop</h2>
                <p>Après avoir fait un stage chez M. Joseph FAURE multi médaillé au salon de l'agriculture à Paris et
                    Président du syndicat des apiculteurs des Hautes-Alpes, je décide de me lancer à plein temps.</p>
            </div>

        </article>
    </section>

@endsection
