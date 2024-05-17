        <div class="events">
          <div class="red_border"></div>
          @if ($events->count() > 0)
          <swiper-container class="mySwiper" slides-per-view="5" space-between="45" grab-cursor="true" free-mode="true" autoplay="true">
            @foreach($events as $event)
              @if(isset($event->start_date, $event->province, $event->city))
              <swiper-slide>
                <time>{{ $event->start_date->isoFormat('D MMMM') }}</time>
                <h3>{{ $event->city }} </h3><h4>{{ $event->province }}</h4>
              </swiper-slide>
                @endif
            @endforeach
          </swiper-container>
          @endif
        </div>