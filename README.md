Selanjutnya saya akan menjelaskan dari sisi Databasenya

## 1. Tabel siswa
Tabel ini merupakan inti dari database, karena menyimpan data pribadi dan identitas lengkap siswa peserta PKL.
Informasi yang disimpan meliputi:

NIS sebagai identitas unik siswa

Nama lengkap siswa

Jenis kelamin

Asal sekolah

Tanggal mulai dan selesai PKL, yang menunjukkan durasi pelaksanaan PKL

Kontak siswa, seperti nomor HP dan alamat rumah

Tabel ini menjadi dasar untuk menghubungkan data presensi, jurnal kegiatan, dan laporan akhir dari setiap siswa.

## 2. Tabel presensi
Tabel ini berfungsi untuk mencatat kehadiran siswa setiap hari selama pelaksanaan PKL.
Setiap entri presensi mencakup:

NIS siswa (untuk mengaitkan dengan data di tabel siswa)

Tanggal kehadiran

Keterangan kehadiran, yang bisa berupa:

Hadir – jika siswa datang

Izin – jika siswa tidak hadir tapi memberi keterangan

Alfa – jika siswa tidak hadir tanpa keterangan

Data ini berguna untuk evaluasi kedisiplinan dan komitmen siswa selama PKL.

## 3. Tabel jurnal
Tabel jurnal digunakan untuk mendokumentasikan kegiatan harian siswa selama mengikuti PKL.
Di setiap harinya, siswa diharapkan mengisi jurnal yang berisi:

Tanggal kegiatan

Uraian kegiatan, yaitu deskripsi atau ringkasan pekerjaan/tugas yang dilakukan

Catatan pembimbing, yaitu komentar, saran, atau evaluasi dari pembimbing terhadap kegiatan siswa

Paraf pembimbing, sebagai bukti validasi bahwa kegiatan tersebut benar dilakukan dan telah dikonfirmasi oleh pembimbing

Tabel ini sangat penting untuk menilai aktivitas harian dan keterlibatan siswa dalam kegiatan industri atau instansi tempat PKL berlangsung.

## 4. Tabel laporan_pkl
Setelah PKL selesai, siswa diwajibkan menyusun laporan dan mengerjakan project yang berkaitan dengan pengalaman mereka.
Tabel laporan_pkl digunakan untuk menyimpan file akhir dari hasil PKL siswa, yang terdiri dari:

File laporan, berupa dokumen yang menjelaskan seluruh kegiatan dan pembelajaran selama PKL

File project, yaitu hasil karya atau tugas akhir yang dikerjakan siswa

Nilai akhir PKL, yaitu hasil penilaian dari pembimbing berdasarkan kehadiran, jurnal, laporan, dan proyek

Tabel ini mencerminkan hasil akhir dari proses PKL dan menjadi dasar evaluasi kinerja siswa secara keseluruhan.

## Alur Integrasi
Android menggunakan Volley/Retrofit untuk mengirim dan menerima data JSON dari PHP.

PHP menerima data (POST/GET), memprosesnya dengan MySQL, lalu mengembalikan JSON response.

Android mengolah data JSON dan menampilkannya di UI.






https://link.chess.com/friend/OgnALZ
