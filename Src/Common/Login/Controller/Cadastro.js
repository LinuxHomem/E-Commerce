$('#telefone').mask('+00 (00) 0000-0000');
var ac = true;
var btn = document.getElementById('telop');

function phoneMask(){
  if(ac){
    ac = false;
    $('#telefone').mask('+00 (00) 00000-0000');
    btn.textContent = "Telefone";
  }else{
    ac = true;
    $('#telefone').mask('+00 (00) 0000-0000');
    btn.textContent = "Celular";
  }
}
