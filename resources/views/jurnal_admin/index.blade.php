<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Jurnal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        theme: {
            extend: {
                blur: {
                    xs: '3px',
                }
            },
        },
    </script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link href="/admin/assets/images/Logo.png" rel="shortcut icon">
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen"
        href="{{ asset('admin/assets/css/perfect-scrollbar.min.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('admin/assets/css/style.css') }}" />
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="load/load.css">
    {{--  <link defer rel="stylesheet" type="text/css" media="screen" href="{{ asset('admin/assets/css/animate.css') }}" />  --}}
    <script src="{{ asset('admin/assets/js/perfect-scrollbar.min.js') }}"></script>
    <script defer src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
    <script defer src="{{ asset('admin/assets/js/tippy-bundle.umd.min.js') }}"></script>
    <script defer src="{{ asset('admin/assets/js/sweetalert.min.js') }}"></script>
    {{--  <!-- Javascript Assets -->  --}}
    <script src="admin/js/app.js" defer></script>
    <script src="https://cdn.tailwindcss.com%22%3E/""></script>
    <script>
        theme: {
            extend: {
                blur: {
                    xs: '3px',
                }
            },
        },
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    sans: ["Roboto", "sans-serif"],
                    body: ["Roboto", "sans-serif"],
                    mono: ["ui-monospace", "monospace"],
                },
            },
            corePlugins: {
                preflight: false,
            },
        };
    </script>
    <style>
        /* Menyembunyikan tombol cetak saat mencetak */
        @media print {
            .kamu-tak-diajak {
                display: none;
            }

            .print-container {
                position: absolute;
                top: 20px;
                left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- screen loader -->
    <div
        class="spin_load  screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
        <div class="center">
            <div class="ring">
            </div>
            <img src="load/logo.png" alt="Deskripsi gambar" class="my-img">
        </div>
    </div>

    @include('jurnal_admin.layout')

    <div class=" pl-[px] " id="content">

        @include('jurnal_admin.nav')
        <div class="animate__animated p-6" :class="[$store.app.animation]">
            <!-- start main content section -->
            <div x-data="basic" class="">
                {{-- judul --}}
                <div class="mb-5 font-semibold kamu-tak-diajak">
                    <span> Jurnal <span class="text-[#00B7FF]"></span></span>
                </div>
                <div class="panel">
                    <div class="flex justify-between">
                        {{-- serch dan filter --}}
                        <div class="kamu-tak-diajak flex justify-start items-center">
                            {{-- filter --}}

                            {{-- serch --}}
                            <form action="">
                                <label class="relative hidden px-4 mt-1 sm:flex">
                                    <input
                                        class="form-input peer h-9 w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 text-xs+ placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Search here..." type="text" name="cari"
                                        value="{{ request('cari') }}" />
                                </label>
                            </form>
                        </div>
                        <div class="kamu-tak-diajak mb-5 flex flex-wrap  mt-5 items-center">
                            <a href="/jurnal_pdf">
                                <button
                                    class="kamu-tak-diajak flex gap-2 text-white bg-red-500 hover:bg-red-500 cus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5  py-2.5 mr-2 mb-2 dark:bg-red-500 dark:hover:bg-red-500 focus:outline-none dark:focus:ring-blue-800"
                                    @click="exportTable('csv')">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2 kamu-tak-diajak">
                                        <path
                                            d="M15.3929 4.05365L14.8912 4.61112L15.3929 4.05365ZM19.3517 7.61654L18.85 8.17402L19.3517 7.61654ZM21.654 10.1541L20.9689 10.4592V10.4592L21.654 10.1541ZM3.17157 20.8284L3.7019 20.2981H3.7019L3.17157 20.8284ZM20.8284 20.8284L20.2981 20.2981L20.2981 20.2981L20.8284 20.8284ZM14 21.25H10V22.75H14V21.25ZM2.75 14V10H1.25V14H2.75ZM21.25 13.5629V14H22.75V13.5629H21.25ZM14.8912 4.61112L18.85 8.17402L19.8534 7.05907L15.8947 3.49618L14.8912 4.61112ZM22.75 13.5629C22.75 11.8745 22.7651 10.8055 22.3391 9.84897L20.9689 10.4592C21.2349 11.0565 21.25 11.742 21.25 13.5629H22.75ZM18.85 8.17402C20.2034 9.3921 20.7029 9.86199 20.9689 10.4592L22.3391 9.84897C21.9131 8.89241 21.1084 8.18853 19.8534 7.05907L18.85 8.17402ZM10.0298 2.75C11.6116 2.75 12.2085 2.76158 12.7405 2.96573L13.2779 1.5653C12.4261 1.23842 11.498 1.25 10.0298 1.25V2.75ZM15.8947 3.49618C14.8087 2.51878 14.1297 1.89214 13.2779 1.5653L12.7405 2.96573C13.2727 3.16993 13.7215 3.55836 14.8912 4.61112L15.8947 3.49618ZM10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981L2.64124 21.3588C3.38961 22.1071 4.33855 22.4392 5.51098 22.5969C6.66182 22.7516 8.13558 22.75 10 22.75V21.25ZM1.25 14C1.25 15.8644 1.24841 17.3382 1.40313 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588L3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14H1.25ZM14 22.75C15.8644 22.75 17.3382 22.7516 18.489 22.5969C19.6614 22.4392 20.6104 22.1071 21.3588 21.3588L20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25V22.75ZM21.25 14C21.25 15.9068 21.2484 17.2615 21.1102 18.2892C20.975 19.2952 20.7213 19.8749 20.2981 20.2981L21.3588 21.3588C22.1071 20.6104 22.4392 19.6614 22.5969 18.489C22.7516 17.3382 22.75 15.8644 22.75 14H21.25ZM2.75 10C2.75 8.09318 2.75159 6.73851 2.88976 5.71085C3.02502 4.70476 3.27869 4.12511 3.7019 3.7019L2.64124 2.64124C1.89288 3.38961 1.56076 4.33855 1.40313 5.51098C1.24841 6.66182 1.25 8.13558 1.25 10H2.75ZM10.0298 1.25C8.15538 1.25 6.67442 1.24842 5.51887 1.40307C4.34232 1.56054 3.39019 1.8923 2.64124 2.64124L3.7019 3.7019C4.12453 3.27928 4.70596 3.02525 5.71785 2.88982C6.75075 2.75158 8.11311 2.75 10.0298 2.75V1.25Z"
                                            fill="currentColor" />
                                        <path opacity="0.5"
                                            d="M13 2.5V5C13 7.35702 13 8.53553 13.7322 9.26777C14.4645 10 15.643 10 18 10H22"
                                            stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                    <p class="kamu-tak-diajak">
                                        PDF
                                    </p>
                                </button>
                            </a>
                            <a href="jurnal_docx">
                                <button
                                    class="flex gap-2 text-white bg-blue-400 hover:bg-blue-400 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-400 dark:hover:bg-blue-400 focus:outline-none dark:focus:ring-blue-800"
                                    @click="exportTable('txt')">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2 kamu-tak-diajak">
                                        <path
                                            d="M15.3929 4.05365L14.8912 4.61112L15.3929 4.05365ZM19.3517 7.61654L18.85 8.17402L19.3517 7.61654ZM21.654 10.1541L20.9689 10.4592V10.4592L21.654 10.1541ZM3.17157 20.8284L3.7019 20.2981H3.7019L3.17157 20.8284ZM20.8284 20.8284L20.2981 20.2981L20.2981 20.2981L20.8284 20.8284ZM14 21.25H10V22.75H14V21.25ZM2.75 14V10H1.25V14H2.75ZM21.25 13.5629V14H22.75V13.5629H21.25ZM14.8912 4.61112L18.85 8.17402L19.8534 7.05907L15.8947 3.49618L14.8912 4.61112ZM22.75 13.5629C22.75 11.8745 22.7651 10.8055 22.3391 9.84897L20.9689 10.4592C21.2349 11.0565 21.25 11.742 21.25 13.5629H22.75ZM18.85 8.17402C20.2034 9.3921 20.7029 9.86199 20.9689 10.4592L22.3391 9.84897C21.9131 8.89241 21.1084 8.18853 19.8534 7.05907L18.85 8.17402ZM10.0298 2.75C11.6116 2.75 12.2085 2.76158 12.7405 2.96573L13.2779 1.5653C12.4261 1.23842 11.498 1.25 10.0298 1.25V2.75ZM15.8947 3.49618C14.8087 2.51878 14.1297 1.89214 13.2779 1.5653L12.7405 2.96573C13.2727 3.16993 13.7215 3.55836 14.8912 4.61112L15.8947 3.49618ZM10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981L2.64124 21.3588C3.38961 22.1071 4.33855 22.4392 5.51098 22.5969C6.66182 22.7516 8.13558 22.75 10 22.75V21.25ZM1.25 14C1.25 15.8644 1.24841 17.3382 1.40313 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588L3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14H1.25ZM14 22.75C15.8644 22.75 17.3382 22.7516 18.489 22.5969C19.6614 22.4392 20.6104 22.1071 21.3588 21.3588L20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25V22.75ZM21.25 14C21.25 15.9068 21.2484 17.2615 21.1102 18.2892C20.975 19.2952 20.7213 19.8749 20.2981 20.2981L21.3588 21.3588C22.1071 20.6104 22.4392 19.6614 22.5969 18.489C22.7516 17.3382 22.75 15.8644 22.75 14H21.25ZM2.75 10C2.75 8.09318 2.75159 6.73851 2.88976 5.71085C3.02502 4.70476 3.27869 4.12511 3.7019 3.7019L2.64124 2.64124C1.89288 3.38961 1.56076 4.33855 1.40313 5.51098C1.24841 6.66182 1.25 8.13558 1.25 10H2.75ZM10.0298 1.25C8.15538 1.25 6.67442 1.24842 5.51887 1.40307C4.34232 1.56054 3.39019 1.8923 2.64124 2.64124L3.7019 3.7019C4.12453 3.27928 4.70596 3.02525 5.71785 2.88982C6.75075 2.75158 8.11311 2.75 10.0298 2.75V1.25Z"
                                            fill="currentColor" />
                                        <path opacity="0.5" d="M6 14.5H14" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path opacity="0.5" d="M6 18H11.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path opacity="0.5"
                                            d="M13 2.5V5C13 7.35702 13 8.53553 13.7322 9.26777C14.4645 10 15.643 10 18 10H22"
                                            stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                  <p class="kamu-tak-diajak">  DOCX</p>
                                </button>
                            </a>
                          
                        </div>
                    </div>
                    <div id="grafik_siswa"
                        class="kamu-tak-diajak w-90% h-35 mx-4 bg-white rounded-lg dark:bg-black mt-4 "style="box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.25); border-radius: 8px; ">
                        <div class="w-full px-4 mt-6">
                            <div class="w-80%  bg-white h-35 pt-5 text-same font-semibold dark:bg-transparent">
                                Grafik jurnal
                            </div>
                        </div>
                    </div>

                    {{-- tabel --}}
                    <div class="print-container flex flex-col">
                        <div class="overflow-x-auto pt-8sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <div class="w-80%  bg-white h-35 pb-5 text-same font-semibold dark:bg-transparent kamu-tak-diajak">
                                        DATA JURNAL
                                    </div>
                                    <table class="min-w-full text-left text-sm font-light">
                                        <thead class="border-b font-medium dark:border-neutral-500 ">
                                            <tr class="">
                                                <th scope="col" class="px-6 py-4">#</th>
                                                <th scope="col" class="px-6 py-4">Nama</th>
                                                <th scope="col" class="px-6 py-4">Tanggal</th>
                                                <th scope="col" class="px-6 py-4">Sekolah</th>
                                                <th scope="col" class="px-6 py-4">kegiatan</th>
                                                <th scope="col" class="px-6 py-4 ">bukti</th>
                                                <th scope="col" class="kamu-tak-diajak px-6 py-4">Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($item  as $items)
                                                <tr
                                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:text-black-200 ">
                                                    <td class="whitespace-nowrap px-4 py-4 font-medium">
                                                        {{ $loop->iteration }}</td>
                                                    <td class="whitespace-nowrap px-4 py-4">{{ $items->nama }}</td>
                                                    <td class="whitespace-nowrap px-4 py-4">{{ $items->tanggal }}</td>
                                                    <td class="whitespace-nowrap px-4 py-4">{{ $items->sekolah }}</td>
                                                    <td
                                                        class="whitespace-nowrap px-4 py-4 max-w-sm overflow-hidden truncate ">
                                                        {{ $items->kegiatan }}</td>
                                                    <td class="whitespace-nowrap px-6 pl-17 py-4"><img
                                                            src="{{ asset('storage/image/' . $items->image) }}"
                                                            width="100px" alt="">
                                                    </td>
                                                    <td class="whitespace-nowrap px-4 py-4 kamu-tak-diajak">
                                                        <button type="button"
                                                            class="w-16 flex h-8 bg-white rounded-md border-2 border-[#00B7FF] justify-center items-center text-[#00B7FF] hover:bg-[#00B7FF] hover:text-white dark:bg-transparent"
                                                            data-te-toggle="modal"
                                                            data-modal-target="staticModal{{ $items->id }}"
                                                            data-modal-toggle="staticModal{{ $items->id }}">
                                                            <span
                                                                class=" p-1  font-semibold dark:hover:text-black">Lihat</span>
                                                        </button>
                                                    </td>
                                                </tr>

                                                {{-- end tabel --}}

                                            @empty
                                                <tr>
                                                    <td colspan="6" class="p-8 text-center">
                                                        <div class="flex justify-center items-center"
                                                            style="justify-items: center">
                                                            <img src="/admin/noData.png" alt=""
                                                                width="300px">
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $item->appends(['cari' => request('cari')])->links() }}
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- paginate --}}

                    <!-- end main content section -->
                    <!-- start footer section -->
                    {{-- <p class="pt-6 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
            © <span id="footer-year">2022</span>. Vristo All rights reserved.
        </p> --}}
                    <!-- end footer section -->

                </div>
                @forelse ($item as $modal)
                    {{-- modal --}}
                    <div id="staticModal{{ $modal->id }}" tabindex="-1" aria-hidden="true"
                        class="kamu-tak-diajak fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Detail Jurnal
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="staticModal{{ $modal->id }}">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 space-y-6">
                                    <div>
                                        <p
                                            class="text-base leading-relaxed font-bold  text-gray-800 dark:text-gray-400">
                                            Nama
                                        </p>
                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                            {{ $modal->nama }}
                                        </p>
                                    </div>
                                    <div>
                                        <p
                                            class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                            Tanggal
                                        </p>
                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                            {{ $modal->tanggal }}
                                        </p>
                                    </div>
                                    <div>
                                        <p
                                            class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                            Sekolah
                                        </p>
                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                            {{ $modal->sekolah }}
                                        </p>
                                    </div>
                                    <div>
                                        <p
                                            class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                            Kegiatan
                                        </p>
                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                            {{ $modal->kegiatan }}
                                        </p>
                                    </div>
                                    <div>
                                        <p
                                            class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                            Bukti
                                        </p>
                                        <img src="{{ asset('storage/image/' . $modal->image) }}" alt="">
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div
                                    class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button data-modal-hide="staticModal{{ $modal->id }}" type="button"
                                        class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse




                <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                <script>
                    // Initialization for ES Users
                    var options = {
                        series: [{
                            name: 'Mengisi',
                            data: [{{ $mengisi_jan }}, {{ $mengisi_feb }}, {{ $mengisi_mar }}, {{ $mengisi_apr }},
                                {{ $mengisi_mei }},
                                {{ $mengisi_jun }}, {{ $mengisi_jul }}, {{ $mengisi_aug }}, {{ $mengisi_sep }},
                                {{ $mengisi_okt }}, {{ $mengisi_nov }}, {{ $mengisi_des }}
                            ]
                        }, {
                            name: 'Tidak Mengisi',
                            data: [
                                {{ $tdk_mengisi_jan }}, {{ $tdk_mengisi_feb }}, {{ $tdk_mengisi_mar }},
                                {{ $tdk_mengisi_apr }}, {{ $tdk_mengisi_mei }},
                                {{ $tdk_mengisi_jun }}, {{ $tdk_mengisi_jul }}, {{ $tdk_mengisi_aug }},
                                {{ $tdk_mengisi_sep }}, {{ $tdk_mengisi_okt }}, {{ $tdk_mengisi_nov }},
                                {{ $tdk_mengisi_des }}
                            ]
                        }],
                        chart: {
                            type: 'bar',
                            height: 350,
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '55%',
                                endingShape: 'rounded',
                                borderRadius: 7,
                            },
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        animations: {
                            enabled: true,
                            easing: 'easeinout',
                            speed: 1200,
                            animateGradually: {
                                enabled: true,
                                delay: 200
                            },
                            dynamicAnimation: {
                                enabled: true,
                                speed: 450
                            }
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],

                        },
                        yaxis: {
                            title: {
                                text: ''
                            }
                        },
                        fill: {
                            opacity: 5,
                            colors: ['#008ffb', '#47EBB3']
                        },
                        tooltip: {
                            y: {
                                // formatter: function (val) {
                                //   return "$ " + val + " thousands"
                                // }
                            }
                        }
                    };

                    var chart = new ApexCharts(document.querySelector("#grafik_siswa"), options);
                    chart.render();
                </script>
                <script>
                    // Initialization for ES Users
                    import {
                        Modal,
                        Ripple,
                        initTE,
                    } from "tw-elements";

                    initTE({
                        Modal,
                        Ripple
                    });
                </script>
                <script>
                    const instanceMode = te.Sidenav.getInstance(
                        document.getElementById("sidenav-2")
                    );
                    const modes = ["side"];

                    modes.forEach((mode) => {
                        const modeSwitch = document.getElementById(mode);
                        modeSwitch.addEventListener("click", () => {
                            const instance = te.Sidenav.getInstance(
                                document.getElementById("sidenav-2")
                            );
                            instance.changeMode(mode);
                            modes.forEach((el) => {
                                if (el === mode) {
                                    ["text-primary-600", "border-primary-600"].forEach((item) =>
                                        modeSwitch.classList.remove(item)
                                    );
                                    modeSwitch.className +=
                                        " bg-primary text-white hover:bg-primary-700 active:bg-primary-800 focus:bg-primary-700 border-transparent";
                                } else {
                                    const node = document.getElementById(el);
                                    node.className += " text-primary-600 border-primary-600";
                                    [

                                    ].forEach((item) => node.classList.remove(item));
                                }
                            });
                        });
                    });
                </script>
                <script>
                    // Initialization for ES Users
                    import {
                        sidenav - 2,
                        initTE,
                    } from "tw-elements";

                    initTE({
                        sidenav - 2
                    });
                </script>
                <script>
                    $(window).on('load', function() {
                        $('.spin_load').fadeOut();
                    });
                </script>
                <script>
                    // Fungsi untuk mencetak halaman
                    function printPage() {
                        window.print();
                    }
                </script>
</body>

</html>
