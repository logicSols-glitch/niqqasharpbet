document.addEventListener("DOMContentLoaded", function() {
    const hash = window.location.hash.substring(1); // Get the fragment identifier without the '#'
    if (hash) {
      const targetElement = document.getElementById(hash);
      if (targetElement) {
        targetElement.classList.remove('hidden');
        targetElement.classList.add('visible');
        targetElement.scrollIntoView({ behavior: 'smooth' }); // Optional: Smooth scroll to the target element
      }
    }
  });


  document.querySelectorAll('.accordion-header').forEach(header => {
    header.addEventListener('click', () => {
        const accordionItem = header.parentElement;
        const accordionContent = accordionItem.querySelector('.accordion-content');

        // Toggle display of the content
        accordionContent.classList.toggle('active');

        // Optionally, toggle icons or other elements
        // Example: toggle 'fa-plus' and 'fa-minus' icons
        const icon = header.querySelector('.fas');
        if (icon.classList.contains('fa-plus')) {
            icon.classList.remove('fa-plus');
            icon.classList.add('fa-minus');
        } else {
            icon.classList.remove('fa-minus');
            icon.classList.add('fa-plus');
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const menuLinks = document.querySelectorAll('.menu-link1a');
    const sectionz = document.querySelectorAll('.section1a');
  
    function showSection(sectionId) {
        sectionz.forEach(section => {
            if (section.id === sectionId) {
                section.classList.add('activee');
            } else {
                section.classList.remove('activee');
            }
        });
    }
  
    // Show the section based on the current hash in the URL
    const currentHash = window.location.hash;
    if (currentHash) {
        showSection(currentHash.substring(1));
    } else {
        // Optional: Show the first section by default if no hash is present
        sectionz[0].classList.add('actives');
    }
  
    menuLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const targetSection = this.getAttribute('href').substring(1);
  
            // Update the URL hash
            window.location.hash = targetSection;
  
            // Show the target section
            showSection(targetSection);
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
  const menuLinks = document.querySelectorAll('.menu-link');
  const sections = document.querySelectorAll('.section1');

  function showSection(sectionId) {
      sections.forEach(section => {
          if (section.id === sectionId) {
              section.classList.add('active');
          } else {
              section.classList.remove('active');
          }
      });
  }

  // Show the section based on the current hash in the URL
  const currentHash = window.location.hash;
  if (currentHash) {
      showSection(currentHash.substring(1));
  } else {
      // Optional: Show the first section by default if no hash is present
      sections[0].classList.add('actives');
  }

  menuLinks.forEach(link => {
      link.addEventListener('click', function(event) {
          event.preventDefault();
          const targetSection = this.getAttribute('href').substring(1);

          // Update the URL hash
          window.location.hash = targetSection;

          // Show the target section
          showSection(targetSection);
      });
  });
});

document.addEventListener('DOMContentLoaded', function() {
    const menuLinks = document.querySelectorAll('.menu-link1');
    const sections = document.querySelectorAll('.section1i');
  
    function showSection(sectionId) {
        sections.forEach(section => {
            if (section.id === sectionId) {
                section.classList.add('active');
            } else {
            section.classList.remove('active');
            }
        });
    }
  
    // Show the section based on the current hash in the URL
    const currentHash = window.location.hash;
    if (currentHash) {
        showSection(currentHash.substring(1));
    } else {
        // Optional: Show the first section by default if no hash is present
        sections[0].classList.add('actives');
    }
  
    menuLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const targetSection = this.getAttribute('href').substring(1);
  
            // Update the URL hash
            window.location.hash = targetSection;
  
            // Show the target section
            showSection(targetSection);
        });
    });
});

// document.addEventListener('DOMContentLoaded', () => {
//     const betSlip = document.querySelector('.bet-slip');
//     const betSlipContent = document.querySelector('.bet-slip-content');
//     const totalOddsElement = document.getElementById('total-odds');
//     const potentialReturnElement = document.getElementById('potential-return');
//     const betAmountInput = document.getElementById('bet-amount');
//     const betSlipIcon = document.querySelector('.bet-slip-icon');
//     const betCountElement = document.querySelector('.bet-count');
//     const clearBetSlipButton = document.getElementById('clear-bet-slip');
//     const numericKeypad = document.getElementById('numeric-keypad');
//     const betSlipArrow = document.getElementById('bet-slip-arrow');
//     const betSlipFooter = document.querySelector('.bet-slip-footer');
//     const placeBetBtn = document.getElementById('place-bet-btn');
//     const bookBetBtn = document.getElementById('book-bet-btn');
//     const loadBetCodeBtn = document.getElementById('load-bet-code-btn');
//     const betCodeInput = document.getElementById('bet-code-input');
//     const betAmountWarning = document.getElementById('bet-amount-warning');
//     const minBetAmount = 10;

//     let totalOdds = 0;
//     let bets = [];
    

//     function validateBetAmount() {
//         const value = parseFloat(betAmountInput.value) || 0;
//         if (value < minBetAmount && value !== 0) {
//             betAmountWarning.textContent = `Bet amount must be at least $${minBetAmount}.`;
//         } else {
//             betAmountWarning.textContent = '';
//         }
//     }

//     function updateTotalOdds() {
//         totalOdds = bets.reduce((acc, bet) => acc * bet.odds, 1);
//         totalOddsElement.textContent = isNaN(totalOdds) ? '0.00' : totalOdds.toFixed(2);
//     }

//     function updatePotentialReturn() {
//         const betAmount = parseFloat(betAmountInput.value) || 0;
//         const potentialReturn = betAmount * totalOdds;
//         potentialReturnElement.textContent = isNaN(potentialReturn) ? '0.00' : potentialReturn.toFixed(2);
//     }

//     function updateBetCount() {
//         betCountElement.textContent = bets.length;
//     }

//     function updateBetSlipVisibility() {
//         if (bets.length > 0) {
//             betSlip.style.display = 'block';
//         } else {
//             betSlip.style.display = 'none';
//         }
//     }

//     function removeBetFromSlip(betId) {
//         const betItem = betSlipContent.querySelector(`.bet-slip-item[data-id="${betId}"]`);
//         if (betItem) {
//             // Remove the bet item from the DOM
//             betSlipContent.removeChild(betItem);
    
//             // Filter the bet out from the array
//             bets = bets.filter(bet => bet.id !== betId);
    
//             // Update the total odds and potential return
//             updateTotalOdds();
//             updatePotentialReturn();
    
//             // Update the bet count
//             updateBetCount();
    
//             // Update the visibility of the bet slip
//             updateBetSlipVisibility();
    
//             // Save the bet slip state
//             saveBetSlip();
    
