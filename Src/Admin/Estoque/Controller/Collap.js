function edit(id){
    $('.collapsible').collapsible('open',2);

    var idd = document.getElementById('id');
    var nome = document.getElementById('name');
    var value = document.getElementById('value');
    var quantity = document.getElementById('quantity');
    var desc = document.getElementById('desc');
    var small = document.getElementById('small');
    var cat = document.getElementById("cat");

    var lbidd = document.getElementById('lbid');
    var lbnome = document.getElementById('lbname');
    var lbvalue = document.getElementById('lbvalue');
    var lbquantity = document.getElementById('lbquantity');
    var lbdesc = document.getElementById('lbdesc');
    var lbsmall = document.getElementById('lbsmall');

    lbidd.classList.add("active");
    lbnome.classList.add("active");
    lbvalue.classList.add("active");
    lbquantity.classList.add("active");
    lbdesc.classList.add("active");
    lbsmall.classList.add("active");

    idd.value = id;
    nome.value = document.getElementById(id + ' nome').getAttribute("value");
    value.value = document.getElementById(id + ' valor').getAttribute("value");
    quantity.value = document.getElementById(id + ' qtd').getAttribute("value");
    desc.value = document.getElementById(id + ' desc').getAttribute("value");
    small.value = document.getElementById(id + ' small').getAttribute("value");

    var acat = document.getElementById(id + ' cat').getAttribute("value");

    var catn;

    if(acat == 'Doce'){
      catn = 1;
    }else if(acat == 'Salgado'){
      catn = 2;
    }else{
      catn = 3;
    }

    cat.selectedIndex = catn;

    $('html, body').animate({scrollTop:0}, 'slow',function(){
      M.textareaAutoResize($(desc));
    });
}
