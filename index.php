<?php
    $counter = file_get_contents('counter.txt');
    file_put_contents('counter.txt', ++$counter);
?>
<!DOCTYPE html>
<html lang="bs-BA">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Ismar Tričić">

        <!-- SEO -->
        <meta name="robots" content="index, follow">
        <meta name="keywords" content="knjigovodstvo, računovodstvo, knjigovodja, računovodja, pdv, obračun, završni račun, porez, savjetovanje, zakon, knjizenje, izračun, plate, cazin, bihac">
        <meta name="description" content="Knjigovodstveni biro BONITET po povoljnim cijenama pruža knjigovodstvene i računovodstvene usluge za preduzeća na području Unsko-sanskog kantona.">

        <!-- Icons-->
        <link rel="icon" href="images/icon.png">

        <!-- Title -->
        <title>Knjigovodstvo i računovodstvo "BONITET" Cazin</title>

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Bootstrap & CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Russo+One&amp;subset=latin-ext">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        
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
                            <!-- Life's too short to use list here -->
                            <a href="http://bonitet-cazin.com/" class="current">O nama</a>
                            <a href="usluge">Usluge</a>
                            <a href="kontakt">Kontakt</a>
                            <a href="linkovi">Korisni linkovi</a>
                        </nav>
                    </div>

                    <script>
                        $('#nav-button').click(function() {
                            $('#nav').toggle('fast', 'linear');
                            $('#nav').css('display', 'block');
                        });
                    </script>
                </div>
            </div>
        </header>
        
        <main>
            <section id="first">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-7 col-lg-6 aboutUs">
                            <h1>Knjigovodstveni biro "BONITET"</h1>
                            <p>Knjigovodstveni biro Bonitet iz Cazina već duži niz godina vrši knjigovodstvene i računovodstvene usluge za velika i mala preduzeća.
                                U našem knjigovodstvenom birou možete dobiti sve potrebne usluge kao i savjete za Vaše malo ili veliko preduzeće, te samostalne trgovinske i ugostiteljske radnje, proizvodne dijelatnosti, građevinske djelatnosti i dr.
                                Knjigovodstveni biro vodi stručno osoblje sa odgovarajućim licencama.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="second">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <p>Vaše ideje pretvaramo u biznis!</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="third">
                <div class="container">
                    <p>Šta nudimo?</p>
                    <div class="row">
                        <div class="col-xs-12 col-md-4 box">
                            <h3>Računovodstvene usluge</h3>
                            <img src="images/accounting.jpg" alt="Box1Pic">
                            <p class="boxText">Obračuni plaća, naknada, PDV-a, amortizacije, proizvodnje; izrade i predaje financijskih izvještaja...</p>
                        </div>

                        <div class="col-xs-12 col-md-4 box">
                            <h3>Financijsko poslovanje</h3>
                            <img src="images/finance.jpg" alt="Box2Pic">
                            <p class="boxText">Izvještavanje o propisima, izrade raznih izvještaja, zastupanje korisnika po njihovoj punomoći...</p>
                        </div>

                        <div class="col-xs-12 col-md-4 box">
                            <h3>Poslovno savjetovanje</h3>
                            <img src="images/book.jpg" alt="Box3Pic">
                            <p class="boxText">Poslovno i financijsko savjetovanje za unapređenje i razvoj poslovanja za naše klijente...</p>
                        </div>
                    </div>

                    <div class="row usluge">
                        <div class="col-md-4 col-md-offset-4">
                            <p>...i mnogo više...</p>
                        </div>

                        <div class="col-md-4">
                            <a href="usluge"><button type="button" class="btn btn-info">POGLEDAJTE SVE USLUGE >></button></a>
                        </div>
                    </div>
                </div>
            </section>


            <section id="fourth">
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
                <script>
                    // This script disables map mouse scroll unless its clicked (using jQuery)
					$('#googlemap')
						.click(function(){
								$(this).find('iframe').addClass('clicked')})
						.mouseleave(function(){
								$(this).find('iframe').removeClass('clicked')});
				</script>
            </div>
        </main>

        <footer>
            <div class="container">
                <p>Copyright &copy; Knjigovodstveni biro "BONITET" 2017. <br> Website developer: ismar.tricic@gmail.com</p>
                <a href="javascript:void(0)" onclick="$(document.body).animate({'scrollTop' : 0}, 1000)" style="color: white;">Nazad na vrh</a>
            </div>
        </footer>
    </body>
</html>