    <?php
    require_once __DIR__ . '/../../vendor/autoload.php';
    use App\database\Database;
    $db = Database::getInstance();
    $db_connection = $db->getConnection();
    try {
        $id = $_POST['id'];
        $sql = "DELETE FROM courses WHERE id = " . $id;
        if ($db->getConnection()->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $db->error;
        }
    } catch (\Throwable $th) {
        echo 'Something went wrong' . $th->getMessage();
    }
