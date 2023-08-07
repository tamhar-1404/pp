<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Transaksi</title>
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
    <link href="/admin/assets/images/Logo.png" rel="shortcut icon">
    <link rel="stylesheet" href="load/load.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
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
    <style>
        /* CSS untuk tampilan modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: auto;
            backdrop-filter: blur(2px);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 500px;
            width: 100%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 2rem;
        }
    </style>
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

        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
            <div class="main-content">
                {{-- @include('aproval.layout') --}}
                <div class="animate__animated p-6" :class="[$store.app.animation]">
                    <!-- start main content section -->

                    <div x-data="basic" class="">
                        {{-- judul --}}
                        <div class="mb-5 font-semibold text-base">
                            <span>Histori / <span class="text-[#00B7FF]">Penjualan</span></span>
                        </div>
                        <div class="panel">
                            {{-- serch dan filter --}}
                            <div class="flex ">
                                <div class="w-full">

                                </div>
                                <div class=" w-full flex justify-end">

                                    {{-- serch --}}
                                    <div class="mr-3">
                                        <form action="">
                                            <label class="relative hidden sm:flex ">
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


                                        <!-- Modal -->
                                        <div id="modal"
                                            class="fixed right-48 mt-32 flex items-center justify-center z-50 hidden">
                                            <div class="absolute w-96 bg-white rounded-lg p-6 shadow-lg">
                                                <div class="modal-header mb-4">
                                                    <div class="flex items-center justify-between mb-4">
                                                        <h5 class="text-xl font-bold">Filter Approval Siswa</h5>
                                                        <button onclick="closeModal()"
                                                            class="text-gray-500 ml-auto focus:outline-none">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </div>

                                                </div>


                                                <div class="modal-footer mt-4 flex justify-end gap-2">
                                                    <button
                                                        class="bg-white py-1 px-3 rounded-lg border border-gray-200 text-gray-300">Atur
                                                        Ulang</button>
                                                    <button
                                                        class="bg-blue-400 py-1 px-3 rounded-lg border border-gray-200 text-white">Pakai</button>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            function openModal() {
                                                document.getElementById("modal").classList.remove("hidden");
                                            }

                                            function closeModal() {
                                                document.getElementById("modal").classList.add("hidden");
                                            }

                                            function changeColor(checkbox) {
                                                var label = document.getElementById("checkboxLabel");
                                                if (checkbox.checked) {
                                                    label.classList.add("bg-gray-900 text-white");
                                                    label.classList.remove("bg-white");

                                                } else {
                                                    label.classList.add("bg-white");
                                                    label.classList.remove("bg-blue-500");
                                                }
                                            }
                                        </script>
                                    </ul>
                                </div>
                            </div>
                            {{-- tabel --}}
                            <style>
                                .pagination .active a {
                                    color: blue !important;
                                }
                            </style>

                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <table class="min-w-full text-left text-sm ">
                                                <thead class="border-rounded bg-[#E2E8F0] dark:border-neutral-500">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-2">#</th>
                                                        <th scope="col" class="px-6 py-2">Nama</th>
                                                        <th scope="col" class="px-6 py-2">RFID</th>
                                                        <th scope="col" class="px-6 py-2">Barang</th>
                                                        {{--  <th scope="col" class="px-6 py-2">Foto</th>  --}}
                                                        <th scope="col" class="px-6 py-2">Harga</th>
                                                        <th scope="col" class="px-6 py-2">Stok</th>
                                                        <th scope="col" class="px-6 py-2">Total</th>
                                                        <th scope="col" class="px-6 py-2">Tanggal</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @forelse ($data as $items)
                                                    <tbody>
                                                        <tr>
                                                            <td class="whitespace-nowrap px-6 py-2">
                                                                {{ $no++ }}
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-2">
                                                                {{ $items->nama }}
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-2">
                                                                {{ $items->rfid }}
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-2">
                                                                {{ $items->name }}
                                                            </td>
                                                            {{--  <td class="whitespace-nowrap px-6 py-2">
                                                                <img src="{{ asset('Storage/pendataanbarang/' . $items->foto) }}"
                                                                    width="50" height="50" alt="">
                                                            </td>  --}}
                                                            <td class="whitespace-nowrap px-6 py-2">
                                                                {{ "Rp " . number_format($items->harga, 0, ',', '.') }}
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-2">
                                                                {{ $items->stok }}
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-2">
                                                                {{ "Rp " . number_format($items->total, 0, ',', '.') }}
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-2">
                                                                {{ $items->tanggal }}
                                                            </td>
                                                    <tbody>

                                                    </tbody>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="p-8 text-center">
                                                            <div class="flex justify-center items-center">
                                                                <img src="/admin/noData.png" alt=""
                                                                    width="280px">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </table>
                                            {{ $data->appends(['cari' => request('cari')])->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex justify-end">
                                <p> Total : <span class="text">{{ "Rp " . number_format($jumlah, 0, ',', '.') }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
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
        // Initialization for ES itemss
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
</body>

</html>
