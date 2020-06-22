<?php
namespace Bookstore\Models;
use PDO;
abstract class AbstractModel {
protected $db;
public function __construct(PDO $db) {
	//var_dump($db);
$this->db = $db;
}
}
