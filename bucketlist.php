<?php
$title = 'Hem';
include('includes/mainmenu.php');

//Instansiera ett nytt bucketlist objekt
$bucketlist = new Bucketlist(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Om delete knapp är tryckt
    if (isset($_POST['delete'])) {
        // Hämta bucket-id från formuläret
        $bucketId = $_POST['bucket_id'];

        // Anropa deleteBucket-funktionen
        if ($bucketlist->deleteBucket($bucketId)) {
            echo "Bucket raderades!";
        } else {
            echo "Fel vid radering av bucket.";
        }
    }
    // Annars, om det är en formulär för att lägga till en bucket
    elseif (
        isset($_POST['name'], $_POST['description'], $_POST['priority']) &&
        !empty($_POST['name']) &&
        !empty($_POST['description']) &&
        !empty($_POST['priority'])
    ) {
        // Hämta värden från formuläret
        $name = $_POST['name'];
        $description = $_POST['description'];
        $priority = $_POST['priority']; // Vi kontrollerar att detta inte är null

        // Lägg till bucket i databasen
        $result = $bucketlist->addBucket($name, $description, $priority);

        if ($result) {
            echo "Bucket added successfully!";
            header('Location: ' . $_SERVER['PHP_SELF']); // Omdirigera för att förhindra formuläråterställning
            exit;
        } else {
            echo "Failed to add bucket.";
        }
    } else {
        echo "Please fill in all fields!";
    }
}
?>

?>

<div class='container'>
    <h1>
        <span style='color:#FFCCFF; text-shadow: 0px 0px 8px rgba(255,204,255,0.8);'>M</span>
        <span style='color:#FFB3E6; text-shadow: 0px 0px 8px rgba(255,179,230,0.8);'>i</span>
        <span style='color:#B3CCFF; text-shadow: 0px 0px 8px rgba(179,204,255,0.8);'>n</span>
        <span style='color:#B3FFCC; text-shadow: 0px 0px 8px rgba(179,255,204,0.8);'>&nbsp;
        </span>
        <span style='color:#FFCCE5; text-shadow: 0px 0px 8px rgba(255,204,229,0.8);'>B</span>
        <span style='color:#FFCCCC; text-shadow: 0px 0px 8px rgba(255,204,204,0.8);'>u</span>
        <span style='color:#FFFFB3; text-shadow: 0px 0px 8px rgba(255,255,179,0.8);'>c</span>
        <span style='color:#FFB3B3; text-shadow: 0px 0px 8px rgba(255,179,179,0.8);'>k</span>
        <span style='color:#B3E0FF; text-shadow: 0px 0px 8px rgba(179,224,255,0.8);'>e</span>
        <span style='color:#FFD1B3; text-shadow: 0px 0px 8px rgba(255,209,179,0.8);'>t</span>
        <span style='color:#B3FFFA; text-shadow: 0px 0px 8px rgba(179,255,250,0.8);'>l</span>
        <span style='color:#B3FFB3; text-shadow: 0px 0px 8px rgba(179,255,179,0.8);'>i</span>
        <span style='color:#FFE0B3; text-shadow: 0px 0px 8px rgba(255,224,179,0.8);'>s</span>
        <span style='color:#FFB3FF; text-shadow: 0px 0px 8px rgba(255,179,255,0.8);'>t</span>
    </h1>

</div>