//             // Update button state (for any buttons that might have been affected)
//             updateButtonState();
//         }
//     }
    

//     function clearBetSlip() {
//         bets = [];
//         betSlipContent.innerHTML = '';
//         updateTotalOdds();
//         updatePotentialReturn();
//         updateBetCount();
//         updateBetSlipVisibility();
//         saveBetSlip();
//         updateButtonState();
//     }

//     function saveBetSlip() {
//         localStorage.setItem('betSlip', JSON.stringify(bets));
//         localStorage.setItem('totalOdds', totalOdds.toString());
//     }

//     function loadBetSlip() {
//         const savedBets = JSON.parse(localStorage.getItem('betSlip')) || [];
//         totalOdds = parseFloat(localStorage.getItem('totalOdds')) || 0;
    
//         betSlipContent.innerHTML = '';
//         bets = savedBets;
    
//         bets.forEach(bet => {
//             const betItem = document.createElement('div');
//             betItem.classList.add('bet-slip-item');
//             betItem.setAttribute('data-id', bet.id);
//             betItem.innerHTML = `
//                 <div class="bet-main">
//                     <span class="remove-bet">&times;</span>
//                     <div class="bet-main-text">
//                         <span>${bet.base}</span> <!-- Display data-main -->
//                     </div> <br>
//                     <span class="bet-detail">${bet.detail}</span> <!-- Display data-detail -->
//                     <div class="bet-details">
//                         <span>${bet.mini}</span> <!-- Display data-mini -->
//                     </div>
//                 </div>
//                 <span>Odds: ${bet.odds.toFixed(2)}</span>
//             `;
//             betSlipContent.appendChild(betItem);
//         });
    
//         updateTotalOdds();
//         updatePotentialReturn();
//         updateBetCount();
//         updateBetSlipVisibility();
//         updateButtonState();
//     }
    

//     function updateButtonState() {
//         document.querySelectorAll('.activeElement').forEach(button => {
//             const buttonId = button.getAttribute('data-id');
//             if (bets.some(bet => bet.id === buttonId)) {
//                 button.classList.add('clicked');
//                 button.style.backgroundColor = '#ffcc00';
//             } else {
//                 button.classList.remove('clicked');
//                 button.style.backgroundColor = '';
//             }
//         });
//     }

//     document.querySelectorAll('.activeElement').forEach(button => {
//         button.addEventListener('click', () => {
//             const odds = parseFloat(button.getAttribute('data-odds')) || 0;
//             const detail = button.getAttribute('data-detail');
//             const mini = button.getAttribute('data-mini');
//             const base = button.getAttribute('data-base'); // Add this line to get data-main
//             const buttonId = button.getAttribute('data-id');    
    
//             if (button.classList.contains('clicked')) {
//                 button.classList.remove('clicked');
//                 button.style.backgroundColor = '';
//                 bets = bets.filter(bet => bet.id !== buttonId);
//                 removeBetFromSlip(buttonId);
//             } else {
//                 button.classList.add('clicked');
//                 button.style.backgroundColor = '#ffcc00';
//                 bets.push({
//                     text: button.textContent.trim(),
//                     odds,
//                     base,
//                     detail,
//                     mini,
//                      // Add this to include data-main in the bets array
//                     id: buttonId
//                 });
    
//                 const betItem = document.createElement('div');
//                 betItem.classList.add('bet-slip-item');
//                 betItem.setAttribute('data-id', buttonId);
//                 betItem.innerHTML = `
//                     <div class="bet-main">
//                         <span class="remove-bet">&times;</span>                       
//                         <div class="bet-main-text">
//                             <span>${base}</span> <!-- Display data-main -->
//                         </div>
//                         <div class="bet-detail">
//                             <span>${detail}</span> <!-- Display data-mini -->
//                         </div>
//                         <br>
//                         <div class="bet-details">
//                             <span>${mini}</span> <!-- Display data-mini -->
//                         </div>
//                     </div>
//                     <span>Odds: ${odds.toFixed(2)}</span>
//                 `;
//                 betSlipContent.appendChild(betItem);
//             }
    
//             updateTotalOdds();
//             updatePotentialReturn();
//             updateBetCount();
//             updateBetSlipVisibility();
//             saveBetSlip();
//         });
//     });
    
    

//     betSlipArrow.addEventListener('click', () => {
//         betSlip.style.display = 'none';
//     });

//     betSlipContent.addEventListener('click', (e) => {
//         if (e.target.classList.contains('remove-bet')) {
//             e.stopPropagation();
//             const betId = e.target.closest('.bet-slip-item').getAttribute('data-id');
//             removeBetFromSlip(betId);
//         }
//     });

//     betAmountInput.addEventListener('click', () => {
//         numericKeypad.style.display = 'block';
//     });

//     numericKeypad.addEventListener('click', (e) => {
//         if (e.target.tagName === 'BUTTON') {
//             let value = e.target.getAttribute('data-value');
            
//             if (!value && e.target.tagName === 'I') {
//                 value = e.target.parentElement.getAttribute('data-value');
//             }

//             switch (value) {
//                 case 'clear':
//                     betAmountInput.value = '';
//                     break;
//                 case 'backspace':
//                     betAmountInput.value = betAmountInput.value.slice(0, -1);
//                     break;
//                 case 'done':
//                     numericKeypad.style.display = 'none';
//                     break;
//                 case '.':
//                     if (!betAmountInput.value.includes('.')) {
//                         betAmountInput.value += value;
//                     }
//                     break;
//                 case '+1000':
//                 case '+500':
//                 case '+100':
//                     betAmountInput.value = (parseFloat(betAmountInput.value) || 0) + parseInt(value.slice(1));
//                     break;
//                 default:
//                     if (betAmountInput.value === '0' && value !== '.') {
//                         betAmountInput.value = value;
//                     } else {
//                         betAmountInput.value += value;
//                     }
//                     break;
//             }
            
//             validateBetAmount();
//             updatePotentialReturn();
//         }
//     });

//     document.addEventListener('click', (e) => {
//         if (!betAmountInput.contains(e.target) && !numericKeypad.contains(e.target)) {
//             numericKeypad.style.display = 'none';
//         }
//     });

//     function generateBetCode() {
//         const timestamp = new Date().getTime();
//         const random = Math.floor(Math.random() * 9000) + 1000; // Random number between 1000 and 9999
//         return `${timestamp}${random}`;
//     }
//     bookBetBtn.addEventListener('click', () => {
//         if (bets.length > 0) {
//             const betCode = generateBetCode();
//             localStorage.setItem(betCode, JSON.stringify(bets)); // Store bets using the generated code
    
//             createBetCodeDetails(betCode); // Display bet code and details to the user
    
