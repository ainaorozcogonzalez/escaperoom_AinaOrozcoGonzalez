document.addEventListener("DOMContentLoaded", function() {
  const phrases = [
    "Ho no, parece que estamos encerrados.",
    "Tendriamos que buscar una manera de salir.",
    "Como te llamas?"
  ];
  const delay = 75; // Milliseconds per character
  const modalText = document.getElementById('text');

  if (modalText) {
    let phraseIndex = 0;
    let charIndex = 0;

    // Función para escribir el texto de forma animada
    function typeText() {
      if (phraseIndex < phrases.length) {
        const phrase = phrases[phraseIndex];
        if (charIndex < phrase.length) {
          modalText.textContent += phrase.charAt(charIndex);
          charIndex++;
          setTimeout(typeText, delay);
        } else {
          // Finished typing current phrase, move to next phrase
          phraseIndex++;
          charIndex = 0;
          modalText.innerHTML += "<br>"; // Add line break
          setTimeout(typeText, delay * 10); // Wait a bit before starting next phrase
        }
      } else {
        // All phrases typed
        // Do nothing, let the user interact with the modal
      }
    }

    // Mostramos la ventana modal después de unos segundos
    setTimeout(function() {
      document.getElementById('modal').style.display = 'block';
      typeText();
    }, 3000);
  }

  // Al hacer click en el botón de "Empezar a jugar"
  document.getElementById('startButton').addEventListener('click', function(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    if (username) {
      localStorage.setItem('username', username);
      window.location.href = 'index.php';
    } else {
      alert("Debes introducir un nombre para poder empezar a jugar.");
    }
  });

  // Al hacer click en cualquier botón de prueba
  const testButtons = document.querySelectorAll('.testButton');
  testButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
      event.preventDefault();
      // Aquí iría la lógica para comprobar si se ha acertado la prueba correspondiente
      // Si se ha acertado, se mostraría la ventana modal correspondiente
      const modalId = this.dataset.modal;
      document.getElementById(modalId).style.display = 'block';
    });
  });

  // Al hacer click en el botón de "Continuar" (después de introducir la palabra secreta)
  document.getElementById('continueButton').addEventListener('click', function(event) {
    event.preventDefault();
    const secretWord = document.getElementById('secretWord').value;
    if (secretWord.toLowerCase() === "cache") {
      window.location.href = 'p2.php';
    } else {
      alert("Palabra incorrecta. Debes adivinar la palabra secreta para poder continuar.");
    }
  });

  // Aquí empieza el código que proporcionaste
  const input = document.querySelector("#input");
  const btn = document.querySelector("#button");
  const list = document.querySelector("#list");

  btn.addEventListener("click", () => {
    const item = document.createElement("li");
    item.innerText = input.value;
    list.appendChild(item);
    input.value = "";
  });
});
