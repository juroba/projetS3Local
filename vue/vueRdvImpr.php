
<?php
session_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>

    <body>
      <table border="1">
        <tr>
          <td>Heure de rdv</td>
          <td>Nom</td>
          <td>Prénom</td>
        </tr>
      <?php
  					require_once "../config/config.php";
            $ID = $_SESSION['id'];
            $jour = date('Y-m-d');
  					try {
  							$chaine = "mysql:host=".HOST.";dbname=".BD.";charset=UTF8";
  							$db = new PDO($chaine,LOGIN,PASSWORD);
  							$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  					} catch (PDOException $e) {
  							throw new PDOException("Erreur de connexion");
  					}
  						$sql_get_location = "SELECT * FROM rdv where jour = ? AND idpracticien = (select id from utilisateurs where mail = ?);";
  						$sth = $db->prepare($sql_get_location);
              $sth->bindParam(1, $jour);
              $sth->bindParam(2, $ID);
  						$sth->execute();
  						$reponse = $sth->fetchAll(PDO::FETCH_ASSOC);

              foreach( $reponse as $value ){
                echo '<tr>' .'<td>' . $value['horaire'] . '</td><td>' . $value['nomPa'] . '</td><td>' . $value['prenomPa'] . '</td></tr>';
              }
  				?>
      </table>
    </body>
</html>
