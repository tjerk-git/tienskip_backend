<x-layout>
  <x-slot name="title">
    Contact
  </x-slot>

<div class="purple-backdrop"></div>
    <main>
      <section class="hero_image_container">
        <img src="/images/contact.jpg" alt="Contact" class="radius-1">
      </section>

      <section class="contact">
        <div class="contact_container">
      
          @if (session('message'))
            <div class="succes_message">
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
            </div>
          @endif
  
          <h2><span class="red_box">Zijn er nog vragen?</span></h2>
          <div class="contact_block" data-name="question">
            <sl-icon name="arrow-up" class="arrow-up"></sl-icon>
            <h2>Ik heb een vraag</h2>
          </div>
          <form class="question_form folded" method="post">
            @csrf
            <div class="form-group large">
              <label for="name">Naam*</label>
              <input type="text" id="name" name="name" placeholder="Naam:" required>
            </div>
            <div class="form-group large">
              <label for="email">E-mail*</label>
              <input type="email" id="email" name="email" placeholder="Emailadres:" required>
            </div>
            <div class="form-group large">
              <label for="message">Bericht</label>
              <textarea id="message" name="message" placeholder="Hoe kunnen wij jou helpen?" required></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn">Verstuur</button>
            </div>
          </form>

          <div class="contact_block" data-name="work">
            <sl-icon name="arrow-down" class="arrow-down"></sl-icon>
            <h2>Ik wil samenwerken</h2>
          </div>
          <form class="work_form unfolded" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Naam*</label>
              <input type="text" id="name" name="name" placeholder="Naam:" required>
            </div>
            <div class="form-group no-margin-right">
              <label for="name">Bedrijfsnaam</label>
              <input type="text" id="bedrijfsnaam" name="bedrijfsnaam" placeholder="Bedrijfsnaam" required>
            </div>
            <div class="form-group">
              <label for="name">Telefoon</label>
              <input type="text" id="telefoon" name="telefoon" placeholder="Telefoon" required>
            </div>
            <div class="form-group no-margin-right">
              <label for="email">E-mail*</label>
              <input type="email" id="email" name="email" placeholder="Emailadres:" required>
            </div>
            <div class="form-group large">
              <label for="message">Bericht</label>
              <textarea id="message" name="message" placeholder="Waarmee kunnen wij elkaar helpen?" required></textarea>
            </div>
           
            <div class="form-group large">
              <button type="submit" class="btn">Verstuur</button>
            </div>
           
          </form>
        </div>
      </section>
    </main>
</x-layout>