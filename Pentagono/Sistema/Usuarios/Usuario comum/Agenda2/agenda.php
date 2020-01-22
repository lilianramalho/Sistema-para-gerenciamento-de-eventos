<?php
include '../../../Banco de Dados/conexao.php';
?>
<html lang="pt-BR">
<head>
	<title>Agenda</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/modal22.css">
    <link rel="stylesheet" type="text/css" href="../../css/index2.css">
    <link rel="stylesheet" type="text/css" href="../../css/animate.css">    
    <link rel="stylesheet" type="text/css" href="../../css/datedropper.css">
    <link rel="stylesheet" type="text/css" href="../../css/timedropper.css">
    <link rel="stylesheet" type="text/css" href="../../css/agenda.css">
    <script src="../../js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="../../js/agendaFunctions.js" type="text/javascript"></script>
    <script src="../../js/timedropper.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
</head>
<body onload="carregarConteudo()">
    <?php


    $mes = Date('n');
    $ano = Date('Y');

    include_once '../../../Banco de Dados/conexao.php';
    session_start();
    if (!isset($_SESSION['email-login']) and !isset($_SESSION['senha-login'])) {
        header("Location:../../../Tela de login/login.php"); 
    }


    ?> 

    <script type="text/javascript">
        $(document).ready(function(){
            var dataatual = new Date();
            $('#diaSelecionado').val(dataatual.getDate());
            $('#mesSelecionado').val(dataatual.getMonth());
            $('#anoSelecionado').val(dataatual.getFullYear());
        });

    </script>

    <div id="content">
        <div id="container_full">
         <div id="nav-fixed"">
                <nav>
                    <div id="group" style="width: auto;margin-right:8%;">
                        <p style="margin-right: 10px;font-size: 16px;font-family:'Calibri Light';color: #777;">Olá, <?php echo $_SESSION['nomeusuario'] ?></p>
                        <div id="fotoUsuarioBarra"></div>
                        <div id="notificacao" onclick="mostrarNotifi()"><div id="circulo-visu"></div></div>                     
                        <a href="../../logout.php"><div id="sair"></div></a>
                    </div>
                </nav>

            <div class="solicitacoes"></div>  

            <script type="text/javascript">

             $.ajax({
                url: "listarNotificacoesUsuario.php",
                dataType: "html",
                success: function(result) {
                    $('.solicitacoes').html(result);
                } 
            });

        </script>              

        <script type="text/javascript">

            var aberto = false;  

            function mostrarNotifi(){

                if(aberto == false){
                 $('.solicitacoes').css({display:"block"});
                 aberto = true;
             }else{
                $('.solicitacoes').css({display:"none"});
                aberto = false;
            }
        }
    </script>

</div>

            <div id="menu-lateral">
                <ul>

                    <a href="../Tela de inicio/inicio.php"><li id="li-logo" class="li-menuLateral"></li></a>
                    
                    <a href="../Tela de inicio/inicio.php"><li id="li-inicio" class="li-menuLateral" title="Inicio"></li></a>

                    <a href="../adm/telaEventos.php"><li id="li-eventos" class="li-menuLateral" title="Eventos"></li></a>       

                    <a href="../adm/salas2.php"><li id="li-salas" class="li-menuLateral" title="Salas"></li></a>

                    <a href="../adm/telaObjetos.php"><li id="li-objetos" class="li-menuLateral" title="Objetos"></li></a>

                    <a href="../Tela add funcionario/addFuncionario.php"><li id="li-addFuncionarios" class="li-menuLateral" title="Adicionar funcionarios"></li></a>

                    <?php
                        echo "<a href='../Agenda/agenda.php?mes=".Date('n')."&ano=".Date('Y')."'><li id='li-agenda' class='li-menuLateral' title='Agenda'></li></a>";
                    ?>

                    <a href="../Tela central/centralNotificacoes.php"><li id="li-central" class="li-menuLateral" title="Central"></li></a>

                    <a href="../Tela de relatorio/relatorios.php"><li id="li-relatorios" class="li-menuLateral" title="Relátorios"></li></a>                

                    <a href="../Tela de configuracoes/configuracoes.php"><li id="li-configuracoes" class="li-menuLateral" title="Configurações"></li></a>               

                </ul>
            </div>

