Pembicara 1 – Pembukaan & Fitur Home dan Siswa

Aplikasi ini terdiri dari beberapa fitur utama yang terintegrasi, yaitu: Home, Siswa, Jurnal Harian, Presensi, dan Laporan PKL."

1. Fitur Home
"Halaman Home menampilkan tampilan utama aplikasi, berisi informasi penting seperti deskripsi singkat jurusan, grafik statistik presensi, slider gambar kegiatan, dan menu akses cepat ke fitur lainnya."

"Home juga dirancang menggunakan Material Design dan Lottie Animation, agar tampil menarik dan mudah digunakan oleh siswa."

2. Fitur Siswa
"Fitur Siswa digunakan untuk mengelola data siswa yang mengikuti PKL."

"Setiap siswa memiliki identitas unik berupa NIS (Nomor Induk Siswa) yang digunakan sebagai kunci utama untuk menghubungkan data presensi, jurnal, dan laporan."

"Di fitur ini, admin dapat menambahkan data siswa baru, mengubah data jika ada kesalahan, dan juga menghapus data siswa yang sudah tidak aktif." 

"Dengan struktur ini, aplikasi Jurnal Siswa PKL mampu menyimpan data siswa secara rapi, terintegrasi, dan hanya bisa diakses oleh pengguna yang bersangkutan.
Aplikasi ini tidak hanya memudahkan siswa dalam mencatat kegiatan PKL, tapi juga memudahkan pembimbing dalam melakukan pemantauan dan penilaian secara digital.
Sekian presentasi dari kami, terima kasih. Wassalamualaikum warahmatullahi wabarakatuh."







Pembicara 2 – Fitur Jurnal, Presensi, Laporan, Backend & Penutup

3. Fitur Jurnal Harian
"Fitur ini digunakan oleh siswa untuk mencatat aktivitas harian PKL, seperti pekerjaan yang dilakukan, pelajaran yang diperoleh, dan kendala yang dihadapi."

"Jurnal disimpan berdasarkan NIS siswa, sehingga setiap data hanya dapat dilihat dan dikelola oleh siswa yang bersangkutan."

"Siswa dapat:

Menambah jurnal harian

Mengedit jurnal yang sudah dicatat

Menghapus jurnal jika tidak diperlukan"

4. Fitur Presensi
"Fitur ini memungkinkan siswa untuk mengisi kehadiran harian selama PKL dengan memilih status Hadir, Izin, atau Alfa."

"Sama seperti jurnal, data presensi juga terhubung melalui NIS."

"Siswa dapat melakukan:

Tambah presensi baru

Ubah status presensi

Hapus entri presensi jika salah input"

5. Fitur Laporan PKL
"Laporan PKL dihasilkan secara otomatis dari data jurnal dan presensi yang telah diisi oleh siswa."

"Laporan ini disusun berdasarkan NIS dan hanya menampilkan data milik siswa tersebut."

"Laporan dapat dilihat dan diunduh dalam format PDF untuk keperluan dokumentasi atau penilaian."

6. Backend
"Dari sisi backend, aplikasi ini menggunakan MySQL sebagai database, dan PHP untuk membangun REST API."

"Setiap fitur—baik presensi, jurnal, maupun siswa—terhubung melalui kolom nis sebagai foreign key, agar relasi data tetap konsisten."

"Aplikasi Android terhubung ke server menggunakan Volley, dan data dikirim dalam format JSON."
