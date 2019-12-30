<?php

$success = false;
$from = "kontakt@bonitet-cazin.com"; // from-email
$to = "PUT_COMPANY_EMAIL_HERE"; // to-email
$subject = 'Kontakt | bonitet-cazin.com';

if (isset($_POST['send']) && ($_POST['antibot'] == '5' || strtolower($_POST['antibot']) == 'pet'))
{
    if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['message']))
	{
        $name  = trim($_POST['name']);
        $mail  = trim($_POST['email']);
        $msg   = trim($_POST['message']);
        $phone = trim($_POST['phone']);
        
        $headers  = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        $headers .= "From: $name <$from>\r\n";

        $msg = "
            <html>
                <head>
                </head>
                <body>
                    <p>Ime: $name</p>
                    <p>Broj: $phone</p>
                    <p>Email: $mail</p>
                    <p>Poruka: $msg</p>
                </body>
            </html>
        ";

        $success = mail($to, $subject, $msg, $headers);
    }
}

if($success)
{
    header("Location: http://bonitet-cazin.com/#kontakt?success=true");
}
else
{
    header("Location: http://bonitet-cazin.com/#kontakt?success=false");
}