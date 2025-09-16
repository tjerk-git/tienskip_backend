<x-layout>
  <x-slot name="title">
    Succesverhalen - Tienskip
  </x-slot>

  <div class="blue-backdrop">
    <div class="white-backdrop"></div>
  </div>

  <main>
    <section class="red succesverhalen-hero">
      <div class="succesverhalen_container">
        <h1>Onze <span class="blue_box">succesverhalen</span></h1>
        <p class="hero-description">Ontdek hoe Tienskip jongeren inspireert om het verschil te maken in hun gemeenschap</p>
      </div>
    </section>

    <section class="blog-posts-section">
      <div class="blog-posts-container">
        @if($blogitems->count() > 0)
          <div class="blog-posts-grid">
            @foreach($blogitems as $blogitem)
              <article class="blog-post-card">
                @if($blogitem->image)
                  <div class="blog-post-image">
                    <img src="{{ Str::startsWith($blogitem->image, ['http://', 'https://', '/']) ? $blogitem->image : Storage::url($blogitem->image) }}" alt="{{ $blogitem->title }}">
                  </div>
                @endif
                
                <div class="blog-post-content">
                  <div class="blog-post-meta">
                    @if($blogitem->published_at)
                      <time datetime="{{ $blogitem->published_at }}">
                        {{ \Carbon\Carbon::parse($blogitem->published_at)->format('d F Y') }}
                      </time>
                    @endif
                  </div>
                  
                  <h2 class="blog-post-title">
                    <a href="/succesverhalen/{{ $blogitem->slug }}">{{ $blogitem->title }}</a>
                  </h2>
                  
                  <div class="blog-post-excerpt">
                    {{ Str::limit(strip_tags($blogitem->content), 150) }}
                  </div>
                  
                  <a href="/succesverhalen/{{ $blogitem->slug }}" class="read-more-btn">
                    Lees verder <sl-icon name="arrow-right"></sl-icon>
                  </a>
                </div>
              </article>
            @endforeach
          </div>
        @else
          <div class="no-posts">
            <h3>Binnenkort meer verhalen!</h3>
            <p>We werken hard aan het verzamelen van inspirerende succesverhalen. Check binnenkort terug voor updates.</p>
          </div>
        @endif
      </div>
    </section>
  </main>
</x-layout>

<style>
.succesverhalen-hero {
  padding: 8rem 2rem;
  text-align: center;
}

.succesverhalen_container {
  max-width: 800px;
  margin: 0 auto;
}

.succesverhalen_container h1 {
  font-size: 3.5rem;
  margin-bottom: 2rem;
  color: white;
}

.hero-description {
  font-size: 1.3rem;
  color: white;
  opacity: 0.9;
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.6;
}

.blog-posts-section {
  padding: 6rem 2rem;
  background: white;
}

.blog-posts-container {
  max-width: 1200px;
  margin: 0 auto;
}

.blog-posts-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 3rem;
}

.blog-post-card {
  background: white;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1),
              box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.blog-post-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
}

.blog-post-image {
  aspect-ratio: 16/9;
  overflow: hidden;
}

.blog-post-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.blog-post-card:hover .blog-post-image img {
  transform: scale(1.05);
}

.blog-post-content {
  padding: 2rem;
}

.blog-post-meta {
  margin-bottom: 1rem;
}

.blog-post-meta time {
  color: var(--purple);
  font-size: 0.9rem;
  font-weight: 500;
}

.blog-post-title {
  margin-bottom: 1rem;
}

.blog-post-title a {
  color: var(--black);
  text-decoration: none;
  font-size: 1.5rem;
  font-weight: 700;
  line-height: 1.3;
  transition: color 0.3s ease;
}

.blog-post-title a:hover {
  color: var(--purple);
}

.blog-post-excerpt {
  color: #666;
  line-height: 1.6;
  margin-bottom: 2rem;
}

.read-more-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  color: var(--abe);
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s ease;
}

.read-more-btn:hover {
  color: var(--purple);
  gap: 1rem;
}

.no-posts {
  text-align: center;
  padding: 4rem 2rem;
  color: #666;
}

.no-posts h3 {
  color: var(--purple);
  margin-bottom: 1rem;
}

@media (max-width: 768px) {
  .succesverhalen_container h1 {
    font-size: 2.5rem;
  }
  
  .hero-description {
    font-size: 1.1rem;
  }
  
  .blog-posts-grid {
    grid-template-columns: 1fr;
    gap: 2rem;
  }
  
  .blog-posts-section {
    padding: 4rem 1rem;
  }
}
</style>