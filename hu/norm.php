<?php $title = "FIDE norma kalkulátor - NYH Chess"; include 'header.php';?> 
                
                <h1>FIDE norma kalkulátor</h1>
                <h2>Számold ki sikerült-e Fide normát szerezned</h2>

                <div class="fide-norm kalkulator-choose">
                    <div class="fide-norm-button"><a href="#">FIDE norma kalkulátor</a></div>
                    <div class="performance-button"><a href="https://tlchessfoundation.com/hu/performance-kalkulator.php">Teljesítmény kalkulátor</a></div>
                    <div class="fide-button"><a href="https://tlchessfoundation.com/hu/kalkulator.php">FIDE Élő kalkulátor</a></div>
                </div>
                <div id="norm-kalkulator">


                        <form id="normCalculator">
							<!-- Saját szövetség kiválasztása -->
							<div class="round-button">
								<label for="games">Fordulók száma</label>
                                <button type="button" value="9">9 forduló</button>
							</div>

                            <div class="norm-button">
                                <div id="normTypeButtons">
                                    <label>Norma típusa</label>
                                    <button type="button" value="gm" class="active">GM</button>
                                    <button type="button" value="im">IM</button>
                                    <button type="button" value="wgm">WGM</button>
                                    <button type="button" value="wim">WIM</button>
                                    <input type="hidden" id="normType" name="normType" required value="gm">
                                </div>
                            </div>

							<div class="pont-fed">
                                <div class="pont">
                                    <label for="points">Elért pont</label>
                                    <input type="text" id="points" name="points" placeholder="0.0">
                                </div>
                                <div class="sajat-fed">
                                    <label for="ownFederation">Saját szövetséged</label>
                                    <select id="ownFederation" name="ownFederation"></select>
                                </div>
							</div>
                            
							<div class="players">
								<div id="opponents">
									<!-- Ellenfelek adatai itt jelennek meg -->
								</div>
							</div>
                            
                            <div class="error">
                                <label>Információ</label>
                                <div class="info"></div>
                            </div>
                            
                            <div class="norm-end">
                                <div class="Rp">
                                    <label>Teljesítményed</label>
                                    <div></div>
                                </div>

                                <div class="Ra">
                                    <label>Ellenfelek átlaga</label>
                                    <div></div>
                                </div>

                                <div class="szamol">
                                    <label for="result">Eredmény</label>
                                    <div id="result"></div>
                                    <button type="button" id="calculate">Számítás</button>
                                </div>
                            </div>
						</form>

					

                        
                <p style="opacity: 0.5;"><small>*A sikeres eredmény nem garantált, sok egyéb tényező is befolyásolhatja, ami egy kalkulátorral nem kiszámolható.</small></p>
                </div>


            </div>
        </section>


<section style="background: black; display: none;">
    <div>
    
        <h3>FIDE Normák Szabályrendszere</h3>
        <h4>A norma teljesítésének feltételei</h4>
        <ul>
            <li><strong>Fordulók száma:</strong> A játékosnak legalább 9 fordulós versenyen kell részt vennie.</li>
            <li><strong>Pontszám:</strong> A norma eléréséhez legalább 3,5 pontot kell szerezni.</li>
            <li><strong>Ellenfelek Élő-pontszáma:</strong> Az ellenfelek átlagos Élő-pontszámának meg kell haladnia a norma típusához tartozó minimumot:
                <ul>
                    <li>GM norma: átlagos Élő-pontszám minimum 2380</li>
                    <li>IM norma: átlagos Élő-pontszám minimum 2230</li>
                    <li>WGM norma: átlagos Élő-pontszám minimum 2180</li>
                    <li>WIM norma: átlagos Élő-pontszám minimum 2030</li>
                </ul>
            </li>
            <li><strong>Ellenfelek címe:</strong> A norma megszerzéséhez bizonyos számú címviselő ellenfelet kell legyőzni:
                <ul>
                    <li>GM norma esetén legalább 3 GM ellenfél szükséges.</li>
                    <li>IM norma esetén 3 IM vagy GM ellenfél szükséges.</li>
                </ul>
            </li>
            <li><strong>Ellenfelek különböző szövetségei:</strong> Az ellenfelek legalább két különböző szövetségből kell származzanak, és maximum 5 ellenfél lehet ugyanabból a szövetségből, mint a játékos.</li>
            <li><strong>Teljesítmény érték:</strong> A teljesítmény érték (Rp) kiszámítása az ellenfelek átlagos Élő-pontszámából és a játékos által elért pontokból történik. GM norma esetén 2600 teljesítmény szükséges.</li>
        </ul>
        <p>* A pontos szabályokat a FIDE előírásai szerint kell figyelembe venni, egyéb tényezők is befolyásolhatják az eredményt.</p>
    </div>
    
    </div>
