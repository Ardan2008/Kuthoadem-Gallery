<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Kuthoadem Gallery | Private Access</title>
    <style>
        :root {
            --gold: #FFD700;
            --dark-bg: #0a0a0a;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--dark-bg);
            color: #d1d5db;
        }
        .input-field {
            background-color: #1a1a1a;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
        }
        .input-field:focus {
            border-color: var(--gold);
            outline: none;
            box-shadow: 0 0 0 1px var(--gold);
        }
        .btn-gold {
            background-color: var(--gold);
            color: black;
            transition: all 0.3s ease;
        }
        .btn-gold:hover {
            background-color: #e6c200;
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
    </style>
</head>
<body class="min-h-screen flex overflow-x-hidden">

    <div class="hidden lg:block lg:w-1/2 relative overflow-hidden">
        <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&q=80&w=2000" 
             alt="Gallery Art" 
             class="absolute inset-0 w-full h-full object-cover"
             data-aos="zoom-out" data-aos-duration="2000">
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/20 to-transparent"></div>
        
        <div class="absolute bottom-16 left-16 z-10" data-aos="fade-up" data-aos-delay="500">
            <h1 class="text-5xl font-light text-gray-300 tracking-tighter">
                Kutho<span class="font-bold italic">adem.</span>
            </h1>
            <div class="w-12 h-[2px] bg-yellow-500 mt-4 mb-4"></div>
            <p class="text-gray-300 text-sm uppercase tracking-[0.3em]">Private Collection Portal</p>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-[#0a0a0a]">
        <div class="w-full max-w-md">
            
            <div class="mb-12" data-aos="fade-down" data-aos-delay="200">
                <h2 class="text-gray-300 text-3xl font-bold mb-2 tracking-tight">Gallery Administrator Access</h2>
                <p class="text-gray-400 text-sm">Sign in to access your dashboard and manage collections.</p>
            </div>

            <form id="authForm" class="space-y-8">
                <div class="space-y-2" data-aos="fade-up" data-aos-delay="400">
                    <label class="text-[10px] uppercase tracking-[0.2em] text-gray-300 font-bold">Username</label>
                    <input type="text" id="username" required
                        class="input-field w-full rounded-lg px-5 py-4 text-sm"
                        placeholder="Enter your username">
                </div>

                <div class="space-y-2" data-aos="fade-up" data-aos-delay="500">
                    <label class="text-[10px] uppercase tracking-[0.2em] text-gray-300 font-bold">Password</label>
                    <input type="password" id="password" required
                        class="input-field w-full rounded-lg px-5 py-4 text-sm tracking-[0.1em]"
                        placeholder="••••••••">
                </div>

                <div class="flex flex-row gap-4 pt-4" data-aos="fade-up" data-aos-delay="600">
                    <button type="button" onclick="handleCancel()"
                        class="btn-outline flex-1 font-bold py-5 rounded-lg uppercase text-xs tracking-[0.3em]">
                        Cancel
                    </button>
                    <button type="submit" 
                        class="btn-gold flex-1 font-bold py-5 rounded-lg uppercase text-xs tracking-[0.3em] shadow-lg shadow-yellow-500/10">
                        Sign In
                    </button>
                </div>
            </form>

            <div class="mt-20 flex flex-col items-center opacity-40" data-aos="fade-in" data-aos-delay="800">
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
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-out-quart'
        });

        const passwordInput = document.getElementById('password');
        let hideTimeout;

        passwordInput.addEventListener('input', function() {
            this.type = 'text';
            clearTimeout(hideTimeout);
            hideTimeout = setTimeout(() => {
                passwordInput.type = 'password';
            }, 800); 
        });

        passwordInput.addEventListener('blur', function() {
            this.type = 'password';
        });

        function handleCancel() {
            Swal.fire({
                title: 'TERMINATE?',
                text: "Cancel the sign-in process?",
                icon: 'question',
                iconColor: '#FFD700',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                background: '#151515',
                color: '#fff',
                confirmButtonColor: '#FFD700',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/'; 
                }
            });
        }

        document.getElementById('authForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'SIGNING IN',
                text: "Verifying admin access...",
                icon: 'info',
                iconColor: '#FFD700',
                background: '#151515',
                color: '#fff',
                showConfirmButton: false,
                allowOutsideClick: false,
                timer: 1500,
                didOpen: () => { Swal.showLoading(); }
            }).then(() => {
                Swal.fire({
                    title: 'SUCCESS',
                    text: 'Sign-in granted. Redirecting...',
                    icon: 'success',
                    iconColor: '#FFD700',
                    background: '#151515',
                    color: '#fff',
                    showConfirmButton: false,
                    timer: 2000,
                    allowOutsideClick: false
                }).then(() => {
                    window.location.href = '/dashboard'; 
                });
            });
        });
    </script>
</body>
</html>