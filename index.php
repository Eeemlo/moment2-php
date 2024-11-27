<?php
$title = "Hem";
include("includes/mainmenu.php");
?>

<!--index.php heading-->
<h1>
    <span style="color:#FFB3B3; text-shadow: 0px 0px 8px rgba(255,179,179,0.8);">M</span>
    <span style="color:#B3FFB3; text-shadow: 0px 0px 8px rgba(179,255,179,0.8);">o</span>
    <span style="color:#FFD1B3; text-shadow: 0px 0px 8px rgba(255,209,179,0.8);">m</span>
    <span style="color:#FFCCE5; text-shadow: 0px 0px 8px rgba(255,204,229,0.8);">e</span>
    <span style="color:#FFB3FF; text-shadow: 0px 0px 8px rgba(255,179,255,0.8);">n</span>
    <span style="color:#B3E0FF; text-shadow: 0px 0px 8px rgba(179,224,255,0.8);">t</span>
    <span style="color:#FFFFB3; text-shadow: 0px 0px 8px rgba(255,255,179,0.8);">2</span>
    <span style="color:#FFCCFF; text-shadow: 0px 0px 8px rgba(255,204,255,0.8);">-</span>
    <span style="color:#B3CCFF; text-shadow: 0px 0px 8px rgba(179,204,255,0.8);">D</span>
    <span style="color:#FFCCCC; text-shadow: 0px 0px 8px rgba(255,204,204,0.8);">T</span>
    <span style="color:#B3FFCC; text-shadow: 0px 0px 8px rgba(179,255,204,0.8);">2</span>
    <span style="color:#FFE0B3; text-shadow: 0px 0px 8px rgba(255,224,179,0.8);">0</span>
    <span style="color:#FFB3E6; text-shadow: 0px 0px 8px rgba(255,179,230,0.8);">9</span>
    <span style="color:#B3FFFA; text-shadow: 0px 0px 8px rgba(179,255,250,0.8);">G</span>
</h1>

<!--Aboput the assignment-->
<section class="aboutAssignment">
    <h2>Om uppgiften</h2>
    <p>Målet med uppgiften var att utveckla en webbplats i PHP som inkluderar en interaktiv bucketlist. På denna
        webbplats ska användare kunna lägga till och ta bort aktiviteter, vilka lagras i en MySQL-databas. Aktiviteterna
        i bucketlisten ska visa följande information: </p>
    <ul class="pUl">
        <li class="pLi">aktivitetens namn.</li>
        <li class="pLi">en beskrivning av aktiviteten.</li>
        <li class="pLi">datum för när aktiviteten lades
            till.</li>
        <li class="pLi">aktivitetens prioriteringsordning.</li>
    </ul>
    <p>Detta ska presenteras på webbplatsen på ett strukturerat och användarvänligt
        sätt.</p>
</section>

<!--My reflections-->
<section class="reflections">
    <h2>Mina reflektioner kring PHP</h2>
    <p>Jag hade höga förväntningar på PHP som programmeringsspråk, men känner att dessa inte riktigt har infriats. Jag
        upplever att det blir rörigt att blanda PHP-kod med HTML, vilket gör koden svårare att följa. Dessutom tycker
        jag att det är mer utmanande att manipulera DOM-element med PHP jämfört med exempelvis JavaScript. Å andra sidan
        har PHP varit ganska användbart när det gäller att skapa databasanslutningar, vilket har varit en positiv
        upplevelse. Trots detta ligger nog JavaScript högre i kurs för mig än PHP, åtminstone så här långt.</p>
</section>



<?php
include("includes/footer.php");
?>