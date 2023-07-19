<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pesan;
use Carbon\Carbon;


class FonnteController extends Controller
{
    function sendFonnte($target, $data)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.fonnte.com/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => $data["message"],
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: TUWGQ2NoyUnf@nmywT3w"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    public function fonnte(Request $request)
    {
        $json = $request->getContent();
        $data = json_decode($json, true);
        if ($data == null){
            return;
        }
        $sender = $data["sender"];
        $name = $data["name"];

        $apotek2 = false;
        if ($sender == '6281237550613'){
            $apotek2 = true;
        }

        $reply = [
            "message" => $data['sender'] . " (" . $data['name'] . ")\n" . $data['message']
        ];

        $sudah = false;

        if (isset($data['message'])) {

            if ($data['message'] == '/form') {
                $pesan = "Pendaftaran pelanggan Apotek Abadi\n\nNama:\nNomor telepon:\nAlamat:";

                $reply = [
                    "message" => $pesan
                ];
                $this->sendFonnte($sender, $reply);

                Pesan::create([
                    "sender" => $sender,
                    "target" => $sender,
                    "isi_pesan" => $reply["message"],
                    "waktu_pesan_dibuat" => Carbon::now(),
                ]);

                return;
            }

            if ($data['message'] == '/web') {
                $pesan = "http://apotekabadi.si.vokasi.unair.ac.id/login";

                $reply = [
                    "message" => $pesan
                ];
                $this->sendFonnte($sender, $reply);

                Pesan::create([
                    'sender' => $sender,
                    'target' => $sender,
                    'isi_pesan' => $reply["message"],
                    'waktu_pesan_dibuat' => Carbon::now(),
                ]);

                return;
            }

            // apotek 2 bales non cust
            if ($apotek2) {
                $query = "SELECT notelp_pasien FROM pasiens";
                $result = \DB::select($query);

                $string = $data['message'];
                // Memisahkan string berdasarkan spasi
                $parts = explode(' ', $string);
                // Mengambil elemen pertama dari array hasil pemisahan
                $nomorTelepon = $parts[0];
                $teleponTersedia = false;

                foreach ($result as $row) {
                    // Membandingkan nomor telepon yang ditemukan dengan nomor telepon dalam hasil query
                    if ($nomorTelepon === $row->notelp_pasien) {
                        $teleponTersedia = true;
                        break;
                    }
                }

                if (!$teleponTersedia) {
                    $pesan = substr($data['message'], 14);
                    $reply = [
                        "message" => $pesan
                    ];
                    $this->sendFonnte($nomorTelepon, $reply);

                    Pesan::create([
                        'sender' => $sender,
                        'target' => $nomorTelepon,
                        'isi_pesan' => $reply["message"],
                        'waktu_pesan_dibuat' => Carbon::now(),
                    ]);

                    $sudah = true;
                    return;
                }
            }

            // Ambil nomor telepon pelanggan
            $query = "SELECT pasiens.notelp_pasien
            FROM pasiens JOIN users ON users.id=pasiens.user_id
            WHERE users.notelp_pegawai ='$sender'";
            $result = \DB::select($query);
            // pegawai chat pasiennya
            if ($result && count($result) > 0 && !$apotek2) {
                foreach ($result as $row) {
                    $string = $data['message'];
                    // Memisahkan string berdasarkan spasi
                    $parts = explode(' ', $string);
                    // Mengambil elemen pertama dari array hasil pemisahan
                    $nomorTelepon = $parts[0];
                    $nomorTujuan = $row->notelp_pasien;

                    if ($nomorTelepon == $nomorTujuan) {
                        $pesan = substr($data['message'], 14);
                        $reply = [
                            "message" => $pesan
                        ];
                        $this->sendFonnte($nomorTujuan, $reply);

                        Pesan::create([
                            'sender' => $sender,
                            'target' => $nomorTujuan,
                            'isi_pesan' => $reply["message"],
                            'waktu_pesan_dibuat' => Carbon::now(),
                        ]);

                        $sudah = true;
                        break;
                    }
                }
                // cust chat apotek
            }
            else
            {
                $query = "SELECT users.notelp_pegawai
                FROM users
                JOIN pasiens ON pasiens.user_id=users.id AND pasiens.notelp_pasien ='$sender'";
                $result = \DB::select($query);
                if (count($result) > 0) {
                    foreach ($result as $row) {
                        $nomorTujuan = $row->notelp_pegawai;
                    }
                    // chat apotek 2
                } else {
                    $nomorTujuan = '6281237550613';
                }

                $this->sendFonnte($nomorTujuan, $reply);

                Pesan::create([
                    'sender' => $sender,
                    'target' => $nomorTujuan,
                    'isi_pesan' => $reply["message"],
                    'waktu_pesan_dibuat' => Carbon::now(),
                ]);

                $sudah = true;
                return;
            }
        }
    }
}
