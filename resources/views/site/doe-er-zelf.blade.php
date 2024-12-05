<x-layout>
    <x-slot name="title">
    Doe er zelf wat aan
  </x-slot>
<div class="red-backdrop"></div>
    <main>
      <section class="doe-er-zelf-container radius-1">

          <div class="float-video-container">
            <div class="text-bg bg-blue upper-text">
              Doe er zelf
            </div>
            <div class="text-bg bg-purple right-text">
              wat aan
            </div>
          </div>
      </section>

  
        <div class="impression_container">
          <div class="tienskip_dag_container">
            <div class="big_title_container">
              <h2>Maak het <span class="blue_box negative_margin">verschil</span>
              </h2>
            </div>
            <p class="normal_body">
              Enthousiast geworden? Maak dan zelf het verschil! Dit kan binnen Tienskip op verschillende manieren.
            </p>

            <p class="normal_body">
              Als vrijwilliger ben je aanwezig op de Tienskipdagen en ben je bezig met het begeleiden van een groep tijdens de brainstormfases of kan je helpen de dag facilitair op rolletjes te laten lopen.
            </p>

            <p class="normal_body">
              Ook kun je je aansluiten bij het innovatieteam! Dit is een groep mensen die 1x per maand samenkomt om te werken aan de organisatie. Door middel van hele vette gastsprekers worden zij meegenomen in de wereld van de democratie en Tienskip en werken zij een jaar aan het verder helpen van de stichting.
            </p>

            <p class="normal_body">
              Om je betrokkenheid bij Tienskip concreet te maken kun je Vriend van Tienskip worden! Hiermee krijg je toegang tot mooie kortingen bij verschillende winkels en horeca, maar word je ook betrokken bij het exclusieve vriendennetwerk van Tienskip.
            </p>

            <a href="#" class="button blue">Help zelf ook mee</a>
          </div>

            <div class="tienskip_image verschil radius-2"></div>
        </div>

      </section>

    </main>

<section class="missie">
      <div class="missie_container">
            <div class="missie_subcontainer">
        <h1>Missie</h1>
    
          <h2>Onze drie <span class="red_box">belangrijkste pijlers</span></h2>


          <ul class="special_list">
            <li><span class="number red_box">01.</span>Wij verbreden de betekenis van democratie.</li>
            <li><span class="number red_box">02.</span>Wij laten jonge burgers democratie ervaren.</li>
            <li><span class="number red_box">03.</span>Wij dragen bij aan de democratie van morgen.</li>
          </ul>
        </div>
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

      <div class="mobile_events">
        @foreach ($events->take(5) as $event)
          <div class="mobile_event">
            <h3>{{ $event->name }} - <time>{{ $event->start_date->isoFormat('D MMMM') }}</time></h3>
            <p>{{ $event->province }}</p>
          </div>
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