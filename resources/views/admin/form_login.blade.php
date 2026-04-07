<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;700&display=swap" rel="stylesheet">
    <title>Kuthoadem Gallery | Login Form</title>
    <style>
        :root {
            --gold: #FFD700;
            --dark: #0f0f0f;
            --grey: #a1a1aa;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--dark);
            color: var(--grey);
            overflow: hidden;
        }

        .bg-art {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: radial-gradient(circle at 20% 30%, rgba(255, 215, 0, 0.05) 0%, transparent 40%),
                        radial-gradient(circle at 80% 70%, rgba(209, 213, 223, 0.05) 0%, transparent 40%);
        }

        .line-art {
            position: absolute;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            height: 1px;
            width: 100%;
            opacity: 0.1;
            transform: rotate(-45deg);
        }

        .glass-card {
            background: rgba(20, 20, 20, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.8);
            position: relative;
            overflow: hidden;
        }

        .glass-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--gold);
        }

        .input-art {
            background: transparent;
            border-bottom: 1px solid rgba(209, 213, 223, 0.2);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-art:focus {
            border-bottom: 1px solid var(--gold);
            padding-left: 12px;
            outline: none;
        }

        .btn-gold {
            background: var(--gold);
            color: var(--dark);
            font-weight: 700;
            letter-spacing: 2px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .btn-gold:hover {
            background: transparent;
            color: var(--gold);
            border: 2px solid var(--gold);
            transform: translateY(-2px);
        }

        .btn-outline {
            border: 1px solid rgba(209, 213, 223, 0.2);
            letter-spacing: 2px;
            transition: all 0.3s;
        }

        .btn-outline:hover {
            background: rgba(209, 213, 223, 0.05);
            border-color: var(--grey);
        }

        .swal2-dark-custom {
            background: #151515 !important;
            border: 1px solid var(--gold) !important;
            border-radius: 0 !important;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    
    <div class="bg-art">
        <div class="line-art" style="top: 20%"></div>
        <div class="line-art" style="top: 50%"></div>
        <div class="line-art" style="top: 80%"></div>
    </div>

    <div class="glass-card w-full max-w-[550px] p-10 md:p-14">
        <header class="mb-8">
            <h2 class="text-xs uppercase tracking-[0.8em] opacity-40 mb-2">Private Access</h2>
            <h1 class="text-4xl font-light tracking-tighter">
                Kutho<span class="font-bold italic text-white">adem.</span>
            </h1>
            <div class="w-8 h-[2px] bg-yellow-500 mt-4"></div>
        </header>

        <form id="authForm" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="relative">
                    <input type="text" id="username" required class="input-art w-full py-3 text-sm placeholder-transparent peer" placeholder="Username">
                    <label for="username" class="absolute left-0 -top-5 text-[10px] uppercase tracking-[0.3em] opacity-70 transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:top-3 peer-focus:-top-5 peer-focus:text-[10px] peer-focus:text-yellow-500">
                        Username
                    </label>
                </div>

                <div class="relative">
                    <input type="password" id="password" required class="input-art w-full py-3 text-sm placeholder-transparent peer" placeholder="Password">
                    <label for="password" class="absolute left-0 -top-5 text-[10px] uppercase tracking-[0.3em] opacity-70 transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:top-3 peer-focus:-top-5 peer-focus:text-[10px] peer-focus:text-yellow-500">
                        Password
                    </label>
                </div>
            </div>

            <div class="flex flex-row gap-4 pt-4">
                <button type="button" onclick="confirmCancel()" class="btn-outline flex-1 py-4 text-xs uppercase text-grey-300">
                    Cancel
                </button>
                <button type="submit" class="btn-gold flex-1 py-4 text-xs uppercase">
                    Login
                </button>
            </div>
        </form>

        <footer class="mt-12 text-center">
            <div class="flex justify-center items-center gap-4 opacity-60"> <div class="w-12 h-[1px] bg-white"></div>
                <span class="text-[10px] uppercase tracking-[1em] text-white">Kuthoadem Gallery</span>
                <div class="w-12 h-[1px] bg-white"></div>
            </div>
            <p class="mt-4 opacity-40 text-[8px] uppercase tracking-[0.4em] text-white">
                Private Collection • All Rights Reserved
            </p>
        </footer>
    </div>

    <script>
        const authForm = document.getElementById('authForm');
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

        authForm.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'AUTHORIZE?',
                text: "Confirm access to the primary dashboard.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'YES, PROCEED',
                cancelButtonText: 'NO',
                customClass: { popup: 'swal2-dark-custom' },
                background: '#151515',
                color: '#fff',
                confirmButtonColor: '#FFD700',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'SUCCESS',
                        text: 'Opening gallery gates...',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false,
                        customClass: { popup: 'swal2-dark-custom' }
                    }).then(() => {
                        window.location.href = '/';
                    });
                }
            });
        });

        function confirmCancel() {
            Swal.fire({
                title: 'CANCEL?',
                text: "Terminate the authentication session.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'YES',
                cancelButtonText: 'CANCEL',
                customClass: { popup: 'swal2-dark-custom' },
                background: '#151515',
                color: '#fff',
                confirmButtonColor: '#FFD700',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/';
                }
            });
        }
    </script>
</body>
</html>