<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - 404</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-white flex flex-col items-center justify-center h-screen p-6 text-center">
    
    <div class="mb-8">
        <img src="/svg/404.svg" alt="404 Error" class="w-full max-w-lg">
    </div>
    
    <h3 class="text-3xl md:text-4xl font-bold text-slate-800 mb-3 tracking-tight">
        Oops... Page not found
    </h3>

    <p class="text-gray-500 text-lg mb-10 max-w-md mx-auto leading-relaxed">
        We&apos;re sorry, the page you were looking for doesn't exist or has been moved.
    </p>
    
    <a href="/" id="btn-home" class="group relative inline-flex items-center gap-3 bg-[#C9A74E] px-10 py-4 rounded-2xl text-white text-sm uppercase tracking-widest font-bold overflow-hidden transition-all duration-500 hover:shadow-[0_20px_40px_rgba(201,167,78,0.3)] hover:-translate-y-1.5 active:scale-95">
        
        <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

        <div class="relative flex items-center justify-center w-6 h-6">
            <ion-icon id="icon-home" name="home" class="text-xl transition-all duration-300"></ion-icon>
            
            <svg id="icon-loader" class="hidden animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>
        
        <span id="btn-text" class="relative">Back to home</span>
    </a>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        document.getElementById('btn-home').addEventListener('click', function(e) {
            // Mencegah link langsung berpindah halaman
            e.preventDefault();
            const targetUrl = this.getAttribute('href');
            
            const btn = this;
            const iconHome = document.getElementById('icon-home');
            const iconLoader = document.getElementById('icon-loader');
            const btnText = document.getElementById('btn-text');

            // Ubah tampilan ke State Loading
            iconHome.classList.add('hidden'); // Sembunyikan ikon home
            iconLoader.classList.remove('hidden'); // Munculkan loader
            btnText.innerText = 'Loading...'; // Ubah teks (opsional)
            btn.style.pointerEvents = 'none'; // Cegah klik ganda
            btn.style.opacity = '0.8';

            // Delay simulasi loading sebelum pindah halaman
            setTimeout(() => {
                window.location.href = targetUrl;
            }, 1500); // 1.5 detik
        });
    </script>
</body>
</html>