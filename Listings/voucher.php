public static function create(PDO $pdo, int $userId, int $discountPercent, ?DateTimeImmutable $expires = null): array {
    $code = self::generateCode(24);
    $stmt = $pdo->prepare(
        'INSERT INTO vouchers (user_id, code, discount_percent, expires_at) VALUES (?, ?, ?, ?)'
    );
    $stmt->execute([$userId, $code, $discountPercent, $expires?->format('Y-m-d H:i:s')]);
    return ['id' => (int)$pdo->lastInsertId(), 'code' => $code];
}