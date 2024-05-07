<x-layout>
  <x-slot:title>
    Tienskip
  </x-slot>
 
<div class="blue-backdrop"></div>

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
              coming soon
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
        </div>
        <x-video></x-video>
      </section>

      <section class="planned__events">
        <div class="planned__events__title__block">
          <h1>Geplande evenementen:</h1>
        </div>

        <x-event_slider :events=$events></x-event_slider>

        <div class="impression_container">
          <div class="tienskip_dag_container">
            <div class="big_title_container">
              <h2>Over <span class="red_box negative_margin">Tienskip</span>
              </h2>
            </div>
            <p class="normal_body">
Wij zijn Tienskip, een stichting die zich bezighoudt met de kloof tussen jongeren en (lokale) politiek te verminderen. Door middel van Projectdagen, de Tienskipdagen, proberen wij jongeren te bereiken door met hen een democratische uitdaging aan te gaan. De jongeren gaan bezig met problemen die zij zien in hun eigen leefomgeving, en door middel van brainstormsessies proberen zij een concrete oplossing te bedenken voor deze problemen. Samen met een groep van ongeveer 120 jonge vrijwilligers bereiken wij op jaarbasis 5000 jongeren verdeeld over verschillende regio’s in Nederland. Dus, wij zijn een stichting voor jongeren, door jongeren om zo op een laagdrempelige manier democratie behapbaar te maken voor een grote groep jongeren!
            </p>

            <a href="#" class="button red">Lees meer</a>
          </div>

          <div class="tienskip_image team radius-2"></div>
        </div>

      </section>

    </main>

    <x-missie></x-missie>


    <section class="blue our_events">
      <div class="our_events_container">
        <div class="text-bg bg-red upper-text">
          Voorgaande
        </div>
        <div class="text-bg bg-purple right-text">
          Evenementen
        </div>
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