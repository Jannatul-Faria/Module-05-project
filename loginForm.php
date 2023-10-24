<?php 
session_start();
 
 $email=$_POST['email']?? "";
 $password=$_POST['password']?? "";
 
  // echo $email;
  // echo $password;

 
 $fp=fopen("./data.txt","r");
 
 $roles=array();
 $passwords=array();
 $emails=array();
 $names=array();
 $ids=array();
  
 
 while($line=fgets($fp)){
   $values=explode(",",$line);// roal,email,password
 
    array_push($roles,trim($values[0]));
    array_push($passwords,trim($values[1]));
    array_push($emails,trim($values[2]));
    array_push($names,trim($values[3]));
    array_push($ids,trim($values[4]));
  }
 fclose($fp);
// echo var_dump($emails);
// echo var_dump($passwords);
 
  for($i=0; $i < count($roles); $i++){
    if($email== $emails[$i] && $password== $passwords[$i]){
       $_SESSION["role"]=$roles[$i];
       $_SESSION["email"]=$emails[$i];
       $_SESSION["password"]=$passwords[$i];
       $_SESSION["name"]=$names[$i];
       $_SESSION["id"]=$ids[$i];
      
          header("Location: index.php");
     }else{
         $errormessage="INVALID EMAIL OR PASSWORD";
       }

  }
 
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="login_form">
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
              <div class="w-full bg-blue-100 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                  <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                      <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                          Login to your account
                      </h1>
                        <form action="loginForm.php" method="POST" class="space-y-4 md:space-y-6" >
                          <div>
                              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                              <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                          </div>
                          <div>
                              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                              <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                          </div>
                          <div class="flex items-center justify-between">
                              <div class="flex items-start">
                                  <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                                  </div>
                                  <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                  </div>
                              </div>
                              <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                          </div>
                          <div class="error text-warning text-center text-red-500">
                            <?php echo $errormessage; ?>
                          </div>
                          <button type="submit" class="w-full text-blue-600 bg-white hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                          <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                              Don’t have an account yet? <a href="registerForm.php" class="font-medium text-blue-600 hover:underline dark:text-primary-500">register here</a>
                          </p>
                        </form>
                  </div>
              </div>
          </div>
        </section>
    </div>

</body>
</html>