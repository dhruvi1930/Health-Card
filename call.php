<?php

class Voicent
{
    var $host = "localhost";
    var $port = 8155;

    function _call_now($body)
    {
        $headers = "POST /ocall/callreqHandler.jsp HTTP/1.1\r\n" .
                   "User-Agent: Mozilla/4.0\r\n" .
                   "Host: " . $this->host . "\r\n" .
                   "Content-Type: application/x-www-form-urlencoded\r\n" .
                   "Content-Length: " . strlen($body) . "\r\n" .
                   "\r\n";

        if (! ($sock = fsockopen($this->host, $this->port,          $errno, $errstr))) {
             echo $errstr;
             return false;
        }

        fwrite($sock, $headers.$body, strlen($headers.$body));

        $reqid = "";
        while ($line = fgets($sock, 4096)) {
            if (preg_match("/\[ReqId=(.*)\]/", $line, $matches)) {
                $reqid = $matches[1];
                break;
            }
        }

        fclose($sock);
        return $reqid;
    }

    function call_text($phoneno, $textmsg, $selfdelete)
    {
        $body = "info=" . urlencode("call " . $phoneno) . "&";
        $body .= "phoneno=" . urlencode($phoneno) . "&";
        $body .= "firstocc=10&";
        $body .= "txt=" . urlencode($textmsg) . "&";
        $body .= "selfdelete=" . $selfdelete;

        return $this->_call_now($body);
    }

    function call_audio($phoneno, $audiofile, $selfdelete)
    {
        $body = "info=" . urlencode("call " . $phoneno) . "&";
        $body .= "phoneno=" . urlencode($phoneno) . "&";
        $body .= "firstocc=10&";
        $body .= "audiofile=" . urlencode($audiofile) . "&";
        $body .= "selfdelete=" . $selfdelete;

        return $this->_call_now($body);
    }

    function call_status($reqId)
    {
        $headers = "GET /ocall/callstatusHandler.jsp?reqid=" . $reqId . " HTTP/1.1\r\n" .
                "User-Agent: Mozilla/4.0\r\n" .
                "Host: " . $this->host . "\r\n" .
                "\r\n";

        if (! ($sock = fsockopen($this->host, $this->port, $errno, $errstr))) {
            echo $errstr;
            return false;
        }

        fwrite($sock, $headers, strlen($headers));

        $status = "";
        while ($line = fgets($sock, 4096)) {
            if (preg_match("/\^made\^/", $line)) {
                $status = "Call Make";
                break;
            }
            if (preg_match("/\^failed\^/", $line)) {
                $status = "Call Failed";
                break;
            }
        }

        fclose($sock);
        return $status;
    }

    function call_remove($reqId)
    {
        $headers = "GET /ocall/callremoveHandler.jsp?reqid=" . $reqId . " HTTP/1.1\r\n" .
                "User-Agent: Mozilla/4.0\r\n" .
                "Host: " . $this->host . "\r\n" .
                "\r\n";

        if (! ($sock = fsockopen($this->host, $this->port, $errno, $errstr))) {
            echo $errstr;
            return false;
        }

        fwrite($sock, $headers, strlen($headers));

        $line = fgets($sock, 4096);

        fclose($sock);
    }

    function call_till_confirm($vcast, $voc, $confirmcode, $wavefile)
    {
        $body = "info=" . urlencode("call till confirm") . "&";
        $body .= "phoneno=0000000" . "&";
        $body .= "firstocc=10&";
        $body .= "startexec=" . urlencode($vcast) . "&";
        $body .= "selfdelete=" . $selfdelete . "&";

        $cmdline = "\"" . $voc . "\" -startnow -confirmcode " . $confirmcode;
        $cmdline .= " -wavfile \"" . $wavefile . "\"";
        $body .= "cmdline=" . urlencode($cmdline);

        return $this->_call_now($body);
    }
}

 $voicent = new Voicent;
$id = $voicent->call_text("9512425700", "hello, how are you", "0");
 print $id;
# $id = $voicent->call_audio("1234567", "C:\Temp\welcome.wav", 0);
# print $id;
# print $voicent->call_status("1103704332609");
# $voicent->call_remove("1103704332609");
# print $voicent->call_status("1103704332609");

?>