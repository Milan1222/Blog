<?php
    include 'header.php';
    include 'footer.php';
    include 'sidebar.php';
?>
<div class="single-comment">
    <ul>
        <li>
            <div>posted by:<strong><?php echo($comment['author']);?>
            </strong> on <?php echo($comment['created_at']);?></div>
            </div>
        </li>
    </ul>
</div>