<pre>

<?php
print_r($_POST);
?>
</pre>
<form action="index.php" method="POST">
    <div>
        <label for="firstname">FirstName</label><br>
        <input type="text" name="firstname" id="firstname">
    </div>
    <br>
    <div>
        <label for="date">Date</label><br>
        <input type="date" name="date" id="date">
    </div>
    <br>
    <div>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email">
    </div>
    <br>
    <div>
        <label for="male">Masculin</label>
        <input type="radio" name="sexe" id="male" value="male" required>
        <label for="female">Feminin</label>
        <input type="radio" name="sexe" id="female" value="female" required>
    </div>
    <br>
    <div>
        <label for="favorites">Favorite Newtork</label><br>
        <select name="favorites" id="favorites">
            <option value="wifi">Wifi</option>
            <option value="fibre">Fibre</option>
            <option value="4g">4G</option>

        </select>
    </div>
    <br>
    <div>
        <label for="cgu">Conditions générales d'utilisation</label><br>
        <input type="checkbox" name="cgu" id="cgu">
    </div>
    <br>
    <button>Submit</button>
</form>