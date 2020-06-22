
<?php
use Bookstore\Domain\Book;
use Bookstore\Domain\Customer;
use Bookstore\Domain\Customer\Basic;
use Bookstore\Domain\Customer\Premium;
use Bookstore\Domain\Customer\CustomerFactory;
use Bookstore\Utils\Config;
function autoloader($classname) {	
$lastSlash = strpos($classname, '\\') + 1;

$classname = substr($classname, $lastSlash);

$directory = str_replace('\\', '/', $classname);

$filename = __DIR__ . '/src/' . $directory . '.php';

require_once($filename);
}

spl_autoload_register('autoloader');
function createBasicCustomer(int $id)
{
try {
echo "\nTrying to create a new customer with id $id.\n";
return new Basic($id, "name", "surname", "email");
} catch (InvalidIdException $e) {
echo "You cannot provide a negative id.\n";
} catch (ExceededMaxAllowedException $e) {
echo "No more customers are allowed.\n";
} catch (Exception $e) {
echo "Unknown exception: " . $e->getMessage();
}
}
CustomerFactory::factory('basic', 2, 'mary', 'poppins', 'mary@poppins.
com');
CustomerFactory::factory('premium', 3, 'james', 'bond', 'james@
bond.com');


$dbConfig = Config::getInstance()->get('db');
$db = new PDO('mysql:host=127.0.0.1;dbname=bookstore',$dbConfig['user'],$dbConfig['password']);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = <<<SQL
INSERT INTO book (isbn, title, author, price)
VALUES (:isbn, :title, :author, :price)
SQL;
$statement = $db->prepare($query);
$params = [
'isbn' => '9781412108614',
'title' => 'Iliad',
'author' => 'Homer',
'price' => 9.25
];
$statement->execute($params);
echo $db->lastInsertId();
//function checkIfValid(Customer $customer, array $books): bool {
//return $customer->getAmountToBorrow() >= count($books);

?>