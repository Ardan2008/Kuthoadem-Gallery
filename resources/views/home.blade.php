<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuthoadem Gallery</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
            /* Mencegah pergerakan patah-patah pada trackpad/scroll wheel */
            -webkit-font-smoothing: antialiased;
        }

        /* Optimasi durasi scroll untuk elemen reveal agar tidak kaku */
        .reveal {
            will-change: transform, opacity;
        }

        body { font-family: 'Inter', sans-serif; scroll-behavior: smooth; }
        .font-serif { font-family: 'Playfair Display', serif; }
        
        /* Reveal Animation */
        .reveal { opacity: 0; transform: translateY(30px); transition: all 1s cubic-bezier(0.22, 1, 0.36, 1); }
        .reveal.active { opacity: 1; transform: translateY(0); }

        /* Custom Mobile Menu */
        #mobileMenu {
            transition: all 0.6s cubic-bezier(0.77, 0, 0.175, 1);
            clip-path: circle(0% at 100% 0%);
        }
        #mobileMenu.active {
            clip-path: circle(150% at 100% 0%);
        }

        /* Floating Effect for Art Elements */
        @keyframes floating {
            0% { transform: translateY(0px) rotate(3deg); }
            50% { transform: translateY(-20px) rotate(1deg); }
            100% { transform: translateY(0px) rotate(3deg); }
        }
        .float-art { animation: floating 6s ease-in-out infinite; }



        /* Pastikan body tidak bisa di-scroll selama loading */
        body.loading {
            overflow: hidden !important;
            height: 100vh !important;
            position: fixed;
            width: 100%;
        }

        .marquee-left { animation: scrollLeft 40s linear infinite; }
        .marquee-right { animation: scrollRight 40s linear infinite; }

        @keyframes scrollLeft {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }
        @keyframes scrollRight {
            from { transform: translateX(-50%); }
            to { transform: translateX(0); }
        }

        #main-brand {
            text-shadow: 0 10px 40px rgba(0,0,0,0.5);
            -webkit-font-smoothing: antialiased;
        }

        #art-loader {
            will-change: opacity;
        }
    </style>
