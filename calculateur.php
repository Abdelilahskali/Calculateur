<?php

 

//$index =
 //-----------------------------------------------------------------------------------------------------------
 //Constructeur : une fonction qui permet de construir un arbre binaire on se basant sur une formule valide
 //EntrÈe: la formule
 //Sortie: une table multidimentionnelle represente un arbre binaire 
 //-----------------------------------------------------------------------------------------------------------
$array[] ='';
 function construction ($P_formule)
{	
//Variables locales de la fonction
 
$Str_form_left ="";
$Str_form_right="";
$Int_len = strlen($P_formule);
$index =Racin($P_formule);
$racin = $P_formule{$index};

if($index !=0)
{
$array = array();
echo "racin ".$racin.'<br>';
//sous-formule left
$Str_form_left=substr($P_formule, 0, $index);
echo "left ".$Str_form_left.'<br />';
//sous-formule right
$Str_form_right = substr($P_formule, $index+1);
echo "right ".$Str_form_right.'<br>';

//si nombre left possible
if(is_numeric($Str_form_left))
{
	$array[] = $Str_form_left;
}
else
{
	construction($Str_form_left);
}
//si nombre left possible
if(is_numeric($Str_form_right))
{
	$array[] = $Str_form_right;
}
else
{
	construction($Str_form_right);
}
}
else
{
	$index =RacinBasic($P_formule);
	$racin = $P_formule{$index};
	$array[] =$racin;
	echo "racin" . $racin."<br>";
	//sous-formule left
	$Str_form_left=substr($P_formule, 1, $index-1);
	$array[] = $Str_form_left;
	echo "left ".$Str_form_left.'<br />';
	//sous-formule right
	$Int_lent = ($Int_len-1)-($index+1);
	$Str_form_right = substr($P_formule,$index+1, $Int_lent);
	$array[] = $Str_form_right;
	echo "right ".$Str_form_right.'<br>';
	//parcour($array);
}

}
function parcour($arr){
	foreach ($arr as &$value) {
		echo"-------------------------------------------------------<br>";
    echo $value."<br>";
}
}

 //-----------------------------------------------------------------------------------------------------------
 //root : une fonction qui permet de trouver le noeud de l'arbre
 //EntrÈe: la formule
 //Sortie: l'index de l'opÈrateur root dans la formule 
 //-----------------------------------------------------------------------------------------------------------

function Racin($P_formule)
{
//les variables local de la fonction
$index_root=0;
$Bool_sou_frml=0;
$parentheses=0;
$Int_len = strlen($P_formule);
$Tab_op= array('+','-','*','/');
 //Parcour de la droit vers la gauche de la formule pour construire l'arbre
for( $Int_i = $Int_len-1; $Int_i >=0; $Int_i--)
{	
	//DÈbut d'une sous-formule 
 	if($P_formule{$Int_i}===')')
	{
        $Bool_sou_frml++;
        $parentheses++;
	}
	//Fin d'une sous-formule 
	if($P_formule{$Int_i}==='(')
	{
			$Bool_sou_frml--;
			$parentheses++;
	}
	//Détection de l'operateur noeud
	if(in_array($P_formule{$Int_i}, $Tab_op) and $Bool_sou_frml===0)
	{
        
        $index_root = $Int_i;
        break;
	}

        
}

return $index_root;
}

function RacinBasic($P_formule)
{
//les variables local de la fonction
$index_root=0;
$Bool_sou_frml=0;
$parentheses=0;
$Int_len = strlen($P_formule);
$Tab_op= array('+','-','*','/');
 //Parcour de la droit vers la gauche de la formule pour construire l'arbre
	for( $Int_i = $Int_len-1; $Int_i >=0; $Int_i--)
{
		if(in_array($P_formule{$Int_i}, $Tab_op) )
		{
			$index_root = $Int_i;
			break;
		}
}
	return $index_root;
}
		/*$arbre[$Int_j][Int_k]=$P_formule{$Int_i};
        $Int_j++;
        echo var_dump($arbre);
        //sous-formule left
		$Str_left=substr($P_formule, $Int_i+1);
		//sous-formule right
		$Str_right = substr($P_formule, 0, $Int_i);
		*/

?>