<script type="text/javascript">
    document.getElementById('li-agenda').style.backgroundColor = 'rgba(29, 209, 161,1)';
    document.getElementById('li-agenda').style.backgroundImage = "url(../../imagens/agendaHover.png)";
    document.getElementById('li-agenda').style.boxShadow = '0 3px 38px rgba(29, 209, 161,0.6)'; 
</script>

<script type="text/javascript">

    function atualizaDadosLateral(dia,mes,ano){

        var data = ano+"-"+mes+"-"+dia;
        var id = "circulo"+dia;
        $('#diaSelecionado').val(dia);
        $('#mesSelecionado').val(mes);
        $('#anoSelecionado').val(ano);

        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: "atualizacaoDoDia.php",
            data: {data : data},
            success: function(result) {
                $('#eventosDoDia').html(result);
            } 
        });

        document.getElementById(id).style.backgroundColor = 'rgba(29, 209, 161,1)';
        document.getElementById(id).style.color = 'fff';

        for (var i = 1; i <= 31; i++) {
            var id2 = "circulo"+i;

            if(i != dia){
                document.getElementById(id2).style.backgroundColor = 'transparent';
                document.getElementById(id2).style.fontFamily = 'Calibri';                            
                document.getElementById(id2).style.fontSize = '16';                            
                document.getElementById(id2).style.color = '#999'; 
            }
        }
    }

</script>       

