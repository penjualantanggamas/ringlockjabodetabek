@extends('admin.layouts.dashboard')

@section('title', 'Dashboard Overview')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
  
  <div>
    <h1 class="text-2xl font-black text-brand-dark tracking-tight">Ringkasan Sistem</h1>
    <p class="text-sm text-gray-500 font-medium">Informasi dan status pengelolaan website Ringlock Indonesia.</p>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
    
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 flex items-center gap-5">
      <div class="w-12 h-12 bg-blue-50 text-brand-dark rounded-xl flex items-center justify-center shrink-0">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
      </div>
      <div>
        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Artikel</p>
        <p class="text-2xl font-extrabold text-brand-dark mt-0.5">
          {{ $articles->count() }} 
          <span class="text-xs text-gray-400 font-normal">terbit</span>
        </p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 flex items-center gap-5 sm:col-span-2 lg:col-span-1">
      <div class="w-12 h-12 bg-green-50 text-green-700 rounded-xl flex items-center justify-center shrink-0">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
      </div>
      <div>
        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Akses Publik</p>
        <a href="{{ url('/artikel') }}" target="_blank" class="inline-flex items-center gap-1.5 text-sm font-bold text-green-700 hover:underline mt-1">
          Lihat Halaman Artikel
        </a>
      </div>
    </div>

  </div>

</div>
@endsection