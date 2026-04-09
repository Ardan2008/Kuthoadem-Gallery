<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;600;700&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Kuthoadem Gallery | Private Access</title>
    <style>
        :root {
            --gold: #C9A74E;
            --dark-bg: #0a0a0a;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--dark-bg);
            color: #d1d5db;
        }
        
        .input-field {
            background-color: #1a1a1a !important;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
            padding-left: 3.75rem !important; /* Ruang lebih untuk ikon + garis */
        }
        
        .input-field:focus {
            border-color: var(--gold);
            outline: none;
            box-shadow: 0 0 0 1px var(--gold);
        }

        /* Container untuk ikon dan garis */
        .icon-wrapper {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3.25rem; /* Area tetap untuk ikon dan garis */
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
        }

        /* Ikon Lucide */
        .input-icon {
            color: rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        /* Garis Vertikal Pemisah (Pseudo-element) */
        .icon-wrapper::after {
            content: '';
            position: absolute;
            right: 0;
            top: 25%; /* Jarak dari atas kotak */
            height: 50%; /* Panjang garis (setengah tinggi kotak) */
            width: 1px;
            background-color: rgba(255, 255, 255, 0.1); /* Warna garis default */
            transition: all 0.3s ease;
        }

        /* Efek Fokus: Ikon dan Garis berubah jadi emas */
        .input-group:focus-within .input-icon {
            color: var(--gold);
        }
        
        .input-group:focus-within .icon-wrapper::after {
            background-color: var(--gold);
            opacity: 0.5; /* Emas yang sedikit transparan agar tidak terlalu mencolok */
        }

        .btn-gold {
            background-color: var(--gold);
            color: black;
            transition: all 0.3s ease;
        }
        .btn-gold:hover {
            background-color: #e2c275;
            transform: translateY(-1px);
        }
        .btn-outline {
            border: 1px solid rgba(209, 213, 223, 0.2);
            color: #d1d5db;
            transition: all 0.3s ease;
        }
        .btn-outline:hover {
            background-color: rgba(255, 255, 255, 0.05);
            border-color: #d1d5db;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus {
            -webkit-box-shadow: 0 0 0 1000px #1a1a1a inset !important;
            -webkit-text-fill-color: white !important;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col lg:flex-row overflow-x-hidden">

    <div class="w-full h-80 lg:h-screen lg:w-1/2 relative overflow-hidden">
        <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&q=80&w=2000" 
             alt="Gallery Art" 
             class="absolute inset-0 w-full h-full object-cover"
             data-aos="zoom-out" data-aos-duration="3000">
        
        <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-transparent lg:bg-gradient-to-r lg:from-black/80 lg:via-black/20 to-transparent"></div>
        
        <div class="absolute bottom-10 left-10 lg:bottom-16 lg:left-16 z-10" data-aos="fade-up" data-aos-delay="800">
            <h1 class="text-4xl lg:text-5xl font-light text-gray-300 tracking-tighter">
                Kutho<span class="font-bold italic">adem.</span>
            </h1>
            <div class="w-12 h-[2px] bg-[#C9A74E] mt-4 mb-4"></div>
            <p class="text-gray-300 text-[10px] lg:text-sm uppercase tracking-[0.3em]">Private Collection Portal</p>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 lg:p-20 bg-[#0a0a0a]">
        <div class="w-full max-w-md">
            
            <div class="mb-12" data-aos="fade-down" data-aos-delay="1000">
                <h2 class="text-gray-300 text-3xl font-bold mb-2 tracking-tight">Gallery Administrator Access</h2>
                <p class="text-gray-400 text-sm">Sign in to access your dashboard and manage collections.</p>
            </div>

            <form id="authForm" class="space-y-8">
                <div class="space-y-2" data-aos="fade-up" data-aos-delay="1200">
                    <label class="text-[10px] uppercase tracking-[0.2em] text-gray-300 font-bold ml-1">Username</label>
                    <div class="relative input-group">
                        <div class="icon-wrapper">
                            <i data-lucide="user" class="input-icon w-5 h-5"></i>
                        </div>
                        <input type="text" id="username" required
                            class="input-field w-full rounded-lg px-5 py-4 text-sm"
                            placeholder="Enter your username">
                    </div>
                </div>

                <div class="space-y-2" data-aos="fade-up" data-aos-delay="1300">
                    <label class="text-[10px] uppercase tracking-[0.2em] text-gray-300 font-bold ml-1">Password</label>
                    <div class="relative input-group">
                        <div class="icon-wrapper">
                            <i data-lucide="lock" class="input-icon w-5 h-5"></i>
                        </div>
                        <input type="password" id="password" required
                            class="input-field w-full rounded-lg px-5 py-4 text-sm tracking-[0.1em]"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex flex-row gap-4 pt-4" data-aos="fade-up" data-aos-delay="1400">
                    <button type="button" onclick="handleCancel()"
                        class="btn-outline flex-1 font-bold py-5 rounded-lg uppercase text-xs tracking-[0.3em]">
                        Cancel
                    </button>
                    <button type="submit" 
                        class="btn-gold flex-1 font-bold py-5 rounded-lg uppercase text-xs tracking-[0.3em] shadow-lg shadow-[#C9A74E]/10">
                        Sign In
                    </button>
                </div>
            </form>

            <div class="mt-20 flex flex-col items-center opacity-40" data-aos="fade-in" data-aos-delay="1600">
                <div class="flex items-center gap-4 w-full">
                    <div class="h-[1px] bg-gray-600 flex-1"></div>
                    <span class="text-[9px] uppercase tracking-[0.5em] text-gray-300 whitespace-nowrap">Kuthoadem Gallery</span>
                    <div class="h-[1px] bg-gray-600 flex-1"></div>
                </div>
                <p class="mt-4 text-[8px] uppercase tracking-[0.2em] text-gray-400">Secure Environment • 2026</p>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        // AOS Initialization
        AOS.init({
            duration: 1200,
            once: true,
            easing: 'ease-out-quart'
        });

        // Password Reveal Logic
        const passwordInput = document.getElementById('password');
        let hideTimeout;

        passwordInput.addEventListener('input', function() {
            this.type = 'text';
            clearTimeout(hideTimeout);
            hideTimeout = setTimeout(() => {
                passwordInput.type = 'password';
            }, 1000);
        });

        passwordInput.addEventListener('blur', function() {
            this.type = 'password';
        });

        function handleCancel() {
            Swal.fire({
                title: 'TERMINATE?',
                text: "Return to the main gallery?",
                icon: 'question',
                iconColor: '#C9A74E',
                showCancelButton: true,
                confirmButtonText: 'Yes, Exit',
                cancelButtonText: 'Stay Here',
                background: '#151515',
                color: '#fff',
                confirmButtonColor: '#C9A74E',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/'; 
                }
            });
        }

        document.getElementById('authForm').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'VERIFYING',
                text: "Accessing secure database...",
                icon: 'info',
                iconColor: '#C9A74E',
                background: '#151515',
                color: '#fff',
                showConfirmButton: false,
                allowOutsideClick: false,
                timer: 1500,
                didOpen: () => { Swal.showLoading(); }
            }).then(() => {
                Swal.fire({
                    title: 'SUCCESS',
                    text: 'Welcome back, Administrator.',
                    icon: 'success',
                    iconColor: '#C9A74E',
                    background: '#151515',
                    color: '#fff',
                    showConfirmButton: false,
                    timer: 2000,
                    allowOutsideClick: false
                }).then(() => {
                    window.location.href = '/master'; 
                });
            });
        });
    </script>
</body>
</html>