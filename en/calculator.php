<?php $title = "Best FIDE Rating Calculator - NYH Chess"; include 'header.php';?> 
                
                <h1>FIDE Rating Calculator</h1>
                <h2>Calculate your new FIDE Elo rating</h2>

                <div class="fide-elo kalkulator-choose">
                    <div class="fide-norm-button"><a href="https://tlchessfoundation.com/en/norm.php">FIDE norm calculator</a></div>
                    <div class="performance-button"><a href="https://tlchessfoundation.com/en/performance-calculator.php">Performance Calculator</a></div>
                    <div class="fide-button"><a href="#">FIDE Elo Calculator</a></div>
                </div>
                <div id="kalkulator">
                    <form id="eloForm">
                        <div id="inputContainers">
                            <div id="myElo">
                                <label for="ratingA">Your FIDE Elo rating</label>
                                <input type="text" id="ratingA" name="ratingA" placeholder="0000" required>
                                <button type="button" id="elo-csere"><i class="fa-solid fa-retweet"></i></button>
                            </div>
                            <div id="kFactorButtons">
                                <label for="kFactor">Multiplier (K factor) <i class="fa-solid fa-circle-question"></i></label>
                                <button type="button" onclick="setKFactor(10)">10</button>
                                <button type="button" onclick="setKFactor(20)">20</button>
                                <button type="button" onclick="setKFactor(40)">40</button>
                                <input type="hidden" id="kFactor" name="kFactor" required>
                            </div>    
                            <div id="oppElo1">
                                <label for="ratingB1">Your opponent's FIDE Elo rating</label>
                                <input type="text" id="ratingB1" name="ratingB1" placeholder="0000" required>
                                <span class="side-result"></span>
                            </div>
                            <div id="oppResult1" class="resultButtons">
                                <label for="result">Match result</label>
                                <button type="button" onclick="setResult(1, this)">Win</button>
                                <button type="button" onclick="setResult(0.5, this)">Draw</button>
                                <button type="button" onclick="setResult(0, this)">Loss</button>
                                <input type="hidden" id="gameResult1" name="gameResult" required>
                            </div>
                        </div>
                        <div class="plus-opp">
                            <div class="alert"></div>
                            <div class="plus-opp">
                                <div class="alert"></div>
                                <div id="oppContainer">
                                    <button type="button" onclick="removeOpponents()">-</button>
                                    <span>Opponent</span>
                                    <button type="button" onclick="addOpponents()">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="szamol">
                            <label for="result">Your new FIDE Elo rating</label>
                            <div id="result"></div>
                            <button type="button" onclick="calculateElo()">Calculate</button>
                        </div>
                        <div class="help">
                            K=40 for new players until they complete at least 30 games.<br>
                            K=40 for all players aged 18 or younger and with a rating below 2300.<br>
                            K=20 until the player's rating reaches 2400.<br>
                            K=20 for all players for RAPID and BLITZ ratings.<br>
                            K=10 after a player reaches a rating of 2400, even if their rating falls below 2400.
                        </div>
                    </form>
                </div>
                <button id="utmutato">Guide</button>
                <div id="utmutato-text">
                    <p>The FIDE rating calculator allows you to calculate your FIDE rating based on your tournament results. Below we show you how to use the calculator considering your own results.</p>

                    <ol>
                        <li>
                            <h4>Enter Your FIDE Rating</h4>
                            <p>Enter your current FIDE rating (e.g., 2000) in the field at the beginning of the calculator. This rating will form the basis for calculating your new rating.</p>
                        </li>
                        <li>
                            <h4>Select K Factor</h4>
                            <p>The K factor determines how significant your games are in calculating your rating. Choose from the given options (10, 20, 40). The information next to the calculator can help you decide which K factor is most appropriate for your case.</p>
                        </li>
                        <li>
                            <h4>Opponent's FIDE Rating</h4>
                            <p>Enter your opponent's rating in the appropriate field of the calculator. This is needed for evaluating the game.</p>
                        </li>
                        <li>
                            <h4>Match Result</h4>
                            <p>The calculator allows you to set the results of your games. For each opponent, choose whether the result was a win (1), a draw (0.5), or a loss (0). Based on the given results, the calculator will compute the change in your rating.</p>
                        </li>
                        <li>
                            <h4>Rating Swap Function</h4>
                            <div class="elo-csere"><i class="fa-solid fa-retweet"></i></div>
                            <p>The "Rating Swap" button helps you easily swap your own and your first opponent's rating. This can be useful if you want to quickly calculate how your opponent's rating has changed, especially if the multiplier was different. The button only appears when you start entering a rating.</p>
                        </li>
                        <li>
                            <h4>+Opponent Function</h4>
                            <div class="plus-opp">
                                <div id="oppContainer">
                                    <button type="button">-</button>
                                    <span>Opponent</span>
                                    <button type="button">+</button>
                                </div>
                            </div>
                            <p>If you had multiple opponents in a tournament, use the "+ Opponent" button to add new opponents. For each opponent, provide a rating and result. This way, you can calculate how your rating changed after the tournament.</p>
                        </li>
                        <li>
                            <h4>Calculate Button</h4>
                            <p>Once you have entered all the required data (your rating, multiplier (K factor), opponents' ratings, and match results), click the "Calculate" button. The calculator will compute your new FIDE rating, updated based on all the given results.</p>
                        </li>
                    </ol>

                    <p>The calculator helps you quickly see how your FIDE rating changes based on your game results in just a few minutes. Feel free to use it after every tournament to stay updated with your progress and results!</p>
                </div>

                <div id="fide-graph" style="max-width: 700px; margin: 0 auto;">
                    <h3>All FIDE Chess Players</h3>
                    <p>Distribution of 480,000 chess players with FIDE Standard rating</p>
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
        // Find the hidden input field within the parent element
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
                document.querySelector('.alert').innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i>Please provide your FIDE Elo rating between 1400 and 3000.`;
                document.getElementById('ratingA').parentElement.classList.add('active');
                return;
            } else if(isNaN(kFactor)) {
                document.querySelector('.alert').innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i>Please provide the value of the multiplier (K factor).`;
                document.getElementById('kFactor').parentElement.classList.add('active');
                return;
            } else if (isNaN(ratingB) || ratingB < 1400 || ratingB > 3000) {
                document.querySelector('.alert').innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i>Please provide the FIDE Elo rating of your ${i}th opponent between 1400 and 3000.`;
                document.getElementById('ratingB' + i).parentElement.classList.add('active');
                document.querySelectorAll('.side-result').forEach(element => element.innerHTML = "");
                return;
            } else if(isNaN(gameResult)) {
                document.querySelector('.alert').innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i>Please provide the result of the ${i}th game.`;
                document.getElementById('gameResult' + i).parentElement.classList.add('active');
                document.querySelectorAll('.side-result').forEach(element => element.innerHTML = "");
                return;
            }
            const expectedScoreA = 1 / (1 + Math.pow(10, (ratingB - ratingA) / 400));
            const newRatingA = ratingA + kFactor * (gameResult - expectedScoreA);
            const ratingChange = newRatingA - ratingA;
            totalratingChange += ratingChange;
            console.log(newRatingA, ratingChange);
            
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
                <label for="ratingB${oppCount}">Your opponent's FIDE Elo rating</label>
                <input type="text" id="ratingB${oppCount}" name="ratingB${oppCount}" placeholder="0000" required>
                <span class="side-result"></span>
            </div>
            <div id="oppResult${oppCount}" class="resultButtons">
                <label for="result">Match result</label>
                <button type="button" onclick="setResult(1, this)">Win</button>
                <button type="button" onclick="setResult(0.5, this)">Draw</button>
                <button type="button" onclick="setResult(0, this)">Loss</button>
                <input type="hidden" id="gameResult${oppCount}" name="gameResult${oppCount}" required>
            </div> 
        `;
        
        let container = document.createElement('div');
        container.innerHTML = newOpp;

        // Add all child elements of the container to the target element
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
        document.getElementById('utmutato').textContent = document.getElementById('utmutato').textContent === "Guide" ? "Close" : "Guide";

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
			gradient.addColorStop(0, 'rgba(255, 0, 0, 0.4)');
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
