document.addEventListener('DOMContentLoaded', function() {
  const balao = document.getElementById('balao');
  const areaBalao = document.getElementById('areaBalao');
  
  // Posição inicial (em pixels)
  let posX = 80;
  let posY = 100;
  
  // Velocidade de movimento (pixels por tecla pressionada)
  const velocidade = 8;
  
  // Atualiza a posição visual do balão
  function atualizarPosicao() {
    balao.style.transform = `translate(${posX}px, ${posY}px)`;
  }
  
  // Calcula os limites de movimento
  function calcularLimites() {
    return {
      minX: 0,
      maxX: areaBalao.offsetWidth - balao.offsetWidth,
      minY: 0,
      maxY: areaBalao.offsetHeight - balao.offsetHeight
    };
  }
  
  // Função principal de movimento
  function moverBalao(event) {
    const limites = calcularLimites();
    const tecla = event.key.toLowerCase();
    
    // Evita comportamento padrão das teclas (como rolagem da página)
    if (['w', 'a', 's', 'd'].includes(tecla)) {
      event.preventDefault();
    }
    
    switch (tecla) {
      case 'w': // Cima
        posY = Math.max(limites.minY, posY - velocidade);
        break;
      case 's': // Baixo
        posY = Math.min(limites.maxY, posY + velocidade);
        break;
      case 'a': // Esquerda
        posX = Math.max(limites.minX, posX - velocidade);
        break;
      case 'd': // Direita
        posX = Math.min(limites.maxX, posX + velocidade);
        break;
      default:
        return; // Sai da função se não for uma tecla de movimento
    }
    
    atualizarPosicao();
  }
  
  // Configuração inicial
  function init() {
    // Define o balão como position: absolute via JavaScript
    balao.style.position = 'absolute';
    balao.style.transition = 'transform 0.15s ease-out';
    
    // Define a posição inicial
    atualizarPosicao();
    
    // Adiciona o listener de teclado
    document.addEventListener('keydown', moverBalao);
  }
  
  // Inicia o balão quando o DOM estiver pronto
  init();
});
