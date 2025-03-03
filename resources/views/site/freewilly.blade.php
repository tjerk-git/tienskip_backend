<x-layout>
  <x-slot:title>
    Tienskip
  </x-slot>
    
<main style="background-color: #f8f9fa; min-height: 100vh; padding: 40px 0;">
  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="background-color: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 30px;">
                <h2 style="color: #333; font-size: 24px; margin-bottom: 30px; border-bottom: 2px solid #f0f0f0; padding-bottom: 15px;">Freewilly bijwerken</h2>
                <div>
                    <!-- Search Form -->
                    <div style="margin-bottom: 30px;">
                        <input type="text" id="search" class="form-control" placeholder="Zoek naar je naam:" style="padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                        <div id="searchResults" class="list-group mt-2" style="border-radius: 6px; overflow: hidden;"></div>
                    </div>

                    <!-- Profile Update Form -->
                    <form id="profileForm" action="{{ route('people.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="personId" name="id">

                        <div style="margin-bottom: 20px;">
                            <label for="name" style="display: block; margin-bottom: 8px; color: #555; font-weight: 500;">Naam</label>
                            <input type="text" class="form-control" id="name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label for="email" style="display: block; margin-bottom: 8px; color: #555; font-weight: 500;">Email</label>
                            <input type="email" class="form-control" id="email" name="email" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label for="description" style="display: block; margin-bottom: 8px; color: #555; font-weight: 500;">Rol</label>
                            <select class="form-control" id="description" name="description" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
                                <option value="vrijwilliger">Vrijwilliger</option>
                                <option value="bestuur">Bestuur</option>
                                <option value="werknemer">Werknemer</option>
                            </select>
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label for="fact" style="display: block; margin-bottom: 8px; color: #555; font-weight: 500;">Een leuk feitje</label>
                            <input type="text" class="form-control" id="fact" name="fact" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label for="member_since" style="display: block; margin-bottom: 8px; color: #555; font-weight: 500;">Lid sinds</label>
                            <input type="text" class="form-control" id="member_since" name="member_since" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
                        </div>

                        <div style="margin-bottom: 30px;">
                            <label for="avatar" style="display: block; margin-bottom: 8px; color: #555; font-weight: 500;">Foto</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" accept=".jpg,.jpeg,.png" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
                            <div id="currentAvatar" class="mt-3" style="max-width: 200px; margin: 0 auto;"></div>
                        </div>

                        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px; background-color: #0d6efd; border: none; border-radius: 6px; color: white; font-weight: 500; font-size: 16px; cursor: pointer; transition: background-color 0.2s;">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</main>

<style>
    .list-group-item-action {
        padding: 12px;
        border: 1px solid #ddd;
        cursor: pointer;
        transition: background-color 0.2s;
    }
    .list-group-item-action:hover {
        background-color: #f8f9fa;
    }
    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13,110,253,.25);
        outline: none;
    }
    .btn-primary:hover {
        background-color: #0b5ed7;
    }
    #currentAvatar img {
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
</style>

<script>
      document.addEventListener('DOMContentLoaded', function() {
          const searchInput = document.getElementById('search');
          const searchResults = document.getElementById('searchResults');
          let typingTimer;

          // Search input handler with debounce
          searchInput.addEventListener('input', function() {
              clearTimeout(typingTimer);
              typingTimer = setTimeout(() => {
                  const query = this.value.trim();
                  if (query.length >= 2) {
                      fetch(`/api/people/search?query=${encodeURIComponent(query)}`)
                          .then(response => response.json())
                          .then(data => {
                              searchResults.innerHTML = '';

                             
                              data.forEach(person => {
                                  const div = document.createElement('div');
                                  div.className = 'list-group-item list-group-item-action';
                                  div.textContent = person.name;
                                  div.addEventListener('click', () => fillForm(person));
                                  searchResults.appendChild(div);
                              });
                          });
                  } else {
                      searchResults.innerHTML = '';
                  }
              }, 300);
          });

          // Fill form with selected person's data
          function fillForm(person) {
              document.getElementById('personId').value = person.id;
              document.getElementById('name').value = person.name;
              document.getElementById('email').value = person.email || '';
              document.getElementById('description').value = person.description || '';
              document.getElementById('fact').value = person.fact || '';
              document.getElementById('member_since').value = person.member_since || '';
              
              const currentAvatar = document.getElementById('currentAvatar');
              if (person.avatar) {
                  currentAvatar.innerHTML = `<img src="${person.avatar}" alt="Current avatar" class="img-thumbnail" style="max-width: 200px">`;
              } else {
                  currentAvatar.innerHTML = '';
              }
              
              searchResults.innerHTML = '';
              searchInput.value = person.name;
          }

          // Form submission handler
          document.getElementById('profileForm').addEventListener('submit', function(e) {
              e.preventDefault();
              const formData = new FormData(this);

              fetch(this.action, {
                  method: 'POST',
                  body: formData,
                  headers: {
                      'X-Requested-With': 'XMLHttpRequest',
                      'Accept': 'application/json'
                  },
                  credentials: 'same-origin'
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      alert('Update gelukt!');
                  } else {
                      alert('Error updating profile. Please try again.');
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
                  alert('Error updating profile. Please try again.');
              });
          });
      });
  </script>

</x-layout>