//             saveBetSlip(); // Save the current state of the bet slip
//         } else {
//             alert('No bets added to the bet slip!');
//         }
//     });
//     function createBetCodeDetails(betCode) {
//         const betDetailsContainer = document.createElement('div');
//         betDetailsContainer.classList.add('bet-code-details-overlay');
//         betDetailsContainer.innerHTML = `
//             <div class="bet-code-details-content">
//                 <h3>Bet Code: ${betCode} <i id="copy-bet-code" class="fa fa-copy" style="cursor: pointer;"></i></h3>
//                 <ul>
//                     ${bets.map(bet => `
//                         <li>
//                             <span>${bet.text}</span>
//                             <span>Odds: ${bet.odds.toFixed(2)}</span>
//                         </li>`).join('')}
//                 </ul>
//                 <button id="close-bet-code-details">Close</button>
//                 <button id="share-bet-code">Share</button>
//             </div>
//         `;
//         document.body.appendChild(betDetailsContainer);
    
//         // Hide bet slip to show the bet code details
//         betSlip.style.display = 'none';
    
//         // Close the bet code details modal
//         document.getElementById('close-bet-code-details').addEventListener('click', () => {
//             document.body.removeChild(betDetailsContainer);
//             betSlip.style.display = 'block'; // Show bet slip again
//         });
    
//         // Copy bet code to clipboard
//         const copyIcon = document.getElementById('copy-bet-code');
//         copyIcon.addEventListener('click', () => {
//             navigator.clipboard.writeText(betCode).then(() => {
//                 alert('Bet code copied to clipboard!');
//             }).catch(err => {
//                 console.error('Failed to copy bet code: ', err);
//             });
//         });
    
//         // Share bet code via Web Share API
//         const shareButton = document.getElementById('share-bet-code');
//         shareButton.addEventListener('click', () => {
//             if (navigator.share) {
//                 navigator.share({
//                     title: 'Bet Code',
//                     text: `Here is my bet code: ${betCode}\nDetails:\n${bets.map(bet => `${bet.text} - Odds: ${bet.odds.toFixed(2)}`).join('\n')}`
//                 }).then(() => {
//                     console.log('Bet code shared successfully!');
//                 }).catch(err => {
//                     console.error('Failed to share bet code: ', err);
//                 });
//             } else {
//                 alert('Your browser does not support the Web Share API.');
//             }
//         });
//     }
//     loadBetCodeBtn.addEventListener('click', () => {
//         const betCode = betCodeInput.value.trim();
//         if (betCode) {
//             const savedBets = JSON.parse(localStorage.getItem(betCode));
//             if (savedBets) {
//                 bets = savedBets;
//                 betSlipContent.innerHTML = '';
    
//                 bets.forEach(bet => {
//                     const betItem = document.createElement('div');
//                     betItem.classList.add('bet-slip-item');
//                     betItem.setAttribute('data-id', bet.id);
//                     betItem.innerHTML = `
//                         <div class="bet-main">
//                             <span class="remove-bet">&times;</span>
//                             <span>${bet.text}</span>
//                             <div class="bet-details">
//                                 <span>${bet.detail}</span>
//                             </div>
//                             <div class="bet-mini">
//                                 <span>${bet.mini}</span>
//                             </div>
//                         </div>
//                         <span>Odds: ${bet.odds.toFixed(2)}</span>
//                     `;
//                     betSlipContent.appendChild(betItem);
//                 });
    
//                 updateTotalOdds();
//                 updatePotentialReturn();
//                 updateBetCount();
//                 updateBetSlipVisibility();
//                 updateButtonState();
//             } else {
//                 alert('Invalid bet code or no bets found for the given code.');
//             }
//         } else {
//             alert('Please enter a bet code.');
//         }
//     });            
    
//     clearBetSlipButton.addEventListener('click', clearBetSlip);

//     loadBetSlip();
// });

// document.addEventListener('DOMContentLoaded', () => {
//     const betSlip = document.querySelector('.bet-slip');
//     const betSlipContent = document.querySelector('.bet-slip-content');
//     const totalOddsElement = document.getElementById('total-odds');
//     const potentialReturnElement = document.getElementById('potential-return');
//     const betAmountInput = document.getElementById('bet-amount');
//     const betSlipIcon = document.querySelector('.bet-slip-icon');
//     const betCountElement = document.querySelector('.bet-count');
//     const clearBetSlipButton = document.getElementById('clear-bet-slip');
//     const numericKeypad = document.getElementById('numeric-keypad');
//     const betSlipArrow = document.getElementById('bet-slip-arrow');
//     const loadBetCodeContainer = document.getElementById('load-bet-code-container');
//     const betSlipFooter = document.querySelector('.bet-slip-footer');
//     const placeBetBtn = document.getElementById('placeBetBtn');
//     const bookBetBtn = document.getElementById('book-bet-btn');
//     const loadBetCodeBtn = document.getElementById('load-bet-code-btn');
//     const betCodeInput = document.getElementById('bet-code-input');
//     const betAmountWarning = document.getElementById('bet-amount-warning');
//     const minBetAmount = 10;

//     let totalOdds = 0;
//     let bets = [];

//     function validateBetAmount() {
//         const value = parseFloat(betAmountInput.value) || 0;
//         if (value < minBetAmount && value !== 0) {
//             betAmountWarning.textContent = `Bet amount must be at least $${minBetAmount}.`;
//         } else {
//             betAmountWarning.textContent = '';
//         }
//     }

//     function updateTotalOdds() {
//         totalOdds = bets.reduce((acc, bet) => acc * bet.odds, 1);
//         totalOddsElement.textContent = isNaN(totalOdds) ? '0.00' : totalOdds.toFixed(2);
//     }

//     function updatePotentialReturn() {
//         const betAmount = parseFloat(betAmountInput.value) || 0;
//         const potentialReturn = betAmount * totalOdds;
//         potentialReturnElement.textContent = isNaN(potentialReturn) ? '0.00' : potentialReturn.toFixed(2);
//     }

//     function updateBetCount() {
//         betCountElement.textContent = bets.length;
//     }

//     function updateBetSlipVisibility() {
//         if (bets.length === 0) {
//             loadBetCodeContainer.style.display = 'block';
//         } else {
//             loadBetCodeContainer.style.display = 'none';
//         }
//     }

//     function removeBetFromSlip(betId) {
//         const betItem = betSlipContent.querySelector(`.bet-slip-item[data-id="${betId}"]`);
//         if (betItem) {
//             betSlipContent.removeChild(betItem);
//             bets = bets.filter(bet => bet.id !== betId);
//             updateTotalOdds();
//             updatePotentialReturn();
//             updateBetCount();
//             updateBetSlipVisibility();
//             saveBetSlip();
//             updateButtonState();
//         }
//     }

