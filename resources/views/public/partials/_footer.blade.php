  <article class="contacter @if (Route::currentRouteName() == 'contact') hidden @endif">
      <h3>Le Rucher Du Loup</h3>
      <hr>
      <h2><span>Merci de votre visite</span></h2>
      <p>C'est avec plaisir que nous vous <span>accueillerons sur les marchés</span> ou sur notre exploitation situé à
          Fouillouse. N'hésitez pas à nous contacter, nous nous ferons un plaisir de répondre à votre demande.</p>
      <a href="{{ route('contact') }}">Contactez nous</a>
  </article>

  <footer class="@if (Route::currentRouteName() == 'contact') contact-footer @endif">

      <a href="{{ route('home') }}"><img src="{{ url('/') }}/front/images/footer/logo.png"
              alt="Apie de lop Logo "></a>

      <nav>
          <a href="{{ route('home') }}/">Accueil</a>
          <a href="{{ route('notrehistoire') }}">Notre histoire</a>
          <a href="{{ route('lamiellerie') }}">La miellerie</a>
          <a href="{{ route('contact') }}">Nous contacter</a>
      </nav>
      <img src="{{ url('/') }}/front/images/footer/abeille.png" alt="Abeille logo">
      <ul>
          <li><img src="{{ url('/') }}/front/images/footer/email.png" alt="icone adresse"> <a
                  href="mailto:pioc.ppc@gmail.com">pioc.ppc@gmail.com</a> </li>

          <li><img src="{{ url('/') }}/front/images/footer/adresse-postal.png" alt="icone adresse"><a
                  href="https://goo.gl/maps/rU3utbMou6EZT1aV6" target="_blank">1679 Route des Andrieux 05130
                  Fouillouse</a> </li>

          <li><img src="{{ url('/') }}/front/images/footer/telephone.png" alt="icone telephone"> <a
                  href="tel:+33781082744">0781082744</a> </li>
      </ul>
      <img src="{{ url('/') }}/front/images/footer/loup.png" alt="Loup Logo">
      <hr>
      <p>Copyright 2020 © All rights reserved APIE DE LOP -
          <a href="{{ route('mentionslegals') }}">Mentions légales</a>
          <a href="javascript:void(0)" class="js-lcc-settings-toggle">@lang('cookie-consent::texts.alert_settings')</a>
      </p>
  </footer>