</section>
	
	
	<section style="background: red; height: 10px;"></section>
	
<script>
$('#normTypeButtons button').on('click', function() {
        $('#normTypeButtons button').removeClass('active');
        $(this).addClass('active');
    });
    
    $('#resultButtons button').on('click', function() {
        $('#resultButtons button').removeClass('active');
        $(this).addClass('active');
    });
</script>    


<script src="../js/federations.js"></script>
	
<script>
	
$(document).ready(function() {
    // Az Élő-pontszám tartományok tárolása
    const normRequirements = {
        gm: { 9: 2380, 8.5: 2380, 8: 2380, 7.5: 2380, 7: 2380, 6.5: 2434, 6: 2475, 5.5: 2520, 5: 2557, 4.5: 2600, 4: 2643, 3.5: 2680 },
        im: { 9: 2230, 8.5: 2230, 8: 2230, 7.5: 2230, 7: 2230, 6.5: 2284, 6: 2325, 5.5: 2370, 5: 2407, 4.5: 2450, 4: 2493, 3.5: 2530 },
        wgm: { 9: 2180, 8.5: 2180, 8: 2180, 7.5: 2180, 7: 2180, 6.5: 2234, 6: 2275, 5.5: 2320, 5: 2357, 4.5: 2400, 4: 2443, 3.5: 2480 },
        wim: { 9: 2030, 8.5: 2030, 8: 2030, 7.5: 2030, 7: 2030, 6.5: 2084, 6: 2125, 5.5: 2170, 5: 2207, 4.5: 2250, 4: 2293, 3.5: 2330 }
    };

    // Ellenfelek mezők dinamikus létrehozása
    const titleOptions = `
        <option value="none">Nincs</option>
        <option value="cm">CM</option>
        <option value="wcm">WCM</option>
        <option value="fm">FM</option>
        <option value="wfm">WFM</option>  
        <option value="im">IM</option>
        <option value="wim">WIM</option>
        <option value="gm">GM</option>
        <option value="wgm">WGM</option>
    `;

    for (let i = 1; i <= 9; i++) {
        $('#opponents').append(`
            <div>
                <div>
                    <label for="elo${i}">Ellenfél élője</label>
                    <input type="text" id="elo${i}" name="elo${i}" placeholder="0000">
                </div>
                <div>
                    <label for="title${i}">Cím</label>
                    <select id="title${i}" name="title${i}">${titleOptions}</select>
                </div>
                <div>
                    <label for="federation${i}">Ellenfél szövetsége</label>
                    <select id="federation${i}" name="federation${i}"></select>
                </div>
            </div>
        `);
    }

    // Töltsük be a szövetségek legördülő listáit
    populateFederationSelectors();

    // Saját szövetséghez is töltsük be a szövetségi listát
    var federationOptions = '<option value="" disabled selected>Válassz szövetséget</option>';
    federationOptions += federations.map(function(federation) {
        return '<option value="' + federation.code + '">' + federation.code + ' (' + federation.name + ')</option>';
    }).join('');

    $('#ownFederation').html(federationOptions);
    for (let i = 1; i <= 9; i++) {
        $(`#federation${i}`).html(federationOptions);
    }

    // Norma típusának kiválasztása gombokkal
    function setNormType(type) {
        $('#normType').val(type);  // Rejtett mező értékének beállítása
        console.log("Kiválasztott norma: " + type);
    }

    // Aktív gomb kijelölés
    $('#normTypeButtons button').on('click', function() {
        $('#normTypeButtons button').removeClass('active'); 
        $(this).addClass('active');
        setNormType($(this).val());  
    });

    // Számítás
    $('#calculate').click(function() {
        let games = 9;
        let points = parseFloat($('#points').val());
        let normType = $('#normType').val();
        let eloArray = [];
        let federationArray = [];
        let sameFederationCount = 0;
        let differentFederations = new Set();
        let lowEloCount = 0; // Számolja, hány ellenfél Élője kisebb a minimumnál

        let thCount = 0, gmCount = 0, imCount = 0, wimCount = 0, wgmCount = 0;
        let minEloThreshold;
        
        $('.info').text('');
        $('.error').hide();
        $('#result').text('');
        
        // Saját szövetség kiválasztás ellenőrzése
        let ownFederation = $('#ownFederation').val();
        if (!ownFederation) {
            $('.info').text('Kérlek, válaszd ki a saját szövetséged.');
            $('.error').show();
            return;
        }
        
        

        // Elért pontszám ellenőrzése
        let pointsInput = $('#points').val().replace(',', '.'); // Vesszőt pontra cseréljük
        points = parseFloat(pointsInput);
        
        if (isNaN(points) || points === "") {
            $('.info').text('Kérlek, add meg az elért pontszámod.');
            $('.error').show();
            return;
        }

        // Minimum pontszám ellenőrzése (3.5 pont szabály)
        if (points < 3.5) {
            $('.info').text('Az elért pontszám (' + points + ') kevesebb, mint a szükséges minimum (3.5).');
            $('#result').text('Nem sikerült!');
            $('.error').show();
            return;
        }

        // Minimum Élő-pontszám kiválasztása a táblázatból
        let minAvgElo = normRequirements[normType][points];
        if (!minAvgElo) {
            $('.info').text('Add meg helyesen a pontod.');
            $('.error').show();
            return;
        }

        // Minimum Élő threshold beállítása a normatípus alapján
        switch (normType) {
            case 'gm':
                minEloThreshold = 2200;
                break;
            case 'im':
                minEloThreshold = 2050;
                break;
            case 'wgm':
                minEloThreshold = 2000;
                break;
            case 'wim':
                minEloThreshold = 1850;
                break;
        }

        // Ellenfelek adatainak begyűjtése és Élő-pontszámok ellenőrzése
        for (let i = 1; i <= games; i++) {
            let elo = parseInt($(`#elo${i}`).val());
            let federation = $(`#federation${i}`).val();
            let title = $(`#title${i}`).val();

            if (!federation) {
                $('.info').text('Kérlek, válasssz szövetséget minden ellenfélhez.');
                $('.error').show();
                return;
            }

            if (!isNaN(elo) && federation.length === 3) {
                if (elo < minEloThreshold) {
                    lowEloCount++; // Számolja a minimum alatt lévő Élőket
                    if (lowEloCount > 1) {
                        $('.info').text('Nem teljesült a norma, mert több mint 1 ellenfeled Élő-pontszáma a minimum alatt van.');
                        $('#result').text('Nem sikerült!');
                        $('.error').show();
                        return;
                    }
                    elo = minEloThreshold; // Ha csak egy ellenfél Élője kisebb, felkonvertáljuk
                }
                eloArray.push(elo);
                federationArray.push(federation);

                // Számoljuk a címviselőket
                if (title === 'gm') gmCount++;
                if (title === 'im') imCount++;
                if (title === 'wim') wimCount++;
                if (title === 'wgm') wgmCount++;
                if (title !== 'none' && title !== 'cm' && title !== 'wcm') thCount++;

                if (federation === ownFederation) {
                    sameFederationCount++;
                } else {
                    differentFederations.add(federation);
                }
            } else {
                $('.info').text('Kérlek, add meg az összes adatot helyesen (Élő és szövetség).');
                $('.error').show();
                return;
            }
        }

        // 1. Ellenőrzés: Nem teljesült a norma, ha több, mint 5 ellenfél tartozik a saját szövetséghez
        if (sameFederationCount > 5) {
            $('.info').text('Több, mint 5 ellenfél a saját szövetségedből származik.');
            $('#result').text('Nem sikerült!');
            $('.error').show();
            return;
        }

        // 2. Ellenőrzés: A tőled eltérő szövetségű ellenfelek legalább 2 különböző szövetséghez kell tartozzanak
        if (differentFederations.size < 2) {
            $('.info').text('Legalább 2 különböző szövetségű ellenfél szükséges.');
            $('#result').text('Nem sikerült!');
            $('.error').show();
            return;
        }

        // Ellenfelek átlagos Élő-pontszáma és teljesítmény kiszámítása
        let avgElo = Math.round(eloArray.reduce((a, b) => a + b, 0) / games);
        let performance = avgElo + (points - (games / 2)) * 800 / games;
  
        $('.Ra div').text(avgElo);
        $('.Rp div').text(performance.toFixed(0));

        // Dinamikus minimum Élő-pontszám ellenőrzése
        if (avgElo < minAvgElo) {
            $('.info').append(' Az ellenfelek átlagos Élő-pontszáma (' + avgElo + ') alacsonyabb a minimum követelményhez képest (' + minAvgElo + ').');
            $('#result').text('Nem sikerült!');
            $('.error').show();
            return;
        }

        let requiredPerformance, minTH, minGM, minIM_WIM_WGM;

        // Normákhoz szükséges további ellenőrzések
        switch(normType) {
            case 'gm':
                requiredPerformance = 2600;
                minTH = 5;
                minGM = 3;
                break;
            case 'im':
                requiredPerformance = 2450;
                minTH = 5;
                minIM_WIM_WGM = 3;
                break;
            case 'wgm':
                requiredPerformance = 2400;
                minTH = 5;
                minIM_WIM_WGM = 3;
                break;
            case 'wim':
                requiredPerformance = 2250;
                minTH = 5;
                minIM_WIM_WGM = 3;
                break;
        }

        // Címviselők száma ellenőrzés
        if (thCount < minTH) {
            $('.info').append(' Nem felel meg a normának: a címviselő ellenfelek száma (' + thCount + ') kevesebb, mint a szükséges (' + minTH + ').');
            $('#result').text('Nem sikerült!');
            $('.error').show();
            return;
        }

        if (normType === 'gm' && gmCount < minGM) {
            $('.info').text('Nem felel meg a GM normának: a GM ellenfelek száma (' + gmCount + ') kevesebb, mint a szükséges (' + minGM + ').');
            $('#result').text('Nem sikerült!');
            $('.error').show();
            return;
        }

        if (normType === 'im' && (imCount + gmCount < minIM_WIM_WGM)) {
            $('.info').text('Nem felel meg az IM normának: az IM és GM ellenfelek száma (' + (imCount + gmCount) + ') kevesebb, mint a szükséges (' + minIM_WIM_WGM + ').');
            $('#result').text('Nem sikerült!');
            $('.error').show();
            return;
        }

        if (normType === 'wgm' && (wgmCount + imCount + gmCount < minIM_WIM_WGM)) {
            $('.info').text('Nem felel meg a WGM normának: a WGM, IM, vagy GM ellenfelek száma (' + (wgmCount + imCount + gmCount) + ') kevesebb, mint a szükséges (' + minIM_WIM_WGM + ').');
            $('#result').text('Nem sikerült!');
            $('.error').show();
            return;
        }

        if (normType === 'wim' && (wimCount + wgmCount + imCount + gmCount < minIM_WIM_WGM)) {
            $('info').text('Nem felel meg a WIM normának: a WIM, WGM, IM, vagy GM ellenfelek száma (' + (wimCount + wgmCount + imCount + gmCount) + ') kevesebb, mint a szükséges (' + minIM_WIM_WGM + ').');
            $('#result').text('Nem sikerült!');
            $('.error').show();
            return;
        }

        // Végső eredmény kiírása
        if (performance >= requiredPerformance) {
            $('#result').text(' Sikerült a norma!*');
        } else {
            let reason = '';
            if (avgElo < minAvgElo) {
                reason += ' Az ellenfelek átlagos Élő-pontszáma alacsonyabb a szükségesnél.';
            }
            if (performance < requiredPerformance) {
                reason += ' A teljesítmény szerinti értékszámod (' + performance.toFixed(0) + ') alacsonyabb a szükségesnél (' + requiredPerformance + ').';
            }
            $('.info').text(' A teljesítményed nem éri el a(z) ' + normType.toUpperCase() + ' normát.' + reason);
            $('#result').text('Nem sikerült!');
            $('.error').show();
        }
    });
});



	
	</script>


<?php include 'footer.php';?> 
