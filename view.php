<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Post Details <a href="<?php echo site_url('employees/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>First Name:</label>
                    <p><?php echo !empty($post['name'])?$post['name']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <p><?php echo !empty($post['last'])?$post['last']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <p><?php echo !empty($post['email'])?$post['email']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Date of Birth:</label>
                    <p><?php echo !empty($post['dob'])?$post['dob']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Department:</label>
                    <p><?php echo !empty($post['department'])?$post['department']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Contact:</label>
                    <p><?php echo !empty($post['contact'])?$post['contact']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <p><?php echo !empty($post['address '])?$post['address']:''; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>