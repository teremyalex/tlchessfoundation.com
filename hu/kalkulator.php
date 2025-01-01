<?php $title = "FIDE pontszám kalkulátor - NYH Chess"; include 'header.php';?> 
                
                <h1>FIDE pontszám kalkulátor</h1>
                <h2>Számold ki az új Fide élő pontod</h2>
                <p style="display: none;">A legjobb Fide élőpontszám kalkulátor. Számolja ki FIDE pontjait gyorsan és egyszerűen!</p>

                <div class="fide-elo kalkulator-choose">
                    <div class="fide-norm-button"><a href="https://tlchessfoundation.com/hu/norm.php">FIDE norma kalkulátor</a></div>
                    <div class="performance-button"><a href="https://tlchessfoundation.com/hu/performance-kalkulator.php">Teljesítmény kalkulátor</a></div>
                    <div class="fide-button"><a href="#">FIDE Élő kalkulátor</a></div>
                </div>
                <div id="kalkulator">
                    <form id="eloForm">
                        <div id="inputContainers">
                            <div id="myElo">
                                <label for="ratingA">Fide élő pontszámod</label>
                                <input type="text" id="ratingA" name="ratingA" placeholder="0000" required>
                                <button type="button" id="elo-csere"><i class="fa-solid fa-retweet"></i></button>
                            </div>
                            <div id="kFactorButtons">
                                <label for="kFactor">Szorzó (K faktor) <i class="fa-solid fa-circle-question"></i></label>
                                <button type="button" onclick="setKFactor(10)">10</button>
                                <button type="button" onclick="setKFactor(20)">20</button>
                                <button type="button" onclick="setKFactor(40)">40</button>
                                <input type="hidden" id="kFactor" name="kFactor" required>
                            </div>    
                            <div id="oppElo1">
                                <label for="ratingB1">Az ellenfeled Fide élő pontszáma</label>
                                <input type="text" id="ratingB1" name="ratingB1" placeholder="0000" required>
                                <span class="side-result"></span>
                            </div>
                            <div id="oppResult1" class="resultButtons">
                                <label for="result">Játszma eredménye</label>
                                <button type="button" onclick="setResult(1, this)">Győzelem</button>
                                <button type="button" onclick="setResult(0.5, this)">Döntetlen</button>
                                <button type="button" onclick="setResult(0, this)">Vereség</button>
                                <input type="hidden" id="gameResult1" name="gameResult1" required>
                            </div>
                        </div>
                        <div class="plus-opp">
                            <div class="alert"></div>
                            <div id="oppContainer">
                                <button type="button" onclick="removeOpponents()">-</button>
                                <span>Ellenfél</span>
                                <button type="button" onclick="addOpponents()">+</button>
                            </div>
                        </div>
                        <div class="szamol">
                            <label for="result">Az új Fide élő pontszámod</label>
                            <div id="result"></div>
                            <button type="button" onclick="calculateElo()">Számol</button>
                        </div>
                        <div class="help">
                            K=40 új játékos esetén, amíg legalább 30 játszmát nem teljesít.<br>
                            K=40 minden játékosnál, 18 éves vagy fiatalabb és 2300 élő pontszám alatt.<br>
                            K=20 mindaddig, amíg a játékos élő pontszáma 2400 alatt marad.<br>
                            K=20 RAPID és BLITZ pontszámok esetén minden játékos számára.<br>
                            K=10 miután egy játékos pontszáma elérte a 2400-at, még akkor is, ha a pontszáma 2400 alá esik.
                            </p>
                        </div>
                    </form>
                </div>
                <button id="utmutato">Útmutató</button>
                <div id="utmutato-text">
                <p>A Fide élő pontszám kalkulátor lehetővé teszi, hogy a FIDE élő pontszámod kiszámold a verseny eredményeid alapján. Az alábbiakban bemutatjuk, hogyan használd a kalkulátort a saját eredményeid figyelembevételével.</p>

                <ol>
                    <li>
                        <h4>FIDE élő pontszámod megadása</h4>
                        <p>A kalkulátor elején található mezőbe írd be a jelenlegi FIDE élő pontszámodat (pl. 2000). Ez a pontszám fogja képezni az alapját az új élő pontszám kiszámításának.</p>
                    </li>
                    <li>
                        <h4>K Faktor kiválasztása</h4>
                        <p>A K faktor meghatározza, hogy mekkora súlyúak a játékaid az élő pontszámod számításában. Válassz a megadott lehetőségek közül (10, 20, 40). A K faktor kiválasztásánál segíhet a kalkulátor mellett található információs szöveg, amely részletezi, melyik esetben melyik K faktor a legmegfelelőbb.</p>
                    </li>
                    <li>
                        <h4>Ellenfeled FIDE élő pontszáma</h4>
                        <p>Add meg az ellenfeled az élő pontszámát a kalkulátor megfelelő mezőjébe. Ez szükséges a játék kiértékeléséhez.</p>
                    </li>
                    <li>
                        <h4>Játszma eredménye</h4>
                        <p>A kalkulátor lehetővé teszi, hogy beállítsd a játszmák eredményét. Minden egyes ellenfélhez válaszd ki, hogy győzelem (1), döntetlen (0.5), vagy vereség (0) lett-e az eredmény. A megadott eredmények alapján fogja a kalkulátor kiszámolni az élő pontszámod változását.</p>
                    </li>
                    <li>
                        <h4>Élő pontszám csere funkció</h4>
                        <div class="elo-csere"><i class="fa-solid fa-retweet"></i></div>
                        <p>Az "Élő csere" gomb segít abban, hogy kényelmesen felcseréld a saját és az első ellenfeled élő pontszámát. Ez akkor lehet hasznos, ha szeretnéd gyorsan kiszámolni, hogyan változott az ellenfeled élő pontszáma, különösen akkor, ha eltérő volt a szorzója. A gomb csak akkor látszódik, ha elkezded gépelni az élő pontszámot.</p>
                    </li>
                    <li>
                        <h4>+Ellenfél funkció</h4>
                        <div class="plus-opp">
                            <div id="oppContainer">
                                <button type="button">-</button>
                                <span>Ellenfél</span>
                                <button type="button">+</button>
                            </div>
                        </div>
                        <p>Ha több ellenféled is volt egy versenyen, használd a "+ Ellenfél" gombot új ellenfelek hozzáadásához. Minden egyes ellenfélhez adj meg egy élő pontszámot és eredményt. Így egyszerre ki tudod számolni, hogyan változott az élő pontszámod a verseny végére.</p>
                    </li>
                    <li>
                        <h4>Számol gomb</h4>
                        <p>Miután megadtad a szükséges adatokat (élő pontszámod, szorzó (K faktor), ellenfelek élő pontszámai és játszma eredményei), kattints a "Számol" gombra. A kalkulátor kiszámolja az új FIDE élő pontszámodat, amely az összes megadott eredmény alapján frissül.</p>
                    </li>
                </ol>

                <p>A kalkulátor segít abban, hogy pár perc alatt megnézd, hogyan változik a FIDE élő pontszámod a játékaid eredményei alapján. Használd bátran minden verseny után, hogy tisztában legyél a fejlődéseddel és eredményeiddel!</p>
                </div>
                <div id="fide-graph" style="max-width: 700px; margin: 0 auto;">
                    <h3>Az összes Fide sakkozó</h3>
                    <p>480.000 FIDE Standard élőponttal rendelkező sakkozóknak az eloszlása</p>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <canvas id="ratingChart" width="800" height="400"></canvas>
                    <div class="x-axis"><span>1400</span><span>1765</span><span>2130</span><span>2495</span><span>2860</span></div>   
                </div>


            </div>
        </section>

        <section style="background: red; height: 10px;"></section>

        
        

