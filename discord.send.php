<?php

/*

@author EinGriefer

*/

class DiscordMessage {

    public $url = "";
    public $tts = false;
    public $username = "";
    public $response = "";

    function __construct($url) {
        $this->url = $url;
    }

    function setURL($newurl) {
        $this->url = $newurl;
    }

    function setTTS($tts) {
        $this->tts = $tts;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function sendMessage($message) {
        $timestamp = date("c", strtotime("now"));

        $json = json_encode([
            "content" => $message,
            "username" => $this->username,
            "tts" => $this->tts
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

        $ch = curl_init( $this->url );

        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        curl_exec( $ch );
        curl_close( $ch );
    }

    function createMention($id) {
        return "<@" . $id . ">";
    }

    function createChannelMention($id) {
        return "<#" . $id . ">";
    }

    function createEmote($name, $id) {
        return "<:" . $name . ":$id>";
    }


    function globalDebug() {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

}

?>
