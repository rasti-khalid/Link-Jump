<?php include "connection.php";?>

<?php 

$code=rand(1000,9999);
?>
<style type="text/css">
    
input{
    margin-bottom: 10px;
font-size: 150%;
transition: 180ms box-shadow ease-in-out;
font-family: inherit;
    line-height:inherit;
    color:#2e3750;
    min-width:12em;
    
}    



::-webkit-input-placeholder {
   text-align: center;
}

:-moz-placeholder { /* Firefox 18- */
   text-align: center;  
}

::-moz-placeholder {  /* Firefox 19+ */
   text-align: center;  
}

:-ms-input-placeholder {  
   text-align: center; 
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}



.form-style-8{
    font-family: 'Open Sans Condensed', arial, sans;
    width: 750px;
    padding: 30px;
    background: #FFFFFF;
    margin: 50px auto;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
    -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
    -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);

}



.form-style-8 input[type="text"],

{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    display: block;
    width: 100%;
    padding: 7px;
    border: none;
    border-bottom: 1px solid #ddd;
    background: transparent;
    margin-bottom: 10px;
    font: 16px Arial, Helvetica, sans-serif;
    height: 45px;
}


}


</style>
<script type="text/javascript">
//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>

<a href="">
<img src="linkJump.png" height="500" width="500" style="display: block;
  margin-left: auto;
  margin-right: auto;" ></a>


<p style="text-align: center; font-size: 15px; margin-bottom: -30px; "><strong>Step 1:</strong> to access the link in another platform you have to paste the link in the link section and you will get a 4 degit code. </p><br>
<p style="text-align: center; font-size: 15px;  "><strong>Step 2:</strong> to access the link on the other platfrom pase the code in the code section</p>
<p style="text-align: center; font-size: 15px; ">you can save the code and use it for future uses!</p>



<div style="text-align: center; ">
<form action="index.php" class="form-style-8">
	<input type="text" name="link" placeholder="Enter the link" size="50">
	<input type="hidden" name="code" value="<?php echo $code; ?>">
	<br>

	<button name="submit" type="submit" class="button button1">Jump Link</button>


</form>
</div>

<div style="text-align: center;">
	<?php if(isset($_GET['submit'])){
		$code=$_GET["code"];
		$link=$_GET["link"];

		if (empty($link)) {
            ?>
             <p style="text-align: center; font-size: 30px;"> please enter a link</p>
            <?php
            
        }else{

		  $sql = "INSERT INTO links 
            (
            link, code 
            ) 
            VALUES 
            (
            '{$link}', '{$code}'
            )";
                if (mysqli_query($connection, $sql)) {
                    ?>
                    <h1><?php echo $code;  ?></h1>
                    <?php
                			

                }else
                {?>
                    <p style="text-align: center; font-size: 30px"> somethin went wrong, please try again!</p>
                <?php
                }
        }

	
} ?>
</div>



<div style="text-align: center; float: center;">
<form action="index.php" class="form-style-8">
	<input type="text" name="code" placeholder="Enter the code">
	<br>
	<button name="send-code" type="submit" class="button button1">Get Link</button>

</form>
</div>

<div>
	<?php if(isset($_GET['send-code'])){
		$code=$_GET["code"];
		
		 if (empty(!$code)) {

		$sql=mysqli_query($connection, "SELECT * FROM links WHERE code=$code ;");
        $code=mysqli_fetch_array($sql);
       
            
        
        $link= $code['link'];
?>

		<a href="<?php echo $link; ?>" target="_blank"><p style="text-align: center; font-size: 30px;">
  
<?php
            echo $link;
	
}else{
    ?>
    <p style="text-align: center; font-size: 30px;"> you have to enter the code!</p>
    <?php
} 

}

?>
</p></a>
</div>




