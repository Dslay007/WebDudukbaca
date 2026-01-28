@extends('layouts.modern_landing')

@section('title', 'Jurnal Lapak | Duduk Baca')

@section('content')
<section style="padding: 6rem 1rem;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <!-- Header -->
        <div style="text-align: center; margin-bottom: 4rem;">
            <h2 style="font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 1rem;">Jurnal Lapak</h2>
            <p style="color: #64748b; max-width: 600px; margin: 0 auto; font-size: 1.1rem;">Berita, dokumentasi, dan pengumuman terbaru dari kegiatan komunitas Duduk Baca.</p>
        </div>

        <!-- Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2.5rem;">
            <!-- Card 1 -->
            <article style="background: white; border-radius: 1rem; overflow: hidden; border: 1px solid #e2e8f0; transition: transform 0.2s, box-shadow 0.2s;" 
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 30px -5px rgba(0,0,0,0.08)'" 
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                <div style="padding: 2rem;">
                    <div style="margin-bottom: 1rem;">
                        <span style="background: #ecfeff; color: #0891b2; padding: 0.25rem 0.75rem; border-radius: 99px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">Wawancara</span>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-bottom: 0.75rem; line-height: 1.4;">
                        Liputan Eksklusif RRI Malang: Peran Komunitas dalam Menjaga Budaya Baca
                    </h3>
                    <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 1.5rem; line-height: 1.6;">
                        Simak diskusi hangat tim Duduk Baca bersama RRI tentang tantangan dan harapan literasi di ruang publik.
                    </p>
                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f1f5f9; padding-top: 1rem;">
                        <span style="font-size: 0.85rem; color: #94a3b8;">20 Oktober 2025</span>
                        <a href="#" style="font-weight: 600; color: hsl(var(--primary)); font-size: 0.9rem;">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
            </article>

            <!-- Card 2 -->
            <article style="background: white; border-radius: 1rem; overflow: hidden; border: 1px solid #e2e8f0; transition: transform 0.2s, box-shadow 0.2s;" 
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 30px -5px rgba(0,0,0,0.08)'" 
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                <div style="padding: 2rem;">
                    <div style="margin-bottom: 1rem;">
                        <span style="background: #fff1f2; color: #be123c; padding: 0.25rem 0.75rem; border-radius: 99px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">Kegiatan</span>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-bottom: 0.75rem; line-height: 1.4;">
                        Duduk Baca Berpartisipasi di Malam Budaya Sanggar Arek Malang
                    </h3>
                    <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 1.5rem; line-height: 1.6;">
                        Kolaborasi lintas komunitas untuk merayakan keberagaman seni dan literasi lokal.
                    </p>
                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f1f5f9; padding-top: 1rem;">
                        <span style="font-size: 0.85rem; color: #94a3b8;">12 September 2025</span>
                        <a href="#" style="font-weight: 600; color: hsl(var(--primary)); font-size: 0.9rem;">Dokumentasi &rarr;</a>
                    </div>
                </div>
            </article>

            <!-- Card 3 -->
            <article style="background: white; border-radius: 1rem; overflow: hidden; border: 1px solid #e2e8f0; transition: transform 0.2s, box-shadow 0.2s;" 
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 30px -5px rgba(0,0,0,0.08)'" 
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                <div style="padding: 2rem;">
                    <div style="margin-bottom: 1rem;">
                        <span style="background: #f0fdf4; color: #15803d; padding: 0.25rem 0.75rem; border-radius: 99px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">Pengumuman</span>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-bottom: 0.75rem; line-height: 1.4;">
                        Lapak Baca Pindah Lokasi Sementara Minggu Ini
                    </h3>
                    <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 1.5rem; line-height: 1.6;">
                        Karena adanya renovasi taman, lapak minggu ini akan bergeser ke area Tugu Malang.
                    </p>
                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f1f5f9; padding-top: 1rem;">
                        <span style="font-size: 0.85rem; color: #94a3b8;">01 November 2025</span>
                        <a href="#" style="font-weight: 600; color: hsl(var(--primary)); font-size: 0.9rem;">Cek Lokasi &rarr;</a>
                    </div>
                </div>
            </article>
        </div>
    </div>
    </div>
</section>
@endsection
