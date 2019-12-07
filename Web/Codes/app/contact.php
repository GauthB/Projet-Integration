<?php

//Ecrivez votre adresse e-mail entre les guillemets
$destinataire='peopleflux@gmail.com';

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

if (isset($obj['message']))
{

    // La variable $verif va nous permettre d'analyser si la sémantique de l'email est bonne
    $verif='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';

    //quelques remplacements pour les cractères speciaux
    $message=preg_replace('#(<|>)#', '-', $obj['message']);
    $message=str_replace('"', "'",$message);
    $message=str_replace('&', 'et',$message);

    $objet=preg_replace('#(<|>)#', '-', $obj['objet']);
    $objet=str_replace('"', "'",$objet);
    $objet=str_replace('&', 'et',$objet);

    // On assigne et/ou protège nos variables
    $votremail=stripslashes(htmlentities($obj['votremail']));
    $message=stripslashes(htmlspecialchars($message));
    $objet=stripslashes(htmlspecialchars($objet));

    //input envoi/previsualiser
    $envoi=htmlentities($obj['envoi']);

    //on enlève les espaces
    $votremail=trim($votremail);
    $message=trim($message);
    $objet=trim($objet);


    /*On vérifie si l'e mail et le message sont plein, et on agit en fonction.
      (on affiche Apercu du resultat, tel ou tel champ est vide, etc...*/
    //Si ca ne vas pas (mal rempli, mail non valide...)
    if((empty($message))or(empty($objet))or(!preg_match($verif,$votremail)))
    {
        //les 3 champs sont vides
        if(empty($votremail)and(empty($message))and(empty($objet)))
        {
            echo json_encode('Tous les champs sont vides.');
            $message='';$votremail='';$objet='';
        }
        //un des champs est vide
        else
        {
            if(!preg_match($verif,$votremail))
                echo json_encode('Votre adresse e-mail n\'est pas valide.');
            else
            {
                echo json_encode('Il faut remplir tous les champs !');

            }
        }
    }
    //Si les deux sont pleins et que l'adresse est valide, on envoie on on prévisualise sans envoi
    else
    {
        $domaine=preg_replace('#[^@]+@(.+)#','$1',$votremail);
        $DomaineMailExiste=checkdnsrr($domaine,'MX');
        if(!$DomaineMailExiste)
            echo json_encode('Le nom de domaine de l\'adresse e-mail que vous avez donné n\'existe pas.');
        elseif(!empty($envoi))
        {
            $objet='[FormContact] : '.$objet;
            $headers='From:'.$votremail."\r\n".'To:'.$destinataire."\r\n".'Subject:'.$objet."\r\n".'Content-type:text/plain;charset=iso-8859-1'."\r\n".'Sent:'.date('l, F d, Y H:i');
            $message='Message du client : '.$message;
            if(mail($destinataire,$objet,$message,$headers))
            {
                echo json_encode('Votre message a bien été envoyé. Merci.');
            }
            else
                echo json_encode('Un problème est survenu durant l\'envoi du mail.');
        }
        else
            echo json_encode('Une condition innatendue est survenue lors de l\'exécution du script.');
    }
}
else
{
    echo json_encode('Vous pouvez utiliser ce formulaire pour me contacter.');
    $votremail='';$message='';
}
