<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuthoadem Gallery | Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { 
            /* Mengubah BG utama sesuai permintaan */
            background-color: #1a1a1a; 
            color: #e5e7eb; 
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .card-dark { 
            /* Menyesuaikan warna kartu agar sedikit lebih terang dari BG utama untuk kedalaman */
            background-color: #242424; 
            border: 1px solid #333333; 
            border-radius: 1.25rem; 
            padding: 1.75rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.4);
        }
        .form-input {
            background-color: #2d2d2d !important;
            border: 1px solid #404040 !important;
            color: #f3f4f6 !important;
            transition: all 0.2s ease;
        }
        .form-input:focus {
            border-color: #eab308 !important;
            background-color: #333333 !important;
            outline: none;
            box-shadow: 0 0 0 2px rgba(234, 179, 8, 0.15);
        }
        .label-text {
            color: #a3a3a3;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        /* Custom SweetAlert Style agar selaras dengan warna baru */
        .swal2-popup-custom {
            background: #242424 !important;
            color: #fff !important;
            border: 1px solid #333 !important;
            border-radius: 1.5rem !important;
        }
    </style>
</head>
<body class="p-6 md:p-12">

    <div class="max-w-6xl mx-auto">
        <header class="mb-10">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-300 to-gray-500 bg-clip-text text-transparent">Submit New Artwork</h1>
            <p class="text-gray-400 mt-2">Manage your gallery collection with ease.</p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div class="lg:col-span-7 space-y-8">
                <div class="card-dark">
                    <h2 class="text-xl text-gray-300 font-semibold mb-6 flex items-center gap-2">
                        <span class="w-2 h-6 bg-[#C9A74E] rounded-full"></span> Artist Biography
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <div class="col-span-1">
                            <label class="block text-[10px] label-text mb-2">Artist Profile</label>
                            <div class="group relative w-full aspect-square rounded-xl overflow-hidden border border-[#404040] cursor-pointer shadow-lg">
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                <div class="absolute inset-0 bg-black/70 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px] flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#C9A74E] mb-2 transform scale-75 group-hover:scale-100 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span class="block text-[11px] mt-2 font-medium text-[#C9A74E]">Change Photo</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2 space-y-4">
                            <div>
                                <label class="block text-[10px] label-text mb-2">Painter Name</label>
                                <input type="text" value="By Elara Vensley" class="form-input w-full p-3 rounded-lg text-sm">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] label-text mb-2">Birthplace</label>
                                    <input type="text" value="America" class="form-input w-full p-3 rounded-lg text-sm">
                                </div>
                                <div>
                                    <label class="block text-[10px] label-text mb-2">Career</label>
                                    <input type="text" value="1999-2001" class="form-input w-full p-3 rounded-lg text-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <label class="block text-[10px] label-text mb-2">Artist Description</label>
                        <textarea class="form-input w-full p-4 rounded-lg text-sm h-32 leading-relaxed">Elara Vensley is a contemporary visual artist known for her evocative blend of abstract expression and atmospheric landscapes...</textarea>
                    </div>
                </div>

                <div class="card-dark">
                    <h2 class="text-xl text-gray-300 font-semibold mb-6 flex items-center gap-2">
                         <span class="w-2 h-6 bg-[#C9A74E] rounded-full"></span> Art Identification
                    </h2>
                    <div class="space-y-5">
                        <div>
                            <label class="block text-[10px] label-text mb-2">Art Name</label>
                            <input type="text" value="Whispers of the Void" class="form-input w-full p-3 rounded-lg text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] label-text mb-2">Art Description</label>
                            <textarea class="form-input w-full p-4 rounded-lg text-sm h-40">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 space-y-8">
                <div class="card-dark">
                    <h2 class="text-xl text-gray-300 font-semibold mb-6 flex items-center gap-2">
                        <span class="w-2 h-6 bg-[#C9A74E] rounded-full"></span> Product Detail
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-[10px] label-text mb-2">Painter Reference</label>
                            <input type="text" value="By Leonor" class="form-input w-full p-3 rounded-lg text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] label-text mb-2">Art Style / Category</label>
                            <select class="form-input w-full p-3 rounded-lg text-sm appearance-none cursor-pointer">
                                <option>Surealisme</option>
                                <option>Abstract</option>
                                <option>Realism</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] label-text mb-2">Stock</label>
                                <input type="number" value="1" class="form-input w-full p-3 rounded-lg text-sm text-center">
                            </div>
                            <div>
                                <label class="block text-[10px] label-text mb-2">Max Limit</label>
                                <input type="number" value="5" class="form-input w-full p-3 rounded-lg text-sm text-center">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-dark">
                    <h2 class="text-xl text-gray-300 font-semibold mb-6 flex items-center gap-2">
                        <span class="w-2 h-6 bg-[#C9A74E] rounded-full"></span> Art Pricing
                    </h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2 sm:col-span-1">
                            <label class="block text-[10px] label-text mb-2">Base Price</label>
                            <div class="flex">
                                <span class="bg-[#333] px-4 py-3 rounded-l-lg border-y border-l border-[#404040] text-sm text-[#C9A74E] font-bold">$</span>
                                <input type="text" value="20,000" class="form-input w-full p-3 rounded-r-lg rounded-l-none text-sm">
                            </div>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label class="block text-[10px] label-text mb-2">Sale Price</label>
                            <div class="flex">
                                <span class="bg-[#333] px-4 py-3 rounded-l-lg border-y border-l border-[#404040] text-sm text-green-500 font-bold">$</span>
                                <input type="text" value="15,000" class="form-input w-full p-3 rounded-r-lg rounded-l-none text-sm">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-dark">
                    <h2 class="text-xl text-gray-300 font-semibold mb-6 flex items-center gap-2">
                        <span class="w-2 h-6 bg-[#C9A74E] rounded-full"></span> Media Assets
                    </h2>
                    <div class="flex flex-wrap gap-3">
                        <div class="w-20 h-20 border-2 border-dashed border-neutral-700 rounded-xl flex items-center justify-center cursor-pointer hover:border-[#C9A74E] transition-colors group">
                            <span class="text-neutral-500 group-hover:text-[#C9A74E] text-xl">＋</span>
                        </div>
                        <div class="w-20 h-20 bg-neutral-800 rounded-xl overflow-hidden relative group">
                            <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&q=80&w=100" class="object-cover w-full h-full opacity-60">
                            <div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="text-[10px] bg-red-500/80 px-2 py-1 rounded text-white">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-end gap-4 pt-4">
                    <button id="btnCancel" onclick="handleCancel()" class="px-8 py-3 bg-transparent border border-red-500/30 hover:bg-red-500/10 text-red-500 rounded-xl font-semibold transition-all flex items-center justify-center gap-2">
                        <svg id="cancelSpinner" class="hidden animate-spin h-5 w-5" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        <span id="btnCancelText">Cancel</span>
                    </button>
                    <button onclick="handleUpload()" class="px-10 py-3 bg-[#C9A74E] hover:bg-[#B39342] text-black rounded-xl font-bold shadow-lg shadow-[#C9A74E]/10 transition-all">
                        Publish Artwork
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const commonSwalConfig = {
            background: '#242424',
            color: '#fff',
            customClass: { popup: 'swal2-popup-custom' }
        };

        function handleCancel() {
            Swal.fire({
                ...commonSwalConfig,
                title: 'Discard changes?',
                text: "Unsaved progress will be lost.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#404040',
                confirmButtonText: 'Yes, discard',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    const btn = document.getElementById('btnCancel');
                    const spinner = document.getElementById('cancelSpinner');
                    const text = document.getElementById('btnCancelText');

                    btn.disabled = true;
                    spinner.classList.remove('hidden');
                    text.innerText = 'Redirecting...';

                    Swal.fire({
                        ...commonSwalConfig,
                        title: 'Cleaning up...',
                        timer: 1200,
                        showConfirmButton: false,
                        didOpen: () => { Swal.showLoading(); },
                        willClose: () => { window.location.href = '/submit_artworks'; }
                    });
                }
            });
        }

        function handleUpload() {
            Swal.fire({
                ...commonSwalConfig,
                title: 'Ready to publish?',
                text: "This artwork will be visible to the public.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#eab308',
                cancelButtonColor: '#404040',
                confirmButtonText: 'Yes, publish now!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // 1. Loading State
                    Swal.fire({
                        ...commonSwalConfig,
                        title: 'Publishing...',
                        html: 'Syncing with gallery server...',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => { Swal.showLoading(); }
                    });

                    // 2. Simulasi Proses
                    setTimeout(() => {
                        // 3. Success State (Tanpa tombol OK, langsung redirect)
                        Swal.fire({
                            ...commonSwalConfig,
                            icon: 'success',
                            title: 'Success!',
                            text: 'Artwork published successfully.',
                            iconColor: '#eab308',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                        }).then(() => {
                            window.location.href = '/submit_artworks'; 
                        });
                    }, 2500);
                }
            });
        }
    </script>
</body>
</html>