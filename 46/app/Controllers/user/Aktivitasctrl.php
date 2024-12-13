<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\AktivitasModel;

class Aktivitasctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ProdukModel;
    private $AktivitasModel;


    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ProdukModel = new ProdukModel();
        $this->AktivitasModel = new AktivitasModel();
    }

    public function index()
    {
        $lang = session()->get('lang') ?? 'en';
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
            'tbaktivitas' => $this->AktivitasModel->findAll(),
            'lang' => $lang
        ];

        helper('text');

        if (session('lang') === 'in') {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_in);

            $data['Title'] = $data['tbproduk']->nama_produk_in ?? 'Aktivitas';
            $teks = "Aktivitas dari $nama_perusahaan. $deskripsi_perusahaan";
        } else {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

            $data['Title'] = $data['tbproduk']->nama_produk_en ?? 'Activities';
            $teks = "Activities of $nama_perusahaan. $deskripsi_perusahaan";
        }

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        return view('user/aktivitas/index', $data);
    }

    public function detail($slug)
    {
        // Ambil bahasa dari sesi atau default ke bahasa Inggris
        $lang = session()->get('lang') ?? 'en';

        // Tentukan field slug berdasarkan bahasa
        $slugField = $lang === 'id' ? 'slug_id' : 'slug_en';

        // Ambil data dari model berdasarkan slug
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbaktivitas' => $this->AktivitasModel->where($slugField, $slug)->first(),
            'lang' => $lang
        ];

        helper('text');

        // Cek apakah data aktivitas ditemukan
        if (empty($data['tbaktivitas'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Aktivitas tidak ditemukan.');
        }

        // Ambil nama dan deskripsi aktivitas berdasarkan bahasa
        if ($lang === 'in') {
            $nama_aktivitas = $data['tbaktivitas']->nama_aktivitas_in;
            $deskripsi_aktivitas = strip_tags($data['tbaktivitas']->deskripsi_aktivitas_in);
            $data['Title'] = $nama_aktivitas ?? '';
        } else {
            $nama_aktivitas = $data['tbaktivitas']->nama_aktivitas_en;
            $deskripsi_aktivitas = strip_tags($data['tbaktivitas']->deskripsi_aktivitas_en);
            $data['Title'] = $nama_aktivitas ?? '';
        }

        // Buat teks meta
        $teks = "$nama_aktivitas. $deskripsi_aktivitas";
        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        // Tampilkan view dengan data yang diperbarui
        return view('user/aktivitas/detail', $data);
    }
}
