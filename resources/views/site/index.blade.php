<x-layout>
  <x-slot:title>
    Tienskip
  </x-slot>
 
<div class="blue-backdrop"></div>

    <main>
      <section class="video__container">
        <div class="float-video-container">
          <div class="text-bg bg-purple upper-text">
            Volgende event
          </div>
          <div class="text-bg bg-red right-text">
            15 maart
          </div>
        </div>
        <video class="video radius-1" autoplay muted loop>
          <source src="/images/video/tskipper.mp4" type="video/mp4">
        </video>
      </section>

      <section class="planned__events">
        <div class="planned__events__title__block">
          <h1>Geplande evenementen:</h1>
        </div>

        <div class="events">
          <div class="red_border"></div>
          <swiper-container class="mySwiper" slides-per-view="5" space-between="45" grab-cursor="true" free-mode="true" autoplay="true">
            <swiper-slide>
              <time>21 maart 2024</time>
              <h3>Groningen</h3>
            </swiper-slide>
            <swiper-slide>
              <time>21 maart 2024</time>
              <h3>Groningen</h3>
            </swiper-slide>
            <swiper-slide>
              <time>21 maart 2024</time>
              <h3>Groningen</h3>
            </swiper-slide>
            <swiper-slide>
              <time>21 maart 2024</time>
              <h3>Groningen</h3>
            </swiper-slide>
            <swiper-slide>
              <time>21 maart 2024</time>
              <h3>Groningen</h3>
            </swiper-slide>
            <swiper-slide>
              <time>21 maart 2024</time>
              <h3>Groningen</h3>
            </swiper-slide>
          </swiper-container>

        </div>

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