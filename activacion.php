<?php
    session_start();
    $datezone=date_default_timezone_get();
    $date_Now = date('Y-m-d H:i');
    $dateNow = date_create($date_Now);
    include 'php/conexion.php';
    $email = $_GET["email"];
    $token = $_GET["token"];
    $validar = mysqli_query($conexion,"SELECT * FROM users WHERE hash_email='$email' AND token='$token'"); 
    if(mysqli_num_rows($validar)>0)
    {   
        $extraido= mysqli_fetch_array($validar);
        $dates      = $extraido['date_token'];
        $date       = date_create($dates);
        $email      = $extraido['email'];
        $hash_email = $extraido ['hash_email'];
        $session_tipo = $extraido ['tipo'];                     //$_SESSION['session_tipo']= $extraido ['tipo'];
        $interval = (array) date_diff($dateNow,$date);
        if($interval['y'] == 0 && $interval['m'] == 0 && $interval['d'] == 0 && $interval['h'] <= 8)
        {
            $activar = mysqli_query($conexion,"UPDATE users SET active = '1',date_token=NULL,token='' WHERE hash_email = '$hash_email'");
            if(mysqli_affected_rows($conexion) == 1)
            {
                $_SESSION['session_tipo'] = $session_tipo;
                mysqli_close($conexion);
                if(isset($_COOKIE['registro']))
                {
                    echo'
                    <script>
                        window.location = "../activacion_de_cuenta?email='.$email.'&exito=on";
                    </script>
                    ';   
                }else
                {
                    echo'
                    <script>
                        window.location = "../activacion_de_cuenta?email='.$email.'&exito=on";
                    </script>
                    ';  
                }
            }
            else
            {
                echo'
                <script>
                    window.location = "../identificate";
                </script>
                ';
            }
        }
        else
        {
            $date      = date('Y-m-d H:i');
            $date_hash =  hash('sha512',$date);
            $nombre_u  = $extraido['usrname'];
            $activar = mysqli_query($conexion,"UPDATE users SET date_token='$date',token='$date_hash' WHERE hash_email = '$hash_email'");
            $from = "notificaciones@ografix.com";
            $to = $email;
            $linkverifica = "https://www.ografix.com/activacion?email=".$hash_email."&token=".$date_hash;
            $subject = "Confirmación de registro";
            $message = "Hola ". $nombre_u .",<br>
                        <br>
                        Para poder completar su registro da click en el siguiente link:<br>
    
                        <a href='". $linkverifica ."'>Confirma tu correo</a><br>
    
                        Saludos,<br>
                        ografix";
            require('phpmailer/class.phpmailer.php');
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPDebug = 1;
            $mail->Debugoutput = 'html';
            $mail->SMTPAuth = TRUE;
            $mail->SMTPSecure = "ssl";
            $mail->Port     = 465;  
            $mail->Username = "notificaciones@ografix.com";
            $mail->Password = "tlk3QOsEuN2.";
            $mail->Host     = "acmestickers.com";
            $mail->Mailer   = "smtp";
            $mail->SetFrom("notificaciones@ografix.com","ografix");
            $mail->AddAddress($to);	
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->WordWrap   = 80;
            $mail->IsHTML(true);
            if(!$mail->Send())
            {
                $msg = "<p class='error'>Problem in Sending Mail.</p>";
            }
            else 
            {
                $msg = "<p class='success'>Mail Sent Successfully.</p>";
            }
            echo'
            <script>
                window.location = "../activacion_de_cuenta.php?token='.$token.'";
            </script>
            ';
        }
        
    }
    else
    {
        echo'
            <script>
                window.location = "../activacion_de_cuenta.php?expired='.$token.'";
            </script>
            ';
    }
?> 

