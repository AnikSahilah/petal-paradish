<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;

class Productsctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ProdukModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ProdukModel = new ProdukModel();
    }

    public function index()
    {
        $lang = session()->get('lang') ?? 'en';
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
            'lang' => $lang
        ];

        helper('text');

        $locale = session('lang') ?? service('request')->getLocale();

        // Tentukan nama perusahaan dan deskripsi perusahaan berdasarkan bahasa
        $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
        $deskripsi_perusahaan = ($locale === 'en')
            ? strip_tags($data['profil'][0]->deskripsi_perusahaan_en)
            : strip_tags($data['profil'][0]->deskripsi_perusahaan_in);

        // Tentukan judul halaman berdasarkan bahasa
        $data['Title'] = ($locale === 'en')
            ? ($data['tbproduk']->nama_produk_en ?? 'Products')
            : ($data['tbproduk']->nama_produk_in ?? 'Produk');

        // Tentukan teks berdasarkan bahasa
        $teks = ($locale === 'en')
            ? "Products of $nama_perusahaan. $deskripsi_perusahaan"
            : "Produk dari $nama_perusahaan. $deskripsi_perusahaan";

        // Batasan karakter untuk meta deskripsi
        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);


        return view('user/products/index', $data);
    }

    public function detail($slug_produk)
    {
        $lang = session()->get('lang') ?? 'en';
        // Mengambil produk berdasarkan slug
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbproduk' => $this->ProdukModel->where('slug_en', $slug_produk) // Ganti dengan 'slug_id' jika bahasa Indonesia
                ->orWhere('slug_id', $slug_produk) // Pastikan untuk menyesuaikan nama kolom slug untuk bahasa Indonesia
                ->first(),
            'lang' => $lang
        ];

        // Pastikan produk ditemukan
        if (!$data['tbproduk']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan slug '$slug_produk' tidak ditemukan.");
        }

        helper('text');

        // Tentukan bahasa aktif
        $locale = session('lang') ?? service('request')->getLocale();

        if ($locale === 'id') {
            $nama_produk = $data['tbproduk']->nama_produk_in ?? 'Produk Tidak Diketahui';
            $deskripsi_produk = strip_tags($data['tbproduk']->deskripsi_produk_in ?? 'Deskripsi tidak tersedia');

            $data['Title'] = $data['tbproduk']->nama_produk_in ?? '';
            $teks = "$nama_produk. $deskripsi_produk";
        } else {
            $nama_produk = $data['tbproduk']->nama_produk_en ?? 'Unknown Product';
            $deskripsi_produk = strip_tags($data['tbproduk']->deskripsi_produk_en ?? 'Description not available');

            $data['Title'] = $data['tbproduk']->nama_produk_en ?? '';
            $teks = "$nama_produk. $deskripsi_produk";
        }

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        return view('user/products/detail', $data);
    }
}