</head>
<body class="bg-[#fafafa] antialiased text-slate-900 overflow-x-hidden">

    <div id="art-loader" class="fixed inset-0 z-[99999] bg-[#050505] overflow-hidden touch-none pointer-events-auto">
        
        <div id="loader-content-wrap" class="relative w-full h-full flex items-center justify-center">
            
            <div class="absolute inset-0 flex flex-col justify-around opacity-[0.04] select-none pointer-events-none skew-y-[-12deg] scale-110">
                <h2 class="text-[15vw] font-black text-white whitespace-nowrap leading-none marquee-left">KUTHOADEM KUTHOADEM KUTHOADEM</h2>
                <h2 class="text-[15vw] font-black text-white whitespace-nowrap leading-none marquee-right">KUTHOADEM KUTHOADEM KUTHOADEM</h2>
                <h2 class="text-[15vw] font-black text-white whitespace-nowrap leading-none marquee-left">KUTHOADEM KUTHOADEM KUTHOADEM</h2>
            </div>

            <svg class="absolute inset-0 w-full h-full opacity-20 pointer-events-none" viewBox="0 0 1000 1000">
                <path class="art-line" d="M-100,200 Q500,0 1100,200" stroke="#C9A74E" stroke-width="1" fill="none" />
                <path class="art-line" d="M-100,800 Q500,1000 1100,800" stroke="#C9A74E" stroke-width="1" fill="none" />
                <circle class="art-line" cx="15%" cy="25%" r="60" stroke="#C9A74E" stroke-width="0.5" fill="none" />
                <line class="art-line" x1="0" y1="0" x2="1000" y2="1000" stroke="#C9A74E" stroke-width="0.2" />
            </svg>

            <div class="relative z-10 text-center">
                <div class="overflow-hidden">
                    <h1 id="main-brand" class="text-gray-300 font-serif italic text-[16vw] md:text-[12vw] leading-none tracking-tighter opacity-0 translate-y-full">
                        Kuthoadem
                    </h1>
                </div>
                <div id="sub-brand" class="flex items-center justify-center gap-4 mt-8 opacity-0">
                    <div class="w-12 h-[1px] bg-[#C9A74E]"></div>
                    <p class="text-[#C9A74E] tracking-[1.2em] text-[10px] md:text-sm uppercase font-light">Gallery</p>
                    <div class="w-12 h-[1px] bg-[#C9A74E]"></div>
                </div>
            </div>
        </div>

        <div id="swipe-container" class="absolute inset-0 z-[100000] translate-y-full">
            <svg class="absolute top-[-118px] w-full h-[120px] fill-[#C9A74E]" viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path d="M0,64L120,80C240,96,480,128,720,128C960,128,1200,96,1320,80L1440,64V120H0Z"></path>
            </svg>
            <div class="w-full h-full bg-[#C9A74E]"></div>
        </div>
    </div>

    <section class="relative min-h-screen w-full overflow-hidden bg-black flex flex-col">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-b from-black via-slate-950/80 to-black z-10"></div>
            <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&q=80&w=2000" 
                class="absolute inset-0 object-cover w-full h-full scale-110 animate-[pulse_10s_infinite] opacity-30" 
                alt="Masterpiece Art">
        </div>

        <nav class="relative z-50 flex items-center justify-between px-6 md:px-16 py-8 text-gray-300">
            <a href="/">
                <div class="text-2xl md:text-3xl font-bold tracking-[0.1em] uppercase font-serif text-gray-300">
                    Kuthoadem<span class="font-light italic opacity-70 ml-1 text-amber-400">Gallery</span>
                </div>
            </a>
            
            <div class="hidden xl:flex items-center gap-10 text-[11px] uppercase tracking-[0.3em] font-medium">
                <a href="/" class="group transition duration-300">Home <span class="block h-[1px] w-0 bg-[#C9A74E] transition-all group-hover:w-full"></span></a>
                <a href="/artists" class="group transition duration-300">Artists <span class="block h-[1px] w-0 bg-[#C9A74E] transition-all group-hover:w-full"></span></a>
                <a href="/gallery" class="group transition duration-300">Gallery <span class="block h-[1px] w-0 bg-[#C9A74E] transition-all group-hover:w-full"></span></a>
                <a href="/" class="px-6 py-2 border border-[#C9A74E]/50 text-[#C9A74E] hover:bg-[#C9A74E] hover:text-black transition-all duration-500 rounded-full text-[10px]">Promote Art</a>
            </div>

            <button id="hamburgerBtn" class="xl:hidden flex flex-col gap-2 items-end focus:outline-none group">
                <span class="w-8 h-[1px] bg-white group-hover:w-10 transition-all"></span>
                <span class="w-6 h-[1px] bg-[#C9A74E]"></span>
            </button>
        </nav>

        <div class="relative z-20 flex flex-col lg:flex-row items-center justify-between flex-grow px-6 md:px-20 py-10 lg:gap-0 gap-16">
            
            <div class="w-full lg:w-3/5">
                <span class="text-[#C9A74E] uppercase tracking-[0.5em] text-[10px] md:text-xs mb-6 block" data-aos="fade-up">
                    The New Renaissance
                </span>
                <h1 class="text-gray-300 text-6xl md:text-8xl lg:text-[10rem] font-serif leading-[0.9] mb-12" 
                    data-aos="fade-up" data-aos-delay="200">
                    Eternal <br> 
                    <span class="italic font-light md:ml-24 text-gray-300">Canvas</span>
                </h1>
                
                <div class="flex flex-col md:flex-row md:items-center gap-8" data-aos="fade-up" data-aos-delay="400">
                    <p class="text-gray-300 text-base md:text-lg max-w-sm font-light leading-relaxed border-l border-amber-400/50 pl-6">
                        A sanctuary where history converges with the digital era. Discover masterpieces that transcend time.
                    </p>
                </div>
            </div>

            <div class="w-full lg:w-2/5 flex justify-center lg:justify-end" data-aos="zoom-in" data-aos-delay="600">
                
                <div class="relative group [transform-style:preserve-3d] transition-transform duration-1000 hover:[transform:rotateY(-15deg)_rotateX(5deg)]">
                    
                    <div class="absolute -top-12 -right-8 w-24 h-24 border-r border-t border-amber-400/20 -z-10 hidden md:block [transform:translateZ(-20px)]"></div>
                    
                    <div class="float-art relative overflow-hidden w-64 md:w-80 h-[400px] md:h-[500px] 
                                border-[1px] border-amber-400/20 p-4 bg-slate-950/80 backdrop-blur-sm 
                                shadow-[0_20px_50px_rgba(0,0,0,0.8)] 
                                transition-all duration-700 
                                group-hover:border-amber-400/50 group-hover:shadow-amber-400/5
                                [transform-style:preserve-3d]">
                        
                        <div class="relative w-full h-[82%] overflow-hidden [transform:translateZ(40px)] transition-transform duration-700 group-hover:[transform:translateZ(70px)] shadow-2xl">
                            <img src="https://images.unsplash.com/photo-1582555172866-f73bb12a2ab3?auto=format&fit=crop&q=80&w=800" 
                                class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-1000 scale-110 group-hover:scale-100" 
                                alt="Featured Piece">
                            
                            <div class="absolute inset-0 bg-gradient-to-tr from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        </div>
                        
                        <div class="mt-6 flex flex-col gap-1 [transform:translateZ(60px)] transition-transform duration-700 group-hover:[transform:translateZ(90px)]">
                            <span class="text-[#C9A74E] text-[9px] uppercase tracking-widest font-bold drop-shadow-md">Current Spotlight</span>
                            <div class="flex justify-between items-baseline">
                                <h4 class="text-white font-serif italic text-xl drop-shadow-xl">The Veiled Flora</h4>
                                <span class="text-slate-400 text-[10px]">#021/2026</span>
                            </div>
                        </div>

                        <div class="absolute inset-0 pointer-events-none shadow-[inset_0_0_40px_rgba(0,0,0,0.5)]"></div>
                    </div>

                    <div class="absolute -bottom-10 left-1/2 -translate-x-1/2 w-40 h-4 bg-black/80 blur-xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-[#0a0a0a] min-h-screen">

    <section class="max-w-[1600px] mx-auto px-6 -translate-y-16 relative z-30">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
            <?php 
            $categories = [
                ['name' => 'Abstract', 'img' => '45'],
                ['name' => 'Figurative', 'img' => '46'],
                ['name' => 'Landscape', 'img' => '47'],
                ['name' => 'Poster', 'img' => '48'],
                ['name' => 'Mythology', 'img' => '49']
            ];
            foreach ($categories as $index => $cat): 
            ?>
                <a href="#" class="relative h-56 md:h-80 overflow-hidden group bg-[#1a1a1a] border border-white/5 shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-80 group-hover:opacity-40 transition-all z-10"></div>
                    <img src="https://picsum.photos/600/800?random=<?php echo $cat['img']; ?>" 
                        class="absolute inset-0 object-cover w-full h-full grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-[2s]" alt="">
                    <div class="absolute bottom-0 left-0 w-full p-6 z-20">
                        <span class="block text-[9px] text-gray-400 font-mono mb-2 opacity-0 group-hover:opacity-100 transition-all uppercase tracking-widest">0<?php echo $index + 1; ?> / COLLECTION</span>
                        <h3 class="text-gray-300 font-serif italic text-xl md:text-2xl group-hover:text-[#C9A74E] transition-colors"><?php echo $cat['name']; ?></h3>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    {{-- Artists Section --}}
    <?php
        $featured_artists = [
            [
                "name" => "Debora Lee",
                "origin" => "South Korea",
                "image" => "https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&q=80&w=800",
            ],
            [
                "name" => "Marcus Chen",
                "origin" => "Singapore",
                "image" => "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=800",
            ],
            [
                "name" => "Sarah Johnson",
                "origin" => "United Kingdom",
                "image" => "https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=800",
            ]
        ];
    ?>

    <div class="bg-[#0a0a0a] min-h-screen">
        <section class="relative py-32 bg-[#0a0a0a] overflow-hidden text-gray-400">
            <div class="absolute top-0 left-0 w-full h-full pointer-events-none opacity-[0.02] select-none uppercase font-black text-[20vw] leading-none text-white">
                Visionaries
            </div>

            <div class="max-w-[1440px] mx-auto px-8 relative z-10">
                <div class="flex flex-col md:flex-row justify-between items-start mb-24 gap-12">
                    <div class="md:w-1/2" data-aos="fade-right" data-aos-duration="1000">
                        <h2 class="text-[10px] uppercase tracking-[0.8em] text-[#C9A74E] font-bold mb-6">The Collective</h2>
                        <h3 class="text-6xl md:text-8xl font-serif italic leading-none text-gray-300">
                            Behind the <br> <span class="md:ml-20 text-gray-300">Mastery</span>
                        </h3>
                    </div>

                    <div class="md:w-1/3 mt-10 md:mt-24" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                        <p class="text-gray-400 text-sm leading-relaxed font-light border-l-2 border-[#C9A74E]/40 pl-8 mb-6">
                            We collaborate with artists who dare to challenge the status quo, blending ancestral techniques with the raw energy of the modern era.
                        </p>
                        
                        <div class="pl-10"> 
                            <a href="/artists" class="group inline-flex items-center gap-3 text-[#C9A74E] text-[10px] uppercase tracking-[0.3em] font-bold transition-all">
                                <span>Explore Full Artists</span>
                                <span class="w-12 h-[1px] bg-[#C9A74E]/30 transition-all group-hover:w-20 group-hover:bg-[#C9A74E]"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-20 md:gap-10">
                    <?php foreach ($featured_artists as $index => $artist): ?>
                        <div class="group" 
                            data-aos="fade-up" 
                            data-aos-delay="<?php echo ($index + 1) * 200; ?>" 
                            data-aos-duration="1000">
                            
                            <a href="/profile_art" class="block cursor-pointer">
                                
                                <div class="relative aspect-[4/5] overflow-hidden bg-[#1a1a1a] mb-8 shadow-2xl">
                                    <img src="<?php echo $artist['image']; ?>" 
                                        class="w-full h-full object-cover transition-all duration-[1.5s] ease-out grayscale group-hover:grayscale-0 group-hover:scale-105" 
                                        alt="<?php echo $artist['name']; ?>">
                                    
                                    <div class="absolute inset-0 bg-black/40 group-hover:bg-transparent transition-colors duration-500"></div>
                                </div>

                                <div class="relative text-center md:text-left">
                                    <h4 class="text-3xl font-serif text-gray-300 mb-2 group-hover:text-[#C9A74E] transition-colors duration-500 italic">
                                        <?php echo $artist['name']; ?>
                                    </h4>
                                    <div class="flex items-center justify-center md:justify-start gap-3">
                                        <span class="w-4 h-[1px] bg-[#C9A74E]/50 transition-all group-hover:w-8 group-hover:bg-[#C9A74E]"></span>
                                        <span class="text-[10px] uppercase tracking-[0.4em] text-[#C9A74E] font-medium">
                                            <?php echo $artist['origin']; ?>
                                        </span>
                                    </div>
                                </div>

                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>

    {{-- Gallery --}}
    <?php
    $featured_arts = [
        ["title" => "Whispers of the Orient", "medium" => "By Debora Lee", "year" => "2024", "price" => "$4,200", "image" => "https://images.unsplash.com/photo-1549490349-8643362247b5?auto=format&fit=crop&q=80&w=800"],
        ["title" => "The Silent Observer", "medium" => "By Marcus Chen", "year" => "19th Century", "price" => "$12,500", "image" => "https://images.unsplash.com/photo-1578301978693-85fa9c0320b9?auto=format&fit=crop&q=80&w=800"],
        ["title" => "Ethereal Bloom", "medium" => "By Alex Rivera", "year" => "2026", "price" => "$1,850", "image" => "https://images.unsplash.com/photo-1579783900882-c0d3dad7b119?auto=format&fit=crop&q=80&w=800"],
        ["title" => "Oceanic Abstract", "medium" => "By Jordan Smith", "year" => "2023", "price" => "$3,100", "image" => "https://images.unsplash.com/photo-1541963463532-d68292c34b19?q=80&w=800&auto=format&fit=crop"],
        ["title" => "Midnight Sculpt", "medium" => "By Sarah Johnson", "year" => "2025", "price" => "$950", "image" => "https://images.unsplash.com/photo-1576769267415-9642010aa962?auto=format&fit=crop&q=80&w=800"],
        ["title" => "The Architect's Dream", "medium" => "By Michael Brown", "year" => "2024", "price" => "$2,400", "image" => "https://images.unsplash.com/photo-1541963463532-d68292c34b19?auto=format&fit=crop&q=80&w=800"]
    ];
    ?>

    <section class="max-w-full bg-[#0a0a0a] py-32 px-8 overflow-hidden">
        <div class="max-w-[1440px] mx-auto">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-32 gap-12">
                <div data-aos="fade-up">
                    <span class="text-[#C9A74E] text-[10px] uppercase tracking-[0.8em] font-bold mb-6 block">Seasonal Collection</span>
                    <h2 class="text-6xl md:text-8xl font-serif italic text-gray-300 leading-none">Featured <br> <span class="text-gray-300">Curations</span></h2>
                    <div class="h-[1px] w-24 bg-[#C9A74E] mt-10"></div>
                </div>
                
                <div class="md:max-w-xs" data-aos="fade-up" data-aos-delay="200">
                    <p class="text-gray-400 text-sm leading-relaxed font-light border-l-2 border-[#C9A74E]/40 pl-8 mb-6">
                        A meticulous selection of masterpieces, bridging the gap between classical soul and contemporary vision.
                    </p>
                    
                    <div class="pl-8">
                        <a href="/gallery" class="group inline-flex items-center gap-3 text-[#C9A74E] text-[10px] uppercase tracking-[0.3em] font-bold transition-all">
                            Explore Full Gallery 
                            <span class="w-12 h-[1px] bg-[#C9A74E]/30 transition-all group-hover:w-20 group-hover:bg-[#C9A74E]"></span>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-24 items-start">
                <?php foreach ($featured_arts as $index => $art): ?>
                    <div class="group" 
                        data-aos="fade-up" 
                        data-aos-delay="<?php echo ($index % 3) * 150; ?>">
                        
                        <div class="relative overflow-hidden mb-10 bg-[#0f0f0f] p-4 shadow-2xl transition-all duration-700 group-hover:shadow-[#C9A74E]/5 group-hover:-translate-y-3">
                            
                            <div class="overflow-hidden aspect-[4/5] relative">
                                <img src="<?php echo $art['image']; ?>" 
                                    class="w-full h-full object-cover grayscale-[0.6] group-hover:grayscale-0 transition-all duration-[2s] ease-out group-hover:scale-105" 
                                    alt="<?php echo $art['title']; ?>">
                                
                                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center backdrop-blur-[2px]">
                                    <div class="transform translate-y-10 group-hover:translate-y-0 transition-all duration-500">
                                        <a href="profile_gallery" class="px-10 py-4 border border-[#C9A74E] text-[#C9A74E] text-[9px] uppercase tracking-[0.5em] hover:bg-[#C9A74E] hover:text-black transition-colors duration-300 cursor-pointer font-bold inline-block">
                                            View Work
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="absolute inset-0 border border-white/5 pointer-events-none"></div>
                        </div>
                        
                        <div class="px-1">
                            <div class="flex justify-between items-baseline mb-4">
                                <h3 class="font-serif text-2xl text-gray-300 group-hover:text-[#C9A74E] transition-colors duration-500 italic">
                                    <?php echo $art['title']; ?>
                                </h3>
                                <span class="h-[1px] flex-grow mx-6 bg-white/10 group-hover:bg-[#C9A74E]/30 transition-all"></span>
                                <span class="text-[#C9A74E] font-serif italic text-lg">
                                    <?php echo $art['price']; ?>
                                </span>
                            </div>
                            
                            <div class="flex justify-between items-center opacity-60 group-hover:opacity-100 transition-opacity">
                                <p class="text-[9px] text-gray-300 uppercase tracking-[0.3em] font-medium">
                                    <?php echo $art['medium']; ?>
                                </p>
                                <p class="text-[9px] text-gray-300 italic font-serif">
                                    <?php echo $art['year']; ?>
                                </p>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    {{-- Mobile menu --}}
    <div id="mobileMenu" class="fixed inset-0 z-[100] bg-[#f8f8f8] flex flex-col p-10 xl:hidden">
        <button id="closeMenuBtn" class="self-end text-slate-900 hover:text-amber-500 transition-colors focus:outline-none">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <div class="flex flex-col gap-8 mt-10">
            <span class="text-amber-600 text-[10px] uppercase tracking-[0.5em] font-bold">Discover</span>
            <a href="#" class="text-slate-900 text-4xl md:text-5xl font-serif italic border-b border-slate-200 pb-4 hover:pl-4 hover:text-amber-700 hover:border-amber-200 transition-all">Home</a>
            <a href="#" class="text-slate-900 text-4xl md:text-5xl font-serif italic border-b border-slate-200 pb-4 hover:pl-4 hover:text-amber-700 hover:border-amber-200 transition-all">Artists</a>
            <a href="#" class="text-slate-900 text-4xl md:text-5xl font-serif italic border-b border-slate-200 pb-4 hover:pl-4 hover:text-amber-700 hover:border-amber-200 transition-all">Gallery</a>
            <a href="#" class="text-slate-900 text-4xl md:text-5xl font-serif italic border-b border-slate-200 pb-4 hover:pl-4 hover:text-amber-700 hover:border-amber-200 transition-all">Contact</a>
        </div>
    </div>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        window.addEventListener('load', () => {
            // Inisialisasi AOS
            AOS.init({
                duration: 1000,
                once: true,
                disableMutationObserver: false,
            });

            // Jika menggunakan GSAP loader seperti di kode Anda, 
            // pastikan AOS merefresh posisi setelah loader hilang
            setTimeout(() => {
                AOS.refresh();
            }, 2000); 
        });

        window.addEventListener('load', () => {
            window.scrollTo(0, 0);

            const tl = gsap.timeline({
                onComplete: () => {
                    const loader = document.getElementById('art-loader');
                    loader.style.display = 'none';
                    document.body.classList.remove('loading');
                    // Aktifkan elemen reveal di website
                    document.querySelectorAll('.reveal').forEach(el => el.classList.add('active'));
                }
            });

            // 1. Munculkan elemen dekorasi (Garis)
            tl.from(".art-line", {
                opacity: 0,
                duration: 2,
                stagger: 0.1,
                ease: "power2.out"
            });

            // 2. Munculkan Brand Kuthoadem
            tl.to("#main-brand", {
                opacity: 1,
                y: 0,
                duration: 1.5,
                ease: "expo.out"
            }, "-=1.2");

            tl.to("#sub-brand", {
                opacity: 1,
                duration: 1,
                ease: "power2.out"
            }, "-=0.8");

            // 3. Jeda apresiasi
            tl.to({}, { duration: 1.2 });

            // 4. FINAL SWIPE (Sapu Bersih)
            tl.addLabel("exit");
            
            // Panel menyapu ke atas
            tl.to("#swipe-container", {
                y: "-120%", // Melampaui batas layar agar bersih
                duration: 1.4,
                ease: "expo.inOut"
            }, "exit");

            // SELURUH KONTEN IKUT TERDORONG KE ATAS (Sinkron)
            tl.to("#loader-content-wrap", {
                y: "-100%",
                duration: 1.4,
                ease: "expo.inOut"
            }, "exit");

            // Fade out loader secara halus di akhir
            tl.to("#art-loader", {
                opacity: 0,
                duration: 0.4
            }, "-=0.4");
        });

        // Mobile Menu Toggle
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const closeMenuBtn = document.getElementById('closeMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        hamburgerBtn.addEventListener('click', () => {
            mobileMenu.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        closeMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            document.body.style.overflow = '';
        });

        // Scroll Observer for Reveal Animations
        const observerOptions = { threshold: 0.15 };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

        // back to button logic
        window.addEventListener('scroll', function() {
            const btn = document.getElementById('backToTop');
            if (window.scrollY > 400) {
                btn.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');
                btn.classList.add('opacity-100', 'translate-y-0', 'pointer-events-all');
            } else {
                btn.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
                btn.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-all');
            }
        });

        // Logika scroll ke atas
        document.getElementById('backToTop').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>