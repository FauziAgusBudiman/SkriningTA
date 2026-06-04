<?php

namespace App\Http\Controllers;

use App;
use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Hasil;
use App\Models\Kecanduan;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    public function index()
    {
        session()->forget(['data_diri']);

        return view('diagnosis_awal');
    }

    public function proses(Request $request)
    {
        $gejala = Gejala::all();

        $message = [
            'required' => ':attribute harus diisi',
        ];

        $validated = $request->validate([
            'nama' => 'required',
            'no_hp' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'alamat' => 'nullable',
        ], $message);

        session(['data_diri' => $validated]);

        return view('diagnosis', compact('gejala'));
    }

    // hasil diagnosis
    public function hasil(Request $request)
    {
        $gejala_dipilih = $request->gejala;
        // panggil fungsi metode CF (tanpa fuzzy)
        $hasil = $this->certainty_factor($gejala_dipilih);

        $gejala = [];
        foreach ($gejala_dipilih as $id_gejala => $cf_user) {
            $cf_user = floatval($cf_user);
            if ($cf_user > 0) {
                $gej = Gejala::find($id_gejala);
                $gejala[] = $gej->kode_gejala . ' - ' . $gej->nama_gejala . ' (' . $cf_user . ')';
            }
        }

        // nilai default kecanduan tidak terdiagnosa
        $nama_kecanduan = 'Tidak terdeteksi kecanduan';
        $solusi = '';
        $nilai_cf = 0;
        $kecanduan_id = null;

        // jika kecanduan terdiagnosa
        if (!empty($hasil)) {
            $kecanduan_id = $hasil[0]['kecanduan_id'];

            $kecanduan = Kecanduan::find($kecanduan_id);
            $nama_kecanduan = $kecanduan->nama_kecanduan;
            $solusi = $kecanduan->solusi;
            $nilai_cf = $hasil[0]['persentase'];
        }

        $data_diri = session('data_diri');
        $data_diri['gejala'] = serialize($gejala);
        $data_diri['kecanduan_id'] = $kecanduan_id;
        $data_diri['cf'] = $nilai_cf;

        Hasil::create($data_diri);

        return view('diagnosis_hasil', compact('hasil', 'nama_kecanduan', 'solusi', 'gejala', 'nilai_cf', 'data_diri'));
    }

    // -------- metode Certainty Factor --------- START
    public function certainty_factor($gejala)
    {
        $hasil = [];
        $kecanduan_list = Kecanduan::all();

        foreach ($kecanduan_list as $k) {
            $cf_kombinasi = 0;

            // ambil data aturan berdasarkan tingkat kecanduan
            $aturan = Aturan::where('kecanduan_id', $k->id)->get();
            foreach ($aturan as $a) {
                $cf_user = 0;

                foreach ($gejala as $id_gejala => $g) {
                    if ($id_gejala == $a->gejala_id) {
                        $g = floatval($g);
                        if ($g > 0) {
                            $cf_user = $g; // langsung gunakan nilai CF user 
                        }
                    }
                }

                if ($cf_user > 0) {
                    $cf = $cf_user * $a->cf_pakar;

                    if ($cf_kombinasi == 0) {
                        $cf_kombinasi = $cf;
                    } else {
                        $cf_kombinasi = $cf_kombinasi + ($cf * (1 - $cf_kombinasi));
                    }
                }
            }

            if ($cf_kombinasi > 0) {
                $hasil[] = [
                    'kecanduan_id' => $k->id,
                    'nama_kecanduan' => $k->nama_kecanduan,
                    'cf' => $cf_kombinasi,
                    'persentase' => round($cf_kombinasi * 100, 2),
                ];
            }
        }

        if (!empty($hasil)) {
            $this->array_sort_by_column($hasil, 'cf');
        }

        return $hasil;
    }
    // -------- metode Certainty Factor --------- END

    // fungsi untuk mengurutkan array berdasarkan kolom
    function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
    {
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }

        array_multisort($sort_col, $dir, $arr);
    }

    // print out pdf
    public function pdf(Request $request)
    {
        $gejala = $request->gejala;
        $solusi = $request->solusi;
        $nama_kecanduan = $request->nama_kecanduan;
        $nilai_cf = $request->nilai_cf;
        $data_diri = $request->data_diri;
        $hasil = $request->hasil;

        $pdf = App::make('dompdf.wrapper');
        $html = view('diagnosis_pdf', compact('gejala', 'solusi', 'nama_kecanduan', 'nilai_cf', 'data_diri', 'hasil'));
        $pdf->loadHTML($html);
        return $pdf->stream();
    }
}
