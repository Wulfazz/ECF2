<?php

class Personnage {
    public $nom;
    public $image;
    public $normalAttack;
    public $specialAttack;

    public function __construct($nom, $image, $normalAttack, $specialAttack) {
        $this->nom = $nom;
        $this->image = $image;
        $this->normalAttack = $normalAttack;
        $this->specialAttack = $specialAttack;
    }

    public function attack() {
        return $this->normalAttack;
    }

    public function special() {
        return $this->specialAttack;
    }
}

class Game {
    public $personnages;
    public $gameState;

    public function __construct() {
        $this->initGame();
    }

    public function initGame() {
        // Assurez-vous d'initialiser correctement l'état du jeu et les personnages ici
        $this->personnages = [
            'J1' => [
                'bruno' => new Personnage('Bruno', 'bruno.png', 1, 2),
                'estes' => new Personnage('Estes', 'estes.png', 1, 3),
                'cecilion' => new Personnage('Cecilion', 'cecilion.png', 2, 4),
                'balmond' => new Personnage('Balmond', 'balmond.png', 2, 3),
            ],
            'J2' => [
                'melissa' => new Personnage('Melissa', 'melissa.png', 1, 2),
                'angela' => new Personnage('Angela', 'angela.png', 1, 3),
                'vexana' => new Personnage('Vexana', 'vexana.png', 2, 4),
                'cici' => new Personnage('Cici', 'cici.png', 2, 3),
            ]
        ];

        $this->gameState = [
            'viesJ1' => 10,
            'viesJ2' => 10,
            'currentPlayer' => 'J1',
            'gameOver' => false,
        ];
    }

    public function applyAction($player, $personnageType, $actionType) {
        if ($this->gameState['gameOver']) {
            return;
        }

        $opponent = ($player === 'J1') ? 'J2' : 'J1';
        $damage = $this->personnages[$player][$personnageType]->{$actionType}();
        
        $this->gameState['vies'.$opponent] -= $damage;
        if ($this->gameState['vies'.$opponent] <= 0) {
            $this->gameState['gameOver'] = true;
            $this->gameState['winner'] = $player; 
        }
        echo json_encode($this->gameState);
    }
}

$game = new Game();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['player'], $input['personnageType'], $input['actionType'])) {
        // Appliquez l'action et récupérez l'état de jeu à jour
        $updatedState = $game->applyAction($input['player'], $input['personnageType'], $input['actionType']);
        // Renvoyez l'état de jeu à jour en tant que réponse JSON
        header('Content-Type: application/json');
        echo json_encode($updatedState);
    } else {
        // Gestion d'erreur si les données nécessaires ne sont pas présentes
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Missing required fields']);
    }
    exit;
}

?>

<div class="centerDiv" id="game">
    <div id="status">
        
        <div class="joueur1 joueur">
            <div class="actions">
                <h2>Joueur 1</h2>
                <div>Player 1 Lives: <span id="viesJ1">10</span>
                    <div class="personnage">
                    <h3>Tirreur</h3>
                        <div class="personnage">
                            <img src="exo/img/bruno.png" alt="Bruno">
                        </div>
                        <div class="actions">
                            <button onclick="makeMove('J1', 'bruno', 'attack')">Attaque normale</button>
                            <button onclick="makeMove('J1', 'bruno', 'special')">Attaque spéciale</button>
                        </div>
                    <div class="personnage">
                        <h3>Support</h3>

                            <button onclick="makeMove('J1', 'estes', 'attack')">Attaque normale</button>
                            <button onclick="makeMove('J1', 'estes', 'special')">Attaque spéciale</button>
                    </div>
                    <div class="personnage">
                        <h3>Mage</h3>

                            <button onclick="makeMove('J1', 'cecilion', 'attack')">Attaque normale</button>
                            <button onclick="makeMove('J1', 'cecilion', 'special')">Attaque spéciale</button>
                    </div>
                    <div class="personnage">
                        <h3>Combattant</h3>

                            <button onclick="makeMove('J1', 'balmond', 'attack')">Attaque normale</button>
                            <button onclick="makeMove('J1', 'balmond', 'special')">Attaque spéciale</button>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="joueur2 joueur">
            <div class="actions">
                <h2>Joueur 2</h2>
                <div>Player 2 Lives: <span id="viesJ2">10</span>
                    <h3>Tirreur</h3>              
                        <button onclick="makeMove('J1', 'melissa', 'attack')">Attaque normale</button>
                        <button onclick="makeMove('J1', 'melissa', 'special')">Attaque spéciale</button>
                    <h3>Support</h3>

                        <button onclick="makeMove('J1', 'angela', 'attack')">Attaque normale</button>
                        <button onclick="makeMove('J1', 'angela', 'special')">Attaque spéciale</button>
                    <h3>Mage</h3>

                        <button onclick="makeMove('J1', 'vexana', 'attack')">Attaque normale</button>
                        <button onclick="makeMove('J1', 'vexana', 'special')">Attaque spéciale</button>
                    <h3>Combattant</h3>

                        <button onclick="makeMove('J1', 'cici', 'attack')">Attaque normale</button>
                        <button onclick="makeMove('J1', 'cici', 'special')">Attaque spéciale</button>
                </div>
            </div>
        </div>
    </div>
</div>    

<script>
    function makeMove(player, character, action) {
        const data = {
            player: player,
            personnageType: character,
            actionType: action
        };

        fetch('5vs5.php', { // Assurez-vous que ce chemin est correct
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(updatedState => {
            updateGameState(updatedState);
        })
        .catch(error => console.error('Error:', error));
    }

    function updateGameState(gameState) {
        document.getElementById('viesJ1').textContent = gameState['viesJ1'];
        document.getElementById('viesJ2').textContent = gameState['viesJ2'];

        if (gameState.gameOver) {
            const winner = gameState.winner === 'J1' ? 'Joueur 1' : 'Joueur 2';
            alert(`Le jeu est terminé. ${winner} a gagné !`);
        }
    }

</script>

