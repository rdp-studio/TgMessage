<?php
header('content-type: application/json');
require_once 'Bot.php';
$bot = new Bot();
// 获取/token 命令，获取聊天 id
$data = json_decode(file_get_contents("php://input"), true);
$message = $data['message']['text'] ?? '';
if ($message === '/token') {
    $chat_id = $data['message']['chat']['id'];
    $bot->sendMessage(['text' => $bot->encryption($chat_id), 'chat_id' => $chat_id]);
}
if ($message === '/start') {
    $chat_id = $data['message']['chat']['id'];
    $bot->sendMessage(['text' => '在这里查看机器人的文档：https://tgmessage.rdpstudio.top');
}
echo json_encode(['code' => 200, 'message' => 'success']);
