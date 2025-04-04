<x-layout>
  <x-slot:title>
    Tienskip
  </x-slot>

  <div class="blue-backdrop">
    <main>
      <section class="video__container">
        <div class="float-video-container">
          <div class="text-bg bg-red next_event">
            Volgende evenement:
          </div>
          <div class="text-bg bg-purple upper-text">
           @if ($nextEvent)
              {{ $nextEvent->start_date->isoFormat('D MMMM') }}
            @else
              binnenkort
            @endif
          </div>
          <div class="text-bg bg-blue right-text">
            @if ($nextEvent)
              {{ $nextEvent->province }}
            @else
              -
            @endif
          </div>
        </div>
        <x-video></x-video>
      </section>

      <section class="planned__events">
        <div class="planned__events__title__block">
          <h1>Geplande evenementen:</h1>
        </div>

        <x-event_slider :events=$events></x-event_slider>

        <div class="impression_container flex-container">
          <div class="tienskip_dag_container flex-item">
            <div class="big_title_container">
              <h2>Over <span class="red_box negative_margin">Tienskip</span></h2>
            </div>

            <p class="normal_body">Wij zijn Tienskip, een stichting die zich inzet voor het verkleinen van de kloof tussen jongeren en (lokale) democratie.</p>

            <p class="normal_body">Door middel van projectdagen, de zogenoemde Tienskipdagen, proberen wij jongeren te bereiken door met hen een democratische uitdaging aan te gaan. De jongeren gaan bezig met vraagstukken die zij zien in hun eigen leefomgeving en door middel van brainstormsessies proberen zij een concrete oplossing te bedenken voor deze problemen. Dit doen zij onder begeleiding van ervaringsdeskundigen.</p>

            <p class="normal_body">Samen met een groep van ongeveer 150 jonge vrijwilligers bereiken wij op jaarbasis 10.000 jongeren verdeeld over verschillende regio's in Nederland.</p>

            <p class="normal_body">Tienskip is een stichting voor en door jongeren, om zo samen te werken aan de democratie van morgen. </p>

            <a href="#" class="button red">Lees meer</a>
          </div>

          <div class="tienskip_image team radius-2 flex-item"></div>
        </div>

      </section>

    </main>
  </div>

  <x-missie></x-missie>

  <section class="blue our_events">
    <div class="our_events_container">
      <div class="text-bg bg-red upper-text">
        Aankomende
      </div>
      <div class="text-bg bg-purple right-text">
        Evenementen
      </div>
    </div>

    <div class="visitor-counter">
      <span>Aantal bezoekers tot nu toe:</span>
      <span class="counter-number" data-target="{{ 3000 }}">0</span>
    </div>

    <div class="mobile_events">
      @foreach ($events->take(5) as $event)
      <a href="https://tienskip.nl/aanmelden" target="_blank">
        <div class="mobile_event">
          <h3>{{ $event->name }} -  @if(isset($event->start_date))<time>{{ $event->start_date->isoFormat('D MMMM') }}</time>@endif</h3>
          <p>{{ $event->province }}</p>
        </div>
      </a>
      @endforeach
    </div>

    <div id="tienskip__map">
      <div class="jsmaps-wrapper" id="map"></div>
    </div>

  </section>

  <section class="red doe_er_wat_aan">
    <div class="doe_er_wat_aan_container">
      <h1 class="big_text">Doe er <span class="blue_box">zelf wat aan</span></h1>
    </div>

    <x-donation></x-donation>
  </section>
</x-layout>
