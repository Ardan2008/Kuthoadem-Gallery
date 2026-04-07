<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Kuthoadem Gallery | Artists Profile</title>
</head>
<body>
    @include('component.layout.navbar')

    @include('component.layout.footer')

    <button id="backToTop" class="fixed bottom-12 right-12 z-[60] flex items-center justify-center group opacity-0 translate-y-10 transition-all duration-700 pointer-events-none">
        <div class="relative flex items-center justify-center w-12 h-12 border border-white/10 group-hover:border-gold rounded-full transition-all duration-500 bg-black/40 backdrop-blur-md shadow-lg overflow-hidden group-hover:shadow-[0_0_20px_rgba(201,167,78,0.3)]">
            <svg class="w-5 h-5 text-slate-400 group-hover:text-gold transition-transform duration-500 group-hover:-translate-y-12" 
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 15l7-7 7 7"/>
            </svg>
            <svg class="absolute w-5 h-5 text-black translate-y-12 group-hover:translate-y-0 transition-transform duration-500" 
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 15l7-7 7 7"/>
            </svg>
            <div class="absolute inset-0 bg-gold scale-0 group-hover:scale-100 transition-transform duration-500 -z-10 rounded-full"></div>
        </div>
    </button>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200,
            once: true,
            offset: 50,
            easing: 'ease-in-out-cubic',
        });

        const btn = document.getElementById('backToTop');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 600) {
                btn.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');
                btn.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');
            } else {
                btn.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
                btn.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
            }
        });

        btn.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>