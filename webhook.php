<?php
include "koneksi.php";
header('Content-Type: application/json; charset=utf-8');

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$sender = $data["sender"];
$submission = $data["submission"];
$name = $data["name"];
$list = $data["data"];
$apiKey = 'Fbzi7ZWmjYXLxy_izT!B';


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
            "Authorization: Fbzi7ZWmjYXLxy_izT!B"
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    return $response;
}

$reply = [
    "message" => $data['pengirim'] . " (" . $data['name'] . ")\n" . $data['pesan']
];

$sudah = false;
if (isset($data['pesan'])) {
    
    if ($data['pesan'] == '/link') {
        $pesan = "vokasi.bem.unair.ac.id/addCust.php";

        $reply = [
            "message" => $pesan
        ];
        sendFonnte($sender, $reply);
        return;
    }
    
    if ($data['pesan'] == '/form') {
        $pesan = "Pendaftaran pelanggan Apotek Maju Waras\n\nNama:\nNomor telepon:\nAlamat:";

        $reply = [
            "message" => $pesan
        ];
        sendFonnte($sender, $reply);
        return;
    }
    
    // Ambil nomor telepon pelanggan
    $query = "SELECT customer.no_telp
    FROM customer JOIN pegawai ON pegawai.id=customer.pegawai_id
    WHERE pegawai.no_telp ='$sender'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $string = $data['pesan'];
            // Memisahkan string berdasarkan spasi
            $parts = explode(' ', $string);
            // Mengambil elemen pertama dari array hasil pemisahan
            $nomorTelepon = $parts[0];
            $nomorTujuan = $row['no_telp'];
            if (strpos($data['pesan'], $nomorTujuan) === 0) {
                if($nomorTelepon == $nomorTujuan){
                    $pesan = substr($data['pesan'], 14);
                    $reply = [
                        "message" => $pesan
                    ];
                    sendFonnte($nomorTujuan, $reply);
                    $sudah = true;
                    break;
                }
            }
        }
    } else {
        $query = "SELECT pegawai.no_telp
        FROM pegawai
        JOIN customer ON customer.pegawai_id=pegawai.id AND customer.no_telp ='$sender'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $nomorTujuan = $row['no_telp'];
            }
        } else {
            $nomorTujuan = '6281237550613';
        }

        sendFonnte($nomorTujuan, $reply);
        return;
    }
    
    if ($sudah == false) {
        $query = "SELECT no_telp FROM customer";
        $result = mysqli_query($conn, $query);

        $string = $data['pesan'];
        // Memisahkan string berdasarkan spasi
        $parts = explode(' ', $string);
        // Mengambil elemen pertama dari array hasil pemisahan
        $nomorTelepon = $parts[0];
        
        while ($row = mysqli_fetch_assoc($result)) {
            // Membandingkan nomor telepon yang ditemukan dengan nomor telepon dalam hasil query
            if ($nomorTelepon === $row['no_telp']) {
                $teleponTersedia = true;
                break;
            }
        }

        if (!$teleponTersedia) {
            $pesan = substr($data['pesan'], 14);
            $reply = [
                "message" => $pesan
            ];
            sendFonnte($nomorTelepon, $reply);
            $sudah = true;
            return;
        }
        
    }
}
