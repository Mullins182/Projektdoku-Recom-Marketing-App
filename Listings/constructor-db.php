class Database {
    private PDO $pdo;

    public function __construct() {
        $charset = $_ENV['DB_CHARSET'] ?? 'utf8mb4';
        $host = $_ENV['DB_HOST'] ?? 'localhost';
        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            $host,
            $_ENV['DB_PORT'] ?? '3306',
            $_ENV['DB_DATABASE'],
            $charset
        );
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $this->pdo = new PDO(
            $dsn,
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD'],
            $options
        );
    }
}

