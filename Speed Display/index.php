<!DOCTYPE html>
<html lang="cs">
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="utf-8">
        <title>Live Traffic Status</title>
        <!-- Další META tagy -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=no">
        <meta name="robots" content="index,follow">

        <!-- Meta značky -->

			<!-- Favicon -->
			<link rel="icon" href="img/metaikony/favicon.png">
            <!-- Barva horni lišty chromu u Android 5 -->
            <meta name="theme-color" content="#ff6f00">
            <!-- Přidá podporu webové apliakce pro Android -->
            <meta name="mobile-web-app-capable" content="yes">
            <link rel="icon" sizes="192x192" href="img/metaikony/chrome-touch-icon-192x192.png">
            <!-- Přidá podporu webové apliakce pro iOS -->
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
            <meta name="apple-mobile-web-app-title" content="DiskForYou">
            <link rel="apple-touch-icon" href="img/metaikony/apple-touch-icon.png">
            <!-- Přidá podporu pro Win8 -->
			<meta name="msapplication-TileImage" content="img/metaikony/favicon-win.png">
			<meta name="msapplication-TileColor" content="#fa7c1a">
			<meta name="application-name" content="DiskForYou">

        <!-- Konec Meta značky -->

        <!-- Materialize v0.81 (základní CSS framework) http://materializecss.com/ -->
        <link type="text/css" rel="stylesheet" href=css_framework/css/materialize.min.css media="screen,projection">
        <!-- KONEC Materialize -->

        <!-- Stylovací CSS -->
        <link rel="stylesheet" href=css_framework/main.css>
        <!-- Konec Stylovací CSS -->
        <!-- Konec Vložení dalších META tagů -->

        <!-- Šablona určená jen pro tuto stránku  -->
        <style>
            html { background-color: #ff6f00 }
        </style>
        <!-- Konec Šablona určená jen pro tuto stránku -->
        
       <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){ 

        var auto= $('#tweets'), refreshed_content;  
        refreshed_content = setInterval(function(){
        auto.fadeOut('slow').load("../speedsense/live.php?id="<?php  echo $userid; ?>).fadeIn("fast");}, 
        5000);                                      
        console.log(refreshed_content);                                      
                return false; 
        });
        </script>



    </head>
    <body>
        <div class="row hlavnistranka">
            <!-- Logo stránky -->
            <div class="row">
                <div class="col l6">
                    <a href="index.html">
                        <img id="logo" src="img/logo.png" alt="DiskForYou logo">
                    </a>
                </div>
            </div>
            <!-- Konec Logo stránky -->

            <!-- Popis a tlačítko registrace -->
            <div class="row">
                <div class="col l5 m8 s12">
                    <p class="flow-text" id ="tweets">
                    

                    
                   


                    </p>
                    <!-- V případě vypnutého JavaScriptu -->
                    <noscript>
                    <div class="card-panel noscript">
                        <i class="mdi-alert-warning left"></i>
                        <i class="mdi-alert-warning right"></i>
                        <span>Pro funkčnost DiskForYou je nutné <b>povolit JavaScript</b>.<br> Zde jsou <a href="http://www.enable-javascript.com/cz/" target="_blank"> instrukce jak povolit JavaScript ve Vašem webovém prohlížeči</a>.</span>
                    </div>
                    </noscript>
                    <!-- Konec V případě vypnutého JavaScriptu -->
                </div>
            </div>
            <div class="center-btn">
            	<a class="waves-effect waves-light btn-large" id="prihlasitse"  href="prihlaseni.html">Drive</a>
                <a class="waves-effect waves-light btn-large" id="registrace"  href="registrace.html">Safely</a>
            </div>
            
            <div class="row hlavnistranka-funkce">
                
            </div>
            <div class="row">
                <div class="col s12">
                    <hr>
                    <div id="prizpusobive-mockup">
                        <h3>Wear your seatbelts for a safe and enjoyable trip. </h3>
                        
                    </div>
                </div>
            </div>
            
            <!-- Konec Popis a tlačítko registrace -->
        </div>


        <!-- Scripty -->

            <!-- Načtení jQuery knihovny -->
                <script type="text/javascript" src="../code.jquery.com/jquery-2.1.1.min.js"></script>
            <!-- Konec Načtení jQuery knihovny -->

            <!-- Materialize (doplňkový JS soubor) http://materializecss.com/ -->
                <script type="text/javascript" src=css_framework/js/materialize.min.js></script>
            <!-- Konec Materialize -->

    </body>


</html>