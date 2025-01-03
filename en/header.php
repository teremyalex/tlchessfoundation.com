<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo isset($title) ? $title : 'NYH Chess'; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="NYH Chess's website providing information about chess events, news, and statistics.">
        <meta name="keywords" content="chess, NYH Chess, chess tournaments, chess news">
        <meta name="author" content="NYH Chess">
        <link rel="stylesheet" href="https://tlchessfoundation.com/style.css" type="text/css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="alternate" href="https://tlchessfoundation.com/en/" hreflang="hu">
        <link rel="alternate" href="https://tlchessfoundation.com/en/" hreflang="en">
        <meta name="google-site-verification" content="L_8zbsxY6zh-MowYCjkhf3nt3K1bmWCyf-6zTs0V54w" />
        
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NLNDLVSV');</script>
        <!-- End Google Tag Manager -->
        
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-TVK58M01L8"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-TVK58M01L8');
        </script>
        
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16644085002">
        </script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'AW-16644085002');
        </script>
        
        <!-- Nyelv választás -->
        <script>
        function setLanguageCookie(lang) {
            document.cookie = "language=" + lang + "; path=/";       

            // Késleltetés hozzáadása a jobb stabilitás érdekében
            setTimeout(function() {
                window.location.href = "/" + lang + "/";
            }, 100); // 100 ms késleltetés
        }

        function getCookie(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
        }

        $(document).ready(function() {
            var lang = getCookie('language');

            if (lang && window.location.pathname === '/') {
                window.location.href = "/" + lang + "/";
            }
        });
        </script>



        
        <!-- Hotjar Tracking Code for Site 5080511 (name missing) -->
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:5080511,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>
        

        
        <meta property="og:description" content="NYH Chess's website providing information about chess events, news, and statistics.">
        <meta property="og:image" content="https://tlchessfoundation.com/sakk/fb-index.jpg"/>
        <meta property="og:type" content="website">
        
    </head>
    
    
    <body style="color: #0D0D0D; font-size: 16px; font-family: Montserrat; margin: 0;">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NLNDLVSV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        
        <nav class="mobil-menu">
            <ul class="menu-gomb">
                <li><a href="/" class="logo"><img src="https://tlchessfoundation.com/sakk/nyhchess-logo.png" alt="NYH Chess"></a></li>
                <li><i class="fa-solid fa-bars"></i></li>
            </ul>
            <ul class="menu-list">
                <li><a id="menu-partner">Partners</a>
                    <ul id="sub-menu-partner">
                        <li><a href="https://tlchessfoundation.com/en/hirdetesek.php">Advertising Spaces</a></li>
                        <li><a href="https://tlchessfoundation.com/en/stat.php">Statistics</a></li>
                    </ul>
                </li>
                <li><a id="menu-sakk">Chess</a>
                    <ul id="sub-menu-sakk">
                        <li><a href="https://tlchessfoundation.com/en/#videok">Chess Videos</a></li>
                        <li><a href="https://tlchessfoundation.com/en/sakkedzok.php">Chess Coaches</a></li>
                        <li><a href="https://tlchessfoundation.com/en/sakk-oldalak.php">Chess Sites</a></li>
                        <li><a href="https://tlchessfoundation.com/en/chess-stores.php">Chess Stores</a></li>
                        <li><a href="https://tlchessfoundation.com/en/chess-rankings.php">Chess Rankings</a></li>
                        <li><a href="https://tlchessfoundation.com/en/world-champions.php">World Champions</a></li>
                        <li><a href="https://tlchessfoundation.com/en/calculator.php">Calculators</a></li>
                    </ul>
                </li>
                <li><a id="menu-rolunk">About Us</a>
                    <ul id="sub-menu-rolunk">
                        <li><a href="https://tlchessfoundation.com/en/rolunk.php">Who We Are?</a></li>
                        <li><a href="https://tlchessfoundation.com/en/tamogatas.php">Donation</a></li>
                        <li><a href="https://tlchessfoundation.com/en/#calendar">Calendar</a></li>
                        <li><a href="https://tlchessfoundation.com/en/careers.php">Careers</a></li>
                    </ul>
                </li>
                <li><a id="menu-nyelv">Language</a>
                    <ul id="sub-menu-nyelv">
                        <li><a href="javascript:setLanguageCookie('hu')">Magyar</a></li>
                        <li><a href="javascript:setLanguageCookie('en')">English</a></li>
                    </ul>
                </li>
                <li><a href="#contact" class="contact">Contact</a></li>
            </ul>
        </nav>
        
        <section class="header">
            <div>
                <nav class="menu">
                    <ul>
                        <li><a href="/" class="logo"><img src="https://tlchessfoundation.com/sakk/nyhchess-logo.png" alt="NYH Chess"></a></li>
                        <li><a id="menu-partner">Partners</a>
                            <ul id="sub-menu-partner">
                                <li><a href="https://tlchessfoundation.com/en/hirdetesek.php">Advertising Spaces</a></li>
                                <li><a href="https://tlchessfoundation.com/en/stat.php">Statistics</a></li>
                            </ul>
                        </li>
                        <li><a id="menu-sakk">Chess</a>
                            <ul id="sub-menu-sakk">
                                <li><a href="https://tlchessfoundation.com/en/#videok">Chess Videos</a></li>
                                <li><a href="https://tlchessfoundation.com/en/sakkedzok.php">Chess Coaches</a></li>
                                <li><a href="https://tlchessfoundation.com/en/sakk-oldalak.php">Chess Sites</a></li>
                                <li><a href="https://tlchessfoundation.com/en/chess-stores.php">Chess Stores</a></li>
                                <li><a href="https://tlchessfoundation.com/en/chess-rankings.php">Chess Rankings</a></li>
                                <li><a href="https://tlchessfoundation.com/en/world-champions.php">World Champions</a></li>
                                <li><a href="https://tlchessfoundation.com/en/calculator.php">Calculators</a></li>
                            </ul>
                        </li>
                        <li><a id="menu-rolunk">About Us</a>
                            <ul id="sub-menu-rolunk">
                                <li><a href="https://tlchessfoundation.com/en/rolunk.php">Who We Are?</a></li>
                                <li><a href="https://tlchessfoundation.com/en/tamogatas.php">Donation</a></li>
                                <li><a href="https://tlchessfoundation.com/en/#calendar">Calendar</a></li>
                                <li><a href="https://tlchessfoundation.com/en/careers.php">Careers</a></li>
                            </ul>
                        </li>               
                        <li><a id="menu-nyelv">Language</a>
                            <ul id="sub-menu-nyelv">
                                <li><a href="javascript:setLanguageCookie('hu')">Magyar</a></li>
                                <li><a href="javascript:setLanguageCookie('en')">English</a></li>
                            </ul>
                        </li>
                        <li><a href="#contact" class="contact">Contact</a></li>
                    </ul>
                </nav>
                
                