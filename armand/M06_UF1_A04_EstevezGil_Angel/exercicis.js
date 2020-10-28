// --------------
// Nou lliurament
// --------------

var lliurament = new LliuramentClass("05", "angel", false);

// --------------
// Exercicis
// --------------

lliurament.add("1", function(){
    function setCookie(camp, valor, dies) {
        var d = new Date();
        d.setTime(d.getTime() + (dies*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = camp + "=" + valor + ";" + expires;
    }/** ACORDASE UNESCAPE */
    var varcookie = document.cookie;
    if (varcookie){
        var suma = document.cookie;
        suma++;
        varcookie = varcookie = suma;
        var printeo = varcookie;
    }else {
        setCookie("contadorr", "0", 30);
    }
    contador= document.getElementById("contador");
    contador.innerHTML = printeo;
    

});

lliurament.add("2", function(){
	// Aquí va el teu codi JS de l'exercici 2
});

lliurament.add("3", function(){
	// Aquí va el teu codi JS de l'exercici 3
});

// --------------
// Finalitzar lliurament
// --------------
lliurament.render();