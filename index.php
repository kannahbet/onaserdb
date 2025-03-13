<?php require("navi.php"); ?>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <div class='papa'>
  <aside>
    <button type="button"><a href="list.php">Listing</a></button>
  </aside>
  </div>
  <div  class="baf">
    <form class='container' name="collecter" action="validation.php" method='POST'>
    <h1 id="message">Collecte d'information</h1> 
		<small id="smallMessage">Incident</small>
  <label>
    Lieu :
    <input type="text" name="lieu"  />
  </label> <br>
  <label>
    Date :
    <input type="date" name="date"  />
  </label><br>
  <label>
    Nombre de morts :
    <input type="number" name="morts" />
  </label> <br>
  <label>
    Nombre de bléssés :
    <input type="number" name="blesse"  />
  </label> <br>
  <label>
    collision :
    <select name="collision" id="col"  >
  
  <option value="">--Please choose an option--</option>
  <option value="véhicules-Installation">véhicules-Installation</option>
  <option value="Gros-porteur_Moto">Gros-porteur_Moto</option>
  <option value="Gros-porteur-Piétons">Gros-porteur-Piétons</option>
  <option value="Gros-porteur-installation">Gros-porteur-installation</option>
  <option value="Gros-porteur-véhicules">Gros-porteur-véhicules</option>
  <option value="Bus-véhicules">Bus-véhicules</option>
  <option value="Bus-moto">Bus-moto</option>
  <option value="Bus-installation">Bus-installation</option>
  <option value="Bus-piétons">Bus-piétons</option>
  <option value="véhicules-moto">véhicules-moto</option>
  <option value="véhicules-Piétons">véhicules-Piétons</option>
  <option value="véhicules-Installation">véhicules-Installation</option>
  <option value="Moto-pietons">Moto-pietons</option>
  <option value="Moto-installation">Moto-installation</option>
  
</select>

  </label> <br>
  <label>
    Lien de publication :
    <input type="text" name="lien"  />
  </label><br>

  <input type="submit" value="Envoyer"  />
</form>
</div>

<footer>

</footer>
</div>
</body>
</html>