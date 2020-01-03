document.addEventListener('DOMContentLoaded', () => {
  const urlString = window.location.href;
  const url = new URL(urlString);
  const menuValue = url.searchParams.get("menu");
  const tipoValue = url.searchParams.get("tipo");
  const estadoValue = url.searchParams.get("estado");
  
  switch(menuValue) {
    case 'utilizadores':
      ativarBgTab(menuValue);
      break;
    case 'usersPorAprovar':
      ativarBgTab(menuValue);
      break;
    case 'usersEliminados':
      ativarBgTab(menuValue);
      break;
    case 'gerirMarcacoes':
      if(estadoValue == "marcada") {
        ativarBgTab(estadoValue);
      } else if(estadoValue == "porAprovar") {
        ativarBgTab(estadoValue);
      } else if(estadoValue == "concluida") {
        ativarBgTab(estadoValue);
      }
      break;
    case 'dadosPessoais':
      ativarBgTab(menuValue);
      break;
    case 'marcarConsulta':
      ativarBgTab(menuValue);
      break;
    case 'verConsultas':
      ativarBgTab(menuValue);
      break;
    case 'escalaServico':
      if(tipoValue == "medico") {
        ativarBgTab(tipoValue);
      } else if(tipoValue == "enfermeiro") {
        ativarBgTab(tipoValue);
      }
      break;
    default: 
      break;
  }
});

let ativarBgTab = (tab) => {
  const tabEl = document.querySelector(`#${tab}`);
  tabEl.classList.toggle('is-active');
}