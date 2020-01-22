function carregarConteudo(){
  $(function () {
    $('#conteudo').load("formulario.php").fadeIn("slow");
  });

}
  

function bloquearBotaoVoltar(){
  $(function () {
    $('.btn_mudar_mes_ant').click(false);
    $('.btn_mudar_mes_ant').css('opacity','0.3');
  });
}

function bloquearDiasAnteriores(dia){   
    for (var i = dia-1; i != 0; i--) {
        var btn = "#botao"+i;
        $(btn).click(false);
    }

}

function bloquarBotaoEnviar(){
  $(function () {
    $('#enviarDia').off('click');
    $('#enviarDia').css('opacity', '0.3');
  });
}

function desbloquarBotaoEnviar(){
  $(function () {
    $('#enviarDia').on('click');
    $('#enviarDia').css('opacity', '1');
  });
}

function clickDia(botao){
  document.getElementById('modalCorpo').style.display = 'flex';   
  document.getElementById('popupAgenda').style.display = 'flex';
  document.getElementById('content_agenda').style.transition = '.5s';
  document.getElementById('content_agenda').style.filter = 'Blur(2px)';
  teste(botao);
}

function verificaSeEventoExiste(data, dia){
    
  $.ajax({
    type: 'POST',
    dataType: 'html',
    url: "verificaSeEventoExiste.php",
    data: {data : data},
    success: function(result) {
      if(result != " "){
         $("#botao"+dia).append("<i class='fas fa-circle' style='font-size:4px;'></i>");
      }
    } 
  });
}

function abreModal(){
  document.getElementById('modalCorpo').style.display = 'flex';   
  document.getElementById('popupAgenda').style.display = 'flex';
  document.getElementById('content_agenda').style.transition = '.5s';
  document.getElementById('content_agenda').style.filter = 'Blur(2px)';
}

function fecharModal(){
  document.getElementById('modalCorpo').style.display = 'none';
  document.getElementById('popupAgenda').style.display = 'none';
  document.getElementById('content_agenda').style.transition = '.5s';
  document.getElementById('content_agenda').style.filter = 'Blur(0px)';
  $('#conteudo').load("formulario.php").fadeIn("slow");
}

function abreModal8(dia){
    $('#modalBody8').fadeIn();  
    document.getElementById('modalBody8').style.display = 'flex'; 
  }


function fecharModal8(){
  $('#modalBody8').fadeOut();
}


function teste(btn){
  var botao = document.getElementById(btn).value;
  var data = botao.split("/");
  document.getElementById("data").innerHTML = data[0]+'/'+data[1]+'/'+data[2];        


  document.getElementById("diaAqui").innerHTML = data[0];
  var diaAqui = document.getElementById('diaAqui').innerText;
  document.getElementById('diaSelecionado').value = diaAqui;

  document.getElementById("mesAqui").innerHTML = data[1];
  var mesAqui = document.getElementById('mesAqui').innerText;
  document.getElementById('mesSelecionado').value = mesAqui;

  document.getElementById("anoAqui").innerHTML = data[2];
  var anoAqui = document.getElementById('anoAqui').innerText;
  document.getElementById('anoSelecionado').value = anoAqui;
}

function abrirPopUpInfo(str){
  var vetor;
    for(i=0; i<7;i++){
      vetor = str.id.split("$");
    }


  document.getElementById("nome-usuario").innerHTML = "Nome do usuario: "+vetor[0];
  document.getElementById("cpf-usuario").innerHTML = "Cpf usuario: "+vetor[5];
  document.getElementById("niver-usuario").innerHTML = "Data de nascimento usuario: "+vetor[6];
  document.getElementById("nome-sala").innerHTML = "Nome da sala: "+vetor[1];
  document.getElementById("horarioComeca-usuario").innerHTML = "Horário de inicio da atividade: "+vetor[2];
  document.getElementById("horarioTermina-usuario").innerHTML = "Horário de termino da atividade: "+vetor[3];
  document.getElementById("data-usuario").innerHTML = "Data de solicitação do agendamento: "+vetor[4];

  $('#modalBody5').fadeIn();   
  document.getElementById('modalBody5').style.display = 'flex';    
}