<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'Tienskip' }}</title>
  <link rel="stylesheet" href="https://use.typekit.net/afg5kkj.css">
  <link href="/js/jsmaps/jsmaps.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.15.0/cdn/themes/light.css" />
  <script type="module" src="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.15.0/cdn/shoelace-autoloader.js"></script>
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>
  <header>
    <div class="header__container">

      <div class="mobile_menu">

        <nav>
          <ul>
            <li><a href="/over-tienskip">Over Tienskip</a></li>
            <li><a href="/evenementen">Evenementen</a></li>
            <li><a href="/doe-er-zelf-wat-aan">Doe er zelf wat aan</a></li>
            <li><a href="/contact">Contact</a></li>
          </ul>
        </nav>
      </div>
      <div class="menu__container">
        <nav class="nav__left">
          <ul>
            <li><a href="/over-tienskip">Over Tienskip</a></li>
            <li><a href="/evenementen">Evenementen</a></li>
          </ul>
        </nav>

        <div class="logo" id="logo">
          <a href="/"><img src="/images/logo.png" alt="Tienskip logo"></a>
        </div>

        <nav class="nav__right">
          <ul>
            <li><a href="/doe-er-zelf-wat-aan">Doe er zelf wat aan</a></li>
            <li><a href="/contact">Contact</a></li>
          </ul>
        </nav>
      </div>
    </div>


  </header>
  {{ $slot }}

  <footer class="blue">

    <div class="signup_form">
      <a href="https://frl.us6.list-manage.com/subscribe?u=802ae56c2e7d4b7debdc2e63c&id=d391bccdb8" target="_blank" class="signup_button">Abonneren nieuwsbrief</a>
    </div>

    <div class="address_container">
      <div><a href="https://www.google.com/maps/search/?api=1&query=Snekertrekweg%201" target="_blank">Snekertrekweg 1</a></div>
      <div>KVK / RSIN </div>
    </div>
    <div class="address_container">
      <div><a href="https://www.google.com/maps/search/?api=1&query=Snekertrekweg%201" target="_blank">8912 AA Leeuwarden</a></div>
      <div>71303227 / 858661342</div>
    </div>

    <div class="spacer"></div>

    <div class="address_container">
      <div><a href="mailto:info@tienskip.nl">info@tienskip.nl</a></div>
      <div><a href="/images/Tienskip-2024-2028.pdf" target="_blank">Bedrijfsplan</a></div>

    </div>
    <div class="address_container">
      <div>06 17 66 14 66</div>
      <div>Jaarrekening</div>
    </div>

    <div class="logo_container">
      <a href="https://www.facebook.com/Tienskip/?locale=nl_NL" target="_blank">
        <sl-icon name="facebook"></sl-icon>
      </a>
      <a href="https://www.instagram.com/tienskip/" target="_blank">
        <sl-icon name="instagram"></sl-icon>
      </a>
      <a href="https://nl.linkedin.com/company/tienskip" target="_blank">
        <sl-icon name="linkedin"></sl-icon>
      </a>
    </div>

    <div class="logo_footer">
      <a href="/">
        <img src="/images/tienskip_wit.png" alt="Tienskip logo">
      </a>
    </div>

  </footer>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
  <script src="/js/jquery.js"></script>
  <script src="/js/jsmaps/jsmaps-libs.js" type="text/javascript"></script>
  <script src="/js/jsmaps/jsmaps-panzoom.js" type="text/javascript"></script>
  <script src="/js/jsmaps/jsmaps.min.js" type="text/javascript"></script>
  <script src="/js/maps/netherlands.js" type="text/javascript"></script>
  <script src="/js/site.js"></script>
  <script src="/js/map.js"></script>
</body>
</html>
