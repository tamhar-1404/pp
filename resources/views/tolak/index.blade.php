<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Data Ditolak</title>
    <script src="https://cdn.tailwindcss.com%22%3E/"></script>
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
    <link rel="stylesheet" href="load/load.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
    {{--  <link defer rel="stylesheet" type="text/css" media="screen" href="{{ asset('admin/assets/css/animate.css') }}" />  --}}
    <script src="{{ asset('admin/assets/js/perfect-scrollbar.min.js') }}"></script>
    <script defer src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
    <script defer src="{{ asset('admin/assets/js/tippy-bundle.umd.min.js') }}"></script>
    <script defer src="{{ asset('admin/assets/js/sweetalert.min.js') }}"></script>
    {{--  <!-- Javascript Assets -->  --}}
    <script src="admin/js/app.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
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
</head>

<body>
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
            <div x-data="basic" class="mt-8">
                {{-- judul --}}
                <div class="mb-5 font-semibold">
                    <span> lainnya / <span class="text-[#00B7FF]">Di Tolak</span></span>
                </div>
                <div class="panel">
                    <div class="flex justify-between">
                        {{-- serch dan filter --}}
                        <div class="flex justify-start items-center">

                        </div>
                        <div class="mb-5 flex flex-wrap  mt-5 items-center">
                            {{-- filter --}}

                            {{-- serch --}}
                            <div class="mr-4 ">
                                <form action="">
                                    <label class="relative hidden sm:flex">
                                        <input
                                            class="form-input peer h-9 w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 text-xs+ placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Search users..." type="text" name="cari"
                                            value="{{ request('cari') }}" />
                                        <span
                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4 transition-colors duration-200" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M3.316 13.781l.73-.171-.73.171zm0-5.457l.73.171-.73-.171zm15.473 0l.73-.171-.73.171zm0 5.457l.73.171-.73-.171zm-5.008 5.008l-.171-.73.171.73zm-5.457 0l-.171.73.171-.73zm0-15.473l-.171-.73.171.73zm5.457 0l.171-.73-.171.73zM20.47 21.53a.75.75 0 101.06-1.06l-1.06 1.06zM4.046 13.61a11.198 11.198 0 010-5.115l-1.46-.342a12.698 12.698 0 000 5.8l1.46-.343zm14.013-5.115a11.196 11.196 0 010 5.115l1.46.342a12.698 12.698 0 000-5.8l-1.46.343zm-4.45 9.564a11.196 11.196 0 01-5.114 0l-.342 1.46c1.907.448 3.892.448 5.8 0l-.343-1.46zM8.496 4.046a11.198 11.198 0 015.115 0l.342-1.46a12.698 12.698 0 00-5.8 0l.343 1.46zm0 14.013a5.97 5.97 0 01-4.45-4.45l-1.46.343a7.47 7.47 0 005.568 5.568l.342-1.46zm5.457 1.46a7.47 7.47 0 005.568-5.567l-1.46-.342a5.97 5.97 0 01-4.45 4.45l.342 1.46zM13.61 4.046a5.97 5.97 0 014.45 4.45l1.46-.343a7.47 7.47 0 00-5.568-5.567l-.342 1.46zm-5.457-1.46a7.47 7.47 0 00-5.567 5.567l1.46.342a5.97 5.97 0 014.45-4.45l-.343-1.46zm8.652 15.28l3.665 3.664 1.06-1.06-3.665-3.665-1.06 1.06z" />
                                            </svg>
                                        </span>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- tabel --}}

                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-left text-sm font-light">
                                        <thead class="border-b font-medium dark:border-neutral-500 ">
                                            <tr class="">
                                                <th scope="col" class="px-6 py-4">#</th>
                                                <th scope="col" class="px-6 py-4">Nama</th>
                                                <th scope="col" class="px-6 py-4 ">Kelas</th>
                                                <th scope="col" class="px-6 py-4">Jurusan</th>
                                                <th scope="col" class="px-6 py-4">Sekolah</th>
                                                <th scope="col" class="px-6 py-4">Alasan</th>
                                                <th scope="col" class="px-6 py-4">Aksi</th>

                                            </tr>
                                        </thead>
                                        @forelse ($tolaks as $tolak)
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                ?>
                                                <tr
                                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:text-black-200 ">
                                                    <td class="whitespace-nowrap px-4 py-4 font-medium">
                                                        {{ $no++ }}</td>
                                                    <td class="whitespace-nowrap px-4 py-4">{{ $tolak->name }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $tolak->kelas }}</td>
                                                    <td class="whitespace-nowrap px-4 py-4">{{ $tolak->jurusan }}</td>
                                                    <td class="whitespace-nowrap px-4 py-4">{{ $tolak->sekolah }}</td>
                                                    <td
                                                        class="whitespace-nowrap px-4 py-4 max-w-sm overflow-hidden truncate ">
                                                        {{ $tolak->alasan }}</td>
                                                    <td class="whitespace-nowrap px-4 py-4">
                                                        <div class="w-16 flex cursor-pointer h-8 bg-white rounded-md border-2 border-[#00B7FF] justify-center items-center text-[#00B7FF] hover:bg-[#00B7FF] hover:text-white dark:bg-transparent "
                                                        data-te-toggle="modal"
                                                        data-modal-target="staticModal{{ $tolak->id }}"
                                                        data-modal-toggle="staticModal{{ $tolak->id }}">
                                                            <span class=" p-1 cursor-pointer  font-semibold dark:hover:text-black">Lihat</span>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="p-8 text-center">
                                                    <div class="flex justify-center items-center">
                                                        <img src="/admin/noData.png" alt="" width="280px">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </table>
                                    {{ $tolaks->appends(['cari' => request('cari')])->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end tabel --}}
                    {{-- paginate --}}

                </div>
            </div>
            <!-- end main content section -->

        </div>
        {{-- modal --}}
        @forelse ($tolaks as $modal)
        {{-- modal --}}
            <div id="staticModal{{ $modal->id }}" tabindex="-1" aria-hidden="true"
                class="kamu-tak-diajak fixed top-0 left-0 right-0 z-[999] hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Detail laporan
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
                        <div class="flex w-full justify-center mt-10">
                            <img class="w-[20%] h-[20%] rounded-full" src="{{asset('storage/ditolak/'. $modal->foto_siswa)}}" alt="">
                        </div>
                        <div class="p-6 grid grid-cols-2 gap-5">
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    nama
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $modal->name }}
                                </p>
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    Tanggal lahir
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $modal->tanggal }}
                                </p>
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    Tanggal lahir
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $modal->tempat }}
                                </p>
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    jurusan
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $modal->jurusan }}
                                </p>
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    email
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $modal->email }}
                                </p>
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    nomer telepon
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $modal->no }}
                                </p>
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    sekolah
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $modal->sekolah }}
                                </p>
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    alasan
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $modal->alasan }}
                                </p>
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    kelas
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $modal->kelas }}
                                </p>
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    nisn
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $modal->nisn }}
                                </p>
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    jenis kelamin
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $modal->jeniskelamin }}
                                </p>
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    alamat
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $modal->alamat }}
                                </p>
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    magang awal
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $modal->magang_awal }}
                                </p>
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    magang akhir
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $modal->magang_akhir }}
                                </p>
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    Bukti
                                </p>
                                <img src="{{ asset('storage/ditolak/' . $modal->sp_diri) }}" alt=""
                                    srcset="">
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    Bukti
                                </p>
                                <img src="{{ asset('storage/ditolak/' . $modal->sp_ortu) }}" alt=""
                                    srcset="">
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    Bukti
                                </p>
                                <img src="{{ asset('storage/ditolak/' . $modal->cv) }}" alt=""
                                    srcset="">
                            </div>
                            <div>
                                <p class="text-base leading-relaxed font-bold text-gray-800 dark:text-gray-400">
                                    Bukti
                                </p>
                                <img src="{{ asset('storage/ditolak/' . $modal->skck) }}" alt=""
                                    srcset="">
                            </div>

                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="staticModal{{ $modal->id }}" type=""
                                class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse

        {{-- end modal --}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script>
            $(window).on('load', function() {
                $('.spin_load').fadeOut();
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
</body>

</html>
