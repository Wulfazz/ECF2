function makeMove(joueur, cible, action) {
    fetch('controls/executeAction.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `action=${action}&joueur=${joueur}&cible=${cible}`
    })
    .then(response => response.json())
    .then(data => {
        // Mettez à jour l'interface utilisateur avec les nouvelles données
        document.getElementById('viesJ1').textContent = data.pvJoueur; // Ajustez selon l'ID approprié
        document.getElementById('viesJ2').textContent = data.pvCible; // Ajustez selon l'ID approprié
    })
    .catch(error => console.error('Error:', error));
}