<?php
$title = "Hem";
include("includes/mainmenu.php");
?>

    <div class="container">
    <h1>
<span style="color:#FFCCFF; text-shadow: 0px 0px 8px rgba(255,204,255,0.8);">M</span>
<span style="color:#FFB3E6; text-shadow: 0px 0px 8px rgba(255,179,230,0.8);">i</span>
<span style="color:#B3CCFF; text-shadow: 0px 0px 8px rgba(179,204,255,0.8);">n</span>
<span style="color:#B3FFCC; text-shadow: 0px 0px 8px rgba(179,255,204,0.8);">&nbsp;</span>
<span style="color:#FFCCE5; text-shadow: 0px 0px 8px rgba(255,204,229,0.8);">B</span>
<span style="color:#FFCCCC; text-shadow: 0px 0px 8px rgba(255,204,204,0.8);">u</span>
<span style="color:#FFFFB3; text-shadow: 0px 0px 8px rgba(255,255,179,0.8);">c</span>
<span style="color:#FFB3B3; text-shadow: 0px 0px 8px rgba(255,179,179,0.8);">k</span>
<span style="color:#B3E0FF; text-shadow: 0px 0px 8px rgba(179,224,255,0.8);">e</span>
<span style="color:#FFD1B3; text-shadow: 0px 0px 8px rgba(255,209,179,0.8);">t</span>
<span style="color:#B3FFFA; text-shadow: 0px 0px 8px rgba(179,255,250,0.8);">l</span>
<span style="color:#B3FFB3; text-shadow: 0px 0px 8px rgba(179,255,179,0.8);">i</span>
<span style="color:#FFE0B3; text-shadow: 0px 0px 8px rgba(255,224,179,0.8);">s</span>
<span style="color:#FFB3FF; text-shadow: 0px 0px 8px rgba(255,179,255,0.8);">t</span>
</h1>

    </div>

    <div class="gridContainer">

    <div class="bucketGrid"></div>
    <section class="bucketlistPrio1">
        <div><h2>1. Högsta prioritet</h2></div>
        <table>
            <tbody class="tablePrio1">
                <tr>
                    <td>Hej</td>
                    <td>Hej</td>
                    <td>Hejh</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="bucketlistPrio2">
    <div><h2>2. Medlhög prioritet</h2></div>
        <table>
            <tbody class="tablePrio2">
            </tbody>
        </table>
    </section>

    <section class="bucketlistPrio3">        
        <div><h2>3. Låg prioritet</h2></div>
        <table>
            <tbody class="tablePrio3">
            </tbody>
        </table>
    </section>

    <!-----------------Bucketlist Form------------------->
    <form method="POST" action="databas" class="bucketform">
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
        <input type="submit" value="Spara" class="submitBtn">
    </form>

    </div>

<?php
include("includes/footer.php");
?>