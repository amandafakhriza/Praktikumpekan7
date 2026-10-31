<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-sky-700">✏️ Edit Laporan Banjir</h2>
    </x-slot>

    @php
        $input = 'mt-1 block w-full rounded-xl border-pink-200 focus:border-sky-500 focus:ring-sky-500';
    @endphp

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-3xl overflow-hidden">
                <div class="bg-gradient-to-r from-pink-500 to-sky-500 px-6 py-4 text-white">
                    <h3 class="font-bold text-lg">Ubah Data & Status Penanganan</h3>
                </div>

                <form action="{{ route('laporans.update', $laporan) }}" method="POST" enctype="multipart/form-data"
                      class="p-6 space-y-5">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label for="nama_pelapor" class="block text-sm font-semibold text-sky-800">Nama Pelapor</label>
                            <input id="nama_pelapor" name="nama_pelapor" type="text"
                                   value="{{ old('nama_pelapor', $laporan->nama_pelapor) }}" class="{{ $input }}">
                            @error('nama_pelapor') <p class="mt-1 text-sm text-pink-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="no_hp" class="block text-sm font-semibold text-sky-800">No. HP</label>
                            <input id="no_hp" name="no_hp" type="text"
                                   value="{{ old('no_hp', $laporan->no_hp) }}" class="{{ $input }}">
                            @error('no_hp') <p class="mt-1 text-sm text-pink-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="lokasi" class="block text-sm font-semibold text-sky-800">Lokasi Banjir</label>
                        <input id="lokasi" name="lokasi" type="text"
                               value="{{ old('lokasi', $laporan->lokasi) }}" class="{{ $input }}">
                        @error('lokasi') <p class="mt-1 text-sm text-pink-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label for="kecamatan" class="block text-sm font-semibold text-sky-800">Kecamatan</label>
                            <input id="kecamatan" name="kecamatan" type="text"
                                   value="{{ old('kecamatan', $laporan->kecamatan) }}" class="{{ $input }}">
                            @error('kecamatan') <p class="mt-1 text-sm text-pink-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="tinggi_air" class="block text-sm font-semibold text-sky-800">Tinggi Air (cm)</label>
                            <input id="tinggi_air" name="tinggi_air" type="number"
                                   value="{{ old('tinggi_air', $laporan->tinggi_air) }}" class="{{ $input }}">
                            @error('tinggi_air') <p class="mt-1 text-sm text-pink-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="keterangan" class="block text-sm font-semibold text-sky-800">Keterangan (opsional)</label>
                        <textarea id="keterangan" name="keterangan" rows="3" class="{{ $input }}">{{ old('keterangan', $laporan->keterangan) }}</textarea>
                        @error('keterangan') <p class="mt-1 text-sm text-pink-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-sky-800">Status Penanganan</label>
                        <select id="status" name="status" class="{{ $input }}">
                            @foreach (['Menunggu', 'Diproses', 'Selesai'] as $s)
                                <option value="{{ $s }}" @selected(old('status', $laporan->status) === $s)>{{ $s }}</option>
                            @endforeach
                        </select>
                        @error('status') <p class="mt-1 text-sm text-pink-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-sky-800">Foto saat ini</p>
                        <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto banjir"
                             class="mt-2 max-w-xs rounded-2xl border-2 border-pink-200">
                        <label for="foto" class="block mt-4 text-sm font-semibold text-sky-800">
                            Ganti Foto (kosongkan jika tidak ingin mengganti)
                        </label>
                        <input id="foto" name="foto" type="file"
                               class="mt-1 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-pink-100 file:text-pink-700 hover:file:bg-pink-200">
                        @error('foto') <p class="mt-1 text-sm text-pink-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-4 pt-2">
                        <button type="submit"
                                class="px-6 py-2.5 rounded-full bg-gradient-to-r from-pink-500 to-sky-500 text-white font-semibold shadow hover:opacity-90">
                            Update
                        </button>
                        <a href="{{ route('laporans.index') }}" class="text-sm text-gray-600 underline">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>