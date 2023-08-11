<pre>
<?php

class MyCustomErrorException extends Exception
{
}

function test()
{
    throw new MyCustomErrorException();
}
try {
    test();
} catch (MyCustomErrorException $e) {
    echo "over";
} catch (Exception $e) {
    header('Location: /error.php');
}
?>
</pre>