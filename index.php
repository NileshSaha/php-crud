<?php 
require "includes/overall/header.php";
require "classes/Route.php";
require "core/functions.php";
?>
    <h1>Students</h1>
    <?php
    $listOfPages=[
        'add',
        'update',
        'view',
        'delete'
    ];
    ?>
    <ul>
        <?php
        foreach($listOfPages as $page){
            ?>
            <li>
                <a href='?action=<?php echo $page ?>'><?php echo $page ?></a>
            </li>
            <?php
        }
        ?>
    </ul>
<?php
    $route = new Route($_GET);
    $route->setPages($listOfPages);
    $route->page();
    ?>

<?php require "includes/overall/footer.php"; ?>
