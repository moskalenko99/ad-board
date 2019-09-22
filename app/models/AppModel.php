<?php


namespace app\models;

use ad\base\Model;
use ad\DB;
use ad\TSingletone;

class AppModel extends Model
{
    use TSingletone;

    /**
     * @var TSingletone
     */
    private $db;

    public function __construct()
    {
        $this->db = DB::instance();
    }

    public static function query() {
        return self::instance();
    }

    public function saveMessAd($title, $description, $photo, $name, $email, $phone_number)
    {
        $stmt = $this->db->pdo->prepare("INSERT INTO ad (title, description, photo, `name`, email, phone_number) VALUES (?,?,?,?,?,?)");
        $result = $stmt->execute([$title, $description, $photo, $name, $email, $phone_number]);
    }

    public function getMess($limit = 10)
    {
        $query = "SELECT * FROM ad ORDER BY id DESC LIMIT {$limit}";
        $res = $this->db->pdo->query($query);
        return $res->fetchAll();
    }

    public function getEmail(){
        $query = "SELECT id,email FROM ad GROUP BY email";
        $res = $this->db->pdo->query($query);
        $res = $res->fetchAll();
        return $res;
    }





}