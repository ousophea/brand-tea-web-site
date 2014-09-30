<h3>Summary</h3>
<table class="tablesorter" cellspacing="0"> 
    <thead> 
        <tr> 
            <th>Nº</th> 
            <th>Type</th> 
            <th>Number</th>
            <th>New</th> 
        </tr> 
    </thead> 
    <tbody> 
        <tr> 
            <td>1</td> 
            <td>Category</td> 
            <td><?php echo $categroyNumber ?></td> 
            <td><a href="<?php echo base_url() . "category/addnew/" ?>" class="button add">New</a></td> 
        </tr>
        <tr> 
            <td>2</td> 
            <td>Group</td> 
            <td><?php echo $groupNumber ?></td> 
            <td><a href="<?php echo base_url() . "group/addnew/" ?>" class="button add">New</a></td> 
        </tr>
        <tr> 
            <td>3</td> 
            <td>Products</td> 
            <td><?php echo $productNumber ?></td> 
            <td width="100"><a href="<?php echo base_url() . "product/addnew/" ?>" class="button add">New</a></td> 
        </tr> 
        <tr> 
            <td>4</td> 
            <td>Service</td> 
            <td><?php echo $serviceNumber ?></td> 
            <td><a href="<?php echo base_url() . "services/addnew/" ?>" class="button add">New</a></td> 
        </tr>
        <tr> 
            <td>5</td> 
            <td>Tea Knowledge</td> 
            <td><?php echo $teaNumber ?></td> 
            <td><a href="<?php echo base_url() . "tearelated/addnewtea/" ?>" class="button add">New</a></td> 
        </tr>
    </tbody> 
</table>