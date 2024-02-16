<?php

//Base pour Joueur

class Joueur {
    //Pv de base
    public $pv = 100;
    //Nom du joueur
    public $nameJoueur;

    public function __construct(string $nameJoueur) {
        $this->nameJoueur = $nameJoueur;
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
    public function attaqueBasique(Joueur $cible) {

    }

    //Compétence attaque spéciale
    public function competenceSpeciale(Joueur $cible) {

    }
}

// Les classes en rapport avec les joueurs 

class Combattant extends Joueur{

    public function attaqueBasique(Joueur $cible) {
        $dmg = 10;
        $cible->setpv($dmg);
        echo "{$this->nameJoueur} inflige $dmg dégâts à {$cible->nameJoueur} avec une attaque basique.\n";
    }

    public function competenceSpeciale(Joueur $cible) {
        $dmg = 20;
        $cible->setpv($dmg);
        echo "{$this->nameJoueur} utilise sa compétence spéciale pour infliger $dmg dégâts à {$cible->nameJoueur}.\n";
    }

}

class Tirreur extends Joueur{

    public function attaqueBasique(Joueur $cible) {
        $dmg = 8;
        $cible->setpv($dmg);
        echo "{$this->nameJoueur} tire sur {$cible->nameJoueur} pour $dmg dégâts.\n";
    }

    public function competenceSpeciale(Joueur $cible) {
        $dmg = 18;
        $cible->setpv($dmg);
        echo "{$this->nameJoueur} exécute un tir de précision sur {$cible->nameJoueur} pour $dmg dégâts.\n";
    }

}

class Support extends Joueur{

    public function attaqueBasique(Joueur $cible) {
        $soin = 10;
        $this->pv += $soin;
        echo "{$this->nameJoueur} se soigne de $soin PV.\n";
    }

    public function competenceSpeciale(Joueur $cible) {
        $soin = 25;
        $this->pv += $soin;
        echo "{$this->nameJoueur} utilise une compétence spéciale pour se soigner de $soin PV.\n";
    }

}

class Mage extends Joueur{

    public function attaqueBasique(Joueur $cible) {
        $dmg = 12;
        $cible->setpv($dmg);
        echo "{$this->nameJoueur} lance un sort mineur sur {$cible->nameJoueur} pour $dmg dégâts.\n";
    }

    public function competenceSpeciale(Joueur $cible) {
        $dmg = 25; 
        $cible->setpv($dmg);
        echo "{$this->nameJoueur} déchaîne sa puissance magique sur {$cible->nameJoueur} pour $dmg dégâts.\n";
    }

}

?>