<div class="main-container min-h-screen text-black dark:text-white-dark mt-10" :class="[$store.app.navbar]">
    <div class="">
        {{-- @include('.sidebar.layout') --}}
        <div class="animate__animated p-6" :class="[$store.app.animation]">
            <!-- start main content section -->

            <div x-data="basic" class="mt-0">
                {{-- judul --}}


                <div class="main"id="wizardForm">
                    <div class="panel">
                        <div class="mb-5 font-semibold">
                            <span>Lainnya / <span class="text-[#00B7FF]">Jadwal Piket Harian</span></span>
                        </div>



                        @php
                            $currentDateTime = new DateTime();
                            $day = $currentDateTime->format('l');
                        @endphp
                        {{-- {{$day}} --}}
                        <div class="step active ">
                            <div class="flex gap-4 mb-3 justify-between">
                                <div class="flex gap-4 mb-3">
                                    <button class=" outline outline-[#24AEE4] px-4 py-1 mb-2 rounded-md font-semibold  "
                                        style="background-color: rgb(147 197 253); color:white;  ">
                                        Pagi
                                    </button>

                                    <button type="button" id="nextStep1"
                                        class=" outline outline-[#24AEE4] px-4 py-1 mb-2 rounded-md font-semibold  ">
                                        Sore
                                    </button>


                                    <button data-modal-target="authentication-modal"
                                        data-modal-toggle="authentication-modal"
                                        class=" outline outline-[#24AEE4] px-4 py-1 mb-2 rounded-md font-semibold  ">
                                        Laporan
                                    </button>

                                </div>

                            </div>

                            <div class="flex grid-cols-5 gap-4  w-lg " id="#pagi">
                                {{-- senin --}}
                                <div
                                    class=" w-full h-full  rounded-md {{ strtolower($day) === 'monday' ? 'bg-blue-300' : 'bg-putih' }}">

                                    {{-- hari --}}
                                    <div class="text-center font-bold mt-3">
                                        Senin
                                    </div>
                                    {{-- nama --}}
                                    @forelse ($senin as $item)
                                        <div class="text-sm font-medium text-center mt-5">{{ $item->siswa->name }}</div>

                                    @empty
                                    @endforelse
                                    {{-- inspectur --}}
                                    <div class="w-full flex justify-center mb-6">

                                    </div>


                                </div>
                                {{-- selasa --}}
                                <div
                                    class=" w-full h-full {{ strtolower($day) === 'tuesday' ? 'bg-blue-300' : 'bg-putih' }} rounded-md">

                                    {{-- hari --}}
                                    <div class="text-center font-bold mt-3">
                                        Selasa
                                    </div>
                                    {{-- nama --}}
                                    @forelse ($selasa as $item)
                                        <div class="text-sm font-medium text-center mt-5">{{ $item->siswa->name }}</div>

                                    @empty
                                    @endforelse
                                    {{-- inspectur --}}
                                    <div class="w-full flex justify-center mb-6">

                                    </div>
                                </div>
                                {{-- rabu --}}
                                <div
                                    class=" w-full h-full {{ strtolower($day) === 'wednesday' ? 'bg-blue-300' : 'bg-putih' }} rounded-md">

                                    {{-- hari --}}
                                    <div class="text-center font-bold mt-3">
                                        Rabu
                                    </div>
                                    {{-- nama --}}
                                    @forelse ($rabu as $item)
                                        <div class="text-sm font-medium text-center mt-5">{{ $item->siswa->name }}</div>

                                    @empty
                                    @endforelse

                                    {{-- inspectur --}}
                                    <div class="w-full flex justify-center mb-6">

                                    </div>
                                </div>
                                {{-- kamis --}}
                                <div
                                    class=" w-full h-full {{ strtolower($day) === 'thursday' ? 'bg-blue-300' : 'bg-putih' }} rounded-md ">

                                    {{-- hari --}}
                                    <div class="text-center font-bold mt-3">
                                        Kamis
                                    </div>
                                    {{-- nama --}}
                                    @forelse ($kamis as $item)
                                        <div class="text-sm font-medium text-center mt-5">{{ $item->siswa->name }}</div>

                                    @empty
                                    @endforelse

                                    {{-- inspectur --}}
                                    <div class="w-full flex justify-center mb-6">

                                    </div>
                                </div>
                                {{-- jumat --}}
                                <div
                                    class=" w-full h-full {{ strtolower($day) === 'friday' ? 'bg-blue-300' : 'bg-putih' }} rounded-md">

                                    <div class="text-center font-bold mt-3">
                                        Jumat
                                    </div>
                                    {{-- nama --}}
                                    @forelse ($jumat as $item)
                                        <div class="text-sm font-medium text-center mt-5">{{ $item->siswa->name }}</div>

                                    @empty
                                    @endforelse
                                    {{-- inspectur --}}
                                    <div class=" w-full flex justify-center mb-6">

                                    </div>
                                </div>
                            </div>
                            <div class="flex grid-cols-5  gap-1 w-lg mt-5" id="#pagi">
                                {{-- catatan --}}
                                <div class=" w-full h-30 bg-putih rounded-md px-4 py-2">

                                    {{-- button edit --}}
                                    <div class="flex justify-between pt-1">
                                        {{-- hari --}}
                                        <div class="text-left font-bold mt-0 ml-5">
                                            Catatan
                                        </div>

                                    </div>



                                    {{-- nama --}}
                                    @foreach ($catat as $data)
                                    <div
                                        class="text-sm font-medium text-left ml-5 mt-5 mb-3 flex items-center justify-between">
                                        {{ $data->hari }}

                                    </div>
                                @endforeach


                                </div>
                            </div>
                        </div>
                        <div class="step">
                            <div class="flex gap-4 mb-3 justify-between">
                                <div class="flex gap-4 mb-3">
                                    <button type="button" id="prevStep2"
                                        class=" outline outline-[#24AEE4] px-4 py-1 mb-2 rounded-md font-semibold">
                                        Pagi
                                    </button>

                                    <button type="button"
                                        class=" outline outline-[#24AEE4] px-4 py-1 mb-2 rounded-md font-semibold  "
                                        style="background-color: rgb(147 197 253); color:white">
                                        Sore
                                    </button>


                                    <button data-modal-target="authentication-modal"
                                        data-modal-toggle="authentication-modal"
                                        class=" outline outline-[#24AEE4] px-4 py-1 mb-2 rounded-md font-semibold  ">
                                        Laporan
                                    </button>
                                </div>

                            </div>

                            <div class="flex grid-cols-5 gap-4  w-lg ">
                                {{-- senin --}}
                                <div
                                    class=" w-full h-full  rounded-md {{ strtolower($day) === 'monday' ? 'bg-blue-300' : 'bg-putih' }}">

                                    {{-- hari --}}
                                    <div class="text-center font-bold mt-3">
                                        Senin
                                    </div>
                                    {{-- nama --}}
                                    @forelse ( $senin_sore as $item)

                                        <div class="text-sm font-medium text-center mt-5">{{ $item->siswa->name }}
                                        </div>
                                        <!-- Main modal -->
                                        <div id="authentication-modal1" tabindex="-1" aria-hidden="true"
                                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        data-modal-hide="authentication-modal">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="px-6 py-6 lg:px-8">
                                                        <h3
                                                            class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                            Tambah Jadwal Piket</h3>
                                                        <form class="space-y-6" action="{{ route('rubah') }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf

                                                            <h4>Centang yang ingin di hapus</h4>
                                                            <input type="hidden" name="waktu"
                                                                value="{{ $item->waktu }}">
                                                            <input type="hidden" name="hari"
                                                                value="{{ $item->hari }}">
                                                            @foreach ($senin as $item)
                                                                <div class="flex gap-3 items-center">
                                                                    <input type="checkbox" name="nama_siswa_rubah[]"
                                                                        value="{{ $item->id }}" id="">
                                                                    <p>{{ $item->siswa->name }}</p>
                                                                </div>
                                                            @endforeach
                                                            <h4>Centang yang ingin di tambahkan</h4>
                                                            <div class="flex gap-3 items-center">
                                                                <input type="checkbox" name="nama_siswa[]"
                                                                    value="santoso" id="">
                                                                <p>santoso</p>
                                                            </div>
                                                            <div class="flex gap-3 items-center">
                                                                <input type="checkbox" name="nama_siswa[]"
                                                                    value="abdul" id="">
                                                                <p>abdul</p>
                                                            </div>
                                                            <div class="flex gap-3 items-center">
                                                                <input type="checkbox" name="nama_siswa[] "
                                                                    value="puniran" id="">
                                                                <p>puniran</p>
                                                            </div>
                                                            <div class="flex gap-3 items-center">
                                                                <input type="checkbox" name="nama_siswa[]"
                                                                    value="mamat" id="">
                                                                <p>mamat</p>
                                                            </div>
                                                            <button
                                                                class="py-1 px-3 border font-semibold border-blue-400 bg-white text-blue-400 hover:bg-blue-400 hover:text-white"
                                                                type="submit">kirim</button>
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
                                <div
                                    class=" w-full h-full {{ strtolower($day) === 'tuesday' ? 'bg-blue-300' : 'bg-putih' }} rounded-md">

                                    {{-- hari --}}
                                    <div class="text-center font-bold mt-3">
                                        Selasa
                                    </div>
                                    {{-- nama --}}
                                    @forelse ($selasa_sore as $item)
                                        <div class="text-sm font-medium text-center mt-5">{{ $item->siswa->name }}
                                        </div>

                                    @empty
                                    @endforelse
                                    {{-- inspectur --}}
                                    <div class="w-full flex justify-center mb-6">

                                    </div>
                                </div>
                                {{-- rabu --}}
                                <div
                                    class=" w-full h-full {{ strtolower($day) === 'wednesday' ? 'bg-blue-300' : 'bg-putih' }} rounded-md">

                                    {{-- hari --}}
                                    <div class="text-center font-bold mt-3">
                                        Rabu
                                    </div>
                                    {{-- nama --}}
                                    @forelse ( $rabu_sore as $item)
                                        <div class="text-sm font-medium text-center mt-5">{{ $item->siswa->name }}
                                        </div>
                                        <!-- Main modal -->
                                        <div id="authentication-modal3" tabindex="-1" aria-hidden="true"
                                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        data-modal-hide="authentication-modal">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="px-6 py-6 lg:px-8">
                                                        <h3
                                                            class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                            Tambah Jadwal Piket</h3>
                                                        <form class="space-y-6" action="{{ route('rubah') }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf

                                                            <h4>Centang yang ingin di hapus</h4>
                                                            <input type="hidden" name="waktu"
                                                                value="{{ $item->waktu }}">
                                                            <input type="hidden" name="hari"
                                                                value="{{ $item->hari }}">
                                                            @foreach ($rabu as $item)
                                                                <div class="flex gap-3 items-center">
                                                                    <input type="checkbox" name="nama_siswa_rubah[]"
                                                                        value="{{ $item->id }}" id="">
                                                                    <p>{{ $item->siswa->name }}</p>
                                                                </div>
                                                            @endforeach
                                                            <h4>Centang yang ingin di tambahkan</h4>
                                                            <div class="flex gap-3 items-center">
                                                                <input type="checkbox" name="nama_siswa[]"
                                                                    value="santoso" id="">
                                                                <p>santoso</p>
                                                            </div>
                                                            <div class="flex gap-3 items-center">
                                                                <input type="checkbox" name="nama_siswa[]"
                                                                    value="abdul" id="">
                                                                <p>abdul</p>
                                                            </div>
                                                            <div class="flex gap-3 items-center">
                                                                <input type="checkbox" name="nama_siswa[] "
                                                                    value="puniran" id="">
                                                                <p>puniran</p>
                                                            </div>
                                                            <div class="flex gap-3 items-center">
                                                                <input type="checkbox" name="nama_siswa[]"
                                                                    value="mamat" id="">
                                                                <p>mamat</p>
                                                            </div>
                                                            <button
                                                                class="py-1 px-3 border font-semibold border-blue-400 bg-white text-blue-400 hover:bg-blue-400 hover:text-white"
                                                                type="submit">kirim</button>
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
                                <div
                                    class=" w-full h-full {{ strtolower($day) === 'thursday' ? 'bg-blue-300' : 'bg-putih' }} rounded-md ">

                                    {{-- hari --}}
                                    <div class="text-center font-bold mt-3">
                                        Kamis
                                    </div>
                                    {{-- nama --}}
                                    @forelse ($kamis_sore as $item)
                                        <div class="text-sm font-medium text-center mt-5">{{ $item->siswa->name }}
                                        </div>

                                    @empty
                                    @endforelse

                                    {{-- inspectur --}}
                                    <div class="w-full flex justify-center mb-6">

                                    </div>
                                </div>
                                {{-- jumat --}}
                                <div
                                    class=" w-full h-full {{ strtolower($day) === 'friday' ? 'bg-blue-300' : 'bg-putih' }} rounded-md">

                                    {{-- hari --}}
                                    <div class="text-center font-bold mt-3">
                                        Jumat
                                    </div>
                                    {{-- nama --}}
                                    @forelse ($jumat_sore as $item)
                                        <div class="text-sm font-medium text-center mt-5">{{ $item->siswa->name }}
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
                        <div class="flex grid-cols-5 gap-1 w-lg mt-5">
                            {{-- catatan --}}
                            <div class=" w-full h-30 bg-putih rounded-md px-4 py-2">

                                {{-- button edit --}}
                                <div class="flex justify-between pt-1">
                                    {{-- hari --}}
                                    <div class="text-left font-bold mt-0 ml-5">
                                        Catatan
                                    </div>

                                </div>



                                {{-- nama --}}
                                @forelse ($catat as $catat)
                                    <div
                                        class="text-sm font-medium text-left ml-5 mt-5 mb-3 flex items-center justify-between ">
                                        {{ $catat->hari }}

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
</div>
<!-- end main content section -->

