<div class="menu invisible">
    <ul>
        <li class="<?= ($_SESSION['page'] === 'HOME') ? 'atual' : '' ?>"><span>Início</span></li>
        <li class="<?= ($_SESSION['page'] === 'EMPRESA') ? 'atual' : '' ?>"><span>A Empresa</span></li>
        <li class="<?= ($_SESSION['page'] === 'PRODUTOS') ? 'atual' : '' ?>"><span>Produtos</span></li>
        <li class="<?= ($_SESSION['page'] === 'PRODUCAO') ? 'atual' : '' ?>"><span>Fabricação</span></li>
        <li class="<?= ($_SESSION['page'] === 'RECEITAS') ? 'atual' : '' ?>"><span>Receitas</span></li>
        <li><span>Contato</span></li>
    </ul>
</div>