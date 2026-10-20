<section class="press-strip" aria-label="Sample press logos from the supplied Figma design">
    <p>Press logos shown as design samples</p>
    <div class="press-marquee" data-marquee>
        <div class="press-track">
            @foreach (['arydigital.png', 'divamagazine.png', 'hellopakistan.png', 'dawn.png', 'galaxylollywood.png', 'mashion.png', 'paperazzi.png', 'startuppakistan.png', 'sundaytimes.png'] as $logo)
                <img src="{{ asset('images/home/press/'.$logo) }}" alt="{{ pathinfo($logo, PATHINFO_FILENAME) }} · sample logo" loading="lazy">
            @endforeach
        </div>
        <div class="press-track" aria-hidden="true">
            @foreach (['arydigital.png', 'divamagazine.png', 'hellopakistan.png', 'dawn.png', 'galaxylollywood.png', 'mashion.png', 'paperazzi.png', 'startuppakistan.png', 'sundaytimes.png'] as $logo)
                <img src="{{ asset('images/home/press/'.$logo) }}" alt="" loading="lazy">
            @endforeach
        </div>
    </div>
</section>
