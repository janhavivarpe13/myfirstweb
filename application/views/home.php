<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/demo/assets/css/style.css">
    <title>RegisterPG</title>
    <style>
        
    </style>
</head>
<body>
    <div class="Container">
        <?php if($this->session->flashdata("status")): ?>
        <div class="alert alert-success" >
            <?= $this->session->flashdata("status"); ?>
        </div>
        <?php endif; ?>   
    <form method="POST" action="<?php echo base_url('home');?>" enctype="multipart/form-data">
    <h1>Registration Form</h1>
        <div class="content" >
            <div class="input-box">
                <label>Enter FirstName *</label>
                <input type="text" name="Fname" value="<?php echo set_value('Fname'); ?>" placeholder="FirstName">
                <small><?php echo form_error('Fname'); ?></small>
            </div>
            
            <div class="input-box">
            <label>Enter LastName *</label>
            <input type="text" name="Lname" value="<?php echo set_value('Lname'); ?>" placeholder="LastName">
            <small><?php echo form_error('Lname'); ?></small>
            </div>
        
            <div class="input-box">
                <label>Select BirthDate *</label>
                <input type="date" name="birthday" value="<?php echo set_value('birthday'); ?>" placeholder="Birthday"> 
                <small><?php echo form_error('birthday'); ?></small>
            </div>
            <div class="input-box">
                <label>Enter Email-Id *</label>
                <input type="email" name="email" value="<?php echo set_value('email'); ?>"  placeholder="Email-id" > 
                <small><?php echo form_error('email'); ?></small>
            </div>
            
            <div class="input-box">
                <label>Enter Password *</label>
                <input type="password" name="password" placeholder="password">
                <small><?php echo form_error('password'); ?></small>
            </div>
           
            <div class="input-box">
                <label>Confirm Password *</label>
                <input type="password" name="cpassword" placeholder="Confirm-password">
                <small><?php echo form_error('cpassword'); ?></small>
            </div>
            
            <span class="gender-title" >Gender *</span>
            <div class="gender-category">
                <input type="radio" name="gender" value="Male"<?php echo set_radio('gender', 'Male');?> >
                <label for="male">Male</label>
                <input type="radio" name="gender" value="Female" <?php echo set_radio('gender', 'Female');?>>
                <label for="female">Female</label>
                <input type="radio" name="gender" value="Other" <?php echo set_radio('gender', 'Other');?>>
                <label for="other">Other</label>
                <small><?php echo form_error('gender'); ?></small>
            </div>

            <div class="input-box">
                <label>Profile Picture *</label>
                <input type="file" name="profilepic">
                <small><?php if(isset($imageError)) {echo $imageError;} ?></small>
            </div>
            
        </div>
        <div class="button-container" >
                <button>Register</button> 
            </div>
    </form>      
    </div>
    
    
   
    
</body>
</html>