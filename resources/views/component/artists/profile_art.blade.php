<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600&family=Playfair+Display:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Kuthoadem Gallery | Artist Profile</title>
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #0a0a0a; color: #94a3b8; 
        } 

        .font-serif { 
            font-family: 'Playfair Display', serif; 
        }
        
        .text-gold { 
            color: #C9A74E; 
        }

        .bg-gold { 
            background-color: #C9A74E; 
        }

        .border-gold { 
            border-color: #C9A74E; 
        }

        .smooth-transition {
            transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        }
    </style>
</head>
<body class="antialiased selection:bg-gold selection:text-black">
    
    @include('component.layout.navbar')

    <section class="relative z-20 py-24 px-8 md:px-20">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center lg:items-start gap-12 md:gap-20">
                
                <div class="relative flex-shrink-0" data-aos="fade-up" data-aos-duration="2000">
                    <div class="absolute -inset-3 border border-[#C9A74E]/10 rounded-full"></div>
                    
                    <div class="w-48 h-48 md:w-64 md:h-64 rounded-full overflow-hidden border border-[#C9A74E]/20">
                        <img src="https://images.unsplash.com/photo-1582555172866-f73bb12a2ab3?q=80&w=1000&auto=format&fit=crop" 
                            class="w-full h-full object-cover grayscale hover:grayscale-0 hover:scale-110 transition-transform duration-[3s] ease-out" 
                            alt="Alphonse Mucha">
                    </div>
                </div>

                <div class="flex-grow text-center lg:text-left pt-4">
                    <div class="flex flex-col lg:flex-row lg:items-baseline gap-4 md:gap-8 mb-4">
                        <h2 class="text-5xl md:text-7xl font-serif font-bold text-gray-300 tracking-tight">
                            Alphonse Mucha
                        </h2>
                    </div>

                    <p class="text-gold/60 font-sans tracking-[0.4em] text-[11px] uppercase mb-10 font-medium">
                        Czech, 1860 — 1939
                    </p>

                    <div class="relative max-w-4xl">
                        <div id="bioText" class="text-slate-300/90 text-lg md:text-xl leading-relaxed font-light transition-all duration-1000 ease-in-out overflow-hidden max-h-[120px]">
                            <p>
                                Alfons Maria Mucha, known internationally as <span class="text-gray-300 font-semibold">Alphonse Mucha</span>, 
                                was a prolific Czech painter, illustrator, and graphic artist who lived in Paris during the height of the Art Nouveau period. 
                                He rose to sudden fame through his stylized and decorative theatrical posters, most notably those of the legendary actress Sarah Bernhardt, which revolutionized the visual language of advertisement in the late 19th century.
                            </p>

                            <p class="mt-6">
                                His distinctive artistic style, often referred to as <span class="text-gold">"Le Style Mucha,"</span> became synonymous with the era. 
                                It featured beautiful young women in flowing, Neoclassical-looking robes, often surrounded by lush, intricate floral patterns and ornate circular haloes reminiscent of stained glass. 
                                Beyond posters, his creative genius extended into jewelry design, interior decor, and tapestries, all embodying a sense of organic harmony and ethereal elegance.
                            </p>

                            <p class="mt-6 text-slate-400">
                                In the second chapter of his illustrious career, at the age of 43, Mucha returned to his homeland in the Bohemia-Moravia region. 
                                He spent nearly two decades dedicated to his masterpiece, <span class="italic text-gray-300">The Slav Epic</span>—a series of twenty monumental canvases depicting the history and mythology of the Slavic peoples. 
                                This work was his profound tribute to national identity, moving away from commercial art toward a more spiritual and historical narrative.
                            </p>

                            <p class="mt-6 text-slate-400">
                                Today, Mucha's legacy remains a cornerstone of decorative arts. His ability to blend delicate organic forms with precise geometric structures created a timeless visual balance that continues to influence modern graphic design and contemporary illustration worldwide.
                            </p>
                        </div>
                        
                        <div id="textOverlay" class="absolute bottom-0 left-0 w-full h-20 bg-gradient-to-t from-[#0a0a0a] to-transparent transition-opacity duration-700"></div>
                    </div>
                    
                    <div class="mt-8">
                        <button id="readMoreBtn" class="group flex items-center gap-4 text-gray-300 hover:text-gold transition-all duration-300">
                            <span id="btnLine" class="h-[1px] w-12 bg-[#C9A74E] group-hover:w-20 transition-all"></span>
                            <span id="btnText" class="uppercase tracking-[0.4em] text-[10px] font-bold">Read Full Biography</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-0 pb-20 px-8 md:px-20 -mt-4">
        <div class="max-w-7xl mx-auto">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-20 gap-8 border-b border-white/5 pb-10">
                
                <div class="relative group">
                    <div class="flex items-baseline gap-6 relative z-10">
                        <span class="text-6xl font-serif text-gray-300 leading-none tracking-tighter transition-all duration-700 group-hover:italic group-hover:text-gold">
                            10
                        </span>
                        <div class="flex flex-col">
                            <span class="text-gold text-[8px] uppercase tracking-[0.8em] font-bold mb-1">Archive</span>
                            <span class="text-slate-500 uppercase tracking-[0.4em] text-[10px] font-medium">Items Collection</span>
                        </div>
                    </div>
                    <div class="absolute -bottom-2 left-0 w-0 h-[1px] bg-[#C9A74E]/50 group-hover:w-full transition-all duration-1000"></div>
                </div>

                <div class="relative flex items-center group w-full md:w-96">
                    <span class="absolute left-0 text-[9px] uppercase tracking-[0.3em] text-gray-300 font-bold group-focus-within:text-[#C9A74E] group-hover:text-slate-400 transition-colors duration-500">
                        Search //
                    </span>

                    <input type="text" placeholder="TYPE OF ART..." 
                        class="bg-transparent border-b border-white/10 rounded-none py-2 pl-24 pr-10 w-full text-xs tracking-[0.2em] text-white focus:outline-none focus:border-[#C9A74E]/50 transition-all placeholder:text-slate-800 placeholder:italic uppercase">
                    
                    <svg class="absolute right-0 w-4 h-4 text-slate-700 transition-all duration-700 transform group-hover:rotate-90 group-hover:text-[#C9A74E] group-focus-within:text-[#C9A74E]" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="square" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>

                    <div class="absolute -bottom-[2.5px] -right-[1px] w-1 h-1 bg-[#C9A74E] rounded-full opacity-0 group-focus-within:opacity-100 group-hover:opacity-100 transition-all duration-500 shadow-[0_0_8px_#C9A74E]"></div>
                </div>
            </div>

            @php
                $artists = [
                    [
                        'name' => 'Monaco, Monte-Carlo. Chemins de Fer P.L.M.', 
                        'year' => '1897', 
                        'category' => 'Posters', 
                        'image' => 'https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&q=80&w=800',
                        'offset' => false
                    ],
                    [
                        'name' => 'La Passion d\'Edmond Haraucourt', 
                        'year' => '1901', 
                        'category' => 'Mythology', 
                        'image' => 'https://images.unsplash.com/photo-1582555172866-f73bb12a2ab3?auto=format&fit=crop&q=80&w=800',
                        'offset' => true
                    ],
                    [
                        'name' => 'The Starry Night', 
                        'year' => '1889', 
                        'category' => 'Abstract', 
                        'image' => 'https://images.unsplash.com/photo-1541450805268-4822a3a774ca?auto=format&fit=crop&q=80&w=800',
                        'offset' => false
                    ],
                    [
                        'name' => 'The Kiss', 
                        'year' => '1907', 
                        'category' => 'Figurative', 
                        'image' => 'https://images.unsplash.com/photo-1615412704911-55d589229864?auto=format&fit=crop&q=80&w=800',
                        'offset' => true
                    ],
                    [
                        'name' => 'Water Lilies', 
                        'year' => '1919', 
                        'category' => 'Abstract', 
                        'image' => 'https://plus.unsplash.com/premium_photo-1733317297744-23736fcc1995?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8d2F0ZXIlMjBsaWxpZXN8ZW58MHx8MHx8fDA%3D',
                        'offset' => false
                    ],
                    [
                        'name' => 'The Great Wave off Kanagawa', 
                        'year' => '1831', 
                        'category' => 'Mythology', 
                        'image' => 'https://images.unsplash.com/photo-1578301978018-3005759f48f7?auto=format&fit=crop&q=80&w=800',
                        'offset' => true
                    ],
                    [
                        'name' => 'Self-Portrait with Thorn Necklace', 
                        'year' => '1940', 
                        'category' => 'Figurative', 
                        'image' => 'https://images.unsplash.com/photo-1580136579312-94651dfd596d?auto=format&fit=crop&q=80&w=800',
                        'offset' => false
                    ],
                    [
                        'name' => 'Guernica', 
                        'year' => '1937', 
                        'category' => 'Abstract', 
                        'image' => 'https://plus.unsplash.com/premium_photo-1676827547885-4179513a7a68?q=80&w=450&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                        'offset' => true
                    ],
                    [
                        'name' => 'The Scream', 
                        'year' => '1893', 
                        'category' => 'Figurative', 
                        'image' => 'https://images.unsplash.com/photo-1553465528-5a213ccc0c7b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c2NyZWFtfGVufDB8fDB8fHww',
                        'offset' => false
                    ],
                    [
                        'name' => 'Landscape at Hakone', 
                        'year' => '1922', 
                        'category' => 'Posters', 
                        'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&q=80&w=800',
                        'offset' => true
                    ],
                ];
            @endphp

            <div class="max-w-[1600px] mx-auto px-8 pt-10 pb-32 lg:pt-14 bg-[#0a0a0a]">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-y-32 gap-x-12">
                    @foreach($artists as $index => $artist)
                        <a href="javascript:void(0)" 
                        onclick="openModal('{{ $artist['image'] }}', '{{ $artist['name'] }}', '{{ $artist['category'] }}', '{{ $artist['count'] ?? 1 }}')"
                        data-aos="fade-up" 
                        data-aos-delay="{{ ($index % 5) * 100 }}"
                        data-aos-duration="1000"
                        class="group cursor-pointer block {{ ($artist['offset'] ?? false) ? 'lg:mt-24' : '' }} smooth-transition">
                            
                            <div class="relative aspect-[10/14] mb-10 bg-zinc-900 border border-white/5 group-hover:border-[#C9A74E]/20 overflow-visible smooth-transition">
                                <div class="absolute -top-4 -left-4 flex items-center gap-3 opacity-0 group-hover:opacity-100 smooth-transition transform translate-y-2 group-hover:translate-y-0 z-10">
                                    <div class="w-1.5 h-1.5 bg-[#C9A74E] rounded-full"></div>
                                    <div class="w-12 h-[0.5px] bg-[#C9A74E]/40"></div>
                                </div>
                                
                                <div class="w-full h-full overflow-hidden relative">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-60 group-hover:opacity-30 smooth-transition z-10"></div>
                                    <img src="{{ $artist['image'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[1.2s] ease-out">
                                </div>
                            </div>

                            <div class="px-1 text-center sm:text-left">
                                <h3 class="text-lg md:text-xl font-serif text-gray-300 mb-5 tracking-wide smooth-transition group-hover:text-gold group-hover:italic group-hover:translate-x-2">
                                    {{ $artist['name'] }}
                                </h3>
                                <div class="flex items-center justify-center sm:justify-start gap-3 mb-4">
                                    <div class="w-1 h-1 bg-gold rounded-full opacity-20 group-hover:opacity-100 smooth-transition"></div>
                                    <div class="h-[1px] bg-[#C9A74E]/20 w-8 smooth-transition group-hover:w-16 group-hover:bg-[#C9A74E]/50"></div>
                                </div>
                                <p class="text-[9px] uppercase tracking-[0.6em] text-slate-500 font-medium group-hover:text-slate-200 smooth-transition">
                                    {{ $artist['category'] }} // {{ $artist['year'] }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="mt-6 flex items-center gap-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 flex items-center justify-center bg-black text-white text-sm font-bold border border-white/5">01</div>
                    <span class="text-slate-700 font-light">/</span>
                    <span class="text-[11px] uppercase tracking-[0.2em] font-medium text-slate-500">12</span>
                </div>
                <a href="#" class="group">
                    <div class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center bg-transparent group-hover:bg-[#C9A74E] group-hover:border-[#C9A74E] transition-all duration-500">
                        <svg class="w-4 h-4 text-slate-300 group-hover:text-black transform group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M9 5l7 7-7 7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </section>

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
                        <button class="flex-1 bg-gold text-black py-3 text-[9px] font-bold uppercase tracking-[0.2em] border border-gold hover:bg-[#C9A74E] hover:border-[#C9A74E] transition-all duration-300">
                            Download Art
                        </button>
                        
                        <button onclick="toggleCommentModal()" class="relative z-[130] w-12 h-12 flex items-center justify-center border border-[#C9A74E] text-gold hover:bg-[#C9A74E] hover:border-[#C9A74E] hover:text-black transition-all duration-300">
                            <svg class="w-5 h-5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </button>

                        <button class="w-12 h-12 flex items-center justify-center border border-[#C9A74E] text-gold hover:bg-[#C9A74E] hover:border-[#C9A74E] hover:text-black transition-all duration-300">
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
                            <div class="w-8 h-8 rounded-full bg-gold/20 border border-[#C9A74E] flex-shrink-0 flex items-center justify-center text-[10px] text-gold font-bold">EV</div>
                            <div class="bg-gold/5 border border-[#C9A74E] p-3 rounded-2xl rounded-tr-none text-right">
                                <p class="text-[12px] text-gray-300 italic font-light">"I love how the textures pop out when zoomed in."</p>
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
        AOS.init({
            duration: 1000, // durasi animasi 1 detik
            once: true,     // animasi hanya jalan sekali saat scroll ke bawah
            offset: 100,    // mulai animasi 100px sebelum elemen terlihat
            easing: 'ease-out-cubic', // tipe pergerakan 
        });

        // --- LOGIKA ZOOM (Smooth & Intuitive) ---
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

        // --- LOGIKA MODAL UTAMA ---
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

        // --- LOGIKA KOMENTAR ---
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

        // --- LOGIKA PENUTUPAN MODAL UTAMA JUGA MENUTUP OVERLAY KOMENTAR ---
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

        // Logika Back to Top Anda yang sudah ada...
        window.addEventListener('scroll', function() {
            const btn = document.getElementById('backToTop');
            if (window.scrollY > 400) {
                btn.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');
                btn.classList.add('opacity-100', 'translate-y-0');
            } else {
                btn.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
                btn.classList.remove('opacity-100', 'translate-y-0');
            }
        });

        document.getElementById('backToTop').addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        const bioText = document.getElementById('bioText');
        const readMoreBtn = document.getElementById('readMoreBtn');
        const btnText = document.getElementById('btnText');
        const btnLine = document.getElementById('btnLine');
        const textOverlay = document.getElementById('textOverlay');

        readMoreBtn.addEventListener('click', function() {
            // Cek apakah sedang tertutup (max-height adalah 120px)
            const isCollapsed = bioText.style.maxHeight === '120px' || bioText.style.maxHeight === '';

            if (isCollapsed) {
                // Membuka: Set max-height ke scrollHeight (tinggi asli konten)
                bioText.style.maxHeight = bioText.scrollHeight + "px";
                bioText.style.opacity = "1";
                
                // Sembunyikan efek pudar
                textOverlay.style.opacity = "0";
                
                // Update UI Tombol
                btnText.innerText = 'Show Less';
                btnLine.style.width = "80px"; // w-20
            } else {
                // Menutup: Kembalikan ke tinggi awal
                bioText.style.maxHeight = "120px";
                
                // Munculkan kembali efek pudar
                textOverlay.style.opacity = "1";
                
                // Update UI Tombol
                btnText.innerText = 'Read Full Biography';
                btnLine.style.width = "48px"; // w-12

                // Scroll ke atas sedikit jika user menutup saat berada di bawah
                setTimeout(() => {
                    bioText.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 300);
            }
        });

        // Logika Back to Top
        window.addEventListener('scroll', function() {
            const btn = document.getElementById('backToTop');
            if (window.scrollY > 400) {
                btn.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');
                btn.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');
            } else {
                btn.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
                btn.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
            }
        });

        document.getElementById('backToTop').addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>