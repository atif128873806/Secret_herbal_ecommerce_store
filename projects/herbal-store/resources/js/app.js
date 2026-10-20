const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

document.querySelectorAll('[data-auto-submit]').forEach((form) => {
    form.querySelectorAll('select').forEach((select) => {
        select.addEventListener('change', () => form.requestSubmit());
    });
});

function updateProgress(section) {
    const track = section.querySelector('[data-carousel-track]');
    const progress = section.querySelector('[data-carousel-progress]');
    if (!track || !progress) return;
    const maxScroll = track.scrollWidth - track.clientWidth;
    const visible = maxScroll <= 0 ? 100 : (track.clientWidth / track.scrollWidth) * 100;
    const position = maxScroll <= 0 ? 0 : (track.scrollLeft / maxScroll) * (100 - visible);
    progress.style.setProperty('--progress-size', `${visible / 100}`);
    progress.style.setProperty('--progress-position', `${position}%`);
}

document.querySelectorAll('[data-carousel-track]').forEach((track) => {
    const section = track.closest('section');
    const step = () => Math.max(track.clientWidth * 0.82, track.querySelector('.carousel-slide')?.getBoundingClientRect().width ?? 260);
    section?.querySelector('[data-carousel-prev]')?.addEventListener('click', () => {
        track.scrollBy({ left: -step(), behavior: reducedMotion ? 'auto' : 'smooth' });
    });
    section?.querySelector('[data-carousel-next]')?.addEventListener('click', () => {
        track.scrollBy({ left: step(), behavior: reducedMotion ? 'auto' : 'smooth' });
    });
    track.addEventListener('scroll', () => updateProgress(section), { passive: true });
    new ResizeObserver(() => updateProgress(section)).observe(track);
    updateProgress(section);
});

document.querySelectorAll('[data-product-carousel]').forEach((section) => {
    const slides = [...section.querySelectorAll('[data-slide]')];
    section.querySelectorAll('[data-product-filter]').forEach((button) => {
        button.addEventListener('click', () => {
            const filter = button.dataset.productFilter.toLowerCase();
            section.querySelectorAll('[data-product-filter]').forEach((tab) => {
                const active = tab === button;
                tab.classList.toggle('is-active', active);
                tab.setAttribute('aria-pressed', String(active));
            });
            slides.forEach((slide) => {
                const text = slide.dataset.filterText ?? '';
                const show = filter === 'best sellers' || text.includes(filter.replaceAll(' ', ' ')) ||
                    (filter === 'anti acne' && /acne|breakout|salicylic/.test(text)) ||
                    (filter === 'skin brightening' && /bright|dull|tone|glow/.test(text)) ||
                    (filter === 'hair fall' && /hair|fall|anagrow/.test(text)) ||
                    (filter === 'dry skin' && /dry|urea|moistur/.test(text));
                slide.hidden = !show;
            });
            const track = section.querySelector('[data-carousel-track]');
            if (track) track.scrollTo({ left: 0, behavior: reducedMotion ? 'auto' : 'smooth' });
            updateProgress(section);
        });
    });
});

const videoDialog = document.querySelector('.video-dialog');
if (videoDialog) {
    const dialogImage = videoDialog.querySelector('[data-video-dialog-image]');
    const dialogTitle = videoDialog.querySelector('#video-dialog-title');
    document.querySelectorAll('[data-video-preview]').forEach((button) => {
        button.addEventListener('click', () => {
            dialogImage.src = button.dataset.image;
            dialogTitle.textContent = button.dataset.title;
            videoDialog.showModal();
        });
    });
    videoDialog.addEventListener('click', (event) => {
        if (event.target === videoDialog) videoDialog.close();
    });
}

document.querySelectorAll('.mobile-menu nav a').forEach((link) => {
    link.addEventListener('click', () => { link.closest('details')?.removeAttribute('open'); });
});
