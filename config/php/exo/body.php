<?php

if (isset($_POST['action']) && isset($_POST['joueur']) && isset($_POST['cible'])) {
    $action = $_POST['action'];
    $joueur = $_SESSION['personnages'][$_POST['joueur']];
    $cible = $_SESSION['personnages'][$_POST['cible']];

    // Traiter l'action
    switch ($action) {
        case 'attack':
            $joueur->attaqueBasique($cible);
        case 'special':
            $joueur->competenceSpeciale($cible);
    }

    // Renvoyer une réponse
    echo json_encode([
        'pvJoueur' => $joueur->getpv(),
        'pvCible' => $cible->getpv(),
        // Autres informations si nécessaire
    ]);
    exit;
}

?>

<div class="centerDiv" id="game">
    <div id="status">
        
        <div class="joueur1 joueur">
            <div class="actions">
                <h2>Joueur 1</h2>
                <div>Player 1 Lives: <span id="viesJ1">100</span>
                    <div class="personnage">

                        <h3>Tireur-Bruno</h3>
                            <img src="../img/bruno.png" alt="Bruno">
                            <div class="actions">
                                <button onclick="makeMove('J1', 'bruno', 'attack')">Attaque normale</button>
                                <button onclick="makeMove('J1', 'bruno', 'special')">Attaque spéciale</button>
                            </div>
                    
                        <h3>Support-Estes</h3>
                            <img src="../img/estes.png" alt="Estes">
                            <div class="actions">
                                <button onclick="makeMove('J1', 'estes', 'attack')">Attaque normale</button>
                                <button onclick="makeMove('J1', 'estes', 'special')">Attaque spéciale</button>
                            </div>
                    
                        <h3>Mage-Cécilion</h3>
                            <img src="../img/cecilion.png" alt="Cécilion">
                            <div class="actions">
                                <button onclick="makeMove('J1', 'cecilion', 'attack')">Attaque normale</button>
                                <button onclick="makeMove('J1', 'cecilion', 'special')">Attaque spéciale</button>
                            </div>
                    
                        <h3>Combattant-Balmond</h3>
                            <img src="../img/balmond.png" alt="Balmond">
                            <div class="actions">
                                <button onclick="makeMove('J1', 'balmond', 'attack')">Attaque normale</button>
                                <button onclick="makeMove('J1', 'balmond', 'special')">Attaque spéciale</button>
                            </div>

                    </div>
                </div>
            </div>
        </div>

        
        <div class="joueur2 joueur">
            <div class="actions">
                <h2>Joueur 2</h2>
                <div>Player 2 Lives: <span id="viesJ2">100</span>
                    <div class="personnage">

                        <h3>Tireuse-Melissa</h3>
                            <img src="../img/melissa.png" alt="Melissa">
                            <div class="actions">
                                <button onclick="makeMove('J1', 'melissa', 'attack')">Attaque normale</button>
                                <button onclick="makeMove('J1', 'melissa', 'special')">Attaque spéciale</button>
                            </div>

                        <h3>Support-Angela</h3>
                            <img src="../img/angela.png" alt="Angela">
                            <div class="actions">
                                <button onclick="makeMove('J1', 'angela', 'attack')">Attaque normale</button>
                                <button onclick="makeMove('J1', 'angela', 'special')">Attaque spéciale</button>
                            </div>

                        <h3>Mage-Vexana</h3>
                            <img src="../img/vexana.png" alt="Vexana">
                            <div class="actions">
                                <button onclick="makeMove('J1', 'vexana', 'attack')">Attaque normale</button>
                                <button onclick="makeMove('J1', 'vexana', 'special')">Attaque spéciale</button>
                            </div>

                        <h3>Combattante-Cici</h3>
                            <img src="../img/cici.png" alt="Cici">
                            <div class="actions">
                                <button onclick="makeMove('J1', 'cici', 'attack')">Attaque normale</button>
                                <button onclick="makeMove('J1', 'cici', 'special')">Attaque spéciale</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    

