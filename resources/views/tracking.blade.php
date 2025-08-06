<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @isset($author)
    @if($author)
    <div class="mt-8 bg-white rounded shadow p-6 space-y-6">
        <h2 class="text-lg font-semibold">Halo, {{ $author->name }}</h2>
        @foreach($author->manuscripts as $m)
        <div class="border-t pt-4">
            <p><strong>Judul:</strong> {{ $m->title }}</p>
            <p><strong>Paket:</strong> {{ $m->package->name ?? '-' }}</p>
            <p><strong>Status Administrasi:</strong>
                <span class="{{ $m->status_administrasi ? 'text-green-600' : 'text-red-600' }}">
                    {{ $m->status_administrasi ? 'Sudah' : 'Belum' }}
                </span>
            </p>
            <p><strong>Layout:</strong> {{ $m->status_layout }}</p>
            <p><strong>Desain Cover:</strong> {{ $m->status_desain_cover }}</p>
            <p><strong>ISBN:</strong>
                {{ $m->isbn->isbn_number ?? '-' }}
                @if($m->isbn)
                (Keluar: {{ $m->isbn->issued_at ?? 'Belum' }})
                @endif
            </p>
            <p><strong>Produksi:</strong>
                {{ $m->production->status ?? 'Belum' }}
                (Mulai: {{ $m->production->start_date ?? '-' }})
            </p>
            <p><strong>Pengiriman:</strong>
                @if($m->shipment)
                {{ $m->shipment->courier_name }} - Resi: {{ $m->shipment->tracking_number }} ({{ $m->shipment->shipped_at }})
                @else
                Belum dikirim
                @endif
            </p>
        </div>
        @endforeach
    </div>
    @else
    <div class="mt-6 bg-red-100 text-red-600 p-4 rounded">Data tidak ditemukan.</div>
    @endif
    @endisset

</body>

</html>