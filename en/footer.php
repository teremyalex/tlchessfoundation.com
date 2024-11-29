        <footer id="contact">
            <div>
                
                
                <!--
                <div style="margin: 30px 0 0;">
                    <p style="font-weight: 600; font-size: 30px;">NYH Chess in LIVE!</p>
                    <iframe width="90%" style="aspect-ratio: 16 / 9; display: block; margin: 0 auto;" src="https://www.youtube.com/embed/zbAdf535rpk?si=woEwwrodCs7ZTn04&autoplay=1&mute=1&start=810" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                -->
                
                <h2>CONTACT</h2>    
                <p><strong>E-mail:</strong> <em>nyhchess@gmail.com</em></p>
                <div class="social">
                    <a href="https://www.youtube.com/@nyhchess" target="_blank">
                        <svg style="width: 25px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg>
                    </a>
                    <a href="https://www.instagram.com/nyhchess/" target="_blank">
                        <svg style="width: 25px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                    </a>
                    <a href="https://www.facebook.com/profile.php?id=100088157389671" target="_blank">
                        <svg style="width: 15px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg>
                    </a>
                </div>
                
                <p><small>Trembacz Laszlo Chess Foundation</small></p>
                
                
            </div>
        </footer>
        
        
        
        
        
    </body>
    
    
    
<script>
// MENÜ
$(document).ready(function() {
    // Amikor a főmenü elemet kattintják
    $('#menu-partner, #menu-rolunk, #menu-nyelv, #menu-sakk').on('click', function(event) {
        event.stopPropagation();
        $('#sub-menu-partner, #sub-menu-rolunk, #sub-menu-nyelv, #sub-menu-sakk').hide();
        $(this).parent().find('ul').toggle(); // vagy .show(), ha csak megmutatni akarod
    });

    // Amikor bárhova máshova kattintanak az oldalon
    $(document).on('click', function() {
        $('#sub-menu-partner, #sub-menu-rolunk, #sub-menu-nyelv, #sub-menu-sakk').hide();
    });

    // Megakadályozzuk, hogy a submenu kattintása elrejtse a submenu-t
    $('#sub-menu-partner, #sub-menu-rolunk, #sub-menu-nyelv, #sub-menu-sakk').on('click', function(event) {
        event.stopPropagation();
    });
    
    // Amikor görgetnek az oldalon
    $(window).on('scroll', function() {
        $('#sub-menu-partner, #sub-menu-rolunk, #sub-menu-nyelv, #sub-menu-sakk').hide();
    });
    
    //MOBIL
    $('.menu-gomb i').on('click', function() {

    if ($('.menu-list').hasClass('aktiv')) {
        $('.menu-list').removeClass('aktiv');      
            setTimeout(function() {   
                $('body').css('overflow', 'auto');
                $('.menu-list').hide();
            }, 200);
    } else {
        $('body').css('overflow', 'hidden');
        $('.menu-list').show();
            setTimeout(function() {
                $('.menu-list').addClass('aktiv');
            }, 10);
        }
    });
    
    $('.menu-list ul a').on('click', function() {

        $('.menu-list').removeClass('aktiv');      
            setTimeout(function() {   
                $('body').css('overflow', 'auto');
                $('.menu-list').hide();
            }, 200);
    });

  
});
    
//VIDEÓ   
$(document).ready(function() {
    // Kattintás eseménykezelése a képeken
    $('.video-related #index1').on('click', function() {
        $('iframe').hide();
        $('#iframe1').show();   
    });
    $('.video-related #index2').on('click', function() {
        $('iframe').hide();
        $('#iframe2').show();   
    });
    $('.video-related #index3').on('click', function() {
        $('iframe').hide();
        $('#iframe3').show();   
    });
    $('.video-related #index4').on('click', function() {
        $('iframe').hide();
        $('#iframe4').show();   
    });
});
    
