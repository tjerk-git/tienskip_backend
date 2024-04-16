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
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti consectetur magnam, dolores, id qui
              dolorem aliquam exercitationem repudiandae magni possimus natus at quam maiores eligendi repellat
              recusandae
              laborum? Iusto, officiis?
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