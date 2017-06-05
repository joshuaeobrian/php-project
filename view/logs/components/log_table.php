<!--Displays the report table to the screen
    listing the information about page hits  -->
<div class="col s4">
    <fieldset>
        <legend>Success Logs</legend>

        <table class="striped">

            <thead>
            <tr>
                <th>Hit Count</th>
                <th>IP Address</th>
                <th>Location</th>
                <th></th>
            </tr>
            </thead>
            <!--Lists the total count of views-->
            <?php foreach($locationAndLogs as $location){

               ?>
                    <tr>
                        <!--  Displays hit count   -->
                        <td><?php echo count($location->logs);?></td>
                        <!-- Displays IP -->
                        <td class="ip-box"><?php echo $location->location->ip;?></td>
                        <td><?php echo $location->location->country_name;?></td>

                        <td><a href="#" class="view-details">View</a></td>
                    </tr>

                <?php
            }
            ?>
        </table>
    </fieldset>
</div>