<?php

use App\Models\Soal;
use App\Models\User;
use App\Models\Paket;
use App\Models\Jawaban;
use App\Models\Kategori;
use App\Models\Pengaturan;
use App\Models\BaseKategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Buat pengguna
        Pengaturan::factory()->create(['nama' => '<p>AR-RAHMAN</p> <p class="text-sm">PHSYCO & ACADEMIC SCHOOL</p>', 'primary' => '#4e73df', 'judul' => 'Ini Judul', 'subjudul' => 'ini subjudul', 'notelp' => '085648785256', 'email' => 'email@email.com', 'alamat' => 'Jl. In aja dulu', 'deskripsi' => 'ini teks deskripsi']);
        User::factory()->create(['name' => 'Fauzan Imam', 'email' => 'fauzanimam334@gmail.com', 'role' => 1, 'gender' => 0, 'password' => Hash::make('a'), 'email_verified_at' => now(),]);
        User::factory()->create(['name' => 'Ini Guru', 'email' => 'guru@gmail.com', 'role' => 2, 'gender' => 0, 'password' => Hash::make('a'), 'email_verified_at' => now(),]);
        User::factory()->create(['name' => 'Ini Siswa', 'email' => 'siswa@gmail.com', 'role' => 3, 'gender' => 0, 'password' => Hash::make('a'), 'email_verified_at' => now(),]);
        // base
        BaseKategori::factory()->create(['nama' => 'cpns', 'deskripsi' => 'cpns']);
        BaseKategori::factory()->create(['nama' => 'tni/polri-psiko', 'deskripsi' => 'tni/polri-psiko']);
        BaseKategori::factory()->create(['nama' => 'tni/polri-akademik', 'deskripsi' => 'tni/polri-akademik']);
        // Buat kategori
        $kategori_twk = Kategori::factory()->create(['nama' => 'TWK', 'deskripsi' => 'Tes Wawasan Kebangsaan', 'base_id' => 1]);
        $kategori_tiu = Kategori::factory()->create(['nama' => 'TIU', 'deskripsi' => 'Tes Intelegensia Umum', 'base_id' => 1]);
        $kategori_tkp = Kategori::factory()->create(['nama' => 'TKP', 'deskripsi' => 'Tes Karakteristik Pribadi', 'base_id' => 1, 'byPoin' => true]);
        Kategori::factory()->create(['nama' => 'kepri-1', 'deskripsi' => 'kepribadian 1', 'base_id' => 2]);
        Kategori::factory()->create(['nama' => 'kepri-2', 'deskripsi' => 'kepribadian 2', 'base_id' => 2]);
        Kategori::factory()->create(['nama' => 'kecerdasan', 'deskripsi' => 'kecerdasan', 'base_id' => 2]);
        Kategori::factory()->create(['nama' => 'kecermatan', 'deskripsi' => 'kecermatan', 'base_id' => 2]);

        Kategori::factory()->create(['nama' => 'Matematika', 'deskripsi' => 'matematika', 'base_id' => 3]);
        Kategori::factory()->create(['nama' => 'PKN', 'deskripsi' => 'PKN', 'base_id' => 3]);
        Kategori::factory()->create(['nama' => 'B.Inggris', 'deskripsi' => 'B.Inggris', 'base_id' => 3]);
        Kategori::factory()->create(['nama' => 'PU', 'deskripsi' => 'PU', 'base_id' => 3]);
        Kategori::factory()->create(['nama' => 'B.Indonesia', 'deskripsi' => 'B.Indonesia', 'base_id' => 3]);



        // Buat paket soal
        $paket = Paket::factory()->create(['nama' => 'Paket Soal A', 'durasi' => 3600, 'user_id' => 2, 'base_id' => 1, 'status' => 1]);
        $paket2 = Paket::factory()->create(['nama' => 'Paket Soal B', 'durasi' => 2400, 'user_id' => 2, 'base_id' => 1]);
        Paket::factory()->create(['nama' => 'Paket Soal C', 'durasi' => 5, 'user_id' => 2, 'base_id' => 2, 'status' => 1, 'flat' => false]);
        Soal::factory()->create(['uuid' => fake()->uuid(), 'paket_id' => 3, 'kategori_id' => 4, 'soal' => 'asdads']);
        Jawaban::factory()->create(['soal_id' => 1, 'row' => 1, 'jawaban' => 'a', 'benar' => 0, 'poin' => 0]);
        Jawaban::factory()->create(['soal_id' => 1, 'row' => 2, 'jawaban' => 'b', 'benar' => 1, 'poin' => 0]);
        Jawaban::factory()->create(['soal_id' => 1, 'row' => 3, 'jawaban' => 'c', 'benar' => 0, 'poin' => 0]);
        Jawaban::factory()->create(['soal_id' => 1, 'row' => 4, 'jawaban' => 'd', 'benar' => 0, 'poin' => 0]);
        Jawaban::factory()->create(['soal_id' => 1, 'row' => 5, 'jawaban' => 'e', 'benar' => 0, 'poin' => 0]);
        // Soal-soal untuk kategori TIU
        $soal_tiu = [
            ["soal" => "Berapa hasil dari 10 x 10?", "jawaban" => ['100', '90', '110', '120', '80']],
            ["soal" => "Jika X = 5 dan Y = 3, berapa X + Y?", "jawaban" => ['8', '7', '6', '9', '10']],
            ["soal" => "Berapa akar kuadrat dari 49?", "jawaban" => ['7', '6', '8', '9', '5']],
            ["soal" => "Berapa hasil dari 15 + 27?", "jawaban" => ['42', '40', '41', '43', '39']],
            ["soal" => "Apa hasil dari 12 x 6?", "jawaban" => ['72', '60', '66', '70', '68']],
            ["soal" => "Jika P = 12 dan Q = 4, berapa P/Q?", "jawaban" => ['3', '2', '4', '6', '8']],
            ["soal" => "Berapa jumlah sudut pada segitiga?", "jawaban" => ['180 derajat', '360 derajat', '90 derajat', '120 derajat', '270 derajat']],
            ["soal" => "Berapa hasil dari 7 x 8?", "jawaban" => ['56', '48', '54', '64', '60']],
            ["soal" => "Jika A = 4, B = 6, berapa A x B?", "jawaban" => ['24', '20', '22', '26', '28']],
            ["soal" => "Apa hasil dari 30 - 17?", "jawaban" => ['13', '15', '12', '14', '16']],
            ["soal" => "Apa hasil dari 8 + 15?", "jawaban" => ['23', '20', '22', '24', '25']],
            ["soal" => "Berapa jumlah sisi pada segi empat?", "jawaban" => ['4', '3', '5', '6', '8']],
            ["soal" => "Berapa hasil dari 14 + 9?", "jawaban" => ['23', '22', '21', '24', '20']],
            ["soal" => "Apa hasil dari 9 x 5?", "jawaban" => ['45', '40', '35', '50', '55']],
            // ["soal" => "Jika B = 2 dan C = 8, berapa B x C?", "jawaban" => ['16', '12', '14', '18', '20']],
            // ["soal" => "Apa hasil dari 22 - 10?", "jawaban" => ['12', '10', '11', '13', '14']],
            // ["soal" => "Apa hasil dari 17 + 5?", "jawaban" => ['22', '21', '23', '24', '20']],
            ["soal" => "Berapa hasil dari 5 x 12?", "jawaban" => ['60', '50', '55', '65', '70']],
            ["soal" => "Apa hasil dari 4 x 9?", "jawaban" => ['36', '30', '32', '40', '44']],
            ["soal" => "Jika Y = 9 dan Z = 6, berapa Y - Z?", "jawaban" => ['3', '2', '1', '4', '5']],
            ["soal" => "Berapa hasil dari 18 x 2?", "jawaban" => ['36', '34', '32', '30', '38']],
            ["soal" => "Jika M = 25 dan N = 10, berapa M - N?", "jawaban" => ['15', '14', '16', '17', '18']],
            ["soal" => "Berapa akar kuadrat dari 64?", "jawaban" => ['8', '7', '9', '10', '6']],
            ["soal" => "Berapa hasil dari 45 + 35?", "jawaban" => ['80', '70', '75', '85', '90']],
            ["soal" => "Jika V = 9 dan W = 2, berapa V x W?", "jawaban" => ['18', '16', '20', '22', '24']],
            ["soal" => "Berapa jumlah sudut pada persegi panjang?", "jawaban" => ['360 derajat', '180 derajat', '270 derajat', '90 derajat', '120 derajat']],
            ["soal" => "Berapa hasil dari 9 x 9?", "jawaban" => ['81', '72', '90', '78', '84']],
            ["soal" => "Jika S = 7 dan T = 5, berapa S x T?", "jawaban" => ['35', '30', '32', '37', '40']],
            ["soal" => "Apa hasil dari 50 - 29?", "jawaban" => ['21', '22', '20', '23', '24']],
            ["soal" => "Apa hasil dari 16 + 27?", "jawaban" => ['43', '40', '42', '45', '46']],
            ["soal" => "Berapa jumlah sisi pada segitiga sama kaki?", "jawaban" => ['3', '4', '5', '6', '7']],
            ["soal" => "Berapa hasil dari 22 + 17?", "jawaban" => ['39', '38', '37', '40', '41']],
            ["soal" => "Apa hasil dari 7 x 6?", "jawaban" => ['42', '40', '44', '46', '48']],
            ["soal" => "Jika J = 11 dan K = 3, berapa J / K?", "jawaban" => ['3.67', '3.33', '3.50', '3.25', '3.75']],
            ["soal" => "Apa hasil dari 29 - 13?", "jawaban" => ['16', '17', '15', '18', '19']],
            ["soal" => "Apa hasil dari 12 + 9?", "jawaban" => ['21', '20', '22', '23', '24']],
            ["soal" => "Berapa hasil dari 8 x 11?", "jawaban" => ['88', '80', '90', '92', '84']],
            ["soal" => "Apa hasil dari 15 x 4?", "jawaban" => ['60', '50', '55', '65', '70']],
            ["soal" => "Jika L = 24 dan M = 6, berapa L - M?", "jawaban" => ['18', '20', '16', '14', '22']],
            [
                "soal" => "Seorang pedagang memiliki 150 buah apel. Setiap hari, ia menjual 15 apel. Berapa hari yang dibutuhkan untuk menjual semua apel tersebut? Setelah semua apel terjual, ia menggunakan uang hasil penjualan untuk membeli 120 buah jeruk. Jika setiap jeruk berharga Rp1.000, berapa uang yang tersisa setelah pembelian jeruk tersebut? Apakah cukup untuk membeli 30 buah apel lagi dengan harga Rp1.500 per buah?",
                "jawaban" => ['10 hari, Rp30.000 tersisa', '10 hari, Rp25.000 tersisa', '11 hari, Rp30.000 tersisa', '12 hari, Rp28.000 tersisa', '9 hari, Rp20.000 tersisa']
            ],
            [
                "soal" => "Ani memiliki 5 buah buku yang masing-masing berisi 250 halaman. Ia membaca 20 halaman setiap hari. Berapa hari yang dibutuhkan untuk menyelesaikan satu buku? Jika ia ingin menyelesaikan semua buku dalam 50 hari, berapa halaman yang harus dibaca setiap hari? Jika ia memutuskan untuk menambah waktu membaca menjadi 30 halaman per hari, berapa hari yang dibutuhkan untuk menyelesaikan semua buku?",
                "jawaban" => ['12,5 hari, 25 halaman per hari, 41,67 hari', '12,5 hari, 30 halaman per hari, 50 hari', '13 hari, 24 halaman per hari, 40 hari', '15 hari, 20 halaman per hari, 45 hari', '14 hari, 25 halaman per hari, 43 hari']
            ],
            [
                "soal" => "Sebuah mobil menempuh jarak 450 km dengan menghabiskan 30 liter bensin. Berapa konsumsi bahan bakar per kilometer? Jika mobil tersebut memiliki tangki berkapasitas 50 liter, berapa kilometer yang bisa ditempuh dengan tangki penuh? Jika mobil tersebut berencana melakukan perjalanan sejauh 600 km, berapa liter tambahan bensin yang dibutuhkan jika tangki sudah terisi penuh?",
                "jawaban" => ['15 km/liter, 750 km, 10 liter', '14 km/liter, 700 km, 12 liter', '16 km/liter, 800 km, 9 liter', '13 km/liter, 650 km, 11 liter', '17 km/liter, 850 km, 8 liter']
            ],
            [
                "soal" => "Seorang petani memiliki ladang berbentuk persegi panjang dengan panjang 50 meter dan lebar 20 meter. Ia ingin menambah luas ladang dengan membeli sebidang tanah berbentuk persegi dengan panjang sisi 10 meter yang akan digabungkan dengan ladangnya. Berapa luas total ladang setelah penambahan tanah tersebut? Jika ia ingin memagari seluruh ladang dengan pagar, berapa panjang pagar yang dibutuhkan? Jika harga pagar per meter adalah Rp50.000, berapa total biaya yang diperlukan untuk memasang pagar?",
                "jawaban" => ['1.100 m², 160 meter, Rp8.000.000', '1.000 m², 150 meter, Rp7.500.000', '1.200 m², 170 meter, Rp8.500.000', '900 m², 140 meter, Rp7.000.000', '1.050 m², 155 meter, Rp7.750.000']
            ]
        ];

        // Soal-soal untuk kategori TWK
        $soal_twk = [
            ["soal" => "Siapa presiden pertama Indonesia?", "jawaban" => ['Soekarno', 'Suharto', 'BJ Habibie', 'Megawati', 'Jokowi']],
            ["soal" => "Apa semboyan negara Indonesia?", "jawaban" => ['Bhinneka Tunggal Ika', 'Garuda Pancasila', 'Merdeka atau Mati', 'Pancasila', 'Sumpah Pemuda']],
            ["soal" => "Tanggal berapa Indonesia merdeka?", "jawaban" => ['17 Agustus 1945', '1 Juni 1945', '21 April 1945', '10 November 1945', '20 Mei 1945']],
            ["soal" => "Apa nama lagu kebangsaan Indonesia?", "jawaban" => ['Indonesia Raya', 'Garuda Pancasila', 'Tanah Airku', 'Rayuan Pulau Kelapa', 'Bagimu Negeri']],
            ["soal" => "Apa dasar negara Indonesia?", "jawaban" => ['Pancasila', 'UUD 1945', 'Proklamasi', 'Trisakti', 'Sapta Marga']],
            ["soal" => "Apa ibu kota Indonesia?", "jawaban" => ['Jakarta', 'Bandung', 'Surabaya', 'Medan', 'Yogyakarta']],
            ["soal" => "Siapa pahlawan nasional yang berasal dari Aceh?", "jawaban" => ['Cut Nyak Dien', 'Dewi Sartika', 'RA Kartini', 'Ki Hajar Dewantara', 'Teuku Umar']],
            ["soal" => "Apa nama mata uang Indonesia?", "jawaban" => ['Rupiah', 'Ringgit', 'Dolar', 'Baht', 'Yen']],
            ["soal" => "Kapan Sumpah Pemuda diikrarkan?", "jawaban" => ['28 Oktober 1928', '17 Agustus 1945', '1 Juni 1945', '21 April 1908', '10 November 1945']],
            ["soal" => "Siapa yang membacakan teks Proklamasi?", "jawaban" => ['Ir. Soekarno', 'Moh. Hatta', 'Sutan Sjahrir', 'Ahmad Soebardjo', 'Sutan Takdir Alisjahbana']],
            ["soal" => "Apa nama lambang negara Indonesia?", "jawaban" => ['Garuda Pancasila', 'Bendera Merah Putih', 'Burung Elang', 'Burung Rajawali', 'Keris Pusaka']],
            ["soal" => "Apa saja warna bendera Indonesia?", "jawaban" => ['Merah dan Putih', 'Merah dan Kuning', 'Putih dan Hijau', 'Biru dan Putih', 'Merah dan Biru']],
            ["soal" => "Siapa pahlawan nasional dari Sulawesi?", "jawaban" => ['Pangeran Diponegoro', 'Sultan Hasanuddin', 'Cut Nyak Dien', 'Ki Hajar Dewantara', 'RA Kartini']],
            ["soal" => "Apa nama bandara internasional di Jakarta?", "jawaban" => ['Soekarno-Hatta', 'Halim Perdanakusuma', 'Ngurah Rai', 'Juanda', 'Adi Sucipto']],
            ["soal" => "Siapa penulis naskah Sumpah Pemuda?", "jawaban" => ['Muhammad Yamin', 'Soepomo', 'Tan Malaka', 'Ahmad Subarjo', 'Ali Sastroamidjojo']],
            ["soal" => "Apa nama kapal selam pertama Indonesia?", "jawaban" => ['KRI Pasopati', 'KRI Nanggala', 'KRI Dewaruci', 'KRI Dewa Ruci', 'KRI Cakra']],
            ["soal" => "Siapa yang dikenal sebagai 'Bapak Pendidikan Nasional'?", "jawaban" => ['Ki Hajar Dewantara', 'Soekarno', 'Moh. Hatta', 'RA Kartini', 'Dewi Sartika']],
            ["soal" => "Apa nama perjanjian antara Indonesia dan Belanda yang mengakui kedaulatan Indonesia?", "jawaban" => ['Perjanjian Linggarjati', 'Perjanjian Renville', 'Perjanjian Roem-Roijen', 'Perjanjian KMB', 'Perjanjian Bongaya']],
            ["soal" => "Siapa yang dikenal sebagai 'Bapak Pancasila'?", "jawaban" => ['Ir. Soekarno', 'Moh. Hatta', 'Sultan Hamid II', 'Soeharto', 'Sutan Sjahrir']],
            ["soal" => "Kapan Indonesia menjadi anggota PBB?", "jawaban" => ['1950', '1945', '1965', '1955', '1975']]
        ];

        // Soal-soal tambahan untuk kategori TWK
        $soal_twk_tambahan = [
            ["soal" => "Apa nama organisasi pergerakan nasional pertama di Indonesia?", "jawaban" => ['Budi Utomo', 'Sarekat Islam', 'Muhammadiyah', 'PNI', 'Persatuan Indonesia']],
            ["soal" => "Kapan Budi Utomo didirikan?", "jawaban" => ['20 Mei 1908', '17 Agustus 1945', '28 Oktober 1928', '1 Juni 1945', '10 November 1945']],
            ["soal" => "Siapa pendiri Muhammadiyah?", "jawaban" => ['KH Ahmad Dahlan', 'KH Hasyim Asy’ari', 'Soekarno', 'Sutan Sjahrir', 'Moh. Hatta']],
            ["soal" => "Apa tujuan didirikannya Pancasila sebagai dasar negara?", "jawaban" => ['Untuk menjadi pedoman hidup bangsa Indonesia', 'Untuk menjadi ideologi partai', 'Untuk menjadi hukum dasar', 'Untuk menjadi lambang negara', 'Untuk menjadi semboyan negara']],
            ["soal" => "Kapan Pancasila pertama kali diperkenalkan secara resmi?", "jawaban" => ['1 Juni 1945', '17 Agustus 1945', '28 Oktober 1928', '20 Mei 1908', '10 November 1945']],
            ["soal" => "Siapa yang memprakarsai Sumpah Pemuda?", "jawaban" => ['Organisasi Pemuda Indonesia', 'Para pahlawan kemerdekaan', 'Para pendiri bangsa', 'Soekarno dan Hatta', 'Pemuda Asia-Afrika']],
            ["soal" => "Apa makna Bhinneka Tunggal Ika?", "jawaban" => ['Berbeda-beda tetapi tetap satu', 'Bersatu dalam keragaman', 'Kebersamaan dalam perbedaan', 'Kesatuan dalam kebinekaan', 'Keragaman sebagai kekuatan']],
            ["soal" => "Siapa presiden Indonesia yang menjabat setelah Soeharto?", "jawaban" => ['BJ Habibie', 'Megawati Soekarnoputri', 'Abdurrahman Wahid', 'Jokowi', 'Susilo Bambang Yudhoyono']],
            ["soal" => "Apa peran BPUPKI dalam sejarah kemerdekaan Indonesia?", "jawaban" => ['Mempersiapkan kemerdekaan Indonesia', 'Membentuk tentara nasional', 'Menggalang dukungan internasional', 'Menyusun strategi perlawanan', 'Mengusir penjajah dari Indonesia']],
            ["soal" => "Apa peran TNI dalam mempertahankan kemerdekaan Indonesia?", "jawaban" => ['Menjaga kedaulatan dan keamanan negara', 'Membangun ekonomi negara', 'Menyusun konstitusi', 'Mengadakan pemilu pertama', 'Mengembangkan pendidikan nasional']],
            ["soal" => "Apa nama gerakan yang terjadi pada 30 September 1965 di Indonesia?", "jawaban" => ['Gerakan 30 September (G30S/PKI)', 'Reformasi', 'Perang Dingin', 'Konfrontasi Malaysia', 'Pendudukan Jepang']],
            ["soal" => "Siapa yang dikenal sebagai pahlawan revolusi?", "jawaban" => ['Jenderal Ahmad Yani', 'Jenderal Soedirman', 'Cut Nyak Dien', 'Raden Ajeng Kartini', 'Ki Hajar Dewantara']],
            ["soal" => "Apa nama undang-undang dasar yang digunakan di Indonesia?", "jawaban" => ['UUD 1945', 'Konstitusi RIS', 'Piagam Jakarta', 'Pancasila', 'Perjanjian Linggarjati']],
            ["soal" => "Siapa pahlawan nasional dari Kalimantan Selatan yang melawan penjajah Belanda?", "jawaban" => ['Pangeran Antasari', 'Teuku Umar', 'Pattimura', 'Sultan Hasanuddin', 'Diponegoro']],
            ["soal" => "Apa nama perjanjian yang menyatakan berakhirnya perang antara Indonesia dan Belanda?", "jawaban" => ['Perjanjian Roem-Roijen', 'Perjanjian Linggarjati', 'Perjanjian Renville', 'Perjanjian Bongaya', 'Perjanjian Giyanti']],
            ["soal" => "Apa tujuan dari Gerakan Non-Blok yang diikuti oleh Indonesia?", "jawaban" => ['Menjaga netralitas dalam Perang Dingin', 'Menggalang kekuatan melawan imperialisme', 'Mendukung Blok Timur', 'Mendukung Blok Barat', 'Mengadakan kerjasama ekonomi dengan negara lain']],
            ["soal" => "Siapa presiden Indonesia yang memprakarsai KTT Asia-Afrika?", "jawaban" => ['Soekarno', 'Soeharto', 'BJ Habibie', 'Megawati Soekarnoputri', 'Susilo Bambang Yudhoyono']],
            [
                "soal" => "Bagaimana peran Indonesia dalam pembentukan ASEAN? Sebagai negara yang berada di Asia Tenggara, Indonesia memiliki peran strategis dalam pembentukan ASEAN (Association of Southeast Asian Nations). Didirikan pada 8 Agustus 1967 di Bangkok, Indonesia bersama dengan negara-negara lainnya seperti Malaysia, Filipina, Singapura, dan Thailand, menandatangani Deklarasi Bangkok yang menjadi dasar berdirinya ASEAN. Tujuan utama dari ASEAN adalah untuk mempercepat pertumbuhan ekonomi, kemajuan sosial, serta pengembangan budaya di kawasan Asia Tenggara. Selain itu, ASEAN juga bertujuan untuk menjaga perdamaian dan stabilitas regional serta meningkatkan kerja sama di berbagai bidang. Sebagai anggota pendiri, Indonesia terus aktif dalam berbagai inisiatif ASEAN hingga saat ini.",
                "jawaban" => ['Aktif dalam pembentukan dan perkembangan ASEAN', 'Hanya menjadi pengamat di ASEAN', 'Tidak terlibat secara langsung dalam pembentukan ASEAN', 'Menentang pembentukan ASEAN', 'Menjadi anggota setelah ASEAN terbentuk']
            ],
            [
                "soal" => "Jelaskan peran Indonesia dalam dekolonisasi di Afrika dan Asia. Setelah merdeka pada tahun 1945, Indonesia menjadi salah satu negara yang aktif mendukung dekolonisasi di negara-negara Afrika dan Asia. Melalui Konferensi Asia-Afrika yang diadakan di Bandung pada tahun 1955, Indonesia menjadi tuan rumah bagi negara-negara yang sedang berjuang melawan kolonialisme. Konferensi ini menghasilkan 'Dasa Sila Bandung' yang menjadi pedoman bagi negara-negara tersebut untuk memperjuangkan kemerdekaan mereka. Selain itu, Indonesia juga menjadi salah satu pendiri Gerakan Non-Blok yang bertujuan untuk memajukan kepentingan negara-negara berkembang yang baru merdeka.",
                "jawaban" => ['Mendukung dekolonisasi dan kemerdekaan negara-negara Afrika dan Asia', 'Tidak terlibat dalam dekolonisasi', 'Berseberangan dengan negara-negara Afrika dan Asia', 'Mengutamakan hubungan dengan negara Barat', 'Tidak peduli dengan dekolonisasi di Afrika dan Asia']
            ],
            [
                "soal" => "Apa dampak dari Dekrit Presiden 5 Juli 1959? Pada tanggal 5 Juli 1959, Presiden Soekarno mengeluarkan Dekrit Presiden yang berisi keputusan untuk kembali ke UUD 1945 dan membubarkan Konstituante. Dekrit ini dikeluarkan karena Konstituante gagal menyusun undang-undang dasar baru pengganti UUDS 1950. Dampak dari dekrit ini adalah terjadinya perubahan sistem pemerintahan dari sistem parlementer kembali ke sistem presidensial. Selain itu, dekrit ini juga menandai berakhirnya demokrasi liberal dan dimulainya era demokrasi terpimpin di Indonesia di bawah kepemimpinan Soekarno. Dekrit ini menjadi landasan bagi Soekarno untuk memegang kendali yang lebih besar dalam pemerintahan dan mengurangi peran partai politik.",
                "jawaban" => ['Kembali ke UUD 1945 dan memulai era demokrasi terpimpin', 'Memperkuat sistem parlementer', 'Membubarkan lembaga eksekutif', 'Mengganti UUD 1945 dengan UUD baru', 'Menghapuskan demokrasi di Indonesia']
            ]
        ];

        // Gabungkan soal-soal TWK
        $soal_twk = array_merge($soal_twk, $soal_twk_tambahan);


        // Soal-soal untuk kategori TKP
        $soal_tkp = [
            [
                "soal" => "Anda baru saja diangkat menjadi pemimpin tim dalam sebuah proyek besar. Tim Anda terdiri dari individu dengan latar belakang dan keahlian yang sangat beragam. Bagaimana Anda memastikan bahwa setiap anggota tim dapat bekerja sama secara efektif?",
                "jawaban" => [
                    ['Mengawasi setiap anggota tim dengan ketat', 1],
                    ['Menugaskan pekerjaan sesuai keahlian mereka', 2],
                    ['Mengadakan pertemuan untuk mendiskusikan peran dan tanggung jawab', 3],
                    ['Memberikan arahan yang jelas dan terperinci', 4],
                    ['Mendorong kerjasama dan komunikasi terbuka dalam tim', 5]
                ]
            ],
            [
                "soal" => "Dalam suatu proyek, Anda menemukan bahwa beberapa anggota tim sering berkonflik karena perbedaan pendapat. Konflik ini mulai mempengaruhi produktivitas tim secara keseluruhan. Bagaimana Anda menangani situasi ini?",
                "jawaban" => [
                    ['Membiarkan mereka menyelesaikan konflik sendiri', 1],
                    ['Menengahi konflik dengan mendengarkan kedua belah pihak', 2],
                    ['Mengajak mereka berdiskusi untuk menemukan solusi bersama', 3],
                    ['Meminta salah satu pihak untuk mengalah demi kelancaran proyek', 4],
                    ['Mendorong kerjasama dengan mengedepankan tujuan bersama', 5]
                ]
            ],
            [
                "soal" => "Anda sedang mengelola tim dengan proyek yang sangat kompleks. Salah satu anggota tim merasa kesulitan memahami tugas yang diberikan, dan ini mempengaruhi kemajuan proyek. Apa yang akan Anda lakukan untuk membantu anggota tim tersebut?",
                "jawaban" => [
                    ['Menyarankan dia untuk mencari bantuan dari anggota tim lain', 1],
                    ['Mengabaikan masalah dan berharap dia akan menemukan solusinya sendiri', 2],
                    ['Memberikan waktu tambahan untuk menyelesaikan tugasnya', 3],
                    ['Mendiskusikan kesulitannya dan menawarkan bantuan secara langsung', 4],
                    ['Memberikan pelatihan atau bimbingan yang dibutuhkan', 5]
                ]
            ],
            [
                "soal" => "Anda bekerja dalam sebuah tim proyek yang sangat kompetitif, dan setiap anggota tim harus memberikan kontribusi maksimal. Namun, salah satu anggota tim sering kali tidak menunjukkan performa yang diharapkan dan cenderung bergantung pada anggota lain. Bagaimana Anda menangani situasi ini?",
                "jawaban" => [
                    ['Membiarkan anggota tim lain menutupi kekurangannya', 1],
                    ['Menyarankan dia untuk lebih bertanggung jawab', 2],
                    ['Memberikan teguran dan memperingatkan tentang konsekuensinya', 3],
                    ['Mendiskusikan masalah ini dengan anggota tim tersebut', 4],
                    ['Membantu dia meningkatkan kinerja dengan bimbingan', 5]
                ]
            ],
            ["soal" => "Bagaimana cara menghadapi konflik dalam tim kerja?", "jawaban" => [
                [
                    'Menunda hingga tenang',
                    1
                ],
                ['Mencari bantuan mediator', 2],
                ['Mendengarkan keluhan anggota', 3],
                ['Mencari solusi bersama', 4],
                ['Mengajak diskusi terbuka', 5]
            ]],
            ["soal" => "Bagaimana cara mengatur waktu yang efektif?", "jawaban" => [
                ['Beristirahat secara teratur', 1],
                ['Mengatur prioritas', 2],
                [
                    'Menghindari penundaan',
                    3
                ],
                ['Menyelesaikan tugas penting terlebih dahulu', 4],
                [
                    'Membuat jadwal harian',
                    5
                ]
            ]],
            ["soal" => "Bagaimana cara meningkatkan motivasi kerja?", "jawaban" => [
                ['Berpikir positif', 1],
                ['Meningkatkan keterampilan', 2],
                ['Mencari inspirasi dari orang lain', 3],
                ['Menghargai setiap pencapaian', 4],
                ['Menetapkan tujuan yang jelas', 5]
            ]],
            ["soal" => "Bagaimana cara menyelesaikan tugas dengan baik?", "jawaban" => [
                ['Menghindari gangguan', 1],
                ['Fokus pada tugas', 2],
                ['Mengatur waktu dengan baik', 3],
                ['Menyusun rencana kerja', 4],
                ['Memahami instruksi dengan jelas', 5]
            ]],
            ["soal" => "Bagaimana cara menghadapi kritik dari atasan?", "jawaban" => [
                ['Mengambil pelajaran dari kritik', 1],
                ['Mencari solusi yang tepat', 2],
                ['Berdiskusi untuk memahami lebih baik', 3],
                [
                    'Memperbaiki kesalahan',
                    4
                ],
                ['Menerima dengan lapang dada', 5]
            ]],
            ["soal" => "Bagaimana cara menjaga keseimbangan antara kerja dan kehidupan pribadi?", "jawaban" => [
                ['Menjaga hobi dan aktivitas yang menyenangkan', 1],
                ['Mengelola stres dengan baik', 2],
                ['Menghindari membawa pekerjaan ke rumah', 3],
                ['Menghargai waktu untuk keluarga', 4],
                ['Mengatur waktu kerja dan istirahat', 5]
            ]],
            ["soal" => "Bagaimana cara meningkatkan kolaborasi dalam tim?", "jawaban" => [
                ['Menyelesaikan konflik dengan cepat', 1],
                ['Menjalin komunikasi yang baik', 2],
                ['Membagi tugas secara adil', 3],
                ['Menghargai pendapat semua anggota', 4],
                ['Mengajak anggota berdiskusi', 5]
            ]],
            ["soal" => "Bagaimana cara mengelola stres saat bekerja?", "jawaban" => [
                ['Melakukan aktivitas yang menyenangkan di luar kerja', 1],
                ['Menghindari terlalu banyak beban kerja', 2],
                ['Berbicara dengan rekan kerja', 3],
                ['Mengambil istirahat ketika diperlukan', 4],
                ['Mengatur waktu dengan baik', 5]
            ]],
            ["soal" => "Bagaimana cara meningkatkan kualitas hasil kerja?", "jawaban" => [
                ['Meminta umpan balik', 1],
                ['Mengikuti standar yang ditetapkan', 2],
                ['Fokus pada detail', 3],
                ['Menyusun rencana yang baik', 4],
                ['Memahami tugas dengan jelas', 5]
            ]],
            ["soal" => "Bagaimana cara mengatasi kesulitan dalam belajar?", "jawaban" => [
                ['Mengatur waktu belajar', 1],
                ['Berlatih soal-soal', 2],
                [
                    'Mencatat poin penting',
                    3
                ],
                ['Membaca ulang materi', 4],
                ['Mencari bantuan dari orang lain', 5]
            ]],
            [
                "soal" => "Anda baru saja dipromosikan sebagai pemimpin proyek di tempat kerja Anda. Tim yang Anda pimpin terdiri dari anggota yang memiliki latar belakang dan keahlian yang berbeda-beda. Anda harus memastikan bahwa proyek berjalan sesuai rencana dan selesai tepat waktu. Namun, setelah beberapa minggu, Anda menyadari bahwa komunikasi antar anggota tim tidak berjalan dengan lancar dan beberapa anggota tim merasa kurang terlibat. Apa yang akan Anda lakukan untuk meningkatkan kerja sama tim dan memastikan proyek berjalan lancar?",
                "jawaban" => [
                    ['Mengawasi pekerjaan setiap anggota secara ketat', 1],
                    ['Memberikan motivasi kepada anggota yang kurang aktif', 2],
                    ['Membagi tugas sesuai keahlian masing-masing', 3],
                    ['Mendengarkan masukan dari setiap anggota tim', 4],
                    ['Mengadakan pertemuan rutin untuk membahas kemajuan dan masalah', 5]
                ]
            ],
            [
                "soal" => "Anda bekerja di sebuah perusahaan yang sedang mengalami perubahan besar dalam sistem operasional. Perubahan ini mengharuskan semua karyawan untuk belajar dan beradaptasi dengan teknologi baru yang diterapkan oleh perusahaan. Sebagian besar karyawan merasa khawatir dan terbebani dengan perubahan ini, terutama karena merasa kurang memahami teknologi tersebut. Sebagai karyawan yang cukup berpengalaman dalam bidang teknologi, apa langkah yang akan Anda ambil untuk membantu rekan kerja Anda beradaptasi dengan perubahan ini?",
                "jawaban" => [
                    ['Mengusulkan agar perusahaan menyediakan panduan tertulis', 1],
                    ['Memberikan tips dan trik penggunaan teknologi baru melalui email', 2],
                    ['Mengajak rekan kerja untuk belajar bersama-sama', 3],
                    ['Menawarkan bantuan secara individual kepada rekan kerja yang kesulitan', 4],
                    ['Menyelenggarakan sesi pelatihan untuk membantu rekan kerja memahami teknologi baru', 5]
                ]
            ],
            [
                "soal" => "Anda sedang mengerjakan tugas yang sangat penting dengan batas waktu yang sangat ketat. Tiba-tiba, komputer Anda mengalami masalah teknis yang membuat Anda tidak bisa melanjutkan pekerjaan. Anda mencoba untuk memperbaikinya sendiri, tetapi tidak berhasil. Tim IT sedang sibuk dan tidak bisa segera membantu Anda. Bagaimana Anda mengatasi situasi ini agar tugas tetap bisa diselesaikan tepat waktu?",
                "jawaban" => [
                    ['Menunggu hingga tim IT tersedia untuk membantu', 1],
                    ['Mencoba memperbaiki masalah komputer sendiri lagi', 2],
                    ['Menghubungi tim IT dan meminta prioritas bantuan', 3],
                    ['Menggunakan perangkat lain seperti tablet atau smartphone untuk sementara', 4],
                    ['Meminjam komputer dari rekan kerja dan melanjutkan pekerjaan', 5]
                ]
            ],
            [
                "soal" => "Anda bekerja di sebuah perusahaan yang menuntut kualitas hasil kerja yang tinggi. Suatu hari, atasan Anda meminta Anda untuk mengevaluasi laporan yang dibuat oleh rekan kerja Anda. Setelah meninjau laporan tersebut, Anda menemukan beberapa kesalahan dan ketidaksesuaian dengan standar yang ditetapkan. Rekan kerja Anda adalah seorang yang sangat sensitif terhadap kritik. Apa yang akan Anda lakukan untuk memastikan bahwa laporan tersebut diperbaiki tanpa menimbulkan masalah dengan rekan kerja Anda?",
                "jawaban" => [
                    ['Melaporkan kesalahan tersebut kepada atasan', 1],
                    ['Menghindari konfrontasi dan membiarkan laporan apa adanya', 2],
                    ['Mengoreksi kesalahan tanpa memberitahu rekan kerja', 3],
                    ['Memberikan saran perbaikan secara pribadi', 4],
                    ['Membicarakan kesalahan dengan cara yang sopan dan konstruktif', 5]
                ]
            ],
            [
                "soal" => "Anda bekerja sebagai manajer di sebuah perusahaan dan Anda harus mengelola tim yang terdiri dari individu dengan kepribadian yang sangat berbeda. Salah satu anggota tim Anda sangat dominan dan seringkali mengabaikan pendapat anggota tim lainnya. Hal ini membuat anggota tim lainnya merasa tidak dihargai dan enggan untuk berbicara dalam rapat. Bagaimana cara Anda menangani situasi ini agar setiap anggota tim merasa dihargai dan dapat berkontribusi secara maksimal?",
                "jawaban" => [
                    ['Membiarkan situasi berjalan apa adanya', 1],
                    ['Mendiskusikan masalah ini dengan seluruh tim secara terbuka', 2],
                    ['Mengadakan pertemuan individu dengan anggota tim yang dominan', 3],
                    ['Menyediakan forum diskusi di mana setiap anggota bisa menyampaikan pendapatnya', 4],
                    ['Membuat aturan rapat yang memberikan kesempatan berbicara secara adil bagi setiap anggota', 5]
                ]
            ],
            [
                "soal" => "Anda bekerja di sebuah tim yang ditugaskan untuk menyelesaikan proyek dengan tenggat waktu yang sangat ketat. Selama proses pengerjaan proyek, salah satu anggota tim Anda sering kali terlambat menyelesaikan tugas yang diberikan kepadanya, sehingga menghambat kemajuan tim secara keseluruhan. Anda merasa bahwa jika situasi ini terus berlanjut, tim Anda tidak akan mampu menyelesaikan proyek tepat waktu. Apa yang akan Anda lakukan untuk mengatasi masalah ini?",
                "jawaban" => [
                    ['Mengabaikan masalah dan berharap dia akan memperbaiki diri', 1],
                    ['Menyelesaikan tugas yang tertunda sendiri', 2],
                    ['Menginformasikan masalah ini kepada atasan', 3],
                    ['Berbicara secara pribadi dengan anggota tim tersebut', 4],
                    ['Mengajak seluruh tim untuk berdiskusi tentang cara memperbaiki kinerja', 5]
                ]
            ]
        ];



        // Buat soal dan jawaban untuk kategori TIU
        foreach ($soal_tiu as $index => $data) {
            $soal = Soal::factory()->create([
                'paket_id' => $paket->id,
                'kategori_id' => $kategori_tiu->id,
                'soal' => $data['soal']
            ]);

            foreach ($data['jawaban'] as $key => $jawaban) {
                Jawaban::factory()->create([
                    'soal_id' => $soal->id,
                    'row' => $key + 1,
                    'jawaban' => $jawaban,
                    'benar' => $key == 0 // Jawaban pertama benar
                ]);
            }
        }

        // Buat soal dan jawaban untuk kategori TWK
        foreach ($soal_twk as $index => $data) {
            $soal = Soal::factory()->create([
                'paket_id' => $paket->id,
                'kategori_id' => $kategori_twk->id,
                'soal' => $data['soal']
            ]);

            foreach ($data['jawaban'] as $key => $jawaban) {
                Jawaban::factory()->create([
                    'soal_id' => $soal->id,
                    'row' => $key + 1,
                    'jawaban' => $jawaban,
                    'benar' => $key == 0 // Jawaban pertama benar
                ]);
            }
        }

        // Buat soal dan jawaban untuk kategori TKP
        foreach ($soal_tkp as $index => $data) {
            $soal = Soal::factory()->create([
                'paket_id' => $paket->id,
                'kategori_id' => $kategori_tkp->id,
                'soal' => $data['soal']
            ]);

            foreach ($data['jawaban'] as $key => $jawaban) {
                Jawaban::factory()->create([
                    'soal_id' => $soal->id,
                    'row' => $key + 1,
                    'jawaban' => $jawaban[0], // Jawaban teks
                    'benar' => true,
                    'poin' => $jawaban[1] // Poin jawaban
                ]);
            }
        }

        // paket b
        // Buat soal dan jawaban untuk kategori TIU
        foreach ($soal_tiu as $index => $data) {
            $soal = Soal::factory()->create([
                'paket_id' => $paket2->id,
                'kategori_id' => $kategori_tiu->id,
                'soal' => $data['soal']
            ]);

            foreach ($data['jawaban'] as $key => $jawaban) {
                Jawaban::factory()->create([
                    'soal_id' => $soal->id,
                    'row' => $key + 1,
                    'jawaban' => $jawaban,
                    'benar' => $key == 0 // Jawaban pertama benar
                ]);
            }
        }

        // Buat soal dan jawaban untuk kategori TWK
        foreach ($soal_twk as $index => $data) {
            $soal = Soal::factory()->create([
                'paket_id' => $paket2->id,
                'kategori_id' => $kategori_twk->id,
                'soal' => $data['soal']
            ]);

            foreach ($data['jawaban'] as $key => $jawaban) {
                Jawaban::factory()->create([
                    'soal_id' => $soal->id,
                    'row' => $key + 1,
                    'jawaban' => $jawaban,
                    'benar' => $key == 0 // Jawaban pertama benar
                ]);
            }
        }

        // Buat soal dan jawaban untuk kategori TKP
        foreach ($soal_tkp as $index => $data) {
            $soal = Soal::factory()->create([
                'paket_id' => $paket2->id,
                'kategori_id' => $kategori_tkp->id,
                'soal' => $data['soal']
            ]);

            foreach ($data['jawaban'] as $key => $jawaban) {
                Jawaban::factory()->create([
                    'soal_id' => $soal->id,
                    'row' => $key + 1,
                    'jawaban' => $jawaban[0], // Jawaban teks
                    'benar' => true,
                    'poin' => $jawaban[1] // Poin jawaban
                ]);
            }
        }
    }
}