<!-- start footer section -->

<!-- end footer section -->
<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Laporan piket Hari ini</h3>
                <form class="space-y-6 mt-4" action="{{ route('laporan_piket.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                        Waktu</label>
                    <div class="flex gap-4">
                        <div class="flex gap-2 items-center">
                            <input type="radio" name="waktu" value="pagi" class="border border-2"
                                id="" required>
                            <p>pagi</p>
                        </div>
                        <div class="flex gap-2 items-center">
                            <input type="radio" name="waktu" value="sore" class="border border-2"
                                id="" required>
                            <p>sore</p>
                        </div>
                    </div>
                    {{-- <div>
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih hari</label>
                                <select name="hari" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                  <option value="senin">Senin</option>
                                  <option value="selasa">Selasa</option>
                                  <option value="rabu">Rabu</option>
                                  <option value="kamis">Kamis</option>
                                  <option value="jumat">Jumat</option>
                                </select>
                            </div> --}}
                    <div>
                        <label for="desripsi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi </label>
                        <textarea name="deskripsi" id="" cols="" rows="5" class=" rounded-lg w-full" required></textarea>
                    </div>
                    <div>
                        <label for="file"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bukti </label>
                        <input type="file" name="bukti"
                            class=" rounded-lg outline outline-offset-0 outline-gray-400 w-full" required>
                    </div>



                    <!-- Modal footer -->
                    <div
                        class="flex items-end justify-end p-1 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="authentication-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                        <button data-modal-hide="defaultModal" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
