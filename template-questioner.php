<?php 
/* Template Name: Template Form Questioner */
get_header(); ?>
<?php
/////////////////////////////////////////////////////////////////////////////////
// - set variables!
/*$reg_numb = $_POST["reg_numb"];
$sure_name = $_POST["sure_name"];
$name = $_POST["name"];
$email = $_POST["email"];
$check = $_POST["check"];

$check2 = $_POST["check2"];
$rate = $_POST["rate"];
$rate2 = $_POST["rate2"];
$rate3 = $_POST["rate3"];
$rate4 = $_POST["rate4"];
$rate5 = $_POST["rate5"];
$rate6 = $_POST["rate6"];
$rate7 = $_POST["rate7"];
$rate8 = $_POST["rate8"];
$rate9 = $_POST["rate9"];
$rate10 = $_POST["rate10"];
$rate11 = $_POST["rate11"];
$rate12 = $_POST["rate12"];
$rate13 = $_POST["rate13"];
$rate13 = $_POST["rate14"];
$trip = $_POST["trip"];
$comment = $_POST["comment"];
$comment2 = $_POST["comment2"];
$comment3 = $_POST["comment3"];
$comment4 = $_POST["comment4"];
$comment5 = $_POST["comment5"];
$comment6 = $_POST["comment6"];
$name_guide = $_POST["name_guide"];
$name_guide2 = $_POST["name_guide2"];
$name_guide3 = $_POST["name_guide3"];
$name_guide4 = $_POST["name_guide4"];
$name_employ = $_POST["name_employ"];
$tour_name = $_POST["tour_name"];
$tour_name2 = $_POST["tour_name2"];
$tour_name3 = $_POST["tour_name3"];
$tour_name4 = $_POST["tour_name4"];

$reg_numb1 = substr($reg_numb, 0,2);
$reg_numb2 = substr($reg_numb, 0,4);
$reg_numb3 = substr($reg_numb, 4,1);
$reg_numb4 = substr($reg_numb, 2,2);

$ClientURL = "http://www.bountybali.com";
$AdminEmail = "nadia@balibagus.com"; 
//$ClientEmail = "yana@bountybali.com";
$ClientEmail = "nadia@balibagus.com";
$ThankYouMessage = "Thank you for submitting the filed form.";
$ClientName = "Bounty Bali";

	$result[0]="qqr";
	$result[1]="wwe";
	$result[2]="rrt";
	$result[3]="yyu";
	$result[4]="iio";
	$result[5]="ppl";
	$result[6]="kkj";
	$result[7]="hhg";
	$result[8]="ffd";
	$result[9]="ssa";
	$check_val_code=$_POST['check_validation'];
	
	$search_up_to=0;
	while($search_up_to <= 9) {
	$check_val_code=str_replace($search_up_to, $result[$search_up_to], $check_val_code);
	$search_up_to++;
	}
/////////////////////////////////////////////////////////////////////////////////
$ip = $REMOTE_ADDR;

/////////////////////////////////////////////////////////////////////////////////
// hitung date
//gets current date/time values from server
$year=date('Y');
$month=date('n');
$day=date('j');

//sets dates when clocks change for GMT/BST
if ($year=='2003')
	{
	$mar='30';
	$oct='26';
	}
else if ($year=='2004')
	{
	$mar='28';
	$oct='31';
	}
else	if ($year=='2005')
	{
	$mar='27';
	$oct='30';
	}
else if ($year=='2006')
	{
	$mar='26';
	$oct='29';
	}
else
	{
	$mar='24';
	$oct='27';
	}

//checks that the date should be BST or GMT
if ($month>='3' && $month<='10')
	{
	if (($month=='3' && $day<=$mar)||($month=='10' && $day>=$oct))
		{
		$timedifference='4';//GMT - change for your server timezone.  This works on EDT
		}
	else
		{
		$timedifference='5';//BST - change for your server timezone.  This works on EDT
		}
	}
else
	{
	$timedifference="4";//GMT - change for your server timezone.  This works on EDT
	}

//calculates time difference
$mins='60';
$secs=($mins*$mins);
$change=($timedifference*$secs);

//calculates actual time
$waktu=date("l, jS F Y g:ia",time() + $change);*/
/////////////////////////////////////////////////////////////////////////////////
?>
<?php 
if(isset($_POST['submits'])) {
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
	/*$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LdYl1AaAAAAABYR5WncQeNU1E8cThfEoRBZlXyE'; // Insert your secret key here
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned
    if ($recaptcha->success == true && $recaptcha->score >= 0.5 && $recaptcha->action == 'submits') {
        // This is a human. Insert the message into database OR send a mail
        $success_output = "Your message sent successfully";
    } else {
        // Score less than 0.5 indicates suspicious activity. Return an error
        $error_output = "Something went wrong. Please try again later";
    }*/


		$reg_numb='';
		if(trim($_POST['reg_numb']) === '') {
			$reg_numb = 'You forgot to enter.';
			$hasError = true;
		} else {
			$reg_numb = trim($_POST['reg_numb']);	
		}
		$sure_name = '';
		if(trim($_POST['sure_name']) == '') {
			$sure_name = 'You forgot to enter.';
			$hasError = true;
		} else {
			$sure_name = trim($_POST['sure_name']);
		}
		$names = '';
		if(trim($_POST['names']) == '') {
			$names = 'You forgot to enter.';
			$hasError = true;
		} else {
			$names = trim($_POST['names']);
		}
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['emails']) === '')  {
			$emailsError = 'You forgot to enter your email address.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['emails']))) {
			$emailsError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$emails = trim($_POST['emails']);
		}
		//check list
		$check = '';
		if(isset($_POST['check']) && is_array($_POST['check']) && count($_POST['check']) > 0){
			$check = implode(', ', $_POST['check']);
		}
		//rate
		$rate = '';
		if(isset($_POST['rate']) && is_array($_POST['rate']) && count($_POST['rate']) > 0){
			$rate = implode(', ', $_POST['rate']);
		}
		//trip
		$trip = '';
		if(isset($_POST['trip']) && is_array($_POST['trip']) && count($_POST['trip']) > 0){
			$trip = implode(', ', $_POST['trip']);
		}
		//rate 2
		$rate2 = '';
		if(isset($_POST['rate2']) && is_array($_POST['rate2']) && count($_POST['rate2']) > 0){
			$rate2 = implode(', ', $_POST['rate2']);
		}
		//rate 3
		$rate3 = '';
		if(isset($_POST['rate3']) && is_array($_POST['rate3']) && count($_POST['rate3']) > 0){
			$rate3 = implode(', ', $_POST['rate3']);
		}
		
		//Check to make sure comments were entered	
		$comment = trim($_POST['comment']);
		
		//rate 4
		$rate4 = '';
		if(isset($_POST['rate4']) && is_array($_POST['rate4']) && count($_POST['rate4']) > 0){
			$rate4 = implode(', ', $_POST['rate4']);
		}
		$name_guide = trim($_POST['name_guide']);
		
		//check 2
		$check2 = '';
		if(isset($_POST['check2']) && is_array($_POST['check2']) && count($_POST['check2']) > 0){
			$check2 = implode(', ', $_POST['check2']);
		}
		$name_employ = trim($_POST['name_employ']);
		
		
		//rate 5
		$rate5 = '';
		if(isset($_POST['rate5']) && is_array($_POST['rate5']) && count($_POST['rate5']) > 0){
			$rate5 = implode(', ', $_POST['rate5']);
		}
		$name_guide2 = trim($_POST['name_guide2']);
		
		
		//rate 6
		$rate6 = '';
		if(isset($_POST['rate6']) && is_array($_POST['rate6']) && count($_POST['rate6']) > 0){
			$rate6 = implode(', ', $_POST['rate6']);
		}
		$name_guide3 = trim($_POST['name_guide3']);
		
		
		//rate 7
		$rate7 = '';
		if(isset($_POST['rate7']) && is_array($_POST['rate7']) && count($_POST['rate7']) > 0){
			$rate7 = implode(', ', $_POST['rate7']);
		}
		$name_guide4 = trim($_POST['name_guide4']);
		
		$comment2 = trim($_POST['comment2']);
		
		
		//rate 8
		$rate8 = '';
		if(isset($_POST['rate8']) && is_array($_POST['rate8']) && count($_POST['rate8']) > 0){
			$rate8 = implode(', ', $_POST['rate8']);
		}
		//rate 9
		$rate9 = '';
		if(isset($_POST['rate9']) && is_array($_POST['rate9']) && count($_POST['rate9']) > 0){
			$rate9 = implode(', ', $_POST['rate9']);
		}
		//rate 10
		$rate10 = '';
		if(isset($_POST['rate10']) && is_array($_POST['rate10']) && count($_POST['rate10']) > 0){
			$rate10 = implode(', ', $_POST['rate10']);
		}
		$comment3 = trim($_POST['comment3']);
		
		//check 3
		$check3 = '';
		if(isset($_POST['check3']) && is_array($_POST['check3']) && count($_POST['check3']) > 0){
			$check3 = implode(', ', $_POST['check3']);
		}
		$tour_name = trim($_POST['tour_name']);
		
		
		//rate 11
		$rate11 = '';
		if(isset($_POST['rate11']) && is_array($_POST['rate11']) && count($_POST['rate11']) > 0){
			$rate11 = implode(', ', $_POST['rate11']);
		}
		$tour_name2 = trim($_POST['tour_name2']);
		
		
		//rate 12
		$rate12 = '';
		if(isset($_POST['rate12']) && is_array($_POST['rate12']) && count($_POST['rate12']) > 0){
			$rate12 = implode(', ', $_POST['rate12']);
		}
		$tour_name3 = trim($_POST['tour_name3']);
		
		
		//rate 13
		$rate13 = '';
		if(isset($_POST['rate13']) && is_array($_POST['rate13']) && count($_POST['rate13']) > 0){
			$rate13 = implode(', ', $_POST['rate13']);
		}
		$tour_name4 = trim($_POST['tour_name4']);
		
		
		//rate 14
		$rate14 = '';
		if(isset($_POST['rate14']) && is_array($_POST['rate14']) && count($_POST['rate14']) > 0){
			$rate14 = implode(', ', $_POST['rate14']);
		}
		$comment4 ='';
		
			if(function_exists('stripslashes')) {
				$comment4 = stripslashes(trim($_POST['comment4']));
			} else {
				$comment4 = trim($_POST['comment4']);
			}
		
		$comment5 ='';
		
			if(function_exists('stripslashes')) {
				$comment5 = stripslashes(trim($_POST['comment5']));
			} else {
				$comment5 = trim($_POST['comment5']);
			}
		
		$comment6 ='';
		
			if(function_exists('stripslashes')) {
				$comment6 = stripslashes(trim($_POST['comment6']));
			} else {
				$comment6 = trim($_POST['comment6']);
			}
		//}
		
		if(!isset($hasError)) {
			//$emailTo = 'booking@bountybali.com';
			$emailTo = 'nadia@balibagus.com';
			$subject = 'E-questioner for Bounty Bali';
			$body = "<h4>О ВАС</h4>
			<strong>Номер брони (указан на стикере)</strong> : $reg_numb<br>
			<strong>Фамилия</strong> : $sure_name<br>
			<strong>Имя</strong> : $names<br>
			<strong>Имейл</strong> : $emails<br>
			<hr>
			<h4>ВАШ ОТДЫХ</h4>
			<strong>Сколько раз вы отдыхали на Бали</strong> : $check<br>
			<strong>Ваш отдых в целом</strong> : $rate<br>
			<strong>Цель вашей поездки</strong> : $trip<br>
			<strong>Инфраструктура Бали в целом – питание, развлечения, магазины</strong> : $rate2<br>
			<strong>Хотели ли бы вы вернуться на Бали еще раз</strong> : $rate3<br>
			<strong>Дополнительные пожелания и отзывы</strong> : $comment<br>
			<hr>
			<h4>НАШИ СОТРУДНИКИ</h4>
			<strong>Работа гида на трансфере а/порт - отель (если таковой был заказан заранее)</strong>
			Оценка : $rate4<br>
			Укажите имя гида : $name_guide<br>
			<strong>Была ли предложена вам нашим сотрудником информационная встреча</strong> : $check2<br>
			Укажите имя сотрудника : $name_employ<br>
			<strong>Работа гида на трансфере а/порт - отель (если таковой был заказан заранее)</strong><br>
			Оценка : $rate5<br>
			Укажите имя гида : $name_guide2<br>
			<strong>Работа гида на туре (ах)</strong><br>
			Оценка : $rate6<br>
			Укажите имя гида : $name_guide3<br>
			<strong>Работа гида на трансфере отель - а/порт (если таковой был заказан заранее)</strong><br>
			Оценка : $rate7<br>
			Укажите имя гида : $name_guide4<br>
			<strong>Дополнительные пожелания и отзывы</strong> : $comment2<br>
			<hr>
			<h4>ТРАНСПОРТ</h4>
			<strong>Состояние транспорта на трансфере а/порт - отель</strong> : $rate8<br>
			<strong>Состояние транспорта на турах</strong> : $rate9 <br>
			<strong>Состояние транспорта на трансфере отель - а/порт</strong> : $rate10 <br>
			<strong>Дополнительные пожелания и отзывы</strong> : $comment3 <br>
			<hr>
			<h4>ЭКСКУРСИИ</h4>
			<strong>Стоимость экскурсий</strong> : $check3 <br>
			<strong>Туры, на которых вы побывали (забронированные в нашей компании)</strong>
			Название тура : $tour_name <br>
			Оценка : $rate11 <br>
			Название тура : $tour_name2 <br>
			Оценка : $rate12 <br>
			Название тура : $tour_name3 <br>
			Оценка : $rate13 <br>
			Название тура : $tour_name4 <br>
			Оценка : $rate14 <br>
			<strong>Какие туры вам понравились больше всего и почему</strong> : $comment4 <br>
			<strong>Какие туры вам не понравились и почему</strong> : $comment5 <br>
			<strong>Дополнительные пожелания и отзывы</strong> : $comment6 <br>
			";
			
			$headers = 'MIME-Version: 1.0'."\r\n";
            $headers .= 'Content-Type: text/html;charset=UTF-8'."\r\n";
			$headers .= 'From: <'.$emails.'>' . "\r\n";
			$headers .= 'Reply-To: ' . $emails. "\r\n" . 'X-Mailer: PHP/' . phpversion();
			
			mail($emailTo, $subject, $body, $headers);

			$emailSent = true;
		}
	}	
	
}  