//     function clearBetSlip() {
//         bets = [];
//         betSlipContent.innerHTML = '';
//         updateTotalOdds();
//         updatePotentialReturn();
//         updateBetCount();
//         updateBetSlipVisibility();
//         saveBetSlip();
//         updateButtonState();
//     }

//     function saveBetSlip() {
//         localStorage.setItem('betSlip', JSON.stringify(bets));
//         localStorage.setItem('totalOdds', totalOdds.toString());
//     }

//     function loadBetSlip() {
//         const savedBets = JSON.parse(localStorage.getItem('betSlip')) || [];
//         totalOdds = parseFloat(localStorage.getItem('totalOdds')) || 0;

//         betSlipContent.innerHTML = '';
//         bets = savedBets;

//         bets.forEach(bet => {
//             const betItem = document.createElement('div');
//             betItem.classList.add('bet-slip-item');
//             betItem.setAttribute('data-id', bet.id);
//             betItem.innerHTML = `
//                 <div class="bet-main">
//                     <span class="remove-bet">&times;</span>
//                     <div class="bet-main-text">
//                         <span>${bet.base}</span> <!-- Display data-main -->
//                     </div> <br>
//                     <div class="bet-detail">
//                         <span class="bet-detail">${bet.detail}</span> <!-- Display data-detail -->
//                     </div>    
//                     <br>
//                     <div class="bet-details">
//                         <span class="bet-details>${bet.mini}</span> <!-- Display data-mini -->
//                     </div>
//                 </div>
//                 <span>Odds: ${bet.odds.toFixed(2)}</span>
//             `;
//             betSlipContent.appendChild(betItem);
//         });

//         updateTotalOdds();
//         updatePotentialReturn();
//         updateBetCount();
//         updateBetSlipVisibility();
//         updateButtonState();
//     }

//     function updateButtonState() {
//         document.querySelectorAll('.activeElement').forEach(button => {
//             const buttonId = button.getAttribute('data-id');
//             if (bets.some(bet => bet.id === buttonId)) {
//                 button.classList.add('clicked');
//                 button.style.backgroundColor = '#ffcc00';
//             } else {
//                 button.classList.remove('clicked');
//                 button.style.backgroundColor = '';
//             }
//         });
//     }

//     document.querySelectorAll('.activeElement').forEach(button => {
//         button.addEventListener('click', () => {
//             const odds = parseFloat(button.getAttribute('data-odds')) || 0;
//             const detail = button.getAttribute('data-detail');
//             const mini = button.getAttribute('data-mini');
//             const base = button.getAttribute('data-base'); 
//             const buttonId = button.getAttribute('data-id');
//             const matchId = button.getAttribute('data-match-id'); // Get the match_id from the button's attribute
    
//             if (button.classList.contains('clicked')) {
//                 button.classList.remove('clicked');
//                 button.style.backgroundColor = '';
//                 bets = bets.filter(bet => bet.id !== buttonId);
//                 removeBetFromSlip(buttonId);
//             } else {
//                 button.classList.add('clicked');
//                 button.style.backgroundColor = '#ffcc00';
//                 bets.push({
//                     text: button.textContent.trim(),
//                     odds,
//                     base,
//                     detail,
//                     mini,
//                     id: buttonId,
//                     match_id: matchId // Add match_id to the bet object
//                 });
    
//                 const betItem = document.createElement('div');
//                 betItem.classList.add('bet-slip-item');
//                 betItem.setAttribute('data-id', buttonId);
//                 betItem.innerHTML = `
//                     <div class="bet-main">
//                         <span class="remove-bet">&times;</span>                       
//                         <div class="bet-main-text">
//                             <span>${base}</span> <!-- Display data-main -->
//                         </div>
//                         <div class="bet-detail">
//                             <span>${detail}</span> <!-- Display data-mini -->
//                         </div>
//                         <br>
//                         <div class="bet-details">
//                             <span>${mini}</span> <!-- Display data-mini -->
//                         </div>
//                     </div>
//                     <span>Odds: ${odds.toFixed(2)}</span>
//                 `;
//                 betSlipContent.appendChild(betItem);
//             }
    
//             updateTotalOdds();
//             updatePotentialReturn();
//             updateBetCount();
//             updateBetSlipVisibility();
//             saveBetSlip();
//         });
//     });
    

//     betSlipArrow.addEventListener('click', () => {
//         betSlip.style.display = 'none';
//     });

//     betSlipContent.addEventListener('click', (e) => {
//         if (e.target.classList.contains('remove-bet')) {
//             e.stopPropagation();
//             const betId = e.target.closest('.bet-slip-item').getAttribute('data-id');
//             removeBetFromSlip(betId);
//         }
//     });

//     betAmountInput.addEventListener('click', () => {
//         numericKeypad.style.display = 'block';
//     });

//     numericKeypad.addEventListener('click', (e) => {
//         if (e.target.tagName === 'BUTTON') {
//             let value = e.target.getAttribute('data-value');
            
//             if (!value && e.target.tagName === 'I') {
//                 value = e.target.parentElement.getAttribute('data-value');
//             }

//             switch (value) {
//                 case 'clear':
//                     betAmountInput.value = '';
//                     break;
//                 case 'backspace':
//                     betAmountInput.value = betAmountInput.value.slice(0, -1);
//                     break;
//                 case 'done':
//                     numericKeypad.style.display = 'none';
//                     break;
//                 case '.':
//                     if (!betAmountInput.value.includes('.')) {
//                         betAmountInput.value += value;
//                     }
//                     break;
//                 case '+1000':
//                 case '+500':
//                 case '+100':
//                     betAmountInput.value = (parseFloat(betAmountInput.value) || 0) + parseInt(value.slice(1));
//                     break;
//                 default:
//                     if (betAmountInput.value === '0' && value !== '.') {
//                         betAmountInput.value = value;
//                     } else {
//                         betAmountInput.value += value;
//                     }
//                     break;
//             }
            
//             validateBetAmount();
//             updatePotentialReturn();
//         }
//     });

//     document.addEventListener('click', (e) => {
//         if (!betAmountInput.contains(e.target) && !numericKeypad.contains(e.target)) {
//             numericKeypad.style.display = 'none';
//         }
//     });

// function generateBetCode() {
//         const timestamp = new Date().getTime();
//         const random = Math.floor(Math.random() * 9000) + 1000; // Random number between 1000 and 9999
//         return `${timestamp}${random}`;
//     }

//     loadBetCodeBtn.addEventListener('click', () => {
//         const betCode = betCodeInput.value.toUpperCase();

