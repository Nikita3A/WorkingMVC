<h1>Birthdays</h1>
    <div style="display: inline-block;"> <a href="birthday_view/addBirthday" class="btn btn-success" > Add Birthday </a> </div>

    <form style="display: inline-block;"> 
        <input type="hidden" name="thisMonth" value="<?php echo date('m')?>">   
        <button type="submit" class="btn btn-success">This month</button> 
    </form>

    <table class="table">
        <thead>
            <tr> 
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($birthdays as $i => $birthday) { ?>
            <tr>
                <th scope="row"><?php echo $i+1?></th>
                <td> <?php echo $birthday['name']?> </td>
                <td> <?php echo $birthday['date']?> </td>
                <td>
                    <a href="/birthday_view/change?id=<?php echo $birthday['id']?>" type="button" class="btn btn-outline-success">Change</a>
                    
                    <form style="display: inline-block" method="post" action="/birthday_view/delete">  
                        <input type="hidden" name="id" value="<?php echo $birthday['id']?>">   
                        <button type="submit" class="btn btn-outline-danger">Delete</button> 
                    </form>
                </td>
            </tr>
        <?php } ?>
            
        </tbody>
    </table>