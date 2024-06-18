
<x-layout>

  <x-slot name="title">
    {{ $blogitem->title ?? 'Tienskip | Succesverhaal' }}
  </x-slot>

  <main>
    <section class="red succesverhalen">
        <div class="succesverhalen_container">
          <h2>Onze <span class="blue_box">succesverhalen</span></h2>
        </div>
     
      <!-- <img src="{{ asset('storage/' . $blogitem->image) }}" alt="{{ $blogitem->title }}"> -->
    </section>

    <article>
      <h1>{{ $blogitem->title }}</h1>
      <p> {!! $blogitem->content !!}</p>
    </article>
  </main>
</x-layout>