//         if (localStorage.getItem(betCode)) {
//             const savedBets = JSON.parse(localStorage.getItem(betCode));
//             clearBetSlip();

//             savedBets.forEach(bet => {
//                 bets.push(bet);

//                 const betItem = document.createElement('div');
//                 betItem.classList.add('bet-slip-item');
//                 betItem.setAttribute('data-id', bet.id);
//                 betItem.innerHTML = `
//                     <div class="bet-main">
//                         <span class="remove-bet">&times;</span>
//                         <div class="bet-main-text">
//                             <span>${bet.base}</span> <!-- Display data-main -->
//                         </div> <br>
//                         <span class="bet-detail">${bet.detail}</span> <!-- Display data-detail -->
//                         <div class="bet-details">
//                             <span>${bet.mini}</span> <!-- Display data-mini -->
//                         </div>
//                     </div>
//                     <span>Odds: ${bet.odds.toFixed(2)}</span>
//                 `;
//                 betSlipContent.appendChild(betItem);
//             });

//             updateTotalOdds();
//             updatePotentialReturn();
//             updateBetCount();
//             updateBetSlipVisibility();
//             saveBetSlip();
//             updateButtonState();
//         } else {
//             alert('Invalid Bet Code');
//         }
//     });


//     // Function to display the bet code and details
//     function createBetCodeDetails(betCode) {
//         const betDetailsContainer = document.createElement('div');
//         betDetailsContainer.classList.add('bet-code-details-overlay');
//         betDetailsContainer.innerHTML = `
//             <div class="bet-code-details-content">
//                 <h3>Bet Code: ${betCode} <i id="copy-bet-code" class="fa fa-copy" style="cursor: pointer;"></i></h3>
//                 <ul>
//                     ${bets.map(bet => `
//                         <li>
//                             <span>${bet.text}</span>
//                             <span>Odds: ${bet.odds.toFixed(2)}</span>
//                         </li>`).join('')}
//                 </ul>
//                 <div class="bet-code-buttons">
//                     <button id="share-bet-code">Share</button>
//                     <button id="close-bet-code-details">Close</button>
//                 </div>
//             </div>
//         `;
//         document.body.appendChild(betDetailsContainer);

//         // Hide bet slip to show the bet code details
//         betSlip.style.display = 'none';

//         // Close the bet code details modal
//         document.getElementById('close-bet-code-details').addEventListener('click', () => {
//             document.body.removeChild(betDetailsContainer);
//             betSlip.style.display = 'block'; // Show bet slip again
//         });

//         // Copy bet code to clipboard
//         const copyIcon = document.getElementById('copy-bet-code');
//         copyIcon.addEventListener('click', () => {
//             navigator.clipboard.writeText(betCode).then(() => {
//                 alert('Bet code copied to clipboard!');
//             }).catch(err => {
//                 console.error('Failed to copy bet code: ', err);
//             });
//         });

//         // Share bet code via Web Share API
//         const shareButton = document.getElementById('share-bet-code');
//         shareButton.addEventListener('click', () => {
//             if (navigator.share) {
//                 navigator.share({
//                     title: 'Bet Code',
//                     text: `Here is my bet code: ${betCode}\nDetails:\n${bets.map(bet => `${bet.text} - Odds: ${bet.odds.toFixed(2)}`).join('\n')}`
//                 }).then(() => {
//                     console.log('Bet code shared successfully!');
//                 }).catch(err => {
//                     console.error('Failed to share bet code: ', err);
//                 });
//             } else {
//                 alert('Your browser does not support the Web Share API.');
//             }
//         });
//     }

//     // Event listener for the "Book Bet" button
//     bookBetBtn.addEventListener('click', () => {
//         if (bets.length > 0) {
//             const betCode = generateBetCode();
//             localStorage.setItem(betCode, JSON.stringify(bets)); // Store bets using the generated code

//             createBetCodeDetails(betCode); // Display bet code and details to the user
//         } else {
//             alert('No bets added to the bet slip!');
//         }
//     });

//     betSlipIcon.addEventListener('click', () => {
//         betSlip.style.display = betSlip.style.display === 'block' ? 'none' : 'block';
//         // toggleLoadBetCodeContainer();
//     });

//     function placeBet(bets, betAmount, currentBalance) {
//         // Generate a unique bet code
//         const betCode = generateBetCode();
    
//         // Deduct the bet amount from the balance
//         currentBalance -= betAmount;
    
//         // Create bet history entry
//         const betHistory = {
//             code: betCode,
//             details: bets.map(bet => ({
//                 base: bet.base,
//                 detail: bet.detail,
//                 mini: bet.mini,
//                 odds: bet.odds.toFixed(2)
//             })),
//             totalOdds: totalOdds.toFixed(2),
//             amount: betAmount.toFixed(2),
//             potentialReturn: (betAmount * totalOdds).toFixed(2),
//             timestamp: new Date().toLocaleString()
//         };
    
//         // Send the bet to the server to store in the database
//         fetch('place_bet.php', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json'
//             },
//             body: JSON.stringify({
//                 betCode: betHistory.code,
//                 totalOdds: betHistory.totalOdds,
//                 amount: betHistory.amount,
//                 potentialReturn: betHistory.potentialReturn,
//                 betDetails: betHistory.details
//             })
//         })
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 console.log('Bet successfully placed.');
//             } else {
//                 console.error('Failed to place bet:', data.error);
//             }
//         })
//         .catch(error => console.error('Error:', error));
    
//         // Save updated history in localStorage for the front-end display
//         const history = JSON.parse(localStorage.getItem('betHistory')) || [];
//         history.push(betHistory);
//         localStorage.setItem('betHistory', JSON.stringify(history));
    
//         // Update balance in the session via an AJAX request
//         updateBalanceInSession(currentBalance);
    
//         // Update the UI
//         loadBetSlip();
//         clearBetSlip();
//         betAmountInput.value = '';
//         updatePotentialReturn();
    
//         // Display success modal with bet code
//         const successModal = document.getElementById('successModal');
//         const betCodeDisplay = document.getElementById('betCodeDisplay');
//         betCodeDisplay.textContent = betCode;
    
//         successModal.style.display = 'block';
//     }
 
    
    
    
// // When placing a bet, store the bet details in localStorage
// placeBetBtn.addEventListener('click', () => {
//     const betAmount = parseFloat(betAmountInput.value) || 0;

//     if (isNaN(currentBalance)) {
//         alert('Error retrieving balance. Please try again later.');
//         return;
//     }

//     if (betAmount < minBetAmount) {
//         betAmountWarning.textContent = `Bet amount must be at least $${minBetAmount}.`;
//         return;
//     }

//     if (betAmount > currentBalance) {
//         alert('Insufficient funds.');
//         return;
//     }

