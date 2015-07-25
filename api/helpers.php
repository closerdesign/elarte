<?php

// Declarando una funcion
function view($template, $vars = array())
{
    extract($vars);

    require "views/$template.tpl.php";
}

function controller($name)
{
    if (empty($name))
    {
        $name = 'home';
    }

    $file = "controllers/$name.php";

    if (file_exists($file))
    {
        require $file;
    }
    else
    {
        header("HTTP/1.0 404 Not Found");
        exit("Pagina no encontrada");
    }
}

function ppp($value='')
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function generatePassword($length, $alphaPost='off', $alpha_upperPost='off', $numericPost = 'off', $specialPost = 'off')
{
    $alpha = "abcdefghijklmnopqrstuvwxyz";
    $alpha_upper = strtoupper($alpha);
    $numeric = "0123456789";
    $special = ".-+=_,!@$#*%<>[]{}";
    $chars = "";
     
    if (isset($length)){
        // if you want a form like above
        if (isset($alphaPost) && $alphaPost == 'on')
            $chars .= $alpha;
         
        if (isset($alpha_upperPost) && $alpha_upperPost == 'on')
            $chars .= $alpha_upper;
         
        if (isset($numericPost) && $numericPost == 'on')
            $chars .= $numeric;
         
        if (isset($specialPost) && $specialPost == 'on')
            $chars .= $special;
         
        $length = $length;
    }else{
        // default [a-zA-Z0-9]{9}
        $chars = $alphaPost . $alpha_upper . $numeric;
        $length = 9;
    }
     
    $len = strlen($chars);
    $pw = '';
     
    for ($i=0;$i<$length;$i++)
            $pw .= substr($chars, rand(0, $len-1), 1);
     
    // the finished password
    return str_shuffle($pw);
}

function sendEmail($asunto, $contrasenna, $email, $nombre, $emailTo, $emailFrom)
{
    $mail             = new PHPMailer();
    
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                               // 1 = errors and messages
                                               // 2 = messages only
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Host       = SMTP_HOST; // sets the SMTP server
    $mail->Port       = 587;                    // set the SMTP port for the GMAIL server
    $mail->Username   = SMTP_USER; // SMTP account username
    $mail->Password   = SMTP_PASS;        // SMTP account password
    
    $mail->SMTPSecure = 'tls';
    
    $mail->SetFrom('info@phronesisvirtual.com', 'Editorial Phronesis');
    
    $mail->Subject    = utf8_decode($asunto);
    
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            ),
        );

    $html=file_get_contents(NOTIFICACION, false, stream_context_create($arrContextOptions));
    
    $html=str_replace("{{contrasenna}}",$contrasenna,$html);
    $html=str_replace("{{email}}",$email, $html);
    $html=str_replace("{{nombre}}",$nombre, $html);
    
    $mail->MsgHTML($html);
    
    $mail->AddAddress($emailTo);
    /*$mail->addBCC('pfhurtado@phronesisvirtual.com');*/
    
    if(!$mail->Send()) {
      return 0;
  } else {
      return 1;
  }
}