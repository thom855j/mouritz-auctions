<div class="container">
    <table class="table table-striped" border='1'>

        <tr>
            <th>Nr.</th>
            <th>Title</th>
            <th>Start</th>
            <th>End</th>
            <th>Description</th>
            <th>Start Price</th>
            <th>Buy Price</th>
            <th>Category</th>
            <th>User</th>
            <th>Image</th>
        </tr>

        <?php
        $nr = 1;
        if (!empty($data->auctions)) {
            foreach ($data->auctions as $auction) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                echo "<td>$auction->title</td>";
                echo "<td>$auction->start_date</td>";
                echo "<td>$auction->end_date</td>";
                echo "<td>$auction->description</td>";
                echo "<td>$auction->start_price</td>";
                echo "<td>$auction->buy_price</td>";
                echo "<td>$auction->category</td>";
                echo "<td>$auction->user</td>";
                echo "<td>$auction->image</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>