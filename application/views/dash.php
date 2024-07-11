<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
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
.hero{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    align-items: center;
    justify-content: center;
}
.container{
    width: 500px;
    background: #fff;
    padding: 50px;
    border-radius: 15px;
    text-align: center;
    color: #333;
}
.container h1{
    font-weight: 500;
    color: #000;
}
.container img{
    width: 200px;
    border-radius: 100%;
    margin-top: 40px;
    margin-bottom: 40px;
    align-items: center;
    
}
.button{
    background-color: transparent;
    border: none;
    color: inherit;
    cursor: pointer;
    font-size: 16px;
    padding: 50px;
    text-align: center;
    display: inline-block;
    border-radius: 4px;
    align-items: center;
    

}
.logout-btn {
    background-color:white; 
    color: black;
    font-weight: bold;
   
}

.logout-btn:hover {
    background-color: palevioletred;
}
</style>
</head>
<body>


<div class="hero">

<div class="container">
<?php if($this->session->flashdata("status")): ?>
        <div class="alert alert-success" >
            <?= $this->session->flashdata("status"); ?>
        </div>
        <?php endif; ?> 
       
    <h1> <center>Welcome <?php echo ucfirst($_SESSION['Fname']) ?></center> </h1>
    
    
    <?php if (!empty($profilepic)): ?>
        
        <img src="<?php echo base_url('images/') . $profilepic; ?>" alt="Pofile Picture" width="200" height="200">
    <?php else: ?>
        <p>No profile picture here.</p>
    <?php endif; ?>

</div>
</div>

</body>
</html>
