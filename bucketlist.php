<?php
$title = "Hem";
include("includes/mainmenu.php");
?>

    <div class="container">
        <h1>Min bucketlist</h1>
        <p>Lite text...</p>

    </div>

    <!-----------------Bucketlist Form------------------->
    <form method="POST" action="databas">
        <label for="name">Namn</label>
        <input type="text" name="name" id="name" placeholder="Ange ditt namn">
        <label for="description">Aktivitet:</label>
        <input type="text" name="description" id="description" placeholder="Vad vill du göra?">
        <label for="priority">Prioritet:</label>
        <select name="priority" id="priority">
            <option value="1">1. Högsta prioritet</option>
            <option value="2">2. Medelhög prioritet</option>
            <option value="3">3. Låg prioritet</option>
        </select>
        <input type="submit" value="Skicka">
    </form>

<?php
include("includes/footer.php");
?>