<script>
    function setKFactor(value) {
        document.getElementById('kFactor').value = value;
    }
    
    let oppCount = 1;
    let globalIndex = 1;

    function setResult(value, elem) {
        const gameResultInput = elem.parentElement.querySelector('input[type="hidden"]');
        gameResultInput.value = value;
    }

    function calculateElo() {
        removeAlert();
        document.querySelector('.alert').innerHTML = "";
        document.getElementById('result').innerHTML = "";
        document.querySelectorAll('.side-result').forEach(element => element.innerHTML = "");
        let totalratingChange = 0;
        const ratingA = parseFloat(document.getElementById('ratingA').value);
        const kFactor = parseFloat(document.getElementById('kFactor').value);
        for(let i=1; i<=oppCount;i++){  
            globalIndex = i;
            const ratingB = parseFloat(document.getElementById('ratingB' + i).value);
            const gameResult = parseFloat(document.getElementById('gameResult' + i).value);

            if (isNaN(ratingA) || ratingA < 1400 || ratingA > 3000) {
                document.querySelector('.alert').innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i>Kérlek, add meg a Fide élő pontszámod 1400 és 3000 között.`;
                document.getElementById('ratingA').parentElement.classList.add('active');
                return;
            } else if(isNaN(kFactor)) {
                document.querySelector('.alert').innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i>Kérlek, add meg a szorzó (K faktor) értékét.`;
                document.getElementById('kFactor').parentElement.classList.add('active');
                return;
            } else if (isNaN(ratingB) || ratingB < 1400 || ratingB > 3000) {
                document.querySelector('.alert').innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i>Kérlek, add meg a(z) ${i}. ellefeled Fide élő pontszámát 1400 és 3000 között.`;
                document.getElementById('ratingB' + i).parentElement.classList.add('active');
                document.querySelectorAll('.side-result').forEach(element => element.innerHTML = "");
                return;
            } else if(isNaN(gameResult)) {
                document.querySelector('.alert').innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i>Kérlek, add meg a(z) ${i}. játszma eredményét.`;
                document.getElementById('gameResult' + i).parentElement.classList.add('active');
                document.querySelectorAll('.side-result').forEach(element => element.innerHTML = "");
                return;
            }

            const expectedScoreA = 1 / (1 + Math.pow(10, (ratingB - ratingA) / 400));
            const newRatingA = ratingA + kFactor * (gameResult - expectedScoreA);
            let ratingChange = newRatingA - ratingA;
            
            /*if (kFactor === 20 || kFactor === 40){
                const lower = Math.floor(ratingChange * 10) / 10;  // Az alsó tizedes érték
                const upper = Math.ceil(ratingChange * 10) / 10;   // A felső tizedes érték
                    
                


                // Kiválasztjuk a legközelebbi páros értéket
                ratingChange = (lower*10) % 2 === 0 ? lower : upper;
            }*/
            
            totalratingChange += ratingChange;
            console.log(newRatingA, totalratingChange);
            
            if(oppCount > 1){
                document.querySelector('#oppElo' + i + ' span').innerHTML = (ratingChange >= 0 ? '+' : '') + ratingChange.toFixed(1);
            }
        }
        let finalRating = ratingA + totalratingChange;
        
         document.getElementById('result').innerHTML = `${finalRating.toFixed(1)} <span>${totalratingChange >= 0 ? '+' : ''}${totalratingChange.toFixed(1)}</span>`;
    }
    
    
    function addOpponents(){
        document.querySelector('.alert').innerHTML = "";
        oppCount++;
        let newOpp = `
            <div id="oppElo${oppCount}">
                <label for="ratingB${oppCount}">A(z) ${oppCount}. ellenfeled Fide élő pontszáma</label>
                <input type="text" id="ratingB${oppCount}" name="ratingB${oppCount}" placeholder="0000" required>
                <span class="side-result"></span>
            </div>
            <div id="oppResult${oppCount}" class="resultButtons">
                <label for="result">Játszma eredménye</label>
                <button type="button" onclick="setResult(1, this)">Győzelem</button>
                <button type="button" onclick="setResult(0.5, this)">Döntetlen</button>
                <button type="button" onclick="setResult(0, this)">Vereség</button>
                <input type="hidden" id="gameResult${oppCount}" name="gameResult${oppCount}" required>
            </div> 
        `;
        
        let container = document.createElement('div');
        container.innerHTML = newOpp;

        let targetDiv = document.querySelector('#eloForm div');
        while (container.firstChild) {
            targetDiv.appendChild(container.firstChild);
        }
    }
    
    function removeOpponents(){
        if(oppCount > 1){
            oppCount--;
            globalIndex = oppCount;
            document.getElementById('inputContainers').lastElementChild.remove();
            document.getElementById('inputContainers').lastElementChild.remove();
        }
        document.getElementById('result').innerHTML != "" ? calculateElo() : null;
    }
    
    function removeAlert(){
        document.getElementById('myElo').classList.remove('active');
        document.getElementById('kFactorButtons').classList.remove('active');
        document.getElementById('oppElo' + globalIndex).classList.remove('active');
        document.getElementById('oppResult' + globalIndex).classList.remove('active');
    }
    
    
  
    $('#kFactorButtons button').on('click', function() {
        $('#kFactorButtons button').removeClass('active');
        $(this).addClass('active');
    });
    
    $(document).on('click', '.resultButtons button', function() {
        $(this).parent().find('button').removeClass('active');
        $(this).addClass('active');
    });
    
    $('.fa-circle-question').on('click', function() {
        $('.help').toggle();
    });
	
	document.getElementById('ratingA').addEventListener('input', function() {
        if (document.getElementById('ratingA').value === '' && document.getElementById('ratingB1').value === '') {
            document.getElementById('elo-csere').style.display = "none";
        } else {
            document.getElementById('elo-csere').style.display = "inline-block";
        }
    });

	document.getElementById('ratingB1').addEventListener('input', function() {
        if (document.getElementById('ratingA').value === '' && document.getElementById('ratingB1').value === '') {
            document.getElementById('elo-csere').style.display = "none";
        } else {
            document.getElementById('elo-csere').style.display = "inline-block";
        }
    });
	document.getElementById('elo-csere').onclick = function(){
		var myElo = document.getElementById('ratingA').value;
		var opponentElo = document.getElementById('ratingB1').value;
		document.getElementById('ratingA').value = opponentElo;
		document.getElementById('ratingB1').value = myElo;
	}
    
    
