<x-layout>
  <x-slot name="title">
    Over Tienskip
  </x-slot>
  <div class="blue-backdrop"></div>

  <main>
    <section class="over-tienskip-container radius-1">

      <div class="float-video-container">
        <div class="text-bg bg-purple upper-text">
          Over
        </div>
        <div class="text-bg bg-red right-text">
          Tienskip
        </div>
      </div>
    </section>


    <div class="impression_container">
      <div class="tienskip_dag_container">
        <div class="big_title_container">
          <div class="float-video-container">
            <div class="text-bg bg-purple upper-text">
              Over
            </div>
            <div class="text-bg bg-red right-text">
              Ons
            </div>
          </div>
        </div>
        <p class="normal_body margin-top">
          Wij zijn Tienskip, een stichting die zich bezighoudt met de kloof tussen jongeren en (lokale) politiek te verminderen. <br><br> Door middel van Projectdagen, de Tienskipdagen, proberen wij jongeren te bereiken door met hen een democratische uitdaging aan te gaan. De jongeren gaan bezig met problemen die zij zien in hun eigen leefomgeving, en door middel van brainstormsessies proberen zij een concrete oplossing te bedenken voor deze problemen. <br><br> Samen met een groep van ongeveer 120 jonge vrijwilligers bereiken wij op jaarbasis 5000 jongeren verdeeld over verschillende regio’s in Nederland. Dus, wij zijn een stichting voor jongeren, door jongeren om zo op een laagdrempelige manier democratie behapbaar te maken voor een grote groep jongeren!
        </p>

        <a href="#" class="button red">Doe er zelf wat aan</a>
      </div>

      <div class="tienskip_image over-ons radius-2"></div>
    </div>

  </main>

  <x-missie />

  <section class="visie_mobile">
    <h2><span class="red_box">Visie</span></h2>
    <img src="/images/10.png">
    <p>
      "Volgens onze visie is democratie iets wat je niet uit de schoolboeken kan leren, maar in de praktijk moet ervaren. Ook is democratie een groot goed, wat we veel te vaak te klein maken. Daarnaast volgen we naast ons motto “doe er zelf wat aan” ook het gedachtegoed: “Vertrouwen komt te voet en gaat te paard.” Daarom werken wij aan een zestal uitdagingen om onze missie, het behapbaar maken van democratie."
    </p>

    <h3>Meer weten?</h3>
    <a href="https://tienskip.nl/images/Tienskip-2024-2028.pdf" class="button red">Download het bedrijfsplan</a>

    </div>
  </section>

  <section class="visie">
    <div class="visie_container">
      <img src="/images/10.png">
      <h2><span class="red_box visie_text">Visie</span></h2>

      <div class="purple_content">

        <sl-icon class="quote_icon upper_quote" name="quote"></sl-icon>
        <p>
          Volgens onze visie is democratie iets wat je niet uit de schoolboeken kan leren, maar in de praktijk moet ervaren. Ook is democratie een groot goed, wat we veel te vaak te klein maken. Daarnaast volgen we naast ons motto “doe er zelf wat aan” ook het gedachtegoed: “Vertrouwen komt te voet en gaat te paard.” Daarom werken wij aan een zestal uitdagingen om onze missie, het behapbaar maken van democratie.
        </p>
        <sl-icon class="quote_icon lower_quote" name="quote"></sl-icon>
      </div>

      <div class="meer_weten_container">
        <h3>Meer weten?</h3>
        <a href="https://tienskip.nl/images/Tienskip-2024-2028.pdf" class="button red">Download het bedrijfsplan</a>

      </div>

    </div>
  </section>


  <section class="ballenbak">
    <h2><span class="red_box">Het team van Tienskip</span></h2>

    <div class="filter_options">

      <select id="member_since" class="filterOption">
        <option value="#" selected>Feitje</option>
        <?php $uniqueFacts = []; ?>

        @foreach ($people as $person)
        @if (!in_array($person['fact'], $uniqueFacts))
        <?php $uniqueFacts[] = $person['fact']; ?>
        <option value="{{ $person['fact'] }}">{{ $person['fact'] }}</option>
        @endif
        @endforeach
      </select>


      <select id="member_role" class="filterOption">
        <option value="#" selected>Rol binnen het team</option>
        <?php $uniqueDes = []; ?>

        @foreach ($people as $person)
        @if (!in_array($person['description'], $uniqueDes))
        <?php $uniqueDes[] = $person['description']; ?>
        <option value="{{ $person['description'] }}">{{ $person['description'] }}</option>
        @endif
        @endforeach
      </select>
    </div>
    <div class="cmd-info-panel">
      <div class="cmd-info-panel__text">
        <div class="cmd-info-panel__text-info js-teacher-year"></div>
        <div class="cmd-info-panel__text-name js-teacher-name"></div>
        <div class="cmd-info-panel__text-info js-teacher-email"></div>
        <div class="cmd-info-panel__text-info js-teacher-avatar"></div>
        <div class="cmd-info-panel__text-info js-teacher-info"></div>
        <div class="cmd-info-panel__text-info js-teacher-fact"></div>
      </div>
    </div>

    <div class="cmd-people-container">
    </div>

    <div class="cmd-new-btn js-drop-docent">
      <div class="cmd-new-btn__graphic"></div>
    </div>
  </section>

  <section class="red doe_er_wat_aan">
    <div class="doe_er_wat_aan_container">
      <h1 class="big_text">Doe er <span class="blue_box">zelf wat aan</span></h1>
    </div>

    <x-donation />
  </section>
</x-layout>
