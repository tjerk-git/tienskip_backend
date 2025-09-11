<x-layout>
  <x-slot name="title">
    Evenementen
  </x-slot>


    <div class="blue-backdrop">

    <main>
      <section class="video__container">
        <div class="float-video-container">
          <div class="text-bg bg-purple upper-text">
            Onze
          </div>
          <div class="text-bg bg-red right-text">
            Evenementen
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
              <h2>Hoe een <span class="red_box negative_margin">‘Tienskipdag’</span> eruit ziet
              </h2>
            </div>
            <p class="normal_body" data-type-speed="50">
 De ‘Tienskipdag’ Dag, wat gaan we doen? De leerlingen komen binnen op een locatie die iets te maken heeft met de democratie of participatie. <p class="normal_body">Hier krijgen zij hun eigen democratisch paspoort, een document dat zij vooraf hebben ingevuld om een probleem in hun eigen leefomgeving aan te kaarten.</p> <p class="normal_body"> Dan worden ze op thema ingedeeld in groepen en begint de eerste brainstormfase: de probleemstelling. Als groep stellen zij een concreet probleem vast waaraan ze willen werken. Na een korte pauze begint de tweede fase: de oplossing. In deze fase werken ze aan een concrete oplossing die het probleem waar zij mee zitten kan oplossen. </p> <p class="normal_body"> In de derde fase presenteren zij hun oplossing aan andere leerlingen, en alle aanwezige belangenorganisaties. Deze fase is verdeeld in twee delen: eerst bereiden ze in hun groep een pitch voor, en daarna pitchen ze dit aan de aanwezigen.</p> 
            </p>

            <a href="https://tienskip.nl/aanmelden" target="_blank" class="button red">Help zelf ook mee</a>
          </div>

          <div class="tienskip_image eenddag radius-2 flex-item"></div>
        </div>

      </section>

    </main>

    <section class="red succesverhalen">
      <div class="succesverhalen_container">
        <h2>Onze <span class="blue_box">succesverhalen</span></h2>

        @if($blogitems->count() > 0)
          <div class="cards_container">
            @foreach($blogitems as $index => $blogitem)
              <div class="card {{ $index == 0 ? 'first' : ($index == 1 ? 'second' : 'third') }}">
                <a href="/succesverhalen/{{ $blogitem->slug }}" class="card-link">
                  <div class="card_footer">
                    <h4>{{ $blogitem->title }}</h4>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
          
          <div class="view-all-stories">
            <a href="/succesverhalen" class="button blue">Alle verhalen bekijken</a>
          </div>
        @else
          <div class="no-stories">
            <p>Binnenkort meer inspirerende verhalen!</p>
            <a href="/succesverhalen" class="button blue">Bekijk alle verhalen</a>
          </div>
        @endif
      </div>
    </section>

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
        <span class="counter-number" data-target="{{ 10000 }}">0</span>
      </div>


            <div class="mobile_events">
        @foreach ($events->take(5) as $event)
        <a href="https://tienskip.nl/aanmelden" target="_blank">
          <div class="mobile_event">
            <h3>{{ $event->name }} - <time>{{ $event->start_date->isoFormat('D MMMM') }}</time></h3>
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

</div>
