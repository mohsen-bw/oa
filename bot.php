<?php
require_once('./line_class.php');
require_once('./unirest-php-master/src/Unirest.php');
$channelAccessToken = 'Wa2jA4F8Bo37/s4Qfq75gf8YvDmD4ulBmPSp7HzOTHPHPcLBFhqf6ex9dq/1sEh9OxDYldg1cyc+rWtjU+34p+fDxEN6dFiW/gq6OSGj+6spkEOZpCAHsM96+2unWdJPslWE8YkWl3S0Rm3GmQYp01GUYhWQfeY8sLGRXgo3xvw='; //sesuaikan 
$channelSecret = '0f3cde4cd3691acd977fc5d615edd134';//sesuaikan
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId     = $client->parseEvents()[0]['source']['userId'];
$groupId    = $client->parseEvents()[0]['source']['groupId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp  = $client->parseEvents()[0]['timestamp'];
$type       = $client->parseEvents()[0]['type'];
$message    = $client->parseEvents()[0]['message'];
$messageid  = $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = explode(" ", $message['text']);
$msg_type = $message['type'];
$command = $pesan_datang[0];
$options = $pesan_datang[1];
if (count($pesan_datang) > 2) {
    for ($i = 2; $i < count($pesan_datang); $i++) {
        $options .= '+';
        $options .= $pesan_datang[$i];
    }
}
#-------------------------[Function Open]-------------------------#
function tv($keyword) {
    $uri = "https://rest.farzain.com/api/acaratv.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Jadwal AcaraTV」";
    $result .= "\nStatus : ";
    $result .= $json['status'];
    $result .= "\nStasiun : " . $keyword . "-";
    $result .= "\nJadwal : ";
    $result .= $json['result'];
    $result .= "\n「Done~」";
    return $result;
}
function lirik($keyword) {
    $uri = "https://rest.farzain.com/api/joox.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Lirik Lagu」";
    $result .= "\nStatus : ";
    $result .= $json['status'];
    $result .= "\nPenyanyi : ";
    $result .= $json['info']['penyanyi'];
    $result .= "\nJudul : ";
    $result .= $json['info']['judul'];
    $result .= "\nAlbum : ";
    $result .= $json['info']['album'];
    $result .= "\n\nLirik : ";
    $result .= $json['lirik'];
    $result .= "\n「Done~」";
    return $result;
}
function img($keyword) {
    $uri = "https://rest.farzain.com/api/joox.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = $json['gambar'];
    return $result;
}
#-------------------------[Open]-------------------------#
function coolt($keyword) { 
    $uri = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20171227T171852Z.fda4bd604c7bf41f.f939237fb5f802608e9fdae4c11d9dbdda94a0b5&text=" . $keyword . "&lang=id-id"; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
    $result .= "https://api.farzain.com/cooltext.php?text=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    return $result; 
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function qr($keyword) { 
    $uri = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20171227T171852Z.fda4bd604c7bf41f.f939237fb5f802608e9fdae4c11d9dbdda94a0b5&text=" . $keyword . "&lang=id-id"; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
    $result .= "https://rest.farzain.com/api/qrcode.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    return $result; 
}
#-------------------------[Close]-------------------------#
function ahli($keyword) {
    $uri = "https://rest.farzain.com/api/ahli.php?name=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
  
    $response = Unirest\Request::get("$uri");
  
    $json = json_decode($response->raw_body, true);
    $result = "「Ahli」";
    $result .= "\nStatus : ";
    $result .= $json['status'];
    $result .= "\nNama : " . $keyword;
    $result .= "\nResult : ";
    $result .= $json['result']['result'];
    $result .= "\n「Done~」";
    return $parsed;
}
#-------------------------[Open]-------------------------#
function neon($keyword) { 
    $uri = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20171227T171852Z.fda4bd604c7bf41f.f939237fb5f802608e9fdae4c11d9dbdda94a0b5&text=" . $keyword . "&lang=id-id"; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
    $result .= "https://rest.farzain.com/api/photofunia/neon_sign.php?text=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    return $result; 
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function light($keyword) { 
    $uri = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20171227T171852Z.fda4bd604c7bf41f.f939237fb5f802608e9fdae4c11d9dbdda94a0b5&text=" . $keyword . "&lang=id-id"; 
 
    $response = Unirest\Request::get("$uri"); 
    $json = json_decode($response->raw_body, true); 
    $result .= "https://rest.farzain.com/api/photofunia/light_graffiti.php?text=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    return $result; 
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function quotes($keyword) {
    $uri = "https://rest.farzain.com/api/motivation.php?apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Quotes」";
    $result .= "\nStatus : ";
    $result .= $json['status'];
    $result .= "\nQuotes : ";
    $result .= $json['result']['quotes'];
    $result .= "\nBy : ";
    $result .= $json['result']['by'];
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
function arti($keyword) {
    $uri = "https://rest.farzain.com/api/nama.php?q=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Arti Nama」";
    $result .= "\nStatus : ";
    $result .= $json['status'];
    $result .= "\nNama : " . $keyword . "-";
    $result .= "\nArti Nama : ";
    $result .= $json['result'];
    $result .= "\n「Done~」";
    return $result;
}
function wiki($keyword) {
    $uri = "https://rest.farzain.com/api/wikipedia.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Wikipedia」";
    $result .= "\nStatus : ";
    $result .= $json['status'];
    $result .= "\nTitle : ";
    $result .= $json['title'];
    $result .= "\n\nDescription : ";
    $result .= $json['description'];
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Open]-------------------------#
function wib($keyword) {
    $uri = "https://time.siswadi.com/timezone/?address=Jakarta";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = array(); 
    $parsed['time'] = $json['time']['time'];
    $parsed['date'] = $json['time']['date'];
    return $parsed;
}
function wit($keyword) {
    $uri = "https://time.siswadi.com/timezone/?address=jayapura";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = array(); 
    $parsed['time'] = $json['time']['time'];
    $parsed['date'] = $json['time']['date'];
    return $parsed;
}
function wita($keyword) {
    $uri = "https://time.siswadi.com/timezone/?address=manado";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = array(); 
    $parsed['time'] = $json['time']['time'];
    $parsed['date'] = $json['time']['date'];
    return $parsed;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function tts($keyword) { 
    $uri = "https://translate.google.com/translate_tts?ie=UTF-8&tl=id-ID&client=tw-ob&q=" . $keyword; 

    $response = Unirest\Request::get("$uri"); 
    $result = $uri; 
    return $result; 
}
function song($keyword) { 
    $uri = "https://rest.farzain.com/api/joox.php?id=" .$keyword. "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA"; 

    $response = Unirest\Request::get("$uri"); 
    $result = $json['audio']['mp3'];
    return $result; 
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function urb_dict($keyword) {
    $uri = "http://api.urbandictionary.com/v0/define?term=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = $json['list'][0]['definition'];
    $result .= "\n\nExamples : \n";
    $result .= $json['list'][0]['example'];
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function zodiak($keyword) {
    $uri = "https://script.google.com/macros/exec?service=AKfycbw7gKzP-WYV2F5mc9RaR7yE3Ve1yN91Tjs91hp_jHSE02dSv9w&nama=ervan&tanggal=" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "「Zodiak Kamu」";
    $result .= "\nLahir : ";
    $result .= $json['data']['lahir'];
    $result .= "\nUsia : ";
    $result .= $json['data']['usia'];
    $result .= "\nUltah : ";
    $result .= $json['data']['ultah'];
    $result .= "\nZodiak : ";
    $result .= $json['data']['zodiak'];
    $result .= "\n\nPencarian : Google";
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function br($keyword) {
    $uri = "https://rest.farzain.com/api/brainly.php?id=" .$keyword. "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = array();
    $result = "「Informasi Brainly";
    $result .= "\nJudul :";
    $result .= $json['0'][title];
    $result .= "\nLink : ";
    $result .= $json['0'][url];
    $result .= "\n「Done~」";
    return $result;
}
function film_syn($keyword) {
    $uri = "http://www.omdbapi.com/?t=" . $keyword . '&plot=full&apikey=d5010ffe';

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "Judul : \n";
    $result .= $json['Title'];
    $result .= "\n\nSinopsis : \n";
    $result .= $json['Plot'];
    return $result;
}
#-------------------------[Close]-------------------------#
function connect($end_point, $post) {
	$_post = array();
	if (is_array($post)) {
		foreach ($post as $name => $value) {
			$_post[] = $name.'='.urlencode($value);
		}
	}
	$ch = curl_init($end_point);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	if (is_array($post)) {
		curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
	}
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
	$result = curl_exec($ch);
	if (curl_errno($ch) != 0 && empty($result)) {
		$result = false;
	}
	curl_close($ch);
	return $result;
}
function order($keyword) { 
$api_url = 'https://wstore.co.id/api/json.php'; // api url
$post_data = array(
	'key' => 'y4YVPe8RS2LA9p3cidhOqDjbkJsW6K',
	'action' => 'order',
	'service' => '787', 
	'link' => $keyword,
	'quantity' => '1000',
);
$api = json_decode(connect($api_url, $post_data));
print_r($api);
}
#-------------------------[Open]-------------------------#
function youtube($keyword) {
    $uri = "https://www.googleapis.com/youtube/v3/search?part=snippet&order=relevance&regionCode=lk&q=" . $keyword . "&key=AIzaSyB5cpL7DYDn_2c7QuExnGOZ1Wmg4AQmx8c&maxResults=10&type=video";
  
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = array();
    $parsed['a1'] = $json['items']['0']['id']['videoId'];
  $parsed['b1'] = $json['items']['0']['snippet']['title'];
  $parsed['c1'] = $json['items']['0']['snippet']['thumbnails']['high']['url'];
    $parsed['a2'] = $json['items']['1']['id']['videoId'];
  $parsed['b2'] = $json['items']['1']['snippet']['title'];
  $parsed['c2'] = $json['items']['1']['snippet']['thumbnails']['high']['url'];
    $parsed['a3'] = $json['items']['2']['id']['videoId'];
  $parsed['b3'] = $json['items']['2']['snippet']['title'];
  $parsed['c3'] = $json['items']['2']['snippet']['thumbnails']['high']['url'];
    $parsed['a4'] = $json['items']['3']['id']['videoId'];
  $parsed['b4'] = $json['items']['3']['snippet']['title'];
  $parsed['c4'] = $json['items']['3']['snippet']['thumbnails']['high']['url'];
    $parsed['a5'] = $json['items']['4']['id']['videoId'];
  $parsed['b5'] = $json['items']['4']['snippet']['title'];
  $parsed['c5'] = $json['items']['4']['snippet']['thumbnails']['high']['url'];
    $parsed['a6'] = $json['items']['5']['id']['videoId'];
  $parsed['b6'] = $json['items']['5']['snippet']['title'];
  $parsed['c6'] = $json['items']['5']['snippet']['thumbnails']['high']['url'];
    $parsed['a7'] = $json['items']['6']['id']['videoId'];
  $parsed['b7'] = $json['items']['6']['snippet']['title'];  
  $parsed['c7'] = $json['items']['6']['snippet']['thumbnails']['high']['url'];
    $parsed['a8'] = $json['items']['7']['id']['videoId'];
  $parsed['b8'] = $json['items']['7']['snippet']['title'];
  $parsed['c8'] = $json['items']['7']['snippet']['thumbnails']['high']['url'];
    $parsed['a9'] = $json['items']['8']['id']['videoId'];
  $parsed['b9'] = $json['items']['8']['snippet']['title'];
  $parsed['c9'] = $json['items']['8']['snippet']['thumbnails']['high']['url'];
    $parsed['a10'] = $json['items']['9']['id']['videoId'];
  $parsed['b10'] = $json['items']['9']['snippet']['title']; 
  $parsed['c10'] = $json['items']['9']['snippet']['thumbnails']['high']['url'];
    return $parsed;
}
#-------------------------[Open]-------------------------#
function film($keyword) {
    $uri = "http://www.omdbapi.com/?t=" . $keyword . '&plot=full&apikey=d5010ffe';

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "「Informasi Film」";
    $result .= "\nJudul :";
    $result .= $json['Title'];
    $result .= "\nRilis : ";
    $result .= $json['Released'];
    $result .= "\nTipe : ";
    $result .= $json['Genre'];
    $result .= "\nActors : ";
    $result .= $json['Actors'];
    $result .= "\nBahasa : ";
    $result .= $json['Language'];
    $result .= "\nNegara : ";
    $result .= $json['Country'];
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function shalat($keyword) {
    $uri = "https://time.siswadi.com/pray/" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "「Jadwal shalat」";
    $result .= "\nLokasi : ";
    $result .= $json['location']['address'];
    $result .= "\nTanggal : ";
    $result .= $json['time']['date'];
    $result .= "\n\nShubuh : ";
    $result .= $json['data']['Fajr'];
    $result .= "\nDzuhur : ";
    $result .= $json['data']['Dhuhr'];
    $result .= "\nAshar : ";
    $result .= $json['data']['Asr'];
    $result .= "\nMaghrib : ";
    $result .= $json['data']['Maghrib'];
    $result .= "\nIsya : ";
    $result .= $json['data']['Isha'];
    $result .= "\n\nPencarian : Google";
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
function instagram($keyword) {
    $uri = "https://rest.farzain.com/api/ig_profile.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
  
    $response = Unirest\Request::get("$uri");
  
    $json = json_decode($response->raw_body, true);
    $parsed = array();
    $parsed['a1'] = $json['info']['username'];
    $parsed['a2'] = $json['info']['bio'];
    $parsed['a3'] = $json['count']['followers'];
    $parsed['a4'] = $json['count']['following'];
    $parsed['a5'] = $json['count']['post'];
    $parsed['a6'] = $json['info']['full_name'];
    $parsed['a7'] = $json['info']['profile_pict'];
    $parsed['a8'] = "https://www.instagram.com/" . $keyword;
    return $parsed;
}
#-------------------------[Open]-------------------------#
function qibla($keyword) { 
    $uri = "https://time.siswadi.com/qibla/" . $keyword; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
 $result .= $json['data']['image'];
    return $result; 
}
//show menu, saat join dan command,menu
if ($command == '/menu') {
    $text .= "「Keyword RpdBot~」\n\n";
    $text .= "- Help\n";
    $text .= "- /jam \n";
    $text .= "- /quotes \n";
    $text .= "- /say [teks] \n";
    $text .= "- /definition [teks] \n";
    $text .= "- /cooltext [teks] \n";
    $text .= "- /shalat [lokasi] \n";
    $text .= "- /qiblat [lokasi] \n";
    $text .= "- /film [teks] \n";
    $text .= "- /qr [teks] \n";
    $text .= "- /neon [teks] \n";
    $text .= "- /ahli [nama] \n";
    $text .= "- /arti-nama [nama] \n";
    $text .= "- /light [teks] \n";
    $text .= "- /film-syn [Judul] \n";
    $text .= "- /lirik [Judul] \n";
    $text .= "- /wikipedia [Judul] \n";
  $text .= "- /brainly [pertanyaan] \n";
  $text .= "- /youtube [Judul] \n";
    $text .= "- /zodiak [tanggal lahir] \n";
        $text .= "- /instagram [unsername] \n";
        $text .= "- /jadwaltv [stasiun] \n";
    $text .= "- /creator \n";
    $text .= "\n「Done~」";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $text,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
        )
    );
}
if ($type == 'join') {
    $text = "Terimakasih Telah invite aku ke group ini silahkan ketik Help untuk lihat command aku :)";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $text,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
        )
    );
}
if($message['type']=='text') {
      if ($command == '/youtube') {
        $result = youtube($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
        array (
          'type' => 'template',
          'altText' => 'GabzBot',
          'template' => 
          array (
            'type' => 'carousel',
            'columns' => 
            array (
              0 => 
              array (
                'thumbnailImageUrl' => $result['c1'],
                'imageBackgroundColor' => '#FFFFFF',
                'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b1'], 0, 47)).'...',
                'actions' => 
                array (
                  0 => 
                  array (
                    'type' => 'uri',
                    'label' => 'Youtube',
                    'uri' => 'https://youtu.be/'.$result['a1'],
                  ),
                ),
              ),
              1 => 
              array (
                'thumbnailImageUrl' => $result['c2'],
                'imageBackgroundColor' => '#000000',
                'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b2'], 0, 47)).'...',
                'actions' => 
                array (
                  0 => 
                  array (
                    'type' => 'uri',
                    'label' => 'Youtube',
                    'uri' => 'https://youtu.be/'.$result['a2'],
                  ),
                ),
              ),  
              2 => 
              array (
                'thumbnailImageUrl' => $result['c3'],
                'imageBackgroundColor' => '#FFFFFF',
                'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b3'], 0, 47)).'...',
                'actions' => 
                array (
                  0 => 
                  array (
                    'type' => 'uri',
                    'label' => 'Youtube',
                    'uri' => 'https://youtu.be/'.$result['a3'],
                  ),
                ),
              ),            
              3 => 
              array (
                'thumbnailImageUrl' => $result['c4'],
                'imageBackgroundColor' => '#FFFFFF',
                'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b4'], 0, 47)).'...',
                'actions' => 
                array (
                  0 => 
                  array (
                    'type' => 'uri',
                    'label' => 'Youtube',
                    'uri' => 'https://youtu.be/'.$result['a4'],
                  ),
                ),
              ),
              4 => 
              array (
                'thumbnailImageUrl' => $result['c5'],
                'imageBackgroundColor' => '#FFFFFF',
                'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b5'], 0, 47)).'...',
                'actions' => 
                array (
                  0 => 
                  array (
                    'type' => 'uri',
                    'label' => 'Youtube',
                    'uri' => 'https://youtu.be/'.$result['a5'],
                  ),
                ),
              ),
              5 => 
              array (
                'thumbnailImageUrl' => $result['c6'],
                'imageBackgroundColor' => '#FFFFFF',
                'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b6'], 0, 47)).'...',
                'actions' => 
                array (
                  0 => 
                  array (
                    'type' => 'uri',
                    'label' => 'Youtube',
                    'uri' => 'https://youtu.be/'.$result['a6'],
                  ),
                ),
              ),            
              6 => 
              array (
                'thumbnailImageUrl' => $result['c7'],
                'imageBackgroundColor' => '#FFFFFF',
                'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b7'], 0, 47)).'...',
                'actions' => 
                array (
                  0 => 
                  array (
                    'type' => 'uri',
                    'label' => 'Youtube',
                    'uri' => 'https://youtu.be/'.$result['a7'],
                  ),
                ),
              ),            
              7 => 
              array (
                'thumbnailImageUrl' => $result['c8'],
                'imageBackgroundColor' => '#FFFFFF',
                'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b8'], 0, 47)).'...',
                'actions' => 
                array (
                  0 => 
                  array (
                    'type' => 'uri',
                    'label' => 'Youtube',
                    'uri' => 'https://youtu.be/'.$result['a8'],
                  ),
                ),
              ),            
            ),
            'imageAspectRatio' => 'rectangle',
            'imageSize' => 'cover',
          ),
        )   
            )
        );
}
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/quotes') {
        $result = quotes($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}   
