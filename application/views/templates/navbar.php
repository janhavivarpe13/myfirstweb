
<style>
    .navbar-nav {
        margin-left: 27cm;
    }
    
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <img src='images/logo/ebz.png' width="80" height="auto" class="d-inline-block align-top">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ">
      <li class="nav-item">
      <?php if(!$this->session->has_userdata('authenticated')) { ?>
          <a class="nav-link active" aria-current="page" href="<?= base_url('/') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('home') ?>">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('login') ?>">Login</a>
        </li>
        <?php }?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('dash') ?>">Dash</a>
        </li>

        <?php if($this->session->has_userdata('authenticated') == TRUE) { ?>
        <li class="nav-item">
        <?php $profilepic = $this->UserModel->get_profile($this->session->userdata('users_id')); ?>
        <img src="<?php echo base_url('images/' . $profilepic); ?>"alt="Profile Picture" class="rounded-circle" style="width: 32px; height: 32px;">
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php $usernames = $this->UserModel->get_user_info($this->session->userdata('users_id')); ?>
          <?php echo ucfirst($usernames['Fname']. ' '. $usernames['Lname']); ?>
          </a>
          
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
          </div>
        </li>
        
        <?php }?>
      </ul>
      
    </div>
  </div>
</nav>