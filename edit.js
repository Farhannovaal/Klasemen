function addMatch() {
    var matchBody = document.getElementById('matchTableBody');
    var newTable = document.createElement("tr");
    newTable.innerHTML = 
    `
    <td> <input type="text" name="team1[]" required></td>
    <td> <input type="text" name="team2[]" required></td>
    <td> <input type="number" name="scoreTeam1[]" required></td>
    <td> <input type="number" name="scoreTeam2[]" required></td>
    `;

    matchBody.appendChild(newTable);
}
    