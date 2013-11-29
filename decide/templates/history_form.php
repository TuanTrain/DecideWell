<div>

    <table class="table table-striped">

        <thead>
            <tr>
                <th>Transaction</th>
                <th>Date/Time</th>
                <th>Symbol</th>
                <th>Shares</th>
                <th>Price</th>
            </tr>
        </thead>
        
            <?php foreach ($historys as $history): ?>

                <tr>
                    
                        <td><?= $history["transaction"] ?></td>
                        <td><?= $history["time"] ?></td>
                        <td><?= strtoupper($history["symbol"]) ?></td>
                        <td><?= $history["shares"] ?></td>
                        <td><?= $history["price"] ?></td>
                    
                </tr>

            <? endforeach ?>
            

        </tbody>

    </table>

</div>
