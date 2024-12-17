<header class="<?php echo (isset($_SESSION['page']) && $_SESSION['page'] !== 'HOME') ? 'header2' : ''; ?>">
    <div class="justify-between">
        <a href="<?php echo BASE_URL; ?>">
            <img src="<?php echo BASE_URL; ?>img/logo.png" alt="Logo" class="hero-logo">
        </a>
        <div class="cart-container">
            <a href="#" class="cart-button">
                <img src="<?php echo BASE_URL; ?>img/cart.png" alt="cart">
                <span class="cart-count" data-count="0">0</span>
            </a>
        </div>
    </div>
    <div class="justify-between">
        <a href="<?php echo BASE_URL; ?>#produtos" class="poppins-regular produtos-txt">PRODUTOS</a>
        <button class="toggle-menu">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</header>
