// Selecionando os elementos
const divMovel = document.getElementById('divMovel');
const container = document.getElementById('container');

// Obtendo as dimensões do container
const containerRect = container.getBoundingClientRect();

// Função para mover a div
function moverDiv(event) {
  const { left, top } = divMovel.getBoundingClientRect();
  const { width, height } = containerRect;

  switch (event.key) {
    case 'w': // Cima
      divMovel.style.top = Math.max(0, top - 5) + 'px';
      break;
    case 's': // Baixo
      divMovel.style.top = Math.min(height - divMovel.offsetHeight, top + 5) + 'px';
      break;
    case 'd': // Esquerda
      divMovel.style.left = Math.max(0, left - 1) + 'px';
      break;
    case 'a': // Direita
      divMovel.style.left = Math.min(width - divMovel.offsetWidth, left + 1) + 'px';
      break;
  }
}

// Adicionando o event listener para o documento
document.addEventListener('keydown', moverDiv);
