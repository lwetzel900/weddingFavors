<?php
$basedir = dirname(__DIR__);
$basedir = explode("\\", $basedir);
$basedir = array_pop($basedir);
//array_pop(explode("\\", dirname(__DIR__))) 
?>
<!DOCTYPE html>
<html>    
    <!-- the head section -->
    <head>
        <title>Summerstar Creations</title>
        <link href="/<?php echo htmlspecialchars($basedir)?>/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <!-- the body section -->
    <body>
        <header>
            <img src="/<?php echo htmlspecialchars($basedir) ?>/images/SummerstarCreationsLogo.jpg" alt="Kissing Heart">
            <p>Planning, Decorating and Everything Wedding</p>
        </header>
        <nav id="navbar">
            <ul>
                <?php if (empty($_SESSION['user'])): ?>
                    <li><a href="/<?php echo htmlspecialchars($basedir) ?>">Home</a></li>
                    <li><a href="/<?php echo htmlspecialchars($basedir) ?>/user/?action=visitorShow">Visitor</a></li>
                    <li><a href="/<?php echo htmlspecialchars($basedir) ?>/store">Store</a></li>
                    <li class="admin"><a href="/<?php echo htmlspecialchars($basedir) ?>/user">Login</a></li>
                    <li class="admin"><a href="/<?php echo htmlspecialchars($basedir) ?>/user/?action=register">Register</a></li>
                <?php elseif (isset($_SESSION['user']['userRole']) == 1): ?>
                    <li><a href="/<?php echo htmlspecialchars($basedir) ?>/admin/?action=adminWork">Home</a></li>
                    <li><a href="/<?php echo htmlspecialchars($basedir) ?>/store">Manage Store</a></li>
                    <li><a href="/<?php echo htmlspecialchars($basedir) ?>/admin/?action=venueUpdate">Update Venue</a></li>
                    <li><a href="/<?php echo htmlspecialchars($basedir) ?>/admin/?action=servicesUpdate">Update Service</a></li>
                    <li><a href="/<?php echo htmlspecialchars($basedir) ?>/admin/?action=userUpdate">Manage User</a></li>
                    <li><a href="/<?php echo htmlspecialchars($basedir) ?>/admin/?action=productAdd">Add Product</a></li>
                    <li class="admin"><a href="/<?php echo htmlspecialchars($basedir) ?>/user/?action=logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="/<?php echo htmlspecialchars($basedir) ?>/user/?action=userProfile">Home</a></li>
                    <li><a href="/<?php echo htmlspecialchars($basedir) ?>/user/?action=showOptions">Choose Options</a></li>
                    <li><a href="/<?php echo htmlspecialchars($basedir) ?>/store">Store</a></li>
                    <li class="admin"><a href="/<?php echo htmlspecialchars($basedir) ?>/user/?action=logout">Logout</a></li>
                    <?PHP endif; ?> 
            </ul>
        </nav>    