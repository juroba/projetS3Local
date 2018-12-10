
<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>

    <body>
      <?php
      $list = array(
        array('gkfjc','ezsfdvb','efsd'),
        array('rtdhg','dfv','gdfxv'),
        array('dvs','grsdht','efgrsgsd')
      );
      $handle1 = fopen('test2.csv','w');
      foreach ($list as $line) {
        fputcsv($handle1,$line);
      }

      fclose($handle1);

      $handle = fopen('test2.csv','r');

        $tableau = '<table border="1">';
        while(($contenu = fgetcsv($handle, 1024, ';')) != False) {
          $tableau .= '<tr>';
          foreach ($contenu as $row) {
            $valeuraAfficher = ($row != '') ? $row : '&nbsp;';
            $array = explode(',',$valeuraAfficher);
            $tableau .= '<td>' . $array[0] . '</td>' . '
                        <td>' . $array[1] . '</td>' . '
                        <td>' . $array[2] . '</td>';
          }
          $tableau .= '</tr>';
        }
        $tableau .= '</table>';

        fclose($handle);
        // Affiche le fichier sous forme de tableau (HTML)
        echo $tableau;
      ?>
    </div>
    </body>
</html>
