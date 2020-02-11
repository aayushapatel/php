<html>
    <head>
        <title></title>
    </head>
    
    <body>
    <form method="post">
        <h1>Welcome</h1>
        <p>Hello <?php echo htmlspecialchars($name); ?></p>
        <ul>
            <?php foreach ($colours as $color):?>
                <li><?php echo $color;?></li>
            <?php endforeach; ?>
        
        </ul>
    </form>
    </body>
</html>