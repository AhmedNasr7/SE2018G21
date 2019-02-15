

<div class="container mt-5 pt-5">

    <?php foreach($drs as $dr): ?>

    <div class="card my-3">
        <div class="card-body">
        
            <div class="card-title"> <a href="./dr.php?v=view&drid=<?= $dr['id'] ?>"> <?= $dr['first_name'] . ' ' . $dr['last_name'] ?></a> </div>
            <p> <?= $dr['usermail'] ?> </p>
        
        </div>

    </div>

<?php endforeach; ?>

</div>