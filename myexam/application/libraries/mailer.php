<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH . 'third_party/phpmailer/src/Exception.php';
require APPPATH . 'third_party/phpmailer/src/PHPMailer.php';
require APPPATH . 'third_party/phpmailer/src/SMTP.php';

class mailer {

    private $mail;

    public function __construct() {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function initialize($config) {
        $this->mail = new PHPMailer(true); // Passing `true` enables exceptions
        $this->mail->IsSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->Host = $config->item('smtp_hostname');
        $this->mail->Port = $config->item('smtp_port');
        $this->mail->Username = $config->item('smtp_username');
        $this->mail->Password = $config->item('smtp_password');
        $this->mail->Timeout = $config->item('smtp_timeout');
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isHTML(true);

        $this->mail->From = $config->item('fromemail');
        $this->mail->FromName = $config->item('fromname');
    }

    public function sendOne($to, $subject, $body, $replyTo = null) {
        $check = self::isValid($to, $body);
        if ($check != "OK") {
            return $check;
        }

        $this->mail->addAddress($to);
        if (isset($replyTo) && strlen(trim($replyTo)) > 0) {
            $this->mail->addReplyTo(trim($replyToEmail));
        }

        return self::sendOver($subject, $body);
    }

    public function sendFull($toList, $subject, $body, $fileList = null, $replyToEmail = null, $replyToName = null, $ccList = null, $bccList = null, $bodyAlt = null) {
        $check = self::isValid($toList, $body);
        if ($check != "OK") {
            return $check;
        }

        foreach ($toList as $email => $name) {
            if (isset($name) && strlen($name) > 0) {
                $this->mail->addAddress($email, $name);
            } else {
                $this->mail->addAddress($email);
            }
        }

        if (isset($fileList) && count($fileList) > 0) {
            foreach ($fileList as $path => $name) {
                if (isset($name) && strlen($name) > 0) {
                    $this->mail->addAttachment($path, $name);
                } else {
                    $this->mail->addAttachment($path);
                }
            }
        }

        if (isset($replyToEmail) && strlen($replyToEmail) > 0) {
            if (isset($replyToName) && strlen($replyToName) > 0) {
                $this->mail->addReplyTo($replyToEmail, $replyToName);
            } else {
                $this->mail->addReplyTo($replyToEmail);
            }
        }

        if (count($ccList) > 0) {
            foreach ($ccList as $email => $name) {
                if (isset($name) && strlen($name) > 0) {
                    $this->mail->addCC($email, $name);
                } else {
                    $this->mail->addCC($email);
                }
            }
        }

        if (count($bccList) > 0) {
            foreach ($bccList as $email => $name) {
                if (isset($name) && strlen($name) > 0) {
                    $this->mail->addBCC($email, $name);
                } else {
                    $this->mail->addBCC($email);
                }
            }
        }

        if (isset($bodyAlt) && strlen($bodyAlt) > 0) {
            $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        }

        return self::sendOver($subject, $body);
    }

    private function isValid($toList, $body) {
        if (!isset($this->mail)) {
            return "The object mail has not been initialized yet!";
        }

        if (!isset($toList) || (!is_array($toList) && !is_string($toList))) {
            return "The TO list/address is not specified or invalid!";
        } else {
            if (is_array($toList) && count($toList) == 0) {
                return "The TO list is not specified!";
            } else if (is_string($toList) && strlen(trim($toList)) == 0) {
                return "The TO address is not empty!";
            }
        }

        if (!isset($body) || strlen($body) == 0) {
            return "The email body is not specified!";
        }

        return "OK";
    }

    private function sendOver($subject, $body) {
        try {
            if (isset($subject) && strlen($subject) > 0) {
                $this->mail->Subject = $subject;
            }
            $this->mail->Body = $body;
            $this->mail->send();
            return "OK";
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: " . $this->mail->ErrorInfo;
        }
    }

}
