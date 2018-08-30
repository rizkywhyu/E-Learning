<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  
class excel{

function to_excel($dataAll, $filename) {
    header('Content-Disposition: attachment; filename='.$filename.'.xls');
    header('Content-type: application/force-download');
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: max-age=0');
    header('Pragma: public');
    echo '<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />';
    $h = array();
    foreach($dataAll->result_array() as $row){
        foreach($row as $key=>$val){
            if(!in_array($key, $h)){
                $h[] = $key;   
            }
        }
    }
    echo $filename;
    echo '<table><tr>';
    foreach($h as $key) {
        $key = ucwords($key);
        echo '<th>'.$key.'</th>';
    }
    echo '</tr>';

    foreach($dataAll->result_array() as $row){
        echo '<tr>';
        foreach($row as $val)
            echo '<td>'.$val.'</td>';    
    }
    echo '</tr>';
    echo '</table>'; 

}

function writeRow($val) {
    echo '<td>'.$val.'</td>';              
}

}
?>