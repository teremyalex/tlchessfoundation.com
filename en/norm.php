<?php $title = "FIDE norm calculator - NYH Chess"; include 'header.php';?> 
                
                <h1>FIDE norm calculator</h1>
                <h2>Calculate if you have achieved a FIDE norm</h2>

                <div class="fide-norm kalkulator-choose">
                    <div class="fide-norm-button"><a href="#">FIDE norm calculator</a></div>
                    <div class="performance-button"><a href="https://tlchessfoundation.com/en/performance-calculator.php">Performance calculator</a></div>
                    <div class="fide-button"><a href="https://tlchessfoundation.com/en/calculator.php">FIDE Elo calculator</a></div>
                </div>
                <div id="norm-kalkulator">


                        <form id="normCalculator">
							<!-- Select your federation -->
							<div class="round-button">
								<label for="games">Number of rounds</label>
                                <button type="button" value="9">9 rounds</button>
							</div>

                            <div class="norm-button">
                                <div id="normTypeButtons">
                                    <label>Type of norm</label>
                                    <button type="button" value="gm" class="active">GM</button>
                                    <button type="button" value="im">IM</button>
                                    <button type="button" value="wgm">WGM</button>
                                    <button type="button" value="wim">WIM</button>
                                    <input type="hidden" id="normType" name="normType" required value="gm">
                                </div>
                            </div>

							<div class="pont-fed">
                                <div class="pont">
                                    <label for="points">Points achieved</label>
                                    <input type="text" id="points" name="points" placeholder="0.0">
                                </div>
                                <div class="sajat-fed">
                                    <label for="ownFederation">Your federation</label>
                                    <select id="ownFederation" name="ownFederation"></select>
                                </div>
							</div>
                            
							<div class="players">
								<div id="opponents">
									<!-- Opponent data will appear here -->
								</div>
							</div>
                            
                            <div class="error">
                                <label>Information</label>
                                <div class="info"></div>
                            </div>
                            
                            <div class="norm-end">
                                <div class="Rp">
                                    <label>Your<br>performance</label>
                                    <div></div>
                                </div>

                                <div class="Ra">
                                    <label>Average rating of opponents</label>
                                    <div></div>
                                </div>

                                <div class="szamol">
                                    <label for="result">Result</label>
                                    <div id="result"></div>
                                    <button type="button" id="calculate">Calculate</button>
                                </div>
                            </div>
						</form>

					

                        
                <p style="opacity: 0.5;"><small>*Successful results are not guaranteed, as many other factors can influence the outcome, which cannot be calculated by a calculator.</small></p>
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
        <option value="none">None</option>
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
                    <label for="elo${i}">Opponent's rating</label>
                    <input type="text" id="elo${i}" name="elo${i}" placeholder="0000">
                </div>
                <div>
                    <label for="title${i}">Title</label>
                    <select id="title${i}" name="title${i}">${titleOptions}</select>
                </div>
                <div>
                    <label for="federation${i}">Opponent's federation</label>
                    <select id="federation${i}" name="federation${i}"></select>
                </div>
            </div>
        `);
    }

    // Töltsük be a szövetségek legördülő listáit
    populateFederationSelectors();

    // Saját szövetséghez is töltsük be a szövetségi listát
    var federationOptions = '<option value="" disabled selected>Select a federation</option>';
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
        
        // Check if the player's own federation is selected
        let ownFederation = $('#ownFederation').val();
        if (!ownFederation) {
            $('.info').text('Please select your own federation.');
            $('.error').show();
            return;
        }

        // Check the points achieved
        let pointsInput = $('#points').val().replace(',', '.'); // Replace commas with periods
        points = parseFloat(pointsInput);

        if (isNaN(points) || points === "") {
            $('.info').text('Please enter the points you achieved.');
            $('.error').show();
            return;
        }

        // Check the minimum points requirement (3.5-point rule)
        if (points < 3.5) {
            $('.info').text('The points achieved (' + points + ') are less than the required minimum (3.5).');
            $('#result').text('Failed!');
            $('.error').show();
            return;
        }

        // Select the minimum average rating from the table
        let minAvgElo = normRequirements[normType][points];
        if (!minAvgElo) {
            $('.info').text('Please correctly enter your points.');
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
                $('.info').text('Please select a federation for each opponent.');
                $('.error').show();
                return;
            }

            if (!isNaN(elo) && federation.length === 3) {
                if (elo < minEloThreshold) {
                    lowEloCount++; // Count opponents below the minimum rating
                    if (lowEloCount > 1) {
                        $('.info').text('The norm is not met because more than one opponent has a rating below the minimum.');
                        $('#result').text('Failed!');
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
                $('.info').text('Please enter all data correctly (rating and federation).');
                $('.error').show();
                return;
            }
        }

        // 1. Check: The norm is not met if more than 5 opponents are from the player's own federation
        if (sameFederationCount > 5) {
            $('.info').text('More than 5 opponents are from your own federation.');
            $('#result').text('Failed!');
            $('.error').show();
            return;
        }

        // 2. Check: Opponents from at least 2 different federations are required
        if (differentFederations.size < 2) {
            $('.info').text('At least 2 opponents from different federations are required.');
            $('#result').text('Failed!');
            $('.error').show();
            return;
        }

        // Ellenfelek átlagos Élő-pontszáma és teljesítmény kiszámítása
        let avgElo = Math.round(eloArray.reduce((a, b) => a + b, 0) / games);
        let performance = avgElo + (points - (games / 2)) * 800 / games;
  
        $('.Ra div').text(avgElo);
        $('.Rp div').text(performance.toFixed(0));

        // Check if the average rating is high enough
        if (avgElo < minAvgElo) {
            $('.info').append(' The average rating of opponents (' + avgElo + ') is lower than the required minimum (' + minAvgElo + ').');
            $('#result').text('Failed!');
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

        // Check number of titled opponents
        if (thCount < minTH) {
            $('.info').append(' The norm is not met: the number of titled opponents (' + thCount + ') is less than the required (' + minTH + ').');
            $('#result').text('Failed!');
            $('.error').show();
            return;
        }

        if (normType === 'gm' && gmCount < minGM) {
            $('.info').text('The GM norm is not met: the number of GM opponents (' + gmCount + ') is less than the required (' + minGM + ').');
            $('#result').text('Failed!');
            $('.error').show();
            return;
        }

        if (normType === 'im' && (imCount + gmCount < minIM_WIM_WGM)) {
            $('.info').text('The IM norm is not met: the number of IM and GM opponents (' + (imCount + gmCount) + ') is less than the required (' + minIM_WIM_WGM + ').');
            $('#result').text('Failed!');
            $('.error').show();
            return;
        }

        if (normType === 'wgm' && (wgmCount + imCount + gmCount < minIM_WIM_WGM)) {
            $('.info').text('The WGM norm is not met: the number of WGM, IM, or GM opponents (' + (wgmCount + imCount + gmCount) + ') is less than the required (' + minIM_WIM_WGM + ').');
            $('#result').text('Failed!');
            $('.error').show();
            return;
        }

        if (normType === 'wim' && (wimCount + wgmCount + imCount + gmCount < minIM_WIM_WGM)) {
            $('info').text('The WIM norm is not met: the number of WIM, WGM, IM, or GM opponents (' + (wimCount + wgmCount + imCount + gmCount) + ') is less than the required (' + minIM_WIM_WGM + ').');
            $('#result').text('Failed!');
            $('.error').show();
            return;
        }

        // Végső eredmény kiírása
        // Final result
        if (performance >= requiredPerformance) {
            $('#result').text(' The norm was achieved!*');
        } else {
            let reason = '';
            if (avgElo < minAvgElo) {
                reason += ' The average rating of opponents is lower than required.';
            }
            if (performance < requiredPerformance) {
                reason += ' Your performance rating (' + performance.toFixed(0) + ') is lower than required (' + requiredPerformance + ').';
            }
            $('.info').text(' Your performance does not meet the ' + normType.toUpperCase() + ' norm.' + reason);
            $('#result').text('Failed!');
            $('.error').show();
        }
    });
});



	
	</script>


<?php include 'footer.php';?> 
