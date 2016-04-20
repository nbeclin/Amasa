<?php
class Stat_all extends Model {
    

    public function __construct(){
        parent::__construct();
    }

    public function load_all(){
        $results = array();

        $date = null;
        $nb_visitor = 0;
        $nb_page = 0;

        foreach($this->selectAll('stat', '*', null, 'ORDER BY date DESC') as $stat){
            if ($stat['date'] == $date) {
                $nb_visitor++;
                $nb_page = $nb_page + $stat['nb_page'];
            }
            else {
                if ($date != null){
                    array_push($results, array( 'date' => $this->date_conversion_fr($date),
                                            'nb_visitor' => $nb_visitor,
                                            'nb_page' => $nb_page,
                                            'average_page' => round($nb_page/$nb_visitor, 2, PHP_ROUND_HALF_UP)
                                    ));
                }
                $nb_visitor = 1;
                $nb_page = $stat['nb_page'];
                $date = $stat['date'];
            }
        }

        return $results;
    }

    public function register($ip){
        $results = array();

        foreach($this->selectAll('stat', '*', array('ip' => $ip, 'date' => date('Y-m-d'))) as $stat){
            array_push($results, new Stat($stat));
        }

        if (empty($results)){
            $this->insertOne('stat', array('nb_page' => '1', 'ip' => $ip, 'date' => date('Y-m-d')));
        } else {
            $this->update('stat', array('nb_page' => $results['0']->nb_page + 1), array('ip' => $ip, 'date' => date('Y-m-d')));
        }    
    }


    /** 
    * Function date_conversion_fr
    * @param $dateToConvert - datetime format
    * @return string - fr date format 
    */
    private function date_conversion_fr($dateToConvert){
        $date = new DateTime($dateToConvert);
            return $date->format('d/m/Y');
    }

}