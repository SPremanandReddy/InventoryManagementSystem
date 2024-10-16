<div class="dashboard_sidebar" id="dashboard_sidebar">
  <h3 class="dashboard_logo" id="dashboard_logo">IMS</h3>
  <div class="dashboard_sidebar_user">
    <img
      src="../InventoryManagementSystem/images/AiGeneratedLadyPicture.webp"
      alt="User image."
      id="userImage" />
    <span><?= $user["first_name"] . ' ' . $user["second_name"] ?></span>
  </div>
  <!-- <div class="dashboard_sidebar_menus">
    <ul class="dashboard_menu_lists">
    <li class="menuActive">
      <a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Dashboard</span></a>
    <li>
    <li class="menuActive">
      <a href=""><i class="fa fa-dashboard"></i> <span class="menuText">campaigns</span></a>
    <li>    
    <li class="menuActive"><a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Revenue Management</span></a>
    <li>    
    <li class="menuActive"><a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Accounts Receivable</span></a>
    <li>    
    <li class="menuActive"><a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Configuration</span></a>
    <li>    
    <li class="menuActive"><a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Stats</span></a>
    <li>

    </ul>
  </div> -->
  <div class="dashboard_sidebar_menus">
    <ul class="dashboard_menu_lists">
      <!-- class="menuActive" -->
      <li>
        <a href="./dashboard.php"><i class="fa fa-dashboard"></i> <span class="menuText">Dashboard</span></a>
      </li>
      <li>
        <a href="./users-add.php"><i class="fa fa-user-plus"></i> <span class="menuText">Add User</span></a>
      </li>
      <!-- <li>
        <a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Revenue Management</span></a>
      </li>
      <li>
        <a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Accounts Receivable</span></a>
      </li>
      <li>
        <a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Configuration</span></a>
      </li>
      <li>
        <a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Stats</span></a>
      </li>
    </ul> -->
  </div>

</div>