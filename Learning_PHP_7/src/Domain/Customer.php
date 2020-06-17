<?php
namespace Bookstore\Domain;
abstract class Customer extends Person{
private $id;

private $email;

private static $lastId = 0;

public function __construct(
int $id,
string $firstname,
string $surname,
string $email
) {
if (empty($id )) {
$this->id = ++self::$lastId;
} else {
$this->id = $id;
if ($id > self::$lastId) {
self::$lastId = $id;
}
}
parent::__construct($firstname, $surname);
$this->email = $email;
}
public function getId(): id {
return $this->id;
}
public static function getLastId(): int {
return self::$lastId;
}
public function getEmail(): string {
return $this->email;
}
public function setEmail(string $email) {
	$this->email = $email;
}

abstract public function getMonthlyFee();
abstract public function getAmountToBorrow();
abstract public function getType();

}

