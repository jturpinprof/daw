<?php
/**
 * index.php - Main blog page that includes all components
 */

// Include header
include 'header.php';

// Include navigation
include 'nav.php';

// Require datos.php to load articles
require_once 'datos.php';
?>

<div class="container">
    <h2 style="color: #333; margin-top: 30px;">Artículos Recientes</h2>
    
    <?php
    // Check if articles array exists and has content
    if (!empty($articulos)) {
        // Filter by category if provided
        $filterCategory = isset($_GET['cat']) ? $_GET['cat'] : null;
        
        // Display articles
        $foundAny = false;
        foreach ($articulos as $articulo) {
            // Skip if filtering by category and this article doesn't match
            if ($filterCategory && $articulo['category'] !== $filterCategory) {
                continue;
            }
            $foundAny = true;
            ?>
            <div class="article">
                <span class="category"><?php echo htmlspecialchars($articulo['category']); ?></span>
                <h2><?php echo htmlspecialchars($articulo['title']); ?></h2>
                <p><?php echo htmlspecialchars($articulo['content']); ?></p>
                <small style="color: #666;">ID: <?php echo htmlspecialchars($articulo['id']); ?></small>
            </div>
            <?php
        }
        
        // Show message if no articles found for the category
        if ($filterCategory && !$foundAny) {
            echo '<p style="text-align: center; color: #666;">No se encontraron artículos en esta categoría.</p>';
        }
    } else {
        echo '<p style="text-align: center; color: #666;">No hay artículos disponibles.</p>';
    }
    ?>
</div>

<?php
// Include footer
include 'footer.php';
?>
