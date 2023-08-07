<main class="main mt-9 px-7 w-full pb-9  ">
    <div class="">
      <div class="">
        <div class="card lg:p-6 md:p-5 p-4 " >
          <!-- Author -->
          <div>
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-3">
                <div
                  x-data="usePopper({
                   offset: 12,
                   placement: 'bottom',
                   modifiers: [
                      {name: 'preventOverflow', options: {padding: 10}}
                   ]
                })"
                  class="flex"
                  @mouseleave="isShowPopper = false"
                  @mouseenter="isShowPopper = true"
                >
                  <div x-ref="popperRef" class="avatar h-12 w-12">
                    <img
                      class="mask is-squircle"
                      src="{{ asset('image/logo.png') }}"
                      alt="avatar"
                    />
                  </div>
                  <div
                    x-ref="popperRoot"
                    class="popper-root"
                    :class="isShowPopper && 'show'"
                  >

                  </div>
                </div>
                <div>
                  <a
                    href="#"
                    class="font-medium text-slate-700 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light"
                  >{{ $berita->name }}
                  </a>
                  @php
                      use Carbon\Carbon;
                  @endphp
                  <div class="mt-1.5 flex items-center text-xs">
                    <span class="line-clamp-1">{{ Carbon::parse($berita->tanggal)->format('d M') }}</span>
                    <div
                      class="mx-2 my-0.5 w-px self-stretch bg-white/20"
                    ></div>
                  </div>
                </div>
              </div>

              <div class="flex space-x-3">
                <div
                  x-data="usePopper({placement:'bottom-end',offset:4})"
                  @click.outside="isShowPopper && (isShowPopper = false)"
                  class="inline-flex"
                >

                  <div
                    x-ref="popperRoot"
                    class="popper-root"
                    :class="isShowPopper && 'show'"
                  >
                    <div
                      class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700"
                    >
                      <ul>
                        <li>
                          <a
                            href="#"
                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                            >Action</a
                          >
                        </li>
                        <li>
                          <a
                            href="#"
                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                            >Another Action</a
                          >
                        </li>
                        <li>
                          <a
                            href="#"
                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                            >Something else</a
                          >
                        </li>
                      </ul>
                      <div
                        class="my-1 h-px bg-slate-150 dark:bg-navy-500"
                      ></div>
                      <ul>
                        <li>
                          <a
                            href="#"
                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                            >Separated Link</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>

          <!-- Blog Post -->
          <div
            class="mt-6 font-inter text-base text-slate-600 dark:text-navy-200"
          >
            <h1
              class="text-xl font-medium text-slate-900 dark:text-navy-50 lg:text-2xl"
            >
              {{ $berita->judul }}
            </h1>
            <h3 class="mt-1">
              {{ $berita->keterangan }}
            </h3>
            <img
              class="mt-5 h-80 w-full rounded-lg object-cover object-center"
              src="{{ asset('storage/fotoberita/' . $berita->foto) }}" alt="image" />
            <p
              class="mt-1 text-center text-xs+ text-slate-400 dark:text-navy-300"
            >
              <span> Photo by </span>
              <a href="#" class="underline">{{ $berita->name }}</a>
            </p>
            <br />
            <p>{!! $berita->deskripsi !!}</p>
          </div>

          <!-- Footer Blog Post -->
          <div class="mt-5 flex space-x-3">
            <form action="{{route('Berita.like', $berita->id)}}" method="post">
            @csrf
            <button
              class="btn space-x-2 rounded-full border border-slate-300 px-4 text-xs+ font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4.5 w-4.5 text-slate-400 dark:text-navy-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z"
                />
              </svg>

              <span> {{ $berita->likes_count }}</span>
            </button>
            </form>
            <button
              class="btn space-x-2 rounded-full border border-slate-300 px-4 text-xs+ font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4.5 w-4.5 text-slate-400 dark:text-navy-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z"
                />
              </svg>

              <span> {{ count($berita->comments) }}</span>
            </button>
          </div>
        </div>


      </div>
      <div class="bg-white rounded p-4 mt-4 shadow">
        <form class="flex" method="POST" action="{{ route('comment.store') }}">
          @csrf
          <input type="hidden" name="blog_id" value="{{ $berita->id }}">
          <div class="flex flex-col w-full">
            <label for="txarea" class="font-medium text-gray-900 dark:text-white text-sm mb-2">Komentar</label>
            <div class="flex flex-row">
              <div class="flex flex-grow">
                <textarea class="w-full p-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="Tulis komentar" name="comment" id="txarea"></textarea>
              </div>
              <div class="flex">
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg ml-2">Kirim</button>
              </div>
            </div>
          </div>

        </form>
    </div>
      @foreach ($berita->comments as $comment)
      <div class="bg-white p-4 mb-4 mt-4 rounded shadow">
          <div class="flex items-center mb-2">
          <img class="w-8 h-8 rounded-full mr-2" src="{{ asset('storage/Siswa/' . $comment->user->Siswa?->foto_siswa) }}" alt="Profil Picture">
          <h4 class="text-lg font-bold">{{ $comment->user->name }}</h4>
          </div>
          <p class="text-gray-700 mb-2">{{ $comment->comment }}</p>
          <a href="#" class="text-blue-500 reply-button">Balas</a>

          <div class="reply-form hidden">
              <form action="{{ route('comment.reply') }}" method="POST">
              @csrf
              <input type="hidden" name="comment_id" value="{{ $comment->id }}">
              <div class="flex flex-row w-full">
                  <div class="flex flex-grow">
                      <textarea class="w-full p-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="Tulis balas" name="comment" id="txarea"></textarea>
                  </div>
                  <div class="flex">
                      <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg ml-2">Balas</button>
                  </div>
              </div>
              </form>
          </div>
      </div>

      @if(count($comment->reply_comments) != 0)
      @foreach ($comment->reply_comments as $reply)
      <div class="bg-white p-4 ml-8 mt-2 shadow">
        <div class="flex items-center mb-2">
            <img class="w-8 h-8 rounded-full mr-2" src="{{ asset('storage/Siswa/' . $comment->user->Siswa?->foto_siswa) }}" alt="Profil Picture">
            <div class="flex flex-col">
                <h4 class="text-lg font-bold">{{ $reply->user->name }}</h4>
                <p class="text-sm font-light">{{ Carbon::parse($reply->created_at)->format('d M Y') }}</p>
            </div>
        </div>
        <p class="text-gray-700 mb-2"><i class="fa-solid fa-reply text-gray-500"></i> <span class="text-blue-500">{{ $reply->komentar->user->name }}</span> {{ $reply->comment }}</p>
    </div>
      @endforeach
      @endif
      @endforeach
      </div>
    </div>
  </main>
  <script>
    // Ambil semua elemen tombol balas
    var replyButtons = document.getElementsByClassName('reply-button');

    // Loop melalui setiap tombol balas
    for (var i = 0; i < replyButtons.length; i++) {
      // Tambahkan event listener pada setiap tombol balas
      replyButtons[i].addEventListener('click', function() {
        // Cari elemen form balasan terkait
        var replyForm = this.nextElementSibling;

        // Ubah visibilitas form balasan
        replyForm.classList.toggle('hidden');
      });
    }

  </script>
