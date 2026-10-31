@extends('layouts.app')

@section('content')
<h2>Profil Petugas</h2>

<div class="card">
    <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    <p><strong>Akun dibuat:</strong>
        {{ Auth::user()->created_at->format('d M Y H:i') }}
        ({{ Auth::user()->created_at->diffForHumans() }})
    </p>
</div>
@endsection