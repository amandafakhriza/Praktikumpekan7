<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-sky-700">📄 Detail Laporan Banjir</h2>
    </x-slot>

    @php
        $badge = match ($laporan->status) {
            'Diproses' => 'bg-violet-100 text-violet-700',
            'Selesai'  => 'bg-blue-100 text-blue-700',
            default    => 'bg-pink-100 text-pink-700',
        };
    @endphp

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-3xl overflow-hidden">
                <div class="bg-gradient-to-r from-pink-500 to-sky-500 px-6 py-4 flex items-center justify-between text-white">
                    <h3 class="font-bold text-lg">{{ $laporan->lokasi }}</h3>
                    <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $badge }}">{{ $laporan->status }}</span>
                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto banjir"
                         class="w-full rounded-2xl border-2 border-pink-200 object-cover">

                    <dl class="space-y-3 text-sm">
                        <div>
                            <dt class="font-semibold text-pink-600">Nama Pelapor</dt>
                            <dd class="text-gray-800">{{ $laporan->nama_pelapor }}</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-pink-600">No. HP</dt>
                            <dd class="text-gray-800">{{ $laporan->no_hp }}</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-pink-600">Kecamatan</dt>
                            <dd class="text-gray-800">{{ $laporan->kecamatan }}</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-pink-600">Tinggi Air</dt>
                            <dd class="text-gray-800">{{ $laporan->tinggi_air }} cm</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-pink-600">Keterangan</dt>
                            <dd class="text-gray-800">{{ $laporan->keterangan ?? '-' }}</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-pink-600">Tanggal Lapor</dt>
                            <dd class="text-gray-800">{{ $laporan->created_at->format('d-m-Y H:i') }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="px-6 pb-6 flex items-center gap-3">
                    <a href="{{ route('laporans.edit', $laporan) }}"
                       class="px-5 py-2 rounded-full bg-gradient-to-r from-pink-500 to-sky-500 text-white font-semibold shadow hover:opacity-90">Edit</a>
                    <a href="{{ route('laporans.index') }}" class="text-sm text-gray-600 underline">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>