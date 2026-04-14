<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuthoadem Gallery | Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

                @php
                    $collections = [
                        [
                            'id' => '01',
                            'title' => 'SURREALISME',
                            'artist' => 'Salvador Dalimore',
                            'images' => [
                                'https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?q=80&w=500',
                                'https://images.unsplash.com/photo-1549490349-8643362247b5?q=80&w=300',
                                'https://images.unsplash.com/photo-1576769267415-9642010aa962?q=80&w=300'
                            ]
                        ],
                        [
                            'id' => '02',
                            'title' => 'FIGURATIVE',
                            'artist' => 'The Academia',
                            'images' => [
                                'https://images.unsplash.com/photo-1578301978693-85fa9c0320b9?q=80&w=500',
                                'https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=300',
                                'https://images.unsplash.com/photo-1582555172866-f73bb12a2ab3?q=80&w=300'
                            ]
                        ],
                        [
                            'id' => '03',
                            'title' => 'NATURALISM',
                            'artist' => 'Botanica Art',
                            'images' => [
                                'https://images.unsplash.com/photo-1490750967868-88aa4486c946?q=80&w=500',
                                'https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?q=80&w=300',
                                'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?q=80&w=300'
                            ]
                        ]
                    ];
                @endphp

                <div class="min-h-screen  py-20 px-6 font-sans antialiased text-gray-200">
                    <div class="max-w-7xl mx-auto space-y-16">
                        
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 border-b border-white/5 pb-10">
                            <div class="space-y-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="h-[1px] w-8 bg-[#C9A74E]"></span>
                                    <p class="text-[10px] text-[#C9A74E] tracking-[0.4em] uppercase font-bold">Premium Collection</p>
                                </div>
                                <h2 class="text-5xl md:text-6xl font-extralight tracking-tighter text-gray-300 leading-none">
                                    THE <span class="font-black text-[#C9A74E] italic">ART</span> PRODUCT
                                </h2>
                            </div>
                            
                            <button id="add-collection-btn" onclick="handleBtnClick(this)" class="group relative flex items-center justify-center gap-3 px-8 py-4 bg-[#C9A74E] hover:bg-[#DBBC6A] text-black rounded-full transition-all duration-500 active:scale-95 shadow-[0_0_20px_rgba(201,167,78,0.2)] disabled:opacity-80 disabled:cursor-not-allowed">
                                <svg id="plus-icon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform duration-500 group-hover:rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                                </svg>

                                <svg id="loading-icon" class="hidden animate-spin w-5 h-5 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>

                                <span id="btn-text" class="text-xs font-black tracking-[0.1em] uppercase">Add New Collection</span>
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                            @foreach($collections as $item)
                            <div class="group relative">
                                <div class="absolute -inset-1 bg-gradient-to-b from-[#C9A74E]/20 to-transparent rounded-[2rem] blur opacity-0 group-hover:opacity-100 transition duration-500"></div>
                                
                                <div class="relative bg-neutral-900/80 backdrop-blur-xl rounded-[2rem] p-5 border border-white/5 transition-all duration-500 group-hover:-translate-y-2 group-hover:border-[#C9A74E]/30">
                                    <span class="absolute top-6 right-8 text-5xl font-black text-white/5 italic select-none">{{ $item['id'] }}</span>
                                    
                                    <div class="grid grid-cols-3 gap-3 h-72 mb-8">
                                        <div class="col-span-2 overflow-hidden rounded-2xl shadow-2xl">
                                            <img src="{{ $item['images'][0] }}" 
                                                class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-1000 group-hover:scale-105"
                                                alt="{{ $item['title'] }}">
                                        </div>
                                        <div class="flex flex-col gap-3">
                                            <div class="h-1/2 overflow-hidden rounded-2xl">
                                                <img src="{{ $item['images'][1] }}" 
                                                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                                            </div>
                                            <div class="h-1/2 overflow-hidden rounded-2xl border border-[#C9A74E]/20">
                                                <img src="{{ $item['images'][2] }}" 
                                                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex justify-between items-center px-2">
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-300 tracking-tight uppercase">{{ $item['title'] }}</h3>
                                            <p class="text-[10px] text-[#C9A74E] font-bold tracking-[0.3em] uppercase mt-1 opacity-80">{{ $item['artist'] }}</p>
                                        </div>
                                        <div class="flex gap-2">
                                            <button 
                                                onclick="handleEdit('/link-tujuan-anda')" 
                                                title="Edit" 
                                                class="p-3 rounded-full bg-white/5 text-gray-400 hover:bg-[#C9A74E] hover:text-black transition-all duration-300"
                                            >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                            <button 
                                                onclick="confirmDelete('{{ $item['id'] }}', '{{ $item['title'] }}')"
                                                title="Delete" 
                                                class="p-3 rounded-full bg-white/5 text-red-400/40 hover:bg-red-500/20 hover:text-red-500 transition-all duration-300">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
        function handleBtnClick(btn) {
            const plusIcon = btn.querySelector('#plus-icon');
            const loadingIcon = btn.querySelector('#loading-icon');
            const btnText = btn.querySelector('#btn-text');
            const targetUrl = '/halaman-tujuan'; // Ganti dengan URL tujuan Anda

            // 1. Disable tombol agar tidak diklik berkali-kali
            btn.disabled = true;

            // 2. Ubah UI ke state Loading
            plusIcon.classList.add('hidden');
            loadingIcon.classList.remove('hidden');
            btnText.innerText = 'Processing...';

            // 3. Simulasi loading sejenak sebelum pindah halaman
            setTimeout(() => {
                window.location.href = '/add_product';
            }, 1500); // Jeda 1.5 detik
        }

        function handleEdit(url) {
            Swal.fire({
                title: 'Loading Workspace',
                html: 'Finalizing your setup...',
                background: '#1a1a1a',
                color: '#D1D5DB',
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                    
                    // Simulasi loading 800ms sebelum pindah halaman
                    setTimeout(() => {
                        window.location.href = '/edit_product';
                    }, 800);
                }
            });
        }

        function confirmDelete(id, title) {
            Swal.fire({
                title: 'Are you sure?',
                text: `The collection "${title}" will be permanently deleted!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444', // Warna Emas sesuai tema
                cancelButtonColor: '#303030',
                confirmButtonText: 'Yes, Delete!',
                cancelButtonText: 'Cancel',
                background: '#171717', // Dark mode background
                color: '#ffffff',
                iconColor: '#ef4444'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilan Loading
                    Swal.fire({
                        title: 'Currently Deleting...',
                        allowOutsideClick: false,
                        background: '#171717',
                        color: '#ffffff',
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Simulasi proses penghapusan (ganti dengan fetch/axios ke backend)
                    setTimeout(() => {
                        Swal.fire({
                            title: 'Successfully!',
                            text: 'The collection has been deleted.',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false,
                            background: '#171717',
                            color: '#ffffff',
                            iconColor: '#C9A74E', // Centang warna emas
                        });
                        
                        // Logika tambahan jika ingin hapus element di DOM secara langsung:
                        // document.getElementById(`item-${id}`).remove();
                    }, 1500);
                }
            });
        }

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