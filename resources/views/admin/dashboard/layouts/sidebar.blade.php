<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Kuthoadem Gallery') }}</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/heroicons@2.0.16/24/outline/index.js" defer></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#1a1a1a] text-gray-300 antialiased font-sans" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <div 
            x-show="sidebarOpen" 
            @click="sidebarOpen = false" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-40 bg-black/60 backdrop-blur-sm lg:hidden">
        </div>
        
        <aside 
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 flex flex-col w-72 h-screen p-6 transition-transform duration-300 ease-in-out transform bg-[#1a1a1a] border-r border-neutral-800 lg:translate-x-0 lg:static lg:inset-auto lg:z-auto"
        >
            <div class="relative flex flex-col items-center justify-center pt-2 pb-8 group">
                <div class="flex items-center gap-2 mb-3 opacity-40">
                    <div class="w-6 h-[1px] bg-gradient-to-r from-transparent to-yellow-500"></div>
                    <div class="w-1 h-1 rotate-45 border border-yellow-500"></div>
                    <div class="w-6 h-[1px] bg-gradient-to-l from-transparent to-yellow-500"></div>
                </div>

                <div class="relative z-10 flex items-center justify-center w-full">
                    <div class="absolute left-4 flex flex-col gap-1 items-center">
                        <div class="w-[1.5px] h-3 bg-gradient-to-t from-yellow-500 to-transparent"></div>
                        <div class="w-1 h-1 rounded-full bg-yellow-500"></div>
                    </div>

                    <div class="text-center px-10">
                        <h1 class="text-xl font-black tracking-[0.2em] text-gray-300 uppercase leading-none">
                            Kuthoadem
                        </h1>
                        <div class="flex items-center justify-center gap-2 mt-2">
                            <div class="h-[1px] w-3 bg-neutral-700"></div>
                            <span class="text-[8px] tracking-[0.4em] text-yellow-500 uppercase font-bold opacity-80">Gallery</span>
                            <div class="h-[1px] w-3 bg-neutral-700"></div>
                        </div>
                    </div>

                    <div class="absolute right-4 flex flex-col gap-1 items-center">
                        <div class="w-1 h-1 rounded-full bg-yellow-500"></div>
                        <div class="w-[1.5px] h-3 bg-gradient-to-b from-yellow-500 to-transparent"></div>
                    </div>
                </div>
            </div>

            <div class="relative mb-8 group">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 group-focus-within:text-yellow-500 transition-colors duration-300">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>

                <input type="text" placeholder="Search artworks..." 
                    class="w-full py-2.5 pl-10 pr-12 text-sm bg-neutral-800/30 border border-neutral-800 rounded-xl text-gray-300 placeholder-gray-600 focus:outline-none focus:ring-1 focus:ring-yellow-500/40 focus:bg-neutral-800/50 transition-all duration-300">

                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none opacity-20 group-focus-within:opacity-40 transition-opacity">
                    <div class="flex flex-col items-center">
                        <span class="text-[10px] font-black tracking-tighter text-yellow-500 border border-yellow-500/50 rounded-md px-1 py-0">K</span>
                    </div>
                </div>
            </div>

            {{-- link sidebar --}}
            <nav class="flex-1 px-2 space-y-4 overflow-y-auto custom-scrollbar">

                <div class="space-y-2">
                    <div onclick="toggleSection('main-menu-content', 'main-menu-arrow')" 
                        class="flex items-center justify-between px-4 py-2 text-[10px] font-bold tracking-[0.2em] text-gray-500 uppercase cursor-pointer hover:text-gray-300 transition-all group">
                        <span>Main Menu</span>
                        <svg id="main-menu-arrow" class="w-3 h-3 transition-transform duration-500 ease-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>

                    <div id="main-menu-content" class="grid grid-rows-[1fr] opacity-100 transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)]">
                        <div class="overflow-hidden">
                            <div class="relative ml-6 border-l border-neutral-800/80 space-y-1 pb-2">
                                
                                <div class="relative">
                                    <div class="absolute -left-[1px] top-6 w-3 h-4 border-l border-b border-neutral-800/80 rounded-bl-lg"></div>
                                    <a href="/master" class="group relative flex items-center gap-3 ml-6 mr-4 px-4 py-3 text-sm font-semibold text-gray-300">
                                        <div class="absolute inset-0 bg-gradient-to-r from-neutral-800/80 via-neutral-800/40 to-transparent rounded-xl border border-white/5 shadow-xl"></div>
                                        <div class="absolute left-0 top-1/4 bottom-1/4 w-[2px] bg-yellow-500 rounded-full shadow-[0_0_12px_rgba(234,179,8,0.4)]"></div>
                                        <div class="relative flex items-center gap-3">
                                            <svg class="w-5 h-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                                            <span>Dashboard</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="relative">
                                    <div class="absolute -left-[1px] top-0 h-6 border-l border-neutral-800/80"></div>
                                    <div class="absolute -left-[1px] top-6 w-3 h-4 border-l border-b border-neutral-800/80 rounded-bl-lg"></div>
                                    <a href="/insights" class="flex items-center gap-3 ml-6 px-4 py-3 text-sm font-medium text-gray-500 hover:text-gray-300 transition-all group">
                                        <svg class="w-5 h-5 group-hover:text-yellow-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" /><path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" /></svg>
                                        <span>Insights</span>
                                    </a>
                                </div>

                                <div class="relative">
                                    <div class="absolute -left-[1px] top-0 h-6 border-l border-neutral-800/80"></div>
                                    <div class="absolute -left-[1px] top-6 w-3 h-4 border-l border-b border-neutral-800/80 rounded-bl-lg"></div>
                                    <a href="/artworks" class="flex items-center gap-3 ml-6 px-4 py-3 text-sm font-medium text-gray-500 hover:text-gray-300 transition-all group">
                                        <svg class="w-5 h-5 group-hover:text-yellow-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
                                        <span>ArtWorks</span>
                                    </a>
                                </div>

                                <div class="relative">
                                    <div class="absolute -left-[1px] top-0 h-6 border-l border-neutral-800/80"></div>
                                    <div class="absolute -left-[1px] top-6 w-3 h-4 border-l border-b border-neutral-800/80 rounded-bl-lg"></div>
                                    <a href="/transactions" class="flex items-center gap-3 ml-6 px-4 py-3 text-sm font-medium text-gray-500 hover:text-gray-300 transition-all group">
                                        <svg class="w-5 h-5 group-hover:text-yellow-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                                        <span>Transactions</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <div onclick="toggleSection('features-content', 'features-arrow')" 
                        class="flex items-center justify-between px-4 py-2 text-[10px] font-bold tracking-[0.2em] text-gray-500 uppercase cursor-pointer hover:text-gray-300 transition-all group">
                        <span>Features</span>
                        <svg id="features-arrow" class="w-3 h-3 transition-transform duration-500 ease-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>

                    <div id="features-content" class="grid grid-rows-[1fr] opacity-100 transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)]">
                        <div class="overflow-hidden">
                            <div class="relative ml-6 border-l border-neutral-800/80 space-y-1 pb-2">
                                <div class="relative">
                                    <div class="absolute -left-[1px] top-6 w-3 h-4 border-l border-b border-neutral-800/80 rounded-bl-lg"></div>
                                    <a href="/collectors" class="flex items-center gap-3 ml-6 px-4 py-3 text-sm font-medium text-gray-500 hover:text-gray-300 transition-all group">
                                        <svg class="w-5 h-5 group-hover:text-yellow-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                        <span>Collectors</span>
                                    </a>
                                </div>

                                <div class="relative">
                                    <div class="absolute -left-[1px] top-0 h-6 border-l border-neutral-800/80"></div>
                                    <div class="absolute -left-[1px] top-6 w-3 h-4 border-l border-b border-neutral-800/80 rounded-bl-lg"></div>
                                    <a href="/submit" class="flex items-center gap-3 ml-6 px-4 py-3 text-sm font-medium text-gray-500 hover:text-gray-300 transition-all group">
                                        <svg class="w-5 h-5 group-hover:text-yellow-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        <span>Submit Artworks</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <div onclick="toggleSection('tools-content', 'tools-arrow')" 
                        class="flex items-center justify-between px-4 py-2 text-[10px] font-bold tracking-[0.2em] text-gray-500 uppercase cursor-pointer hover:text-gray-300 transition-all group">
                        <span>Tools</span>
                        <svg id="tools-arrow" class="w-3 h-3 transition-transform duration-500 ease-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>

                    <div id="tools-content" class="grid grid-rows-[1fr] opacity-100 transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)]">
                        <div class="overflow-hidden">
                            <div class="relative ml-6 border-l border-neutral-800/80 space-y-1 pb-2">
                                <div class="relative">
                                    <div class="absolute -left-[1px] top-6 w-3 h-4 border-l border-b border-neutral-800/80 rounded-bl-lg"></div>
                                    <a href="/featured" class="flex items-center gap-3 ml-6 px-4 py-3 text-sm font-medium text-gray-500 hover:text-gray-300 transition-all group">
                                        <svg class="w-5 h-5 group-hover:text-yellow-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" /></svg>
                                        <span>Featured</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="pt-4 mt-auto border-t border-neutral-800/50">
                <div class="relative p-4 overflow-hidden rounded-xl bg-neutral-900/40 border border-neutral-800 transition-all duration-500 hover:border-yellow-500/30 group">
                    
                    <div class="absolute -top-6 -right-6 w-16 h-16 bg-yellow-500/5 blur-[30px] rounded-full group-hover:bg-yellow-500/10 transition-all duration-700"></div>

                    <div class="relative z-10 flex flex-col items-center gap-3">
                        <div class="flex items-center gap-2.5 opacity-40 group-hover:opacity-80 transition-opacity">
                            <div class="w-6 h-[1px] bg-gradient-to-r from-transparent to-yellow-500/50"></div>
                            <div class="w-1 h-1 rotate-45 border border-yellow-500/80"></div>
                            <div class="w-6 h-[1px] bg-gradient-to-l from-transparent to-yellow-500/50"></div>
                        </div>

                        <div class="text-center">
                            <h4 class="text-[14px] font-bold tracking-[0.2em] text-gray-100 uppercase leading-none">
                                Kuthoadem
                            </h4>
                            <p class="text-[9px] tracking-[0.4em] text-yellow-500/90 uppercase font-medium mt-1.5">
                                Gallery
                            </p>
                        </div>

                        <p class="text-[10px] text-gray-500 uppercase tracking-widest font-semibold opacity-80 group-hover:opacity-100 transition-opacity">
                            &copy; 2026
                        </p>
                    </div>
                </div>
            </div>
        </aside>

        
    </div>
    
    <script>
        // Object untuk melacak status setiap section
        const sectionStates = {
            'main-menu-content': true,
            'features-content': true,
            'tools-content': true
        };

        function toggleSection(contentId, arrowId) {
            const content = document.getElementById(contentId);
            const arrow = document.getElementById(arrowId);
            
            sectionStates[contentId] = !sectionStates[contentId];

            if (sectionStates[contentId]) {
                content.classList.replace('grid-rows-[0fr]', 'grid-rows-[1fr]');
                content.classList.replace('opacity-0', 'opacity-100');
                arrow.style.transform = 'rotate(0deg)';
            } else {
                content.classList.replace('grid-rows-[1fr]', 'grid-rows-[0fr]');
                content.classList.replace('opacity-100', 'opacity-0');
                arrow.style.transform = 'rotate(-90deg)';
            }
        }
    </script>

</body>
</html>