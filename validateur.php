<?php
 

//---------------------------------------------------------------------------------------------
//Fonction de validation de la formule
//EntrÈe : la formule
//Sortie: boolean 
//---------------------------------------------------------------------------------------------

function validation ($P_formule)
{
	
//Tableau des ÈlÈments de validation de la formule
$Tab_elmt = array('Tab_elmt_op' =>array('+','-','*','/'),'Tab_elmt_opMD' =>array('*','/'),'Tab_elmt_nbr' =>array('0','1','2','3','4','5','6','7','8','9'));

//Variables locales de la fonction 
$Int_parenthese=0;
$Bool_erreur=0;
$Int_len = strlen($P_formule);

//Parcour de la formule pour la valider			
for( $Int_i = 0; $Int_i < $Int_len; $Int_i++) 
{
//Le premier et le dernier lettre ne doit pas Ítre un opÈrateur	ni une parenthËse dans le sence contraire
if ((in_array($P_formule{0}, $Tab_elmt['Tab_elmt_opMD'])) or ($P_formule{0}===')') 
	or (in_array($P_formule{$Int_len-1}, $Tab_elmt['Tab_elmt_op']))  or ($P_formule{$Int_len-1}==='(')) {
	message('Erreur dÈbut ou fin !!');
	$Int_parenthese=0;
	$Bool_erreur=1;
	break;
}
				
//Test le caractËre apres et avant le nombre
else 
if(in_array($P_formule{$Int_i}, $Tab_elmt['Tab_elmt_nbr']) and ($Int_i != '0') and ($Int_i != $Int_len-1))
{
	if(($P_formule{$Int_i-1}== '(') and ($P_formule{$Int_i+1}== ')') or ($P_formule{$Int_i-1}== ')') or ($P_formule{$Int_i+1}== '('))
	{
			message('Erreur de nombre entre parenthËse !!');
			$Int_parenthese=0;
			$Bool_erreur=1;
			break;	
	}
}
//Test le caractËre apres l'opÈrateur 
else 
if(in_array($P_formule{$Int_i}, $Tab_elmt['Tab_elmt_op']))
{
	//Si l'opÈrateur ne se trouve pa a la fin de la chaine
	if($Int_i != $Int_len-1)
	{
		//Verfication du caratctËre aprÈs l'opÈrateur
		if (((in_array($P_formule{$Int_i+1}, $Tab_elmt['Tab_elmt_opMD'])) or ($P_formule{$Int_i+1}===')')) and ($Int_i != '0'))
		{	
			message('Erreur aprÈs opÈrateur !!');
			$Int_parenthese=0;
			$Bool_erreur=1;
			break;
		}
		if($P_formule{$Int_i} === '/')
		{	
			//Verfication du caratctËre aprÈs l'opÈrateur de division
			if ($P_formule{$Int_i+1} ==='0')
			{
				message('Erreur de division par 0');
				$Int_parenthese=0;
				$Bool_erreur=1;
				break;
			}
		}
	}
}
				
//IncrÈmentation du nombre de parenthËse  et verfication du caractËre aprÈs la parenthËse ouverte
else
if ($P_formule{$Int_i} === '(') 
{
	//Si la parenthËse ouverte ne se trouve pa a la fin de la chaine
	if($Int_i != $Int_len-1)
	{
		//Verfication du caratctËre aprÈs la parenthËse ouverte
		if ((in_array($P_formule{$Int_i+1}, $Tab_elmt['Tab_elmt_opMD'])) or ($P_formule{$Int_i+1}===')'))
		{
			message('Erreur aprÈs parenthËse ouverte !!');
			$Int_parenthese=0;
			$Bool_erreur=1;
			break;
		}
	}
//L'incrÈmnetation
$Int_parenthese++;
}

//DÈcrmentation du nombre de parenthËse  et verfication du caractËre aprÈs la parenthËse fermante
else
if($P_formule{$Int_i} === ')') {
	if($Int_i != $Int_len-1){
		//verfication du caratctËre aprÈs la parenthËse fermante
		if (in_array($P_formule{$Int_i+1}, $Tab_elmt['Tab_elmt_nbr']) or ($P_formule{$Int_i+1}==='('))
		{
			message('Erreur aprÈs parenthËse fermante !!');
			$Int_parenthese=0;
			$Bool_erreur=1;
			break;
		}
	}
//DÈcrÈmnetation
$Int_parenthese--;
}			
}
			
//Test des  parenthËse s'il est diffirent de 0 un message d'erreur
if($Int_parenthese != 0){
	//Si $Int_parenthese supperieur ‡ 0 une parenthËse ouverte non fermÈe
	if($Int_parenthese > 0){
		message("ParenthËse ouverte  non  fermÈe");
	}
	else 
	//Si $Int_parenthese infÈrieur ‡ 0 une parenthËse fermÈe non ouverte
	if($Int_parenthese < 0)
	{
		message("ParenthËse fermÈ non ouverte");
	}
}

else 
//S'il existe une erreur
if($Bool_erreur === 1) 
{
	message('votre formule est incorrecte');
	return false;
}
//S'il n'existe pas une erreur
else
{
	//message('votre formule est correcte');
	return true;
}
}
	

//-----------------------------------------------------------------------------
//La fonction message qui permet l'afficage d'un message en alert javascript
//EntrÈes : une chaine de caractËre
//Sortie : une popup qui affiche la chaine entrÈ en paramËtre
//-----------------------------------------------------------------------------
function message($P_msg)
{
	echo"<script language=\"javascript\">";
	echo"alert('$P_msg')";
	echo"</script>";			
}

?>

