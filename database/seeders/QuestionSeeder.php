<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Kosongkan tabel terlebih dahulu untuk menghindari duplikasi
        Question::truncate();

        // Bank Soal Lengkap dengan Petunjuk Gambar
        $bankSoal = [
            // Kategori: Makanan Khas
            // Image: gudeg.jpg
            [
                'category' => 'Makanan Khas',
                'question_text' => 'Makanan khas dari Yogyakarta yang terbuat dari nangka muda dan dimasak dengan santan adalah...',
                'correct_answer' => 'Gudeg',
                'options' => json_encode(['Gudeg', 'Rawon', 'Karedok', 'Opor Ayam', 'Sate Klathak']),
                'clue' => 'Sering disebut juga sebagai "nangka manis".',
                'image_path' => 'gudeg.jpeg',
                'description' => 'Gudeg adalah makanan khas Yogyakarta yang terbuat dari nangka muda yang dimasak dengan santan dan berbagai rempah-rempah. Gudeg memiliki rasa manis dan biasanya disajikan dengan nasi, ayam kampung, telur, tahu, tempe, dan sambal krecek.'
            ],
            // Image: rendang.jpg
            [
                'category' => 'Makanan Khas',
                'question_text' => 'Hidangan daging sapi yang dimasak dalam waktu lama dengan rempah-rempah hingga kering dan menjadi ikon kuliner dari Padang adalah...',
                'correct_answer' => 'Rendang',
                'options' => json_encode(['Rendang', 'Gulai', 'Semur', 'Dendeng Balado', 'Asam Padeh']),
                'clue' => 'Pernah dinobatkan sebagai makanan terlezat di dunia.',
                'image_path' => 'rendang.jpeg',
                'description' => 'Rendang adalah masakan daging sapi khas Minangkabau yang dimasak dengan santan dan campuran rempah-rempah khas Indonesia. Proses memasaknya lama hingga kuahnya mengering dan bumbunya meresap sempurna ke dalam daging.'
            ],
            // Image: rawon.jpg
            [
                'category' => 'Makanan Khas',
                'question_text' => "Makanan berkuah hitam dari Jawa Timur yang menggunakan 'kluwek' sebagai bumbu utamanya adalah...",
                'correct_answer' => 'Rawon',
                'options' => json_encode(['Rawon', 'Soto', 'Sop Buntut', 'Soto Betawi', 'Brongkos']),
                'clue' => 'Warnanya yang gelap menjadi ciri khas utamanya.',
                'image_path' => 'rawon.jpeg',
                'description' => 'Rawon adalah sup daging sapi khas Jawa Timur yang berwarna hitam pekat karena menggunakan kluwek sebagai bumbu utama. Rawon biasanya disajikan dengan nasi, tauge, telur asin, dan sambal.'
            ],
            // Image: pempek.jpg
            [
                'category' => 'Makanan Khas',
                'question_text' => 'Makanan khas Palembang yang terbuat dari ikan dan sagu, biasanya disajikan dengan kuah cuka yang pedas adalah...',
                'correct_answer' => 'Pempek',
                'options' => json_encode(['Pempek', 'Otak-otak', 'Siomay', 'Tekwan', 'Laksan']),
                'clue' => 'Sering dimakan bersama mi kuning dan potongan timun.',
                'image_path' => 'pempek.jpeg',
                'description' => 'Pempek adalah makanan khas Palembang yang terbuat dari daging ikan yang digiling halus dan dicampur dengan tepung sagu. Pempek disajikan dengan kuah cuka yang asam, manis, dan pedas, serta pelengkap seperti mi kuning dan timun.'
            ],
            // Image: sate_ayam.jpg
            [
                'category' => 'Makanan Khas',
                'question_text' => 'Sate yang terkenal dari Madura biasanya terbuat dari daging...',
                'correct_answer' => 'Ayam',
                'options' => json_encode(['Ayam', 'Kambing', 'Sapi', 'Sate Lilit', 'Sate Maranggi']),
                'clue' => 'Disajikan dengan bumbu kacang yang kental dan lontong.',
                'image_path' => 'sate_ayam.jpeg',
                'description' => 'Sate ayam Madura adalah sate khas dari Madura yang menggunakan daging ayam yang dipotong kecil-kecil, ditusuk, dan dibakar. Sate ini disajikan dengan bumbu kacang yang kental, kecap manis, dan lontong.'
            ],
            // Image: nasi_bakar.jpg
            [
                'category' => 'Makanan Khas',
                'question_text' => 'Nasi yang dibungkus daun pisang lalu dibakar, dan merupakan makanan khas Sunda adalah...',
                'correct_answer' => 'Nasi Bakar',
                'options' => json_encode(['Nasi Bakar', 'Nasi Uduk', 'Nasi Kuning', 'Nasi Liwet', 'Nasi Timbel']),
                'clue' => 'Aroma daun pisang yang terbakar sangat kuat.',
                'image_path' => 'nasi_bakar.jpeg',
                'description' => 'Nasi bakar adalah nasi yang dibumbui dan dicampur dengan lauk seperti ayam, ikan, atau teri, kemudian dibungkus daun pisang dan dibakar. Proses pembakaran memberikan aroma khas daun pisang yang harum.'
            ],
            // Image: mie_aceh.jpg
            [
                'category' => 'Makanan Khas',
                'question_text' => 'Hidangan mie dari Aceh yang disajikan dengan kuah kari yang kental dan pedas adalah...',
                'correct_answer' => 'Mie Aceh',
                'options' => json_encode(['Mie Aceh', 'Mie Jawa', 'Mie Kocok', 'Mie Gomak', 'Mie Celor']),
                'clue' => 'Bisa disajikan goreng, tumis, atau dengan kuah.',
                'image_path' => 'mie_aceh.jpeg',
                'description' => 'Mie Aceh adalah mie kuning tebal khas Aceh yang disajikan dengan kuah kari pedas dan kental, biasanya berisi daging sapi, kambing, atau seafood. Mie Aceh dapat disajikan goreng, tumis, atau berkuah.'
            ],
            // Image: kerak_telor.jpg
            [
                'category' => 'Makanan Khas',
                'question_text' => 'Makanan khas Betawi yang berupa kerak telur yang dicampur dengan ebi dan bawang goreng adalah...',
                'correct_answer' => 'Kerak Telor',
                'options' => json_encode(['Kerak Telor', 'Martabak', 'Serabi', 'Gado-gado', 'Nasi Ulam']),
                'clue' => 'Sering ditemukan saat perayaan ulang tahun Jakarta.',
                'image_path' => 'kerak_telor.jpeg',
                'description' => 'Kerak telor adalah makanan tradisional Betawi yang terbuat dari beras ketan, telur ayam atau bebek, ebi (udang kering), dan bawang goreng. Kerak telor dimasak di atas tungku arang hingga bagian bawahnya garing.'
            ],
            // Image: tinutuan.jpg
            [
                'category' => 'Makanan Khas',
                'question_text' => 'Bubur khas dari Manado yang berisi campuran berbagai sayuran dan umbi-umbian adalah...',
                'correct_answer' => 'Tinutuan',
                'options' => json_encode(['Tinutuan', 'Bubur Ayam', 'Bubur Sumsum', 'Bubur Kampiun', 'Bubur Pedas']),
                'clue' => 'Juga dikenal dengan sebutan Bubur Manado.',
                'image_path' => 'tinutuan.jpeg',
                'description' => 'Tinutuan atau Bubur Manado adalah bubur khas Sulawesi Utara yang terbuat dari campuran beras, labu kuning, singkong, jagung, dan berbagai sayuran hijau. Biasanya disajikan dengan sambal dan ikan asin.'
            ],
            // Image: ayam_betutu.jpg
            [
                'category' => 'Makanan Khas',
                'question_text' => 'Ayam betutu adalah masakan ayam utuh yang kaya rempah, berasal dari daerah...',
                'correct_answer' => 'Bali',
                'options' => json_encode(['Bali', 'Lombok', 'Jawa', 'Ayam Taliwang', 'Ayam Pop']),
                'clue' => 'Pulau ini terkenal dengan sebutan Pulau Dewata.',
                'image_path' => 'ayam_betutu.jpeg',
                'description' => 'Ayam betutu adalah masakan khas Bali berupa ayam utuh yang dibumbui dengan rempah-rempah khas Bali, lalu dibungkus daun pisang dan dipanggang atau dikukus hingga empuk dan bumbunya meresap.'
            ],

            // Kategori: Tarian & Kesenian
            // Image: tari_saman.jpg
            [
                'category' => 'Tarian & Kesenian',
                'question_text' => 'Tarian yang berasal dari Aceh dan menampilkan kekompakan gerakan tangan ribuan penari pria adalah...',
                'correct_answer' => 'Tari Saman',
                'options' => json_encode(['Tari Saman', 'Tari Piring', 'Tari Kecak', 'Tari Seudati', 'Tari Guel']),
                'clue' => 'Tidak menggunakan alat musik, hanya tepukan tangan dan dada.',
                'image_path' => 'tari_saman.jpeg',
                'description' => 'Tari Saman adalah tari tradisional Aceh yang dilakukan oleh sekelompok pria dengan gerakan cepat dan kompak. Tarian ini biasanya diiringi dengan nyanyian dan tepukan tangan.'
            ],
            // Image: tari_kecak.jpg
            [
                'category' => 'Tarian & Kesenian',
                'question_text' => 'Tarian dari Bali yang menceritakan kisah Ramayana dan diiringi oleh suara "cak-cak-cak" dari para penarinya adalah...',
                'correct_answer' => 'Tari Kecak',
                'options' => json_encode(['Tari Kecak', 'Tari Barong', 'Tari Pendet', 'Tari Janger', 'Tari Sanghyang']),
                'clue' => 'Sering dipentaskan saat matahari terbenam di Uluwatu.',
                'image_path' => 'tari_kecak.jpeg',
                'description' => 'Tari Kecak adalah tari tradisional Bali yang menceritakan kisah Ramayana. Tarian ini unik karena tidak menggunakan alat musik, melainkan hanya diiringi suara "cak-cak-cak" dari para penarinya.'
            ],
            // Image: wayang_golek.jpg
            [
                'category' => 'Tarian & Kesenian',
                'question_text' => 'Kesenian wayang yang menggunakan boneka kayu tiga dimensi dan berasal dari Jawa Barat adalah...',
                'correct_answer' => 'Wayang Golek',
                'options' => json_encode(['Wayang Golek', 'Wayang Kulit', 'Wayang Beber', 'Wayang Klitik', 'Wayang Potehi']),
                'clue' => 'Dalangnya menggunakan bahasa Sunda.',
                'image_path' => 'wayang_golek.jpeg',
                'description' => 'Wayang Golek adalah seni pertunjukan wayang dari Jawa Barat yang menggunakan boneka kayu tiga dimensi. Pertunjukan ini biasanya mengangkat cerita-cerita dari Mahabharata dan Ramayana.'
            ],
            // Image: tari_piring.jpg
            [
                'category' => 'Tarian & Kesenian',
                'question_text' => 'Tari dari Minangkabau yang menggunakan piring sebagai properti utamanya adalah...',
                'correct_answer' => 'Tari Piring',
                'options' => json_encode(['Tari Piring', 'Tari Payung', 'Tari Indang', 'Tari Pasambahan', 'Tari Randai']),
                'clue' => 'Penari tidak boleh menjatuhkan properti yang dipegangnya.',
                'image_path' => 'tari_piring.jpeg',
                'description' => 'Tari Piring adalah tari tradisional Minangkabau yang menggunakan piring sebagai properti utama. Tarian ini biasanya dibawakan oleh sekelompok penari wanita yang mengenakan pakaian adat Minangkabau.'
            ],
            // Image: reog_ponorogo.jpg
            [
                'category' => 'Tarian & Kesenian',
                'question_text' => 'Pertunjukan seni dari Jawa Timur yang menampilkan topeng singa raksasa dan diiringi musik gamelan adalah...',
                'correct_answer' => 'Reog',
                'options' => json_encode(['Reog', 'Kuda Lumping', 'Debus', 'Jaranan', 'Barongan']),
                'clue' => 'Berasal dari daerah Ponorogo.',
                'image_path' => 'reog_ponorogo.jpeg',
                'description' => 'Reog adalah seni pertunjukan tradisional dari Ponorogo, Jawa Timur, yang menampilkan topeng singa raksasa dan diiringi musik gamelan. Pertunjukan ini biasanya menceritakan tentang kisah perjuangan melawan penjajah.'
            ],
            // Image: tari_pendet.jpg
            [
                'category' => 'Tarian & Kesenian',
                'question_text' => 'Tarian penyambutan yang paling tua di Bali dan biasanya dipentaskan untuk menyambut tamu agung adalah...',
                'correct_answer' => 'Tari Pendet',
                'options' => json_encode(['Tari Pendet', 'Tari Legong', 'Tari Janger', 'Tari Gambuh', 'Tari Rejang']),
                'clue' => 'Penari membawa bokor berisi bunga untuk ditaburkan.',
                'image_path' => 'tari_pendet.jpeg',
                'description' => 'Tari Pendet adalah tari sambutan tradisional Bali yang biasanya dibawakan oleh para penari wanita. Tarian ini menggambarkan rasa syukur dan penghormatan kepada tamu yang datang.'
            ],
            // Image: pencak_silat.jpg
            [
                'category' => 'Tarian & Kesenian',
                'question_text' => 'Seni bela diri asli Indonesia yang diakui oleh UNESCO sebagai warisan budaya takbenda adalah...',
                'correct_answer' => 'Pencak Silat',
                'options' => json_encode(['Pencak Silat', 'Karate', 'Taekwondo', 'Tarung Derajat', 'Silek']),
                'clue' => 'Memiliki banyak aliran di berbagai daerah.',
                'image_path' => 'pencak_silat.jpeg',
                'description' => 'Pencak Silat adalah seni bela diri tradisional Indonesia yang menggabungkan antara seni bela diri, seni tari, dan seni musik. Setiap daerah di Indonesia memiliki aliran dan gaya pencak silat yang berbeda-beda.'
            ],
            // Image: tari_topeng_betawi.jpg
            [
                'category' => 'Tarian & Kesenian',
                'question_text' => 'Tarian dari Betawi yang gerakannya terinspirasi dari silat dan sering ditampilkan dalam acara pernikahan adalah...',
                'correct_answer' => 'Tari Topeng Betawi',
                'options' => json_encode(['Tari Topeng Betawi', 'Tari Yapong', 'Tari Cokek', 'Ondel-ondel', 'Lenong']),
                'clue' => 'Menggunakan topeng (kedok) sebagai ciri khasnya.',
                'image_path' => 'tari_topeng.jpeg',
                'description' => 'Tari Topeng Betawi adalah tari tradisional dari Betawi yang menggunakan topeng sebagai ciri khasnya. Tarian ini biasanya dibawakan dalam acara-acara tertentu seperti pernikahan, khitanan, dan acara adat lainnya.'
            ],
            // Image: wayang_wong.jpg
            [
                'category' => 'Tarian & Kesenian',
                'question_text' => 'Kesenian drama tari tradisional dari Jawa yang menceritakan kisah-kisah Panji adalah...',
                'correct_answer' => 'Wayang Wong',
                'options' => json_encode(['Wayang Wong', 'Ketoprak', 'Ludruk', 'Sendratari', 'Langendriyan']),
                'clue' => "'Wong' dalam bahasa Jawa berarti orang.",
                'image_path' => 'wayang_wong.jpg',
                'description' => 'Wayang Wong adalah seni pertunjukan drama tari tradisional dari Jawa yang menceritakan kisah-kisah Panji. Pertunjukan ini melibatkan penari, pemusik, dan dalang yang mengendalikan wayang.'
            ],
            // Image: tari_yospan.jpg
            [
                'category' => 'Tarian & Kesenian',
                'question_text' => 'Tarian pergaulan dari Papua yang gerakannya sangat energik dan ceria adalah...',
                'correct_answer' => 'Tari Yospan',
                'options' => json_encode(['Tari Yospan', 'Tari Sajojo', 'Tari Perang', 'Tari Suanggi', 'Tari Selamat Datang']),
                'clue' => 'Gabungan dari dua tarian, Yosim dan Pancar.',
                'image_path' => 'tari_yospan.jpg',
                'description' => 'Tari Yospan adalah tari pergaulan khas Papua yang menggabungkan gerakan tari Yosim dan Pancar. Tarian ini biasanya dibawakan oleh sekelompok pemuda-pemudi dengan gerakan yang energik dan ceria.'
            ],

            // Kategori: Pahlawan Nasional
            // Image: cut_nyak_dien.jpg
            [
                'category' => 'Pahlawan Nasional',
                'question_text' => 'Pahlawan wanita dari Aceh yang memimpin perang gerilya melawan Belanda setelah suaminya gugur adalah...',
                'correct_answer' => 'Cut Nyak Dien',
                'options' => json_encode(['Cut Nyak Dien', 'R.A. Kartini', 'Dewi Sartika', 'Cut Meutia', 'Laksamana Malahayati']),
                'clue' => 'Suaminya bernama Teuku Umar.',
                'image_path' => 'cut_nyak_dien.jpeg',
                'description' => 'Cut Nyak Dien adalah pahlawan wanita asal Aceh yang terkenal karena keberaniannya memimpin perang melawan Belanda. Ia adalah istri dari Teuku Umar, seorang pahlawan Aceh lainnya.'
            ],
            // Image: pangeran_diponegoro.jpg
            [
                'category' => 'Pahlawan Nasional',
                'question_text' => 'Pahlawan yang memimpin perlawanan besar di Jawa Tengah melawan penjajah Belanda, dikenal dengan sebutan Perang Jawa, adalah...',
                'correct_answer' => 'Pangeran Diponegoro',
                'options' => json_encode(['Pangeran Diponegoro', 'Sultan Hasanuddin', 'Tuanku Imam Bonjol', 'Sentot Alibasyah', 'Kyai Mojo']),
                'clue' => 'Menggunakan taktik gerilya dari markasnya di Gua Selarong.',
                'image_path' => 'pangeran_diponegoro.jpg',
                'description' => 'Pangeran Diponegoro adalah pahlawan nasional Indonesia yang terkenal karena perannya dalam Perang Jawa melawan penjajah Belanda. Ia menggunakan taktik gerilya dalam perjuangannya dan berhasil mengalahkan Belanda dalam beberapa pertempuran.'
            ],
            // Image: soekarno.jpg
            [
                'category' => 'Pahlawan Nasional',
                'question_text' => 'Pahlawan proklamator kemerdekaan Indonesia yang juga merupakan presiden pertama RI adalah...',
                'correct_answer' => 'Soekarno',
                'options' => json_encode(['Soekarno', 'Mohammad Hatta', 'Sutan Sjahrir', 'Tan Malaka', 'Supomo']),
                'clue' => 'Dikenal dengan julukan "Bung Karno".',
                'image_path' => 'soekarno.jpg',
                'description' => 'Soekarno adalah pahlawan nasional Indonesia yang dikenal sebagai proklamator kemerdekaan Indonesia bersama Mohammad Hatta. Ia juga merupakan presiden pertama Republik Indonesia.'
            ],
            // Image: ra_kartini.jpg
            [
                'category' => 'Pahlawan Nasional',
                'question_text' => 'Pahlawan wanita dari Jepara yang memperjuangkan emansipasi dan pendidikan bagi perempuan adalah...',
                'correct_answer' => 'R.A. Kartini',
                'options' => json_encode(['R.A. Kartini', 'Martha Christina Tiahahu', 'Nyi Ageng Serang', 'Dewi Sartika', 'Rasuna Said']),
                'clue' => 'Kumpulan suratnya dibukukan dengan judul "Habis Gelap Terbitlah Terang".',
                'image_path' => 'ra_kartini.jpg',
                'description' => 'R.A. Kartini adalah pahlawan nasional Indonesia yang dikenal sebagai pelopor emansipasi wanita dan pendidikan bagi perempuan. Ia adalah penulis surat-surat yang kemudian dibukukan dalam buku "Habis Gelap Terbitlah Terang".'
            ],
            // Image: kapitan_pattimura.jpg
            [
                'category' => 'Pahlawan Nasional',
                'question_text' => 'Pahlawan dari Maluku yang terkenal dengan perlawanannya merebut Benteng Duurstede adalah...',
                'correct_answer' => 'Kapitan Pattimura',
                'options' => json_encode(['Kapitan Pattimura', 'Silas Papare', 'Pangeran Antasari', 'Sultan Nuku', 'Thomas Pattiwwail']),
                'clue' => 'Nama aslinya adalah Thomas Matulessy.',
                'image_path' => 'kapitan_pattimura.jpeg',
                'description' => 'Kapitan Pattimura adalah pahlawan nasional Indonesia yang berasal dari Maluku. Ia terkenal karena perlawananannya terhadap penjajahan Belanda dan berhasil merebut Benteng Duurstede.'
            ],
            // Image: sultan_hasanuddin.jpg
            [
                'category' => 'Pahlawan Nasional',
                'question_text' => 'Pahlawan dari Sulawesi Selatan yang dijuluki "Ayam Jantan dari Timur" karena keberaniannya melawan VOC adalah...',
                'correct_answer' => 'Sultan Hasanuddin',
                'options' => json_encode(['Sultan Hasanuddin', 'Sultan Agung', 'Sultan Iskandar Muda', 'Arung Palakka', 'Sultan Ageng Tirtayasa']),
                'clue' => 'Raja dari Kerajaan Gowa-Tallo.',
                'image_path' => 'sultan_hasanuddin.webp',
                'description' => 'Sultan Hasanuddin adalah pahlawan nasional Indonesia yang berasal dari Sulawesi Selatan. Ia dikenal sebagai raja yang berani melawan penjajahan VOC dan memperjuangkan kemerdekaan Indonesia.'
            ],
            // Image: jenderal_soedirman.jpg
            [
                'category' => 'Pahlawan Nasional',
                'question_text' => 'Jenderal Besar yang memimpin perang gerilya melawan Agresi Militer Belanda dan menjadi Panglima TNI pertama adalah...',
                'correct_answer' => 'Jenderal Soedirman',
                'options' => json_encode(['Jenderal Soedirman', 'Gatot Soebroto', 'A.H. Nasution', 'Oerip Soemohardjo', 'Bung Tomo']),
                'clue' => 'Ditandu selama perang karena penyakit paru-paru.',
                'image_path' => 'jenderal_soedirman.jpg',
                'description' => 'Jenderal Soedirman adalah pahlawan nasional Indonesia yang dikenal sebagai Panglima TNI pertama. Ia memimpin perang gerilya melawan Agresi Militer Belanda dan berhasil mempertahankan kemerdekaan Indonesia.'
            ],
            // Image: ki_hajar_dewantara.jpg
            [
                'category' => 'Pahlawan Nasional',
                'question_text' => 'Siapakah pahlawan pendidikan yang mendirikan Taman Siswa dan terkenal dengan semboyan "Ing ngarso sung tulodo"?',
                'correct_answer' => 'Ki Hajar Dewantara',
                'options' => json_encode(['Ki Hajar Dewantara', 'Douwes Dekker', 'Cipto Mangunkusumo', 'Mohammad Sjafei', 'H.O.S. Cokroaminoto']),
                'clue' => 'Hari lahirnya diperingati sebagai Hari Pendidikan Nasional.',
                'image_path' => 'ki_hajar_dewantara.jpg',
                'description' => 'Ki Hajar Dewantara adalah pahlawan nasional Indonesia yang dikenal sebagai pelopor pendidikan di Indonesia. Ia mendirikan Taman Siswa dan memiliki semboyan "Ing ngarso sung tulodo" yang berarti "Di depan memberi contoh".'
            ],

            // Kategori: Tempat Ikonik & Sejarah
            // Image: candi_borobudur.jpg
            [
                'category' => 'Tempat Ikonik & Sejarah',
                'question_text' => 'Candi Buddha terbesar di dunia yang terletak di Magelang, Jawa Tengah, adalah...',
                'correct_answer' => 'Candi Borobudur',
                'options' => json_encode(['Candi Borobudur', 'Candi Prambanan', 'Candi Mendut', 'Candi Kalasan', 'Candi Pawon']),
                'clue' => 'Memiliki banyak stupa dan relief Jataka.',
                'image_path' => 'candi_borobudur.jpg',
                'description' => 'Candi Borobudur adalah candi Buddha terbesar di dunia yang terletak di Magelang, Jawa Tengah. Candi ini dibangun pada abad ke-8 dan ke-9 Masehi dan memiliki banyak stupa serta relief yang menggambarkan ajaran Buddha.'
            ],
            // Image: candi_prambanan.jpg
            [
                'category' => 'Tempat Ikonik & Sejarah',
                'question_text' => 'Kompleks candi Hindu terbesar di Indonesia yang dipersembahkan untuk Trimurti (Siwa, Wisnu, Brahma) adalah...',
                'correct_answer' => 'Candi Prambanan',
                'options' => json_encode(['Candi Prambanan', 'Candi Sewu', 'Candi Plaosan', 'Candi Ratu Boko', 'Candi Ijo']),
                'clue' => 'Terkenal dengan legenda Roro Jonggrang.',
                'image_path' => 'candi_prambanan.jpg',
                'description' => 'Candi Prambanan adalah kompleks candi Hindu terbesar di Indonesia yang terletak di Sleman, Yogyakarta. Candi ini dibangun pada abad ke-9 dan dipersembahkan untuk Trimurti, yaitu Siwa, Wisnu, dan Brahma.'
            ],
            // Image: pulau_komodo.jpg
            [
                'category' => 'Tempat Ikonik & Sejarah',
                'question_text' => 'Pulau di Indonesia yang terkenal sebagai habitat asli komodo adalah...',
                'correct_answer' => 'Pulau Komodo',
                'options' => json_encode(['Pulau Komodo', 'Pulau Bali', 'Pulau Lombok', 'Pulau Rinca', 'Pulau Padar']),
                'clue' => 'Merupakan bagian dari Taman Nasional di Nusa Tenggara Timur.',
                'image_path' => 'pulau_komodo.jpg',
                'description' => 'Pulau Komodo adalah pulau yang terletak di Nusa Tenggara Timur dan merupakan bagian dari Taman Nasional Komodo. Pulau ini terkenal sebagai habitat asli komodo, hewan purba yang hanya ada di Indonesia.'
            ],
            // Image: monas.jpg
            [
                'category' => 'Tempat Ikonik & Sejarah',
                'question_text' => 'Monumen di pusat Jakarta yang puncaknya dilapisi emas dan menjadi simbol perjuangan bangsa adalah...',
                'correct_answer' => 'Monas',
                'options' => json_encode(['Monas', 'Tugu Pahlawan', 'Patung Dirgantara', 'Patung Selamat Datang', 'Tugu Proklamasi']),
                'clue' => 'Kependekan dari Monumen Nasional.',
                'image_path' => 'monas.png',
                'description' => 'Monas atau Monumen Nasional adalah monumen yang terletak di pusat Jakarta dan menjadi simbol perjuangan bangsa Indonesia. Monumen ini dibangun untuk memperingati perjuangan rakyat Indonesia dalam merebut kemerdekaan.'
            ],
            // Image: danau_toba.jpg
            [
                'category' => 'Tempat Ikonik & Sejarah',
                'question_text' => 'Danau vulkanik terbesar di dunia yang terletak di Sumatera Utara adalah...',
                'correct_answer' => 'Danau Toba',
                'options' => json_encode(['Danau Toba', 'Danau Maninjau', 'Danau Singkarak', 'Danau Ranau', 'Danau Poso']),
                'clue' => 'Di tengahnya terdapat sebuah pulau besar bernama Samosir.',
                'image_path' => 'danau_toba.png',
                'description' => 'Danau Toba adalah danau vulkanik terbesar di dunia yang terletak di Sumatera Utara. Di tengah danau ini terdapat sebuah pulau besar bernama Samosir yang juga merupakan tempat tinggal suku Batak.'
            ],
            // Image: gunung_ijen.jpg
            [
                'category' => 'Tempat Ikonik & Sejarah',
                'question_text' => 'Gunung di Jawa Timur yang terkenal dengan kawah birunya (blue fire) adalah...',
                'correct_answer' => 'Gunung Ijen',
                'options' => json_encode(['Gunung Ijen', 'Gunung Bromo', 'Gunung Semeru', 'Gunung Raung', 'Gunung Kelud']),
                'clue' => 'Tempat penambangan belerang tradisional.',
                'image_path' => 'gunung_ijen.jpg',
                'description' => 'Gunung Ijen adalah gunung berapi yang terletak di Jawa Timur dan terkenal dengan kawah birunya yang mengandung belerang. Di sini juga terdapat fenomena alam yang disebut blue fire atau api biru.'
            ],
            // Image: proklamasi.jpg
            [
                'category' => 'Tempat Ikonik & Sejarah',
                'question_text' => 'Tempat di Jakarta yang menjadi saksi bisu pembacaan teks proklamasi kemerdekaan Indonesia adalah...',
                'correct_answer' => 'Jalan Pegangsaan Timur No. 56',
                'options' => json_encode(['Jalan Pegangsaan Timur No. 56', 'Gedung Sate', 'Istana Merdeka', 'Gedung Joang 45', 'Rumah Rengasdengklok']),
                'clue' => 'Merupakan kediaman pribadi Bung Karno saat itu.',
                'image_path' => 'proklamasi.jpg',
                'description' => 'Jalan Pegangsaan Timur No. 56 adalah alamat di mana teks proklamasi kemerdekaan Indonesia dibacakan oleh Soekarno dan Mohammad Hatta pada tanggal 17 Agustus 1945. Tempat ini sekarang menjadi museum.'
            ],
            // Image: pura_ulun_danu.jpg
            [
                'category' => 'Tempat Ikonik & Sejarah',
                'question_text' => 'Pura suci di Bali yang terletak di tengah danau Beratan, Bedugul, adalah...',
                'correct_answer' => 'Pura Ulun Danu Beratan',
                'options' => json_encode(['Pura Ulun Danu Beratan', 'Pura Besakih', 'Pura Tanah Lot', 'Pura Tirta Empul', 'Pura Lempuyang']),
                'clue' => 'Gambarnya pernah ada di uang kertas Rp 50.000.',
                'image_path' => 'pura_ulun_danu.webp',
                'description' => 'Pura Ulun Danu Beratan adalah pura suci yang terletak di tepi danau Beratan, Bedugul, Bali. Pura ini didedikasikan untuk Dewi Danu, dewi air, dan merupakan salah satu objek wisata terkenal di Bali.'
            ],
            // Image: kerajaan_kutai.jpg
            [
                'category' => 'Tempat Ikonik & Sejarah',
                'question_text' => 'Kerajaan Hindu-Buddha pertama di Nusantara yang diperkirakan berdiri pada abad ke-4 adalah...',
                'correct_answer' => 'Kerajaan Kutai',
                'options' => json_encode(['Kerajaan Kutai', 'Kerajaan Sriwijaya', 'Kerajaan Majapahit', 'Kerajaan Tarumanegara', 'Kerajaan Salakanagara']),
                'clue' => 'Bukti keberadaannya adalah prasasti Yupa di Kalimantan Timur.',
                'image_path' => 'kerajaan_kutai.webp',
                'description' => 'Kerajaan Kutai adalah kerajaan Hindu-Buddha pertama di Nusantara yang diperkirakan berdiri pada abad ke-4 Masehi. Bukti keberadaan kerajaan ini ditemukan melalui prasasti Yupa yang ditemukan di Kalimantan Timur.'
            ],
            // Image: kerajaan_sriwijaya.jpg
            [
                'category' => 'Tempat Ikonik & Sejarah',
                'question_text' => 'Kerajaan maritim besar yang berpusat di Palembang dan menguasai perdagangan di Asia Tenggara adalah...',
                'correct_answer' => 'Kerajaan Sriwijaya',
                'options' => json_encode(['Kerajaan Sriwijaya', 'Kerajaan Tarumanegara', 'Kerajaan Mataram Kuno', 'Kerajaan Medang', 'Kerajaan Singasari']),
                'clue' => 'Dikenal sebagai pusat pendidikan agama Buddha.',
                'image_path' => 'kerajaan_sriwijaya.jpg',
                'description' => 'Kerajaan Sriwijaya adalah kerajaan maritim besar yang berpusat di Palembang dan menguasai perdagangan di Asia Tenggara pada abad ke-7 hingga ke-13 Masehi. Kerajaan ini juga dikenal sebagai pusat pendidikan agama Buddha.'
            ],

            // Kategori: Alat Musik & Adat
            // Image: angklung.jpg
            [
                'category' => 'Alat Musik & Adat',
                'question_text' => 'Alat musik dari Jawa Barat yang terbuat dari bambu dan dimainkan dengan cara digoyangkan adalah...',
                'correct_answer' => 'Angklung',
                'options' => json_encode(['Angklung', 'Suling', 'Calung', 'Kolintang', 'Talempong']),
                'clue' => 'Satu alat hanya menghasilkan satu nada.',
                'image_path' => 'angklung.jpeg',
                'description' => 'Angklung adalah alat musik tradisional dari Jawa Barat yang terbuat dari bambu dan dimainkan dengan cara digoyangkan. Alat musik ini biasanya digunakan dalam pertunjukan seni tradisional Sunda.'
            ],
            // Image: gamelan.jpg
            [
                'category' => 'Alat Musik & Adat',
                'question_text' => 'Seperangkat alat musik gamelan yang berasal dari Jawa dan Bali didominasi oleh instrumen...',
                'correct_answer' => 'Logam (perkusi)',
                'options' => json_encode(['Logam (perkusi)', 'Dawai (gesek)', 'Tiup', 'Bambu', 'Kulit']),
                'clue' => 'Instrumennya seperti gong, bonang, dan saron.',
                'image_path' => 'gamelan.jpeg',
                'description' => 'Gamelan adalah seperangkat alat musik tradisional yang berasal dari Jawa dan Bali. Alat musik ini didominasi oleh instrumen perkusi dari logam seperti gong, bonang, dan saron.'
            ],
            // Image: sasando.jpg
            [
                'category' => 'Alat Musik & Adat',
                'question_text' => 'Alat musik petik dari Nusa Tenggara Timur yang terbuat dari daun lontar adalah...',
                'correct_answer' => 'Sasando',
                'options' => json_encode(['Sasando', 'Kecapi', 'Sampek', 'Japé', 'Gong']),
                'clue' => 'Bentuknya seperti harpa kecil dengan tabung bambu di tengah.',
                'image_path' => 'sasando.jpg',
                'description' => 'Sasando adalah alat musik petik tradisional dari Nusa Tenggara Timur yang terbuat dari daun lontar. Alat musik ini memiliki bentuk seperti harpa kecil dengan tabung bambu di tengahnya.'
            ],
            // Image: ngaben.jpg
            [
                'category' => 'Alat Musik & Adat',
                'question_text' => 'Upacara adat pembakaran jenazah umat Hindu di Bali disebut...',
                'correct_answer' => 'Ngaben',
                'options' => json_encode(['Ngaben', 'Sekaten', 'Rambu Solo', 'Melasti', 'Galungan']),
                'clue' => 'Dipercaya dapat menyucikan roh orang yang telah meninggal.',
                'image_path' => 'ngaben.jpg',
                'description' => 'Ngaben adalah upacara adat pembakaran jenazah umat Hindu di Bali. Upacara ini dipercaya dapat menyucikan roh orang yang telah meninggal dan membebaskannya dari siklus reinkarnasi.'
            ],
            // Image: rumah_gadang.jpg
            [
                'category' => 'Alat Musik & Adat',
                'question_text' => 'Rumah adat dari Sumatera Barat yang memiliki atap runcing seperti tanduk kerbau adalah...',
                'correct_answer' => 'Rumah Gadang',
                'options' => json_encode(['Rumah Gadang', 'Rumah Joglo', 'Rumah Honai', 'Rumah Bolon', 'Rumah Limas']),
                'clue' => 'Rumah bagi masyarakat Minangkabau.',
                'image_path' => 'rumah_gadang.jpg',
                'description' => 'Rumah Gadang adalah rumah adat dari Sumatera Barat yang menjadi simbol kebanggaan masyarakat Minangkabau. Rumah ini memiliki atap runcing yang menyerupai tanduk kerbau dan biasanya dihiasi dengan ukiran khas Minangkabau.'
            ],
            // Image: rambu_solo.jpg
            [
                'category' => 'Alat Musik & Adat',
                'question_text' => 'Upacara pemakaman mewah di Tana Toraja yang bisa berlangsung berhari-hari adalah...',
                'correct_answer' => 'Rambu Solo',
                'options' => json_encode(['Rambu Solo', 'Tedak Siten', 'Seren Taun', "Ma'nene", 'Tiwah']),
                'clue' => 'Sering melibatkan penyembelihan kerbau sebagai kurban.',
                'image_path' => 'rambu_solo.jpg',
                'description' => 'Rambu Solo adalah upacara pemakaman adat yang dilakukan oleh masyarakat Toraja di Sulawesi Selatan. Upacara ini bisa berlangsung berhari-hari dan sering melibatkan penyembelihan kerbau sebagai kurban.'
            ],
            // Image: batik.jpg
            [
                'category' => 'Alat Musik & Adat',
                'question_text' => 'Kain tradisional Indonesia yang dibuat dengan teknik pewarnaan menggunakan lilin malam adalah...',
                'correct_answer' => 'Batik',
                'options' => json_encode(['Batik', 'Tenun', 'Songket', 'Ikat', 'Ulos']),
                'clue' => 'Diakui UNESCO sebagai warisan budaya dunia.',
                'image_path' => 'batik.png',
                'description' => 'Batik adalah kain tradisional Indonesia yang dibuat dengan teknik pewarnaan menggunakan lilin malam. Motif dan corak batik sangat beragam dan setiap daerah di Indonesia memiliki ciri khas batik masing-masing.'
            ],

            // Kategori: Lain-Lain (Pengetahuan Umum)
            // Image: bunga_melati.jpg
            [
                'category' => 'Pengetahuan Umum',
                'question_text' => 'Bunga Nasional Indonesia yang dikenal sebagai "Puspa Bangsa" adalah...',
                'correct_answer' => 'Bunga Melati',
                'options' => json_encode(['Bunga Melati', 'Bunga Anggrek', 'Bunga Rafflesia', 'Bunga Kenanga', 'Bunga Sedap Malam']),
                'clue' => 'Warnanya putih bersih dan berbau sangat harum.',
                'image_path' => 'bunga_melati.jpg',
                'description' => 'Bunga Melati adalah bunga nasional Indonesia yang dikenal sebagai "Puspa Bangsa". Bunga ini memiliki warna putih bersih dan harum yang sangat khas.'
            ],
            // Image: macan_tutul_jawa.jpg
            [
                'category' => 'Pengetahuan Umum',
                'question_text' => 'Hewan yang menjadi fauna identitas provinsi Jawa Barat adalah...',
                'correct_answer' => 'Macan Tutul Jawa',
                'options' => json_encode(['Macan Tutul Jawa', 'Badak Bercula Satu', 'Anoa', 'Elang Jawa', 'Owa Jawa']),
                'clue' => 'Bukan harimau, tetapi memiliki corak tutul.',
                'image_path' => 'macan_tutul_jawa.webp',
                'description' => 'Macan Tutul Jawa adalah hewan yang menjadi fauna identitas provinsi Jawa Barat. Hewan ini bukan harimau, tetapi memiliki corak tutul yang mirip dengan harimau.'
            ],
            // Image: bhinneka_tunggal_ika.jpg
            [
                'category' => 'Pengetahuan Umum',
                'question_text' => 'Semboyan negara Indonesia, "Bhinneka Tunggal Ika", memiliki arti...',
                'correct_answer' => 'Berbeda-beda tetapi tetap satu',
                'options' => json_encode(['Berbeda-beda tetapi tetap satu', 'Bersatu kita teguh', 'Maju tak gentar', 'Satu Nusa Satu Bangsa', 'Merdeka atau Mati']),
                'clue' => 'Diambil dari kitab Sutasoma.',
                'image_path' => 'bhinneka_tunggal_ika.webp',
                'description' => 'Bhinneka Tunggal Ika adalah semboyan negara Indonesia yang berarti "Berbeda-beda tetapi tetap satu". Semboyan ini diambil dari kitab Sutasoma karya Mpu Tantular.'
            ],
            // Image: garuda.jpg
            [
                'category' => 'Pengetahuan Umum',
                'question_text' => 'Burung yang menjadi lambang negara Indonesia adalah...',
                'correct_answer' => 'Burung Garuda',
                'options' => json_encode(['Burung Garuda', 'Burung Cenderawasih', 'Burung Elang Jawa', 'Burung Enggang', 'Burung Merak']),
                'clue' => 'Mencengkeram pita bertuliskan semboyan negara.',
                'image_path' => 'garuda.png',
                'description' => 'Burung Garuda adalah burung yang menjadi lambang negara Indonesia. Burung ini digambarkan sedang mencengkeram pita bertuliskan semboyan negara, "Bhinneka Tunggal Ika".'
            ],
            // Image: kalimantan.jpg
            [
                'category' => 'Pengetahuan Umum',
                'question_text' => 'Pulau di Indonesia yang dijuluki sebagai "Paru-paru Dunia" karena luasnya hutan hujan tropis adalah...',
                'correct_answer' => 'Kalimantan',
                'options' => json_encode(['Kalimantan', 'Sumatera', 'Papua', 'Sulawesi', 'Jawa']),
                'clue' => 'Nama lainnya adalah Borneo.',
                'image_path' => 'kalimantan.jpg',
                'description' => 'Kalimantan adalah pulau di Indonesia yang dijuluki sebagai "Paru-paru Dunia" karena luasnya hutan hujan tropis yang ada di pulau ini. Nama lainnya adalah Borneo.'
            ],
        ];

        // Loop melalui bank soal dan masukkan ke dalam database
        foreach ($bankSoal as $soal) {
            Question::create($soal);
        }
    }
}
