<?php
// koneksi.php — koneksi MySQLi + helper functions
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sewa_dekorasii";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset('utf8mb4');

function db_types(array $params): string {
  $types = '';
  foreach ($params as $p) {
    if (is_int($p) || is_bool($p)) { $types .= 'i'; }
    elseif (is_float($p)) { $types .= 'd'; }
    else { $types .= 's'; }
  }
  return $types;
}

function db_execute(string $sql, array $params = []): void {
  global $conn;
  $stmt = $conn->prepare($sql);
  if ($params) { $types = db_types($params); $stmt->bind_param($types, ...$params); }
  $stmt->execute();
  $stmt->close();
}

function db_fetch_all(string $sql, array $params = []): array {
  global $conn;
  $stmt = $conn->prepare($sql);
  if ($params) { $types = db_types($params); $stmt->bind_param($types, ...$params); }
  $stmt->execute();
  $res = $stmt->get_result();
  $rows = $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
  $stmt->close();
  return $rows;
}

function db_fetch_one(string $sql, array $params = []): ?array {
  $rows = db_fetch_all($sql, $params);
  return $rows[0] ?? null;
}

function db_last_insert_id(): int {
  global $conn; return (int)$conn->insert_id;
}
?>