?>

<section>
	<div class="container">
    	
        
    	
    	    <?php
	//dislplay error message
	
	/*if(empty($reg_numb)) {
		$msg = '<span class="error"> Please enter a value</span>';
	} else if(!is_numeric($reg_numb)) {
		$msg = '<span class="error"> Data entered was not numeric</span>';
	} else if(strlen($reg_numb) != 6) {
		$msg = '<span class="error"> The number entered was not 6 digits long</span>';
	} else {
		
	}*/
	?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    	
       		<?php the_content(); ?>
	<?php if(isset($emailSent) && $emailSent == true) { ?>
		<p>Thank You for answering questioner re booking <strong>#<?php echo $_POST["reg_numb"];?></strong></p>
            <p style="color:#0c9536;" align="center">
            Мы благодарны вам за заполнение данной анкеты
и обязательно используем ваши оценки и комментарии в нашей дальнейшей работе.
 
Будем рады видеть вас снова на о.Бали ! <br><br><a href="<?php the_permalink(); ?>">ОБРАТНО ОПРОСНЫЙ  ЛИСТ</a><br><br></p>
    <?php } else { ?>
		
	
		
	  <?php if(isset($hasError)) { ?>
			<p class="error">There was an error submitting the form.<p>
		<?php } ?>
		<?php //if(isset($_POST['submits'])){ ?>
      <form method="post" action="<?php the_permalink(); ?>" id="myform">
      <div class="loginform">
      	<table width="100%" border="0" cellspacing="1" cellpadding="0">
      	  <tr bgcolor="#FF33CC">
      	    <td colspan="10" align="center" class="black-text">О ВАС</td>
      	  </tr>
      	  <tr>
      	    <td colspan="10">&nbsp;</td>
      	  </tr>
      	  <tr>
      	    <td colspan="2"><strong>Номер брони (указан на стикере)</strong></td>
      	    <td colspan="3"><input name="reg_numb" type="text" class="form-control text-center" id="reg_numb" value="<?php   echo $_POST['reg_numb'];?>" placeholder="-" maxlength="8" required></td>
           	<td width="24%" colspan="5"> <span style="color:#F00"><strong>* обязательное поле</strong></span></td>
    	  </tr>
      	  <tr>
      	    <td colspan="2">&nbsp;</td>
      	    <td colspan="3">&nbsp;</td>
            <td colspan="5">&nbsp;</td>
    	  </tr>
      	  <tr>
      	    <td colspan="2"><strong>Фамилия</strong></td>
      	    <td colspan="3"><input name="sure_name" type="text" class="form-control" id="sure_name" value="<?php   echo $_POST['sure_name'];?>" required></td>
            <td colspan="5"> <span style="color:#F00"><strong>* обязательное поле</strong></span></td>
            
    	  </tr>
      	  <tr>
      	    <td colspan="2">&nbsp;</td>
      	    <td colspan="3">&nbsp;</td>
            <td colspan="5">&nbsp;</td>
    	  </tr>
      	  <tr>
      	    <td colspan="2"><strong>Имя</strong></td>
      	    <td colspan="3"><input name="names" type="text" class="form-control" id="names" value="<?php   echo $_POST['names'];?>" required></td>
            <td colspan="5"> <span style="color:#F00"><strong>* обязательное поле</strong></span></td>
           
    	  </tr>
      	  <tr>
      	    <td colspan="2">&nbsp;</td>
      	    <td colspan="3">&nbsp;</td>
            <td colspan="5">&nbsp;</td>
    	  </tr>
      	  <tr>
      	    <td colspan="2"><strong>Имейл</strong></td>
      	    <td colspan="3"><input name="emails" type="text" class="form-control" id="emails" value="<?php   echo $_POST['emails'];?>" required></td>
            <td colspan="5"> <span style="color:#F00"><strong>* обязательное поле</strong></span></td>
            
    	  </tr>
      	  <tr>
      	    <td colspan="2">&nbsp;</td>
      	    <td colspan="3">&nbsp;</td>
            <td colspan="5">&nbsp;</td>
    	  </tr>
          
          <tr bgcolor="#FF33CC">
      	    <td colspan="10" align="center" class="black-text">ВАШ ОТДЫХ</td>
      	  </tr>
          </table>
      	  <tr>
      	    <td colspan="10">&nbsp;</td>
      	  </tr>
          <tr><td>
          <table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
      	    <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-10-9.png"></td>
      	    <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-8-7.png"></td>
            <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-6-5.png"></td>
            <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-4-3.png"></td>
            <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-2-1.png"></td>
          </tr>
          <tr align="center" bgcolor="#6699FF">
      	    <td class="black-text">10</td>
      	    <td class="black-text">9</td>
            <td class="black-text">8</td>
            <td class="black-text">7</td>
            <td class="black-text">6</td>
            <td class="black-text">5</td>
            <td class="black-text">4</td>
            <td class="black-text">3</td>
            <td class="black-text">2</td>
            <td class="black-text">1</td>
    	  </tr>
          </table>
          </td>
         </tr>
         
         <tr>
          <table width="100%">
          	  <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Сколько раз вы отдыхали на Бали</strong></span></td><!--How many times you are vacationing in Bali -->
              </tr>
          </table>
          <table width="100%">
              <tr>
                 <td width="2%"><input type="checkbox" value="1" name="check[]"></td>
                 <td width="3%">1</td>
                 <td width="2%"><input type="checkbox" value="2" name="check[]"></td>
                 <td width="3%">2</td>
                 <td width="2%"><input type="checkbox" value="3" name="check[]"></td>
                 <td width="3%">3</td>
                 <td width="2%"><input type="checkbox" value="4" name="check[]"></td>
                 <td width="3%">4</td>
                 <td width="2%"><input type="checkbox" value="5" name="check[]"></td>
                 <td width="3%">5</td>
                 <td width="2%"><input type="checkbox" value="6" name="check[]"></td>
                 <td width="3%">6</td>
                 <td width="2%"><input type="checkbox" value="7" name="check[]"></td>
                 <td width="3%">7</td>
                 <td width="2%"><input type="checkbox" value="8" name="check[]"></td>
                 <td width="3%">8</td>
                 <td width="2%"><input type="checkbox" value="9" name="check[]"></td>
                 <td width="3%">9</td>
                 <td width="2%"><input type="checkbox" value="10" name="check[]"></td>
                 <td width="3%">10</td>
                 <td> и более</td>
              </tr>
          </table>
      	  </tr>
         
          <tr>
          <table width="100%">
          	  <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Ваш отдых в целом</strong></span></td>
              </tr>
          </table>
          <table width="100%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="10" name="rate[]"></td>
                 <td width="3%">10</td>
                 <td width="1%"><input type="checkbox" value="9" name="rate[]"></td>
                 <td width="3%">9</td>
                 <td width="1%"><input type="checkbox" value="8" name="rate[]"></td>
                 <td width="3%">8</td>
                 <td width="1%"><input type="checkbox" value="7" name="rate[]"></td>
                 <td width="3%">7</td>
                 <td width="1%"><input type="checkbox" value="6" name="rate[]"></td>
                 <td width="3%">6</td>
                 <td width="1%"><input type="checkbox" value="5" name="rate[]"></td>
                 <td width="3%">5</td>
                 <td width="1%"><input type="checkbox" value="4" name="rate[]"></td>
                 <td width="3%">4</td>
                 <td width="1%"><input type="checkbox" value="3" name="rate[]"></td>
                 <td width="3%">3</td>
                 <td width="1%"><input type="checkbox" value="2" name="rate[]"></td>
                 <td width="3%">2</td>
                 <td width="1%"><input type="checkbox" value="1" name="rate[]"></td>
                 <td width="3%">1</td>
              </tr>
          </table>
      	  </tr>
      	  
          <tr>
          <table width="100%">
          	  <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Цель вашей поездки</strong></span></td>
              </tr>
          </table>
          <table width="100%">
              <tr>
                 <td width="1%"><input type="checkbox" value="только отдых" name="trip[]"></td>
                 <td width="15%">только отдых</td>
                 <td width="1%"><input type="checkbox" value="отдых и экскурсии" name="trip[]"></td>
                 <td width="15%">отдых и экскурсии</td>
                 <td width="1%"><input type="checkbox" value="экскурсии" name="trip[]"></td>
                 <td width="15%">экскурсии</td>
                 <td width="1%"><input type="checkbox" value="бизнес" name="trip[]"></td>
                 <td width="15%">бизнес</td>
              </tr>
          </table>
      	  </tr>
          
          <tr>
          <table width="100%">
          	  <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Инфраструктура Бали в целом – питание, развлечения, магазины</strong></span></td>
              </tr>
          </table>
          <table width="100%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="10" name="rate2[]"></td>
                 <td width="3%">10</td>
                 <td width="1%"><input type="checkbox" value="9" name="rate2[]"></td>
                 <td width="3%">9</td>
                 <td width="1%"><input type="checkbox" value="8" name="rate2[]"></td>
                 <td width="3%">8</td>
                 <td width="1%"><input type="checkbox" value="7" name="rate2[]"></td>
                 <td width="3%">7</td>
                 <td width="1%"><input type="checkbox" value="6" name="rate2[]"></td>
                 <td width="3%">6</td>
                 <td width="1%"><input type="checkbox" value="5" name="rate2[]"></td>
                 <td width="3%">5</td>
                 <td width="1%"><input type="checkbox" value="4" name="rate2[]"></td>
                 <td width="3%">4</td>
                 <td width="1%"><input type="checkbox" value="3" name="rate2[]"></td>
                 <td width="3%">3</td>
                 <td width="1%"><input type="checkbox" value="2" name="rate2[]"></td>
                 <td width="3%">2</td>
                 <td width="1%"><input type="checkbox" value="1" name="rate2[]"></td>
                 <td width="3%">1</td>
              </tr>
          </table>
      	  </tr>
          
          <tr>
          <table width="100%">
              <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Хотели ли бы вы вернуться на Бали еще раз</strong></span></td>
              </tr>
          </table>
          <table width="100%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="10" name="rate3[]"></td>
                 <td width="3%">10</td>
                 <td width="1%"><input type="checkbox" value="9" name="rate3[]"></td>
                 <td width="3%">9</td>
                 <td width="1%"><input type="checkbox" value="8" name="rate3[]"></td>
                 <td width="3%">8</td>
                 <td width="1%"><input type="checkbox" value="7" name="rate3[]"></td>
                 <td width="3%">7</td>
                 <td width="1%"><input type="checkbox" value="6" name="rate3[]"></td>
                 <td width="3%">6</td>
                 <td width="1%"><input type="checkbox" value="5" name="rate3[]"></td>
                 <td width="3%">5</td>
                 <td width="1%"><input type="checkbox" value="4" name="rate3[]"></td>
                 <td width="3%">4</td>
                 <td width="1%"><input type="checkbox" value="3" name="rate3[]"></td>
                 <td width="3%">3</td>
                 <td width="1%"><input type="checkbox" value="2" name="rate3[]"></td>
                 <td width="3%">2</td>
                 <td width="1%"><input type="checkbox" value="1" name="rate3[]"></td>
                 <td width="3%">1</td>
              </tr>
          </table>
      	  </tr>
          
          <tr>
          <table width="100%">
              <tr>
                <td height="10px">&nbsp;</td>
             </tr>
              <tr>
                  <td width="28%"><span class="text-bg"><strong>Дополнительные пожелания и отзывы</strong></span></td>
              </tr>
              <tr>
                  <td><textarea name="comment" class="form-control" id="comment" cols="60" rows="5"><?php if(isset($_POST['comment'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comment']); } else { echo $_POST['comment']; } } ?></textarea></td>
              </tr> 
          </table>
          </tr>
          
          <tr>
          <table width="100%">
          	  <tr>
                <td height="10px">&nbsp;</td>
             </tr>
              <tr bgcolor="#FF33CC">
                <td colspan="10" class="text-center">НАШИ СОТРУДНИКИ</td>
              </tr>
          </table>
          </tr>
          
          <tr>
      	    <td colspan="10">&nbsp;</td>
      	  </tr>
          <tr><td>
          <table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
      	    <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-10-9.png"></td>
      	    <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-8-7.png"></td>
            <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-6-5.png"></td>
            <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-4-3.png"></td>
            <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-2-1.png"></td>
          </tr>
          <tr align="center" bgcolor="#6699FF">
      	    <td class="black-text">10</td>
      	    <td class="black-text">9</td>
            <td class="black-text">8</td>
            <td class="black-text">7</td>
            <td class="black-text">6</td>
            <td class="black-text">5</td>
            <td class="black-text">4</td>
            <td class="black-text">3</td>
            <td class="black-text">2</td>
            <td class="black-text">1</td>
    	  </tr>
          </table>
          </td>
         </tr>
         
         <tr>
          <table width="100%">
          	  <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Работа гида на трансфере а/порт - отель (если таковой был заказан заранее)</strong></span></td>
              </tr>
          </table>
          <table width="100%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="10" name="rate4[]"></td>
                 <td width="3%">10</td>
                 <td width="1%"><input type="checkbox" value="9" name="rate4[]"></td>
                 <td width="3%">9</td>
                 <td width="1%"><input type="checkbox" value="8" name="rate4[]"></td>
                 <td width="3%">8</td>
                 <td width="1%"><input type="checkbox" value="7" name="rate4[]"></td>
                 <td width="3%">7</td>
                 <td width="1%"><input type="checkbox" value="6" name="rate4[]"></td>
                 <td width="3%">6</td>
                 <td width="1%"><input type="checkbox" value="5" name="rate4[]"></td>
                 <td width="3%">5</td>
                 <td width="1%"><input type="checkbox" value="4" name="rate4[]"></td>
                 <td width="3%">4</td>
                 <td width="1%"><input type="checkbox" value="3" name="rate4[]"></td>
                 <td width="3%">3</td>
                 <td width="1%"><input type="checkbox" value="2" name="rate4[]"></td>
                 <td width="3%">2</td>
                 <td width="1%"><input type="checkbox" value="1" name="rate4[]"></td>
                 <td width="3%">1</td>
              </tr>
          </table>
           <table width="100%">
              <tr>
                 <td width="28%">Укажите имя гида</td>
                 <td><input type="text" class="form-control" name="name_guide" id="name_guide"></td>
              </tr> 
			</table>
      	  </tr>
         
         <tr>
          <table width="100%">
              <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Была ли предложена вам нашим сотрудником информационная встреча</strong></span></td>
              </tr>
          </table>
          <table width="100%">
              <tr>
                 <td width="2%"><input type="checkbox" value="да" name="check2[]"></td>
                 <td width="11%">да</td>
                 <td width="2%"><input type="checkbox" value="нет" name="check2[]"></td>
                 <td width="79%">нет</td> 
              </tr>
          </table>
           <table width="100%">
              <tr>
                 <td width="28%">Укажите имя сотрудника </td>
                 <td><input type="text" class="form-control" name="name_employ" id="name_employ"></td>
              </tr> 
			</table>
            <table width="100%">
              <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Работа гида на информационной встрече (если вы согласились на нее и вышли в назначенное время)</strong></span></td>
              </tr>
          </table>
          <table width="100%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="10" name="rate5[]"></td>
                 <td width="3%">10</td>
                 <td width="1%"><input type="checkbox" value="9" name="rate5[]"></td>
                 <td width="3%">9</td>
                 <td width="1%"><input type="checkbox" value="8" name="rate5[]"></td>
                 <td width="3%">8</td>
                 <td width="1%"><input type="checkbox" value="7" name="rate5[]"></td>
                 <td width="3%">7</td>
                 <td width="1%"><input type="checkbox" value="6" name="rate5[]"></td>
                 <td width="3%">6</td>
                 <td width="1%"><input type="checkbox" value="5" name="rate5[]"></td>
                 <td width="3%">5</td>
                 <td width="1%"><input type="checkbox" value="4" name="rate5[]"></td>
                 <td width="3%">4</td>
                 <td width="1%"><input type="checkbox" value="3" name="rate5[]"></td>
                 <td width="3%">3</td>
                 <td width="1%"><input type="checkbox" value="2" name="rate5[]"></td>
                 <td width="3%">2</td>
                 <td width="1%"><input type="checkbox" value="1" name="rate5[]"></td>
                 <td width="3%">1</td>
              </tr>
          </table>
           <table width="100%">
              <tr>
                 <td width="28%">Укажите имя гида </td>
                 <td><input type="text" class="form-control" name="name_guide2" id="name_guide2"></td>
              </tr> 
			</table>
            <table width="100%">
              <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Работа гида на туре (ах)</strong></span></td>
              </tr>
          </table>
          <table width="100%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="10" name="rate6[]"></td>
                 <td width="3%">10</td>
                 <td width="1%"><input type="checkbox" value="9" name="rate6[]"></td>
                 <td width="3%">9</td>
                 <td width="1%"><input type="checkbox" value="8" name="rate6[]"></td>
                 <td width="3%">8</td>
                 <td width="1%"><input type="checkbox" value="7" name="rate6[]"></td>
                 <td width="3%">7</td>
                 <td width="1%"><input type="checkbox" value="6" name="rate6[]"></td>
                 <td width="3%">6</td>
                 <td width="1%"><input type="checkbox" value="5" name="rate6[]"></td>
                 <td width="3%">5</td>
                 <td width="1%"><input type="checkbox" value="4" name="rate6[]"></td>
                 <td width="3%">4</td>
                 <td width="1%"><input type="checkbox" value="3" name="rate6[]"></td>
                 <td width="3%">3</td>
                 <td width="1%"><input type="checkbox" value="2" name="rate6[]"></td>
                 <td width="3%">2</td>
                 <td width="1%"><input type="checkbox" value="1" name="rate6[]"></td>
                 <td width="3%">1</td>
              </tr>
          </table>
           <table width="100%">
              <tr>
                 <td width="28%">Укажите имя гида </td>
                 <td><input type="text" class="form-control" name="name_guide3" id="name_guide3"></td>
              </tr> 
			</table>
            <table width="100%">
              <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Работа гида на трансфере отель - а/порт (если таковой был заказан заранее)</strong></span> </td>
              </tr>
          </table>
          <table width="100%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="10" name="rate7[]"></td>
                 <td width="3%">10</td>
                 <td width="1%"><input type="checkbox" value="9" name="rate7[]"></td>
                 <td width="3%">9</td>
                 <td width="1%"><input type="checkbox" value="8" name="rate7[]"></td>
                 <td width="3%">8</td>
                 <td width="1%"><input type="checkbox" value="7" name="rate7[]"></td>
                 <td width="3%">7</td>
                 <td width="1%"><input type="checkbox" value="6" name="rate7[]"></td>
                 <td width="3%">6</td>
                 <td width="1%"><input type="checkbox" value="5" name="rate7[]"></td>
                 <td width="3%">5</td>
                 <td width="1%"><input type="checkbox" value="4" name="rate7[]"></td>
                 <td width="3%">4</td>
                 <td width="1%"><input type="checkbox" value="3" name="rate7[]"></td>
                 <td width="3%">3</td>
                 <td width="1%"><input type="checkbox" value="2" name="rate7[]"></td>
                 <td width="3%">2</td>
                 <td width="1%"><input type="checkbox" value="1" name="rate7[]"></td>
                 <td width="3%">1</td>
              </tr>
          </table>
           <table width="100%">
              <tr>
                 <td width="28%">Укажите имя гида </td>
                 <td><input type="text" class="form-control" name="name_guide4" id="name_guide4"></td>
              </tr> 
			</table>
            <table width="100%">
              <tr>
                <td height="10px">&nbsp;</td>
             </tr>
              <tr>
                  <td width="28%"><span class="text-bg"><strong>Дополнительные пожелания и отзывы</strong></span></td>
              </tr>
              <tr>
                  <td><textarea name="comment2" class="form-control" id="comment2" cols="60" rows="5"><?php if(isset($_POST['comment2'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comment2']); } else { echo $_POST['comment2']; } } ?></textarea></td>
              </tr> 
          </table>
      	  </tr>
         
          <tr>
          <table width="100%">
              <tr>
                <td height="10px">&nbsp;</td>
             </tr>
              <tr bgcolor="#FF33CC">
                <td colspan="10" class="text-center">ТРАНСПОРТ</td>
              </tr>
          </table>
          <tr>
      	    <td colspan="10">&nbsp;</td>
      	  </tr>
          <tr><td>
          <table width="100%" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-10-9.png"></td>
                <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-8-7.png"></td>
                <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-6-5.png"></td>
                <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-4-3.png"></td>
                <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-2-1.png"></td>
              </tr>
              <tr align="center" bgcolor="#6699FF">
                <td class="black-text">10</td>
                <td class="black-text">9</td>
                <td class="black-text">8</td>
                <td class="black-text">7</td>
                <td class="black-text">6</td>
                <td class="black-text">5</td>
                <td class="black-text">4</td>
                <td class="black-text">3</td>
                <td class="black-text">2</td>
                <td class="black-text">1</td>
              </tr>
          </table>
          </td>
         </tr>
         <table width="100%">
         	  <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Состояние транспорта на трансфере а/порт - отель</strong></span> </td>
              </tr>
          </table>
          <table width="100%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="10" name="rate8[]"></td>
                 <td width="3%">10</td>
                 <td width="1%"><input type="checkbox" value="9" name="rate8[]"></td>
                 <td width="3%">9</td>
                 <td width="1%"><input type="checkbox" value="8" name="rate8[]"></td>
                 <td width="3%">8</td>
                 <td width="1%"><input type="checkbox" value="7" name="rate8[]"></td>
                 <td width="3%">7</td>
                 <td width="1%"><input type="checkbox" value="6" name="rate8[]"></td>
                 <td width="3%">6</td>
                 <td width="1%"><input type="checkbox" value="5" name="rate8[]"></td>
                 <td width="3%">5</td>
                 <td width="1%"><input type="checkbox" value="4" name="rate8[]"></td>
                 <td width="3%">4</td>
                 <td width="1%"><input type="checkbox" value="3" name="rate8[]"></td>
                 <td width="3%">3</td>
                 <td width="1%"><input type="checkbox" value="2" name="rate8[]"></td>
                 <td width="3%">2</td>
                 <td width="1%"><input type="checkbox" value="1" name="rate8[]"></td>
                 <td width="3%">1</td>
              </tr>
          </table>
         <table width="100%">
              <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Состояние транспорта на турах</strong></span> </td>
              </tr>
          </table>
          <table width="100%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="10" name="rate9[]"></td>
                 <td width="3%">10</td>
                 <td width="1%"><input type="checkbox" value="9" name="rate9[]"></td>
                 <td width="3%">9</td>
                 <td width="1%"><input type="checkbox" value="8" name="rate9[]"></td>
                 <td width="3%">8</td>
                 <td width="1%"><input type="checkbox" value="7" name="rate9[]"></td>
                 <td width="3%">7</td>
                 <td width="1%"><input type="checkbox" value="6" name="rate9[]"></td>
                 <td width="3%">6</td>
                 <td width="1%"><input type="checkbox" value="5" name="rate9[]"></td>
                 <td width="3%">5</td>
                 <td width="1%"><input type="checkbox" value="4" name="rate9[]"></td>
                 <td width="3%">4</td>
                 <td width="1%"><input type="checkbox" value="3" name="rate9[]"></td>
                 <td width="3%">3</td>
                 <td width="1%"><input type="checkbox" value="2" name="rate9[]"></td>
                 <td width="3%">2</td>
                 <td width="1%"><input type="checkbox" value="1" name="rate9[]"></td>
                 <td width="3%">1</td>
              </tr>
          </table>
         <table width="100%">
         	  <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Состояние транспорта на трансфере отель - а/порт</strong></span></td>
              </tr>
          </table>
          <table width="100%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="10" name="rate10[]"></td>
                 <td width="3%">10</td>
                 <td width="1%"><input type="checkbox" value="9" name="rate10[]"></td>
                 <td width="3%">9</td>
                 <td width="1%"><input type="checkbox" value="8" name="rate10[]"></td>
                 <td width="3%">8</td>
                 <td width="1%"><input type="checkbox" value="7" name="rate10[]"></td>
                 <td width="3%">7</td>
                 <td width="1%"><input type="checkbox" value="6" name="rate10[]"></td>
                 <td width="3%">6</td>
                 <td width="1%"><input type="checkbox" value="5" name="rate10[]"></td>
                 <td width="3%">5</td>
                 <td width="1%"><input type="checkbox" value="4" name="rate10[]"></td>
                 <td width="3%">4</td>
                 <td width="1%"><input type="checkbox" value="3" name="rate10[]"></td>
                 <td width="3%">3</td>
                 <td width="1%"><input type="checkbox" value="2" name="rate10[]"></td>
                 <td width="3%">2</td>
                 <td width="1%"><input type="checkbox" value="1" name="rate10[]"></td>
                 <td width="3%">1</td>
              </tr>
          </table>
          <table width="100%">
          	  <tr>
                <td height="10px">&nbsp;</td>
             </tr>
              <tr>
                  <td width="28%"><span class="text-bg"><strong>Дополнительные пожелания и отзывы</strong></span></td>
              </tr>
              <tr>
                  <td><textarea name="comment3" class="form-control" id="comment3" cols="60" rows="5"><?php if(isset($_POST['comment3'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comment3']); } else { echo $_POST['comment3']; } } ?></textarea></td>
              </tr> 
          </table>
          </tr>
          
          <tr>
          <table width="100%">
              <tr bgcolor="#FF33CC">
                <td colspan="10" class="text-center">ЭКСКУРСИИ</td>
              </tr>
          </table>
          <tr>
      	    <td colspan="10">&nbsp;</td>
      	  </tr>
          <tr><td>
          <table width="100%" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-10-9.png"></td>
                <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-8-7.png"></td>
                <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-6-5.png"></td>
                <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-4-3.png"></td>
                <td colspan="2" class="text-center"><img src="<?php bloginfo('template_url'); ?>/images/emot/icon-2-1.png"></td>
              </tr>
              <tr class="text-center" bgcolor="#6699FF">
                <td class="black-text">10</td>
                <td class="black-text">9</td>
                <td class="black-text">8</td>
                <td class="black-text">7</td>
                <td class="black-text">6</td>
                <td class="black-text">5</td>
                <td class="black-text">4</td>
                <td class="black-text">3</td>
                <td class="black-text">2</td>
                <td class="black-text">1</td>
              </tr>
          </table>
          </td>
         </tr>
         <table width="100%">
              <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Стоимость экскурсий</strong></span></td>
              </tr>
          </table>
          <table width="50%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="дешево" name="check3[]"></td>
                 <td width="3%">дешево</td>
                 <td width="1%"><input type="checkbox" value="доступно" name="check3[]"></td>
                 <td width="3%">доступно</td>
                 <td width="1%"><input type="checkbox" value="дорого" name="check3[]"></td>
                 <td width="3%">дорого</td>
              </tr>
          </table>
         <table width="100%">
              <tr>
                <td height="10px">&nbsp;</td>
             </tr>
          	  <tr>
              	 <td><span class="text-bg"><strong>Туры, на которых вы побывали (забронированные в нашей компании)</strong></span></td>
              </tr>
          </table>
          <table width="100%">
              <tr>
                 <td width="28%">Название  тура </td>
                 <td><input type="text" class="form-control" name="tour_name" id="tour_name"></td>
              </tr> 
			</table>
          <table width="100%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="10" name="rate11[]"></td>
                 <td width="3%">10</td>
                 <td width="1%"><input type="checkbox" value="9" name="rate11[]"></td>
                 <td width="3%">9</td>
                 <td width="1%"><input type="checkbox" value="8" name="rate11[]"></td>
                 <td width="3%">8</td>
                 <td width="1%"><input type="checkbox" value="7" name="rate11[]"></td>
                 <td width="3%">7</td>
                 <td width="1%"><input type="checkbox" value="6" name="rate11[]"></td>
                 <td width="3%">6</td>
                 <td width="1%"><input type="checkbox" value="5" name="rate11[]"></td>
                 <td width="3%">5</td>
                 <td width="1%"><input type="checkbox" value="4" name="rate11[]"></td>
                 <td width="3%">4</td>
                 <td width="1%"><input type="checkbox" value="3" name="rate11[]"></td>
                 <td width="3%">3</td>
                 <td width="1%"><input type="checkbox" value="2" name="rate11[]"></td>
                 <td width="3%">2</td>
                 <td width="1%"><input type="checkbox" value="1" name="rate11[]"></td>
                 <td width="3%">1</td>
              </tr>
          </table>
         <table width="100%">
              <tr>
                 <td width="28%">Название  тура </td>
                 <td><input type="text" class="form-control" name="tour_name2" id="tour_name2"></td>
              </tr> 
			</table>
          <table width="100%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="10" name="rate12[]"></td>
                 <td width="3%">10</td>
                 <td width="1%"><input type="checkbox" value="9" name="rate12[]"></td>
                 <td width="3%">9</td>
                 <td width="1%"><input type="checkbox" value="8" name="rate12[]"></td>
                 <td width="3%">8</td>
                 <td width="1%"><input type="checkbox" value="7" name="rate12[]"></td>
                 <td width="3%">7</td>
                 <td width="1%"><input type="checkbox" value="6" name="rate12[]"></td>
                 <td width="3%">6</td>
                 <td width="1%"><input type="checkbox" value="5" name="rate12[]"></td>
                 <td width="3%">5</td>
                 <td width="1%"><input type="checkbox" value="4" name="rate12[]"></td>
                 <td width="3%">4</td>
                 <td width="1%"><input type="checkbox" value="3" name="rate12[]"></td>
                 <td width="3%">3</td>
                 <td width="1%"><input type="checkbox" value="2" name="rate12[]"></td>
                 <td width="3%">2</td>
                 <td width="1%"><input type="checkbox" value="1" name="rate12[]"></td>
                 <td width="3%">1</td>
              </tr>
          </table>
          <table width="100%">
              <tr>
                 <td width="28%">Название  тура </td>
                 <td><input type="text" class="form-control" name="tour_name3" id="tour_name3"></td>
              </tr> 
			</table>
          <table width="100%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="10" name="rate13[]"></td>
                 <td width="3%">10</td>
                 <td width="1%"><input type="checkbox" value="9" name="rate13[]"></td>
                 <td width="3%">9</td>
                 <td width="1%"><input type="checkbox" value="8" name="rate13[]"></td>
                 <td width="3%">8</td>
                 <td width="1%"><input type="checkbox" value="7" name="rate13[]"></td>
                 <td width="3%">7</td>
                 <td width="1%"><input type="checkbox" value="6" name="rate13[]"></td>
                 <td width="3%">6</td>
                 <td width="1%"><input type="checkbox" value="5" name="rate13[]"></td>
                 <td width="3%">5</td>
                 <td width="1%"><input type="checkbox" value="4" name="rate13[]"></td>
                 <td width="3%">4</td>
                 <td width="1%"><input type="checkbox" value="3" name="rate13[]"></td>
                 <td width="3%">3</td>
                 <td width="1%"><input type="checkbox" value="2" name="rate13[]"></td>
                 <td width="3%">2</td>
                 <td width="1%"><input type="checkbox" value="1" name="rate13[]"></td>
                 <td width="3%">1</td>
              </tr>
          </table>
          <table width="100%">
              <tr>
                 <td width="28%">Название  тура </td>
                 <td><input type="text" class="form-control" name="tour_name4" id="tour_name4"></td>
              </tr> 
			</table>
          <table width="100%">
              <tr>
              	 <td width="3%">Оценка  :</td>
                 <td width="1%"><input type="checkbox" value="10" name="rate14[]"></td>
                 <td width="3%">10</td>
                 <td width="1%"><input type="checkbox" value="9" name="rate14[]"></td>
                 <td width="3%">9</td>
                 <td width="1%"><input type="checkbox" value="8" name="rate14[]"></td>
                 <td width="3%">8</td>
                 <td width="1%"><input type="checkbox" value="7" name="rate14[]"></td>
                 <td width="3%">7</td>
                 <td width="1%"><input type="checkbox" value="6" name="rate14[]"></td>
                 <td width="3%">6</td>
                 <td width="1%"><input type="checkbox" value="5" name="rate14[]"></td>
                 <td width="3%">5</td>
                 <td width="1%"><input type="checkbox" value="4" name="rate14[]"></td>
                 <td width="3%">4</td>
                 <td width="1%"><input type="checkbox" value="3" name="rate14[]"></td>
                 <td width="3%">3</td>
                 <td width="1%"><input type="checkbox" value="2" name="rate14[]"></td>
                 <td width="3%">2</td>
                 <td width="1%"><input type="checkbox" value="1" name="rate14[]"></td>
                 <td width="3%">1</td>
              </tr>
          </table>
          <table width="100%">
              <tr>
                <td height="10px">&nbsp;</td>
             </tr>
              <tr>
                  <td width="28%"><span class="text-bg"><strong>Какие туры вам понравились больше всего и почему</strong></span> </td>
              </tr>
              <tr>
                  <td><textarea name="comment4" class="form-control" id="comment4" cols="60" rows="5"><?php if(isset($_POST['comment4'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comment4']); } else { echo $_POST['comment4']; } } ?></textarea></td>
              </tr> 
          </table>
           <table width="100%">
              <tr>
                <td height="10px">&nbsp;</td>
             </tr>
              <tr>
                  <td width="28%"><span class="text-bg"><strong>Какие туры вам не понравились и почему</strong></span></td>
              </tr>
              <tr>
                  <td><textarea name="comment5" class="form-control" id="comment5" cols="60" rows="5"><?php if(isset($_POST['comment5'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comment5']); } else { echo $_POST['comment5']; } } ?></textarea></td>
              </tr> 
          </table>
           <table width="100%">
              <tr>
                <td height="10px">&nbsp;</td>
             </tr>
              <tr>
                  <td width="28%"><span class="text-bg"><strong>Дополнительные пожелания и отзывы</strong></span></td>
              </tr>
              <tr>
                  <td><textarea name="comment6" class="form-control" id="comment6" cols="60" rows="5"><?php if(isset($_POST['comment6'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comment6']); } else { echo $_POST['comment6']; } } ?></textarea></td>
              </tr> 
          </table>
          </tr>
        <div class="screenReader"><label for="checking" class="screenReader"></label><input type="hidden" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>"></div>
        <!--<tr>
				<td><div id="alert"></div><input type="hidden" name="recaptcha_response" id="recaptchaResponse"></td>
			</tr>-->
        <tr>
        <table width="100%">
      	  	<tr>
      	    	<td colspan="2">&nbsp;</td>
    	    </tr>
			
      	  	<tr>
      	    	<td colspan="2" class="text-center"><input type="hidden" name="submits" id="submits" value="true"><button type="submit"  class="btn btn-primary">ОТПРАВИТЬ ОТЗЫВ</button></td>
    	    </tr>
            <tr>
      	    	<td colspan="2">&nbsp;</td>
    	    </tr>
			
            <!--<tr>
      	    	<td colspan="2" align="center"><strong>Мы благодарны вам за заполнение данной анкеты
и обязательно используем ваши оценки и комментарии в нашей дальнейшей работе.<br>

Будем рады видеть вас снова на о.Бали !</strong>
</td>
      	    </tr> -->
         </table>
    	 </tr> 
      </div>
      </form>
   <?php //} else{ ?>
<?php //} ?><?php } ?>
<?php endwhile; endif; ?> 

	</div>	
</section>
 
<?php get_footer(); ?>