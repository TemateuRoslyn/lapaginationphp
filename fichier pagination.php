<?php
//cette fonction retourne le nombre total de page a afficher
function getTotalPages()
{
  include('connecter.php');
  if($con)
  {
   $nbr = $con->query('SELECT COUNT(*) AS nbre_total FROM invite');
   $resultat = $nbr->fetch();
  return $resultat['nbre_total'];
  }
  return -1;
 
}
/*prend  en  paramètre  un  numéro  de  page, 
calcule la plage de données à afficher, puis récupère si possible les lignes correspondantes dans 
la base de données. Pour indication, la plage de données pour la première page est 0, 10 et celle 
de  la  deuxième  page  est  10,  10.  La  fonction  retourne  un  tableau  contenant  les  données 
récupérées dans la base de données.  */

  
function getData($number)
{

  $donneesParPage = 10; //nombres de donnees a fficher par page

  include('connecter.php');
  $pageTotal = getTotalPages();
  if($pageTotal == -1)
  {
    return;
  } else
  {
    $nbrPageTotal = ceil($pageTotal/$donneesParPage); //Nomre de pae total
    $plage = ($number-1)*$donneesParPage;
    //Recuperation des donnees
    $requete = $con->prepare('SELECT * FROM invite LIMIT :debut, :nombre');
    //Type des parametres passes
    $requete->bindValue(':debut', $plage, PDO::PARAM_INT);
    $requete->bindValue(':nombre', $donneesParPage, PDO::PARAM_INT);
    //Execution de la requete
    $requete->execute();
      $ligne = $requete->fetchAll();
      $requete->closeCursor();
      return $ligne;
  }
}

  function layData($data)
  {
    $i=0;
    $entete_str = '<table border="1">
    <thead>
    <tr>
    <th>id</th>
    <th>Noms et Pr&eacute;noms</th>
    <th>Nombre d\'UV</th>
    </tr>
    </thead><tbody>';
    $foot_str = '</tbody><table>';
    $table_str = '';
   foreach ($data as $value) {
    
        $debutLigne = '<tr>';
        $ligne1 = '<td>'.$value['id'].'</td>';
        $ligne2 = '<td>'.$value['nom_et_prenom'].'</td>';
        $ligne3 = '<td>'.$value['nombre_uv'].'</td>';
        $finLigne = '</tr>';
        $table_str .= $debutLigne.$ligne1.$ligne2.$ligne3.$finLigne;
    }
    $dat = $entete_str.$table_str.$foot_str;
    return $dat;
  }













?>