//     betAmountWarning.textContent = '';
//     // const betCode = generateBetCode();
//     const betCode = generateBetCode();
//     localStorage.setItem(betCode, JSON.stringify(bets)); // Store bets using the generated code

//     placeBet(bets, betAmount, currentBalance);

//     // Update balance in the session via an AJAX request
//     $.ajax({
//         url: 'update_balance.php',
//         type: 'POST',
//         data: {
//             balance: currentBalance.toFixed(2)
//         },
//         success: function(response) {
//             // Optionally update the displayed balance on the page
//             document.getElementById('om').textContent = `💰 $${currentBalance.toFixed(2)}`;
//         }
        
//     });
    
//     loadBetSlip();
//     clearBetSlip();
//     betAmountInput.value = '';
//     updatePotentialReturn();

//     const successModal = document.getElementById('successModal');
//     const betCodeDisplay = document.getElementById('betCodeDisplay');
//     betCodeDisplay.textContent = betCode;

//     successModal.style.display = 'block';

// });


// // Get the modal and close elements
// const successModal = document.getElementById('successModal');
// const closeModalBtn = document.getElementById('closeModalBtn');
// const copyBetCodeBtn = document.getElementById('copyBetCodeBtn');
// const spanClose = document.querySelector('.close');

// // Close the modal when the user clicks on the 'X' span
// spanClose.onclick = function() {
//     successModal.style.display = 'none';
// };

// // Close the modal when the user clicks on the close button
// closeModalBtn.onclick = function() {
//     successModal.style.display = 'none';
// };

// // Close the modal if the user clicks anywhere outside of the modal
// window.onclick = function(event) {
//     if (event.target == successModal) {
//         successModal.style.display = 'none';
//     }
// };

// // Copy the bet code to clipboard
// copyBetCodeBtn.onclick = function() {
//     const betCodeDisplay = document.getElementById('betCodeDisplay');
//     navigator.clipboard.writeText(betCodeDisplay.textContent).then(() => {
//         alert('Bet code copied to clipboard');
//     }).catch(err => {
//         console.error('Failed to copy bet code: ', err);
//     });
// };


//     // ... Your existing code ...
//     function updateBalanceInSession(newBalance) {
//         $.post('update_balance.php', { balance: newBalance }, function(response) {
//             if (response.success) {
//                 console.log('Balance updated successfully.');
//             } else {
//                 console.log('Failed to update balance.');
//             }
//         }, 'json');
//     }









    
    
//     clearBetSlipButton.addEventListener('click', clearBetSlip);
//     // toggleLoadBetCodeContainer();
//     loadBetSlip();
//     validateBetAmount();
//     updatePotentialReturn();
//     updateButtonState();
// });


