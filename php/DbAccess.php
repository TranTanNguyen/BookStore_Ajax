<?php
class DbConnect
{
    const host = 'localhost';
    const user = 'root';
    const pass = '';
    const db = 'dbdoan';

    private $link;

    public function __construct()
    {
        $this->link = new mysqli(self::host, self::user, self::pass, self::db);
        if(mysqli_connect_errno())
            echo mysqli_connect_errno();
    }

    public function __destruct()
    {
        $this->link = NULL;
    }

    public function query($query)
    {
        return $this->link->query($query);
    }

    public function executeInsertBook($ten, $tacgia, $mota, $gia, $anh )
    {
    $query = "INSERT INTO tbsanpham (ten, tacgia, mota, gia, anh) VALUES (?,?,?,?,?)";

    $stmt = $this->link->prepare($query);

    $stmt -> bind_param('sssss',$ten, $tacgia, $mota, $gia, $anh);

    return $stmt->execute();
    }
}
?>
