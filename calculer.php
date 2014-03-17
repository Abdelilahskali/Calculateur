<?php
    /*
     * Crée le 10 mars 2014
     * Yellogic - Casablanca - Abdelilah SKALI
     *
     * calculer.php - fichier qui recupÈre la formule et test sa validitÈ via la fonction validation
     */
    
    //---------------------------------------------------------------------------------------------
    //Les includes - validateur.php et calculateur.php
    //---------------------------------------------------------------------------------------------
    require_once('validateur.php');
    require_once('calculateur.php');
    //---------------------------------------------------------------------------------------------
    //Verifier si la variable POST est Vide u non
    //---------------------------------------------------------------------------------------------
    

    if(!empty($_POST['formule']))
    {

        $G_Str_formule = $_POST['formule'];
        //appel de la fonction de validation de la formule
        validation($G_Str_formule);
        construction($G_Str_formule);
        //parcour($array);
    }
    else
    {
        message('Merci de saisir la formule');
        
    }
    
    ?>