#-------------------------[Close]-------------------------#
if($message['type']=='text') {
 if ($command == '/brainly') {
  $uri = "https://rest.farzain.com/api/brainly.php?id=". $options ."&apikey=ppqeuy";
  $response = Unirest\Request::get("$uri");
        $json = json_decode($response->raw_body, true);
        $responses['replyToken'] = $replyToken;
        $responses['messages']['0']['type'] = "template";
        $responses['messages']['0']['altText'] = "Brainly";
        $responses['messages']['0']['template']['type'] = "carousel";
        $responses['messages']['0']['template']['columns'][0]['thumnnailImageUrl'] = NULL;
        $responses['messages']['0']['template']['columns'][0]['imageBackgroundColor'] = "#FFFFFF";
        $responses['messages']['0']['template']['columns'][0]['title'] = 'Result 1';
        $responses['messages']['0']['template']['columns'][0]['text'] = substr($json['0']['title'],0,55);
        $responses['messages']['0']['template']['columns'][0]['actions'][0]['type'] = 'uri';
        $responses['messages']['0']['template']['columns'][0]['actions'][0]['label'] = 'URL';
        $responses['messages']['0']['template']['columns'][0]['actions'][0]['uri'] = $json['0']['url'];
        $responses['messages']['0']['template']['columns'][1]['thumnnailImageUrl'] = NULL;
        $responses['messages']['0']['template']['columns'][1]['imageBackgroundColor'] = "#FFFFFF";
        $responses['messages']['0']['template']['columns'][1]['title'] = 'Result 2';
        $responses['messages']['0']['template']['columns'][1]['text'] = substr($json['1']['title'],0,55);
        $responses['messages']['0']['template']['columns'][1]['actions'][0]['type'] = 'uri';
        $responses['messages']['0']['template']['columns'][1]['actions'][0]['label'] = 'URL';
        $responses['messages']['0']['template']['columns'][1]['actions'][0]['uri'] = $json['1']['url'];
        $responses['messages']['0']['template']['columns'][2]['thumnnailImageUrl'] = NULL;
        $responses['messages']['0']['template']['columns'][2]['imageBackgroundColor'] = "#FFFFFF";
        $responses['messages']['0']['template']['columns'][2]['title'] = 'Result 3';
        $responses['messages']['0']['template']['columns'][2]['text'] = substr($json['2']['title'],0,55);
        $responses['messages']['0']['template']['columns'][2]['actions'][0]['type'] = 'uri';
        $responses['messages']['0']['template']['columns'][2]['actions'][0]['label'] = 'URL';
        $responses['messages']['0']['template']['columns'][2]['actions'][0]['uri'] = $json['2']['url'];
        $responses['messages']['0']['template']['columns'][3]['thumnnailImageUrl'] = NULL;
        $responses['messages']['0']['template']['columns'][3]['imageBackgroundColor'] = "#FFFFFF";
        $responses['messages']['0']['template']['columns'][3]['title'] = 'Result 4';
        $responses['messages']['0']['template']['columns'][3]['text'] = substr($json['3']['title'],0,55);
        $responses['messages']['0']['template']['columns'][3]['actions'][0]['type'] = 'uri';
        $responses['messages']['0']['template']['columns'][3]['actions'][0]['label'] = 'URL';
        $responses['messages']['0']['template']['columns'][3]['actions'][0]['uri'] = $json['3']['url'];
        $responses['messages']['0']['template']['columns'][4]['thumnnailImageUrl'] = NULL;
        $responses['messages']['0']['template']['columns'][4]['imageBackgroundColor'] = "#FFFFFF";
        $responses['messages']['0']['template']['columns'][4]['title'] = 'Result 5';
        $responses['messages']['0']['template']['columns'][4]['text'] = substr($json['4']['title'],0,55);
        $responses['messages']['0']['template']['columns'][4]['actions'][0]['type'] = 'uri';
        $responses['messages']['0']['template']['columns'][4]['actions'][0]['label'] = 'URL';
        $responses['messages']['0']['template']['columns'][4]['actions'][0]['uri'] = $json['4']['url'];
        
        $result = json_encode($responses);
        $result_json = json_decode($result, TRUE);
  $balas=$result_json;
 }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
      if ($command == '/br') {
        $result = br($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
if($message['type']=='text') {
if ($command == '/jam') { 
     
        $result = wib($options); 
        $result2 = wit($options); 
        $result3 = wita($options); 
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                  'type' => 'template', 
                  'altText' => 'iran', 
                  'template' =>  
                  array ( 
                    'type' => 'carousel', 
                    'columns' =>  
                    array ( 
                      0 =>  
                      array ( 
                        'thumbnailImageUrl' => 'https://preview.ibb.co/gXGfLU/20180913_194713.jpg', 
                        'imageBackgroundColor' => '#FFFFFF', 
                        'title' => 'WIB', 
                        'text' => 'Jam iran WIB', 
                        'actions' =>  
                        array ( 
                          0 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result['time'], 
                            'data' => $result['time'], 
                          ), 
                          1 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result['date'],
                            'data' => $result['date'],
                          ), 
                        ), 
                      ), 
                      1 =>  
                      array ( 
                        'thumbnailImageUrl' => 'https://preview.ibb.co/nxaPfU/20180913_194725.jpg', 
                        'imageBackgroundColor' => '#000000', 
                        'title' => 'WIT', 
                        'text' => 'Jam iran WIT', 
                        'actions' =>  
                        array ( 
                          0 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result2['time'], 
                            'data' => $result2['time'], 
                          ), 
                          1 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result2['date'],
                            'data' => $result2['date'],
                          ), 
                        ), 
                      ), 
                      2 =>  
                      array ( 
                        'thumbnailImageUrl' => 'https://preview.ibb.co/cPdc0U/20180913_194744.jpg', 
                        'imageBackgroundColor' => '#000000', 
                        'title' => 'WITA', 
                        'text' => 'Jam iran WITA', 
                        'actions' =>  
                        array ( 
                          0 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result3['time'], 
                            'data' => $result3['time'], 
                          ), 
                          1 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result3['date'],
                            'data' => $result3['date'],
                          ), 
                        ),  
                      ),
                    ), 
                  ), 
                ) 
            ) 
        ); 
}
}
if($message['type']=='text') {
        if ($command == '/jadwaltv') {
        $result = tv($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
#-------------------------[Open]-------------------------#
#-------------------------[Open]-------------------------#  
if($message['type']=='text') {
    if ($command == '/instagram') { 
        
        $result = instagram($options);
        $altText2 = "Followers : " . $result['a3'];
        $altText2 .= "\nFollowing :" . $result['a4'];
        $altText2 .= "\nPost :" . $result['a5'];
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Instagram @' . $options, 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result['a7'], 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => $result['a6'], 
                            'text' => $altText2, 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Check', 
                                'uri' => $result['a8'],
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
    if ($command == '/say') {

        $result = tts($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
                'type' => 'audio',
                'originalContentUrl' => $result,
                'duration' => 10000,
                )
            )
        );
}
}
if($message['type']=='text') {
    if ($command == '/song') {

        $result = song($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
                'type' => 'audio',
                'originalContentUrl' => $result,
                'duration' => 10000,
                )
            )
        );
}
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if ($message['type'] == 'text') {
    if ($command == '/definition') {
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Definition : ' . urb_dict($options)
                )
            )
        );
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/ahli') { 
     
        $result = ahli($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            ) 
        ); 
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/cooltext') {
        $result = coolt($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                  'type' => 'image',
                  'originalContentUrl' => $result,
                  'previewImageUrl' => $result
                )
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/zodiak') {

        $result = zodiak($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
if($message['type']=='text') {
        if ($command == '/lirik') {
        $result2 = imgj($options);
        $result = lirik($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                  'type' => 'image',
                  'originalContentUrl' => $result2,
                  'previewImageUrl' => $result2
                ),
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/creator') { 
     
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'About Creator RpdBot', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => 'https://bpptik.kominfo.go.id/wp-content/uploads/2016/09/Programmer.jpg', 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Muhammad Raihan P.', 
                            'text' => 'Creator RpdBot', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Contact', 
                                'uri' => 'https://line.me/ti/p/~@ntq3882j', 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/film-syn') {
        $result = film_syn($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/film') {

        $result = film($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/shalat') {

        $result = shalat($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
if($message['type']=='text') {
        if ($command == '/wikipedia') {

        $result = wiki($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
if($message['type']=='text') {
        if ($command == '/test1') {

        $result = shalat($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
                  'type' => 'flex',
                  'altText' => 'this is a flex message',
                  'contents' => 
                  array (
                    'type' => 'bubble',
                    'body' => 
                    array (
                      'type' => 'box',
                      'layout' => 'vertical',
                      'contents' => 
                      array (
                        0 => 
                        array (
                          'type' => 'text',
                          'text' => $result,
                          'wrap' => True,
                        ),
                      ),
                    ),
                  ),
                )
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/qiblat') { 
     
        $result = qibla($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Qiblat shalat', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result, 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Qiblat Shalat', 
                            'text' => 'Cek Full Image', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Click Here', 
                                'uri' => $result, 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#----------------------------------#
if($message['type']=='text') {
        if ($command == '/arti-nama') {
        $result = arti($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array( 
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
#----------------------------------#
if($message['type']=='text') {
        if ($command == 'Help' || $command == 'help') {
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
                      'type' => 'template',
                      'altText' => 'this is a image carousel template',
                      'template' => 
                      array (
                        'type' => 'image_carousel',
                        'columns' => 
                        array (
                          0 => 
                          array (
                            'imageUrl' => 'https://is5-ssl.mzstatic.com/image/thumb/Purple118/v4/64/c9/6f/64c96f0c-0202-09f6-78b5-1ef915086215/Prod-1x_U007emarketing-85-220-0-5.png/246x0w.jpg',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Instagram',
                              'text' => 'Contoh: /instagram jokowi',
                            ),
                          ),
                          1 => 
                          array (
                            'imageUrl' => 'https://rest.farzain.com/api/photofunia/neon_sign.php?text=RpdBot&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Neon Teks',
                              'text' => 'Contoh: /neon RpdBot Mantap',
                            ),
                          ),
                          2 => 
                          array (
                            'imageUrl' => 'https://pbs.twimg.com/profile_images/907880885848088578/maJDkfTn_400x400.jpg',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'TTS',
                              'text' => 'Contoh: /say Mantap Jiwa',
                            ),
                          ),
                          3 => 
                          array (
                            'imageUrl' => 'https://bestanimations.com/HomeOffice/Clocks/clock-animated-gif-5.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Jam Indo',
                              'text' => '/jam',
                            ),
                          ),
                          4 => 
                          array (
                            'imageUrl' => 'https://bpptik.kominfo.go.id/wp-content/uploads/2016/09/Programmer.jpg',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Creator',
                              'text' => '/creator',
                            ),
                          ),
                          5 => 
                          array (
                            'imageUrl' => 'https://2.bp.blogspot.com/-rj1nxBPkzT0/UEJCW4qHsGI/AAAAAAAAAu0/6xKNlKRHi9U/s1600/perahi+kertas.jpg',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Lirik',
                              'text' => 'Contoh: /lirik asal kau bahagia',
                            ),
                          ),
                          6 => 
                          array (
                            'imageUrl' => 'https://www.dailygizmo.tv/wp-content/uploads/2016/04/Joox-Logo-1440x937.jpg',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Music',
                              'text' => 'Contoh: /song asal kau bahagia',
                            ),
                          ),
                          7 => 
                          array (
                            'imageUrl' => 'https://www.kiblat.net/files/2018/02/shalat.jpg',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Shalat',
                              'text' => 'Contoh: /shalat Bandung',
                            ),
                          ),
                          8 => 
                          array (
                            'imageUrl' => 'https://us.123rf.com/450wm/nulinukas/nulinukas1202/nulinukas120200019/12251019-boy-watching-tv-cartoon.jpg?ver=6',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Jadwal Tv',
                              'text' => 'Contoh: /jadwaltv rcti',
                            ),
                          ),
                          9 => 
                          array (
                            'imageUrl' => 'https://pa1.narvii.com/6342/76ec050c2d184bbe728f7cedd48aadc29250b325_hq.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'More Command',
                              'text' => '/menu',
                            ),
                          ),
                        ),
                      ),
                    )
            )
        );
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/qr') { 
     
        $result = qr($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Qr-code Generator', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result, 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Qr-code', 
                            'text' => 'Cek Full Image', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Click Here', 
                                'uri' => $result, 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/neon') { 
     
        $result = neon($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Neon teks', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result, 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Teks Image Generator', 
                            'text' => 'Cek Full Image', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Click Here', 
                                'uri' => $result, 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/light') { 
     
        $result = light($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Light teks', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result, 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Teks Image Generator', 
                            'text' => 'Cek Full Image', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Click Here', 
                                'uri' => $result, 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
if (isset($balas)) {
    $result = json_encode($balas);
//$result = ob_get_clean();
    file_put_contents('./balasan.json', $result);
    $client->replyMessage($balas);
}
?>
