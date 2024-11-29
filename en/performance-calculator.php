<?php $title = "FIDE Performance Calculator - NYH Chess"; include 'header.php';?> 
                
<h1>FIDE Performance Calculator</h1>
<h2>Calculate your performance</h2>

<div class="performance kalkulator-choose">
    <div class="fide-norm-button"><a href="https://tlchessfoundation.com/en/norm.php">FIDE norm calculator</a></div>
    <div class="performance-button"><a href="#">Performance Calculator</a></div>
    <div class="fide-button"><a href="https://tlchessfoundation.com/en/calculator.php">FIDE Elo Calculator</a></div>
</div>
<div id="performance-kalkulator">
    <h3>Enter your opponents' FIDE Elo ratings</h3>
    <p>Opponents without a FIDE rating do not count, exclude them from the calculation.</p>

    <form id="performanceForm">
        <!-- 9 rounds (initial) -->
        <div class="elo-input" id="roundsContainer">
            <div>
                <label for="rating1">Round 1</label>
                <input type="text" id="rating1" placeholder="0000">
            </div>

            <div>
                <label for="rating2">Round 2</label>
                <input type="text" id="rating2" placeholder="0000">
            </div>

            <div>
                <label for="rating3">Round 3</label>
                <input type="text" id="rating3" placeholder="0000">
            </div>

            <div>
                <label for="rating4">Round 4</label>
                <input type="text" id="rating4" placeholder="0000">
            </div>

            <div>
                <label for="rating5">Round 5</label>
                <input type="text" id="rating5" placeholder="0000">
            </div>

            <div>
                <label for="rating6">Round 6</label>
                <input type="text" id="rating6" placeholder="0000">
            </div>

            <div>
                <label for="rating7">Round 7</label>
                <input type="text" id="rating7" placeholder="0000">
            </div>

            <div>
                <label for="rating8">Round 8</label>
                <input type="text" id="rating8" placeholder="0000">
            </div>

            <div>
                <label for="rating9">Round 9</label>
                <input type="text" id="rating9" placeholder="0000">
            </div>
        </div>

        <div class="plus-round">
            <button type="button" onclick="addRounds()">+ Rounds</button>
        </div>

        <div class="elo-input">
            <div>
                <label for="wins">Number of Wins:</label>
                <input type="text" id="wins" placeholder="0" required>
            </div>
            <div>
                <label for="draws">Number of Draws:</label>
                <input type="text" id="draws" placeholder="0" required>
            </div>
            <div>
                <label for="losses">Number of Losses:</label>
                <input type="text" id="losses" placeholder="0" required>
            </div>
        </div>

        <div class="szamol">
            <label for="result">Your Performance</label>
            <div id="result"></div>
            <button type="button" onclick="calculatePerformance()">Calculate</button>
        </div>

    </form>
</div>

</div>
</section>

<section style="background: red; height: 10px;"></section>

<script>
    let roundCount = 9; // Starting with 9 rounds

    function addRounds() {
        const roundsContainer = document.getElementById('roundsContainer');
        
        for (let i = 1; i <= 3; i++) { // Adding 3 new rounds
            roundCount++;
            const newRoundDiv = document.createElement('div');
            newRoundDiv.innerHTML = `
                <label for="rating${roundCount}">Round ${roundCount}</label>
                <input type="text" id="rating${roundCount}" placeholder="0000">
            `;
            roundsContainer.appendChild(newRoundDiv);
        }
    }

    function calculatePerformance() {
    // Check and set default values for empty fields
    const winsInput = document.getElementById('wins');
    const drawsInput = document.getElementById('draws');
    const lossesInput = document.getElementById('losses');

    if (winsInput.value === '') {
        winsInput.value = '0';
    }
    if (drawsInput.value === '') {
        drawsInput.value = '0';
    }
    if (lossesInput.value === '') {
        lossesInput.value = '0';
    }

    let totalScore = 0;
    let totalExpectedScore = 0;
    let totalRating = 0;
    let roundsCounted = 0;

    const wins = parseFloat(winsInput.value);
    const draws = parseFloat(drawsInput.value);
    const losses = parseFloat(lossesInput.value);

    const totalRounds = wins + draws + losses;

    if (isNaN(wins) || isNaN(draws) || isNaN(losses) || totalRounds === 0) {
        alert('Please provide valid results. At least one round must be valid.');
        return;
    }

    totalScore = wins + draws * 0.5;

    for (let i = 1; i <= roundCount; i++) {
        const rating = parseFloat(document.getElementById('rating' + i).value);

        if (!isNaN(rating)) {
            totalRating += rating;
            roundsCounted++;
        }
    }

    // Check if the number of valid rounds matches the sum of wins, draws, and losses
    if (roundsCounted !== totalRounds) {
        alert('The number of rounds provided does not match the sum of wins, draws, and losses. Please check your data.');
        return;
    }

    const averageRating = totalRating / roundsCounted;

    // New Performance (TPR) Calculation
    const performanceRating = (totalRating + 400 * (wins - losses)) / roundsCounted;

    document.getElementById('result').innerHTML = `${Math.round(performanceRating)}`;
}

</script>

<?php include 'footer.php';?> 
