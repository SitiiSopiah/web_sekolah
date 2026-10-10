@extends('template.landing')

@section('content')

<section style="background:#f5f9f7; padding-top:120px; padding-bottom:70px;">
    <div class="text-center mb-5">

        <small style="
            color:#d99a16;
            font-weight:700;
            letter-spacing:2px;
        ">
            PROFIL SEKOLAH
        </small>

        <h1 class="font-weight-bold mt-2"
            style="color:#173d2d;">
            Tentang {{ $profil->nama_sekolah }}
        </h1>

        <p class="text-muted mx-auto"
            style="max-width:700px; line-height:1.8;">
            Mengenal lebih dekat identitas, tujuan, dan komitmen
            {{ $profil->nama_sekolah }} dalam dunia pendidikan.
        </p>

    </div>
    <div class="container">

        {{-- PROFIL SEKOLAH --}}
        <div class="profil-card mb-5">
            <div class="row g-0 align-items-stretch">

                <div class="col-lg-5">
                    @if(!empty($profil?->foto))
                        <img
                            src="{{ asset('storage/' . $profil->foto) }}"
                            alt="Foto SMPN 2 MANGUNREJA"
                            class="profil-foto"
                        >
                    @else
                        <div class="profil-foto-placeholder">
                            <i class="fas fa-school"></i>
                            <p>SMPN 2 MANGUNREJA</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-7">
                    <div class="profil-content">
                        <span class="profil-label">IDENTITAS SEKOLAH</span>

                        <h2>
                            {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
                        </h2>

                        <p class="profil-deskripsi">
                            {{ $profil->deskripsi
                                ?? 'SMPN 2 MANGUNREJA berkomitmen memberikan pendidikan yang berkualitas serta membentuk peserta didik yang berkarakter, mandiri, dan berprestasi.' }}
                        </p>

                        <div class="profil-info">

                            <div class="profil-info-item">
                                <i class="fas fa-user-tie"></i>
                                <div>
                                    <span>Kepala Sekolah</span>
                                    <strong>
                                        {{ $profil->kepala_sekolah ?? 'Belum diisi' }}
                                    </strong>
                                </div>
                            </div>

                            <div class="profil-info-item">
                                <i class="fas fa-id-card"></i>
                                <div>
                                    <span>NPSN</span>
                                    <strong>
                                        {{ $profil->npsn ?? 'Belum diisi' }}
                                    </strong>
                                </div>
                            </div>

                            <div class="profil-info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <span>Alamat Sekolah</span>
                                    <strong>
                                        {{ $profil->alamat ?? 'Belum diisi' }}
                                    </strong>
                                </div>
                            </div>

                            <div class="profil-info-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <span>Kontak</span>
                                    <strong>
                                        {{ $profil->kontak ?? 'Belum diisi' }}
                                    </strong>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- VISI DAN MISI --}}
        <div class="visi-misi-heading text-center mb-4">
            <span class="tentang-badge">ARAH PENDIDIKAN</span>
            <h2>Visi &amp; Misi Sekolah</h2>
            <p>
                Landasan dan tujuan SMPN 2 MANGUNREJA
                dalam mewujudkan pendidikan berkualitas dan berkarakter.
            </p>
        </div>

        <div class="visi-misi-card">

            <div class="visi-misi-header">
                <div class="visi-misi-icon">
                    <i class="fas fa-bullseye"></i>
                </div>

                <div>
                    <h3>Visi &amp; Misi SMPN 2 MANGUNREJA</h3>
                    <p>Landasan dan tujuan sekolah</p>
                </div>
            </div>

            <div class="visi-misi-content">
                @if(!empty($profil?->visi_misi))
                    <div class="visi-misi-text">{{ $profil->visi_misi }}</div>
                @else
                    <p class="text-muted mb-0">
                        Data visi dan misi sekolah belum tersedia.
                    </p>
                @endif
            </div>

        </div>

    </div>
</section>

@endsection