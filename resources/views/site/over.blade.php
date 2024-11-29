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


 <section class="team-section bg-blue">

    <div class="team-title">
     <h2>Ons <span class="red_box">team</span></h2>
     </div>
     <div class="team-filters">
         <input type="text" id="searchInput" placeholder="Zoeken..." class="filter-input">
         <select id="roleFilter" class="filter-select">
             <option value="">Alle rollen</option>
             @foreach($people->pluck('description')->unique() as $role)
                 <option value="{{ $role }}">{{ $role }}</option>
             @endforeach
         </select>
         <select id="yearFilter" class="filter-select">
             <option value="">Alle jaren</option>
             @foreach($people->pluck('member_since')->unique()->sort() as $year)
                 <option value="{{ $year }}">{{ $year }}</option>
             @endforeach
         </select>
     </div>

     <div class="team-grid">
         @foreach($people as $person)
             <div class="team-member" 
                  data-role="{{ $person->description }}" 
                  data-year="{{ $person->member_since }}"
                  data-name="{{ $person->name }}">
                 <div class="member-image">
                     <img src="{{ Storage::url($person->avatar) }}" alt="{{ $person->name }}">
                 </div>
                 <div class="member-info">
                     <h3>{{ $person->name }}</h3>
                     <p class="member-role">{{ $person->role }}</p>
                     <p class="member-description">{{ $person->description }}</p>
                     <p class="member-since">lid sinds: {{ $person->member_since }}</p>
                 </div>
             </div>
         @endforeach
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

  

  <section class="red doe_er_wat_aan">
    <div class="doe_er_wat_aan_container">
      <h1 class="big_text">Doe er <span class="blue_box">zelf wat aan</span></h1>
    </div>

    <x-donation />
  </section>
</x-layout>

<style>
 .team-filters {
     margin-bottom: 2rem;
     display: flex;
     gap: 1rem;
     justify-content: center;
     flex-wrap: wrap;
 }

 .filter-input,
 .filter-select {
     padding: 0.5rem 1rem;
     border: 1px solid #ddd;
     border-radius: 4px;
     font-size: 1rem;
 }

 .filter-input {
     min-width: 200px;
 }

 .filter-select {
     min-width: 150px;
 }

 @media (max-width: 768px) {
     .team-filters {
         flex-direction: column;
         align-items: stretch;
     }
     
     .filter-input,
     .filter-select {
         width: 100%;
     }
 }
</style>

<script>
 document.addEventListener('DOMContentLoaded', function() {
     const searchInput = document.getElementById('searchInput');
     const roleFilter = document.getElementById('roleFilter');
     const yearFilter = document.getElementById('yearFilter');
     const teamMembers = document.querySelectorAll('.team-member');

     function filterMembers() {
         const searchTerm = searchInput.value.toLowerCase();
         const selectedRole = roleFilter.value;
         const selectedYear = yearFilter.value;

         teamMembers.forEach(member => {
             const name = member.dataset.name.toLowerCase();
             const role = member.dataset.role;
             const year = member.dataset.year;

             const matchesSearch = name.includes(searchTerm);
             const matchesRole = !selectedRole || role === selectedRole;
             const matchesYear = !selectedYear || year === selectedYear;

             member.style.display = 
                 matchesSearch && matchesRole && matchesYear ? 'block' : 'none';
         });
     }

     searchInput.addEventListener('input', filterMembers);
     roleFilter.addEventListener('change', filterMembers);
     yearFilter.addEventListener('change', filterMembers);
 });
</script>
