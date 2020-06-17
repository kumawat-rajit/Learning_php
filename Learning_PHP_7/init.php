
<?php
use Bookstore\Domain\Book;
use Bookstore\Domain\Customer;
use Bookstore\Domain\Customer\Basic;
use Bookstore\Domain\Customer\Premium;

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
createBasicCustomer(1);
createBasicCustomer(-1);
createBasicCustomer(55);
//function checkIfValid(Customer $customer, array $books): bool {
//return $customer->getAmountToBorrow() >= count($books);

?>