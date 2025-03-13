<?php
require("db.classe.php"); // Inclusion de la connexion à la base de données

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sécurisation de l'ID

    // Requête de suppression
    $sql = "DELETE FROM onaserdb WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location:list.php");
    } else {
        echo "<script>alert('Erreur lors de la suppression'); window.location.href='index.php';</script>";
    }
    
    $stmt->close();
} else {
    echo "<script>alert('ID non spécifié'); window.location.href='index.php';</script>";
}

$conn->close();
?>