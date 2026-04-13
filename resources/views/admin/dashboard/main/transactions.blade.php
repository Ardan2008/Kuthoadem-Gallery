<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuthoadem Gallery | Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #333; border-radius: 10px; }

        @keyframes shimmer { to { background-position: 200% center; } }
        .animate-shimmer { animation: shimmer 3s linear infinite; }
        
        .hidden-modal { display: none !important; }
        
        .fade-in { animation: fadeIn 0.2s ease-out; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .swal2-container {
            z-index: 10001 !important;
        }

        /* Animasi Getar */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
        }

        .shake-error {
            animation: shake 0.3s ease-in-out;
            border-color: #ef4444 !important; /* Warna merah (Red-500) */
            box-shadow: 0 0 10px rgba(239, 68, 68, 0.2);
        }

        /* top artwoks */

        /* 1. Sembunyikan scrollbar visual namun fungsi scroll tetap aktif */
        .no-scrollbar::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }

        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        /* 2. Pseudo-elements untuk menciptakan bayangan gradien saat scroll */
        .scroll-shadow-container::before,
        .scroll-shadow-container::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            height: 40px; /* Tinggi area bayangan */
            z-index: 20; /* Harus lebih tinggi dari z-10 konten */
            pointer-events: none; /* Klik tembus ke konten di bawahnya */
            transition: opacity 0.3s ease;
        }

        /* Bayangan Atas (Gradien dari Hitam ke Transparan) */
        .scroll-shadow-container::before {
            top: 0;
            background: linear-gradient(to bottom, #1a1a1a 0%, rgba(26, 26, 26, 0) 100%);
        }

        /* Bayangan Bawah (Gradien dari Transparan ke Hitam) */
        .scroll-shadow-container::after {
            bottom: 0;
            background: linear-gradient(to top, #1a1a1a 0%, rgba(26, 26, 26, 0) 100%);
        }
    </style>
</head>
<body class="bg-[#1a1a1a] text-gray-300 antialiased font-sans">

    <div class="flex h-screen overflow-hidden">
        @include('admin.dashboard.layouts.sidebar')

        <div class="flex flex-col flex-1 min-w-0 overflow-hidden bg-[#1a1a1a]">
            <header class="flex items-center justify-between p-5 border-b bg-[#1a1a1a] border-neutral-800/60 sticky top-0 z-30">
                <div class="flex items-center gap-5">
                    <button onclick="handleNavDrawer(true, event)" class="p-2.5 lg:hidden text-gray-400 hover:text-yellow-500 rounded-xl">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                    <div class="flex flex-col leading-tight">
                        <h1 class="text-xl font-black text-white lg:text-3xl italic uppercase">
                            <span class="bg-gradient-to-r from-white via-gray-400 to-white bg-[length:200%_auto] bg-clip-text text-transparent animate-shimmer">
                                Admin Dashboard
                            </span>
                        </h1>
                        <p class="text-[10px] md:text-xs font-bold tracking-[0.3em] uppercase text-[#C9A74E] mt-1 opacity-90 flex items-center gap-2">
                            <span class="h-[1px] w-8 bg-[#C9A74E]/50"></span>
                            Welcome to your operational control center.
                        </p>
                    </div>
                </div>

                <div class="relative">
                    <button onclick="toggleProfileDropdown(event)" id="profileButton" 
                        class="flex items-center p-1.5 rounded-full border border-neutral-800 bg-neutral-900/50 hover:border-yellow-500/50 transition-all group">
                        
                        <img src="https://api.dicebear.com/8.x/notionists/svg?seed=user" 
                            class="w-10 h-10 lg:w-12 lg:h-12 rounded-full ring-2 ring-neutral-800 group-hover:ring-yellow-500/30 transition-all">
                        
                        <div class="hidden md:block px-4 text-left">
                            <p class="text-sm font-bold text-gray-300 tracking-wide">Alex Morgan</p>
                            <p class="text-[11px] text-gray-500 font-medium">Super Admin</p>
                        </div>
                    </button>

                    <div id="profileDropdown" class="absolute right-0 mt-4 w-56 rounded-2xl border border-neutral-800 bg-neutral-900 shadow-2xl z-50 hidden-modal fade-in">
                        <div class="p-2">
                            <button onclick="openSettings()" class="w-full flex items-center gap-3 px-3 py-2.5 text-sm text-gray-400 hover:bg-neutral-800 rounded-xl transition-all">
                                <span>Settings</span>
                            </button>
                            <button onclick="openLogoutModal()" class="w-full mt-1 flex items-center gap-3 px-3 py-2.5 text-sm text-red-400 hover:bg-red-500/10 rounded-xl transition-all">
                                <span>Log Out</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6 lg:p-10 custom-scrollbar">
                @yield('content')

                <div class="flex-1 overflow-y-auto p-6 lg:p-10 custom-scrollbar min-h-screen">
                    <div class="max-w-7xl mx-auto space-y-8">
                        
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                            
                            <div class="lg:col-span-2 bg-[#1a1a1a] border border-neutral-800 rounded-[2.5rem] p-8 relative overflow-hidden group">
                                <div class="flex justify-between items-center mb-8 relative z-10">
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-200">Last Week Transactions</h2>
                                        <p class="text-gray-500 text-sm mt-1">Real-time sales performance overview</p>
                                    </div>
                                    
                                    <div class="relative custom-dropdown">
                                        <button type="button" onclick="this.nextElementSibling.classList.toggle('hidden')" 
                                                class="text-gray-500 hover:text-[#C9A74E] transition-all p-2 rounded-xl hover:bg-neutral-800/50">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu hidden absolute right-0 mt-2 w-56 bg-neutral-900 border border-neutral-800 rounded-2xl shadow-2xl z-[110] backdrop-blur-xl">
                                            <div class="py-2">
                                                <div class="px-4 py-2 text-[10px] font-black text-gray-600 uppercase tracking-widest">Options</div>
                                                <button class="w-full text-left px-4 py-3 text-sm text-gray-400 hover:bg-neutral-800 hover:text-[#C9A74E] flex items-center gap-3 transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                    Export Data
                                                </button>
                                                <button class="w-full text-left px-4 py-3 text-sm text-gray-400 hover:bg-neutral-800 hover:text-[#C9A74E] flex items-center gap-3 transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                                    Refresh
                                                </button>
                                                <hr class="border-neutral-800 my-1 mx-2">
                                                <button class="w-full text-left px-4 py-3 text-sm text-red-500/80 hover:bg-red-500/10 flex items-center gap-3 transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                    Remove Widget
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="h-[320px] w-full relative z-10">
                                    <canvas id="visitorBarChart"></canvas>
                                </div>
                            </div>

                            @php
                                $topArtworks = [
                                    [
                                        'rank' => 1,
                                        'title' => 'The Starry Night',
                                        'artist' => 'Vincent van Gogh, 1889',
                                        'image' => 'https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?q=80&w=400&auto=format&fit=crop'
                                    ],
                                    [
                                        'rank' => 2,
                                        'title' => 'Persistence of Memory',
                                        'artist' => 'Salvador Dalí, 1931',
                                        'image' => 'https://images.unsplash.com/photo-1549490349-8643362247b5?q=80&w=400&auto=format&fit=crop'
                                    ],
                                    [
                                        'rank' => 3,
                                        'title' => 'Mona Lisa',
                                        'artist' => 'Leonardo da Vinci, 1503',
                                        'image' => 'https://images.unsplash.com/photo-1615529151169-7b1ff50dc7f2?q=80&w=400&auto=format&fit=crop'
                                    ],
                                    [
                                        'rank' => 4,
                                        'title' => 'The Birth of Venus',
                                        'artist' => 'Sandro Botticelli, 1486',
                                        'image' => 'https://images.unsplash.com/photo-1582555172866-f73bb12a2ab3?q=80&w=400&auto=format&fit=crop'
                                    ],
                                    [
                                        'rank' => 5,
                                        'title' => 'The Scream',
                                        'artist' => 'Edvard Munch, 1893',
                                        'image' => 'https://images.unsplash.com/photo-1612812166620-a072f77ec45b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8dGhlJTIwc2NyZWFtfGVufDB8fDB8fHww'
                                    ],
                                    [
                                        'rank' => 6,
                                        'title' => 'Girl with a Pearl Earring',
                                        'artist' => 'Johannes Vermeer, 1665',
                                        'image' => 'https://images.unsplash.com/photo-1578301978018-3005759f48f7?q=80&w=400&auto=format&fit=crop'
                                    ],
                                    [
                                        'rank' => 7,
                                        'title' => 'The Night Watch',
                                        'artist' => 'Rembrandt, 1642',
                                        'image' => 'https://images.unsplash.com/photo-1582201942988-13e60e4556ee?q=80&w=400&auto=format&fit=crop'
                                    ],
                                    [
                                        'rank' => 8,
                                        'title' => 'Las Meninas',
                                        'artist' => 'Diego Velázquez, 1656',
                                        'image' => 'https://images.unsplash.com/photo-1543857778-c4a1a3e0b2eb?q=80&w=400&auto=format&fit=crop'
                                    ],
                                    [
                                        'rank' => 9,
                                        'title' => 'American Gothic',
                                        'artist' => 'Grant Wood, 1930',
                                        'image' => 'https://images.unsplash.com/photo-1579783483458-83d02161294e?q=80&w=400&auto=format&fit=crop'
                                    ],
                                    [
                                        'rank' => 10,
                                        'title' => 'The Garden of Delights',
                                        'artist' => 'Hieronymus Bosch, 1500',
                                        'image' => 'https://images.unsplash.com/photo-1578301978693-85fa9c0320b9?q=80&w=400&auto=format&fit=crop'
                                    ],
                                ];
                            @endphp

                            {{-- Top Artworks --}}
                            <div class="relative">

                                {{-- 1. Widget Top Artworks --}}
                                <div class="lg:col-span-1 bg-[#1a1a1a] border border-neutral-800 rounded-[2.5rem] p-8 shadow-sm flex flex-col h-full">
                                    <div class="flex justify-between items-center mb-8">
                                        <h2 class="text-xl font-bold text-gray-300">Top Artworks</h2>
                                        <span class="text-[#C9A74E] text-[10px] font-black border border-[#C9A74E]/30 px-3 py-1 rounded-full uppercase">Week 14</span>
                                    </div>
                                    
                                    <div class="relative flex-1 scroll-shadow-container overflow-hidden rounded-2xl">
                                        <div class="space-y-4 overflow-y-auto pr-2 no-scrollbar h-full" style="max-height: 400px;">
                                            @foreach($topArtworks as $art)
                                                {{-- Fungsi onclick mengirimkan data art sebagai JSON string --}}
                                                <div onclick='openArtModal(@json($art))' 
                                                    class="relative group cursor-pointer overflow-hidden rounded-2xl bg-black border border-neutral-800 hover:border-[#C9A74E]/40 transition-all p-4 flex items-center gap-4">
                                                    
                                                    <div class="relative z-10 flex-shrink-0 w-10 h-10 bg-[#C9A74E] rounded-lg flex items-center justify-center text-black font-black shadow-lg">
                                                        {{ $art['rank'] }}
                                                    </div>
                                                    <div class="relative z-10 flex-1">
                                                        <h3 class="text-gray-200 font-bold text-sm leading-tight group-hover:text-white transition-colors">{{ $art['title'] }}</h3>
                                                        <p class="text-gray-500 text-[10px] mt-1 italic">{{ $art['artist'] }}</p>
                                                    </div>
                                                    <div class="absolute inset-0 z-0 opacity-10 group-hover:opacity-30 transition-all duration-700 pointer-events-none">
                                                        <img src="{{ $art['image'] }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0" alt="bg">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                {{-- 2. MODAL MOCKUP (Detail) --}}
                                {{-- Di sini tombol close (X) dikembalikan --}}
                                <div id="artModal" 
                                    class="fixed inset-0 z-[998] hidden items-center justify-center p-4 bg-black/90 backdrop-blur-md opacity-0 transition-opacity duration-300 cursor-default">
                                    
                                    {{-- Box Content --}}
                                    <div class="relative bg-[#1a1a1a] border border-neutral-800 rounded-[3rem] overflow-hidden max-w-2xl w-full shadow-[0_0_50px_rgba(201,167,78,0.2)] scale-95 transition-transform duration-300" id="modalContent">
                                        
                                        {{-- TOMBOL CLOSE (X) DIKEMBALIKAN --}}
                                        <button onclick="closeArtModal()" class="absolute top-6 right-6 z-50 p-3 bg-black/50 text-white rounded-full hover:bg-red-500 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>

                                        <div class="flex flex-col md:flex-row h-full">
                                            {{-- Bagian Gambar (Klik untuk Full Preview) --}}
                                            <div class="w-full md:w-1/2 h-[300px] md:h-[450px] overflow-hidden cursor-zoom-in group relative" onclick="openFullPreview()">
                                                <img id="modalImage" src="" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                                    <span class="bg-white/10 text-gray-300 px-4 py-2 rounded-full text-xs font-bold backdrop-blur-md border border-white/20">Click to Preview</span>
                                                </div>
                                            </div>

                                            {{-- Bagian Teks (Modern Art Gallery Style) --}}
                                            <div class="w-full md:w-1/2 p-12 flex flex-col justify-center bg-[#1a1a1a] relative overflow-hidden">
                                                
                                                {{-- Aksen Background Dekoratif (Watermark halus) --}}
                                                <div class="absolute -right-4 -bottom-4 text-[120px] font-black text-white/[0.02] select-none pointer-events-none uppercase italic">
                                                    Art
                                                </div>

                                                {{-- Label Kategori / Rank --}}
                                                <div class="flex items-center gap-4 mb-6">
                                                    <span class="h-[1px] w-8 bg-[#C9A74E]"></span>
                                                    <span class="text-[#C9A74E] font-black text-[10px] tracking-[0.5em] uppercase">
                                                        Art Profile #<span id="modalRank"></span>
                                                    </span>
                                                </div>

                                                {{-- Judul Karya --}}
                                                <h2 id="modalTitle" class="text-4xl md:text-5xl font-extrabold text-gray-300 mb-6 leading-[1.1] tracking-tight">
                                                    {{-- Diisi via JS --}}
                                                </h2>

                                                {{-- Info Artist & Deskripsi --}}
                                                <div class="space-y-6">
                                                    <div class="flex flex-col border-l-2 border-[#C9A74E]/30 pl-6 py-2">
                                                        <span class="text-gray-500 text-[10px] uppercase tracking-widest mb-1">Created By</span>
                                                        <p id="modalArtist" class="text-gray-300 text-lg font-medium tracking-wide italic"></p>
                                                    </div>

                                                    {{-- Tambahan Deskripsi Estetik (Opsional) --}}
                                                    <p class="text-gray-500 text-sm leading-relaxed max-w-sm font-light">
                                                        A masterpiece that captures the essence of emotion and technical brilliance, 
                                                        preserved in the digital realm for the modern connoisseur.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- 3. FULL IMAGE PREVIEW (Layer Paling Depan) --}}
                                <div id="fullPreview" 
                                    onclick="closeFullPreview()" 
                                    class="fixed inset-0 z-[999] hidden flex-col items-center justify-center bg-black/95 backdrop-blur-2xl opacity-0 transition-opacity duration-300 cursor-zoom-out p-4 md:p-8">
                                    
                                    {{-- Wrapper Gambar --}}
                                    <div class="relative flex flex-col items-center max-w-full max-h-full">
                                        <img id="previewImg" 
                                            src="" 
                                            width="700px"
                                            class="max-w-full max-h-[85vh] object-contain rounded-sm shadow-2xl scale-95 transition-transform duration-500 cursor-default">
                                        
                                        {{-- Teks Instruksi Statis --}}
                                        <div class="mt-6 text-center">
                                            <p class="text-white/40 text-[10px] md:text-xs uppercase tracking-[0.4em] font-light">
                                                - Click anywhere outside the image to close -
                                            </p>
                                            {{-- Garis dekoratif minimalis --}}
                                            <div class="mt-2 h-[1px] w-12 bg-[#C9A74E]/20 mx-auto"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- Recent Activities --}}
                            <div class="lg:col-span-3 bg-[#1a1a1a] border border-neutral-800 rounded-[2.5rem] p-8 shadow-sm overflow-hidden relative">
                                
                                {{-- Header --}}
                                <div class="flex items-center gap-3 mb-8">
                                    <div class="w-2 h-2 bg-[#C9A74E] rounded-full animate-pulse"></div>
                                    <h3 class="text-[10px] font-black text-[#C9A74E] uppercase tracking-[0.3em]">Previous Transactions</h3>
                                </div>
                                
                                {{-- Area Konten Interaktif --}}
                                <div class="relative group">
                                    
                                    {{-- TOMBOL NAVIGASI KIRI (Absolute) --}}
                                    <button onclick="sideScrollActivities('left')" 
                                        class="absolute left-4 top-1/2 -translate-y-1/2 z-20 p-4 rounded-2xl border border-neutral-800 bg-[#1a1a1a]/80 text-[#C9A74E] backdrop-blur-md opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-[#C9A74E] hover:text-black shadow-2xl cursor-pointer">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/></svg>
                                    </button>

                                    {{-- TOMBOL NAVIGASI KANAN (Absolute) --}}
                                    <button onclick="sideScrollActivities('right')" 
                                        class="absolute right-4 top-1/2 -translate-y-1/2 z-20 p-4 rounded-2xl border border-neutral-800 bg-[#1a1a1a]/80 text-[#C9A74E] backdrop-blur-md opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-[#C9A74E] hover:text-black shadow-2xl cursor-pointer">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                                    </button>

                                    {{-- Shadow Gradients (Kiri & Kanan) --}}
                                    <div class="absolute left-0 top-0 bottom-0 w-24 z-10 bg-gradient-to-r from-[#1a1a1a] to-transparent pointer-events-none"></div>
                                    <div class="absolute right-0 top-0 bottom-0 w-24 z-10 bg-gradient-to-l from-[#1a1a1a] to-transparent pointer-events-none"></div>

                                    {{-- AREA SCROLL HORIZONTAL (ID: activityScroll) --}}
                                    <div id="activityScroll" class="flex gap-6 overflow-x-auto pb-6 no-scrollbar cursor-grab active:cursor-grabbing snap-x scroll-smooth select-none">
                                        @php
                                            // Data Dummy diperbanyak jadi 10
                                            $names = ['Calarine Clark', 'Emma Alexa', 'Julian Vance', 'Sofia Loren', 'Marcus Aurelius', 'Elena Gilbert', 'Damon Salvatore', 'Bonnie Bennett', 'Alaric Saltzman', 'Caroline Forbes'];
                                            $actions = ['Acquired "Golden Silence"', 'Completed payment', 'Bid on "Eternal Flow"', 'Purchased "Night Sky"', 'Unlocked "Vintage Soul"'];
                                            $artworks = ['Golden Silence', 'Eternal Flow', 'Night Sky', 'Vintage Soul', 'Abstract Dream'];
                                        @endphp

                                        @for ($i = 0; $i < 10; $i++)
                                            @php
                                                $name = $names[$i];
                                                $amount = '$' . number_format(rand(1000, 9000));
                                                $action = $actions[rand(0, 4)];
                                                $artwork = $artworks[rand(0, 4)];
                                                
                                                // Membuat object data untuk dikirim ke JS
                                                $activityData = [
                                                    'name' => $name,
                                                    'action' => $action,
                                                    'amount' => $amount,
                                                    'artwork' => $artwork,
                                                    'time' => rand(1, 59) . ' minutes ago',
                                                    'avatar' => "https://api.dicebear.com/7.x/avataaars/svg?seed=" . urlencode($name)
                                                ];
                                            @endphp

                                            {{-- CARD ITEM (Klik untuk membuka modal) --}}
                                            <div onclick='openActivityModal(@json($activityData))' 
                                                class="flex-none w-[350px] bg-[#141414] border border-neutral-800 rounded-3xl p-6 flex items-center justify-between group/card hover:border-[#C9A74E]/30 transition-all duration-500 snap-center">
                                                
                                                <div class="flex items-center gap-5">
                                                    <div class="w-14 h-14 rounded-2xl bg-neutral-800 border border-neutral-700 overflow-hidden rotate-3 group-hover/card:rotate-0 transition-transform">
                                                        <img src="{{ $activityData['avatar'] }}" alt="avatar" class="w-full h-full object-cover">
                                                    </div>
                                                    <div>
                                                        <h4 class="text-gray-300 font-bold text-base italic truncate w-32">{{ $name }}</h4>
                                                        <p class="text-gray-400 text-[10px] mt-1 line-clamp-1 italic">{{ $action }}</p>
                                                    </div>
                                                </div>
                                                <div class="text-right ml-4">
                                                    <span class="text-gray-600 text-[9px] uppercase font-black tracking-widest block mb-1">Value</span>
                                                    <span class="text-gray-300 text-xl font-black italic group-hover/card:scale-110 block transition-transform">{{ $amount }}</span>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            {{-- Activity Modal --}}
                            <div id="activityModal" 
                                class="fixed inset-0 z-[999] hidden items-center justify-center p-4 bg-black/95 backdrop-blur-xl opacity-0 transition-opacity duration-300 cursor-default">
                                
                                {{-- Box Content --}}
                                <div class="relative bg-[#1a1a1a] border border-neutral-800 rounded-[3rem] overflow-hidden max-w-xl w-full shadow-[0_0_60px_rgba(201,167,78,0.15)] scale-95 transition-transform duration-300" id="activityModalContent">
                                    
                                    {{-- Tombol Close (X) --}}
                                    <button onclick="closeActivityModal()" class="absolute top-6 right-6 z-50 p-3 bg-black/50 text-white rounded-full hover:bg-red-500 transition-colors cursor-pointer">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>

                                    <div class="p-12">
                                        {{-- Header Profil --}}
                                        <div class="flex items-center gap-6 mb-10 border-b border-neutral-800 pb-10">
                                            <div class="w-24 h-24 rounded-3xl bg-neutral-900 border-2 border-[#C9A74E]/30 p-1 flex-shrink-0">
                                                <img id="actModalAvatar" src="" alt="avatar" class="w-full h-full object-cover rounded-2xl">
                                            </div>
                                            <div>
                                                <span class="text-[#C9A74E] font-black text-[10px] tracking-[0.3em] uppercase mb-1 block">Collector Profile</span>
                                                <h2 id="actModalName" class="text-3xl font-extrabold text-gray-300 leading-tight italic mb-1"></h2>
                                                <p id="actModalTime" class="text-gray-600 text-xs font-mono"></p>
                                            </div>
                                        </div>

                                        {{-- Detail Data Aktivitas --}}
                                        <div class="space-y-6">
                                            {{-- Baris 1: Tindakan --}}
                                            <div class="flex flex-col bg-[#141414] border border-neutral-800 rounded-2xl p-6">
                                                <span class="text-gray-600 text-[9px] uppercase tracking-widest mb-2 font-bold">Activity Type</span>
                                                <p id="actModalAction" class="text-gray-300 text-lg font-medium tracking-wide italic leading-snug"></p>
                                            </div>

                                            {{-- Baris 2: Artwork & Nilai --}}
                                            <div class="grid grid-cols-2 gap-6">
                                                <div class="bg-[#141414] border border-neutral-800 rounded-2xl p-6">
                                                    <span class="text-gray-600 text-[9px] uppercase tracking-widest mb-1 font-bold">Target Artwork</span>
                                                    <p id="actModalArtwork" class="text-[#C9A74E] text-xl font-bold truncate"></p>
                                                </div>
                                                <div class="bg-[#141414] border border-neutral-800 rounded-2xl p-6 text-right">
                                                    <span class="text-gray-600 text-[9px] uppercase tracking-widest mb-1 font-bold">Transaction Value</span>
                                                    <p id="actModalAmount" class="text-gray-300 text-3xl font-black italic tracking-tighter"></p>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Footer --}}
                                        <div class="mt-12 pt-8 border-t border-white/[0.05] flex justify-center">
                                            <div class="flex items-center gap-6">
                                                {{-- Garis dekoratif kiri --}}
                                                <div class="h-[1px] w-8 bg-gradient-to-r from-transparent to-[#C9A74E]/40"></div>

                                                <div class="flex items-center gap-3">
                                                    <span class="text-gray-300 text-[9px] uppercase tracking-[0.6em] font-light leading-none">
                                                        Secure Live Feed Verified
                                                    </span>
                                                </div>

                                                {{-- Garis dekoratif kanan --}}
                                                <div class="h-[1px] w-8 bg-gradient-to-l from-transparent to-[#C9A74E]/40"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>  
            </main>
        </div>
    </div>

    <div id="settingsModal" class="fixed inset-0 z-[9999] hidden-modal">
        <div onclick="closeSettings()" class="absolute inset-0 bg-black/90 backdrop-blur-md"></div>
        
        <div onclick="event.stopPropagation()" class="relative flex min-h-screen items-center justify-center p-4">
            <div class="relative w-full max-w-md bg-[#1a1a1a] border border-neutral-800 rounded-3xl shadow-2xl overflow-hidden fade-in" onclick="event.stopPropagation()">
                <div class="p-6 border-b border-neutral-800 bg-neutral-900/50 text-center">
                    <h3 class="text-xl font-bold text-gray-300">Account Settings</h3>
                </div>
                <div class="p-8 space-y-6">
                    {{-- username --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Username</label>
                        <input type="text" value="Alex Morgan" readonly class="w-full bg-neutral-800/20 border border-neutral-800/50 text-gray-500 rounded-2xl px-5 py-4 cursor-not-allowed outline-none">
                    </div>
                    {{-- password (Current) --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Password</label>
                        <div class="relative">
                            <input id="currentPasswordInput" type="password" value="123456" readonly 
                                class="w-full bg-neutral-800/20 border border-neutral-800/50 text-gray-500 rounded-2xl px-5 py-4 cursor-not-allowed outline-none">
                            
                            <button type="button" onclick="togglePassword('currentPasswordInput', this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-300 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- new password --}}
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">New Password</label>
                        <div class="relative">
                            <input id="newPasswordInput" type="password" placeholder="Enter new password" required
                                class="w-full bg-neutral-800/40 border border-neutral-800 text-white rounded-2xl px-5 py-4 focus:border-yellow-500 outline-none transition-all">
                            
                            <button type="button" onclick="togglePassword('newPasswordInput', this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-yellow-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 pt-4">
                        <button onclick="closeSettings()" 
                            class="flex-1 py-4 text-xs font-bold text-gray-400 bg-neutral-800/50 rounded-2xl transition-all duration-300 hover:bg-neutral-800 hover:text-white active:scale-95">
                            CANCEL
                        </button>

                        <button onclick="handleUpdateSettings()" 
                            class="flex-1 py-4 text-xs font-bold text-black bg-yellow-500 rounded-2xl transition-all duration-300 hover:bg-yellow-400 hover:shadow-[0_0_20px_rgba(234,179,8,0.3)] active:scale-95">
                            UPDATE SETTINGS
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="logoutModal" class="fixed inset-0 z-[9999] hidden-modal">
        <div onclick="closeLogoutModal()" class="absolute inset-0 bg-black/90 backdrop-blur-md"></div>
        <div class="relative flex min-h-screen items-center justify-center p-4">
            <div class="relative w-full max-w-sm p-8 bg-neutral-900 border border-neutral-800 rounded-3xl text-center fade-in" onclick="event.stopPropagation()">
                <h3 class="text-2xl font-bold text-white mb-2">Are you sure?</h3>
                <p class="text-gray-400 text-sm mb-8">You will be logged out.</p>
                <div class="flex flex-col gap-3">
                    <button onclick="handleLogout()" 
                        class="w-full py-4 bg-red-600 text-white font-bold rounded-2xl transition-all duration-300 hover:bg-red-500 hover:shadow-[0_0_20px_rgba(220,38,38,0.4)] active:scale-95">
                        CONFIRM LOG OUT
                    </button>
                    
                    <button onclick="closeLogoutModal()" 
                        class="w-full py-3 text-gray-500 font-medium transition-colors hover:text-white">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <form id="logout-form" action="/" method="GET" class="hidden">@csrf</form>

    <script>
        const activitySlider = document.getElementById('activityScroll');

        // 1. Fungsi Navigasi Tombol Kanan/Kiri
        function sideScrollActivities(direction) {
            // Menggeser sejauh lebar satu kartu (350px) + gap (24px)
            const scrollByAmount = 374; 
            if (direction === 'left') {
                activitySlider.scrollBy({ left: -scrollByAmount, behavior: 'smooth' });
            } else {
                activitySlider.scrollBy({ left: scrollByAmount, behavior: 'smooth' });
            }
        }

        // 2. Fitur Drag-to-Scroll menggunakan Mouse
        let isMouseDown = false;
        let startClickX;
        let initialScrollLeft;

        activitySlider.addEventListener('mousedown', (e) => {
            isMouseDown = true;
            // Ubah kursor jadi tangan mengepal saat drag
            activitySlider.classList.replace('cursor-grab', 'cursor-grabbing');
            startClickX = e.pageX - activitySlider.offsetLeft;
            initialScrollLeft = activitySlider.scrollLeft;
        });

        activitySlider.addEventListener('mouseleave', () => {
            isMouseDown = false;
            activitySlider.classList.replace('cursor-grabbing', 'cursor-grab');
        });

        activitySlider.addEventListener('mouseup', () => {
            isMouseDown = false;
            activitySlider.classList.replace('cursor-grabbing', 'cursor-grab');
        });

        activitySlider.addEventListener('mousemove', (e) => {
            if (!isMouseDown) return; // Berhenti jika mouse tidak ditekan
            e.preventDefault();
            const currentX = e.pageX - activitySlider.offsetLeft;
            // Angka 2 adalah multiplier kecepatan scroll
            const walkX = (currentX - startClickX) * 2; 
            activitySlider.scrollLeft = initialScrollLeft - walkX;
        });


        // logic modal mockup
        const actModal = document.getElementById('activityModal');
        const actModalContent = document.getElementById('activityModalContent');

        // 1. Fungsi Membuka Modal dan Mengisi Data
        function openActivityModal(data) {
            // Isi elemen modal dengan data yang dikirim dari kartu
            document.getElementById('actModalAvatar').src = data.avatar;
            document.getElementById('actModalName').innerText = data.name;
            document.getElementById('actModalTime').innerText = 'Logged: ' + data.time;
            document.getElementById('actModalAction').innerText = data.action;
            document.getElementById('actModalArtwork').innerText = data.artwork;
            document.getElementById('actModalAmount').innerText = data.amount;

            // Tampilkan container modal (gunakan flex agar items-center berfungsi)
            actModal.classList.remove('hidden');
            actModal.classList.add('flex');

            // Trigger animasi masuk (fade in & scale up)
            setTimeout(() => {
                actModal.classList.add('opacity-100');
                actModalContent.classList.remove('scale-95');
                actModalContent.classList.add('scale-100');
            }, 10); // Delay sangat kecil agar browser sempat render class 'flex'
        }

        // 2. Fungsi Menutup Modal
        function closeActivityModal() {
            // Trigger animasi keluar (fade out & scale down)
            actModal.classList.remove('opacity-100');
            actModalContent.classList.remove('scale-100');
            actModalContent.classList.add('scale-95');

            // Sembunyikan elemen setelah animasi selesai (300ms sesuai durasi di CSS)
            setTimeout(() => {
                actModal.classList.add('hidden');
                actModal.classList.remove('flex');
            }, 300);
        }

        // 3. Menutup Modal jika mengklik area luar box (layar belakang)
        window.onclick = function(event) {
            if (event.target == actModal) {
                closeActivityModal();
            }
        }

        // 4. Menutup Modal jika menekan tombol Escape (ESC)
        document.onkeydown = function(evt) {
            evt = evt || window.event;
            if (evt.keyCode == 27 && !actModal.classList.contains('hidden')) {
                closeActivityModal();
            }
        };

        // top artworks modal logic
        const modal = document.getElementById('artModal');
        const modalContent = document.getElementById('modalContent');
        const fullPreview = document.getElementById('fullPreview');
        const previewImg = document.getElementById('previewImg');

        // Membuka Detail Modal
        function openArtModal(art) {
            document.getElementById('modalImage').src = art.image;
            document.getElementById('modalTitle').innerText = art.title;
            document.getElementById('modalArtist').innerText = art.artist;
            document.getElementById('modalRank').innerText = art.rank;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modal.classList.add('opacity-100');
                modalContent.classList.replace('scale-95', 'scale-100');
            }, 10);
        }

        // Menutup Detail Modal (Dipanggil oleh tombol X)
        function closeArtModal() {
            modal.classList.remove('opacity-100');
            modalContent.classList.replace('scale-100', 'scale-95');
            setTimeout(() => {
                modal.classList.replace('flex', 'hidden');
            }, 300);
        }

        // Membuka Preview Gambar Saja
        function openFullPreview() {
            previewImg.src = document.getElementById('modalImage').src;
            fullPreview.classList.remove('hidden');
            fullPreview.classList.add('flex');
            setTimeout(() => {
                fullPreview.classList.add('opacity-100');
                previewImg.classList.replace('scale-90', 'scale-100');
            }, 10);
        }

        // Menutup Preview Gambar Saja (Dipanggil oleh klik layar belakang)
        function closeFullPreview() {
            fullPreview.classList.remove('opacity-100');
            previewImg.classList.replace('scale-100', 'scale-90');
            setTimeout(() => {
                fullPreview.classList.replace('flex', 'hidden');
            }, 300);
        }

        // Support Tombol ESC untuk kedua modal
        document.onkeydown = function(evt) {
            if (evt.key === "Escape") {
                if (!fullPreview.classList.contains('hidden')) closeFullPreview();
                else if (!modal.classList.contains('hidden')) closeArtModal();
            }
        };

        // logic untuk dropdown menu pada widget
        function openWidgetMenu(buttonElement) {
            // Mencari elemen menu yang berada tepat setelah button
            const targetMenu = buttonElement.nextElementSibling;
            
            // Amankan: Tutup semua menu lain yang mungkin terbuka agar tidak numpuk
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu !== targetMenu) {
                    menu.classList.add('hidden');
                }
            });

            // Toggle (Munculkan/Sembunyikan) menu yang diklik
            targetMenu.classList.toggle('hidden');
        }

        // Logika klik di luar elemen untuk menutup menu
        window.addEventListener('click', function(event) {
            // Jika yang diklik bukan bagian dari dropdown, sembunyikan semua menu
            if (!event.target.closest('.custom-dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
            }
        });

        // Close dropdown saat klik di luar area
        window.addEventListener('click', function(e) {
            if (!e.target.closest('.custom-dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(m => {
                    m.classList.add('hidden');
                    const arrow = m.previousElementSibling.querySelector('.arrow-icon');
                    if(arrow) arrow.classList.remove('rotate-180');
                });
            }
        });

        // chart 1: Visitor Bar Chart
        document.addEventListener('DOMContentLoaded', () => {
            const ctxBar = document.getElementById('visitorBarChart').getContext('2d');
            new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
                    datasets: [{
                        label: 'Visitors',
                        data: [920, 480, 510, 940, 500, 800, 960, 220, 530, 50, 260, 70, 120],
                        backgroundColor: '#C9A74E', // Tetap biru indigo sesuai gambar 1
                        hoverBackgroundColor: '#A88C3F', // Warna saat hover
                        borderRadius: 6,
                        barThickness: 30,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 1000,
                            ticks: { 
                                stepSize: 250, 
                                color: '#6b7280' // Warna teks abu-abu (gray-500)
                            },
                            grid: { 
                                color: 'rgba(255, 255, 255, 0.05)', // Garis grid sangat tipis
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { 
                                color: '#6b7280' 
                            }
                        }
                    }
                }
            });
        });


        // 1. STATE GLOBAL
        let isDrawerVisible = false;
        const menuStates = {
            'main-menu-content': true,
            'features-content': true,
            'tools-content': true
        };

        // 2. FUNGSI NAVIGASI (SIDEBAR) - SATU FUNGSI SAJA
        // Gunakan ini untuk tombol hamburger: onclick="handleNavDrawer(true, event)"
        function handleNavDrawer(open, event) {
            if (event) event.stopPropagation();
            
            // Pastikan ID ini sama dengan yang ada di HTML Anda
            const sidebar = document.getElementById('mainSidebar') || document.getElementById('main-sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            // Elemen Path Icon (Hamburger animation)
            const path1 = document.getElementById('path1');
            const path2 = document.getElementById('path2');
            const path3 = document.getElementById('path3');

            isDrawerVisible = open;

            if (isDrawerVisible) {
                sidebar?.classList.remove('-translate-x-full');
                overlay?.classList.remove('hidden');
                setTimeout(() => overlay?.classList.add('opacity-100'), 10);
                
                // Animasi Icon ke "X"
                path1?.setAttribute('d', 'M6 18L18 6');
                if(path2) path2.style.opacity = '0';
                path3?.setAttribute('d', 'M6 6l12 12');
                
                document.body.style.overflow = 'hidden'; // Lock scroll
            } else {
                sidebar?.classList.add('-translate-x-full');
                overlay?.classList.remove('opacity-100');
                setTimeout(() => overlay?.classList.add('hidden'), 300);
                
                // Animasi Icon ke Hamburger
                path1?.setAttribute('d', 'M4 6h16');
                if(path2) path2.style.opacity = '1';
                path3?.setAttribute('d', 'M4 18h16');
                
                document.body.style.overflow = ''; // Unlock scroll
            }
        }

        // 3. FUNGSI ACCORDION
        function switchMenuAccordion(contentId, arrowId) {
            const content = document.getElementById(contentId);
            const arrow = document.getElementById(arrowId);
            if(!content) return;

            menuStates[contentId] = !menuStates[contentId];

            if (menuStates[contentId]) {
                content.classList.replace('grid-rows-[0fr]', 'grid-rows-[1fr]');
                content.classList.replace('opacity-0', 'opacity-100');
                if(arrow) arrow.style.transform = 'rotate(0deg)';
            } else {
                content.classList.replace('grid-rows-[1fr]', 'grid-rows-[0fr]');
                content.classList.replace('opacity-100', 'opacity-0');
                if(arrow) arrow.style.transform = 'rotate(-90deg)';
            }
        }

        // 4. COUNTER & CHART (DOM CONTENT LOADED)
        document.addEventListener('DOMContentLoaded', () => {
            
            // --- ANIMASI COUNTER ---
            const counters = document.querySelectorAll('.counter-value');
            const duration = 3000;

            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const startTime = performance.now();

                const updateCount = (currentTime) => {
                    const elapsedTime = currentTime - startTime;
                    const progress = Math.min(elapsedTime / duration, 1);
                    const easeOutCubic = 1 - Math.pow(1 - progress, 3);
                    const currentNumber = Math.floor(easeOutCubic * target);
                    
                    counter.innerText = currentNumber.toLocaleString('en-US');
                    if (progress < 1) requestAnimationFrame(updateCount);
                    else counter.innerText = target.toLocaleString('en-US');
                };
                requestAnimationFrame(updateCount);
            });

            // --- CHART ---
            const canvas = document.getElementById('artSalesChart');
            if (canvas) {
                const ctx = canvas.getContext('2d');
                const dataSets = {
                    monthly: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        data: [45, 52, 48, 70, 65, 85, 78, 92, 110, 95, 105, 120]
                    },
                    yearly: {
                        labels: ['2021', '2022', '2023', '2024', '2025', '2026'],
                        data: [450, 620, 890, 1100, 1400, 1850]
                    }
                };

                const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, 'rgba(201, 167, 78, 0.25)');
                gradient.addColorStop(1, 'rgba(201, 167, 78, 0)');

                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: dataSets.monthly.labels,
                        datasets: [{
                            label: 'Market Value',
                            data: dataSets.monthly.data,
                            borderColor: '#C9A74E',
                            borderWidth: 3,
                            tension: 0.4,
                            fill: true,
                            backgroundColor: gradient,
                            pointRadius: 6,
                            pointBackgroundColor: '#C9A74E',
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: { grid: { color: 'rgba(255, 255, 255, 0.04)' }, ticks: { color: '#737373' } },
                            x: { grid: { display: false }, ticks: { color: '#a3a3a3' } }
                        }
                    }
                });

                // Tab Switcher
                document.getElementById('btn-monthly')?.addEventListener('click', () => {
                    myChart.data.labels = dataSets.monthly.labels;
                    myChart.data.datasets[0].data = dataSets.monthly.data;
                    myChart.update();
                });
                document.getElementById('btn-yearly')?.addEventListener('click', () => {
                    myChart.data.labels = dataSets.yearly.labels;
                    myChart.data.datasets[0].data = dataSets.yearly.data;
                    myChart.update();
                });
            }
        });

        // 5. MODAL & DROPDOWN HANDLERS
        function toggleProfileDropdown(event) {
            if (event) event.stopPropagation();
            document.getElementById('profileDropdown').classList.toggle('hidden-modal');
        }

        // Klik di luar untuk menutup
        window.onclick = function(event) {
            // Tutup Sidebar jika klik overlay
            if (event.target.id === 'sidebarOverlay') {
                handleNavDrawer(false);
            }
            // Tutup Profile Dropdown
            if (!event.target.closest('#profileButton')) {
                const drop = document.getElementById('profileDropdown');
                if(drop) drop.classList.add('hidden-modal');
            }
        }

        // Modal Handlers dengan Scroll Lock
        function openSettings() { 
            document.getElementById('profileDropdown').classList.add('hidden-modal'); // Tutup dropdown dulu
            document.getElementById('settingsModal').classList.remove('hidden-modal'); 
            lockScroll(true);
        }
        
        function closeSettings() { 
            document.getElementById('settingsModal').classList.add('hidden-modal'); 
            lockScroll(false);
        }

        function openLogoutModal() { 
            document.getElementById('profileDropdown').classList.add('hidden-modal');
            document.getElementById('logoutModal').classList.remove('hidden-modal'); 
            lockScroll(true);
        }

        function closeLogoutModal() { 
            document.getElementById('logoutModal').classList.add('hidden-modal'); 
            lockScroll(false);
        }

        // button logout
        function handleLogout() {
            // Tampilkan SweetAlert Loading
            Swal.fire({
                title: 'Logging out...',
                html: 'Please wait a moment while we secure your session.',
                allowOutsideClick: false,
                showConfirmButton: false,
                background: '#1a1a1a',
                color: '#fff',
                didOpen: () => {
                    Swal.showLoading();
                    // Pastikan loading tampil di depan modal logout
                    const container = Swal.getContainer();
                    if (container) container.style.zIndex = '10001';
                }
            });

            // Simulasi loading selama 1.5 detik sebelum submit form otomatis
            setTimeout(() => {
                document.getElementById('logout-form').submit();
            }, 1500);
        }
        
        // button update settings
        function handleUpdateSettings() {
            const newPasswordInput = document.getElementById('newPasswordInput');
            const newPasswordValue = newPasswordInput.value.trim();

            // Validasi input kosong dengan efek getar
            if (!newPasswordValue) {
                // Tambahkan class animasi
                newPasswordInput.classList.add('shake-error');
                newPasswordInput.focus();

                // Hapus class setelah animasi selesai (300ms) agar bisa diulang lagi nanti
                setTimeout(() => {
                    newPasswordInput.classList.remove('shake-error');
                }, 300);
                
                return; // Berhenti di sini, jangan lanjut ke konfirmasi
            }

            // Jika terisi, baru lanjut ke konfirmasi SweetAlert
            Swal.fire({
                title: 'Confirm Update?',
                text: "Are you sure with the new password?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#eab308',
                cancelButtonColor: '#333',
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'No',
                background: '#1a1a1a',
                color: '#fff',
                didOpen: () => {
                    const container = Swal.getContainer();
                    if (container) container.style.zIndex = '10001';
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan Loading
                    Swal.fire({
                        title: 'Processing...',
                        background: '#1a1a1a',
                        color: '#fff',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => { 
                            Swal.showLoading();
                            const container = Swal.getContainer();
                            if (container) container.style.zIndex = '10001';
                        }
                    });

                    setTimeout(() => {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Password updated successfully.',
                            icon: 'success',
                            iconColor: '#eab308', // Mengubah warna ikon centang & lingkaran jadi Gold
                            timer: 2000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                            background: '#1a1a1a',
                            color: '#fff',
                            didOpen: () => {
                                const container = Swal.getContainer();
                                if (container) {
                                    container.style.zIndex = '10001';
                                    
                                    // Mengubah warna Progress Bar menjadi Gold
                                    const progressBar = container.querySelector('.swal2-timer-progress-bar');
                                    if (progressBar) progressBar.style.backgroundColor = '#eab308';

                                    // Mengubah warna garis centang di dalam ikon agar benar-benar Gold
                                    const successLines = container.querySelectorAll('[class^=swal2-success-line]');
                                    successLines.forEach(line => line.style.backgroundColor = '#eab308');
                                    container.querySelector('.swal2-success-ring').style.borderColor = 'rgba(234, 179, 8, 0.3)';
                                }
                            }
                        }).then(() => {
                            newPasswordInput.value = "";
                            closeSettings();
                        });
                    }, 1500);
                }
            });
        }

        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('svg');
            const isPassword = input.type === 'password';
            
            input.type = isPassword ? 'text' : 'password';
            
            // Ganti icon mata (Eye vs Eye-off)
            if (isPassword) {
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.822 7.822L21 21m-2.278-2.278L15.07 15.07m-4.414-4.414L12 12m0 0l.93-.93M12 12l.93.93" />`;
            } else {
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        }
    </script>
</body>
</html>