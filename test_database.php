<?php
// Teste de conexão com banco de dados
require_once __DIR__ . "/../config/database.php";

echo "Testando conexão com banco de dados...\n";

try {
    // Teste 1: Verificar se consegue conectar
    echo "✓ Conexão estabelecida\n";
    
    // Teste 2: Verificar se a tabela usuarios existe
    $stmt = $pdo->query("SHOW TABLES LIKE 'usuarios'");
    $table_exists = $stmt->fetch();
    
    if ($table_exists) {
        echo "✓ Tabela 'usuarios' existe\n";
        
        // Teste 3: Contar usuários
        $stmt = $pdo->query("SELECT COUNT(*) as total FROM usuarios");
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "✓ Total de usuários: " . $count['total'] . "\n";
        
        // Teste 4: Listar alguns usuários
        $stmt = $pdo->query("SELECT id, nome, email, role FROM usuarios LIMIT 3");
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "✓ Usuários encontrados:\n";
        foreach ($usuarios as $usuario) {
            echo "  - ID: {$usuario['id']}, Nome: {$usuario['nome']}, Email: {$usuario['email']}, Role: {$usuario['role']}\n";
        }
        
    } else {
        echo "✗ Tabela 'usuarios' não existe\n";
    }
    
} catch (PDOException $e) {
    echo "✗ Erro: " . $e->getMessage() . "\n";
}
?>
