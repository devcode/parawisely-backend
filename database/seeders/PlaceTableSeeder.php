<?php

namespace Database\Seeders;

use App\Models\TravelPlace;
use Illuminate\Database\Seeder;

class PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['type_id' => 4, 'creator_id' => 1, 'island_id' => 1, 'name_place' => 'Taman Mini Indonesia Indah', 'slug' => 'taman-mini-indonesia-indah', 'address' => 'Jl. Taman Mini Indonesia Indah (TMII) Cipayung, Jakarta Timur, DKI Jakarta.', 'provinsi' => 'DKI JAKARTA', 'kabupaten' => 'KOTA JAKARTA TIMUR', 'latitude' => -6.290728723530, 'longitude' => 106.89943006251, 'description' => 'Merupakan salah satu destinasi wisata yang sudah sangat di kenal oleh masyarakat Indonesia pada umumnya. Temat ini sudah ada dan di bangun pada era pemerintahan Presiden kedua Indonesia saat itu. Tempat yang ini banyak memiliki fasilitas yang bisa Anda jumpai dan nikmati nantinya.', 'image' => '1603122747-Taman-Mini-Indonesia-Indah.jpg', 'is_active' => 1],
            ['type_id' => 3, 'creator_id' => 1, 'island_id' => 1, 'name_place' => 'Pantai Ancol', 'slug' => 'pantai-ancol', 'address' => 'Jl. Lodan Raya, Ancol, Pandemangan, Jakarta Utara, DKI Jakarta.', 'provinsi' => 'DKI JAKARTA', 'kabupaten' => 'KOTA JAKARTA UTARA', 'latitude' => -6.117128922895, 'longitude' => 106.85722852911, 'description' => 'Jika Anda ingin menikmati atau mendapatkan suasana pantai ketika berkunjung ke ibu kota negara ini. Anda bisa mengunjungi Pantai Ancol untuk menikmati suasan pantai serta melihat indahnya matahari tenggelam di sore hari. Tidak perlu khawatir ketika Anda menginnginkan makanan atau kudapan yang akan Anda gunakan untuk menemani perjalanan wisata Anda.', 'image' => '1603122875-Pantai-Ancol.jpg', 'is_active' => 1],
            ['type_id' => 6, 'creator_id' => 1, 'island_id' => 1, 'name_place' => 'Sea World Ancol', 'slug' => 'sea-world-ancol', 'address' => 'Jl. Lodan Timur No. 7, RW. 10, Ancol, Kec. Pademangan, Jakarta Utara, DKI Jakarta.', 'provinsi' => 'DKI JAKARTA', 'kabupaten' => 'KOTA JAKARTA UTARA', 'latitude' => -6.128820646202, 'longitude' => 106.83285261358, 'description' => 'Jika Anda ingin melihat dan menikmati pesona indahnya bawah laut namun tidak ingin berbasah-basahan. Anda bisa mengunjungi Sea World Ancol yang secara khusus di bangun di bawah laut. Menggunakan kaca super tebal yang nantinya akan melindungi Anda dari air laut, jadi Anda tidak pelru khawatir tenggelam nantinya.', 'image' => '1603123433-Sea-World-Ancol.jpg', 'is_active' => 1],
            ['type_id' => 3, 'creator_id' => 1, 'island_id' => 1, 'name_place' => 'Kepulauan Seribu', 'slug' => 'kepulauan-seribu', 'address' => 'Kab. Kepulauan Seribu, DKI Jakarta.', 'provinsi' => 'DKI JAKARTA', 'kabupaten' => 'KABUPATEN KEPULAUAN SERIBU', 'latitude' => -5.788164240722, 'longitude' => 106.49842791044, 'description' => 'Daerah ini masih merupakan wilayah dari propinsi Jakarta, akan tetapi letaknya terdapat diluar pulau jawa. Tersusun dari beberapa nama pulau tempat ini di namakan sebagai kepualauan seirbu. Meskipun jumlah dari pulau yang ada di tempat ini kurang dari seribu yah kawan.', 'image' => '1603123476-Kepulauan-Seribu.jpg', 'is_active' => 1],
            ['type_id' => 6, 'creator_id' => 1, 'island_id' => 1, 'name_place' => 'Margasatwa Muara Angke', 'slug' => 'margasatwa-muara-angke', 'address' => 'RT.1/RW.16, Kapuk Muara, Kec. Penjaringan, Jakarta Utara, DKI Jakarta.', 'provinsi' => 'DKI JAKARTA', 'kabupaten' => 'KOTA JAKARTA UTARA', 'latitude' => -6.116232831356, 'longitude' => 106.75697431762, 'description' => 'Tempat ini merupakan salah satu dari beberapa tempat wisata yang masih menjaga kondisininya sejak dahulu. Tempat Wisata di Jakarta ini masih menjaga kondisinya yang masih alami dan terjaga hingga saat ini. Beberapa jenis hewan yang ada pada tempat ini merupakan koleksi hewan langkah terutama hewan yang ada di Indonesia.', 'image' => '1603123618-Margasatwa-Muara-Angke.jpg', 'is_active' => 1],
            ['type_id' => 2, 'creator_id' => 1, 'island_id' => 1, 'name_place' => 'Kota Tua', 'slug' => 'kota-tua', 'address' => 'Mangga Besar, Kec. Taman Sari, Jakarta Barat, DKI Jakarta', 'provinsi' => 'DKI JAKARTA', 'kabupaten' => 'KOTA JAKARTA BARAT', 'latitude' => -6.144565664302, 'longitude' => 106.81825680470, 'description' => 'Hampir setiap kota besar yang ada di Indonesia memiliki cerita serta peninggalannya sendiri. Begitu juga ibu kota Jakarta yang memiliki peninggalan era kolonil pada masa itu. Mengingat pada waktu itu Jakarta menjadi pusat atau ibukota pada masa penjajahan, tempat ini menjadi salah satu peninggalan masa itu.', 'image' => '1603123618-Margasatwa-Muara-Angke.jpg', 'is_active' => 1],
            ['type_id' => 7, 'creator_id' => 1, 'island_id' => 1, 'name_place' => 'Petak Sembilan', 'slug' => 'petak-sembilan', 'address' => 'Jl. Kemenangan No. 40, RT.5/RW.1, Glodok, Kec. Taman Sari, Jakarta Barat, DKI Jakarta', 'provinsi' => 'DKI JAKARTA', 'kabupaten' => 'KOTA JAKARTA BARAT', 'latitude' => -6.144971017701, 'longitude' => 106.81293260660, 'description' => 'Menjadi salah satu kota maju terkAndag ada sisi positif dan negatifnya. Untuk sisi negatifnya Anda terutama pada urusan wisata adalah Anda jarang menemukan wisata dengan tema atau konsep alam. Tetapi untuk posisi positifnya Anda dapat menemukan banyak pusat perbelanjaan dengan aneka barang yang tersedia lengkap.', 'image' => '1603123618-Margasatwa-Muara-Angke.jpg', 'is_active' => 1],
            ['type_id' => 6, 'creator_id' => 1, 'island_id' => 1, 'name_place' => 'Kebun Binatang Ragunan', 'slug' => 'kebun-binatang-ragunan', 'address' => 'Jl. Harsono No. 1, Ragunan, Kec. Pasar Minggu, Jakarta Selatan, DKI Jakarta', 'provinsi' => 'DKI JAKARTA', 'kabupaten' => 'KOTA JAKARTA SELATAN', 'latitude' => -6.312312685487, 'longitude' => 106.81997800113, 'description' => 'Nama dari kebun binatang ini mungkin sudah tidak asing lagi bagi Anda. Mengingat tempat ini merupakan kebun binatang paling lengkap se Indonesia. Ada terdapat banyak jenis spesies yang terdapat pada tempat ini. Khususnya untuk jenis dan spesies dari hewan yang ada di Indoensia.', 'image' => '1603123618-Margasatwa-Muara-Angke.jpg', 'is_active' => 1],
            ['type_id' => 2, 'creator_id' => 1, 'island_id' => 1, 'name_place' => 'Museum Bank Indonesia', 'slug' => 'museum-bank-indonesia', 'address' => 'Jl. Lada 3, RT.3/RW.6, Pinangsia, Kec. Taman Sari, Jakarta Barat, DKI Jakarta', 'provinsi' => 'DKI JAKARTA', 'kabupaten' => 'KOTA JAKARTA BARAT', 'latitude' => -6.137503931877, 'longitude' => 106.81328546661, 'description' => 'Tempat berikutnya yang wajib Anda kunjungi ketika berada di Jakarta adalah Museum Bank Indonesia. Di sini Anda akan banyak mendapatkan informasi seputar sejarah keuangan mata uang dan lain sebagainya yang bersifat perbankan. Semua tersebut tercatat dengan rapi dan baik pada tempat ini.', 'image' => '1603123618-Margasatwa-Muara-Angke.jpg', 'is_active' => 1]
        ];

        TravelPlace::insert($data);
    }
}
