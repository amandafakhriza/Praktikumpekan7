<x-guest-layout>
    <div class="mb-4">
        <h2 class="text-lg font-semibold text-gray-800">Form Laporan Banjir</h2>
        <p class="text-sm text-gray-600">Laporkan kondisi banjir di sekitar Anda kepada BPBD Kabupaten Bandung.</p>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-700">{{ session('success') }}</div>
    @endif

    {{-- enctype wajib ada agar foto ikut terkirim --}}
    <form action="{{ route('laporans.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <x-input-label for="nama_pelapor" value="Nama Pelapor" />
            <x-text-input id="nama_pelapor" name="nama_pelapor" type="text" class="mt-1 block w-full"
                          :value="old('nama_pelapor')" autofocus />
            <x-input-error :messages="$errors->get('nama_pelapor')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="no_hp" value="No. HP" />
            <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full"
                          :value="old('no_hp')" />
            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="lokasi" value="Lokasi Banjir" />
            <x-text-input id="lokasi" name="lokasi" type="text" class="mt-1 block w-full"
                          :value="old('lokasi')" />
            <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="kecamatan" value="Kecamatan" />
            <x-text-input id="kecamatan" name="kecamatan" type="text" class="mt-1 block w-full"
                          :value="old('kecamatan')" />
            <x-input-error :messages="$errors->get('kecamatan')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="tinggi_air" value="Tinggi Air (cm)" />
            <x-text-input id="tinggi_air" name="tinggi_air" type="number" class="mt-1 block w-full"
                          :value="old('tinggi_air')" />
            <x-input-error :messages="$errors->get('tinggi_air')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="keterangan" value="Keterangan (opsional)" />
            <textarea id="keterangan" name="keterangan" rows="3"
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('keterangan') }}</textarea>
            <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="foto" value="Foto Bukti (jpg, jpeg, png - maks. 2 MB)" />
            <input id="foto" name="foto" type="file" class="mt-1 block w-full">
            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
        </div>

        <x-primary-button>Kirim Laporan</x-primary-button>
        <a href="{{ route('login') }}" class="ms-3 text-sm text-gray-600 underline">Login Petugas</a>
        <a href="{{ route('register') }}" class="ms-3 text-sm text-gray-600 underline">Registrasi Petugas</a>   
    </form>
</x-guest-layout>