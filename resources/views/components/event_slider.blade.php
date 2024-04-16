        <div class="events">
          <div class="red_border"></div>
          <swiper-container class="mySwiper" slides-per-view="5" space-between="45" grab-cursor="true" free-mode="true" autoplay="true">
            @foreach($events as $event)
              <swiper-slide>
                <time>{{ $event->start_date->isoFormat('D MMMM') }}</time>
                <h3>{{ $event->province }}</h3>
              </swiper-slide>
            @endforeach
          </swiper-container>
        </div>