function getData(){
  $.ajax({
    url: 'http://10.0.0.165/E-Commerce/Src/User/Controller/Perfil.php',
    method: 'POST',
    data: {get: true},
    dataType: 'json',

  }).done(function(result){
    var div = document.getElementById('table');
    var html = "";

    div.innerHTML = "";

    function render(produto){
      html += div.innerHTML;

      var numpd = produto["numpd"];
      var nome = produto["nome"];
      var valor = produto["valor"];
      var sitaucao = "";

      if(produto["situacao"] == 0){
        situacao = "<td style='color:#ff0000;'>Pendente<td>";
      }else{
        situacao = "<td style='color:#00ff00;'>Pronto</td>";
      }

      html += "<tr>"+
                "<td>"+numpd+"</td>"+
                "<td>"+nome+"</td>"+
                "<td>R$:"+valor+"</td>"+
                situacao+
              "</tr>";
    }

    if(result.length > 0){
      html += "<center>"+
                "<p class='h3 mt-5 mb-5'>Pedidos:</p>"+
                "<div class='table-responsive'>"+
                  "<table class='table'>"+
                    "<thead>"+
                      "<tr>"+
                        "<th>N° do Pedido</th>"+
                        "<th>Produto</th>"+
                        "<th>Valor</th>"+
                        "<th>Situação</th>"+
                      "</tr>"+
                    "</thead>"+
                  "<tbody>";

      result.forEach(render);

      html += "</tbody></table></div></center>";

      div.innerHTML = html;
    }
   });
}

$(document).ready(function(){
  var get = setInterval(getData,1000);
});
