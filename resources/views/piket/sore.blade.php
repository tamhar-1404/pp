<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Jadwal Piket</title>
    <link href="/admin/assets/images/Logo.png" rel="shortcut icon">
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('admin/assets/css/perfect-scrollbar.min.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('admin/assets/css/style.css') }}" />
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="load/load.css">
    <link defer rel="stylesheet" type="text/css" media="screen" href="{{ asset('admin/assets/css/animate.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
    <div  class="spin_load  screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
        <div class="center">
            <div class="ring">
            </div>
            <img src="load/logo.png" alt="Deskripsi gambar" class="my-img">
        </div>
    </div>


    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        <div class="">
            {{-- @include('.sidebar.layout') --}}
            <div class="animate__animated p-6" :class="[$store.app.animation]">
                <!-- start main content section -->

                <div x-data="basic" class="mt-0">
                    {{-- judul --}}


                    <div class="main">
                        <div class="panel">
                            <div class="mb-5 font-semibold">
                                <span >Lainnya / <span class="text-[#00B7FF]">Jadwal Piket Harian</span></span>
                            </div>
                            <div class="flex gap-4 mb-3 justify-between" >
                                <div class="flex gap-4 mb-3">
                                    <a href="{{route('piket.index')}}">
                                    <button class=" outline outline-[#24AEE4] px-4 py-1 mb-2 rounded-md font-semibold hover:bg-[#24AEE4] hover:text-white ">
                                        Pagi
                                    </button>
                                     </a>
                                    <a href="{{route('sore')}}">
                                    <button class=" outline outline-[#24AEE4] {{request()->routeIs('sore') ? 'bg-[#24AEE4] text-white' : ''}} px-4 py-1 mb-2 rounded-md font-semibold hover:bg-[#24AEE4] hover:text-white ">
                                        Sore
                                    </button>
                                    </a>
                                    <a href="{{route('laporan_piket.index')}}">
                                    <button class=" outline outline-[#24AEE4] px-4 py-1 mb-2 rounded-md font-semibold hover:bg-[#24AEE4] hover:text-white ">
                                        Laporan
                                    </button>
                                    </a>
                                </div>
                                <div>
                                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="outline outline-[#24AEE4] px-4 py-1 mb-2 rounded-md font-semibold hover:bg-[#24AEE4] hover:text-white">
                                        Tambah
                                    </button>
                                    <!-- Main modal -->
                                        <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="px-6 py-6 lg:px-8">
                                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Jadwal Piket</h3>
                                                        <form class="space-y-6" action="{{route('piket.store')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="flex gap-4">
                                                                <div class="flex gap-2 items-center">
                                                                    <input type="radio" name="waktu" value="pagi" class="border border-2" id=""><p>pagi</p>
                                                                </div>
                                                                <div class="flex gap-2 items-center">
                                                                    <input type="radio" name="waktu" value="sore" class="border border-2" id=""><p>sore</p>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <select name="hari" id="">
                                                                    <option value="senin">senin</option>
                                                                    <option value="selasa">selasa</option>
                                                                    <option value="rabu">rabu</option>
                                                                    <option value="kamis">kamis</option>
                                                                    <option value="jumat">jumat</option>
                                                                </select>
                                                            </div>
                                                            <div class="flex gap-3 items-center">
                                                                <input type="checkbox" name="nama_siswa[]" value="abdul" id=""><p>abdul</p>
                                                            </div>
                                                            <div class="flex gap-3 items-center">
                                                                <input type="checkbox" name="nama_siswa[]" value="santoso" id=""><p>santoso</p>
                                                            </div>
                                                            <div class="flex gap-3 items-center">
                                                                <input type="checkbox" name="nama_siswa[] " value="puniran" id=""><p>puniran</p>
                                                            </div>
                                                            <div class="flex gap-3 items-center">
                                                                <input type="checkbox" name="nama_siswa[]" value="mamat" id=""><p>mamat</p>
                                                            </div>
                                                            <button class="py-1 px-3 border font-semibold border-blue-400 bg-white text-blue-400 hover:bg-blue-400 hover:text-white" type="submit">kirim</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end modal --}}
                                </div>
                            </div>
                            @if (session('error'))
                                <div class="bg-red-500 text-white font-semibold rounded-md p-2 mb-4">
                                    <strong>Error:</strong> {{ session('error') }}
                                </div>
                            @elseif (session('sukses'))
                                <div class="bg-green-500 text-white font-semibold rounded-md p-2 mb-4">
                                    <strong>sukses:</strong> {{ session('sukses') }}
                                </div>
                            @endif
                            <div class="flex grid-cols-5 gap-4 w-lg" id="#pagi">
                                {{-- senin --}}
                                <div class=" w-full h-full bg-[#EAF1FF] rounded-md"   >
                                    {{-- button edit --}}
                                    <div class="flex justify-end" data-modal-target="authentication-modal1" data-modal-toggle="authentication-modal1" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 pt-2 pr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </div>
                                    {{-- hari --}}
                                    <div class="text-center font-bold mt-3">
                                        Senin
                                    </div>
                                    {{-- nama --}}
                                    @forelse ( $senin as $item)
                                    <div class="text-sm font-medium text-center mt-5">{{$item->nama_siswa}}</div>
                                    <!-- Main modal -->
                                    <div id="authentication-modal1" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="px-6 py-6 lg:px-8">
                                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Jadwal Piket</h3>
                                                    <form class="space-y-6" action="{{route('rubah')}}" method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <h4>Centang yang ingin di hapus</h4>
                                                        <input type="hidden" name="waktu" value="{{$item->waktu}}">
                                                        <input type="hidden" name="hari" value="{{$item->hari}}">
                                                        @foreach ( $senin as $item)
                                                        <div class="flex gap-3 items-center">
                                                            <input type="checkbox" name="nama_siswa_rubah[]" value="{{$item->id}}"  id=""><p>{{$item->nama_siswa}}</p>
                                                        </div>
                                                        @endforeach
                                                        <h4>Centang yang ingin di tambahkan</h4>
                                                        <div class="flex gap-3 items-center">
                                                            <input type="checkbox" name="nama_siswa[]" value="santoso" id=""><p>santoso</p>
                                                        </div>
                                                        <div class="flex gap-3 items-center">
                                                            <input type="checkbox" name="nama_siswa[]" value="abdul" id=""><p>abdul</p>
                                                        </div>
                                                        <div class="flex gap-3 items-center">
                                                            <input type="checkbox" name="nama_siswa[] " value="puniran" id=""><p>puniran</p>
                                                        </div>
                                                        <div class="flex gap-3 items-center">
                                                            <input type="checkbox" name="nama_siswa[]" value="mamat" id=""><p>mamat</p>
                                                        </div>
                                                        <button class="py-1 px-3 border font-semibold border-blue-400 bg-white text-blue-400 hover:bg-blue-400 hover:text-white" type="submit">kirim</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end modal --}}
                                    @empty

                                    @endforelse
                                    {{-- inspectur --}}
                                    <div class="w-full flex justify-center mb-6">

                                    </div>


                                </div>
                                {{-- selasa --}}
                                <div class=" w-full h-full bg-[#EAF1FF] rounded-md" >
                                    {{-- button edit --}}
                                    <div class="flex justify-end" data-modal-target="authentication-modal2" data-modal-toggle="authentication-modal2" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 pt-2 pr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </div>
                                    {{-- hari --}}
                                    <div class="text-center font-bold mt-3">
                                        Selasa
                                    </div>
                                {{-- nama --}}
                                @forelse ( $selasa as $item)
                                <div class="text-sm font-medium text-center mt-5">{{$item->nama_siswa}}</div>
                                    <!-- Main modal -->
                                    <div id="authentication-modal2" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="px-6 py-6 lg:px-8">
                                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Jadwal Piket</h3>
                                                <form class="space-y-6" action="{{route('rubah')}}" method="post" enctype="multipart/form-data">
                                                    @csrf

                                                    <h4>Centang yang ingin di hapus</h4>
                                                    <input type="hidden" name="waktu" value="{{$item->waktu}}">
                                                    <input type="hidden" name="hari" value="{{$item->hari}}">
                                                    @foreach ( $selasa as $item)
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa_rubah[]" value="{{$item->id}}"  id=""><p>{{$item->nama_siswa}}</p>
                                                    </div>
                                                    @endforeach
                                                    <h4>Centang yang ingin di tambahkan</h4>
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa[]" value="santoso" id=""><p>santoso</p>
                                                    </div>
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa[]" value="abdul" id=""><p>abdul</p>
                                                    </div>
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa[] " value="puniran" id=""><p>puniran</p>
                                                    </div>
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa[]" value="mamat" id=""><p>mamat</p>
                                                    </div>
                                                    <button class="py-1 px-3 border font-semibold border-blue-400 bg-white text-blue-400 hover:bg-blue-400 hover:text-white" type="submit">kirim</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}
                                @empty

                                @endforelse
                                    {{-- inspectur --}}
                                    <div class="w-full flex justify-center mb-6">

                                    </div>
                                </div>
                                {{-- rabu --}}
                                <div class=" w-full h-full bg-[#EAF1FF] rounded-md" >
                                    {{-- button edit --}}
                                    <div class="flex justify-end" data-modal-target="authentication-modal3" data-modal-toggle="authentication-modal3" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 pt-2 pr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </div>
                                    {{-- hari --}}
                                    <div class="text-center font-bold mt-3">
                                        Rabu
                                    </div>
                                    {{-- nama --}}
                                    @forelse ( $rabu as $item)
                                    <div class="text-sm font-medium text-center mt-5">{{$item->nama_siswa}}</div>
                                    <!-- Main modal -->
                                    <div id="authentication-modal3" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="px-6 py-6 lg:px-8">
                                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Jadwal Piket</h3>
                                                    <form class="space-y-6" action="{{route('rubah')}}" method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <h4>Centang yang ingin di hapus</h4>
                                                        <input type="hidden" name="waktu" value="{{$item->waktu}}">
                                                        <input type="hidden" name="hari" value="{{$item->hari}}">
                                                        @foreach ( $rabu as $item)
                                                        <div class="flex gap-3 items-center">
                                                            <input type="checkbox" name="nama_siswa_rubah[]" value="{{$item->id}}"  id=""><p>{{$item->nama_siswa}}</p>
                                                        </div>
                                                        @endforeach
                                                        <h4>Centang yang ingin di tambahkan</h4>
                                                        <div class="flex gap-3 items-center">
                                                            <input type="checkbox" name="nama_siswa[]" value="santoso" id=""><p>santoso</p>
                                                        </div>
                                                        <div class="flex gap-3 items-center">
                                                            <input type="checkbox" name="nama_siswa[]" value="abdul" id=""><p>abdul</p>
                                                        </div>
                                                        <div class="flex gap-3 items-center">
                                                            <input type="checkbox" name="nama_siswa[] " value="puniran" id=""><p>puniran</p>
                                                        </div>
                                                        <div class="flex gap-3 items-center">
                                                            <input type="checkbox" name="nama_siswa[]" value="mamat" id=""><p>mamat</p>
                                                        </div>
                                                        <button class="py-1 px-3 border font-semibold border-blue-400 bg-white text-blue-400 hover:bg-blue-400 hover:text-white" type="submit">kirim</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end modal --}}
                                    @empty

                                    @endforelse

                                    {{-- inspectur --}}
                                    <div class="w-full flex justify-center mb-6">

                                    </div>
                                </div>
                                {{-- kamis --}}
                                <div class=" w-full h-full bg-[#EAF1FF] rounded-md" >
                                    {{-- button edit --}}
                                    <div class="flex justify-end" data-modal-target="authentication-modal4" data-modal-toggle="authentication-modal4" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 pt-2 pr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </div>
                                    {{-- hari --}}
                                    <div class="text-center font-bold mt-3">
                                        Kamis
                                    </div>
                                    {{-- nama --}}
                                    @forelse ( $kamis as $item)
                                <div class="text-sm font-medium text-center mt-5">{{$item->nama_siswa}}</div>
                                    <!-- Main modal -->
                                    <div id="authentication-modal4" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="px-6 py-6 lg:px-8">
                                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Jadwal Piket</h3>
                                                <form class="space-y-6" action="{{route('rubah')}}" method="post" enctype="multipart/form-data">
                                                    @csrf

                                                    <h4>Centang yang ingin di hapus</h4>
                                                    <input type="hidden" name="waktu" value="{{$item->waktu}}">
                                                    <input type="hidden" name="hari" value="{{$item->hari}}">
                                                    @foreach ( $kamis as $item)
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa_rubah[]" value="{{$item->id}}"  id=""><p>{{$item->nama_siswa}}</p>
                                                    </div>
                                                    @endforeach
                                                    <h4>Centang yang ingin di tambahkan</h4>
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa[]" value="santoso" id=""><p>santoso</p>
                                                    </div>
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa[]" value="abdul" id=""><p>abdul</p>
                                                    </div>
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa[] " value="puniran" id=""><p>puniran</p>
                                                    </div>
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa[]" value="mamat" id=""><p>mamat</p>
                                                    </div>
                                                    <button class="py-1 px-3 border font-semibold border-blue-400 bg-white text-blue-400 hover:bg-blue-400 hover:text-white" type="submit">kirim</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}
                                @empty

                                @endforelse

                                    {{-- inspectur --}}
                                    <div class="w-full flex justify-center mb-6">

                                    </div>
                                </div>
                                {{-- jumat --}}
                                <div class=" w-full h-full bg-[#EAF1FF] rounded-md" >
                                    {{-- button edit --}}
                                    <div class="flex justify-end" data-modal-target="authentication-modal5" data-modal-toggle="authentication-modal5" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 pt-2 pr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </div>
                                    {{-- hari --}}
                                    <div class="text-center font-bold mt-3">
                                        Jumat
                                    </div>
                                    {{-- nama --}}
                                    @forelse ( $jumat as $item)
                                <div class="text-sm font-medium text-center mt-5">{{$item->nama_siswa}}</div>
                                    <!-- Main modal -->
                                    <div id="authentication-modal5" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="px-6 py-6 lg:px-8">
                                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Jadwal Piket</h3>
                                                <form class="space-y-6" action="{{route('rubah')}}" method="post" enctype="multipart/form-data">
                                                    @csrf

                                                    <h4>Centang yang ingin di hapus</h4>
                                                    <input type="hidden" name="waktu" value="{{$item->waktu}}">
                                                    <input type="hidden" name="hari" value="{{$item->hari}}">
                                                    @foreach ( $jumat as $item)
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa_rubah[]" value="{{$item->id}}"  id=""><p>{{$item->nama_siswa}}</p>
                                                    </div>
                                                    @endforeach
                                                    <h4>Centang yang ingin di tambahkan</h4>
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa[]" value="santoso" id=""><p>santoso</p>
                                                    </div>
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa[]" value="abdul" id=""><p>abdul</p>
                                                    </div>
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa[] " value="puniran" id=""><p>puniran</p>
                                                    </div>
                                                    <div class="flex gap-3 items-center">
                                                        <input type="checkbox" name="nama_siswa[]" value="mamat" id=""><p>mamat</p>
                                                    </div>
                                                    <button class="py-1 px-3 border font-semibold border-blue-400 bg-white text-blue-400 hover:bg-blue-400 hover:text-white" type="submit">kirim</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}
                                @empty

                                @endforelse
                                    {{-- inspectur --}}
                                    <div class=" w-full flex justify-center mb-6">

                                    </div>
                                </div>
                            </div>
                            <div class="flex grid-cols-5 gap-1 w-lg mt-5" id="#pagi">
                                {{-- catatan --}}
                                <div class=" w-full h-30 bg-[#EAF1FF] rounded-md" >

                                    {{-- button edit --}}
                                    <div class="flex justify-between pt-1"  >
                                        {{-- hari --}}
                                    <div class="text-left font-bold mt-0 ml-5">
                                        Catatan
                                    </div>
                                        <button data-modal-target="authentication-modalcatat" data-modal-toggle="authentication-modalcatat" class=" mr-1 text-sm py-1 px-2 border border-blue-400 bg-white font-medium text-blue-400 rounded-md">Tambah</button>
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 pt-2 pr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg> --}}
                                    </div>
                                    <!-- Main modal -->
                                    <div id="authentication-modalcatat" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modalcatat">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="px-6 py-6 lg:px-8">
                                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Catatan</h3>
                                                    <form class="space-y-6" action="{{route('piket.store')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="waktu" value="catatan">
                                                        <textarea name="hari" id="" cols="40" rows="5"></textarea>
                                                        <input type="hidden" name="nama_siswa[]" value="catatan">

                                                        <button class="py-1 px-3 border font-semibold border-blue-400 bg-white text-blue-400 hover:bg-blue-400 hover:text-white" type="submit">kirim</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end modal --}}


                                    {{-- nama --}}
                                    @forelse ($catat as $catat )
                                    <div class="text-sm font-medium text-left ml-5 mt-5 mb-3 flex items-center justify-between">
                                        {{$catat->hari}}
                                        <svg data-modal-target="authentication-modaledit" data-modal-toggle="authentication-modaledit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 pt-2 pr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                        <!-- Main modal -->
                                        <div id="authentication-modaledit" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modaleditt">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="px-6 py-6 lg:px-8">
                                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Catatan</h3>
                                                        <form class="space-y-6" action="{{route('piket.update', $catat->id)}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="waktu" value="catatan">
                                                            <textarea name="hari" id="" cols="40" rows="5">{{$catat->hari}}</textarea>
                                                            <input type="hidden" name="nama_siswa[]" value="catatan">

                                                            <button class="py-1 px-3 border font-semibold border-blue-400 bg-white text-blue-400 hover:bg-blue-400 hover:text-white" type="submit">kirim</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- end modal --}}
                                    </div>
                                    @empty

                                    @endforelse


                                </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    </div>
                </div>
                <!-- end main content section -->

                <!-- start footer section -->
                <p class="pt-6 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                    © <span id="footer-year">2022</span>. Vristo All rights reserved.
                </p>
                <!-- end footer section -->
            </div>
        </div>
    </div>
    <!--Verically centered scrollable modal-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
        <!-- Main modal -->
        <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Piket</h3>
                        <form class="space-y-6 mt-4" action="#">
                            <label class="relative inline-flex items-center mb-1 cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer ">
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">pagi</span>
                            </label>
                            <div>
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your country</label>
                                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                  <option>Senin</option>
                                  <option>Selasa</option>
                                  <option>Rabu</option>
                                  <option>Kamis</option>
                                  <option>Jumat</option>
                                </select>
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">inspektur    </label>
                                <input type="text" name="inspektur" id="password" placeholder="inspektur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            </div>
                            <div class="flex justify-around">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
                                    </div>
                                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
                                    </div>
                                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                                </div>

                            </div>
                            <div class="flex justify-around">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
                                    </div>
                                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
                                    </div>
                                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                                </div>

                            </div>


                            <!-- Modal footer -->
                            <div class="flex items-end justify-end p-1 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                                <button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script>
          $(window).on('load', function() {
              $('.spin_load').fadeOut();
          });
      </script>






</body>
</html>
