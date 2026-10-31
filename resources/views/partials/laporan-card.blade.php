<div class="card">
    <h3>{{ $laporan->lokasi }}</h3>
    <p>Pelapor: {{ $laporan->nama_pelapor }}</p>
    <p>Tinggi genangan: {{ $laporan->tinggi_genangan }} cm</p>
    <p>Tanggal: {{ $laporan->tanggal_kejadian->format('d M Y') }}</p>
    <strong>Status: {{ $laporan->status }}</strong>
</div>