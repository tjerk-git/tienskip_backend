
<x-layout>
  <x-slot name="title">
    {{ $blogitem->title ?? 'Tienskip | Succesverhaal' }}
  </x-slot>

  <div class="blue-backdrop">
    <div class="white-backdrop"></div>
  </div>

  <main>
    <section class="red succesverhalen-hero">
      <div class="succesverhalen_container">
        <nav class="breadcrumb">
          <a href="/succesverhalen">← Terug naar succesverhalen</a>
        </nav>
        <h1>{{ $blogitem->title }}</h1>
        @if($blogitem->published_at)
          <div class="article-meta">
            <time datetime="{{ $blogitem->published_at }}">
              {{ \Carbon\Carbon::parse($blogitem->published_at)->format('d F Y') }}
            </time>
          </div>
        @endif
      </div>
    </section>

    @if($blogitem->image)
      <section class="article-image">
        <div class="image-container">
          <img src="{{ Str::startsWith($blogitem->image, ['http://', 'https://', '/']) ? $blogitem->image : Storage::url($blogitem->image) }}" alt="{{ $blogitem->title }}">
        </div>
      </section>
    @endif

    <article class="article-content">
      <div class="content-container">
        <div class="article-body">
          {!! $blogitem->content !!}
        </div>
        
        <div class="article-footer">
          <a href="/succesverhalen" class="back-to-stories">
            <sl-icon name="arrow-left"></sl-icon>
            Meer succesverhalen
          </a>
        </div>
      </div>
    </article>
  </main>
</x-layout>

<style>
.succesverhalen-hero {
  padding: 6rem 2rem 4rem;
  text-align: center;
}

.succesverhalen_container {
  max-width: 800px;
  margin: 0 auto;
}

.breadcrumb {
  margin-bottom: 2rem;
}

.breadcrumb a {
  color: rgba(255, 255, 255, 0.8);
  text-decoration: none;
  font-size: 1rem;
  transition: color 0.3s ease;
}

.breadcrumb a:hover {
  color: white;
}

.succesverhalen_container h1 {
  font-size: 3rem;
  margin-bottom: 1rem;
  color: white;
  line-height: 1.2;
}

.article-meta {
  color: rgba(255, 255, 255, 0.9);
  font-size: 1rem;
}

.article-image {
  background: white;
  padding: 4rem 2rem 0;
}

.image-container {
  max-width: 800px;
  margin: 0 auto;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
}

.image-container img {
  width: 100%;
  height: auto;
  display: block;
}

.article-content {
  background: white;
  padding: 4rem 2rem;
}

.content-container {
  max-width: 800px;
  margin: 0 auto;
}

.article-body {
  font-size: 1.1rem;
  line-height: 1.8;
  color: #333;
}

.article-body p {
  margin-bottom: 1.5rem;
}

.article-body h2 {
  color: var(--purple);
  margin: 2.5rem 0 1.5rem;
  font-size: 1.8rem;
}

.article-body h3 {
  color: var(--abe);
  margin: 2rem 0 1rem;
  font-size: 1.4rem;
}

.article-body strong {
  color: var(--purple);
  font-weight: 600;
}

.article-body blockquote {
  background: #f8f9fa;
  border-left: 4px solid var(--abe);
  margin: 2rem 0;
  padding: 1.5rem 2rem;
  font-style: italic;
  border-radius: 0 8px 8px 0;
}

.article-body ul, .article-body ol {
  margin: 1.5rem 0;
  padding-left: 2rem;
}

.article-body li {
  margin-bottom: 0.5rem;
}

.article-footer {
  margin-top: 4rem;
  padding-top: 2rem;
  border-top: 2px solid #f0f0f0;
  text-align: center;
  margin-bottom:10rem;
}

.back-to-stories {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  background: var(--abe);
  color: white;
  padding: 1rem 2rem;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s ease;
}

.back-to-stories:hover {
  background: var(--purple);
  gap: 1rem;
}

@media (max-width: 768px) {
  .succesverhalen_container h1 {
    font-size: 2rem;
  }
  
  .article-content {
    padding: 2rem 1rem;
  }
  
  .article-body {
    font-size: 1rem;
  }
  
  .article-image {
    padding: 2rem 1rem 0;
  }
}
</style>