<?php
class DB {

    private $pdo;
    
    public function __construct($host, $dbname, $username, $password) {

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
        
        $this->pdo = new PDO($dsn, $username, $password);
    }

    public function getData($query, $perPage = 10) {
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $perPage;

        // Get total count
        $countQuery = $this->pdo->query("SELECT COUNT(*) FROM ($query) AS countQuery");
        $totalCount = $countQuery->fetchColumn();

        // Fetch paginated data
        $query .= " LIMIT $offset, $perPage";
        $stmt = $this->pdo->query($query);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Create pagination object
        $pagination = new stdClass();
        $pagination->currentPage = $page;
        $pagination->perPage = $perPage;
        $pagination->totalPages = ceil($totalCount / $perPage);
        $pagination->totalCount = $totalCount;

        return [
            'data' => $data,
            'pagination' => $pagination
        ];
    }
}