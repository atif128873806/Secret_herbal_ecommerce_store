@php
    $stories = [
        ['name' => 'Huma', 'duration' => '6 weeks', 'image' => 'huma.png', 'quote' => '“MandelAC Serum helped calm my active acne significantly. Breakouts reduced, inflammation went down, and my skin feels clearer and healthier within just a few weeks!”'],
        ['name' => 'Zoha', 'duration' => '4 weeks', 'image' => 'zoha.png', 'quote' => '“Maxdif Moisturizer keeps my skin so hydrated all day. Tone looks brighter, more even, and my dull patches have really improved with regular use!”'],
        ['name' => 'Mubeen', 'duration' => '3 months', 'image' => 'mubeen.png', 'quote' => '“If used as advised, this actually works! I’ve been using it for 3 months and noticed an inch of multiple hair growth where my hair was receding. My hair is much fuller now!”'],
        ['name' => 'Shahid', 'duration' => '4 weeks', 'image' => 'shahid.png', 'quote' => '“Since adding Maxdif Cream to my routine, my hyperpigmentation has noticeably reduced. Skin feels smoother, brighter, and so much more even toned now!”'],
    ];
@endphp
<section class="results-section page-shell" id="results" aria-labelledby="results-heading">
    <header class="section-heading">
        <h2 id="results-heading">Results You Can Trust 💙</h2>
        <p>Real Skin. Real Results. Zero Filters.</p>
        <p class="sample-content-label">Sample stories and images from the Figma reference · not Herbal customer results</p>
    </header>
    <div class="results-grid">
        @foreach ($stories as $story)
            <article class="result-card">
                <img src="{{ asset('images/home/results/'.$story['image']) }}" alt="Before and after photo in the supplied Figma preview for {{ $story['name'] }}" loading="lazy" width="440" height="365">
                <div class="result-card-copy">
                    <div class="result-card-meta"><strong>{{ $story['name'] }}</strong><span>{{ $story['duration'] }}</span></div>
                    <p>{{ $story['quote'] }}</p>
                </div>
            </article>
        @endforeach
    </div>
    <div class="section-action"><a class="button button-primary" href="#reviews">Read All Reviews</a></div>
</section>
