$(document).ready(function(){

	/* var Modi='N';

	$(".nota").css("cursor","pointer");
	$(".conte2").hide();

	$(".bann").click(function(){
		$(".conte1").show();
		$(".conte2").hide();
	});

	start();

	function Fecha(){
		var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		var f=new Date();
		$("#fec").html("<h6>"+f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear()+"</h6>");
	}

	function start(){
		cadena='';
		cadena +="<div class='col left'><label id='fec'></label></div>";//<img src='images/Logo.jpg' class='responsive-img'>
        cadena +="<div class='col offset-l4'>";
        cadena +="<div class='input-field col s6 m3 l3'><h6><i class = 'material-icons prefix'>account_circle</i><input id='usu' type='text' class='blue-text text-darken-2' value=''><label for='usu'>Usuario</label></h6></div>";
        cadena +="<div class='input-field col s6 m3 l3'><h6><input id='pass' type='text' class='blue-text text-darken-2' value=''><label for='pass'>Contraseña</label></h6></div>";
        cadena +="<div class='col s3 m3 l2'><br><br><a class='waves-effect waves-light btn-small' id='btn'>Ingresar</a></div>";
        cadena +="</div>";
        $(".log").append(cadena);
        //Fecha();
	}
    */

  /*$(document).ready( function () {
    const incorrecto1 = document.querySelector("#incorrecto1");
    const incorrecto2 = document.querySelector("#incorrecto2");
    const incorrecto3 = document.querySelector("#incorrecto3");
    const correcto1 = document.querySelector("#correcto1");
    const correcto2 = document.querySelector("#correcto2");
    incorrecto1.style.display = "none";
    incorrecto2.style.display = "none";
    incorrecto3.style.display = "none";
    correcto1.style.display = "block";
    correcto2.style.display = "block";
  });*/

	$("#btn").click(function(){
    /*const incorrecto1 = document.querySelector("#incorrecto1");
    const incorrecto2 = document.querySelector("#incorrecto2");
    const incorrecto3 = document.querySelector("#incorrecto3");
    const correcto1 = document.querySelector("#correcto1");
    const correcto2 = document.querySelector("#correcto2");*/
    $.ajax({
            type: "POST",
            url: "../php/login.php?pUSUARIO="+$("#usu").val()+"&pCONTRASENYA="+$("#pass").val()+"",
            contentType: "application/json; utf-8",
            dataType: "json",
            async:true,
            success: function (data) {
        if(data[0].resul == '0'){
                    // alert ('Bienvenido: '+data[0].NOMBRE+' '+data[0].APELLIDO);
                    us=data[0].ID_USUARIO;
                    // localStorage.setItem("nombre", data[0].NOMBRE+' '+data[0].APELLIDO);
                    localStorage.setItem("nombre", data[0].NOMBRE);
                    localStorage.setItem("dinero", data[0].DINERO);
                    localStorage.setItem("id_usu", data[0].ID_USUARIO);
                    console.log(data[0].NOMBRE+' '+data[0].APELLIDO);
                    window.location.href='inicio_bienvenido.html'
                    $("#nombre").html('Bienvenido: '+data[0].NOMBRE+' '+data[0].APELLIDO);
                    $("#dinero").html(data[0].DINERO);                    
        }else{
              /*incorrecto3.style.color = "red";
              correcto1.style.display = "none";
              correcto2.style.display = "none";
              incorrecto1.style.display = "block";
              incorrecto2.style.display = "block";
              incorrecto3.style.display = "block";            
              document.getElementById('usu').value = "";
              document.getElementById('pass').value = "";*/
              window.location.href='contra_incorrecta.html';
                } 
            },
            error: OnError
        });
	});

$("#btn").mouseover(function(){
  $("#btn").css('cursor','pointer');
});

	function OnError(jqXHR, textStatus, errorThrown){
	       	alert (jqXHR.status+' '+jqXHR.responseText);
	}

$("#btnreg1").click(function(){
  
  localStorage.setItem("usuario", $("#usureg").val());
  localStorage.setItem("mail", $("#mailreg").val());
  localStorage.setItem("nomreg", $("#nomreg").val());
  localStorage.setItem("dni", $("#dnireg").val());
  localStorage.setItem("pass", $("#passreg").val());

});

$("#btnreg2").click(function(){
  
  localStorage.setItem("nac", $("#anioreg").val() + "-" + $("#mesreg").val() + "-" + $("#diareg").val());
  localStorage.setItem("tel", $("#telreg").val());
  $.ajax({
            type: "POST",
            url: "../php/register.php?pUSUARIO="+localStorage.getItem("usuario")+"&pCONTRASENYA="+localStorage.getItem("pass")+"&pNOMBRE="+localStorage.getItem("nomreg")+"&pAPELLIDO=a"+"&pMAIL="+localStorage.getItem("mail")+"&pTELEFONO="+localStorage.getItem("tel")+"&pCBU=0"+ "&pFECHA_NAC="+localStorage.getItem("nac")+"&pALIAS=a"+"&pDNI="+ localStorage.getItem("dni")+"&pFOTO_PERF=a"+"" ,
            contentType: "application/json; utf-8",
            dataType: "json",
            async:true,
            success: function (data) {
            	window.location.href='iniciar_sesion.html'
            },
            error: OnError
        });

});

$("#btnreg1").mouseover(function(){
  $("#btnreg1").css('cursor','pointer');
});

$("#btnreg2").mouseover(function(){
  $("#btnreg2").css('cursor','pointer');
});

$("#btncbu").mouseover(function(){
  $("#btncbu").css('cursor','pointer');
});
$("#btnava").mouseover(function(){
  $("#btnava").css('cursor','pointer');
});
$("#btntran").mouseover(function(){
  $("#btntran").css('cursor','pointer');
});
$("#btndat").mouseover(function(){
  $("#btndat").css('cursor','pointer');
});
$("#btnip").mouseover(function(){
  $("#btnip").css('cursor','pointer');
});
$("#btnsig").mouseover(function(){
  $("#btnsig").css('cursor','pointer');
});
$("#btningreso").mouseover(function(){
  $("#btningreso").css('cursor','pointer');
});
$("#avapres").mouseover(function(){
  $("#avapres").css('cursor','pointer');
});

$("#pressi").mouseover(function(){
  $("#pressi").css('cursor','pointer');
});

$("#btncbu").click(function(){
  localStorage.setItem("icbu", $("#icbu").val());
  $.ajax({
            type: "POST",
            url: "../php/hacer_transferencia.php?pCBU="+localStorage.getItem("icbu")+"" ,
            contentType: "application/json; utf-8",
            dataType: "json",
            async:true,
            success: function (data) {
            if(data[0].result == '0'){
            localStorage.setItem("nom_des",  data[0].NOMBRE);
            localStorage.setItem("cbu_des",  data[0].CBU);
            localStorage.setItem("usuario_des",  data[0].USUARIO_DES);
            localStorage.setItem("alias_des",  data[0].ALIAS);
            localStorage.setItem("banco_des",  data[0].BANCO);
            localStorage.setItem("id_des",  data[0].ID_DESTINATARIO);
            window.location.href='es_esta_persona.html'
          }
          else {
            window.location.href='cbu_no_encontrada.html'
          }
            },
            error: OnError
        });

});

$("#btnava").click(function(){
  
  localStorage.setItem("motivo", $("#motivo").val());
  localStorage.setItem("monto", $("#monto").val());
  window.location.href='estas_seguro_transferencia.html'
});

$("#btntran").click(function(){
  $.ajax({
            type: "POST",
            url: "../php/alta_transferencia.php?pID_TRANSACCION=33&pID_TIP_TRANS=1&pID_USUARIO=" + localStorage.getItem("id_usu") + "&pID_DESTINATARIO=" + localStorage.getItem("id_des") + "&pMONTO=" + localStorage.getItem("monto") + "&pMOTIVO=" + localStorage.getItem("motivo") + "&pFEC_INICIO=2021-11-02" + "&pID_TARJETA=1"+"" ,
            contentType: "application/json; utf-8",
            dataType: "json",
            async:true,
            success: function (data) {
            localStorage.setItem("dinero", parseInt(localStorage.getItem("dinero")) - parseInt(localStorage.getItem("monto")));
            window.location.href='historial_de_transferencias.html'
            },
            error: OnError
        });
// http://localhost/proyecto2021/php/alta_transferencia.php?pID_TRANSACCION=14&pID_TIP_TRANS=1&pID_USUARIO=3&pID_DESTINATARIO=1&pMONTO=1010&pMOTIVO=Polleria&pFEC_INICIO=2021-10-19&pID_TARJETA=1
});

$("#btndat").click(function(){
  $.ajax({
            type: "POST",
            url: "../php/btn_infocuenta.php?pID_USUARIO="+localStorage.getItem("id_usu")+"" ,
            contentType: "application/json; utf-8",
            dataType: "json",
            async:true,
            success: function (data) {
            localStorage.setItem("mail1", data[0].MAIL);
            localStorage.setItem("usuario1", data[0].USUARIO);
            localStorage.setItem("pass1", data[0].CONTRASENYA);
            window.location.href='informacion_de_cuenta.html'
            },
            error: OnError
        });
// http://localhost/proyecto2021/php/alta_transferencia.php?pID_TRANSACCION=14&pID_TIP_TRANS=1&pID_USUARIO=3&pID_DESTINATARIO=1&pMONTO=1010&pMOTIVO=Polleria&pFEC_INICIO=2021-10-19&pID_TARJETA=1
});

$("#btnip").click(function(){
  $.ajax({
            type: "POST",
            url: "../php/btn_infopersonal.php?pID_USUARIO="+localStorage.getItem("id_usu")+"" ,
            contentType: "application/json; utf-8",
            dataType: "json",
            async:true,
            success: function (data) {
            localStorage.setItem("nombre2", data[0].NOMBRE);
            localStorage.setItem("dni2", data[0].DNI);
            localStorage.setItem("fecho2", data[0].FECHA_NAC);
            localStorage.setItem("tele2", data[0].TELEFONO);
            window.location.href='informacion_personal.html'
            },
            error: OnError
        });
// http://loc

});

$("#btnsig").click(function(){
            localStorage.setItem("ingdin", $("#ingdin").val());
            window.location.href='estas_seguro_fondos.html'
});

$("#btningreso").click(function(){
  $.ajax({
            type: "POST",
            url: "../php/alta_ingreso_dinero.php?pID_TRANSACCION=&pID_USUARIO="+localStorage.getItem("id_usu")+ "&pMONTO="+localStorage.getItem("ingdin")+"&pFEC_INICIO=2021-11-02&pID_TARJETA=1" +"" ,
            contentType: "application/json; utf-8",
            dataType: "json",
            async:true,
            success: function (data) {
            localStorage.setItem("dinero", parseInt(localStorage.getItem("dinero")) + parseInt(localStorage.getItem("ingdin")));
            window.location.href='inicio_bienvenido.html'
            },
            error: OnError
        });
// http://loc

});


$("#avapres").click(function(){
            localStorage.setItem("montillo", $("#montillo").val());
            localStorage.setItem("plazo", $("#plazo").val());
            window.location.href='estas_seguro_prestamo.html'
});

$("#pressi").click(function(){
  $.ajax({
            type: "POST",
            url: "../php/alta_prestamo.php?pID_TRANSACCION=&pMONTO="+localStorage.getItem("montillo")+"&pFEC_INICIO=2021-11-02&pFEC_FIN=2022-11-02&pPORCENTAJE_INTERES=50&pPLAZO="+localStorage.getItem("plazo")+" meses&pMONTO_A_DEVOLVER=15000&pOBSERVACIONES=Prestamo&pID_USUARIO="+localStorage.getItem("id_usu") + "&pID_TARJETA=1"+"" ,
            contentType: "application/json; utf-8",
            dataType: "json",
            async:true,
            success: function (data) {
            localStorage.setItem("dinero", parseInt(localStorage.getItem("dinero")) + parseInt(localStorage.getItem("montillo")));
            window.location.href='historial_de_prestamos.html'
            },
            error: OnError
        });
});

});