document.addEventListener('DOMContentLoaded', () => {
    const betSlip = document.querySelector('.bet-slip');
    const betSlipContent = document.querySelector('.bet-slip-content');
    const totalOddsElement = document.getElementById('total-odds');
    const potentialReturnElement = document.getElementById('potential-return');
    const betAmountInput = document.getElementById('bet-amount');
    const betSlipIcon = document.querySelector('.bet-slip-icon');
    const betCountElement = document.querySelector('.bet-count');
    const clearBetSlipButton = document.getElementById('clear-bet-slip');
    const numericKeypad = document.getElementById('numeric-keypad');
    const betSlipArrow = document.getElementById('bet-slip-arrow');
    const loadBetCodeContainer = document.getElementById('load-bet-code-container');
    const betSlipFooter = document.querySelector('.bet-slip-footer');
    const placeBetBtn = document.getElementById('placeBetBtn');
    const bookBetBtn = document.getElementById('book-bet-btn');
    const loadBetCodeBtn = document.getElementById('load-bet-code-btn');
    const betCodeInput = document.getElementById('bet-code-input');
    const betAmountWarning = document.getElementById('bet-amount-warning');
    const minBetAmount = 10;

    let totalOdds = 0;
    let bets = [];

    function validateBetAmount() {
        const value = parseFloat(betAmountInput.value) || 0;
        if (value < minBetAmount && value !== 0) {
            betAmountWarning.textContent = `Bet amount must be at least $${minBetAmount}.`;
        } else {
            betAmountWarning.textContent = '';
        }
    }

    function updateTotalOdds() {
        totalOdds = bets.reduce((acc, bet) => acc * bet.odds, 1);
        totalOddsElement.textContent = isNaN(totalOdds) ? '0.00' : totalOdds.toFixed(2);
    }

    function updatePotentialReturn() {
        const betAmount = parseFloat(betAmountInput.value) || 0;
        const potentialReturn = betAmount * totalOdds;
        potentialReturnElement.textContent = isNaN(potentialReturn) ? '0.00' : potentialReturn.toFixed(2);
    }

    function updateBetCount() {
        betCountElement.textContent = bets.length;
    }

    function updateBetSlipVisibility() {
        if (bets.length === 0) {
            loadBetCodeContainer.style.display = 'block';
        } else {
            loadBetCodeContainer.style.display = 'none';
        }
    }

    function removeBetFromSlip(betId) {
        const betItem = betSlipContent.querySelector(`.bet-slip-item[data-id="${betId}"]`);
        if (betItem) {
            betSlipContent.removeChild(betItem);
            bets = bets.filter(bet => bet.id !== betId);
            updateTotalOdds();
            updatePotentialReturn();
            updateBetCount();
            updateBetSlipVisibility();
            saveBetSlip();
            updateButtonState();
        }
    }

    function clearBetSlip() {
        bets = [];
        betSlipContent.innerHTML = '';
        updateTotalOdds();
        updatePotentialReturn();
        updateBetCount();
        updateBetSlipVisibility();
        saveBetSlip();
        updateButtonState();
    }

    function saveBetSlip() {
        localStorage.setItem('betSlip', JSON.stringify(bets));
        localStorage.setItem('totalOdds', totalOdds.toString());
    }

    function loadBetSlip() {
        const savedBets = JSON.parse(localStorage.getItem('betSlip')) || [];
        totalOdds = parseFloat(localStorage.getItem('totalOdds')) || 0;

        betSlipContent.innerHTML = '';
        bets = savedBets;

        bets.forEach(bet => {
            const betItem = document.createElement('div');
            betItem.classList.add('bet-slip-item');
            betItem.setAttribute('data-id', bet.id);
            betItem.innerHTML = `
                <div class="bet-main">
                    <span class="remove-bet">&times;</span>
                    <div class="bet-main-text">
                        <span>${bet.base}</span> <!-- Display data-main -->
                    </div> <br>
                    <div class="bet-detail">
                        <span class="bet-detail">${bet.detail}</span> <!-- Display data-detail -->
                    </div>    
                    <br>
                    <div class="bet-details">
                        <span class="bet-details>${bet.mini}</span> <!-- Display data-mini -->
                    </div>
                </div>
                <span>Odds: ${bet.odds.toFixed(2)}</span>
            `;
            betSlipContent.appendChild(betItem);
        });

        updateTotalOdds();
        updatePotentialReturn();
        updateBetCount();
        updateBetSlipVisibility();
        updateButtonState();
    }

    function updateButtonState() {
        document.querySelectorAll('.activeElement').forEach(button => {
            const buttonId = button.getAttribute('data-id');
            if (bets.some(bet => bet.id === buttonId)) {
                button.classList.add('clicked');
                button.style.backgroundColor = '#ffcc00';
            } else {
                button.classList.remove('clicked');
                button.style.backgroundColor = '';
            }
        });
    }

    document.querySelectorAll('.activeElement').forEach(button => {
        button.addEventListener('click', () => {
            const odds = parseFloat(button.getAttribute('data-odds')) || 0;
            const detail = button.getAttribute('data-detail');
            const mini = button.getAttribute('data-mini');
            const base = button.getAttribute('data-base'); // Add this line to get data-main
            const buttonId = button.getAttribute('data-id');

            if (button.classList.contains('clicked')) {
                button.classList.remove('clicked');
                button.style.backgroundColor = '';
                bets = bets.filter(bet => bet.id !== buttonId);
                removeBetFromSlip(buttonId);
            } else {
                button.classList.add('clicked');
                button.style.backgroundColor = '#ffcc00';
                bets.push({
                    text: button.textContent.trim(),
                    odds,
                    base,
                    detail,
                    mini,
                    id: buttonId
                });

                const betItem = document.createElement('div');
                betItem.classList.add('bet-slip-item');
                betItem.setAttribute('data-id', buttonId);
                betItem.innerHTML = `
                    <div class="bet-main">
                        <span class="remove-bet">&times;</span>                       
                        <div class="bet-main-text">
                            <span>${base}</span> <!-- Display data-main -->
                        </div>
                        <div class="bet-detail">
                            <span>${detail}</span> <!-- Display data-mini -->
                        </div>
                        <br>
                        <div class="bet-details">
                            <span>${mini}</span> <!-- Display data-mini -->
                        </div>
                    </div>
                    <span>Odds: ${odds.toFixed(2)}</span>
                `;
                betSlipContent.appendChild(betItem);
            }

            updateTotalOdds();
            updatePotentialReturn();
            updateBetCount();
            updateBetSlipVisibility();
            saveBetSlip();
        });
    });

    betSlipArrow.addEventListener('click', () => {
        betSlip.style.display = 'none';
    });

    betSlipContent.addEventListener('click', (e) => {
        if (e.target.classList.contains('remove-bet')) {
            e.stopPropagation();
            const betId = e.target.closest('.bet-slip-item').getAttribute('data-id');
            removeBetFromSlip(betId);
        }
    });

    betAmountInput.addEventListener('click', () => {
        numericKeypad.style.display = 'block';
    });

    numericKeypad.addEventListener('click', (e) => {
        if (e.target.tagName === 'BUTTON') {
            let value = e.target.getAttribute('data-value');
            
            if (!value && e.target.tagName === 'I') {
                value = e.target.parentElement.getAttribute('data-value');
            }

            switch (value) {
                case 'clear':
                    betAmountInput.value = '';
                    break;
                case 'backspace':
                    betAmountInput.value = betAmountInput.value.slice(0, -1);
                    break;
                case 'done':
                    numericKeypad.style.display = 'none';
                    break;
                case '.':
                    if (!betAmountInput.value.includes('.')) {
                        betAmountInput.value += value;
                    }
                    break;
                case '+1000':
                case '+500':
                case '+100':
                    betAmountInput.value = (parseFloat(betAmountInput.value) || 0) + parseInt(value.slice(1));
                    break;
                default:
                    if (betAmountInput.value === '0' && value !== '.') {
                        betAmountInput.value = value;
                    } else {
                        betAmountInput.value += value;
                    }
                    break;
            }
            
            validateBetAmount();
            updatePotentialReturn();
        }
    });

    document.addEventListener('click', (e) => {
        if (!betAmountInput.contains(e.target) && !numericKeypad.contains(e.target)) {
            numericKeypad.style.display = 'none';
        }
    });

function generateBetCode() {
        const timestamp = new Date().getTime();
        const random = Math.floor(Math.random() * 9000) + 1000; // Random number between 1000 and 9999
        return `${timestamp}${random}`;
    }

    loadBetCodeBtn.addEventListener('click', () => {
        const betCode = betCodeInput.value.toUpperCase();

        if (localStorage.getItem(betCode)) {
            const savedBets = JSON.parse(localStorage.getItem(betCode));
            clearBetSlip();

            savedBets.forEach(bet => {
                bets.push(bet);

                const betItem = document.createElement('div');
                betItem.classList.add('bet-slip-item');
                betItem.setAttribute('data-id', bet.id);
                betItem.innerHTML = `
                    <div class="bet-main">
                        <span class="remove-bet">&times;</span>
                        <div class="bet-main-text">
                            <span>${bet.base}</span> <!-- Display data-main -->
                        </div> <br>
                        <span class="bet-detail">${bet.detail}</span> <!-- Display data-detail -->
                        <div class="bet-details">
                            <span>${bet.mini}</span> <!-- Display data-mini -->
                        </div>
                    </div>
                    <span>Odds: ${bet.odds.toFixed(2)}</span>
                `;
                betSlipContent.appendChild(betItem);
            });

            updateTotalOdds();
            updatePotentialReturn();
            updateBetCount();
            updateBetSlipVisibility();
            saveBetSlip();
            updateButtonState();
        } else {
            alert('Invalid Bet Code');
        }
    });


    // Function to display the bet code and details
    function createBetCodeDetails(betCode) {
        const betDetailsContainer = document.createElement('div');
        betDetailsContainer.classList.add('bet-code-details-overlay');
        betDetailsContainer.innerHTML = `
            <div class="bet-code-details-content">
                <h3>Bet Code: ${betCode} <i id="copy-bet-code" class="fa fa-copy" style="cursor: pointer;"></i></h3>
                <ul>
                    ${bets.map(bet => `
                        <li>
                            <span>${bet.text}</span>
                            <span>Odds: ${bet.odds.toFixed(2)}</span>
                        </li>`).join('')}
                </ul>
                <div class="bet-code-buttons">
                    <button id="share-bet-code">Share</button>
                    <button id="close-bet-code-details">Close</button>
                </div>
            </div>
        `;
        document.body.appendChild(betDetailsContainer);

        // Hide bet slip to show the bet code details
        betSlip.style.display = 'none';

        // Close the bet code details modal
        document.getElementById('close-bet-code-details').addEventListener('click', () => {
            document.body.removeChild(betDetailsContainer);
            betSlip.style.display = 'block'; // Show bet slip again
        });

        // Copy bet code to clipboard
        const copyIcon = document.getElementById('copy-bet-code');
        copyIcon.addEventListener('click', () => {
            navigator.clipboard.writeText(betCode).then(() => {
                alert('Bet code copied to clipboard!');
            }).catch(err => {
                console.error('Failed to copy bet code: ', err);
            });
        });

        // Share bet code via Web Share API
        const shareButton = document.getElementById('share-bet-code');
        shareButton.addEventListener('click', () => {
            if (navigator.share) {
                navigator.share({
                    title: 'Bet Code',
                    text: `Here is my bet code: ${betCode}\nDetails:\n${bets.map(bet => `${bet.text} - Odds: ${bet.odds.toFixed(2)}`).join('\n')}`
                }).then(() => {
                    console.log('Bet code shared successfully!');
                }).catch(err => {
                    console.error('Failed to share bet code: ', err);
                });
            } else {
                alert('Your browser does not support the Web Share API.');
            }
        });
    }

    // Event listener for the "Book Bet" button
    bookBetBtn.addEventListener('click', () => {
        if (bets.length > 0) {
            const betCode = generateBetCode();
            localStorage.setItem(betCode, JSON.stringify(bets)); // Store bets using the generated code

            createBetCodeDetails(betCode); // Display bet code and details to the user
        } else {
            alert('No bets added to the bet slip!');
        }
    });

    betSlipIcon.addEventListener('click', () => {
        betSlip.style.display = betSlip.style.display === 'block' ? 'none' : 'block';
        // toggleLoadBetCodeContainer();
    });

    function placeBet(bets, betAmount, currentBalance) {
        // Generate a unique bet code
        const betCode = generateBetCode();
    
        // Deduct the bet amount from the balance
        currentBalance -= betAmount;
    
        // Create bet history entry
        const betHistory = {
            code: betCode,
            details: bets.map(bet => ({
                base: bet.base,
                detail: bet.detail,
                mini: bet.mini,
                odds: bet.odds.toFixed(2)
            })),
            totalOdds: totalOdds.toFixed(2),
            amount: betAmount.toFixed(2),
            potentialReturn: (betAmount * totalOdds).toFixed(2),
            timestamp: new Date().toLocaleString()
        };
    
        // Send the bet to the server to store in the database
        fetch('place_bet.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                betCode: betHistory.code,
                totalOdds: betHistory.totalOdds,
                amount: betHistory.amount,
                potentialReturn: betHistory.potentialReturn,
                betDetails: betHistory.details
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Bet successfully placed.');
            } else {
                console.error('Failed to place bet:', data.error);
            }
        })
        .catch(error => console.error('Error:', error));
    
        // Save updated history in localStorage for the front-end display
        const history = JSON.parse(localStorage.getItem('betHistory')) || [];
        history.push(betHistory);
        localStorage.setItem('betHistory', JSON.stringify(history));
    
        // Update balance in the session via an AJAX request
        updateBalanceInSession(currentBalance);
    
        // Update the UI
        loadBetSlip();
        clearBetSlip();
        betAmountInput.value = '';
        updatePotentialReturn();
    
        // Display success modal with bet code
        const successModal = document.getElementById('successModal');
        const betCodeDisplay = document.getElementById('betCodeDisplay');
        betCodeDisplay.textContent = betCode;
    
        successModal.style.display = 'block';
    }
    
    
