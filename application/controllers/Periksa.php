<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periksa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Periksa_model', 'm_periksa');
    }

    public function index()
    {
        $data = [
            'gejala' => $this->m_periksa->Get_Gejala(),
        ];
        $this->load->view('template/header', $data);
        $this->load->view('content/periksa', $data);
        $this->load->view('template/footer', $data);
    }

    public function delete()
    {
        $dataId = $this->input->post('dataId');
        $this->m_periksa->deleteBiodata($dataId);
    }


    public function insert_one()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'umur' => $this->input->post('umur'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'no_kk' => $this->input->post('no_kk'),
            'telp' => $this->input->post('telp'),
            'alamat' => $this->input->post('alamat'),
            'uniq_id' => uniqid("biodata"),
        ];
        $this->session->set_userdata('biodata', $data);
        $dataId = $this->m_periksa->insertBiodata($data);
        $this->output->set_content_type('application/json')->set_output(json_encode(['dataId' => $dataId]));
    }

    public function insert_two()
    {
        // Ambil input gejala dari form
        $gejalaInput = $this->input->post('gejala');

        // Inisialisasi variabel untuk menyimpan hasil inferensi
        $result = array();

        // Inisialisasi variabel untuk menyimpan jumlah gejala pada setiap kerusakan
        $gejalaCount = array();

        foreach ($gejalaInput as $kodeGejala) {
            // Ambil aturan berdasarkan kode gejala
            $aturan = $this->m_periksa->get_rule_by_kode_gejala($kodeGejala);

            foreach ($aturan as $rule) {
                $kodekerusakan = $rule['kode_kerusakan'];

                // Tambahkan jumlah gejala pada kerusakan jika belum ada
                if (!isset($gejalaCount[$kodekerusakan])) {
                    $gejalaCount[$kodekerusakan] = 1;
                } else {
                    $gejalaCount[$kodekerusakan] += 1;
                }

                // Cek apakah kerusakan sudah ada dalam hasil inferensi
                if (isset($result[$kodekerusakan])) {
                    $result[$kodekerusakan]['count'] += 1;
                } else {
                    // Ambil data kerusakan dari database
                    $kerusakanData = $this->m_periksa->get_kerusakan_by_kode($kodekerusakan);

                    // Tambahkan kerusakan ke hasil inferensi
                    $result[$kodekerusakan] = array(
                        'kode_kerusakan' => $kerusakanData['kode_kerusakan'],
                        'nama_kerusakan' => $kerusakanData['nama_kerusakan'],
                        'penanganan' => $kerusakanData['penanganan'],
                        'count' => 1
                    );
                }
            }
        }

        // Hitung persentase kemunculan kerusakan
        foreach ($result as &$kerusakan) {
            $kodekerusakan = $kerusakan['kode_kerusakan'];
            $totalGejalaCocok = $gejalaCount[$kodekerusakan];
            $totalGejalakerusakan = $this->m_periksa->get_total_gejala_by_kode_kerusakan($kodekerusakan);
            $persentase = ($totalGejalaCocok / $totalGejalakerusakan) * 100;
            $kerusakan['persentase'] = round($persentase, 2);

            // Jika hanya terdapat 1 gejala dan gejala tersebut ada di kerusakan tersebut
            if (count($gejalaInput) == 1 && $totalGejalaCocok == 1) {
                $persentase = (1 / $totalGejalakerusakan) * 100;
                $kerusakan['persentase'] = round($persentase, 2);
            }
        }

        // Urutkan hasil berdasarkan persentase secara descending
        usort($result, function ($a, $b) {
            return $b['persentase'] - $a['persentase'];
        });

        $biodata = $this->session->userdata('biodata');
        date_default_timezone_set('Asia/Jakarta');
        $riwayatJawabanData = array(
            'waktu' => date('Y-m-d H:i:s'),
            'jawaban' => implode(' ', $gejalaInput),
            'persen' => $result[0]['persentase'],
            'id_user' => $biodata['uniq_id'],
            'kerusakan' => $result[0]['nama_kerusakan'] // Tambahkan nama kerusakan
        );
        // Periksa apakah data jawaban sudah ada sebelumnya
        $isDuplicate = $this->db->where($riwayatJawabanData)->get('riwayat_jawaban')->num_rows() > 0;

        if (!$isDuplicate) {
            $this->db->insert('riwayat_jawaban', $riwayatJawabanData);
        }

        // Ambil nama gejala yang sudah dipilih
        $namaGejala = array();
        foreach ($gejalaInput as $kodeGejala) {
            // Ambil data gejala dari database
            $gejalaData = $this->m_periksa->get_gejala_by_kode($kodeGejala);
            $namaGejala[] = $gejalaData['gejala'];
        }

        $totalGejalakerusakan = array();
        foreach ($result as &$kerusakan) {
            $kodekerusakan = $kerusakan['kode_kerusakan'];
            $totalGejalakerusakan[$kodekerusakan] = $this->m_periksa->get_total_gejala_by_kode_kerusakan($kodekerusakan);
        }

        $data = [
            'biodata' => $biodata,
            'gejala' => $gejalaInput,
            'nama_gejala' => $namaGejala,
            'result' => $result,
            'total_gejala_kerusakan' => $totalGejalakerusakan,
        ];
        $this->load->view('content/hasil', $data);
        // $this->session->unset_userdata('biodata');
    }


    // public function insert_two()
    // {
    //     // Ambil input gejala dari form
    //     $gejalaInput = $this->input->post('gejala');

    //     // Inisialisasi variabel untuk menyimpan hasil inferensi
    //     $result = array();

    //     // Inisialisasi variabel untuk menyimpan jumlah gejala pada setiap kerusakan
    //     $gejalaCount = array();

    //     foreach ($gejalaInput as $kodeGejala) {
    //         // Ambil aturan berdasarkan kode gejala
    //         $aturan = $this->m_periksa->get_rule_by_kode_gejala($kodeGejala);

    //         foreach ($aturan as $rule) {
    //             $kodekerusakan = $rule['kode_kerusakan'];

    //             // Tambahkan jumlah gejala pada kerusakan jika belum ada
    //             if (!isset($gejalaCount[$kodekerusakan])) {
    //                 $gejalaCount[$kodekerusakan] = 1;
    //             } else {
    //                 $gejalaCount[$kodekerusakan] += 1;
    //             }

    //             // Cek apakah kerusakan sudah ada dalam hasil inferensi
    //             if (isset($result[$kodekerusakan])) {
    //                 $result[$kodekerusakan]['count'] += 1;
    //             } else {
    //                 // Ambil data kerusakan dari database
    //                 $kerusakanData = $this->m_periksa->get_kerusakan_by_kode($kodekerusakan);

    //                 // Tambahkan kerusakan ke hasil inferensi
    //                 $result[$kodekerusakan] = array(
    //                     'kode_kerusakan' => $kerusakanData['kode_kerusakan'],
    //                     'nama_kerusakan' => $kerusakanData['nama_kerusakan'],
    //                     'penanganan' => $kerusakanData['penanganan'],
    //                     'count' => 1
    //                 );
    //             }
    //         }
    //     }

    //     // Hitung persentase kemunculan kerusakan
    //     foreach ($result as &$kerusakan) {
    //         $kodekerusakan = $kerusakan['kode_kerusakan'];
    //         $totalGejalaCocok = $gejalaCount[$kodekerusakan];
    //         $totalGejalakerusakan = $this->m_periksa->get_total_gejala_by_kode_kerusakan($kodekerusakan);
    //         $persentase = ($totalGejalaCocok / $totalGejalakerusakan) * 100;
    //         $kerusakan['persentase'] = round($persentase, 2);

    //         // Jika hanya terdapat 1 gejala dan gejala tersebut ada di kerusakan tersebut
    //         if (count($gejalaInput) == 1 && $totalGejalaCocok == 1) {
    //             $persentase = (1 / $totalGejalakerusakan) * 100;
    //             $kerusakan['persentase'] = round($persentase, 2);
    //         }
    //     }

    //     // Urutkan hasil berdasarkan persentase secara descending
    //     usort($result, function ($a, $b) {
    //         return $b['persentase'] - $a['persentase'];
    //     });

    //     $biodata = $this->session->userdata('biodata');
    //     date_default_timezone_set('Asia/Jakarta');
    //     $riwayatJawabanData = array(
    //         'waktu' => date('Y-m-d H:i:s'),
    //         'jawaban' => implode(' ', $gejalaInput),
    //         'persen' => $result[0]['persentase'],
    //         'id_user' => $biodata['uniq_id'],
    //         'kerusakan' => $result[0]['nama_kerusakan']
    //     );
    //     // Periksa apakah data jawaban sudah ada sebelumnya
    //     $isDuplicate = $this->db->where($riwayatJawabanData)->get('riwayat_jawaban')->num_rows() > 0;

    //     if (!$isDuplicate) {
    //         $this->db->insert('riwayat_jawaban', $riwayatJawabanData);
    //     }

    //     // Ambil nama gejala yang sudah dipilih
    //     $namaGejala = array();
    //     foreach ($gejalaInput as $kodeGejala) {
    //         // Ambil data gejala dari database
    //         $gejalaData = $this->m_periksa->get_gejala_by_kode($kodeGejala);
    //         $namaGejala[] = $gejalaData['gejala'];
    //     }

    //     $totalGejalakerusakan = array();
    //     foreach ($result as &$kerusakan) {
    //         $kodekerusakan = $kerusakan['kode_kerusakan'];
    //         $totalGejalakerusakan[$kodekerusakan] = $this->m_periksa->get_total_gejala_by_kode_kerusakan($kodekerusakan);
    //     }

    //     $data = [
    //         'biodata' => $biodata,
    //         'gejala' => $gejalaInput,
    //         'nama_gejala' => $namaGejala,
    //         'result' => $result,
    //         'total_gejala_kerusakan' => $totalGejalakerusakan,
    //     ];
    //     $this->load->view('content/hasil', $data);
    //     // $this->session->unset_userdata('biodata');
    // }

    // public function insert_two()
    // {
    //     // Ambil input gejala dari form
    //     $gejalaInput = $this->input->post('gejala');

    //     // Inisialisasi variabel untuk menyimpan hasil inferensi
    //     $result = array();

    //     // Inisialisasi variabel untuk menyimpan jumlah gejala pada setiap kerusakan
    //     $gejalaCount = array();

    //     foreach ($gejalaInput as $kodeGejala) {
    //         // Ambil aturan berdasarkan kode gejala
    //         $aturan = $this->m_periksa->get_rule_by_kode_gejala($kodeGejala);

    //         foreach ($aturan as $rule) {
    //             $kodekerusakan = $rule['kode_kerusakan'];

    //             // Tambahkan jumlah gejala pada kerusakan jika belum ada
    //             if (!isset($gejalaCount[$kodekerusakan])) {
    //                 $gejalaCount[$kodekerusakan] = 1;
    //             } else {
    //                 $gejalaCount[$kodekerusakan] += 1;
    //             }

    //             // Cek apakah kerusakan sudah ada dalam hasil inferensi
    //             if (isset($result[$kodekerusakan])) {
    //                 $result[$kodekerusakan]['count'] += 1;
    //             } else {
    //                 // Ambil data kerusakan dari database
    //                 $kerusakanData = $this->m_periksa->get_kerusakan_by_kode($kodekerusakan);

    //                 // Tambahkan kerusakan ke hasil inferensi
    //                 $result[$kodekerusakan] = array(
    //                     'kode_kerusakan' => $kerusakanData['kode_kerusakan'],
    //                     'nama_kerusakan' => $kerusakanData['nama_kerusakan'],
    //                     'penanganan' => $kerusakanData['penanganan'],
    //                     'count' => 1
    //                 );
    //             }
    //         }
    //     }
    //     // Hitung persentase kemunculan kerusakan
    //     foreach ($result as &$kerusakan) {
    //         $kodekerusakan = $kerusakan['kode_kerusakan'];
    //         $totalGejalaCocok = $gejalaCount[$kodekerusakan];
    //         $totalGejalakerusakan = $this->m_periksa->get_total_gejala_by_kode_kerusakan($kodekerusakan);
    //         $persentase = ($totalGejalaCocok / $totalGejalakerusakan) * 100;
    //         $kerusakan['persentase'] = round($persentase, 2);

    //         // Jika hanya terdapat 1 gejala dan gejala tersebut ada di kerusakan tersebut
    //         if (count($gejalaInput) == 1 && $totalGejalaCocok == 1) {
    //             $persentase = (1 / $totalGejalakerusakan) * 100;
    //             $kerusakan['persentase'] = round($persentase, 2);
    //         }
    //     }

    //     // Urutkan hasil berdasarkan persentase secara descending
    //     usort($result, function ($a, $b) {
    //         return $b['persentase'] - $a['persentase'];
    //     });

    //     // Ambil nama gejala yang sudah dipilih
    //     $namaGejala = array();
    //     foreach ($gejalaInput as $kodeGejala) {
    //         // Ambil data gejala dari database
    //         $gejalaData = $this->m_periksa->get_gejala_by_kode($kodeGejala);
    //         $namaGejala[] = $gejalaData['gejala'];
    //     }

    //     $totalGejalakerusakan = array();

    //     foreach ($result as &$kerusakan) {
    //         $kodekerusakan = $kerusakan['kode_kerusakan'];
    //         $totalGejalakerusakan[$kodekerusakan] = $this->m_periksa->get_total_gejala_by_kode_kerusakan($kodekerusakan);
    //     }

    //     $biodata = $this->session->userdata('biodata');

    //     $data = [
    //         'biodata' => $biodata,
    //         'gejala' => $gejalaInput,
    //         'nama_gejala' => $namaGejala,
    //         'result' => $result,
    //         'total_gejala_kerusakan' => $totalGejalakerusakan,
    //     ];

    //     $this->load->view('content/hasil', $data);
    //     // $this->session->unset_userdata('biodata');
    // }

    // public function insert_two()
    // {
    //     // Ambil input gejala dari form
    //     $gejalaInput = $this->input->post('gejala');

    //     // Inisialisasi variabel untuk menyimpan hasil inferensi
    //     $result = array();

    //     // Inisialisasi variabel untuk menyimpan jumlah gejala pada setiap kerusakan
    //     $gejalaCount = array();

    //     foreach ($gejalaInput as $kodeGejala) {
    //         // Ambil aturan berdasarkan kode gejala
    //         $aturan = $this->m_periksa->get_rule_by_kode_gejala($kodeGejala);

    //         foreach ($aturan as $rule) {
    //             $kodekerusakan = $rule['kode_kerusakan'];

    //             // Tambahkan jumlah gejala pada kerusakan jika belum ada
    //             if (!isset($gejalaCount[$kodekerusakan])) {
    //                 $gejalaCount[$kodekerusakan] = 1;
    //             } else {
    //                 $gejalaCount[$kodekerusakan] += 1;
    //             }

    //             // Cek apakah kerusakan sudah ada dalam hasil inferensi
    //             if (isset($result[$kodekerusakan])) {
    //                 $result[$kodekerusakan]['count'] += 1;
    //             } else {
    //                 // Ambil data kerusakan dari database
    //                 $kerusakanData = $this->m_periksa->get_kerusakan_by_kode($kodekerusakan);

    //                 // Tambahkan kerusakan ke hasil inferensi
    //                 $result[$kodekerusakan] = array(
    //                     'kode_kerusakan' => $kerusakanData['kode_kerusakan'],
    //                     'nama_kerusakan' => $kerusakanData['nama_kerusakan'],
    //                     'count' => 1
    //                 );
    //             }
    //         }
    //     }
    //     // Hitung persentase kemunculan kerusakan
    //     foreach ($result as &$kerusakan) {
    //         $kodekerusakan = $kerusakan['kode_kerusakan'];
    //         $totalGejalaCocok = $gejalaCount[$kodekerusakan];
    //         $totalGejalakerusakan = $this->m_periksa->get_total_gejala_by_kode_kerusakan($kodekerusakan);
    //         $persentase = ($totalGejalaCocok / $totalGejalakerusakan) * 100;
    //         $kerusakan['persentase'] = round($persentase, 2);

    //         // Jika hanya terdapat 1 gejala dan gejala tersebut ada di kerusakan tersebut
    //         if (count($gejalaInput) == 1 && $totalGejalaCocok == 1) {
    //             $persentase = (1 / $totalGejalakerusakan) * 100;
    //             $kerusakan['persentase'] = round($persentase, 2);
    //         }
    //     }



    //     // Ambil nama gejala yang sudah dipilih
    //     $namaGejala = array();
    //     foreach ($gejalaInput as $kodeGejala) {
    //         // Ambil data gejala dari database
    //         $gejalaData = $this->m_periksa->get_gejala_by_kode($kodeGejala);
    //         $namaGejala[] = $gejalaData['gejala'];
    //     }

    //     $data = [
    //         'gejala' => $gejalaInput,
    //         'nama_gejala' => $namaGejala,
    //         'result' => $result,
    //     ];

    //     $this->load->view('content/hasil', $data);
    // }
}