<div id="container">    

    <div id="opcao-visualizacao"><div id="group"><p id="titulo-pagina">Agenda</p></div></div>

    <div id="informacoesAgenda">

        <div id="containerAgenda">

            <?php

            $mesatual = Date('n');
            $anoatual = Date('Y');
            $diadehoje = date('d');

            if ((isset($_GET['mes'])) && (isset($_GET['ano']))){
               $mes = $_GET['mes'];
               $ano = $_GET['ano'];
           }
           else{
               $mes = Date('n');
               $ano = Date('Y');
           }



           $numDiasMes = array( '1' => 31, '2' => 28, '3' => 31, '4' =>30, '5' => 31, '6' => 30,
               '7' => 31, '8' =>31, '9' => 30, '10' => 31, '11' => 30, '12' => 31);

           if (($ano % 4) == 0){ $numDiasMes['2'] = 29;}  

           if ($mes == 1){ $mesAnterior = 12; $mesSeguinte = $mes + 1; $anoAnterior = $ano - 1; $anoSeguinte = $ano; } 
           else if ($mes == 12) { $mesAnterior = $mes - 1; $mesSeguinte = 1; $anoAnterior = $ano; $anoSeguinte= $ano + 1; } 
           else { $mesAnterior = $mes - 1; $mesSeguinte = $mes + 1; $anoAnterior = $ano; $anoSeguinte = $ano ; }


           echo('<div id="content_agenda">');
           echo("<div id='agenda_header'>");

           if($mesAnterior < $mesatual && $anoAnterior == $anoatual){
            echo "<script>
            bloquearBotaoVoltar();
            </script>";
        }

        if($mesatual == $_GET['mes']){
            echo "<script>
            bloquearDiasAnteriores($diadehoje);
            </script>";         
        }

        echo("<a href='agenda.php?mes=$mesAnterior&ano=$anoAnterior'>"
            ."<div class='btn_mudar_mes_ant'><i class='fas fa-caret-left'></i></div>"
            ."</a>");
        switch ($mes){
            case 1: echo("<div class='display_mes'>Janeiro</div>"); break;
            case 2: echo("<div class='display_mes'>Fevereiro</div>"); break;
            case 3: echo("<div class='display_mes'>Março</div>"); break;
            case 4: echo("<div class='display_mes'>Abril</div>"); break;
            case 5: echo("<div class='display_mes'>Maio</div>"); break;
            case 6: echo("<div class='display_mes'>Junho</div>"); break;
            case 7: echo("<div class='display_mes'>Julho</div>"); break;
            case 8: echo("<div class='display_mes'>Agosto</div>"); break;
            case 9: echo("<div class='display_mes'>Setembro</div>"); break;
            case 10: echo("<div class='display_mes'>Outubro</div>"); break;
            case 11: echo("<div class='display_mes'>Novembro</div>"); break;
            case 12: echo("<div class='display_mes'>Dezembro</div>"); break;
        }            
        echo("<a href='agenda.php?mes=$mesSeguinte&ano=$anoSeguinte'>"
            ."<div class='btn_mudar_mes_prox'><i class='fas fa-caret-right'></i></div>"
            ."</a>");
        echo("</div>");
        ?>
        <div id="encapsularTudo">

            <table id="agenda">
                <tr>
                    <th>Dom</th>
                    <th>Seg</th>
                    <th>Ter</th>
                    <th>Qua</th>
                    <th>Qui</th>
                    <th>Sex</th>
                    <th>Sáb</th>
                </tr>

                <?php

                echo("<tr>");

                for ($dia = 1; $dia <= $numDiasMes[$mes]; $dia++){

                    $diaSemana = Date("w", mktime(0,0,0,$mes,$dia,$ano));

                    if ($dia == 1){
                        switch ($diaSemana){
                            case 0: break;
                            case 1: echo("<td></td>"); break;
                            case 2: echo("<td></td><td></td>"); break;
                            case 3: echo("<td></td><td></td><td></td>"); break;
                            case 4: echo("<td></td><td></td><td></td><td></td>"); break;
                            case 5: echo("<td></td><td></td><td></td><td></td><td></td>"); break;
                            case 6: echo("<td></td><td></td><td></td><td></td><td></td><td></td>"); break;
                        }

                        echo("<script>(verificaSeEventoExiste($ano+'-'+$mes+'-'+$dia, $dia)</script>");

                        echo("<td onclick='atualizaDadosLateral($dia,$mes,$ano)' id='botao$dia' class='botao$dia'><input type='hidden' id='$dia' value='$dia/$mes/$ano'><div id='circulo$dia' class='circuloCedula'><p>$dia</p></div></td>");


                    }
                    else{
                        if ($diaSemana == 0){

                            echo("</tr>");
                            echo("<tr>");
                        }   

                        echo("<script>verificaSeEventoExiste($ano+'-'+$mes+'-'+$dia, $dia)</script>");

                        echo("<td onclick='atualizaDadosLateral($dia,$mes,$ano)' id='botao$dia'><input type='hidden' id='$dia' value='$dia/$mes/$ano'><div id='circulo$dia' class='circuloCedula'><p>$dia</p></div></td>");


                    }
                }


                if ($dia < $diadehoje) {
                 echo "dia menor";
             }
             echo("</tr>");

             if($_GET['mes'] == $mesatual && $_GET['ano'] == $anoatual){
              echo "<script>
              atualizaDadosLateral($diadehoje,$mesatual,$anoatual);
              </script>"; 
          }else{

            if($mesatual == 12){
                echo "<script>
                atualizaDadosLateral(1,$mesSeguinte,$anoSeguinte);
                </script>"; 
            }else{
                echo "<script>
                atualizaDadosLateral(1,$mesSeguinte,$anoatual);
                </script>";                     
            }


        }

        ?>
    </table>
</div>

</div>

<div id="eventosDoDia"></div>


</div>


<script type="text/javascript">
    function aceitarAgendamento(codigo){
      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: "aceitar.php",
        data: {codigo:codigo},
        success: function(result) {
          alert(result);
          $('#solicitacoes').load("listarNotificacoes.php").fadeIn("slow");  
      } 
  });
  }

  function rejeitarAgendamento(codigo){
      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: "rejeitar.php",
        data: {codigo:codigo},
        success: function(result){
          alert(result);
          $('#solicitacoes').load("listarNotificacoes.php").fadeIn("slow");  
      }
  });
  }

  function visualizarNotificacao(cod){

      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: "visualizarNotificao.php",
        data: {cod:cod},
        success: function(result){
          $('#solicitacoes').load("listarNotificacoes.php").fadeIn("slow");  
      }
  });
  }


</script>


</div>


<div id="conteudo"></div>
<?php
if ($diadehoje < $dia ) {
 echo "<script>
 bloquearDiasAnteriores($diadehoje);
 </script>";
}
?> 

</div>  
</div>


