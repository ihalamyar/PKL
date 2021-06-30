    <?php
    require_once __DIR__ . '/../../vendor/autoload.php';
    use App\database\Database;
    $db = Database::getInstance();
    $db_connection = $db->getConnection();
    $id = $_POST['id'];
    $query = "SELECT id, title, description,speaker,location, start_time, start_end  FROM event WHERE id = '" . $_POST["id"] . "'";
    $result = $db->select($query);
    $row = $result->fetch_array();
    echo json_encode($row);
