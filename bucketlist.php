<?php
$title = 'Hem';
include('includes/mainmenu.php');

/*Initialize a new bucketlist objct*/
$bucketlist = new Bucketlist();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /*Check if delete button is activated*/
    if (isset($_POST['delete'])) {
        // Get bucket ID from form checkbox
        $bucketId = $_POST['bucket_id'];

        // Call deleteBucket method
        if ($bucketlist->deleteBucket($bucketId)) {
            echo "Bucket raderades!";
        } else {
            echo "Fel vid radering av bucket.";
        }
    }

    /*Else, if the add new bucket-button is active*/ elseif (
        isset($_POST['name'], $_POST['description'], $_POST['priority']) &&
        !empty($_POST['name']) &&
        !empty($_POST['description']) &&
        !empty($_POST['priority'])
    ) {
        // Get values from form
        $name = $_POST['name'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];

        // Lägg till bucket i databasen
        $result = $bucketlist->addBucket($name, $description, $priority);

        if ($result) {
            echo "Bucket added successfully!";
            header('Location: ' . $_SERVER['PHP_SELF']); // Redirect to prevent form to reset
            exit;
        } else {
            echo "Failed to add bucket.";
        }
    } else {
        echo "Please fill in all fields!";
    }
}
?>

<!--Bucketlist page header-->
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

<!--container to hold content-->
<div class='gridContainer'>

    <!--PHP to check if showModal is set to true-->
    <?php
    $showModal = isset($_GET['showModal']) && $_GET['showModal'] == 'true';
    ?>

    <!--Button to show modal-->
    <a href="?showModal=true" id="modalBtn" class="btn">Lägg till bucket</a>

    <!--Container to place bucketlist-->
    <div class='bucketGrid'></div>
    <section class='bucketlistPrio1'>
        <div>
            <h2>Högsta prioritet</h2>
        </div>
        <div>
            <!--PHP to get prio 1 buckets-->
            <?php
            $buckets = $bucketlist->getPrio1Buckets();

            //Loop through buckets
            foreach ($buckets as $bucket) {
                // Remove time from datetime
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
            <!--PHP to get prio 2 buckets-->
            <?php
            $buckets = $bucketlist->getPrio2Buckets();

            //Loop through buckets
            foreach ($buckets as $bucket) {
                // Remove time from datetime
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
            <!--PHP to get prio 3 buckets-->
            <?php
            $buckets = $bucketlist->getPrio3Buckets();

            //Loop through buckets
            foreach ($buckets as $bucket) {
                // Remove time to datetime
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