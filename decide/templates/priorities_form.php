<div>

    <table class="table table-striped">
    
        <thead>
            <tr>
                <th>Rank</th>
                <th>Priority</th>
            </tr>
        </thead>
        
        <tbody>
        
            <?php foreach ($positions as $position): ?>

                <tr>
                    
                        <td><?= $position["rank"] ?></td>
                        <td><?= $position["priority"] ?></td>
                    
                </tr>

            <? endforeach ?>
            

        </tbody>

    </table>
    
    <div>
        <a href="registration.php">Edit Priorities</a>
    </div>

</div>

