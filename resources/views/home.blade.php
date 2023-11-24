{{-- Halaman Home --}}
@extends('layouts.main')
@section('container')
{{-- alert notification --}}
@include('partials.alert')
<div class="bg-neutral-50 dark: bg-dark flex min-h-screen w-full justify-center duration-300 gap-5">
    {{-- bagian header top table --}}
    <div class="flex flex-col w-10 max-h-[35rem] mt-24 rounded-md z-10 duration-300">
        <label class="relative block w-10 overflow-hidden">
            <button data-target="addModal" class="open-modal-add w-full h-10 bg-blue-500 text-white rounded-md">
                <i class="ri-add-fill text-2xl"></i>
            </button>
        </label>
    </div>
    <div class="relative w-10/12 max-h-[35rem] shadow-md overflow-y-scroll mt-24 rounded-md">
        {{-- bagian table --}}
        @include('partials.main-table')
    </div>
</div>
{{-- pagination button --}}
<div class="flex items-center justify-center dark: bg-dark duration-300">
    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px my-5" aria-label="Pagination">
        <!-- Tombol Sebelumnya -->
        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md bg-white text-sm font-medium text-gray-500 hover:bg-blue-300 dark: fg-dark" aria-label="Previous">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M9.707 3.293a1 1 0 0 1 1.414 1.414L6.414 10l4.707 4.293a1 1 0 1 1-1.414 1.414l-5-5a1 1 0 0 1 0-1.414l5-5a1 1 0 0 1 0 1.414z" clip-rule="evenodd" />
            </svg>
        </a>
        <!-- Nomor Halaman -->
        <a href="#" class="z-10 bg-indigo-500 text-white relative inline-flex items-center px-4 py-2 text-sm font-medium hover:bg-indigo-600">1</a>
        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-blue-300 dark: fg-dark relative inline-flex items-center px-4 py-2 text-sm font-medium">2</a>
        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-blue-300 dark: fg-dark relative inline-flex items-center px-4 py-2 text-sm font-medium">3</a>
        <!-- Tombol Selanjutnya -->
        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md bg-white text-sm font-medium text-gray-500 hover:bg-blue-300 dark: fg-dark" aria-label="Next">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10.293 16.707a1 1 0 0 1-1.414-1.414L13.586 10 8.293 5.707a1 1 0 1 1 1.414-1.414l5 5a1 1 0 0 1 0 1.414l-5 5a1 1 0 0 1-1.414 0z" clip-rule="evenodd" />
            </svg>
        </a>
    </nav>
</div>
{{-- Floating Modal --}}
<div id="floatingModal">
</div>
@endsection
