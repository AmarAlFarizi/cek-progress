<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cek Status Naskah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="max-w-xl w-full bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-center">Cek Status Penerbitan Naskah</h1>

        {{-- Tampilkan error jika data tidak ditemukan --}}
        @if ($errors->has('not_found'))
        <div class="mb-4 text-red-600 text-sm bg-red-100 p-3 rounded">
            {{ $errors->first('not_found') }}
        </div>
        @endif

        {{-- Tampilkan error validasi --}}
        @if ($errors->any() && !$errors->has('not_found'))
        <div class="mb-4 text-red-600 text-sm bg-red-100 p-3 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('tracking.track') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <input type="text" name="kode_penerbit" placeholder="Kode Penerbit" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-amber-400">
            </div>

            <div>
                <input type="text" name="nomor_hp" placeholder="Nomor HP" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-amber-400">
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-amber-500 hover:bg-amber-600 text-white font-semibold py-2 px-4 rounded">
                    Cek Status
                </button>
            </div>
        </form>
    </div>

</body>

</html>