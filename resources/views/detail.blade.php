<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelacakan Status Naskah</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 min-h-screen py-8 px-4">

    @isset($author)
    @if($author)

    <!-- Header Section -->
    <div class="max-w-6xl mx-auto mb-8">
        <div class="glass-card rounded-2xl shadow-xl p-8 fade-in-up">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center shadow-lg bounce-gentle">
                        <span class="text-2xl text-white">📚</span>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-slate-800 to-slate-600 bg-clip-text text-transparent">
                            Halo, {{ $author->name }}
                        </h1>
                        <p class="text-slate-600 mt-1">Berikut adalah status terkini naskah Anda</p>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600">{{ count($author->manuscripts) }}</div>
                        <div class="text-xs text-slate-500">Total Naskah</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Manuscripts Grid -->
    <div class="max-w-6xl mx-auto space-y-6">
        @foreach($author->manuscripts as $index => $m)
        <div class="glass-card rounded-2xl shadow-xl overflow-hidden slide-in-right" tyle="animation-delay: @{{ $index * 0.1 }}s;">

            <!-- Manuscript Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 text-white">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h2 class="text-xl font-bold mb-2">{{ $m->title }}</h2>
                        <div class="flex items-center space-x-4 text-blue-100">
                            <span class="flex items-center space-x-1">
                                <span>📦</span>
                                <span class="text-md">{{ $m->package->name ?? 'Paket Standar' }}</span>
                            </span>
                        </div>
                    </div>
                    <div class="ml-4">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <span class="text-xl">📖</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progress Tracking -->
            <div class="p-6">

                <!-- Status Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

                    <!-- Administrasi Status -->
                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-xl p-4 border border-emerald-200">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-semibold text-slate-700">Administrasi</h3>
                            <span class="text-xl">📋</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            @if($m->status_administrasi)
                            <div class="w-3 h-3 bg-green-500 rounded-full pulse-glow"></div>
                            <span class="status-badge bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                Lunas
                            </span>
                            @else
                            <div class="w-3 h-3 bg-orange-400 rounded-full animate-pulse"></div>
                            <span class="status-badge bg-orange-400 text-white px-3 py-1 rounded-full text-sm font-medium">
                                belum lunas
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- Layout Status -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-200">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-semibold text-slate-700">Layout</h3>
                            <span class="text-xl">🎨</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            @if($m->status_layout == 'Selesai')
                            <div class="w-3 h-3 bg-green-500 rounded-full pulse-glow"></div>
                            <span class="status-badge bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                {{ $m->status_layout }}
                            </span>
                            @elseif($m->status_layout == 'Proses')
                            <div class="w-3 h-3 bg-blue-500 rounded-full animate-pulse"></div>
                            <span class="status-badge bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                {{ $m->status_layout }}
                            </span>
                            @else
                            <div class="w-3 h-3 bg-gray-400 rounded-full"></div>
                            <span class="status-badge bg-gray-400 text-white px-3 py-1 rounded-full text-sm font-medium">
                                {{ $m->status_layout ?: 'Menunggu' }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- Cover Design Status -->
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-4 border border-purple-200">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-semibold text-slate-700">Desain Cover</h3>
                            <span class="text-xl">🎭</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            @if($m->status_desain_cover == 'Selesai')
                            <div class="w-3 h-3 bg-green-500 rounded-full pulse-glow"></div>
                            <span class="status-badge bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                {{ $m->status_desain_cover }}
                            </span>
                            @elseif($m->status_desain_cover == 'Proses')
                            <div class="w-3 h-3 bg-purple-500 rounded-full animate-pulse"></div>
                            <span class="status-badge bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                {{ $m->status_desain_cover }}
                            </span>
                            @else
                            <div class="w-3 h-3 bg-gray-400 rounded-full"></div>
                            <span class="status-badge bg-gray-400 text-white px-3 py-1 rounded-full text-sm font-medium">
                                {{ $m->status_desain_cover ?: 'Menunggu' }}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Detailed Information Cards -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    <!-- ISBN & Production -->
                    <div class="space-y-4">
                        <!-- ISBN Card -->
                        <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-xl p-5 border border-amber-200">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="w-10 h-10 bg-amber-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white font-bold">📄</span>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-slate-700">ISBN</h3>
                                    <p class="text-sm text-slate-500">International Standard Book Number</p>
                                </div>
                            </div>
                            <div class="bg-white rounded-lg p-3 border">
                                @if($m->isbn)
                                <div class="flex justify-between items-center">
                                    <span class="font-mono text-sm bg-gray-100 px-2 py-1 rounded">
                                        {{ $m->isbn->isbn_number }}
                                    </span>
                                    <span class="text-xs text-green-600">
                                        Keluar: {{ $m->isbn->issued_at ?? 'Belum tersedia' }}
                                    </span>
                                </div>
                                @else
                                <span class="text-gray-500 text-sm">Belum tersedia</span>
                                @endif
                            </div>

                        </div>

                        <!-- Production Card -->
                        <div class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-xl p-5 border border-teal-200">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="w-10 h-10 bg-teal-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white font-bold">⚙️</span>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-slate-700">Produksi</h3>
                                    <p class="text-sm text-slate-500">Status percetakan dan penyelesaian</p>
                                </div>
                            </div>
                            <div class="bg-white rounded-lg p-3 border">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="font-medium text-slate-700">Status:</span>
                                    <span class="status-badge bg-teal-500 text-white px-2 py-1 rounded text-sm">
                                        {{ $m->production->status ?? 'Belum dimulai' }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-slate-500 ">Mulai:</span>
                                    <span class="text-sm">{{ $m->production->start_date ?? 'Belum dijadwalkan' }}</span>
                                </div>
                                <div class="mt-4 pt-3 border-t">
                                    <a href="{{ $m->file_cover }}" rel="noopener noreferrer"
                                        class="block w-full text-center bg-gradient-to-r bg-teal-500 to-teal-800 text-white py-2 px-4 rounded-lg font-medium hover:from-teal-600 hover:to-teal-800 transition-all duration-300 transform hover:scale-105">
                                        Lihat Detail Buku 📑
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Shipping Information -->
                    <div class="bg-gradient-to-br from-rose-50 to-pink-50 rounded-xl p-5 border border-rose-200">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-10 h-10 bg-rose-500 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold">🚚</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-700">Pengiriman</h3>
                                <p class="text-sm text-slate-500">Informasi kurir dan tracking</p>
                            </div>
                        </div>

                        @if($m->shipment)
                        <div class="bg-white rounded-lg p-4 border space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="font-medium text-slate-700">Kurir:</span>
                                <span class="status-badge bg-rose-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                    {{ $m->shipment->courier_name }}
                                </span>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="flex justify-between items-center mb-1">
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm text-slate-500">Nomor Resi:</span>
                                        <button
                                            type="button"
                                            onclick="copyResi('{{ $m->shipment->tracking_number }}', 'notif-{{ $m->id }}')"
                                            class="text-xs text-blue-600 hover:text-blue-800 px-2 py-1 border border-blue-200 rounded-md transition">
                                            Salin
                                        </button>
                                        <span id="notif-{{ $m->id }}" class="text-green-600 text-xs hidden">✔ No Resi Tersalin!</span>
                                    </div>
                                </div>
                                <div class="font-mono text-lg font-bold text-rose-600">
                                    {{ $m->shipment->tracking_number }}
                                </div>
                            </div>

                            <!-- <div class="bg-gray-50 rounded-lg p-3">
                                <div class="flex items-center justify-between mb-1">
                                    <span class="text-sm text-slate-500">Nomor Resi:</span>
                                </div>
                                <div class="font-mono text-lg font-bold text-rose-600">
                                    {{ $m->shipment->tracking_number }}
                                </div>
                            </div> -->

                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-500">Tanggal Kirim:</span>
                                <span class="text-sm font-medium">{{ $m->shipment->shipped_at }}</span>
                            </div>

                            <div class="mt-4 pt-3 border-t">
                                <a href="https://berdu.id/cek-resi" target="_blank" rel="noopener noreferrer"
                                    class="block w-full text-center bg-gradient-to-r from-rose-500 to-pink-500 text-white py-2 px-4 rounded-lg font-medium hover:from-rose-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105">
                                    Lacak Paket 📦
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="bg-white rounded-lg p-4 border text-center">
                            <div class="text-gray-400 mb-2">
                                <span class="text-3xl">📦</span>
                            </div>
                            <span class="text-gray-500 text-sm">Belum dikirim</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @else
    <!-- Error State -->
    <div class="max-w-2xl mx-auto">
        <div class="bg-gradient-to-br from-red-50 to-rose-50 rounded-2xl p-8 text-center shadow-xl border border-red-200 fade-in-up">
            <div class="w-20 h-20 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-4 bounce-gentle">
                <span class="text-3xl text-white">❌</span>
            </div>
            <h2 class="text-2xl font-bold text-red-800 mb-2">Data Tidak Ditemukan</h2>
            <p class="text-red-600 mb-4">Maaf, kami tidak dapat menemukan data yang Anda cari.</p>
            <button class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-lg font-medium transition-all duration-300 transform hover:scale-105">
                Coba Lagi
            </button>
        </div>
    </div>
    @endif
    @endisset
    <script>
        function copyResi(text, id) {
            navigator.clipboard.writeText(text).then(() => {
                const notif = document.getElementById(id);
                notif.classList.remove('hidden');
                setTimeout(() => notif.classList.add('hidden'), 1500);
            });
        }
    </script>

</body>

</html>