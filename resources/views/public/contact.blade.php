@extends('public.main')

@section('description', 'Par téléphone, email ou encore sur les marchées n\'hésitez pas à nous contactez.')
@section('title', 'Contactez-Nous | Apie De Lop')
@section('link')
    {!! RecaptchaV3::initJs() !!}
@endsection
@section('content')
    <section class="firstview contact">
        <aside>
            <a href="{{ url('/') }}/"><img src="{{ url('') }}/front/images/home/logo-abeille.png"
                    alt="Logo abeille Apie de lop"></a>

            <hr>
            <p>Contact</p>
        </aside>
        <img src="{{ url('') }}/front/images/contact/firstview.png" alt="Firstview contact">
    </section>

    <section class="coordonee">
        <article>
            <h3>En direct de l'apiculteur</h3>
            <hr>
            <h2>Morgan <strong>Jaubert</strong></h2>
            <ul>
                <li><img src="{{ url('') }}/front/images/contact/adresse.png" alt="Icone Adresse"><a
                        href="https://goo.gl/maps/rU3utbMou6EZT1aV6" target="_blank">1679 Route des Andrieux 05130
                        Fouillouse</a></li>
                <li><img src="{{ url('') }}/front/images/contact/email.png" alt="Icone email"><a
                        href="mailto:pioc.ppc@gmail.com">pioc.ppc@gmail.com</a></li>
                <li><img src="{{ url('') }}/front/images/contact/telephone.png" alt="Icone phone"><a
                        href="tel:+33781082744">0781082744</a></li>
            </ul>
        </article>
        <article>
            <h3>Retrouvez-nous</h3>
            <hr>
            <h2>Marchés de producteurs <strong>de Pays</strong></h2>
            <ul>
                <li><img src="{{ url('') }}/front/images/contact/alveole.png" alt="Alvéolle d'abeille"><a
                        href="https://goo.gl/maps/wfnqMrSNChuW7AV4A"><strong>Gap</strong> </a> De Juillet à octobre / Samedi
                    matin</li>
                <li><img src="{{ url('') }}/front/images/contact/alveole.png" alt="Alvéolle d'abeille"><a
                        href="https://goo.gl/maps/wfnqMrSNChuW7AV4A"> <strong>Orcières</strong></a> De Janvier à Mars /
                    Mercredi matin</li>
                <li><img src="{{ url('') }}/front/images/contact/alveole.png" alt="Alvéolle d'abeille"><a
                        href="https://goo.gl/maps/wfnqMrSNChuW7AV4A"> <strong>Les orres</strong></a> De Janvier à Mars /
                    Mardi matin</li>
            </ul>
        </article>
        <form id="formMessage" onsubmit="validate()" class="form-container">
            <h4>Écrivez-nous</h4>
            <p>L'apiculture est un métier très incertain, donc suivant les années, des miels que nous produisons d'habitude
                ne serons pas
                disponible, et des miels que nous faisons très rarement peuvent être produits. Vous pouvez nous commander du
                miel par téléphone ou par mail.</p>

            <div>
                <label for="name">Nom</label>
                <input placeholder="Nom" type="text" id="name" name="name">
                <span class="errors"></span>
            </div>
            <div>
                <label for="firstName">Prénom</label>
                <input placeholder="Prénom" type="text" id="firstName" name="firstName">
                <span class="errors"></span>
            </div>
            <div>

                <label for="mail">E-mail</label>
                <input placeholder="E-mail" type="text" id="email" name="email">
                <span class="errors"></span>
            </div>
            <div>
                <label for="phone">Téléphone</label>
                <input placeholder="Téléphone" type="text" id="phone" name="phone">
                <span class="errors"></span>
            </div>
            <div style="width:100%;">
                <label for="message">Message</label>
                <textarea placeholder="Votre message ..." type="text-area" id="message" name="message"></textarea>
                <span class="errors"></span>
            </div>
            {{-- GOOGLE RECAPTCHA --}}
            {!! RecaptchaV3::field('register') !!}

            <aside id="errorsAjax"></aside>
            <button type="submit" value="submit" id="submit">ENVOYER</button>


        </form>
        <div id="sendingMessage" class="contactForm">

            <h4><img src="{{ url('') }}/front/images/contact/email.png" alt=""> ... Message en cours d'envoie
            </h4>
        </div>
        <div id="confirmMessage" class="contactForm">
            <h4>Votre message a bien été envoyé ! </h4>
            <p>Nous vous contacteron dans les plus bref délais afin de répondre à vos questions.</p>
            <h4>Merci de votre visite <span id="nomPrenom"></span></h4>
        </div>
    </section>
@section('scripts')
    <script></script>
@endsection
@endsection
