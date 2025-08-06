<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cek Status Naskah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body class="bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50 min-h-screen font-sans relative">

    <!-- Background Particles -->
    <div class="absolute w-full h-full overflow-hidden -z-10">
        <div class="particle w-16 h-16 bg-orange-100 rounded-full absolute top-10 left-10 animate-float"></div>
        <div class="particle w-8 h-8 bg-orange-100 rounded-full absolute top-32 right-20 animate-float"></div>
        <div class="particle w-12 h-12 bg-orange-100 rounded-full absolute bottom-20 left-20 animate-float"></div>
        <div class="particle w-6 h-6 bg-orange-100 rounded-full absolute bottom-32 right-10 animate-float"></div>
        <div class="particle w-10 h-10 bg-orange-100 rounded-full absolute top-1/2 left-5 animate-float"></div>
    </div>

    <!-- Main Container -->
    <div class="w-full max-w-md px-4 mx-auto py-10">

        <!-- Main Card -->
        <div class="glass-effect shadow-2xl rounded-2xl p-8 fade-in-up relative overflow-hidden">
            <!-- Decorative Gradient Bubbles -->
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-amber-400 to-orange-400 rounded-full opacity-10 -translate-y-16 translate-x-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-yellow-400 to-amber-400 rounded-full opacity-10 translate-y-12 -translate-x-12"></div>

            <!-- Header -->
            <div class="text-center mb-8 relative z-10">
                <div class="float-animation mb-4">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full shadow-lg">
                        <span class="text-2xl">🔍</span>
                    </div>
                </div>
                <h1 class="text-3xl font-extrabold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent mb-2">Cek Status Naskah</h1>
                <div class="w-20 h-1 bg-gradient-to-r from-amber-400 to-orange-500 mx-auto rounded-full mb-2"></div>
                <p class="text-gray-600 text-sm">Lacak proses penerbitan naskah Anda dengan cepat dan mudah</p>
            </div>

            <!-- Error Section -->
            @if ($errors->has('not_found'))
            <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-lg mb-6 fade-in-up">
                <div class="flex items-center text-sm text-red-700">
                    ⚠️ {{ $errors->first('not_found') }}
                </div>
            </div>
            @endif

            @if ($errors->any() && !$errors->has('not_found'))
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-lg mb-6 fade-in-up">
                <ul class="text-yellow-700 text-sm space-y-1 pl-2 list-disc">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Form -->
            <form action="{{ route('tracking.track') }}" method="POST" class="space-y-6 relative z-10">
                @csrf

                <!-- Kode Penerbit -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kode Penerbit</label>
                    <input type="text" name="kode_penerbit" required placeholder="Contoh: AM080725017"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-amber-400 focus:ring-0 input-glow bg-white/80 backdrop-blur-sm transition-all duration-300">
                </div>

                <!-- Nomor HP -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor HP</label>
                    <input type="text" name="nomor_hp" required placeholder="Contoh: 08xxxxxxxxxx"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-amber-400 focus:ring-0 input-glow bg-white/80 backdrop-blur-sm transition-all duration-300">
                </div>

                <!-- Tombol -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 btn-hover-effect shadow-lg">
                    <span class="flex items-center justify-center space-x-2">
                        <span>Cek Status</span>
                        <span class="text-lg">🚀</span>
                    </span>
                </button>
            </form>

            <!-- Footer in Card -->
            <div class="mt-8 text-center relative z-10 text-xs text-gray-500">
                © {{ date('Y') }} Sistem Pelacakan Penerbitan Naskah
                <div class="flex justify-center items-center mt-2 space-x-1">
                    <div class="w-1.5 h-1.5 bg-amber-400 rounded-full animate-pulse"></div>
                    <div class="w-1.5 h-1.5 bg-orange-400 rounded-full animate-pulse" style="animation-delay: 0.2s;"></div>
                    <div class="w-1.5 h-1.5 bg-yellow-400 rounded-full animate-pulse" style="animation-delay: 0.4s;"></div>
                </div>
            </div>

            <!-- Info Bar in Card -->
            <div class="mt-6 text-sm text-gray-600 text-center">
                <div class="flex justify-center items-center gap-4">
                    <div class="flex items-center gap-1">
                        <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span> Aman
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></span> Cepat
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></span> Terpercaya
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>