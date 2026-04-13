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

            <div class="flex-1 overflow-y-auto p-6 lg:p-10 custom-scrollbar">
                @yield('content')

                <div class="flex-1 overflow-y-auto p-6 lg:p-10 custom-scrollbar">
                    <div class="max-w-7xl mx-auto space-y-8">
                        
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                            
                            <div class="lg:col-span-2 bg-[#1a1a1a] border border-neutral-800 rounded-[2.5rem] p-8 shadow-sm">
                                <div class="flex justify-between items-center mb-6">
                                    <h2 class="text-2xl font-bold text-gray-300">Visitors</h2>
                                    <div class="relative custom-dropdown z-[100]">
                                        <button type="button" 
                                                onclick="openWidgetMenu(this, event)" 
                                                class="text-gray-500 hover:text-[#C9A74E] transition-all focus:outline-none p-2 pointer-events-auto rounded-xl hover:bg-neutral-800/50">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                                            </svg>
                                        </button>

                                        <div class="dropdown-menu hidden absolute right-0 mt-2 w-56 bg-neutral-900 border border-neutral-800 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] z-[110] overflow-hidden backdrop-blur-xl">
                                            <div class="py-2">
                                                <div class="px-4 py-2 text-[10px] font-black text-gray-600 uppercase tracking-[0.2em] mb-1">
                                                    Options
                                                </div>

                                                <button class="w-full text-left px-4 py-3 text-sm text-gray-400 hover:bg-neutral-800 hover:text-[#C9A74E] transition-colors flex items-center gap-3 group">
                                                    <svg class="w-4 h-4 text-gray-500 group-hover:text-[#C9A74E] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                    </svg>
                                                    Export Data
                                                </button>

                                                <button class="w-full text-left px-4 py-3 text-sm text-gray-400 hover:bg-neutral-800 hover:text-[#C9A74E] transition-colors flex items-center gap-3 group">
                                                    <svg class="w-4 h-4 text-gray-500 group-hover:text-[#C9A74E] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                                    </svg>
                                                    Refresh
                                                </button>

                                                <hr class="border-neutral-800 my-1 mx-2">

                                                <a href="javascript:void(0)" 
                                                onclick="openRemoveModal(this, event)" 
                                                class="block px-4 py-3 text-sm text-red-500/80 hover:bg-red-500/10 transition-colors flex items-center gap-3 group">
                                                    <svg class="w-4 h-4 text-red-500/50 group-hover:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    Remove Widget
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="h-[300px] w-full">
                                    <canvas id="visitorBarChart"></canvas>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="flex gap-2">
                                    <div class="relative flex-1 custom-dropdown">
                                        <button onclick="toggleDropdown(this, event)" class="w-full bg-[#1a1a1a] border border-neutral-800 rounded-xl py-3 px-4 flex justify-between items-center text-sm font-medium text-gray-300 hover:border-[#C9A74E] transition-all">
                                            <span class="flex items-center gap-2 pointer-events-none">
                                                <svg class="w-4 h-4 text-[#C9A74E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path></svg> 
                                                Sort By
                                            </span>
                                            <svg class="w-4 h-4 transition-transform arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </button>
                                        <div class="dropdown-menu hidden absolute left-0 w-full mt-2 bg-neutral-900 border border-neutral-800 rounded-xl shadow-2xl z-[150] p-2">
                                            <a href="#" class="block px-3 py-2 text-xs text-gray-400 hover:bg-neutral-800 hover:text-white rounded-lg">Newest</a>
                                            <a href="#" class="block px-3 py-2 text-xs text-gray-400 hover:bg-neutral-800 hover:text-white rounded-lg">Oldest</a>
                                        </div>
                                    </div>

                                    <div class="relative flex-1 custom-dropdown">
                                        <button onclick="toggleDropdown(this, event)" class="w-full bg-[#1a1a1a] border border-neutral-800 rounded-xl py-3 px-4 flex justify-between items-center text-sm font-medium text-gray-300 hover:border-[#C9A74E] transition-all">
                                            <span class="flex items-center gap-2 pointer-events-none">
                                                <svg class="w-4 h-4 text-[#C9A74E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m10 4a2 2 0 100-4m0 4a2 2 0 110-4"></path></svg> 
                                                Filter By
                                            </span>
                                            <svg class="w-4 h-4 transition-transform arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </button>
                                        <div class="dropdown-menu hidden absolute left-0 w-full mt-2 bg-neutral-900 border border-neutral-800 rounded-xl shadow-2xl z-[150] p-2">
                                            <a href="#" class="block px-3 py-2 text-xs text-gray-400 hover:bg-neutral-800 hover:text-white rounded-lg">Success</a>
                                            <a href="#" class="block px-3 py-2 text-xs text-gray-400 hover:bg-neutral-800 hover:text-white rounded-lg">Pending</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div class="relative custom-dropdown">
                                        <input type="date" id="hiddenDatePicker" class="absolute opacity-0 pointer-events-none" style="left: 50%; top: 50%;">
                                        
                                        <button onclick="openCalendar()" class="w-full bg-[#1a1a1a] border border-neutral-800 rounded-xl py-3 px-4 flex justify-between items-center text-sm font-medium text-gray-300 hover:border-[#C9A74E] transition-all">
                                            <span class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-[#C9A74E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 
                                                <span id="dateDisplay"></span>
                                            </span>
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </button>
                                    </div>

                                    {{-- add insight --}}
                                    <div id="addInsightBtn" class="h-[300px] w-full bg-neutral-900/30 border border-dashed border-neutral-800 rounded-[2.5rem] flex flex-col items-center justify-center group cursor-pointer hover:border-yellow-500/30 transition-all duration-500 mt-4">
                                        <div class="w-12 h-12 rounded-full bg-neutral-800 flex items-center justify-center mb-3 group-hover:bg-yellow-500/20 transition-colors">
                                            <svg class="w-6 h-6 text-gray-500 group-hover:text-[#C9A74E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                            </svg>
                                        </div>
                                        <span class="text-[11px] font-bold text-gray-600 group-hover:text-gray-400 uppercase tracking-[0.2em]">Add Insight Widget</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-[#1a1a1a] border border-neutral-800 rounded-[3rem] p-8 backdrop-blur-md shadow-2xl relative overflow-hidden group/container">
                            <div class="absolute -top-24 -right-24 w-64 h-64 bg-yellow-500/5 blur-[100px] pointer-events-none"></div>

                            <div class="flex justify-between items-start mb-10 relative z-[20]">
                                <div>
                                    <h2 class="text-3xl font-bold text-gray-200 tracking-tight">Transactions History</h2>
                                    <p class="text-gray-500 text-sm mt-1">Real-time gallery acquisition updates</p>
                                </div>
                                
                                <div class="relative custom-dropdown">
                                    <button onclick="openWidgetMenu(this, event)" 
                                            class="p-3 rounded-2xl bg-neutral-800/50 text-gray-400 hover:text-[#C9A74E] hover:bg-neutral-800 transition-all duration-300 focus:outline-none">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                                        </svg>
                                    </button>
                                    
                                    <div class="dropdown-menu hidden absolute right-0 mt-3 w-56 bg-[#1a1a1a] border border-neutral-800 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] z-[100] overflow-hidden backdrop-blur-xl">
                                        <div class="py-2">
                                            <div class="px-4 py-2 text-[10px] font-black text-gray-600 uppercase tracking-widest">Options</div>
                                            <button class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-neutral-800 hover:text-[#C9A74E] transition-colors flex items-center gap-3">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                Export CSV
                                            </button>
                                            <hr class="border-neutral-800 my-1">
                                            <button onclick="openRemoveModal(this, event)" class="w-full text-left px-4 py-3 text-sm text-red-500/80 hover:bg-red-500/5 transition-colors flex items-center gap-3">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                Remove Widget
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-8 relative z-10">
                                <div>
                                    <div class="flex items-center gap-3 mb-5">
                                        <span class="w-2 h-2 rounded-full bg-[#C9A74E] animate-pulse"></span>
                                        <span class="text-[11px] font-black text-[#C9A74E] uppercase tracking-[0.3em]">Recent Activity</span>
                                    </div>

                                    <div onclick="openMemberCard('Calarine Clark', 'Acquired \'Golden Silence\' for her private collection.', '$1,250.00', 'https://api.dicebear.com/8.x/avataaars/svg?seed=Calarine')" 
                                        class="relative cursor-pointer bg-neutral-800/30 border border-neutral-800/50 rounded-[2.5rem] p-6 flex flex-wrap md:flex-nowrap items-center justify-between group hover:border-[#C9A74E] hover:ring-1 hover:ring-yellow-500/20 transition-all duration-500 bg-clip-border">
                                        <div class="flex items-center gap-6">
                                            <div class="relative flex-shrink-0">
                                                <img src="https://api.dicebear.com/8.x/avataaars/svg?seed=Calarine" 
                                                    class="w-16 h-16 rounded-2xl bg-neutral-700 border-2 border-neutral-800 object-cover shadow-lg">
                                                
                                                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-[#C9A74E] border-[3px] border-[#1a1a1a] rounded-full z-10"></div>
                                            </div>
                                            
                                            <div>
                                                <h4 class="text-gray-200 font-bold text-lg group-hover:text-white transition-colors">Calarine Clark</h4>
                                                <p class="text-gray-500 text-sm leading-relaxed max-w-md mt-1 italic line-clamp-1">"Acquired 'Golden Silence' for her private collection."</p>
                                                <div class="flex gap-4 mt-2">
                                                    <span class="text-[10px] font-bold text-[#C9A74E] flex items-center gap-1.5 uppercase tracking-widest opacity-80 group-hover:opacity-100 transition-opacity">
                                                        Click to View Profile 
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 md:mt-0 text-right">
                                            <p class="text-[10px] text-gray-500 uppercase tracking-widest mb-1 font-bold">Amount Paid</p>
                                            <span class="text-3xl font-black text-gray-200 group-hover:text-[#C9A74E] transition-colors tabular-nums tracking-tight">$1,250</span>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center gap-3 mb-5 opacity-60">
                                        <span class="w-2 h-2 rounded-full bg-gray-600"></span>
                                        <span class="text-[11px] font-black text-gray-500 uppercase tracking-[0.3em]">Yesterday</span>
                                    </div>

                                    <div onclick="openMemberCard('Emma Alexa', 'Completed payment for the \'Eternal Flow\' digital series.', '$850.00', 'https://api.dicebear.com/8.x/avataaars/svg?seed=Emma')" 
                                        class="relative cursor-pointer bg-neutral-800/20 border border-neutral-800/30 rounded-[2.5rem] p-6 flex flex-wrap md:flex-nowrap items-center justify-between group hover:border-neutral-500/50 hover:ring-1 hover:ring-white/10 transition-all duration-500">
                                        <div class="flex items-center gap-6">
                                            <img src="https://api.dicebear.com/8.x/avataaars/svg?seed=Emma" class="w-16 h-16 rounded-full bg-neutral-700 border-2 border-neutral-800 grayscale group-hover:grayscale-0 transition-all duration-700">
                                            <div>
                                                <h4 class="text-gray-300 font-bold text-lg group-hover:text-white transition-colors">Emma Alexa</h4>
                                                <p class="text-gray-500 text-sm leading-relaxed max-w-md mt-1 italic">"Completed payment for the 'Eternal Flow' digital series."</p>
                                                <div class="flex gap-4 mt-2">
                                                    <span class="text-[10px] font-bold text-gray-500 flex items-center gap-1.5 uppercase tracking-widest opacity-80 group-hover:opacity-100 transition-opacity">
                                                        Click to View Profile 
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 md:mt-0 text-right">
                                            <p class="text-[10px] text-gray-600 uppercase tracking-widest mb-1 font-bold">Amount Paid</p>
                                            <span class="text-3xl font-black text-gray-400 group-hover:text-gray-200 transition-colors tabular-nums tracking-tight">$850</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="memberModal" class="fixed inset-0 z-[999] hidden flex items-center justify-center p-4">
                            <div id="modalBackdrop" class="absolute inset-0 bg-black/60 backdrop-blur-md opacity-0 transition-opacity duration-300 cursor-zoom-out" onclick="closeMemberCard()"></div>
                            
                            <div id="modalContent" class="relative w-full max-w-sm bg-[#1a1a1a] border border-neutral-800 rounded-[3rem] overflow-hidden shadow-2xl transform transition-all duration-500 scale-90 opacity-0">
                                
                                <div class="h-32 bg-gradient-to-br from-[#C9A74E] to-[#8a6d25] relative">
                                    <button onclick="closeMemberCard()" class="absolute top-6 right-6 p-2 rounded-full bg-black/20 hover:bg-black/40 text-white transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </div>

                                <div class="px-8 pb-10">
                                    <div class="relative -mt-16 mb-6 inline-block">
                                        <img id="m-avatar" src="" class="w-32 h-32 rounded-3xl bg-neutral-800 border-8 border-[#1a1a1a] shadow-xl object-cover">
                                    </div>

                                    <div class="space-y-1">
                                        <h3 id="m-name" class="text-2xl font-black text-white tracking-tight">Member Name</h3>
                                        <div class="flex items-center gap-2">
                                            <span class="text-[#C9A74E] text-xs font-bold uppercase tracking-[0.2em]">Verified Collector</span>
                                            <span class="w-1 h-1 rounded-full bg-gray-600"></span>
                                            <span class="text-gray-500 text-[10px] font-bold uppercase">ID: 8829-X</span>
                                        </div>
                                    </div>

                                    <div class="mt-8 pt-8 border-t border-neutral-800 space-y-6">
                                        <div>
                                            <label class="text-[10px] text-gray-500 uppercase font-black tracking-widest">Latest Activity</label>
                                            <p id="m-activity" class="text-gray-300 mt-2 italic leading-relaxed text-sm"></p>
                                        </div>
                                        
                                        <div class="flex justify-between items-end">
                                            <div>
                                                <label class="text-[10px] text-gray-500 uppercase font-black tracking-widest">Transaction</label>
                                                <p id="m-amount" class="text-3xl font-black text-white mt-1 tabular-nums"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

    {{-- add insight --}}
    <div id="insightModal" class="fixed inset-0 z-[9999] hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-md"></div>
        
        <div class="relative bg-[#1a1a1a] border border-neutral-800 w-full max-w-lg rounded-[2.5rem] p-10 shadow-2xl fade-in">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h3 class="text-2xl font-bold text-white">Add Insight</h3>
                    <p class="text-sm text-gray-500 mt-1">Pilih widget untuk ditampilkan di dashboard</p>
                </div>
                <button onclick="closeInsightModal()" class="w-10 h-10 flex items-center justify-center rounded-full bg-neutral-900 text-gray-400 hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <div class="grid grid-cols-1 gap-4">
                <button class="w-full bg-neutral-900/50 border border-neutral-800 p-5 rounded-3xl flex items-center gap-5 hover:border-yellow-500/40 hover:bg-neutral-800/50 transition-all group text-left">
                    <div class="w-12 h-12 bg-yellow-500/10 rounded-2xl flex items-center justify-center text-yellow-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <div>
                        <p class="font-bold text-gray-200">Revenue Growth</p>
                        <p class="text-xs text-gray-500">Analisis pendapatan bulanan</p>
                    </div>
                </button>

                <button class="w-full bg-neutral-900/50 border border-neutral-800 p-5 rounded-3xl flex items-center gap-5 hover:border-yellow-500/40 hover:bg-neutral-800/50 transition-all group text-left">
                    <div class="w-12 h-12 bg-blue-500/10 rounded-2xl flex items-center justify-center text-blue-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <p class="font-bold text-gray-200">User Traffic</p>
                        <p class="text-xs text-gray-500">Pantau pengunjung aktif</p>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <form id="logout-form" action="/" method="GET" class="hidden">@csrf</form>

    <script>
        function openMemberCard(name, activity, amount, avatar, statusColor) {
            const modal = document.getElementById('memberModal');
            const backdrop = document.getElementById('modalBackdrop');
            const content = document.getElementById('modalContent');

            // Fill data
            document.getElementById('m-name').innerText = name;
            document.getElementById('m-activity').innerText = activity;
            document.getElementById('m-amount').innerText = amount;
            document.getElementById('m-avatar').src = avatar;

            // Show modal
            modal.classList.remove('hidden');

            // Animate in
            setTimeout(() => {
                backdrop.classList.add('opacity-100');
                content.classList.remove('scale-90', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeMemberCard() {
            const modal = document.getElementById('memberModal');
            const backdrop = document.getElementById('modalBackdrop');
            const content = document.getElementById('modalContent');

            // Animate out
            backdrop.classList.remove('opacity-100');
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-90', 'opacity-0');

            // Hide after animation
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 400);
        }

        // Global function for widget menu (placeholder if not defined)
        window.openWidgetMenu = function(button, event) {
            event.stopPropagation();
            const menu = button.nextElementSibling;
            menu.classList.toggle('hidden');
        };

        // Close menus/modals on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeMemberCard();
        });

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

        // logic add insight modal
        const modal = document.getElementById('insightModal');
        const btnAddInsight = document.getElementById('addInsightBtn');

        // Fungsi Buka Modal
        if (btnAddInsight) {
            btnAddInsight.addEventListener('click', () => {
                modal.classList.remove('hidden');
                // Kunci scroll agar layar tidak bisa digeser saat modal muncul
                document.body.style.overflow = 'hidden';
            });
        }

        // Fungsi Tutup Modal
        function closeInsightModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Aktifkan kembali scroll
        }

        // Tutup modal jika klik di area hitam transparan (backdrop)
        modal.addEventListener('click', (e) => {
            if (e.target === modal || e.target.classList.contains('absolute')) {
                closeInsightModal();
            }
        });

        // calender logic
        function openCalendar() {
            const dateInput = document.getElementById('hiddenDatePicker');
            // Memicu kalender bawaan browser
            dateInput.showPicker(); 
        }

        // Listener untuk mendeteksi perubahan tanggal
        document.getElementById('hiddenDatePicker').addEventListener('change', function(e) {
            const dateValue = new Date(e.target.value);
            if (!isNaN(dateValue)) {
                // Format: Nama Bulan, Tahun (Contoh: April, 2026)
                const options = { month: 'long', year: 'numeric' };
                const formattedDate = dateValue.toLocaleDateString('en-US', options);
                
                // Update teks di UI
                document.getElementById('dateDisplay').innerText = formattedDate;
            }
        });

        function updateCurrentDate() {
            const now = new Date();
            const options = { day: 'numeric', month: 'long', year: 'numeric' };
            document.getElementById('dateDisplay').innerText = now.toLocaleDateString('en-GB', options);
        }

        // Jalankan saat load
        updateCurrentDate();

        // Opsional: Cek setiap 1 jam untuk memastikan tanggal tetap fresh
        setInterval(updateCurrentDate, 3600000);

        // Listener untuk mendeteksi perubahan tanggal
        document.getElementById('hiddenDatePicker').addEventListener('change', function(e) {
            const dateValue = new Date(e.target.value);
            if (!isNaN(dateValue)) {
                // PERBAIKAN: Tambahkan 'day' ke dalam options
                const options = { 
                    day: 'numeric', 
                    month: 'long', 
                    year: 'numeric' 
                };
                
                // Gunakan 'en-GB' agar formatnya: 15 April, 2026
                const formattedDate = dateValue.toLocaleDateString('en-GB', options);
                
                // Update teks di UI
                document.getElementById('dateDisplay').innerText = formattedDate;
            }
        });

        // Tambahkan parameter 'e' untuk menangkap event klik
        function toggleDropdown(button, e) {
            // Gunakan 'e' yang dikirim dari HTML
            if (e) e.stopPropagation();

            const menu = button.nextElementSibling;
            const arrow = button.querySelector('.arrow-icon');
            
            // Tutup dropdown lain yang sedang terbuka
            document.querySelectorAll('.dropdown-menu').forEach(m => {
                if (m !== menu) {
                    m.classList.add('hidden');
                    // Pastikan arrow dropdown lain kembali ke posisi semula
                    const otherArrow = m.previousElementSibling?.querySelector('.arrow-icon');
                    if (otherArrow) otherArrow.classList.remove('rotate-180');
                }
            });

            // Toggle menu saat ini
            menu.classList.toggle('hidden');
            if (arrow) arrow.classList.toggle('rotate-180');
        }

        // Pastikan listener klik di luar tetap universal
        window.addEventListener('click', function(e) {
            if (!e.target.closest('.custom-dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(m => {
                    m.classList.add('hidden');
                    const arrow = m.previousElementSibling?.querySelector('.arrow-icon');
                    if (arrow) arrow.classList.remove('rotate-180');
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

        function switchTab(type) {
            const btnMonthly = document.getElementById('btn-monthly');
            const btnYearly = document.getElementById('btn-yearly');

            // Reset Style Kedua Tombol (Kembalikan ke tampilan default/tidak aktif)
            [btnMonthly, btnYearly].forEach(btn => {
                btn.classList.remove('bg-[#C9A74E]', 'text-black');
                btn.classList.add('text-neutral-500', 'hover:text-white');
            });

            // Berikan Style Aktif ke tombol yang dipilih
            if (type === 'monthly') {
                btnMonthly.classList.add('bg-[#C9A74E]', 'text-black');
                btnMonthly.classList.remove('text-neutral-500', 'hover:text-white');
            } else {
                btnYearly.classList.add('bg-[#C9A74E]', 'text-black');
                btnYearly.classList.remove('text-neutral-500', 'hover:text-white');
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