<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *{
    font-family: sans-serif;
    box-sizing: border-box;
}
body{
    
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: linear-gradient(#f069b3,#ac9ed4);
    
}
.Container{
    position: absolute;
    top: 50%;
    left: 45%;
    transform: translate(-50%, -50%);
    max-width: 1000px;
    padding: 28px;
    margin: 0 28px;
    border-radius: 10px;
    overflow:hidden;
    background: rgb(0,0,0,0.2);
    box-shadow: 0 15px 20px rgba(0,0,0,0.6);
}
h1{
    font-size: 26px;
    font-weight: bold;
    text-align: left;
    color: #fff;
    padding-bottom: 8px;
    border-bottom: 1px solid silver;
}
.input-box input{
    height: 40px;
    width: 95%;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
}
.button-container{
    margin: 15px 0;
}
.button-container button{
    width: 100%;
    margin-top: 10px;
    padding: 10px;
    display: block;
    font-size: 20px;
    color: #fff;
    border: none;
    border-radius: 5px;
    background-image: linear-gradient(to right,#aa076b,#61045f);
    cursor:pointer;
    transition: 0.3s;
}
.button-container button:hover{
    background-image: linear-gradient(to right,#61045f,#aa076b);
}


    </style>
</head>
<body>
          
<div class="Container"> 
<?php if($this->session->flashdata("status")): ?>
        <div class="alert alert-success" >
            <?= $this->session->flashdata("status"); ?>
        </div>
        <?php endif; ?> 
<form method="POST" action="<?php echo base_url('login'); ?>">
    <h1>Login</h1>
    <div class="content" >
        <div class="input-box">
            <label>Enter Email-Id:</label>
            <input type="email" name="email" placeholder="Email-id" > 
            <small><?php echo form_error('email'); ?></small>
        </div><br>
        <div class="input-box">
            <label>Enter Password:</label>
            <input type="password" name="password" placeholder="password"> 
            <small><?php echo form_error('password'); ?></small>
        </div>
    </div>
        <div class="button-container" >
            <button>Login</button> 
        </div>
  </div>
  </form>
  </div>

</body>
</html>