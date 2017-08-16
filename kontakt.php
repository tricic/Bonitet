<?php
    if(isset($_POST['send'])) {
        if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['message'])) {
            $name  = trim($_POST['name']);
            $mail  = trim($_POST['email']);
            $msg   = trim($_POST['message']);
            $phone = trim($_POST['phone']);

            $from    = "poruka@bonitet-cazin.com";
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

            $success = mail($to, $subject, $msg, $headers);
        }
    }
?>
<!DOCTYPE html>
<html lang="bs-BA">
    <head>
        <!-- Basic meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title -->
        <title>Kontakt | Knjigovodstvo i računovodstvo "BONITET" Cazin</title>

        <!-- SEO -->
        <meta name="description" content="Kontaktirajte naš knjigvodstveni biro preko telefona, e-maila, web stranice ili nas posjetite u Cazinu.">
        <meta name="organization" content="BONITET doo Cazin - Knjigovodstveni biro">

        <!-- Icons-->
        <link rel="icon" href="images/icon.png">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin-ext">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Russo+One&amp;subset=latin-ext">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="vendor/bootstrap.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/kontakt.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row">
                    <div id="logo" class="col-xs-12 col-sm-3">
                        BONITET
                        <div id="nav-button">
                            <button><i class="fa fa-bars" aria-hidden="true"></i></button>
                        </div>
                    </div>

                    <div id="nav" class="col-xs-12 col-sm-9 col-md-8 col-lg-7 col-xs-offset-0 col-md-offset-1 col-lg-offset-2">
                        <nav>
                            <a href="http://bonitet-cazin.com/">O nama</a>
                            <a href="usluge">Usluge</a>
                            <a href="kontakt" class="current">Kontakt</a>
                            <a href="linkovi">Korisni linkovi</a>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section id="contact-form">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12" id="form">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="name">Ime i prezime: *</label>
                                    <input type="text" class="form-control" name="name" placeholder="Ime Prezime" required>
                                </div>

                                <div class="form-group">
                                    <label for="name">Kontakt telefon: *</label>
                                    <input type="text" class="form-control" name="phone" value="+387" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">E-mail adresa: </label>
                                    <input type="email" class="form-control" name="email" placeholder="primjer@email.com">                    
                                </div>

                                <div class="form-group">
                                    <label for="message">Poruka: *</label>
                                    <textarea class="form-control" rows="5" name="message" placeholder="Vaša poruka..." minlength="10" maxlength="1000" required></textarea>
                                </div>

                                <input type="submit" name="send" class="btn btn-primary" value="Pošalji poruku!">

                                <span class="small">
                                    * su obavezna polja
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section id="infos">
                <div class="container">
                    <div class="row">
                        <div class="infoBox col-xs-12 col-md-3">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <h4>Pozovite nas</h4>
                            <span>+387 37 555 033</span>
                        </div>

                        <div class="infoBox col-xs-12 col-md-3">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <h4>Posjetite nas</h4>
                            <span>Hamdije Omanovića bb, Cazin</span>
                        </div>

                        <div class="infoBox col-xs-12 col-md-3">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <h4>Pošaljite nam e-mail</h4>
                            <span class="email">bonitet-cazin@gmail.com</span>
                        </div>

                        <div class="infoBox col-xs-12 col-md-3" style="border: none;">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <h4>Radno vrijeme</h4>
                            <span>PON - PET <br> 08:00 - 16:00</span>
                        </div>
                    </div>
                </div>
            </section>

            <div id="googlemap">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1MssHFvV3PQ7bglTTNVk35sW6634"></iframe>
            </div>
        </main>

        <footer>
            <div class="container">
                <p>Copyright &copy; Knjigovodstveni biro "BONITET" 2017. <br> Developed by: ismar.tricic@gmail.com</p>
                <a href="javascript:void(0)" id="to-top">Nazad na vrh</a>
            </div>
        </footer>
        
        <script src="vendor/jquery.min.js"></script>
        <script src="js/functions.js"></script>

        <?php
            if(isset($success)) {
                if($success) {
                    ?>
                    <script>alert('Poruka je uspješno poslana, bićete kontaktirani. Hvala!');</script>
                    <?php
                } else {
                    ?>
                    <script>alert('Trenutno nije moguće poslati mail, molimo nazovite nas.');</script>
                    <?php
                }
            }
        ?>
    </body>
</html>