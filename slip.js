
const confirmationModal = document.getElementById('confirmation-modal');
const successModal = document.getElementById('success-modal');
const failureModal = document.getElementById('failure-modal');
const confirmationText = document.getElementById('confirmation-text');
const confirmBetBtn = document.getElementById('confirm-bet-btn');
const successOkBtn = document.getElementById('success-ok-btn');
const failureOkBtn = document.getElementById('failure-ok-btn');
const closeButtons = document.querySelectorAll('.modal .close');
const betHistoryCounter = document.getElementById('bet-history-counter');

let betHistory = JSON.parse(localStorage.getItem('betHistory')) || []; // Load bet history from localStorage if available

// Initialize bet history counter
function updateBetHistoryCounter() {
    betHistoryCounter.textContent = betHistory.length;
}

// Save bet history to local storage
function saveBetHistory() {
    localStorage.setItem('betHistory', JSON.stringify(betHistory));
    updateBetHistoryCounter();
}

// Open confirmation modal
placeBetBtn.addEventListener('click', () => {
    if (bets.length > 0) {
        const betAmount = parseFloat(betAmountInput.value) || 0;
        if (betAmount < minBetAmount) {
            alert(`Bet amount must be at least $${minBetAmount}.`);
            return;
        }
        confirmationText.textContent = `You are about to place a bet with a total stake of $${betAmount} and total odds of ${totalOdds.toFixed(2)}. Potential return: $${(betAmount * totalOdds).toFixed(2)}. Do you wish to proceed?`;
        confirmationModal.style.display = 'block';
    } else {
        alert('No bets added to the bet slip!');
    }
});

// Close modals
closeButtons.forEach(button => {
    button.addEventListener('click', () => {
        button.closest('.modal').style.display = 'none';
    });
});

successOkBtn.addEventListener('click', () => {
    successModal.style.display = 'none';
});

failureOkBtn.addEventListener('click', () => {
    failureModal.style.display = 'none';
});
function generateBetCode() {
    // return 'BET' + Math.random().toString(36).substr(2, 9).toUpperCase();

    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let code = '';
    for (let i = 0; i < 8; i++) {
        code += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return code;
}
// Function to look up bet by code
function lookupBetByCode(code) {
    let betHistory = JSON.parse(localStorage.getItem('betHistory')) || [];
    return betHistory.find(bet => bet.code === code);
}
// Confirm bet
// Function to save bet history
function saveBetHistory(bet) {
    const betHistory = JSON.parse(localStorage.getItem('betHistory')) || [];
    betHistory.push(bet);
    localStorage.setItem('betHistory', JSON.stringify(betHistory));
}

// Confirm bet
confirmBetBtn.addEventListener('click', () => {
    confirmationModal.style.display = 'none';
    // Simulate API call
    setTimeout(() => {
        const success = Math.random() > 0.5; // Simulate success or failure

        if (success) {
            successModal.style.display = 'block';

            const betAmount = parseFloat(betAmountInput.value) || 0;
             const bet = {
                    code: generateBetCode(),
                    details: bets.map(bet => ({
                        text: bet.text,
                        detail: bet.detail,
                        mini: bet.mini,
                        odds: bet.odds
                    })),
                    stake: betAmount.toFixed(2),
                    odds: totalOdds.toFixed(2),
                    potentialReturn: (betAmount * totalOdds).toFixed(2)
                };
            
            
            // Save bet to history
            saveBetHistory(bet);

            // Reset bet slip
            bets = [];
            totalOdds = 0;
            updateTotalOdds();
            updatePotentialReturn();
            betSlipContent.innerHTML = '<p>No bets added yet.</p>';
            document.querySelectorAll('.activeElement.clicked').forEach(button => {
                button.classList.remove('clicked');
                button.style.backgroundColor = '';  // Reset to default color
            });
            updateBetCount();
            updateBetSlipVisibility();
            localStorage.removeItem('betSlip');
            localStorage.removeItem('totalOdds');
            localStorage.removeItem('buttonState');
            
            // Update bet history counter
            updateBetHistoryCounter();
        } else {
            failureModal.style.display = 'block';
        }
    }, 1000); // Simulate a 1-second delay for the API call
});

// Function to update bet history counter
function updateBetHistoryCounter() {
    const betHistory = JSON.parse(localStorage.getItem('betHistory')) || [];
    document.getElementById('bet-history-counter').textContent = betHistory.length;
}

// Initialize bet history counter on page load
document.addEventListener('DOMContentLoaded', () => {
    updateBetHistoryCounter();
});
