<x-layout>
    <link rel="stylesheet" href="/css/partners.css">
    
    <div class="partners-section">
        <div class="partners-container">
            <div class="partners-content">
                <h2 class="partners-title">Onze partners:</h2>
                
                <div class="partners-grid">
                    @foreach($partners as $partner)
                        <div class="partner-card">
                            <img src="{{ Storage::url($partner->logo) }}" 
                                 alt="{{ $partner->name }}" 
                                 class="partner-logo">
                            <h3 class="partner-name">{{ $partner->name }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>