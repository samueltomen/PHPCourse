<pre>
    <?php
    class User
    {

        function __construct(public $name, public $age)
        {
            echo 'construct called';
        }
        function __destruct()
        {
            echo 'destructed called';
        }
    }

    class Reader
    {
        public $handle;

        function __construct(public $filename)
        {
            $this->handle = fopen($filename, 'r');
            echo 'construct called';
        }

        function read()
        {
            echo fread($this->handle, 10);
        }

        function __destruct()
        {
            fclose($this->handle);
            echo 'destructed called';
        }
    }

    $reader = new Reader(__DIR__ . '/text.txt');
    $reader->read();


    // $user = new User('Jean', 12);
    // $user2 = new User('Sarah', 44);



    ?>
</pre>