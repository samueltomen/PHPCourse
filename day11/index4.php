<pre>
<?php

// Manipuler du JSON en PHP
echo "<h1>Manipuler du JSON en PHP</h1>";


$filename = realpath(__DIR__ . "/dossier/data.json");
// Récupère le chemin absolu réel du fichier "data.json" dans le dossier "dossier".

$data = file_get_contents($filename);
// Lit le contenu du fichier "data.json" et le stocke dans la variable $data.

echo "<br>";

print_r(json_decode($data, true));
// Décode le contenu JSON dans la variable $data en tant qu'array PHP et l'affiche avec print_r().

echo "<br>";

$arr = json_decode($data, true);
// Décode à nouveau le contenu JSON dans $data en tant qu'array PHP et le stocke dans la variable $arr.

print_r($arr);
// Affiche le contenu de l'array $arr avec print_r().

echo "<br>";

$json = json_encode($arr);
// Encode l'array $arr en JSON et le stocke dans la variable $json.

echo "<br>";

file_put_contents(__DIR__ . "/dossier/data2.json", $json);
// Écrit le contenu JSON encodé dans $json dans un nouveau fichier "data2.json" dans le dossier "dossier".

// Le contrôle de l'affichage
echo "<h1>Le contrôle de l'affichage</h1>";

// ob_start();
// Démarre la mise en tampon de sortie. Les sorties écho et print sont mises en tampon au lieu d'être envoyées directement.

// echo "Hello";
// Affiche "Hello", mais en raison de l'utilisation de la mise en tampon de sortie, le texte est stocké en mémoire plutôt que d'être immédiatement affiché à l'écran.

// $content = ob_get_contents();
// Récupère le contenu mis en tampon depuis le début jusqu'à présent et le stocke dans la variable $content.

// ob_flush();
// Vide le tampon de sortie et envoie son contenu. Dans ce cas, "Hello" est envoyé à l'écran.

// ob_end_clean();
// Efface le contenu mis en tampon sans l'envoyer. Le texte "Hello" est supprimé sans être affiché.

// ob_end_flush();
// Envoie le contenu restant mis en tampon et désactive la mise en tampon de sortie. Ici, "Hello" est affiché car le tampon est vidé et désactivé.

// echo $content;
// Affiche le contenu récupéré du tampon (dans ce cas, "Hello").

ob_start();
// Démarre la mise en tampon de sortie. Les sorties écho et print sont mises en tampon au lieu d'être envoyées directement.

require './page1.php';
// Inclut le contenu de "page1.php" dans le tampon de sortie. Le contenu de "page1.php" est stocké dans la variable $content.

$content = ob_get_contents();
// Récupère le contenu mis en tampon depuis le début jusqu'à présent (contenu de "page1.php") et le stocke dans la variable $content.

ob_end_clean();
// Efface le contenu mis en tampon sans l'envoyer à l'écran. Le contenu de "page1.php" est supprimé sans être affiché.

require './layout.php';
// Inclut le contenu de "layout.php". Le contenu de "page1.php" est ignoré car il a été effacé précédemment. Le contenu de "layout.php" est envoyé à l'écran.


?>
</pre>