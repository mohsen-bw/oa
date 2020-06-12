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
    $uri = "https://time.siswadi.com/timezone/?address=Tehran";
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
function manga($keyword) {
    $fullurl = 'https://myanimelist.net/api/manga/search.xml?q=' . $keyword;
    $username = 'jamal3213';
    $password = 'FZQYeZ6CE9is';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_URL, $fullurl);
    $returned = curl_exec($ch);
    $xml = new SimpleXMLElement($returned);
    $parsed = array();
    $parsed['id'] = (string) $xml->entry[0]->id;
    $parsed['image'] = (string) $xml->entry[0]->image;
    $parsed['title'] = (string) $xml->entry[0]->title;
    $parsed['desc'] = "Episode : ";
    $parsed['desc'] .= $xml->entry[0]->episodes;
    $parsed['desc'] .= "\nNilai : ";
    $parsed['desc'] .= $xml->entry[0]->score;
    $parsed['desc'] .= "\nTipe : ";
    $parsed['desc'] .= $xml->entry[0]->type;
    $parsed['synopsis'] = str_replace("<br />", "\n", html_entity_decode((string) $xml->entry[0]->synopsis, ENT_QUOTES | ENT_XHTML, 'UTF-8'));
    return $parsed;
}
function manga_syn($keyword) {
    $parsed = manga($keyword);
    $result = "Judul : " . $parsed['title'];
    $result .= "\n\nSynopsis :\n" . $parsed['synopsis'];
    return $result;
}
function anime($keyword) {
    $fullurl = 'https://myanimelist.net/api/anime/search.xml?q=' . $keyword;
    $username = 'jamal3213';
    $password = 'FZQYeZ6CE9is';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_URL, $fullurl);
    $returned = curl_exec($ch);
    $xml = new SimpleXMLElement($returned);
    $parsed = array();
    $parsed['id'] = (string) $xml->entry[0]->id;
    $parsed['image'] = (string) $xml->entry[0]->image;
    $parsed['title'] = (string) $xml->entry[0]->title;
    $parsed['desc'] = "Episode : ";
    $parsed['desc'] .= $xml->entry[0]->episodes;
    $parsed['desc'] .= "\nNilai : ";
    $parsed['desc'] .= $xml->entry[0]->score;
    $parsed['desc'] .= "\nTipe : ";
    $parsed['desc'] .= $xml->entry[0]->type;
    $parsed['synopsis'] = str_replace("<br />", "\n", html_entity_decode((string) $xml->entry[0]->synopsis, ENT_QUOTES | ENT_XHTML, 'UTF-8'));
    return $parsed;
}
function anime_syn($keyword) {
    $parsed = anime($keyword);
    $result = "Judul : " . $parsed['title'];
    $result .= "\n\nSynopsis :\n" . $parsed['synopsis'];
    return $result;
}
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
function githubrepo($keyword) { 
    $uri = "https://api.github.com/search/repositories?q=" . $keyword; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
    $result = "====[GithubRepo]====";
    $result .= "\n====[1]====";
    $result .= "\nResult : ";
    $result .= $json['total_count'];
    $result .= "\nNama Repository : ";
    $result .= $json['items']['data']['name'];
    $result .= "\nNama Github : ";
    $result .= $json['items']['full_name'];
    $result .= "\nLanguage : ";
    $result .= $json['items']['language'];
    $result .= "\nUrl Github : ";
    $result .= $json['items']['owner']['html_url'];
    $result .= "\nUrl Repository : ";
    $result .= $json['items']['html_url'];
    $result .= "\nPrivate : ";
    $result .= $json['items']['private'];
    $result .= "\n====[2]====";
    $result .= "\nResult : ";
    $result .= $json['total_count'];
    $result .= "\nNama Repository : ";
    $result .= $json['items'][['name']];
    $result .= "\nNama Github : ";
    $result .= $json['items']['full_name'];
    $result .= "\nLanguage : ";
    $result .= $json['items']['language'];
    $result .= "\nUrl Github : ";
    $result .= $json['items']['owner']['html_url'];
    $result .= "\nUrl Repository : ";
    $result .= $json['items']['html_url'];
    $result .= "\nPrivate : ";
    $result .= $json['items']['private'];
    $result .= "\n====[3]====";
    $result .= "\nResult : ";
    $result .= $json['total_count'];
    $result .= "\nNama Repository : ";
    $result .= $json['items']['name'];
    $result .= "\nNama Github : ";
    $result .= $json['items']['full_name'];
    $result .= "\nLanguage : ";
    $result .= $json['items']['language'];
    $result .= "\nUrl Github : ";
    $result .= $json['items']['owner']['html_url'];
    $result .= "\nUrl Repository : ";
    $result .= $json['items']['html_url'];
    $result .= "\nPrivate : ";
    $result .= $json['items']['private'];
    $result .= "\n====[GithubRepo]====\n";
    $result .= "\n\nPencarian : Google";
    $result .= "\n====[GithubRepo]====";
    return $result; 
}
#-------------------------[Function]-------------------------#
function img_search($keyword) {
    $uri = 'https://www.google.co.id/search?q=' . $keyword . '&safe=off&source=lnms&tbm=isch';

    $response = Unirest\Request::get("$uri");

    $hasil = str_replace(">", "&gt;", $response->raw_body);
    $arrays = explode("<", $hasil);
    return explode('"', $arrays[291])[3];
}
#-------------------------[Function]-------------------------#
#-----------------------------------------------------------#
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
    $text .= "「Keyword ★ᖼᗱO꓅★~」\n\n";
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
  'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻',
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
    $text = "ســ͢͜͡✾ٜٜٜٜٜٜٖٖٖٖٜ̂̂̂̂̂̂͢͜͡✾ـلــام دوســ͢͜͡✾ٜٜٜٜٜٜٖٖٖٖٜ̂̂̂̂̂̂͢͜͡✾ـتــانــ      از ایــنــڪــه م͢͜͡ـ✾ٜٜٜٜٜٜٖٖٖٖٜ̂̂̂̂̂̂͢͜͡✾ــن را بــه گـ͢͜͡✾ٜٜٜٜٜٜٖٖٖٖٜ̂̂̂̂̂̂͢͜͡✾ـــروه خــودتـ͢͜͡✾ٜٜٜٜٜٜٖٖٖٖٜ̂̂̂̂̂̂͢͜͡✾ـون دعــوت ڪــردیـ͢͜͡✾ٜٜٜٜٜٜٖٖٖٖٜ̂̂̂̂̂̂͢͜͡✾ـــد     مــمــنــونـ͢͜͡✾ٜٜٜٜٜٜٖٖٖٖٜ̂̂̂̂̂̂͢͜͡✾ــمــ       امــیـ͢͜͡✾ٜٜٜٜٜٜٖٖٖٖٜ̂̂̂̂̂̂͢͜͡✾ـدوارم  لــحــظـ͢͜͡✾ٜٜٜٜٜٜٖٖٖٖٜ̂̂̂̂̂̂͢͜͡✾ــات خــوبــی را   در ڪــنــ͢͜͡✾ٜٜٜٜٜٜٖٖٖٖٜ̂̂̂̂̂̂͢͜͡✾ــار هم ســپــری ڪــنــیــم :)";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array (
  'type' => 'flex',
  'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻',
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
          'altText' => '[┄┅═☆ᖼOᗱᗴℕ☆═┅┄]',
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
  'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻',
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
        $responses['messages']['0']['template']['columns'][0]['imageBackgroundColor'] = "#FF00FF";
        $responses['messages']['0']['template']['columns'][0]['title'] = 'Result 1';
        $responses['messages']['0']['template']['columns'][0]['text'] = substr($json['0']['title'],0,55);
        $responses['messages']['0']['template']['columns'][0]['actions'][0]['type'] = 'uri';
        $responses['messages']['0']['template']['columns'][0]['actions'][0]['label'] = 'URL';
        $responses['messages']['0']['template']['columns'][0]['actions'][0]['uri'] = $json['0']['url'];
        $responses['messages']['0']['template']['columns'][1]['thumnnailImageUrl'] = NULL;
        $responses['messages']['0']['template']['columns'][1]['imageBackgroundColor'] = "#FF00FF";
        $responses['messages']['0']['template']['columns'][1]['title'] = 'Result 2';
        $responses['messages']['0']['template']['columns'][1]['text'] = substr($json['1']['title'],0,55);
        $responses['messages']['0']['template']['columns'][1]['actions'][0]['type'] = 'uri';
        $responses['messages']['0']['template']['columns'][1]['actions'][0]['label'] = 'URL';
        $responses['messages']['0']['template']['columns'][1]['actions'][0]['uri'] = $json['1']['url'];
        $responses['messages']['0']['template']['columns'][2]['thumnnailImageUrl'] = NULL;
        $responses['messages']['0']['template']['columns'][2]['imageBackgroundColor'] = "#FF00FF";
        $responses['messages']['0']['template']['columns'][2]['title'] = 'Result 3';
        $responses['messages']['0']['template']['columns'][2]['text'] = substr($json['2']['title'],0,55);
        $responses['messages']['0']['template']['columns'][2]['actions'][0]['type'] = 'uri';
        $responses['messages']['0']['template']['columns'][2]['actions'][0]['label'] = 'URL';
        $responses['messages']['0']['template']['columns'][2]['actions'][0]['uri'] = $json['2']['url'];
        $responses['messages']['0']['template']['columns'][3]['thumnnailImageUrl'] = NULL;
        $responses['messages']['0']['template']['columns'][3]['imageBackgroundColor'] = "#FF00FF";
        $responses['messages']['0']['template']['columns'][3]['title'] = 'Result 4';
        $responses['messages']['0']['template']['columns'][3]['text'] = substr($json['3']['title'],0,55);
        $responses['messages']['0']['template']['columns'][3]['actions'][0]['type'] = 'uri';
        $responses['messages']['0']['template']['columns'][3]['actions'][0]['label'] = 'URL';
        $responses['messages']['0']['template']['columns'][3]['actions'][0]['uri'] = $json['3']['url'];
        $responses['messages']['0']['template']['columns'][4]['thumnnailImageUrl'] = NULL;
        $responses['messages']['0']['template']['columns'][4]['imageBackgroundColor'] = "#FF00FF";
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
                        'thumbnailImageUrl' => 'https://lh3.googleusercontent.com/-PyB9SWHrjLA/XkXUeDdiQZI/AAAAAAAABtI/nUTNSgszj5MYENb6S7f8SdlYRNUk4cAkgCK8BGAsYHg/s500/2020-02-13.gif', 
                        'imageBackgroundColor' => '#FFFFFF', 
                        'title' => 'CREATOR BOT', 
                        'text' => '☻▬═✿ᖼOᗱᗴℕ✿═▬☻', 
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
                        'thumbnailImageUrl' => 'https://lh3.googleusercontent.com/-x7FdoClGz0M/XsP26-b_FoI/AAAAAAAAEyU/KmkmCjDFeF0ljDkEp-TynApjGR1Nsq_8wCK8BGAsYHg/s512/2020-05-19.png', 
                        'imageBackgroundColor' => '#000000', 
                        'title' => 'WIT', 
                        'text' => '☻▬═★ᖼᗱO꓅★═▬☻', 
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
                        'thumbnailImageUrl' => 'https://lh3.googleusercontent.com/-01ffSpLcBfw/XoQRI4a2wYI/AAAAAAAAD0k/oAZE-diXGPw4XGoh4Cm45wMvHB3HOamdgCK8BGAsYHg/s424/2020-03-31.png', 
                        'imageBackgroundColor' => '#000000', 
                        'title' => '☻▬═Ƥєяѕιαη═▬☻', 
                        'text' => '♡ᶫᵒᵛᵉᵧₒᵤ♡ᴾᵉʳˢᶤᵃᶰ♡ᵇᵒᵗ♡', 
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
        if ($command == '/tv') {
        $result = tv($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻',
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
if($message['type']=='text') {
	    if ($command == '/anime' || $command == '/Anime') {
        $result = anime($options);
        $altText = "Title : " . $result['title'];
        $altText .= "\n\n" . $result['desc'];
        $altText .= "\nMAL Page : https://myanimelist.net/anime/" . $result['id'];
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'template',
                    'altText' => $altText,
                    'template' => array(
                        'type' => 'buttons',
                        'title' => $result['title'],
                        'thumbnailImageUrl' => $result['image'],
                        'text' => $result['desc'],
                        'actions' => array(
                            array(
                                'type' => 'postback',
                                'label' => 'Baca Sinopsis-nya',
                                'data' => 'action=add&itemid=123',
                                'text' => '/anime-syn ' . $options
                            ),
                            array(
                                'type' => 'uri',
                                'label' => 'Website MAL',
                                'uri' => 'https://myanimelist.net/anime/' . $result['id']
                            )
                        )
                    )
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '/manga') {
        $result = manga($options);
        $altText = "Title : " . $result['title'];
        $altText .= "\n\n" . $result['desc'];
        $altText .= "\nMAL Page : https://myanimelist.net/manga/" . $result['id'];
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'template',
                    'altText' => $altText,
                    'template' => array(
                        'type' => 'buttons',
                        'title' => $result['title'],
                        'thumbnailImageUrl' => $result['image'],
                        'text' => $result['desc'],
                        'actions' => array(
                            array(
                                'type' => 'postback',
                                'label' => 'Baca Sinopsis-nya',
                                'data' => 'action=add&itemid=123',
                                'text' => '/manga-syn' . $options
                            ),
                            array(
                                'type' => 'uri',
                                'label' => 'Website MAL',
                                'uri' => 'https://myanimelist.net/manga/' . $result['id']
                            )
                        )
                    )
                )
            )
        );
    }
}
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
if($message['type']=='text') {
	    if ($command == '/joox') {
        $result = musiknya($options);
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
	    if ($command == '/gambar') {
        $result = gambarnya($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                  'type' => 'image',
                  'originalContentUrl' => $jawab,
                  'previewImageUrl' => $jawab
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '/fansign') {
        $result = fansign($options);
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
if($message['type']=='text') {
	    if ($command == '/jadwaltv') {
        $result = jadwaltv($options);
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
  'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻',
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
if($message['type']=='text') {
	    if ($command == '-lokasi' || $command == '-Lokasi') {

        $result = lokasi($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'location',
                    'title' => 'Lokasi',
                    'address' => $result['address'],
                    'latitude' => $result['latitude'],
                    'longitude' => $result['longitude']
                ),
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
  'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻',
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
  'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻',
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
                          'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => 'https://lh3.googleusercontent.com/-EcyhY1gENdM/Xth9WMpmqMI/AAAAAAAAFI0/zkdCARVcIpgQSs8Etq34fQb7aBzr1lYCACK8BGAsYHg/s512/2020-06-03.png', 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'TEAM BOT PERSIAN', 
                            'text' => 'Creator MOSEN', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'ADD ME', 
                                'uri' => 'https://line.me/ti/p/~m_bw', 
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
  'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻',
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
  'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻',
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
  'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻',
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
//fitur sound cloud
#-------------------------[Function]-------------------------#
function kalender($keyword) {
    $uri = "https://time.siswadi.com/pray/" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "====[Kalender]====";
    $result .= "\nLokasi : ";
	$result .= $json['location']['address'];
	$result .= "\nTanggal : ";
	$result .= $json['time']['date'];
	$result .= "\n\nPencarian : Google";
	$result .= "\n====[Kalender]====";
    return $result;
}
#-------------------------[Function]-------------------------#
function waktu($keyword) {
    $uri = "https://time.siswadi.com/pray/" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "====[Time]====";
    $result .= "\nLokasi : ";
	$result .= $json['location']['address'];
	$result .= "\nJam : ";
	$result .= $json['time']['time'];
	$result .= "\nSunrise : ";
	$result .= $json['debug']['sunrise'];
	$result .= "\nSunset : ";
	$result .= $json['debug']['sunset'];
	$result .= "\n\nPencarian : Google";
	$result .= "\n====[Time]====";
    return $result;
}
#-------------------------[Function]-------------------------#
function saveitoffline($keyword) {
    $uri = "https://www.saveitoffline.com/process/?url=" . $keyword . '&type=json';

    $response = Unirest\Request::get("$uri");


    $json = json_decode($response->raw_body, true);
	$result = "====[SaveOffline]====\n";
	$result .= "Judul : \n";
	$result .= $json['title'];
	$result .= "\n\nUkuran : \n";
	$result .= $json['urls'][0]['label'];
	$result .= "\n\nURL Download : \n";
	$result .= $json['urls'][0]['id'];
	$result .= "\n\nUkuran : \n";
	$result .= $json['urls'][1]['label'];
	$result .= "\n\nURL Download : \n";
	$result .= $json['urls'][1]['id'];
	$result .= "\n\nUkuran : \n";
	$result .= $json['urls'][2]['label'];	
	$result .= "\n\nURL Download : \n";
	$result .= $json['urls'][2]['id'];
	$result .= "\n\nUkuran : \n";
	$result .= $json['urls'][3]['label'];	
	$result .= "\n\nURL Download : \n";
	$result .= $json['urls'][3]['id'];	
	$result .= "\n\nPencarian : Google\n";
	$result .= "====[SaveOffline]====";
    return $result;
}
#-------------------------[Function]-------------------------#
function qibla($keyword) { 
    $uri = "https://time.siswadi.com/qibla/" . $keyword; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
 $result .= $json['data']['image'];
    return $result; 
}
// ----- LOCATION BY Prank -----
function lokasi($keyword) { 
    $uri = "https://time.siswadi.com/pray/" . $keyword; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
 $result['address'] .= $json['location']['address'];
 $result['latitude'] .= $json['location']['latitude'];
 $result['longitude'] .= $json['location']['longitude'];
    return $result; 
}

#-------------------------[Function]-------------------------#
function cuaca($keyword) {
    $uri = "http://api.openweathermap.org/data/2.5/weather?q=" . $keyword . ",ID&units=metric&appid=e172c2f3a3c620591582ab5242e0e6c4";
    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "====[InfoCuaca]====";
    $result .= "\nKota : ";
	$result .= $json['name'];
	$result .= "\nCuaca : ";
	$result .= $json['weather']['0']['main'];
	$result .= "\nDeskripsi : ";
	$result .= $json['weather']['0']['description'];
	$result .= "\n\nPencariaan : Google";
	$result .= "\n====[InfoCuaca]====";
    return $result;
}
#-------------------------[Function]-------------------------#
function urb_dict($keyword) {
    $uri = "http://api.urbandictionary.com/v0/define?term=" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = $json['list'][0]['definition'];
    $result .= "\n\nExamples : \n";
    $result .= $json['list'][0]['example'];
    return $result;
}
#-------------------------[Function]-------------------------#
function qrcode($keyword) {
    $uri = "http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=" . $keyword;

    return $uri;
}
#-------------------------[Function]-------------------------#
function adfly($url, $key, $uid, $domain = 'adf.ly', $advert_type = 'int')
{
  // base api url
  $api = 'http://api.adf.ly/api.php?';

  // api queries
  $query = array(
    '7970aaad57427df04129cfe2cfcd0584' => $key,
    '16519547' => $uid,
    'advert_type' => $advert_type,
    'domain' => $domain,
    'url' => $url
  );

  // full api url with query string
  $api = $api . http_build_query($query);
  // get data
  if ($data = file_get_contents($api))
    return $data;
}
#----------------#
function send($input, $rt){
    $send = array(
        'replyToken' => $rt,
        'messages' => array(
            array(
                'type' => 'text',					
                'text' => $input
            )
        )
    );
    return($send);
}

function jawabs(){
    $list_jwb = array(
		'Ya',
		'Tidak',
		'Coba ajukan pertanyaan lain',	    
		);
    $jaws = array_rand($list_jwb);
    $jawab = $list_jwb[$jaws];
    return($jawab);
}

function kapan(){
    $list_jwb = array(
		'Besok',
		'1 Hari Lagi',
		'1 Bulan Lagi',
		'1 Tahun Lagi',
		'1 Abad Lagi',
		'Coba ajukan pertanyaan lain',	    
		);
    $jaws = array_rand($list_jwb);
    $jawab = $list_jwb[$jaws];
    return($jawab);
}

function bisa(){
    $list_jwb = array(
		'Bisa',
		'Tidak Bisa',
		'Bisa Jadi',
		'Mungkin Tidak Bisa',
		'Coba ajukan pertanyaan lain',	    
		);
    $jaws = array_rand($list_jwb);
    $jawab = $list_jwb[$jaws];
    return($jawab);
}

function dosa(){
    $list_jwb = array(
		'10%',
		'20%',
		'30%',
		'40%',
		'50%',
		'60%',
		'70%',
		'80%',
		'90%',
		'100%'	
		);
    $jaws = array_rand($list_jwb);
    $jawab = $list_jwb[$jaws];
    return($jawab);
}

function dosa2(){
    $list_jwb = array(
		'Dosanya Sebesar ',
		);
    $jaws = array_rand($list_jwb);
    $jawab = $list_jwb[$jaws];
    return($jawab);
}
function dosa3(){
    $list_jwb = array(
		' Cepat cepat tobat bos',
		);
    $jaws = array_rand($list_jwb);
    $jawab = $list_jwb[$jaws];
    return($jawab);
}
//show menu, saat join dan command,menu
if ($type == 'join' || $command == 'Help') {
    $text .= "♥Ƥєяѕιαη♥вσт♥\n\n";
    $text .= "|| -animals [text]\n";
    $text .= "|| -animasi [text]\n";
    $text .= "|| -mangals [text]\n";
    $text .= "|| -manga [text]\n";
    $text .= "|| -movie [text]\n";
    $text .= "|| -film [text]\n";
    $text .= "|| -convert [link]\n";
    $text .= "|| -say [text]\n";
    $text .= "|| -music[text]\n";
    $text .= "|| -lirik [lagu]\n";
    $text .= "|| -shalat [namakota]\n";
    $text .= "|| -zodiak [tanggallahir]\n";
    $text .= "|| -lokasi [namakota]\n";
    $text .= "|| -time [namakota]\n";
    $text .= "|| -kalender [namakota]\n";
    $text .= "|| -cuaca [namakota]\n";
    $text .= "|| -def [text]\n";
    $text .= "|| -qiblat [namakota]\n";
    $text .= "|| -playstore [namaapk]\n";
    $text .= "|| -kerangajaib\n";
    $text .= "|| -youtube [txt]\n";
    $text .= "|| -ytlink [txt]\n";
    $text .= "|| -gitclone [txt]\n";
    $text .= "[KONTAK CREATOR]\n";
    $text .= "http://line.me/ti/p/~m_bw\n";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => $text
            )
        )
    );
}
if($message['type']=='text') {
	    if ($command == '-qiblat') {
        $hasil = qibla($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => $hasil,
                    'previewImageUrl' => $hasil
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '-myinfo') {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(

										'type' => 'text',					
										'text' => '====[InfoProfile]====
Nama: '.$profil->displayName.'
Status: '.$profil->statusMessage.'
Picture: '.$profil->pictureUrl.'
====[InfoProfile]===='
									)
							)
						);
				
	}
}
//pesan bergambar
if ($message['type'] == 'text') {
    if ($command == '-def') {


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
if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'apakah') {
        $balas = send(jawabs(), $replyToken);
    } else {}
} if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'bisakah') {
        $balas = send(bisa(), $replyToken);
    } else {}
} if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'kapankah') {
        $balas = send(kapan(), $replyToken);
    } else {}
} if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'rate') {
        $balas = send(dosa(), $replyToken);
    } else {}
} if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'dosanya') {
		$balas = send(dosa2(), $replyToken);
		$balas = send(dosa(), $replyToken);
		$balas = send(dosa3(), $replyToken);
    } else {}
} else {}
//translate//
if($message['type']=='text') {
	    if ($command == '/tr-ar') {

        $result = trar($options);
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
	    if ($command == '/tr-ja') {

        $result = trja($options);
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
	    if ($command == '/tr-id') {

        $result = trid($options);
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
	    if ($command == '/tr-en') {

        $result = tren($options);
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
	    if ($command == '-say') {

        $result = say($options);
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
	    if ($command == '-youtube') {

        $result = yt-download($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => yt-download($options)
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '-gitclone') {

        $result = githubrepo($options);
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
	    if ($command == '-qiblat') {
        $hasil = qibla($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => $hasil,
                    'previewImageUrl' => $hasil
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '-cuaca') {

        $result = cuaca($options);
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
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '-qr') {

        $result = qrcode($options);
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
if($message['type']=='text') {
	    if ($command == '-playstore') {

        $result = ps($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text'  => 'Searching...'
                ),
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }

}
//pesan bergambar
if ($message['type'] == 'text') {
        if ($command == 'image2':
        $line_server_url = 'https://api.line.me/v2/bot/message/reply';
        $response = array (
            "replyToken" => $sender_replyToken,
            "messages" => array (
                array (
                    "type" => "image",
                    "originalContentUrl" => "https://lh3.googleusercontent.com/-HcDZgVVjs3c/XuJExojaIjI/AAAAAAAAFPE/n0lu-jCX3NkFkZ1lvcq4SPFlaqUZTq_3ACK8BGAsYHg/s256/2020-06-11.gif",
                    "previewImageUrl" => "https://www.nasa.gov/sites/default/themes/NASAPortal/images/feed.png"
                )
            )
        );
    }
}
//pesan bergambar
if ($message['type'] == 'text') {
        if ($command == 'image1':
        $line_server_url = 'https://api.line.me/v2/bot/message/reply';
        $response = array (
            "replyToken" => $sender_replyToken,
            "messages" => array (
                array (
                    "type" => "image",
                    "originalContentUrl" => "https://lh3.googleusercontent.com/-SdYHyUvp8nY/XuJGRs6mYRI/AAAAAAAAFPc/H5KpC9WDvAETYOIT1sPBeDdvNNHoRjmPQCK8BGAsYHg/s351/2020-06-11.gif",
                    "previewImageUrl" => "https://www.nasa.gov/sites/default/themes/NASAPortal/images/feed.png"
                )
            )
        );
    }
}
//pesan bergambar
if ($message['type'] == 'text') {
        if ($command == 'image':
        $line_server_url = 'https://api.line.me/v2/bot/message/reply';
        $response = array (
            "replyToken" => $sender_replyToken,
            "messages" => array (
                array (
                    "type" => "image",
                    "originalContentUrl" => "https://lh3.googleusercontent.com/-SdYHyUvp8nY/XuJGRs6mYRI/AAAAAAAAFPc/H5KpC9WDvAETYOIT1sPBeDdvNNHoRjmPQCK8BGAsYHg/s351/2020-06-11.gif",
                    "previewImageUrl" => "https://www.nasa.gov/sites/default/themes/NASAPortal/images/feed.png"
                )
            )
        );
    }
}
//pesan bergambar
if ($message['type'] == 'text') {
        if ($command == 'sticker':
        $line_server_url = 'https://api.line.me/v2/bot/message/reply';
        $response = array (
            "replyToken" => $sender_replyToken,
            "messages" => array (
                array (
                    "type" => "sticker",
                    "packageId" => "1",
                    "stickerId" => "1"
                )
            )
        );
    }
}
//pesan bergambar
        $result = quotes($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text'  => $result
                )
            )
        );
    }

}                
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '-convert') {
        $result = saveitoffline($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => saveitoffline($options)
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '-shorten') {
        $result = adfly($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $data
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '-qiblat') {
        $hasil = qibla($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => $hasil,
                    'previewImageUrl' => $hasil
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '-ytsearch') {
        $hasil = ytsearch($options);
        $hasill = thumbnail($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text'  => $hasil
                ), array(
                    'type' => 'image',
                    'originalContentUrl' => $hasill,
                    'previewImageUrl' => $hasill
                )
            )
        );
    }
}
if($message['type']=='text') {
     if ($command == '-ytlink') {
        $keyword = '';
        $image = 'https://img.youtube.com/vi/' . $keyword . '/2.jpg';
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => $image,
                    'previewImageUrl' => $image
                ), array(
                    'type' => 'video',
                    'originalContentUrl' => vid_search($keyword),
                    'previewImageUrl' => $image
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '-animasi') {
        $result = anime($options);
        $altText = "Title : " . $result['title'];
        $altText .= "\n\n" . $result['desc'];
        $altText .= "\nMAL Page : https://myanimelist.net/anime/" . $result['id'];
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'template',
                    'altText' => $altText,
                    'template' => array(
                        'type' => 'buttons',
                        'title' => $result['title'],
                        'thumbnailImageUrl' => $result['image'],
                        'text' => $result['desc'],
                        'actions' => array(
                            array(
                                'type' => 'postback',
                                'label' => 'Baca Sinopsis-nya',
                                'data' => 'action=add&itemid=123',
                                'text' => '/anime-syn ' . $options
                            ),
                            array(
                                'type' => 'uri',
                                'label' => 'Website MAL',
                                'uri' => 'https://myanimelist.net/anime/' . $result['id']
                            )
                        )
                    )
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '-manga') {
        $result = manga($options);
        $altText = "Title : " . $result['title'];
        $altText .= "\n\n" . $result['desc'];
        $altText .= "\nMAL Page : https://myanimelist.net/manga/" . $result['id'];
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'template',
                    'altText' => $altText,
                    'template' => array(
                        'type' => 'buttons',
                        'title' => $result['title'],
                        'thumbnailImageUrl' => $result['image'],
                        'text' => $result['desc'],
                        'actions' => array(
                            array(
                                'type' => 'postback',
                                'label' => 'Baca Sinopsis-nya',
                                'data' => 'action=add&itemid=123',
                                'text' => '/manga-syn' . $options
                            ),
                            array(
                                'type' => 'uri',
                                'label' => 'Website MAL',
                                'uri' => 'https://myanimelist.net/manga/' . $result['id']
                            )
                        )
                    )
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '-animals') {

        $result = anime_syn($options);
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
	    if ($command == '-film') {

        $result = film($options);
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
	    if ($command == '-mangals') {

        $result = manga_syn($options);
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
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '-lirik') {

        $result = lirik($options);
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
        if ($command == '-movie') {
        $result = film_syn($options);
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
//pesan bergambar
// ----- LOKASI BY FIDHO -----
if($message['type']=='text') {
	    if ($command == '-lokasi' || $command == '-Lokasi') {

        $result = lokasi($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'location',
                    'title' => 'Lokasi',
                    'address' => $result['address'],
                    'latitude' => $result['latitude'],
                    'longitude' => $result['longitude']
                ),
            )
        );
    }

}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '-kalender') {

        $result = kalender($options);
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
//pesan bergambar
if($message['type']=='text') {
	    if ('Apakah' == $command) {
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $acak
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '-time') {

        $result = waktu($options);
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
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '/music') {

        $result = music($options);
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
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '-zodiak') {

        $result = zodiak($options);
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
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Bot' || $command == 'acil' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $profil->displayName.' Apa manggil-manggil aku?'
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'سلام' || $command == 'سیلام' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'ســ͢͜͡✾ٜٜٜٜٜٜٖٖٖٖٜ̂̂̂̂̂̂͢͜͡✾ـلــام گـ͢͜͡✾ٜٜٜٜٜٜٖٖٖٖٜ̂̂̂̂̂̂͢͜͡✾ـــلم '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'hi' || $command == 'Hi' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Hello '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Helo' || $command == 'helo' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Hello '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '/soundcloud' || $command == '/Soundcloud') {
        $result = cloud($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
		    array(
                  'type' => 'image',
                  'originalContentUrl' => $result['icon'],
                  'previewImageUrl' => $result['icon']
                ),
                array(
                    'type' => 'text',
                    'text' => 'ID: '.$result['id'].'
TITLE: '. $result['judul'].'
URL: '. $result['link']
                ),
		    array(
                  'type' => 'audio',
                  'originalContentUrl' => $result['audio'],
                  'duration' => 60000
                )
            )
        );
    }
}
//fitur sound cloud
if($message['type']=='text') {
        if ($command == '/wikipedia') {

        $result = wiki($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻',
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
                  'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻',
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
                          'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻', 
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
#==================================#
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
                            'imageUrl' => 'https://lh3.googleusercontent.com/-Bo_W3NMCdMg/XlT3z96j8UI/AAAAAAAACgQ/o3-EkHl0nS8tE8LM1jQmMYa-BekExrICgCK8BGAsYHg/s300/2020-02-25.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Instagram',
                              'text' => 'Contoh: /instagram jokowi',
                            ),
                          ),
                          1 => 
                          array (
                            'imageUrl' => 'https://lh3.googleusercontent.com/-Z0YUCbMxt4c/XuJEv6JoxjI/AAAAAAAAFPA/ENBi9F03b6IMVfIYnlGlj79nC1JrNyfhgCK8BGAsYHg/s512/2020-06-11.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Neon Teks',
                              'text' => 'Contoh: /neon RpdBot Mantap',
                            ),
                          ),
                          2 => 
                          array (
                            'imageUrl' => 'https://lh3.googleusercontent.com/-EcyhY1gENdM/Xth9WMpmqMI/AAAAAAAAFI0/zkdCARVcIpgQSs8Etq34fQb7aBzr1lYCACK8BGAsYHg/s512/2020-06-03.png',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'TTS',
                              'text' => 'Contoh: /say Mantap Jiwa',
                            ),
                          ),
                          3 => 
                          array (
                            'imageUrl' => 'https://lh3.googleusercontent.com/-EWqDkz1gzY4/XuI__pX_PEI/AAAAAAAAFNY/01WudjTlRREEkqkQfEvRjsyoQwGfeDfOACK8BGAsYHg/s500/2020-06-11.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Jam Indo',
                              'text' => '/jam',
                            ),
                          ),
                          4 => 
                          array (
                            'imageUrl' => 'https://lh3.googleusercontent.com/-EcyhY1gENdM/Xth9WMpmqMI/AAAAAAAAFI0/zkdCARVcIpgQSs8Etq34fQb7aBzr1lYCACK8BGAsYHg/s512/2020-06-03.png',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Creator',
                              'text' => '/creator',
                            ),
                          ),
                          5 => 
                          array (
                            'imageUrl' => 'https://lh3.googleusercontent.com/-v1sBgGSY1JI/XuJFjna8bUI/AAAAAAAAFPU/UojTQufTmU4eYISUVgOJcf6gI-fr_uCrgCK8BGAsYHg/s512/2020-06-11.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Lirik',
                              'text' => 'Contoh: /lirik asal kau bahagia',
                            ),
                          ),
                          6 => 
                          array (
                            'imageUrl' => 'https://lh3.googleusercontent.com/-h9tABochSac/Xnfeb98sUJI/AAAAAAAADig/EgsqVVWeD0Mwy6xSrV0HpGz-OS019FxIACK8BGAsYHg/s324/2020-03-22.gif',
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
                            'imageUrl' => 'https://lh3.googleusercontent.com/-x7FdoClGz0M/XsP26-b_FoI/AAAAAAAAEyU/KmkmCjDFeF0ljDkEp-TynApjGR1Nsq_8wCK8BGAsYHg/s512/2020-05-19.png',
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
                          'altText' => '[┄┅═☆ᖼOᗱᗴℕ☆═┅┄]', 
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
                          'altText' => '☻▬═★ᖼOᗱᗴℕ★═▬☻', 
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
