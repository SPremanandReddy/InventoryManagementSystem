 <?php
  session_start();
  if (!isset($_SESSION['user'])) header('location: login.php');
  $_SESSION['table'] = 'users';
  $user = $_SESSION['user'];
  $users = include('database/show-users.php');
  ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
   <title>Dashboard - Inventory Management System</title>
   <link rel="stylesheet" type="text/css" href="css/login.css" />
   <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
 </head>

 <body>
   <div id="dashboardMainContainer">
     <?php include('partials/app-sidebar.php') ?>
     <div class="dasboard_content_container" id="dasboard_content_container">
       <?php include('partials/app-topnav.php') ?>
       <div class="dashboard_content">

         <div class="dashboard_content_main">
           <div class="row">
             <div class="column column-5">
               <h1 class="section_header"><i class="fa fa-plus"></i>Create User</h1>
               <div id="userAddFormContainer">
                 <form action="database/add.php" method="POST" class="appForm">
                   <div class="appFormInputContainer">
                     <label for="first_name">First Name</label>
                     <input type="text" class="appFormInput" id="first_name" name="first_name" />
                   </div>
                   <div class="appFormInputContainer">
                     <label for="last_name">Last Name</label>
                     <input type="text" class="appFormInput" id="last_name" name="last_name" />
                   </div>
                   <div class="appFormInputContainer">
                     <label for="email">Email</label>
                     <input type="text" class="appFormInput" id="email" name="email" />
                   </div>
                   <div class="appFormInputContainer">
                     <label for="password">Password</label>
                     <input type="password" class="appFormInput" id="password" name="password" />
                   </div>
                   <!-- <input type="hidden" name="table" value="users"> -->
                   <button type="submit"><i class="fa fa-plus"></i> Add User</button>
                 </form>
                 <?php
                  if (isset($_SESSION['response'])) {
                    $response_message = $_SESSION['response']['message'];
                    $is_success = $_SESSION['response']['success'];
                  ?>
                   <div class="responseMessage">
                     <p class="<?= $is_success ? 'responseMessage_success' : 'responseMessage_error' ?>">
                       <?= $response_message ?>
                     </p>
                   </div>
                 <?php unset($_SESSION['response']);
                  } ?>

               </div>
             </div>
             <div class="column column-7">
               <h1 class="section_header"><i class="fa fa-plus"></i>List Of Users</h1>
               <div class="section_content">
                 <div class="users">

                   <table>
                     <thead>
                       <tr>
                         <th>#</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Email</th>
                         <th>Created At</th>
                         <th>Updated At</th>
                         <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php foreach ($users as  $index => $user) { ?>
                         <tr>
                           <td><?= $index + 1 ?></td>
                           <td><?= $user['first_name'] ?></td>
                           <td><?= $user['second_name'] ?></td>
                           <td><?= $user['email'] ?></td>

                           <td><?= date('M d,Y @ h:i:s A', strtotime($user['created_at'])) ?></td>
                           <td><?= date('M d,Y @ h:i:s A', strtotime($user['updated_at'])) ?></td>
                           <td>
                             <a href=""> <i class="fa fa-pencil"></i> Edit</a>
                             <a href="" class="deleteUser" data-userid="<?= $user['id'] ?>" data-fname="<?= $user['first_name'] ?>" data-lname="<?= $user['second_name'] ?>"> <i class="fa fa-trash"></i> Delete</a>
                           </td>
                         </tr>
                       <?php } ?>
                     </tbody>
                   </table>
                   <p class="userCount"><?= count($users) ?> Users </p>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   <script src="js/script.js"></script>
   <script src="js/jquery/jquery-3.7.1.js"></script>
   <script>
     function script() {
       this.initialize = function() {
           this.registerEvents();
         },
         this.registerEvents = function() {
           document.addEventListener('click', function(e) {
             targetElement = e.target;
             classList = targetElement.classList;
             if (classList.contains('deleteUser')) {
               e.preventDefault();
               userId = targetElement.dataset.userid;
               fname = targetElement.dataset.fname;
               Iname = targetElement.dataset.lname;
               fullName = fname + ' ' + Iname;
               if (window.confirm('Are you sure to delete ' + fullName + '?')) {
                 $.ajax({
                   method: 'POST',
                   data: {
                     user_id: userId,
                     f_name: fname,
                     l_name: lname
                   },
                   url: 'database\delete-user.php',
                   dataType: 'json',
                   success: function(data) {
                     if (data.success) {
                       if (window.confirm(data.message)) {
                         location.reload();
                       }
                     } else window.alert(data.message);
                     
                   }
                 })
               } else {
                 console.log('will not delete');
               }
             }
           });
         }
     }
     var script = new script;
     script.initialize();
   </script>
 </body>

 </html>