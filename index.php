
<html>
<head>
<script type="text/javascript"> 
//fonction de vÈrification de l'existence de caractËres autorisÈs
function validerCaracteres(monChamp) 
{
	//les caractËres autorisÈs 
	reg = new RegExp("[^a-zA-Z0-9/*+-^()]", "i"); 
	 
	//verfication du caractËres saisie s'il est autorisÈs ou non   
    if (reg.test(monChamp.value))
    { 
    	monChamp.value = monChamp.value.substring(0,monChamp.value.length-1);
   	}
} 

//fonction de vÈrification si le champ est vide ou non
function validerFormulaire() {
	//tester si le champ est vide 
    if (document.getElementById("formule").value == "") 
    {
         alert("Merci de saisir la formule");
         return false;
    } 
    else 
    {
        return true;
    }
}
</script>
	</head>
	<body align="center">		
		<form name="calculateur" method="POST" action="calculer.php" onsubmit="return validerFormulaire()">
			<fieldset style="width:250px;height:70px;padding-top:10px;">
    			<legend style="color:green;">Calculateur</legend>
					  <input name="formule" id="formule" type="text" onkeyup="validerCaracteres(formule)" required="required"/>
					  <input type="submit" value="Calculer">
			</fieldset>
		</form>
				
	</body>
</html>
