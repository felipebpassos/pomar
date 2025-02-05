<?php

// Conexão com banco de dados
require_once '../Config.php';
$pool = getDatabasePool();
$conn = $pool->getConnection();

// Verifica logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . BASE_URL . 'adm');
    exit;
}

// Processa login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    if ($_POST['username'] === $LOGIN_USER && $_POST['password'] === $LOGIN_PASS) {
        $_SESSION['loggedin'] = true;
    } else {
        $error = 'Credenciais inválidas!';
    }
}

// Processa atualização de produtos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produtos']) && isset($_SESSION['loggedin'])) {
    foreach ($_POST['produtos'] as $id => $dados) {
        $id = (int) $conn->real_escape_string($id);
        $preco = (float) $dados['preco'];
        $disponivel = isset($dados['disponivel']) ? 1 : 0;

        $stmt = $conn->prepare("UPDATE produtos SET preco_unitario = ?, disponivel = ? WHERE id = ?");
        $stmt->bind_param("dii", $preco, $disponivel, $id);
        $stmt->execute();
        $stmt->close();
    }
}

// Busca produtos
$produtos = [];
$result = $conn->query("SELECT * FROM produtos ORDER BY categoria, nome");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
}

$pool->releaseConnection($conn);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pomar</title>
    <link rel="icon" href="../img/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <?php if (!isset($_SESSION['loggedin'])): ?>
        <!-- Formulário de Login -->
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Acesso Administrativo</h1>
                <?php if (isset($error)): ?>
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                <form method="post">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Usuário</label>
                        <input type="text" name="username" required
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
                        <input type="password" name="password" required
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <button type="submit" name="login"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                        Entrar
                    </button>
                </form>
            </div>
        </div>
    <?php else: ?>
        <!-- Interface de Administração -->
        <div class="container mx-auto px-4 py-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Edição de Produtos</h1>
                <a href="?logout" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                    Sair do Sistema
                </a>
            </div>

            <form method="post">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Produto</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Preço</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Disponível</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($produtos as $produto): ?>
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-900">
                                            <?= htmlspecialchars($produto['nome']) ?>
                                            <span class="ml-2 text-sm text-gray-500 font-normal">
                                                <?= htmlspecialchars($produto['descricao']) ?>
                                            </span>
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            <?= htmlspecialchars($produto['categoria']) ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="number" step="0.01" name="produtos[<?= (int) $produto['id'] ?>][preco]"
                                            value="<?= htmlspecialchars(number_format($produto['preco_unitario'], 2, '.', '')) ?>"
                                            class="w-32 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                    </td>
                                    <td class="px-6 py-4">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="produtos[<?= (int) $produto['id'] ?>][disponivel]"
                                                value="1" <?= $produto['disponivel'] ? 'checked' : '' ?>
                                                class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500">
                                        </label>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-6">
                    <button type="submit"
                        class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
                        Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    <?php endif; ?>
</body>

</html>