// When placing a bet, store the bet details in localStorage
placeBetBtn.addEventListener('click', () => {
    const betAmount = parseFloat(betAmountInput.value) || 0;

    if (isNaN(currentBalance)) {
        alert('Error retrieving balance. Please try again later.');
        return;
    }

    if (betAmount < minBetAmount) {
        betAmountWarning.textContent = `Bet amount must be at least $${minBetAmount}.`;
        return;
    }

    if (betAmount > currentBalance) {
        alert('Insufficient funds.');
        return;
    }

    betAmountWarning.textContent = '';
    // const betCode = generateBetCode();
    const betCode = generateBetCode();
    localStorage.setItem(betCode, JSON.stringify(bets)); // Store bets using the generated code

    placeBet(bets, betAmount, currentBalance);

    // Update balance in the session via an AJAX request
    $.ajax({
        url: 'update_balance.php',
        type: 'POST',
        data: {
            balance: currentBalance.toFixed(2)
        },
        success: function(response) {
            // Optionally update the displayed balance on the page
            document.getElementById('om').textContent = `💰 $${currentBalance.toFixed(2)}`;
        }
        
    });
    
    loadBetSlip();
    clearBetSlip();
    betAmountInput.value = '';
    updatePotentialReturn();

    const successModal = document.getElementById('successModal');
    const betCodeDisplay = document.getElementById('betCodeDisplay');
    betCodeDisplay.textContent = betCode;

    successModal.style.display = 'block';

});


// Get the modal and close elements
const successModal = document.getElementById('successModal');
const closeModalBtn = document.getElementById('closeModalBtn');
const copyBetCodeBtn = document.getElementById('copyBetCodeBtn');
const spanClose = document.querySelector('.close');

// Close the modal when the user clicks on the 'X' span
spanClose.onclick = function() {
    successModal.style.display = 'none';
};

// Close the modal when the user clicks on the close button
closeModalBtn.onclick = function() {
    successModal.style.display = 'none';
};

// Close the modal if the user clicks anywhere outside of the modal
window.onclick = function(event) {
    if (event.target == successModal) {
        successModal.style.display = 'none';
    }
};

// Copy the bet code to clipboard
copyBetCodeBtn.onclick = function() {
    const betCodeDisplay = document.getElementById('betCodeDisplay');
    navigator.clipboard.writeText(betCodeDisplay.textContent).then(() => {
        alert('Bet code copied to clipboard');
    }).catch(err => {
        console.error('Failed to copy bet code: ', err);
    });
};


    // ... Your existing code ...
    function updateBalanceInSession(newBalance) {
        $.post('update_balance.php', { balance: newBalance }, function(response) {
            if (response.success) {
                console.log('Balance updated successfully.');
            } else {
                console.log('Failed to update balance.');
            }
        }, 'json');
    }









    
    
    clearBetSlipButton.addEventListener('click', clearBetSlip);
    // toggleLoadBetCodeContainer();
    loadBetSlip();
    validateBetAmount();
    updatePotentialReturn();
    updateButtonState();
});


