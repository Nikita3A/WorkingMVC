    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error):?>
                <div> <?php echo $error ?> </div>
            <?php endforeach;?>    
        </div>
    <?php endif; ?>    
    
    <form method = "post">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name = "name" class="form-control" value="<?php echo $birthday['name']?>">
        </div>

        <div class="mb-3">
            <label>Date </label>
            <input type="date" name = "date" id="birthdayDate" value="<?php echo $birthday['date']?>">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

  </body>
</html>
