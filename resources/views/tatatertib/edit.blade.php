<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Tata Tertib</title>
    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('load/load.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>
    <link href="/admin/assets/images/Logo.png" rel="shortcut icon">

        <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}" />
        <!-- Javascript Assets -->
        <script src="{{ asset('admin/js/app.js') }}" defer></script>
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

    <!-- Javascript Assets -->
    <script src="{{ asset('admin/js/app.js') }}" defer></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />
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
</head>

<body>
    <div
    class="spin_load  screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
    <div class="center">
        <div class="ring">
        </div>
        <img src="{{asset('load/logo.png')}}" alt="Deskripsi gambar" class="my-img">
    </div>
    </div>
    @include('jurnal_admin.layout')

    <div class=" pl-[px] " id="content">
        @include('jurnal_admin.nav')


        <!-- Navbar -->
        <main class=" w-full px-4 pb-8">
            <div class="flex justify-between space-y-4 py-5 sm:flex-row  lg:py-6">
                <div class="flex items-center text-sm space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h2 class="text-sm font-medium text-slate-700 line-clamp-1 dark:text-navy-50">
                        Edit Tata Tertib
                    </h2>
                </div>

            </div>
            <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
                <div class="col-span-12 lg:col-span-12">
                    <div class="card">
                        <div class="tabs flex flex-col">
                            <div class="is-scrollbar-hidden overflow-x-auto">
                                <div class="border-b-2 border-slate-150 dark:border-navy-500">
                                    <div class="tabs-list -mb-0.5 flex">
                                        <button
                                            class="btn h-14 shrink-0 space-x-2 rounded-none border-b-2 border-info px-4 font-medium text-info dark:border-accent dark:text-accent-light sm:px-5">
                                            <i class="fa-solid fa-layer-group text-base"></i>
                                            <span>Tata Tertib</span>
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <form action="{{ route('tatatertib.update', $tataTertib->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="tab-content p-4 sm:p-5">
                                    <div class="space-y-5">
                                        <label class="block">
                                            <span class="font-medium text-slate-600 dark:text-navy-100">Judul</span>
                                            <input id="judul" name="judul"
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                value="{{ $tataTertib->judul }}" type="text" />
                                        </label>
                                        <div>
                                            <span class="font-medium text-slate-600 dark:text-navy-100">Deskripsi</span>
                                            <div class="mt-1.5 w-full">
                                                <div>
                                                    <textarea name="deskripsi" id="summernote">{!! $tataTertib->deskripsi !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-end space-x-2">
                                            <a href="{{ route('tatatertib.index') }}"
                                                class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">Batal</a>
                                            <button type="submit"
                                                class="btn min-w-[7rem] bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>




<script>
    $('#summernote').summernote({
        placeholder: 'Deskripsi..',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
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
