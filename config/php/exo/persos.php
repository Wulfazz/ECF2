<?php

//Base pour Personnage

class Personnage {
    //Pv de base
    public $pv = 100;
    //Nom du Personnage
    public $nom;

    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    public function getpv() {
        return $this->pv;
    }

    public function setpv($dmg) {
        $this->pv -= round($dmg);
        if ($this->pv < 0) {
            $this->pv = 0;
        }
    }

    //Compétence attaqueBasique
    public function attaqueBasique(Personnage $cible) {

    }

    //Compétence attaque spéciale
    public function competenceSpeciale(Personnage $cible) {

    }
}

// Les classes en rapport avec les Personnages 

class Combattant extends Personnage{

    public function attaqueBasique(Personnage $cible) {
        $dmg = 10;
        $cible->setpv($dmg);
        echo "{$this->nom} inflige $dmg dégâts à {$cible->nom} avec une attaque basique.\n";
    }

    public function competenceSpeciale(Personnage $cible) {
        $dmg = 20;
        $cible->setpv($dmg);
        echo "{$this->nom} utilise sa compétence spéciale pour infliger $dmg dégâts à {$cible->nom}.\n";
    }

}

class Tirreur extends Personnage{

    public function attaqueBasique(Personnage $cible) {
        $dmg = 8;
        $cible->setpv($dmg);
        echo "{$this->nom} tire sur {$cible->nom} pour $dmg dégâts.\n";
    }

    public function competenceSpeciale(Personnage $cible) {
        $dmg = 18;
        $cible->setpv($dmg);
        echo "{$this->nom} exécute un tir de précision sur {$cible->nom} pour $dmg dégâts.\n";
    }

}

class Support extends Personnage{

    public function attaqueBasique(Personnage $cible) {
        $soin = 10;
        $this->pv += $soin;
        echo "{$this->nom} se soigne de $soin PV.\n";
    }

    public function competenceSpeciale(Personnage $cible) {
        $soin = 25;
        $this->pv += $soin;
        echo "{$this->nom} utilise une compétence spéciale pour se soigner de $soin PV.\n";
    }

}

class Mage extends Personnage{

    public function attaqueBasique(Personnage $cible) {
        $dmg = 12;
        $cible->setpv($dmg);
        echo "{$this->nom} lance un sort mineur sur {$cible->nom} pour $dmg dégâts.\n";
    }

    public function competenceSpeciale(Personnage $cible) {
        $dmg = 25; 
        $cible->setpv($dmg);
        echo "{$this->nom} déchaîne sa puissance magique sur {$cible->nom} pour $dmg dégâts.\n";
    }

}

?>