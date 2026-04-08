<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <title>Kuthoadem Gallery | Artists Profile</title>
</head>
<body>
    @include('component.layout.navbar')

    @php
        $galleryData = [
                'home' => [
                [
                    'title' => 'The Golden Era',
                    'subtitle' => '4 items',
                    'main_img' => 'https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?q=80&w=800',
                    'side_img1' => 'https://images.unsplash.com/photo-1578301978693-85fa9c0320b9?q=80&w=400',
                    'side_img2' => 'https://images.unsplash.com/photo-1554188248-986adbb73be4?q=80&w=400',
                    'delay' => '100'
                ],
                [
                    'title' => 'Silent Dialogue',
                    'subtitle' => '6 items',
                    'main_img' => 'https://images.unsplash.com/photo-1549490349-8643362247b5?q=80&w=800',
                    'side_img1' => 'https://images.unsplash.com/photo-1554188248-986adbb73be4?q=80&w=400',
                    'side_img2' => 'https://images.unsplash.com/photo-1518998053901-5348d3961a04?q=80&w=400',
                    'delay' => '200'
                ],
                [
                    'title' => 'Ancient Echoes',
                    'subtitle' => '3 items',
                    'main_img' => 'https://images.unsplash.com/photo-1459908676235-d5f02a50184b?q=80&w=800',
                    'side_img1' => 'https://images.unsplash.com/photo-1541963463532-d68292c34b19?q=80&w=400',
                    'side_img2' => 'https://images.unsplash.com/photo-1513364776144-60967b0f800f?q=80&w=400',
                    'delay' => '300'
                ]
            ],
            'collections' => [
                [
                    'title' => 'Nostalgic Whisper',
                    'subtitle' => '4 items',
                    'main_img' => 'https://images.unsplash.com/photo-1578301978693-85fa9c0320b9?auto=format&fit=crop&q=80&w=800',
                    'side_img1' => 'https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?q=80&w=400',
                    'side_img2' => 'https://images.unsplash.com/photo-1549490349-8643362247b5?q=80&w=400',
                    'delay' => '100'
                ],
                [
                    'title' => 'Ethereal Shadows',
                    'subtitle' => '2 items',
                    'main_img' => 'https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&q=80&w=800',
                    'side_img1' => 'https://images.unsplash.com/photo-1518998053901-5348d3961a04?q=80&w=400',
                    'side_img2' => 'https://images.unsplash.com/photo-1554188248-986adbb73be4?q=80&w=400',
                    'delay' => '200'
                ],
                [
                    'title' => 'Midnight Muse',
                    'subtitle' => '8 items',
                    'main_img' => 'https://images.unsplash.com/photo-1459908676235-d5f02a50184b?auto=format&fit=crop&q=80&w=800',
                    'side_img1' => 'https://images.unsplash.com/photo-1541963463532-d68292c34b19?q=80&w=400',
                    'side_img2' => 'https://images.unsplash.com/photo-1513364776144-60967b0f800f?q=80&w=400',
                    'delay' => '300'
                ]
            ]
        ];
    @endphp

    {{-- content --}}
    <main class="bg-[#0a0a0a] min-h-screen pt-24 pb-12 px-6 lg:px-20" 
        x-data="{ tab: 'home' }" 
        x-init="
            $nextTick(() => { AOS.init(); }); 
            $watch('tab', value => { 
                setTimeout(() => { 
                    AOS.refreshHard(); 
                    AOS.init(); 
                }, 100); 
            })
        ">
        
        <header class="flex flex-col md:flex-row items-center md:items-end justify-between mb-16 border-b border-white/10 pb-10" data-aos="fade-down">
            <div class="flex items-center gap-8">
                <div class="relative flex items-center justify-center p-3">
                    <div class="absolute inset-0 rounded-full border-4 border-[#C9A74E]/30 shadow-[0_0_15px_rgba(201,167,78,0.2)]"></div>
                    
                    <div class="relative w-24 h-24 md:w-32 md:h-32 rounded-full p-1 bg-gradient-to-b from-[#C9A74E] via-[#E2C275] to-[#8C6F3A] shadow-inner">
                        
                        <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&q=80&w=200" 
                            alt="Artist Profile" 
                            class="w-full h-full rounded-full object-cover border-4 border-black/80 shadow-[inset_0_2px_10px_rgba(0,0,0,0.6)]">
                        
                        <div class="absolute inset-0 rounded-full bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
                    </div>
                </div>
                <div>
                    <h1 class="text-4xl md:text-6xl font-serif tracking-tighter italic">
                        <span class="bg-gradient-to-br from-gray-400 via-[#C9A74E] via-[#E2C275] to-gray-500 bg-clip-text text-transparent inline-block py-1">
                            GingerandCoPrintShop
                        </span>
                    </h1>
                    <p class="text-gray-400 mt-2 font-light tracking-widest text-[10px] uppercase">Joined December 2021</p>
                </div>
            </div>

            <nav class="mt-8 md:mt-0 flex gap-10 text-[12px] tracking-[0.4em] uppercase font-light font-serif">
                <button @click="tab = 'home'" 
                    :class="tab === 'home' ? 'text-[#C9A74E] italic font-medium' : 'text-gray-500 hover:text-white'" 
                    class="relative pb-2 transition-all duration-500 group">
                    Home
                    <span :class="tab === 'home' ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-50'" 
                        class="absolute bottom-0 left-0 w-full h-[1px] bg-[#C9A74E] transition-transform duration-500 origin-left"></span>
                </button>

                <button @click="tab = 'collections'" 
                    :class="tab === 'collections' ? 'text-[#C9A74E] italic font-medium' : 'text-gray-500 hover:text-white'" 
                    class="relative pb-2 transition-all duration-500 group">
                    Collections
                    <span :class="tab === 'collections' ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-50'" 
                        class="absolute bottom-0 left-0 w-full h-[1px] bg-[#C9A74E] transition-transform duration-500 origin-left"></span>
                </button>

                <button @click="tab = 'profile'" 
                    :class="tab === 'profile' ? 'text-[#C9A74E] italic font-medium' : 'text-gray-500 hover:text-white'" 
                    class="relative pb-2 transition-all duration-500 group">
                    Profile
                    <span :class="tab === 'profile' ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-50'" 
                        class="absolute bottom-0 left-0 w-full h-[1px] bg-[#C9A74E] transition-transform duration-500 origin-left"></span>
                </button>
            </nav>
        </header>

        {{-- SECTION: HOME --}}
        <template x-if="tab === 'home'">
            <section>
                <div class="flex items-center justify-between mb-12" data-aos="fade-right">
                    <h2 class="text-2xl font-serif text-gray-300 italic tracking-wide">Latest Collections</h2>
                    <div class="h-[1px] flex-grow ml-8 bg-gradient-to-r from-white/20 to-transparent"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($galleryData['home'] as $item)
                    <div class="group" data-aos="zoom-in-up" data-aos-delay="{{ $item['delay'] }}">
                        <a href="/review_gallery" class="block cursor-pointer">
                            {{-- Gaya Collage Gambar --}}
                            <div class="flex gap-1 aspect-[16/10] overflow-hidden mb-5 rounded-sm ring-1 ring-white/5 group-hover:ring-[#C9A74E]/40 transition-all duration-700">
                                <div class="w-2/3 h-full overflow-hidden bg-zinc-900">
                                    <img src="{{ $item['main_img'] }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-1000">
                                </div>
                                <div class="w-1/3 flex flex-col gap-1 h-full">
                                    <div class="h-1/2 bg-zinc-800 border-l border-black overflow-hidden">
                                        <img src="{{ $item['side_img1'] }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                                    </div>
                                    <div class="h-1/2 bg-zinc-800 border-l border-t border-black overflow-hidden">
                                        <img src="{{ $item['side_img2'] }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                                    </div>
                                </div>
                            </div>
                        </a>

                        {{-- Container Teks --}}
                        <div class="space-y-1">
                            <a href="/gallery/{{ Str::slug($item['title']) }}" class="inline-block group-hover:translate-x-1 transition-transform duration-500">
                                <h3 class="text-[#C9A74E] font-serif text-xl italic tracking-wide group-hover:text-gray-300 transition-colors duration-500">
                                    {{ $item['title'] }}
                                </h3>
                            </a>
                            <p class="text-[9px] text-gray-500 uppercase tracking-[0.2em]">
                                {{ $item['subtitle'] }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </template>

        {{-- SECTION: COLLECTIONS --}}
        <template x-if="tab === 'collections'">
            <section>
                <div class="flex items-center justify-between mb-12" data-aos="fade-right">
                    <h2 class="text-2xl font-serif text-gray-300 italic tracking-wide">Archive Collections</h2>
                    <div class="h-[1px] flex-grow ml-8 bg-gradient-to-r from-white/20 to-transparent"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($galleryData['collections'] as $col)
                    <div class="group" data-aos="zoom-in-up" data-aos-delay="{{ $col['delay'] }}">
                        <a href="/review_gallery" class="block cursor-pointer">
                            <div class="flex gap-1 aspect-[16/10] overflow-hidden mb-5 rounded-sm ring-1 ring-white/5 group-hover:ring-[#C9A74E]/40 transition-all duration-700">
                                <div class="w-2/3 h-full overflow-hidden bg-zinc-900">
                                    <img src="{{ $col['main_img'] }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-1000">
                                </div>
                                <div class="w-1/3 flex flex-col gap-1 h-full">
                                    <div class="h-1/2 bg-zinc-800 border-l border-black overflow-hidden">
                                        <img src="{{ $col['side_img1'] }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0">
                                    </div>
                                    <div class="h-1/2 bg-zinc-800 border-l border-t border-black overflow-hidden">
                                        <img src="{{ $col['side_img2'] }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0">
                                    </div>
                                </div>
                            </div>
                        </a>
                        
                        <div class="space-y-1">
                            <a href="/collections/{{ Str::slug($col['title']) }}">
                                <h3 class="text-[#C9A74E] font-serif text-xl italic tracking-wide group-hover:text-gray-300 transition-colors duration-500">
                                    {{ $col['title'] }}
                                </h3>
                            </a>
                            <p class="text-[9px] text-gray-500 uppercase tracking-[0.2em]">{{ $col['subtitle'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-16 flex items-center gap-6" data-aos="fade-up">
                    <div class="flex items-center gap-3 group/num cursor-pointer">
                        {{-- Kotak Angka Aktif --}}
                        <div class="w-10 h-10 flex items-center justify-center bg-zinc-900 text-gray-300 text-sm font-bold border border-white/5 
                                    group-hover/num:border-[#C9A74E]/50 group-hover/num:text-[#C9A74E] 
                                    group-hover/num:shadow-[0_0_15px_rgba(201,167,78,0.1)] transition-all duration-500">
                            01
                        </div>
                        
                        <span class="text-gray-700 font-light group-hover/num:text-[#C9A74E]/30 transition-colors duration-500">/</span>
                        
                        {{-- Angka Total --}}
                        <span class="text-[11px] uppercase tracking-[0.2em] font-medium text-gray-500 
                                    group-hover/num:text-gray-300 transition-colors duration-500">
                            12
                        </span>
                    </div>

                    <a href="#" class="group">
                        <div class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center bg-transparent 
                                    group-hover:bg-[#C9A74E] group-hover:border-[#C9A74E] 
                                    group-hover:shadow-[0_0_20px_rgba(201,167,78,0.3)] transition-all duration-500 ease-out">
                            <svg class="w-4 h-4 text-gray-300 group-hover:text-black transform group-hover:translate-x-0.5 transition-all duration-300" 
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M9 5l7 7-7 7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </a>
                </div>

                </section>
        </template>

        {{-- SECTION: PROFILE --}}
        <template x-if="tab === 'profile'">
            <section class="max-w-4xl mx-auto" data-aos="fade-up">
                <div class="bg-zinc-900/10 border border-white/5 p-10 md:p-16 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-[#C9A74E]/30 to-transparent"></div>
                    
                    <div class="mb-14" data-aos="fade-right" data-aos-delay="200">
                        <h2 class="text-xs tracking-[0.4em] uppercase text-[#C9A74E] font-medium mb-4">Identity</h2>
                        <div class="h-[1px] w-12 bg-[#C9A74E] mb-10"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-y-12 gap-x-8">
                        <div class="col-span-1" data-aos="fade-up" data-aos-delay="300">
                            <p class="text-[10px] tracking-[0.2em] uppercase text-gray-600 mb-2">Full Name</p>
                        </div>
                        <div class="col-span-2" data-aos="fade-up" data-aos-delay="400">
                            <p class="text-gray-300 font-serif text-2xl italic tracking-wide border-b border-white/5 pb-4">GingerandCoPrintShop</p>
                        </div>
                        </div>
                </div>
            </section>
        </template>
    </main>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


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
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1200,
                once: false, // Ubah ke false agar animasi jalan tiap pindah tab
                offset: 50,
                easing: 'ease-in-out-cubic',
                mirror: true // Opsional: agar saat scroll balik animasi tetap jalan
            });
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