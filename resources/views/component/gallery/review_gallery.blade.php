<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: '#C9A74E',
                        dark: '#0a0a0a',
                    }
                }
            }
        }
    </script>
    <title>Kuthoadem Gallery | Review Gallery</title>
    <style>
        html, body {
            background-color: #0a0a0a !important;
            color: #d1d5db !important;
            margin: 0;
            padding: 0;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #0a0a0a; }
        ::-webkit-scrollbar-thumb { background: #C9A74E; }

        /* Mencegah kebocoran background putih */
        .min-h-screen, main, section {
            background-color: transparent !important;
        }

        #modalImage {
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1), transform-origin 0.15s ease;
            will-change: transform, transform-origin;
        }

        #zoomIndicator.fade-out {
            animation: fade-out 0.4s ease forwards;
        }

        @keyframes fade-out {
            from { opacity: 1; backdrop-filter: blur(4px); }
            to { opacity: 0; backdrop-filter: blur(0px); }
        }

        /* Custom Scrollbar untuk Gallery Look */
        .custom-scrollbar::-webkit-scrollbar {
            width: 2px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(212, 175, 55, 0.2); /* Warna Gold transparan */
            transition: all 0.3s;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(212, 175, 55, 0.8);
        }

        /* Custom Styles for Modern Art Aesthetic */

        #commentOverlay {
            /* Background dengan tekstur noise halus agar terasa seperti kertas/kanvas */
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3仿真%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
            background-blend-mode: overlay;
        }

        #commentOverlay .max-w-md {
            /* Glassmorphism yang lebih artistik */
            backdrop-filter: blur(40px) saturate(150%);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        /* Elemen Dekoratif: Garis Vertikal tipis khas desain Modernist */
        #commentOverlay .max-w-md::before {
            content: '';
            position: absolute;
            top: 0;
            left: 20px;
            width: 1px;
            height: 100%;
            background: linear-gradient(to bottom, transparent, rgba(212, 175, 55, 0.1), transparent);
            pointer-events: none;
        }

        /* Judul dengan letter-spacing ekstrim untuk kesan mewah */
        h3 {
            letter-spacing: -0.02em;
            word-spacing: 0.1em;
        }

        /* Styling Scrollbar khusus agar tidak merusak estetika */
        .custom-scrollbar::-webkit-scrollbar {
            width: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(212, 175, 55, 0.3);
            border-radius: 20px;
        }

        /* Animasi Entry untuk pesan */
        .flex.gap-3 {
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Input Interaction */
        input::placeholder {
            color: rgba(255, 255, 255, 0.2);
            text-transform: lowercase;
            letter-spacing: 0.05em;
        }

        /* Warna Emas Spesifik (Art Gallery Gold) */
        .text-gold {
            color: #D4AF37;
            filter: drop-shadow(0 0 2px rgba(212, 175, 55, 0.2));
        }

        .bg-gold {
            background-color: #D4AF37;
        }

        /* Efek Border Hover */
        .border-white\/5 {
            transition: border-color 0.4s ease;
        }

        .max-w-md:hover .border-white\/5 {
            border-color: rgba(212, 175, 55, 0.2);
        }
    </style>
</head>
<body class="bg-dark text-gray-300 overflow-x-hidden">
    @include('component.layout.navbar')

    <main class="min-h-screen">
        <header class="max-w-7xl mx-auto pl-4 md:pl-6 pt-32 pb-20" data-aos="fade-right">
            <div class="relative">
                <h1 class="text-[10rem] md:text-[14rem] font-serif text-white/5 leading-[0.7] tracking-tighter absolute -top-16 -left-10 select-none pointer-events-none">
                    MYTHOLOGY
                </h1>
                
                <h1 class="relative z-10 text-8xl md:text-9xl font-serif text-gray-300 tracking-tighter leading-none">
                    Mythology<span class="text-gold">.</span>
                </h1>

                <div class="mt-12 flex items-center gap-5">
                    <a href="/artists_profile" class="group flex items-center gap-4 transition-all duration-500">
                        <div class="relative w-10 h-10 rounded-full border border-[#D4AF37]/30 p-0.5 transition-all duration-500 group-hover:border-[#D4AF37] flex items-center justify-center overflow-hidden">
                            
                            <svg class="absolute inset-0 m-auto w-5 h-5 text-zinc-600 group-hover:text-[#D4AF37] transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>

                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Michal" 
                                alt="Curator Profile" 
                                class="relative z-10 w-full h-full rounded-full object-cover opacity-80 group-hover:opacity-100 transition-all duration-500">
                            
                            <div class="absolute inset-0 bg-[#D4AF37]/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>
                        
                        <p class="text-sm font-medium tracking-wide text-zinc-400 group-hover:text-[#D4AF37] transition-colors duration-500">
                            By GingerandCoPrintShop
                        </p>
                    </a>
                    
                    <div class="w-1.5 h-1.5 rounded-full bg-zinc-700"></div>

                    <div class="flex items-center gap-2">
                        <span class="text-sm font-semibold text-zinc-300">03</span>
                        <span class="text-[13px] text-zinc-600 font-light uppercase tracking-[0.3em]">Collections</span>
                    </div>
                </div>
            </div>
        </header>

        <section class="max-w-7xl mx-auto pl-4 md:pl-6 mb-24">
            <div class="border-t border-b border-white/5 py-16">
                <div class="relative w-full max-w-2xl group">
                    <span class="absolute -top-8 left-0 text-[9px] uppercase tracking-[0.4em] text-gray-300 group-focus-within:text-gold transition-colors">
                        Search Archive
                    </span>
                    <div class="relative w-full">
                        <input type="text" placeholder="KEYWORDS..." 
                            class="bg-transparent py-6 w-full text-sm tracking-[0.5em] text-gray-300 placeholder:text-zinc-800 uppercase border-b border-zinc-800 focus:outline-none focus:border-transparent focus:ring-0 peer transition-all duration-300">
                        <span class="absolute bottom-0 left-0 h-[1px] bg-gold w-0 transition-all duration-700 peer-focus:w-full"></span>
                        <div class="absolute right-0 bottom-6 flex items-center text-zinc-600 peer-focus:text-gold transition-all duration-500 group-hover:translate-x-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 7l-10 10M7 7h10v10"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @php 
            $gallery = [
                [
                    'title' => 'Mythology', 
                    'author' => 'Johanna', 
                    'count' => 45, 
                    'main_img' => 'https://images.unsplash.com/photo-1578301978693-85fa9c0320b9?auto=format&fit=crop&q=80&w=800', 
                    'sub_img1' => 'https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&q=80&w=400', 
                    'sub_img2' => 'https://images.unsplash.com/photo-1549490349-8643362247b5?auto=format&fit=crop&q=80&w=400'
                ],
                [
                    'title' => 'Equestrian', 
                    'author' => 'Barnowl88', 
                    'count' => 209, 
                    'main_img' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?q=80&w=800', 
                    'sub_img1' => 'https://plus.unsplash.com/premium_photo-1668918112206-fc300eb16edb?w=500&auto=format&fit=crop&q=60', 
                    'sub_img2' => 'https://images.unsplash.com/photo-1600715151005-e6d44b9ef840?w=500&auto=format&fit=crop&q=60'
                ],
                [
                    'title' => 'Artko Public Drawing', 
                    'author' => 'Koza', 
                    'count' => 103, 
                    'main_img' => 'https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&q=80&w=800', 
                    'sub_img1' => 'https://images.unsplash.com/photo-1459908676235-d5f02a50184b?auto=format&fit=crop&q=80&w=400', 
                    'sub_img2' => 'https://images.unsplash.com/photo-1582555172866-f73bb12a2ab3?auto=format&fit=crop&q=80&w=400'
                ],
            ];
        @endphp

        <section class="px-8 md:px-20 pb-20">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-20">
                @foreach($gallery as $item)
                <div onclick="openModal('{{ $item['main_img'] }}', '{{ $item['title'] }}', '{{ $item['author'] }}', '{{ $item['count'] }}')" 
                    class="group block cursor-pointer" 
                    data-aos="fade-up">
                    
                    {{-- Container Gambar --}}
                    <div class="relative flex gap-2 h-[450px] overflow-hidden mb-8 transition-all duration-700 group-hover:shadow-[0_40px_80px_-20px_rgba(0,0,0,0.9)]">
                        
                        {{-- Gambar Utama (Besar) --}}
                        <div class="w-2/3 h-full overflow-hidden bg-zinc-900 grayscale group-hover:grayscale-0 transition-all duration-1000 ease-in-out">
                            <img src="{{ $item['main_img'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover scale-110 group-hover:scale-100 transition-transform duration-1000">
                        </div>

                        {{-- Gambar Samping (Kecil) --}}
                        <div class="w-1/3 flex flex-col gap-2">
                            <div class="h-1/2 overflow-hidden bg-zinc-900 grayscale group-hover:grayscale-0 transition-all duration-1000 delay-75">
                                <img src="{{ $item['sub_img1'] }}" class="w-full h-full object-cover">
                            </div>
                            <div class="h-1/2 overflow-hidden bg-zinc-900 relative grayscale group-hover:grayscale-0 transition-all duration-1000 delay-150">
                                <img src="{{ $item['sub_img2'] }}" class="w-full h-full object-cover opacity-30 group-hover:opacity-100 transition-opacity">
                                <div class="absolute inset-0 flex items-center justify-center bg-dark/60 group-hover:bg-transparent transition-all duration-500">
                                    <span class="text-gold font-serif italic text-2xl group-hover:scale-110 transition-transform">+{{ $item['count'] }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Border Overlay --}}
                        <div class="absolute inset-0 border border-gold/0 group-hover:border-gold/20 transition-all duration-700 pointer-events-none"></div>
                    </div>

                    {{-- Informasi Judul & Author --}}
                    <div class="space-y-4 px-2">
                        <div class="flex items-center gap-4">
                            <div class="h-[1px] w-0 group-hover:w-16 bg-gold transition-all duration-700 ease-out"></div>
                            <h3 class="text-3xl font-serif text-gray-300 group-hover:text-gold transition-colors duration-500 italic tracking-tight">
                                {{ $item['title'] }}
                            </h3>
                        </div>
                        <div class="flex justify-between items-center text-[10px] uppercase tracking-[0.4em] text-gray-500 pl-0 group-hover:pl-4 transition-all duration-700">
                            <span>By {{ $item['author'] }}</span>
                            <span class="text-gold/40 group-hover:text-gold">{{ $item['count'] }} pieces</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="max-w-7xl mx-auto mt-12 flex items-center gap-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 flex items-center justify-center bg-zinc-900 text-gray-300 text-sm font-bold border border-white/5">01</div>
                    <span class="text-gray-700 font-light">/</span>
                    <span class="text-[11px] uppercase tracking-[0.2em] font-medium text-gray-300">12</span>
                </div>
                <a href="#" class="group">
                    <div class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center bg-transparent group-hover:bg-gold group-hover:border-gold transition-all duration-500">
                        <svg class="w-4 h-4 text-gray-300 group-hover:text-black transform group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M9 5l7 7-7 7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </a>
            </div>
        </section>
    </main>

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

    <div id="artModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 md:p-8">
        <div class="absolute inset-0 bg-black/95 backdrop-blur-sm" onclick="closeModal()"></div>
        
        <div class="relative bg-zinc-900 border border-white/10 w-full max-w-5xl overflow-hidden flex flex-col md:flex-row shadow-2xl animate-in fade-in zoom-in duration-300">
            
            <button onclick="closeModal()" class="absolute top-6 right-6 z-[130] group outline-none">
                <div class="relative flex items-center justify-center w-12 h-12 transition-all duration-500 transform group-hover:rotate-90">
                    <div class="absolute inset-0 bg-white/0 group-hover:bg-white/5 rounded-full scale-0 group-hover:scale-100 transition-transform duration-500"></div>
                    <svg class="w-8 h-8 text-white/30 group-hover:text-gold transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M6 18L18 6M6 6l12 12" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </button>

            <div id="imageContainer" class="w-full md:w-2/3 bg-black flex items-center justify-center p-6 overflow-hidden relative group/zoom">
                <div class="relative overflow-hidden shadow-2xl">
                    <img id="modalImage" src="" alt="Artwork" 
                        class="max-h-[70vh] md:max-h-[80vh] object-contain transition-transform duration-500 ease-out cursor-zoom-in"
                        onmousemove="zoomIn(event)" 
                        onmouseleave="zoomOut(event)">
                    
                    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 pointer-events-none opacity-0 group-hover/zoom:opacity-100 transition-opacity duration-700">
                        <span class="text-[9px] text-white/30 uppercase tracking-[0.4em] whitespace-nowrap bg-black/20 backdrop-blur-sm px-4 py-2 border border-white/5">
                            Move cursor to explore details
                        </span>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/3 p-8 md:p-12 flex flex-col justify-center border-t md:border-t-0 md:border-l border-white/5 bg-zinc-900/50">
                <h2 id="modalTitle" class="text-4xl font-serif text-gray-300 mb-2"></h2>
                <p id="modalAuthor" class="text-gold tracking-[0.2em] uppercase text-xs mb-8"></p>
                
                <div class="space-y-6">
                    <div class="border-b border-white/5 pb-4">
                        <span class="text-zinc-500 text-[10px] uppercase tracking-widest block mb-1">Collection Info</span>
                        <p id="modalCount" class="text-gray-300 text-sm"></p>
                    </div>
                    
                    <p class="text-zinc-400 text-sm leading-relaxed font-light italic">
                        "This artwork is part of a curated collection showcasing the intersection of classical technique and modern vision."
                    </p>

                    <div class="mt-8 flex gap-3">
                        <button class="flex-1 bg-gold text-black py-3 text-[9px] font-bold uppercase tracking-[0.2em] hover:bg-white transition-all duration-300">
                            Download Art
                        </button>
                        
                        <button onclick="toggleCommentModal()" class="relative z-[130] w-12 h-12 flex items-center justify-center border border-gold/30 text-gold hover:bg-gold hover:text-black transition-all duration-300">
                            <svg class="w-5 h-5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </button>

                        <button class="w-12 h-12 flex items-center justify-center border border-gold/30 text-gold hover:bg-gold hover:text-black transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div id="commentOverlay" class="fixed inset-0 z-[140] bg-black/90 backdrop-blur-2xl hidden items-center justify-center p-6 transition-all duration-500">
                
                <div class="w-full max-w-md animate-in fade-in zoom-in duration-500 flex flex-col bg-zinc-900/50 rounded-3xl border border-white/5 h-[80vh] max-h-[600px] overflow-hidden">
                    
                    <div class="p-6 border-b border-white/10 flex justify-between items-center">
                        <div>
                            <h3 class="text-gray-300 font-serif italic text-2xl tracking-tight">Curator's Notes</h3>
                            <p class="text-[9px] text-gold uppercase tracking-[0.4em] mt-1">Community Discussion</p>
                        </div>
                        <button onclick="toggleCommentModal()" class="p-2 text-white/20 hover:text-gold transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-width="1.5"/></svg>
                        </button>
                    </div>

                    <div class="flex-1 overflow-y-auto p-6 space-y-6 custom-scrollbar">
                        <div class="flex gap-3 max-w-[90%]">
                            <div class="w-8 h-8 rounded-full bg-zinc-800 flex-shrink-0 flex items-center justify-center text-[10px] text-zinc-500 font-bold">AD</div>
                            <div class="bg-white/[0.03] border border-white/5 p-3 rounded-2xl rounded-tl-none">
                                <p class="text-[12px] text-zinc-400 font-light leading-relaxed">"Pencahayaan yang sangat dramatis. Terlihat seperti perpaduan antara Caravaggio."</p>
                            </div>
                        </div>

                        <div class="flex gap-3 flex-row-reverse max-w-[90%] ml-auto">
                            <div class="w-8 h-8 rounded-full bg-gold/20 border border-gold/40 flex-shrink-0 flex items-center justify-center text-[10px] text-gold font-bold">EV</div>
                            <div class="bg-gold/5 border border-gold/20 p-3 rounded-2xl rounded-tr-none text-right">
                                <p class="text-[12px] text-zinc-300 italic font-light">"I love how the textures pop out when zoomed in."</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <div class="relative flex items-center gap-3 bg-white/[0.02] border border-white/10 p-1.5 pl-5 rounded-full">
                            <input type="text" placeholder="Your thoughts..." class="flex-1 bg-transparent py-2 text-xs text-white outline-none italic">
                            <button class="bg-gold text-black p-2.5 rounded-full hover:bg-white transition-all">
                                <svg class="w-3.5 h-3.5 rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z" stroke-width="2.5"/></svg>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div> 
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // --- 1. LOGIKA ZOOM (Smooth & Intuitive) ---
        function zoomIn(event) {
            const img = event.currentTarget;
            const { left, top, width, height } = img.getBoundingClientRect();
            
            // Hitung posisi kursor dalam persen
            const x = ((event.clientX - left) / width) * 100;
            const y = ((event.clientY - top) / height) * 100;

            img.style.transformOrigin = `${x}% ${y}%`;
            img.style.transform = "scale(2.5)";
        }

        function zoomOut(event) {
            const img = event.currentTarget;
            img.style.transform = "scale(1)";
            img.style.transformOrigin = "center center";
        }

        // --- 2. LOGIKA MODAL UTAMA ---
        function openModal(img, title, author, count) {
            const modal = document.getElementById('artModal');
            
            // Set Data ke elemen modal
            document.getElementById('modalImage').src = img;
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalAuthor').innerText = author;
            document.getElementById('modalCount').innerText = count + " High Resolution Artworks";

            // Tampilkan Modal
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden'; // Lock scroll body
        }

        function closeModal() {
            const modal = document.getElementById('artModal');
            const commentOverlay = document.getElementById('commentOverlay');
            const modalImg = document.getElementById('modalImage');

            // Sembunyikan Modal Utama
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            
            // Reset Zoom Gambar agar saat buka gambar lain tidak miring
            if (modalImg) modalImg.style.transform = "scale(1)";

            // Pastikan Overlay Komentar juga ikut tertutup
            if (commentOverlay) {
                commentOverlay.classList.add('hidden');
                commentOverlay.classList.remove('flex');
            }
            
            document.body.style.overflow = 'auto'; // Unlock scroll body
        }

        // --- 3. LOGIKA KOMENTAR ---
        function toggleCommentModal() {
            const commentOverlay = document.getElementById('commentOverlay');
            
            if (commentOverlay.classList.contains('hidden')) {
                commentOverlay.classList.remove('hidden');
                commentOverlay.classList.add('flex'); // Pakai flex agar konten di tengah
            } else {
                commentOverlay.classList.add('hidden');
                commentOverlay.classList.remove('flex');
            }
        }

        // --- 4. LOGIKA PENUTUPAN MODAL UTAMA JUGA MENUTUP OVERLAY KOMENTAR ---
        function closeModal() {
            const modal = document.getElementById('artModal');
            const commentOverlay = document.getElementById('commentOverlay');

            modal.classList.add('hidden');
            modal.classList.remove('flex');
            
            // Pastikan overlay komentar ikut tertutup saat modal utama ditutup
            if (commentOverlay) {
                commentOverlay.classList.add('hidden');
                commentOverlay.classList.remove('flex');
            }
            
            document.body.style.overflow = 'auto';
        }

        AOS.init({ duration: 1200, once: true, offset: 50, easing: 'ease-in-out-cubic' });
        const btn = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 500) {
                btn.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');
                btn.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');
            } else {
                btn.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
                btn.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
            }
        });
        btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    </script>
</body>
</html>