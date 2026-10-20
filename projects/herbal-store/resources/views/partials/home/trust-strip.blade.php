<section class="trust-strip" aria-label="Sample trust messages from the Figma reference">
    <ul class="trust-strip-inner page-shell">
        @foreach ([['Prescribed By Dermatologists', 'trust-01.svg'], ['1000s Of Success Stories', 'trust-02.svg'], ['3,000,000+ Customers', 'trust-03.svg'], ['Free Samples + Shipping', 'trust-04.svg']] as [$label, $icon])
            <li><img src="{{ asset('images/home/trust/'.$icon) }}" alt="" width="30" height="30"><span>{{ $label }}</span></li>
        @endforeach
    </ul>
</section>
