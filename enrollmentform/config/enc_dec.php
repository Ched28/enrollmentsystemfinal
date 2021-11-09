<?php
$pass_inc_dec = "this_shall_pass";
$select_key = "SELECT * FROM `important_key` WHERE ID='$pass_inc_dec'";
$result1 = mysqli_query($con, $select_key);

if($result1){
    if($result1 && mysqli_num_rows($result1) > 0)
    {
        while ($row = mysqli_fetch_array($result1)){
            $key1 = $row['KEY_ENC_DEC'];
            $_SESSION['key'] = $key1;
        }
    }
}

function qcu_encrypt($data)
        {
            $cipher = 'aes-128-ctr';
            $options = 0;
            $keyf = $_SESSION['key'];
            $iv_cipher = openssl_cipher_iv_length($cipher);
            $iv = 'YNKAK$QWNdatewaf';
            $tag = 'GCM';
            $aad = '';
            $tag_length = 16;
            return openssl_encrypt($data, $cipher, $keyf, $options, $iv);
        }

        function qcu_decrypt($encrypted_data)
        {
            $cipher = 'aes-128-ctr';
            // $cipher = 'aes-128-gcm';
            $keyf = $_SESSION['key'];
            $options = 0;
            $iv_cipher = openssl_cipher_iv_length($cipher);
            $iv = 'YNKAK$QWNdatewaf';
            $tag = 'GCM';
            $aad = '';
            return openssl_decrypt($encrypted_data, $cipher, $keyf, $options, $iv);
        }

?>
