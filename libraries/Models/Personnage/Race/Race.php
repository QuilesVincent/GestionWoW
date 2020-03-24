<?php

namespace Models\Personnage\Race;



class Race extends \Models\Personnage\Player
{
    public $race;
    public $advantage = [];

    public function __construct($name, $sex, $race)
    {
        parent::__construct($name, $sex);
        $this->race = $race;
        switch($this->race) {
            case "undead":
                $this->advantage = array(
                    "Resist sort de l'ombre" => 1/5,
                    "volonte des Reprouve" => "Liberation de piège",
                    "canibalisme" => "Regeneration de vie en mangeant ton corps"
                );
            break;
            case "orc":
                $this->advantage = array(
                    "fureur sanguinaire" => 15,
                    "Robustesse, reduit le temps d'etourdissement" => 1/3,
                    "bonusPuissanceFamilier" => 1/3,
                );
                break;
            case "tauren":
                $this->advantage = array(
                    "bonus coups critique" => 1/5,
                    "bonus herboristerie" => 10,
                    "vie augmenté" => 1/10,
                    "resist au sort de la nature" => 1/5,
                    "choc martial" => "etourdi l'ennemi pendant 2 sec",
                );
                break;
            case "troll" :
                $this->advantage = array(
                    "berseker" => "Augmentation de la hate de 30%",
                    "déhanché de troll" => "Reduction de 30% des sorts ralentissant",
                    "santé" => "Recupère plus vite que la moyenne",
                    "chasseur" => "plus d'exp gagné à chaque bête tué",
                );
                break;
            case "gobelin":
                $this->advantage = array(
                    "bon en avant" => 15,
                    "degat avec lancement de roquette" => 8,
                    "hobgobelin" => "Accès à la banque en tout lieux",
                    "dur en affaire, prix bas de partout" => 1/10,
                    "bonus de hate" => 1/10,
                    "bonus alchimie" => 1/5,
                );
                break;
            case "pandaren":
                $this->advantage = array(
                    "Resiast sort ade l'omabre" => 1/5,
                    "voalonte des aeprouve" => "Liberation de piège",
                    "caanibalisme" => "Regeneration de vie en mangeant ton corps"
                );
                break;
            case "human":
                $this->advantage = array(
                    "Resistere sort de l'ombre" => 1/5,
                    "volonrerete des Reprouve" => "Liberation de piège",
                    "caniberrealisme" => "Regeneration de vie en mangeant ton corps"
                );
                break;
            case "dwarf":
                $this->advantage = array(
                    "Resist sort de l'ombre" => 1/5,
                    "volonte des Reprouverer" => "Liberation de piège",
                    "canibalisme" => "Regeneration de vie en mangeant ton corps"
                );
                break;
            case "nightElfe":
                $this->advantage = array(
                    "Resist sort de l'ombre" => 1/5,
                    "vorelonte des Reprouve" => "Liberation de piège",
                    "canibalismere" => "Regeneration de vie en mangeant ton corps"
                );
                break;
            case "gnome":
                $this->advantage = array(
                    "Resist sorert de l'ombre" => 1/5,
                    "volonte drees Reprouve" => "Liberation de piège",
                    "canibalisme" => "Regeneration de vie en mangeant ton corps"
                );
                break;
            case "draenei":
                $this->advantage = array(
                    "Resist wc de l'ombre" => 1/5,
                    "volontecxxc des Rxceprouve" => "Liberation de piège",
                    "canibalisme" => "Regeneration de vie en mangeant ton corps"
                );
                break;
            case "worgen":
                $this->advantage = array(
                    "Resist sort de l'owxccxmbre" => 1/5,
                    "volwxconte des Reprouve" => "Liberation de piège",
                    "canibalixcwcxwsme" => "Regeneration de vie en mangeant ton corps"
                );
                break;

        }
    }
    public function getRace()
    {
        return $this->race;
    }
    public function affichess()
    {
        foreach($this->advantage as $key => $valeur){
            echo "$key => $valeur\n";
        }
    }
    public function iterateVisible()
    {
        foreach ($this as $key => $value){
            if(is_array($value)){
                foreach($value as $keyValue => $valueValue){
                    echo "$keyValue => $valueValue\n";
                }
            }
            if(!is_array($value)){
                echo "$key => $value\n";
            }
        }
    }
}
