@extends('layouts.modern_landing')

@section('title', 'Struktur Komunitas | Duduk Baca')

@section('content')
<section style="padding: 6rem 1rem;">
    <div style="max-width: 1200px; margin: 0 auto;">
        
        <div style="text-align: center; margin-bottom: 5rem;">
            <h2 style="font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 1rem;">Struktur Komunitas</h2>
            <p style="color: #64748b; font-size: 1.1rem;">Orang-orang di balik layar yang menggerakkan roda literasi Duduk Baca.</p>
        </div>

        <!-- Founders -->
        <div style="margin-bottom: 5rem;">
            <h3 style="font-size: 1.5rem; font-weight: 700; color: hsl(var(--primary)); margin-bottom: 2rem; padding-bottom: 0.5rem; border-bottom: 1px solid #e2e8f0; display: inline-block;">
                Founder
            </h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 2rem;">
                <!-- F1 -->
                <div style="background: white; padding: 2rem; border-radius: 1rem; border: 1px solid #e2e8f0; text-align: center; transition: 0.2s;" onmouseover="this.style.boxShadow='0 10px 20px -5px rgba(0,0,0,0.05)'" onmouseout="this.style.boxShadow='none'">
                    <img src="https://placehold.co/150x150/14b8a6/ffffff?text=F1" alt="Founder 1" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin-bottom: 1rem; border: 4px solid #f0f9ff;">
                    <h4 style="font-weight: 700; color: #0f172a; font-size: 1.1rem;">Founder 1</h4>
                    <span style="display: block; font-size: 0.85rem; color: hsl(var(--primary)); font-weight: 600; margin-top: 0.25rem;">Visioner</span>
                </div>
                 <!-- F2 -->
                <div style="background: white; padding: 2rem; border-radius: 1rem; border: 1px solid #e2e8f0; text-align: center; transition: 0.2s;" onmouseover="this.style.boxShadow='0 10px 20px -5px rgba(0,0,0,0.05)'" onmouseout="this.style.boxShadow='none'">
                    <img src="https://placehold.co/150x150/14b8a6/ffffff?text=F2" alt="Founder 2" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin-bottom: 1rem; border: 4px solid #f0f9ff;">
                    <h4 style="font-weight: 700; color: #0f172a; font-size: 1.1rem;">Founder 2</h4>
                    <span style="display: block; font-size: 0.85rem; color: hsl(var(--primary)); font-weight: 600; margin-top: 0.25rem;">Strategis</span>
                </div>
                 <!-- F3 -->
                <div style="background: white; padding: 2rem; border-radius: 1rem; border: 1px solid #e2e8f0; text-align: center; transition: 0.2s;" onmouseover="this.style.boxShadow='0 10px 20px -5px rgba(0,0,0,0.05)'" onmouseout="this.style.boxShadow='none'">
                    <img src="https://placehold.co/150x150/14b8a6/ffffff?text=F3" alt="Founder 3" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin-bottom: 1rem; border: 4px solid #f0f9ff;">
                    <h4 style="font-weight: 700; color: #0f172a; font-size: 1.1rem;">Founder 3</h4>
                    <span style="display: block; font-size: 0.85rem; color: hsl(var(--primary)); font-weight: 600; margin-top: 0.25rem;">Kreatif</span>
                </div>
                 <!-- F4 -->
                <div style="background: white; padding: 2rem; border-radius: 1rem; border: 1px solid #e2e8f0; text-align: center; transition: 0.2s;" onmouseover="this.style.boxShadow='0 10px 20px -5px rgba(0,0,0,0.05)'" onmouseout="this.style.boxShadow='none'">
                    <img src="https://placehold.co/150x150/14b8a6/ffffff?text=F4" alt="Founder 4" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin-bottom: 1rem; border: 4px solid #f0f9ff;">
                    <h4 style="font-weight: 700; color: #0f172a; font-size: 1.1rem;">Founder 4</h4>
                    <span style="display: block; font-size: 0.85rem; color: hsl(var(--primary)); font-weight: 600; margin-top: 0.25rem;">Teknis</span>
                </div>
            </div>
        </div>

        <!-- Core Team -->
        <div style="margin-bottom: 5rem;">
            <h3 style="font-size: 1.5rem; font-weight: 700; color: hsl(var(--primary)); margin-bottom: 2rem; padding-bottom: 0.5rem; border-bottom: 1px solid #e2e8f0; display: inline-block;">
                Anggota Inti
            </h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 2rem;">
                <div style="background: white; padding: 2rem; border-radius: 1rem; border: 1px solid #e2e8f0; text-align: center; position: relative; overflow: hidden;">
                    <div style="width: 100%; height: 5px; background: hsl(var(--accent)); position: absolute; top: 0; left: 0;"></div>
                    <img src="https://placehold.co/150x150/3b82f6/ffffff?text=KETUA" alt="Ketua" style="width: 80px; height: 80px; border-radius: 50%; margin-bottom: 1rem;">
                    <h4 style="font-weight: 700; color: #0f172a;">Nama Ketua</h4>
                    <span style="font-size: 0.85rem; color: #64748b;">Ketua Umum</span>
                </div>
                <div style="background: white; padding: 2rem; border-radius: 1rem; border: 1px solid #e2e8f0; text-align: center; position: relative; overflow: hidden;">
                     <div style="width: 100%; height: 5px; background: hsl(var(--accent)); position: absolute; top: 0; left: 0;"></div>
                    <img src="https://placehold.co/150x150/3b82f6/ffffff?text=WAKIL" alt="Wakil" style="width: 80px; height: 80px; border-radius: 50%; margin-bottom: 1rem;">
                    <h4 style="font-weight: 700; color: #0f172a;">Nama Wakil</h4>
                    <span style="font-size: 0.85rem; color: #64748b;">Wakil Ketua</span>
                </div>
                <div style="background: white; padding: 2rem; border-radius: 1rem; border: 1px solid #e2e8f0; text-align: center; position: relative; overflow: hidden;">
                     <div style="width: 100%; height: 5px; background: hsl(var(--accent)); position: absolute; top: 0; left: 0;"></div>
                    <img src="https://placehold.co/150x150/3b82f6/ffffff?text=SEKRE" alt="Sekretaris" style="width: 80px; height: 80px; border-radius: 50%; margin-bottom: 1rem;">
                    <h4 style="font-weight: 700; color: #0f172a;">Nama Sekretaris</h4>
                    <span style="font-size: 0.85rem; color: #64748b;">Sekretaris</span>
                </div>
                <div style="background: white; padding: 2rem; border-radius: 1rem; border: 1px solid #e2e8f0; text-align: center; position: relative; overflow: hidden;">
                     <div style="width: 100%; height: 5px; background: hsl(var(--accent)); position: absolute; top: 0; left: 0;"></div>
                    <img src="https://placehold.co/150x150/3b82f6/ffffff?text=BEND" alt="Bendahara" style="width: 80px; height: 80px; border-radius: 50%; margin-bottom: 1rem;">
                    <h4 style="font-weight: 700; color: #0f172a;">Nama Bendahara</h4>
                    <span style="font-size: 0.85rem; color: #64748b;">Bendahara</span>
                </div>
            </div>
        </div>

        <!-- Divisions -->
        <div>
            <h3 style="font-size: 1.5rem; font-weight: 700; color: hsl(var(--primary)); margin-bottom: 2rem; padding-bottom: 0.5rem; border-bottom: 1px solid #e2e8f0; display: inline-block;">
                Divisi Komunitas
            </h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1.5rem;">
                
                <!-- Div Card -->
                <div style="background: white; padding: 1.5rem; border-radius: 1rem; border: 1px solid #e2e8f0; display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 50px; height: 50px; background: #f0f9ff; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #0284c7; flex-shrink: 0;">
                         <!-- Icon Placeholder -->
                        <span style="font-size: 1.5rem;">📅</span>
                    </div>
                    <div>
                        <h4 style="font-size: 1rem; font-weight: 700; color: #0f172a;">Event & Collab</h4>
                        <p style="font-size: 0.8rem; color: #64748b;">Koordinator & Wakil</p>
                    </div>
                </div>

                 <div style="background: white; padding: 1.5rem; border-radius: 1rem; border: 1px solid #e2e8f0; display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 50px; height: 50px; background: #f0f9ff; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #0284c7; flex-shrink: 0;">
                        <span style="font-size: 1.5rem;">🎥</span>
                    </div>
                    <div>
                        <h4 style="font-size: 1rem; font-weight: 700; color: #0f172a;">Content Creator</h4>
                        <p style="font-size: 0.8rem; color: #64748b;">Koordinator & Wakil</p>
                    </div>
                </div>

                 <div style="background: white; padding: 1.5rem; border-radius: 1rem; border: 1px solid #e2e8f0; display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 50px; height: 50px; background: #f0f9ff; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #0284c7; flex-shrink: 0;">
                        <span style="font-size: 1.5rem;">⚙️</span>
                    </div>
                    <div>
                        <h4 style="font-size: 1rem; font-weight: 700; color: #0f172a;">Internal</h4>
                        <p style="font-size: 0.8rem; color: #64748b;">Koordinator & Wakil</p>
                    </div>
                </div>

                 <div style="background: white; padding: 1.5rem; border-radius: 1rem; border: 1px solid #e2e8f0; display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 50px; height: 50px; background: #f0f9ff; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #0284c7; flex-shrink: 0;">
                        <span style="font-size: 1.5rem;">📱</span>
                    </div>
                    <div>
                        <h4 style="font-size: 1rem; font-weight: 700; color: #0f172a;">Social Media</h4>
                        <p style="font-size: 0.8rem; color: #64748b;">Koordinator & Wakil</p>
                    </div>
                </div>

                 <div style="background: white; padding: 1.5rem; border-radius: 1rem; border: 1px solid #e2e8f0; display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 50px; height: 50px; background: #f0f9ff; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #0284c7; flex-shrink: 0;">
                        <span style="font-size: 1.5rem;">💳</span>
                    </div>
                    <div>
                        <h4 style="font-size: 1rem; font-weight: 700; color: #0f172a;">Finance & Mark.</h4>
                        <p style="font-size: 0.8rem; color: #64748b;">Koordinator & Wakil</p>
                    </div>
                </div>

                 <div style="background: white; padding: 1.5rem; border-radius: 1rem; border: 1px solid #e2e8f0; display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 50px; height: 50px; background: #f0f9ff; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #0284c7; flex-shrink: 0;">
                        <span style="font-size: 1.5rem;">📚</span>
                    </div>
                    <div>
                        <h4 style="font-size: 1rem; font-weight: 700; color: #0f172a;">Admin Buku</h4>
                        <p style="font-size: 0.8rem; color: #64748b;">Koordinator & Wakil</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
        </div>
    </div>
</section>
@endsection
