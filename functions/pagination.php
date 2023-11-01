<?php
function links($pagination) {
    if ($pagination->totalPages > 1) {
        ?>
        <nav aria-label="Page navigation">
            <ul class="pagination">
        
                <?php
                // Previous Link
                if ($pagination->currentPage > 1) {
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= ($pagination->currentPage - 1) ?>">prev</a>
                    </li>
                    <?php
                }
        
                // First Page
                if ($pagination->currentPage > 3) {
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=1">1</a>
                    </li>
                    <?php
                    if ($pagination->currentPage > 4) {
                        ?>
                        <li class="page-item">
                            <span class="page-link">...</span>
                        </li>
                        <?php
                    }
                }
        
                // Pages
                for ($i = max(1, $pagination->currentPage - 2); $i <= min($pagination->totalPages, $pagination->currentPage + 2); $i++) {
                    $activeClass = ($i == $pagination->currentPage) ? 'active' : '';
                    ?>
                    <li class="page-item <?= $activeClass ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php
                }
        
                // Last Page
                if ($pagination->currentPage < $pagination->totalPages - 2) {
                    if ($pagination->currentPage < $pagination->totalPages - 3) {
                        ?>
                        <li class="page-item">
                            <span class="page-link">...</span>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $pagination->totalPages ?>"><?= $pagination->totalPages ?></a>
                    </li>
                    <?php
                }
        
                // Next Link
                if ($pagination->currentPage < $pagination->totalPages) {
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= ($pagination->currentPage + 1) ?>">next</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </nav>
        <?php
    }
}
?>
