<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
    /* ANIMASI: Bingkai menggunakan Emas yang konsisten */
    @keyframes frameDrawBorder {
        0% { border-color: rgba(201, 167, 78, 0.05); }
        50% { border-color: rgba(201, 167, 78, 0.4); }
        100% { border-color: rgba(201, 167, 78, 0.25); }
    }

    /* ANIMASI: Partikel menggunakan warna Emas (#C9A74E) */
    @keyframes goldParticle {
        0% { transform: translateY(0) scale(1); opacity: 0; }
        20% { opacity: 0.7; }
        50% { transform: translateY(-40px) scale(1.2); opacity: 0.9; }
        80% { opacity: 0.5; }
        100% { transform: translateY(-80px) scale(1.5); opacity: 0; }
    }

    @keyframes textFadeIn {
        from { opacity: 0; transform: translateY(10px); filter: blur(3px); }
        to { opacity: 0.8; transform: translateY(0); filter: blur(0); }
    }

    .animate-frame-draw { animation: frameDrawBorder 4s ease-out forwards; }
    .animate-text-reveal { animation: textFadeIn 2s cubic-bezier(0.22, 1, 0.36, 1) 0.5s forwards; opacity: 0; }
    .gold-particle { position: absolute; background: #C9A74E; border-radius: 50%; pointer-events: none; opacity: 0; animation: goldParticle linear infinite; }
    
    /* Custom Gold Color */
    .text-gold { color: #C9A74E; }
    .border-gold { border-color: #C9A74E; }
    .bg-gold { background-color: #C9A74E; }
</style>

<footer class="bg-[#0a0a0a] text-[#E5E5E5] pt-32 pb-12 overflow-hidden relative font-sans tracking-wide">
    <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-[#C9A74E]/30 to-transparent"></div>
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-[#C9A74E]/5 blur-[120px] rounded-full pointer-events-none"></div>

    <div class="max-w-[1440px] mx-auto px-10 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 mb-24">
            
            <div class="md:col-span-4 space-y-8">
                <div class="group cursor-default">
                    <h2 class="text-3xl font-serif font-bold tracking-[0.25em] uppercase leading-none text-gray-300 transition-all duration-500">
                        Kuthoadem
                        <span class="text-gold font-light italic block text-xl tracking-[0.1em] mt-2 group-hover:translate-x-2 transition-transform duration-500">Fine Art Gallery</span>
                    </h2>
                </div>
                <div class="max-w-sm relative">
                    <div class="absolute -inset-6 bg-[#C9A74E]/5 blur-[30px] rounded-full pointer-events-none"></div>
                    <div class="relative z-10 p-1 bg-black/40 backdrop-blur-sm">
                        <div class="border border-[#C9A74E]/20 p-6 relative animate-frame-draw overflow-hidden">
                            <div class="absolute top-0 left-0 w-6 h-[1px] bg-gold"></div>
                            <div class="absolute top-0 left-0 w-[1px] h-6 bg-gold"></div>
                            <div class="absolute bottom-0 right-0 w-6 h-[1px] bg-gold"></div>
                            <div class="absolute bottom-0 right-0 w-[1px] h-6 bg-gold"></div>
                            
                            <p class="text-slate-400 text-sm leading-loose font-light italic animate-text-reveal">
                                "Where timeless masterpieces meet contemporary vision. A premier digital sanctuary for curated fine arts and global artistic excellence."
                            </p>
                            <div class="mt-6 flex items-center gap-3">
                                <div class="h-[1px] w-16 bg-[#C9A74E]/40"></div>
                                <div class="h-1 w-1 rounded-full bg-gold animate-pulse"></div>
                            </div>
                            <div class="absolute bottom-1 right-2 text-[8px] uppercase tracking-[0.3em] text-slate-700">CFA_ART_2026</div>
                            <div class="gold-particle" style="width: 2px; height: 2px; bottom: 10%; left: 20%; animation-duration: 4s; animation-delay: 1s;"></div>
                            <div class="gold-particle" style="width: 3px; height: 3px; bottom: 15%; left: 50%; animation-duration: 6s; animation-delay: 0s;"></div>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4">
                    <a href="#" class="w-9 h-9 rounded-full border border-white/10 flex items-center justify-center text-slate-500 transition-all duration-500 ease-out hover:text-[#C9A74E] hover:border-[#C9A74E]/40 hover:bg-[#C9A74E]/5 group">
                        <i class="fa-brands fa-instagram text-base transition-transform duration-500 group-hover:scale-110"></i>
                    </a>

                    <a href="#" class="w-9 h-9 rounded-full border border-white/10 flex items-center justify-center text-slate-500 transition-all duration-500 ease-out hover:text-[#C9A74E] hover:border-[#C9A74E]/40 hover:bg-[#C9A74E]/5 group">
                        <i class="fa-brands fa-facebook-f text-base transition-transform duration-500 group-hover:scale-110"></i>
                    </a>

                    <a href="#" class="w-9 h-9 rounded-full border border-white/10 flex items-center justify-center text-slate-500 transition-all duration-500 ease-out hover:text-[#C9A74E] hover:border-[#C9A74E]/40 hover:bg-[#C9A74E]/5 group">
                        <i class="fa-brands fa-tiktok text-base transition-transform duration-500 group-hover:scale-110"></i>
                    </a>

                    <a href="#" class="w-9 h-9 rounded-full border border-white/10 flex items-center justify-center text-slate-500 transition-all duration-500 ease-out hover:text-[#C9A74E] hover:border-[#C9A74E]/40 hover:bg-[#C9A74E]/5 group">
                        <i class="fa-brands fa-x-twitter text-base transition-transform duration-500 group-hover:scale-110"></i>
                    </a>
                </div>
            </div>

            <div class="md:col-span-2">
                <h4 class="text-gold uppercase tracking-[0.4em] text-[10px] font-bold mb-10 flex items-center gap-2">
                    <span class="w-6 h-[1px] bg-gold/30"></span> Explore
                </h4>
                <ul class="space-y-4 text-[13px] font-light text-slate-400">
                    <li><a href="/collection" class="hover:text-gold transition-all flex items-center gap-3 group"><span class="w-0 h-[1px] bg-gold transition-all group-hover:w-4"></span> Collection</a></li>
                    <li><a href="/artists" class="hover:text-gold transition-all flex items-center gap-3 group"><span class="w-0 h-[1px] bg-gold transition-all group-hover:w-4"></span> Artists</a></li>
                    <li><a href="/exhibitions" class="hover:text-gold transition-all flex items-center gap-3 group"><span class="w-0 h-[1px] bg-gold transition-all group-hover:w-4"></span> Exhibitions</a></li>
                    <li><a href="/curations" class="hover:text-gold transition-all flex items-center gap-3 group"><span class="w-0 h-[1px] bg-gold transition-all group-hover:w-4"></span> Curations</a></li>
                </ul>
            </div>

            <div class="md:col-span-2">
                <h4 class="text-gold uppercase tracking-[0.4em] text-[10px] font-bold mb-10 flex items-center gap-2">
                    <span class="w-6 h-[1px] bg-gold/30"></span> Opening
                </h4>
                <ul class="space-y-4 text-[11px] font-light text-slate-400 uppercase tracking-widest leading-relaxed">
                    <li><span class="text-slate-500 block mb-1 font-bold">Mon — Fri</span> 10:00 AM — 08:00 PM</li>
                    <li><span class="text-slate-500 block mb-1 font-bold">Sat — Sun</span> 11:00 AM — 06:00 PM</li>
                    <li class="pt-2 italic text-gold/60 font-serif lowercase tracking-normal text-sm">* By appointment only</li>
                </ul>
            </div>

            <div class="md:col-span-2">
                <h4 class="text-gold uppercase tracking-[0.4em] text-[10px] font-bold mb-10 flex items-center gap-2">
                    <span class="w-6 h-[1px] bg-gold/30"></span> Contact
                </h4>
                <ul class="space-y-10 antialiased">
                    <li class="group">
                        <div class="flex items-center gap-3 mb-1">
                            <div class="w-1 h-1 rounded-full bg-gold"></div>
                            <span class="text-[10px] font-bold tracking-[0.2em] text-slate-500 uppercase">Email</span>
                        </div>
                        <a href="mailto:hello@kuthoadem.art" class="text-base font-light tracking-tight text-slate-400 hover:text-gold transition-colors duration-300">
                            hello@kuthoadem.art
                        </a>
                    </li>
                    <li class="group">
                        <div class="flex items-center gap-3 mb-1">
                            <div class="w-1 h-1 rounded-full bg-gold"></div>
                            <span class="text-[10px] font-bold tracking-[0.2em] text-slate-500 uppercase">Number</span>
                        </div>
                        <a href="tel:+6281389256833" class="text-base font-light tracking-[0.05em] text-slate-400 hover:text-gold transition-colors duration-300">
                            +62 813-8925-6833
                        </a>
                    </li>
                </ul>
            </div>

            <div class="md:col-span-2">
                <h4 class="text-gold uppercase tracking-[0.4em] text-[10px] font-bold mb-10 flex items-center gap-2">
                    <span class="w-6 h-[1px] bg-gold/30"></span> Journal
                </h4>
                <p class="text-slate-500 text-[13px] mb-6 font-light leading-relaxed">Join for private previews.</p>
                <form action="#" class="relative group border-b border-white/10 focus-within:border-gold/50 transition-all duration-500">
                    <input type="email" placeholder="EMAIL" required class="w-full bg-transparent py-2 pr-8 text-[10px] tracking-[0.2em] focus:outline-none placeholder:text-slate-700 text-white">
                    <button type="submit" class="absolute right-0 top-1/2 -translate-y-1/2 text-gold hover:text-white transition-all">
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="border-t border-white/10 pt-16 relative">
            <div class="absolute top-0 left-0 w-40 h-[2px] bg-gold"></div>

            <div class="flex flex-col md:flex-row justify-between items-end gap-10">
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <p class="text-[11px] md:text-[13px] uppercase tracking-[0.4em] text-slate-500 font-medium">
                            &copy; 2026 <span class="text-gray-300 font-bold">Kuthoadem Gallery</span> 
                        </p>
                        <span class="h-4 w-[1px] bg-white/20 hidden md:block"></span> 
                        <p class="text-[11px] md:text-[12px] uppercase tracking-[0.3em] text-slate-600 italic">
                            Chroma Gallery
                        </p>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-0 right-0 opacity-[0.02] pointer-events-none select-none hidden lg:block">
                <h2 class="text-9xl font-serif font-bold -mb-6 tracking-tighter text-white uppercase">Kuthoadem</h2>
            </div>
        </div>
    </div>
</footer>