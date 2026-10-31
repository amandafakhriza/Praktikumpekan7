@extends('layouts.app')

@section('content')
<x-alert type="success">
    Terima kasih, {{ $laporan->nama_pelapor }}! Laporan banjir di
    {{ $laporan->lokasi }} (tinggi genangan {{ $laporan->tinggi_genangan }} cm)
    pada {{ $laporan->tanggal_kejadian->format('d M Y') }} berhasil disimpan.
</x-alert>

<a href="{{ route('laporan.index') }}">Lihat Daftar Laporan</a>
@endsection