<!DOCTYPE html>
<html lang="<?= session()->get('lang') ?? 'id' ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-dark py-3 py-lg-0 px-lg-5 custom-navbar" id="navbar">
            <?php foreach ($profil as $header) : ?>
                <a href="<?= base_url('/') ?>" class="navbar-brand d-block d-lg-none">
                    <img data-src="<?= base_url('asset-user/images/') . $header->logo_perusahaan ?>" alt="<?= $header->nama_perusahaan ?>" class="img-fluid logo-img lazyload">
                </a>
            <?php endforeach; ?>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon">
                    < /span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <?php
                    // Ambil bahasa dari session, atau set ke 'id' secara default jika tidak ada
                    $lang = session()->get('lang') ?? 'id';

                    // Konfigurasi route berdasarkan bahasa aktif
                    $lang_routes = [
                        'id' => [
                            '' => 'Beranda',
                            'tentang-kami' => 'Tentang Kami',
                            'artikel' => 'Artikel',
                            'produk' => 'Produk',
                            'kegiatan' => 'Kegiatan',
                            'kontak' => 'Kontak'
                        ],
                        'en' => [
                            '' => 'Home',
                            'about' => 'About Us',
                            'article' => 'Articles',
                            'product' => 'Products',
                            'activities' => 'Activities',
                            'contact' => 'Contact'
                        ]
                    ];

                    // Tampilkan link navigasi berdasarkan bahasa yang aktif
                    foreach ($lang_routes[$lang] as $route => $label) {
                        $url = base_url($lang . '/' . $route);
                        $active_class = (uri_string() == ($lang . '/' . $route)) ? 'active' : '';
                        echo "<a href=\"$url\" class=\"nav-item nav-link $active_class\">$label</a>";
                    }
                    ?>

                    <!-- Dropdown untuk pilih bahasa -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link drop" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $lang == 'id' ? 'Indonesia' : 'English' ?> <i class="fa fa-caret-down"></i>
                        </a>
                        <div class="dropdown-menu text-capitalize" aria-labelledby="navbarDropdown">
                            <?php
                            // Tautan bahasa berlawanan
                            $new_lang = ($lang == 'id') ? 'en' : 'id';
                            $new_url = base_url("lang/$new_lang");
                            ?>
                            <a class="dropdown-item" href="<?= $new_url ?>"> <?= $new_lang == 'id' ? 'Indonesia' : 'English' ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
</body>

</html>