<div class='gridContainer'>
    <?php
    $showModal = isset($_GET['showModal']) && $_GET['showModal'] == 'true';
    ?>

    <a href="?showModal=true" id="modalBtn" class="btn">Lägg till bucket</a>

    <div class='bucketGrid'></div>
    <section class='bucketlistPrio1'>
        <div>
            <h2>Högsta prioritet</h2>
        </div>
        <div>
            <?php
            $buckets = $bucketlist->getPrio1Buckets();

            foreach ($buckets as $bucket) {
                // Formatera created_at till endast datum (YYYY-MM-DD)
                $formattedDate = date('Y-m-d', strtotime($bucket['created_at']));

                echo "<article class='buckets'>
                    <strong>" . htmlspecialchars($bucket['name']) . "</strong>
                    <p class='pSmall'>Tillagd: " . htmlspecialchars($formattedDate) . "</p>
                    <p>" . htmlspecialchars($bucket['description']) . "</p>

                    <form method='POST' action='bucketlist.php'>
                        <input type='hidden' name='bucket_id' value='" . $bucket['id'] . "'>
                        <button type='submit' name='delete' class='btn' id='deleteBtn'>&times;</button>
                    </form>
                    </article>";
            }
            ?>
        </div>
    </section>

    <section class='bucketlistPrio2'>
        <div>
            <h2>Medelhög prioritet</h2>
        </div>
        <div>
            <?php
            $buckets = $bucketlist->getPrio2Buckets();

            foreach ($buckets as $bucket) {
                // Formatera created_at till endast datum (YYYY-MM-DD)
                $formattedDate = date('Y-m-d', strtotime($bucket['created_at']));

                echo "<article class='buckets'>
                    <strong>" . htmlspecialchars($bucket['name']) . "</strong>
                    <p class='pSmall'>Tillagd: " . htmlspecialchars($formattedDate) . "</p>
                    <p>" . htmlspecialchars($bucket['description']) . "</p>
                    
                    <form method='POST' action='bucketlist.php'>
                        <input type='hidden' name='bucket_id' value='" . $bucket['id'] . "'>
                        <button type='submit' name='delete' class='btn' id='deleteBtn'>&times;</button>
                    </form>
                    </article>";
            }

            ?>
        </div>
    </section>

    <section class='bucketlistPrio3'>
        <div>
            <h2>Låg prioritet</h2>
        </div>
        <div>
            <?php
            $buckets = $bucketlist->getPrio3Buckets();

            foreach ($buckets as $bucket) {
                // Formatera created_at till endast datum (YYYY-MM-DD)
                $formattedDate = date('Y-m-d', strtotime($bucket['created_at']));

                echo "<article class='buckets'>
                    <strong>" . htmlspecialchars($bucket['name']) . "</strong>
                    <p class='pSmall'>Tillagd: " . htmlspecialchars($formattedDate) . "</p>
                    <p>" . htmlspecialchars($bucket['description']) . "</p>

                    <form method='POST' action='bucketlist.php'>
                        <input type='hidden' name='bucket_id' value='" . $bucket['id'] . "'>
                        <button type='submit' name='delete' class='btn' id='deleteBtn'>&times;</button>
                    </form>
                    </article>";
            }

            ?>
        </div>
    </section>

    <!-----------------Bucketlist Form------------------->

    <div id="addBucketModal" class="modal" style="display: <?php echo $showModal ? 'block' : 'none'; ?>;">
        <div class="modalContent">
            <a class="close" href="?showModal=false">&times;</a>
            <h2>Lägg till bucket</h2>
            <form method='POST' action='bucketlist.php' class='bucketform'>
                <label for='name'>Aktivitet:</label>
                <input type='text' name='name' id='name' placeholder='Ange aktivitetens namn'>
                <label for='description'>Beskrivning:</label>
                <textarea rows='4' name='description' id='description'
                    placeholder='Beskriv vad du vill göra..'></textarea>
                <label for='priority'>Prioritet:</label>
                <select name='priority' id='priority' placeholder="Välj alternativ">
                    <option value="" selected disabled>Välj alternativ</option>
                    <option value='1'>1. Högsta prioritet</option>
                    <option value='2'>2. Medelhög prioritet</option>
                    <option value='3'>3. Låg prioritet</option>
                </select>
                <input type='submit' value='Lägg till' class='btn'>
            </form>
        </div>
    </div>


</div>

<?php
include('includes/footer.php');
?>