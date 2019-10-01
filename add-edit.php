<div class="container">
    <div class="col-xs-6">
    <?php 
        if(!empty($success_msg)){
            echo '<div class="alert alert-success">'.$success_msg.'</div>';
        }elseif(!empty($error_msg)){
            echo '<div class="alert alert-danger">'.$error_msg.'</div>';
        }
    ?>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Employee Details <a href="http://localhost/Code/Employee" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="http://localhost/Code/Employee/savedata" class="form">
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" name="name" placeholder="First Name" ><?php echo !empty($employeem['name'])?$employeem['name']:''; ?>
                            <?php echo form_error('name','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="last">Last Name</label>
                            <input type="text" class="form-control" name="last" placeholder="Last Name" ><?php echo !empty($post['last'])?$post['last']:''; ?>
                            <?php echo form_error('last','<p class="text-danger">','</p>'); ?>
                        </div>
                        


                        <div class="form-group">
                            <label for="email">Enter Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email"><?php echo !empty($post['email'])?$post['email']:''; ?>
                            <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="text" name="dob" class="form-control" placeholder="Date of Birth"><?php echo !empty($post['dob'])?$post['dob']:''; ?>
                            <?php echo form_error('dob','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="department"> Enter Department</label>
                            <input type="text"  name="department" class="form-control" placeholder="Department"><?php echo !empty($post['department'])?$post['department']:''; ?>
                            <?php echo form_error('department','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="text"  name="contact" class="form-control" placeholder="Contact"><?php echo !empty($post['contact'])?$post['contact']:''; ?>
                            <?php echo form_error('contact','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Address"><?php echo !empty($post['address'])?$post['address']:''; ?>
                            <?php echo form_error('address','<p class="text-danger">','</p>'); ?>
                        </div>
                          
                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>