<div id="modalBody8">
    <div id="modalContent8">
        <form action="inserirCadastroAgenda.php" class="hora" id="hora" method="post">
            <input type="hidden" id="diaSelecionado" name="dia" value="">
            <input type="hidden" id="mesSelecionado" name="mes" value="">
            <input type="hidden" id="anoSelecionado" name="ano" value="">
            <input type="text" id="atividade" class="input-form" name="atividade" placeholder="Atividade">
            <input type="text" id="horarioComeca" class="input-form" name="horaComeca">
            <input type="text" id="horarioTermina" class="input-form" name="horaTermina">

            <script>$( "#horarioComeca" ).timeDropper();$( "#horarioTermina" ).timeDropper();</script>

            <select name="salas">
                <?php
                $conn = abrirConexao();

                $query = "SELECT * FROM tbsala WHERE statussala = '1'";
                $result = mysqli_query($conn , $query);
                while ($row_query = mysqli_fetch_array($result)) { ?>
                <option name = "salas" value= "<?php echo $row_query['codsala']; ?>" > <?php echo $row_query['nomesala'];  ?>
                    </option> <?php
                } fecharConexao($conn); ?>
            </select>


            <div id="group2" style="padding: 10px;">
                <input type="button" class="butn pop_up_fechar" name="fechar" value="Cancelar" onclick="fecharModal8()" style="background-color: transparent;color: #999;">                
                <input type="button" id="btn-Agendar" class="butn" name="enviar" value="Próximo" onclick="fecharModal8()">
            </div>


<!--             <div class="listagemSalasAgenda invisivel"></div>
            <script>

                function listagemSalas(){
                   $.ajax({
                    url: "listagemSalas.php",
                    dataType: "html",
                    success: function(result) {
                        $('.listagemSalasAgenda').html(result);
                        $('.listagemSalasAgenda').load("listagemSalas.php").fadeIn("slow");  
                    } 
                });
               }


           </script> -->
<!-- 
           <script>
             function proxModalAgenda(valor){
                if(valor == 1){
                    alert("fas");
                    $('#atividade').css({display:"none"});  
                    $('#solicitante').css({display:"none"});  
                    $('#instituicao').css({display:"none"});  
                    $('#horarioComeca').css({display:"none"});  
                    $('#horarioTermina').css({display:"none"});  
                    $('#group2').css({display:"none"});  
                    $('.listagemSalasAgenda').removeClass('invisivel');             
                    $('#group3').removeClass('invisivel');
                    listagemSalas();
                }else if(valor == 2){                
                    $('#atividade').css({display:"block"});  
                    $('#solicitante').css({display:"block"});  
                    $('#instituicao').css({display:"block"});  
                    $('#horarioComeca').css({display:"block"});  
                    $('#horarioTermina').css({display:"block"});  
                    $('#group2').css({display:"block"});  
                    $('.listagemSalasAgenda').addClass('invisivel');      
                    $('#group3').addClass('invisivel');      
                }else if(valor == 3){                
                    $.post($("#hora").attr("action"), $("#hora :input").serializeArray(), function(info){
                        alert(info);
                        $('#modalContent8').html(info);
                    });
                };
            }
        </script>

        <div id="group3" style="padding: 10px;" class="invisivel">
                <input type="button" class="butn pop_up_fechar" name="Anterior" value="Anterior" onclick="proxModalAgenda(2)" style="background-color: transparent;color: #999;">                
                <input type="button" id="btn-Agendar2" class="butn" name="enviar" value="Agendar" onclick="proxModalAgenda(1)">
        </div> -->


<!--             <div id="group2" style="padding: 10px;">
                <input type="button" class="butn pop_up_fechar" name="fechar" value="Anterior" onclick="proxModalAgenda(2)" style="background-color: transparent;color: #999;">                
                <input type="button" id="btn-Agendar" class="butn" name="enviar" value="Agendar" onclick="proxModalAgenda(3)">
            </div>

        -->

    </form>

        <script type="text/javascript">
            $("#btn-Agendar").click(function(){
                $.post($("#hora").attr("action"), $("#hora :input").serializeArray(), function(info){
                    alert(info);
                    $('#modalContent8').html(info);
                });
            });

            $("#hora").submit(function(){
                return false;
           

            });
        </script>

</div>  
</div>

</body>
</html>
