<div>

    <table class="table table-striped">
    
        <thead>
            <tr>
                <th>Symbol</th>
                <th>Name</th>
                <th>Shares</th>
                <th>Price</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        
            <?php foreach ($positions as $position): ?>

                <tr>
                    
                        <td><?= $position["symbol"] ?></td>
                        <td><?= $position["name"] ?></td>
                        <td><?= $position["shares"] ?></td>
                        <td><?= $position["price"] ?></td>
                        <td><?= $position["total"] ?></td>
                    
                </tr>

            <? endforeach ?>
                
                
            <tr>
                <td>CASH</td>
                <td></td><td></td><td></td>
                <td><?= $cash ?></td>
            </tr>
            

        </tbody>

    </table>

</div>

