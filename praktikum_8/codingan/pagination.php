<?php
require_once __DIR__.'/../koneksi.php';

function paginate(string $countSql, array $params = [], int $per_page = 5): array {
  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  if ($page < 1) { $page = 1; }
  $row = db_fetch_one($countSql, $params);
  $total_data = (int)($row['c'] ?? 0);
  $total_page = max(1, (int)ceil($total_data / $per_page));
  if ($page > $total_page) { $page = $total_page; }
  $start = ($page - 1) * $per_page;
  return [
    'page' => $page,
    'per_page' => $per_page,
    'total_page' => $total_page,
    'total_data' => $total_data,
    'start' => $start,
  ];
}

function pagination_links(string $base_url, int $page, int $total_page): string {
  $html = '';
  if ($total_page > 1) {
    if ($page > 1) { $prev = $page - 1; $html .= '<a class="btn outline" href="'.$base_url.'page='.$prev.'">Prev</a> '; }
    for ($i = max(1, $page - 2); $i < $page; $i++) { $html .= '<a class="btn outline" href="'.$base_url.'page='.$i.'">'.$i.'</a> '; }
    $html .= '<span class="btn" style="pointer-events:none">'.$page.'</span> ';
    for ($i = $page + 1; $i <= min($total_page, $page + 2); $i++) { $html .= '<a class="btn outline" href="'.$base_url.'page='.$i.'">'.$i.'</a> '; }
    if ($page < $total_page) { $next = $page + 1; $html .= '<a class="btn outline" href="'.$base_url.'page='.$next.'">Next</a>'; }
  }
  return $html;
}
?>