</script>
<script>
    document.getElementById('utmutato').addEventListener('click', function(){
        document.getElementById('utmutato-text').classList.toggle('active');
        document.getElementById('utmutato').textContent = document.getElementById('utmutato').textContent === "Útmutató" ? "Bezárás" : "Útmutató";

        console.log(document.getElementById('utmutato').textContent);
    });
</script>
<script>
	// Adatok betöltése a helyi JSON fájlból
	fetch('https://tlchessfoundation.com/ratings.json')
		.then(response => response.json())
		.then(data => {
			const ratings = data.ratings;

			// Histogram adatainak előkészítése
			const ratingCounts = new Array(73).fill(0); // 1400-2850 (1450 intervallum, kb. 50-es lépések)
			ratings.forEach(rating => {
				if (rating >= 1400 && rating <= 2860) {
					const index = Math.floor((rating - 1400) / 20);
					ratingCounts[index]++;
				}
			});

			// Az X tengely címkék létrehozása (1400-2850 közötti tartomány 50-es intervallumokban)
			const labels = [];
			for (let i = 1400; i < 2860; i += 20) {
				labels.push(`${i} - ${i + 19}`);
			}

			// Chart.js használata a grafikon megjelenítésére
			const ctx = document.getElementById('ratingChart').getContext('2d');
			const gradient = ctx.createLinearGradient(20, 0, 0, 300);
			gradient.addColorStop(0, 'rgba(255, 0, 0, 0.3)');
			gradient.addColorStop(1, 'rgba(255, 0, 0, 0)');
			new Chart(ctx, {
				type: 'line',
				data: {
					labels: labels,
					datasets: [{
						label: undefined,
						data: ratingCounts,
						borderColor: 'red',
						borderWidth: 2,
						pointRadius: 6,
						pointBackgroundColor: 'transparent',
						pointBorderColor: 'transparent',
						pointHoverRadius: 6,
						pointHoverBackgroundColor: 'red',
						fill: true,
						backgroundColor: gradient,
						tension: 0.4 // A vonal simítása
					}]
				},
				options: {
					responsive: true,
					interaction: {
						mode: 'nearest',
						axis: 'x',
						intersect: false
					},
					scales: {
						x: {

							grid: {
								display: false
							},
							ticks: {
								display: false
							}

						},
						y: {
							beginAtZero: true,
							title: {
								display: false,
							},
							grid: {
								display: false
							},
							display: false
						}
					},
					plugins: {
						tooltip: {
							intersect: false,
							displayColors: false,
							backgroundColor: '#222'
						},
						legend: {
							display: false
						}
					},
					hover: {
						mode: 'index',
						intersect: false
					},
					animation: false, // Animáció kikapcsolása a folyamatos frissítéshez
					onHover: (event, chartElements) => {
						const chart = event.chart;
						if (chartElements.length > 0) {
							const element = chartElements[0];
							chart.ctx.save();
							chart.ctx.beginPath();
							chart.ctx.moveTo(element.element.x, chart.chartArea.top);
							chart.ctx.lineTo(element.element.x, chart.chartArea.bottom);
							chart.ctx.lineWidth = 1;
							chart.ctx.strokeStyle = '#555';
							chart.ctx.stroke();
							chart.ctx.restore();
						}
					}
				}
			});
		})
		.catch(error => console.error('Hiba történt az adatok betöltésekor:', error));
</script>

                
            
        
<?php include 'footer.php';?> 