<?php
if(isset($_POST['send'])) {
    if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['message'])) {
        $name  = trim($_POST['name']);
        $mail  = trim($_POST['email']);
        $msg   = trim($_POST['message']);
        $phone = trim($_POST['phone']);

        $from    = "kontakt@bonitet-cazin.com";
        $to      = "ismar.tricic@gmail.com";
        $subject = 'Kontakt | bonitet-cazin.com';
        
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

        if(mail($to, $subject, $msg, $headers)) {
            header("Location: http://bonitet-cazin.com/kontakt.html?success=true");
        } else {
            header("Location: http://bonitet-cazin.com/kontakt.html?success=false");
        }
    }
}