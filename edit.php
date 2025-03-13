<?php
require("db.classe.php");
require("navi.php");
// Vérifier si l'ID est présent dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Récupérer les données actuelles de l'entrée
    $sql = "SELECT * FROM onaserdb WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    
    if (!$data) {
        echo "<p>Entrée non trouvée.</p>";
        exit;
    }
} else {
    echo "<p>ID manquant.</p>";
    exit;
}

// Mise à jour des données si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lieu = $_POST['lieu'];
    $date = $_POST['date'];
    $morts = intval($_POST['morts']);
    $blesse = intval($_POST['blesse']);
    $collision = $_POST['collision'];
    $lien = $_POST['lien'];
    
    $sql = "UPDATE onaserdb SET Lieu=?, date=?, morts=?, blesse=?, collision=?, lien=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiissi", $lieu, $date, $morts, $blesse, $collision, $lien, $id);
    
    if ($stmt->execute()) {
        header("Location:list.php");
    } else {
        echo "<p>Erreur lors de la mise à jour.</p>";
    }
}
?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <div class='papa'>
  <aside>
    <button type="button"><a href="list.php">Listing</a></button>
  </aside>
  </div>
    <div class="container mt-5">
        <h2>Modifier l'entrée</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Lieu</label>
                <input type="text" name="lieu" class="form-control" value="<?php echo htmlspecialchars($data['Lieu']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control" value="<?php echo htmlspecialchars($data['date']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Morts</label>
                <input type="number" name="morts" class="form-control" value="<?php echo htmlspecialchars($data['morts']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Blessés</label>
                <input type="number" name="blesse" class="form-control" value="<?php echo htmlspecialchars($data['blesse']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Collision</label>
                <input type="text" name="collision" class="form-control" value="<?php echo htmlspecialchars($data['collision']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Lien</label>
                <input type="text" name="lien" class="form-control" value="<?php echo htmlspecialchars($data['lien']); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="list.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>
