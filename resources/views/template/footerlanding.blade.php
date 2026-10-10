<footer class="school-footer py-5">

    <div class="container">

        <div class="row">

            {{-- INFORMASI SEKOLAH --}}
            <div class="col-lg-6 mb-4 mb-lg-0">

                <h5 class="mb-3">
                    {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
                </h5>

                <p class="mb-0">
                    {{ $profil->deskripsi ??
                        'SMPN 2 MANGUNREJA adalah sekolah yang berkomitmen memberikan pendidikan berkualitas dengan mengembangkan kemampuan akademik, karakter, keterampilan, minat, dan bakat peserta didik.' }}
                </p>

            </div>


            {{-- KONTAK --}}
            <div class="col-lg-6">

                <h5 class="mb-3">
                    Kontak
                </h5>

                @if(isset($profil) && $profil && $profil->alamat)

                    <p class="mb-2">

                        <i class="fas fa-map-marker-alt mr-2"></i>

                        {{ $profil->alamat }}

                    </p>

                @endif


                @if(isset($profil) && $profil && $profil->kontak)

                    <p class="mb-0">

                        <i class="fas fa-phone mr-2"></i>

                        {{ $profil->kontak }}

                    </p>

                @endif

            </div>

        </div>


        <hr class="my-4">


        <div class="text-center copyright small">

            &copy; {{ date('Y') }}

            {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}.

            Semua Hak Dilindungi.

        </div>

    </div>

</footer>