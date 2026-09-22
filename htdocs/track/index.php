$url = "https://vcet.ac.in/vcetattendance/start.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return content as a string
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow any HTTP redirects
curl_setopt($ch, CURLOPT_TIMEOUT, 10);          // Fail if it takes > 10 seconds

$content = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo $content;
}

curl_close($ch);
