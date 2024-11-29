<?php $title = "Szavazás - NYH Chess"; include 'header.php';?> 
                
                <h1>Szavazás</h1>
    
                <div class="poll-container">
                    <h3>Elégedett vagy a magyar közvetítéssel?</h3>
                    <div>
                        <button class="vote-button" data-vote="option_1">Igen, tökéletes volt <span id="option_1-votes">0</span></button>
                        <button class="vote-button" data-vote="option_2">Összességében jól sikerült, de voltak hibák <span id="option_2-votes">0</span></button>
                        <button class="vote-button" data-vote="option_3">Elment egynek <span id="option_3-votes">0</span></button>
                        <button class="vote-button" data-vote="option_4">Több kivetni való volt benne, mint jó <span id="option_4-votes">0</span></button>
                        <button class="vote-button" data-vote="option_5">Nagyon rossz volt <span id="option_5-votes">0</span></button>
                        <button class="vote-button" data-vote="option_6">Nem néztem / Nincs véleményem <span id="option_6-votes">0</span></button>

                        
                    </div>
                </div>

    </div>
</section>

<script>
$(document).ready(function () {
    // Ellenőrizzük, hogy a felhasználó már szavazott-e
    let oldVote = localStorage.getItem('activeVote');
    if (oldVote) {
        $('[data-vote="' + oldVote + '"]').addClass('active');
    } else {
        $('.vote-button span').hide(); // Elrejti az összes eredményt
    }

    // Szavazás kezelése
    $('.vote-button').click(function () {
        const newVote = $(this).data('vote');
        

        // AJAX kérés a szavazás elküldéséhez
        $.ajax({
            url: 'https://tlchessfoundation.com/poll.php',
            method: 'POST',
            data: { newVote: newVote, oldVote: oldVote },  // Új és régi szavazat küldése
            success: function (response) {
                console.log("Válasz: ", response);
                localStorage.setItem('activeVote', newVote);  // Új szavazat mentése
                $('.vote-button').removeClass('active');  // Active class eltávolítása
                $('[data-vote="' + newVote + '"]').addClass('active');  // Új szavazat active class
                $('.vote-button span').show(); // Eredmények megjelenítése
                getResults();  // Eredmények frissítése
            },
            error: function (xhr, status, error) {
                console.error('Hiba történt:', error);
            }
        });
        
        // Az új szavazat legyen az oldVote
        oldVote = newVote;
    });

    // Szavazatok frissítése
    function getResults() {
        $.ajax({
            url: 'https://tlchessfoundation.com/poll.php',
            method: 'GET',
            success: function (data) {
                const totalVotes = parseInt(data.option_1) + parseInt(data.option_2) + parseInt(data.option_3) + parseInt(data.option_4) + parseInt(data.option_5) + parseInt(data.option_6);

                $('#option_1-votes').text((data.option_1 / totalVotes * 100).toFixed(0) + '%');
                $('#option_2-votes').text((data.option_2 / totalVotes * 100).toFixed(0) + '%');
                $('#option_3-votes').text((data.option_3 / totalVotes * 100).toFixed(0) + '%');
                $('#option_4-votes').text((data.option_4 / totalVotes * 100).toFixed(0) + '%');
                $('#option_5-votes').text((data.option_5 / totalVotes * 100).toFixed(0) + '%');
                $('#option_6-votes').text((data.option_6 / totalVotes * 100).toFixed(0) + '%');
            }
        });
    }

    getResults();
    console.log("Kapott adatok: ", data);
});
</script>

<?php include 'footer.php';?> 
