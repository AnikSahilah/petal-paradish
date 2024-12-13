<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ArtikelModel;

class Artikelctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ArtikelModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ArtikelModel = new ArtikelModel();
    }

    public function index()
    {
        $lang = session()->get('lang') ?? 'en';
        // Ambil data profil, slider, dan artikel terbaru
        $profil = $this->ProfilModel->findAll();
        $slider = $this->SliderModel->findAll();
        $artikelTerbaru = $this->ArtikelModel->getArtikelTerbaru();

        // Jika profil tidak ditemukan, tangani kesalahan
        if (empty($profil)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data profil tidak ditemukan.');
        }

        // Tentukan bahasa yang aktif dari session atau locale
        $locale = session('lang') ?? service('request')->getLocale();

        // Tentukan judul halaman berdasarkan bahasa
        $title = ($locale === 'en') ? 'Articles' : 'Artikel';

        // Sesuaikan artikel terbaru dengan bahasa yang aktif
        foreach ($artikelTerbaru as $key => $artikel) {
            if ($lang === 'en') {
                $artikelTerbaru[$key]->judul = $artikel->judul_inggris;
                $artikelTerbaru[$key]->deskripsi = $artikel->description_inggris;
            } else {
                $artikelTerbaru[$key]->judul = $artikel->judul_artikel;
                $artikelTerbaru[$key]->deskripsi = $artikel->deskripsi_artikel;
            }
        }


        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'artikelTerbaru' => $artikelTerbaru,
            'lang' => $lang
        ];

        helper('text');

        // Set meta description based on session language
        $metaDescription = $this->generateMetaDescription($data);
        $data['Meta'] = character_limiter($metaDescription, 150);

        // Set default title
        $data['Title'] = 'Artikel';

        return view('user/artikel/index', $data);
    }

    public function detail($slug)
    {
        // Tentukan bahasa yang aktif dari session atau locale
        $locale = session('lang') ?? service('request')->getLocale();

        // Tentukan field slug berdasarkan bahasa yang aktif
        if ($locale == 'en') {
            $artikel = $this->ArtikelModel->where('slug_en', $slug)->first();
        } else {
            $artikel = $this->ArtikelModel->where('slug_id', $slug)->first();
        }

        if (!$artikel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Artikel dengan slug $slug tidak ditemukan");
        }

        // Tentukan judul halaman berdasarkan bahasa
        $title = ($locale === 'en') ? 'Articles' : 'Artikel';

        // Tentukan field judul dan deskripsi berdasarkan bahasa yang aktif
        if ($locale == 'en') {
            $judul_artikel = $artikel->judul_inggris ?? $artikel->judul_artikel; // Fallback ke judul default jika tidak ada
            $deskripsi_artikel = $artikel->description_inggris ?? $artikel->deskripsi_artikel;
        } else {
            $judul_artikel = $artikel->judul_artikel ?? $artikel->judul_artikel;
            $deskripsi_artikel = $artikel->deskripsi_artikel ?? $artikel->deskripsi_artikel;
        }

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'artikel' => $artikel,
            'artikel_lain' => $this->ArtikelModel->getArtikelLainnya($artikel->id_artikel, 4),
            'judul_artikel' => $judul_artikel,
            'deskripsi_artikel' => $deskripsi_artikel,
            'lang' => $locale
        ];

        helper('text');

        // Set meta description
        $metaDescription = $this->generateMetaDescription($data, $locale);
        $data['Meta'] = character_limiter($metaDescription, 150);

        // Tentukan judul halaman berdasarkan bahasa
        $data['Title'] = $judul_artikel ?? 'Detail Artikel';

        return view('user/artikel/detail', $data);
    }

    private function generateMetaDescription($data)
    {
        $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
        $deskripsi_perusahaan = session('lang') === 'in' ?
            strip_tags($data['profil'][0]->deskripsi_perusahaan_in) :
            strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

        $teks = session('lang') === 'in' ?
            "Artikel dari $nama_perusahaan. $deskripsi_perusahaan" :
            "Articles of $nama_perusahaan. $deskripsi_perusahaan";

        return $teks;
    }
}
