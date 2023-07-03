<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

use Orhanerday\OpenAi\OpenAi;

$open_ai_key = 'api_key_here';

$open_ai = new OpenAi($open_ai_key);
if(isset($_POST['submit_btn'])){
    $prompt = $_POST['prompt'];

$complete = $open_ai->completion([
    'model' => 'text-davinci-003',
    'prompt' => $prompt,
    'temperature' => 0.9,
    'max_tokens' => 150,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.6,
]);

$response = json_decode($complete, true);
$response = $response["choices"][0]["text"];

$_SESSION['response'] = $response;
header('location: index.php');
}