$(document).ready(function() {
    // Képek kattintásának kezelése mindkét szekcióban
    $('#fotok img, #fotok2 img').on('click', function() {
        var imgSrc = $(this).attr('src');
        
        // Overlay létrehozása
        var $overlay = $('<div id="overlay"></div>');
        var $image = $('<img>').attr('src', imgSrc);
        
        $overlay.append($image);
        $('body').append($overlay);
        
        // Overlay megjelenítése
        $overlay.fadeIn('fast');
        
        // Bezárás kattintásra
        $overlay.on('click', function() {
            $overlay.fadeOut('fast', function() {
                $overlay.remove();
            });
        });
    });

    // "Load more" gombok kezelése mindkét szekcióban
    $('#load-more, #load-more2').on('click', function() {
        var $section = $(this).closest('section'); // Az adott szekció kiválasztása
        var $images = $section.find('img[data-src]'); // Csak azok a képek, amelyeknél van "data-src" attribútum
        
        $(this).hide(); // Elrejtjük a "load more" gombot
        
        $images.each(function() {
            var dataSrc = $(this).attr('data-src');
            if (dataSrc) {
                $(this).attr('src', dataSrc).removeAttr('data-src'); // Betöltjük a képeket és eltávolítjuk a "data-src" attribútumot
            }
        });
    });
});




// EDZŐK
$('.edzok-gomb .info').on('click', function() {
    $('.edzok-hosszu').addClass('inaktiv');
    $(this).closest('.edzok-card').find('.edzok-hosszu').removeClass('inaktiv');
});

$('.uzenet').on('click', function() {
    $('.email').css("opacity", "0");
    $('.email').css("bottom", "-20px");
    $(this).closest('.edzok-card').find('.email').css("opacity", "1");
    $(this).closest('.edzok-card').find('.email').css("bottom", "-30px");
    if ($(window).width() <= 500) {
        $(this).closest('.edzok-card').find('.email').css("left", "0px");
    }
});  
    
// EDZŐK FILTER    
function sortBy(type, order) {
  var ascendingPriceCheckbox = document.getElementById('ascendingPriceCheckbox');
  var descendingPriceCheckbox = document.getElementById('descendingPriceCheckbox');
  var ascendingFideCheckbox = document.getElementById('ascendingFideCheckbox');
  var descendingFideCheckbox = document.getElementById('descendingFideCheckbox');
  
  // Reset all checkboxes
  ascendingPriceCheckbox.checked = false;
  descendingPriceCheckbox.checked = false;
  ascendingFideCheckbox.checked = false;
  descendingFideCheckbox.checked = false;

  // Set the relevant checkbox
  if (type === 'price') {
    if (order === 'ascending') {
      ascendingPriceCheckbox.checked = true;
    } else {
      descendingPriceCheckbox.checked = true;
    }
  } else if (type === 'fide') {
    if (order === 'ascending') {
      ascendingFideCheckbox.checked = true;
    } else {
      descendingFideCheckbox.checked = true;
    }
  }

  var container = document.getElementById('edzokContainer');
  var cards = Array.from(container.getElementsByClassName('edzok-card'));

  cards.sort(function(a, b) {
    var valueA = parseInt(a.getAttribute('data-' + type), 10);
    var valueB = parseInt(b.getAttribute('data-' + type), 10);

    if (order === 'ascending') {
      return valueA - valueB;
    } else {
      return valueB - valueA;
    }
  });

  // Clear the container and append the sorted cards
  container.innerHTML = '';
  cards.forEach(function(card) {
    container.appendChild(card);
  });
}

    
// STORE FILTER    
$(document).ready(function() {
    // Alapértelmezett szűrő funkció
    function filterStores(countryClass) {
        $('ol li').hide();
        $('span.' + countryClass).closest('li').show();
    }

    // Gombok eseményei
    $('.store-filter div div').click(function() {
        if ($(this).hasClass('active')) {

            $(this).removeClass('active');
            $('ol li').show();
        } else {
            $('.store-filter div div').removeClass('active');
            $(this).addClass('active');
            var countryClass = $(this).attr('id').replace('filter-', '');
            filterStores(countryClass);
        }
    });
    
    //Filter gomb
    $('.filter-icon i').on('click', function() {
        $('.filter-container').toggle();
    });
    
});


    
    

// SCROLL ANIMÁCIÓ    
$(document).ready(function() {
    $('a[href*="#"]').on('click', function(event) {
        if (this.pathname === window.location.pathname) {
            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){
                window.location.hash = hash;
            });
        }
    });
});
</script>
    
</html>