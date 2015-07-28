<?php

// Declarando una funcion
function view($template, $vars = array())
{
    extract($vars);

    require "views/$template.tpl.php";
}

function classes()
{
    $directorio = 'classes';
    $ficheros  = scandir($directorio,1);

    foreach ($ficheros as $key => $fichero) {
        $file = explode('.', $fichero);
        if ( $file[1] == 'php' ) {
            require_once 'classes/'.$fichero;
        }
    }
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

function get_client_ip_env() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

function ppp($value='')
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function sendEmail($asunto, $contrasenna, $email, $nombre, $emailTo, $emailFrom, $template)
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

    $html=file_get_contents(CURRENT_URL.'email/'.$template.'.html', false, stream_context_create($arrContextOptions));
    
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