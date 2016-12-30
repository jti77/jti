<?php
// 30/12/2016 - Librairie utilisée UNIQUEMENT en cas de debuggage, pour afficher les paramètres en INPUT de page

function debug_params()
{
 

	/* --------------------- REQUEST -------------*/
	$requestBloc = "--- REQUEST ---";	
	if (!isset($_REQUEST))
 {
  $requestBloc .= "\nPAS de variables \$_REQUEST";
 } else
 {
		foreach ( $_REQUEST as $pkey=>$pvalue )
		{
	 		$requestBloc .= "\n$pkey:\t[".print_r($pvalue,true)."]";
		}
 }
	$requestBloc .= "<br/>";
	
	/* --------------------- POST -------------*/
	$postBloc = "--- POST ---";	
 if (!isset($_POST)) {
		$postBloc .= "\nPAS de variables \$_POST";
	} else 
 {
		foreach ( $_POST as $pkey=>$pvalue )
		{
			if (is_array($pvalue))
			{
				$postBloc .= "\nVecteur associatif: $pkey";
				foreach($pvalue as $item=>$value)
				{
					$postBloc .= "\n\t[$item]:$value, ";
				}
				$postBloc .= "\n";
			}
			if (is_array($pvalue))
			{
				$postBloc .= "\nVecteur simple: $pkey: {";
				foreach($pvalue as $value)
				{
					$postBloc .= "\n\t$value, ";
				}
				$postBloc .= "\n}";
			} else
			{
				$postBloc .= "\n$pkey:\t[$pvalue]";
			}
	 	}
 	}
	$postBloc .= "<br/>";
	
	/* --------------------- GET -------------*/ 	
	$getBloc = "--- GET ---";
 if (!isset($_GET) || empty($_GET))
 {
		$getBloc .= "\nPAS de variables \$_GET";
	} else {
		foreach ( $_GET as $pkey=>$pvalue )
		{
			if (is_array($pvalue))
			{
				$getBloc .= "\nVecteur associatif: $pkey\n";
				foreach($pvalue as $item=>$value)
				{
					$getBloc .= "\n\t[$item]:$value, ";
				}
				$getBloc .= "\n";
			}
			if (is_array($pvalue))
			{
				$getBloc .= "\nVecteur simple: $pkey: {";
				foreach($pvalue as $value)
				{
					$getBloc .= "\n\t$value, ";
				}
				$getBloc .= "\n}";
			} else
			{
				$getBloc .= "\n$pkey:\t[$pvalue]\n";
			}
	 }
	}
	$getBloc .= "<br/>";
	
	/* --------------------- SESSION -------------*/ 	 	
	$sessionBloc = "--- SESSION ---";
 if (!isset($_SESSION) || empty($_SESSION))
 {
		$sessionBloc .= "\nPAS de variables \$_SESSION";
	} else 
 {
		foreach($_SESSION as $pkey=>$pvalue)
		{
			if (is_array($pvalue))
			{
				$sessionBloc .= "\nVecteur associatif: $pkey\n";
				foreach($pvalue as $item=>$value)
				{
     if(is_array($value)) $value = "[...array...]";
					$sessionBloc .= "\n\t[$item]:$value, ";
				}
				$sessionBloc .= "\n";
			}
			if (is_array($pvalue))
			{
				$sessionBloc .= "\nVecteur simple: $pkey: {";
				foreach($pvalue as $value)
				{
     if(is_array($value)) $value = "[...array...]";
					$sessionBloc .= "\n\t$value, ";
				}
				$sessionBloc .= "\n}";
			} else
			{
				 		$sessionBloc .= "\n$pkey:\t[$pvalue]\n";
			}
	 	}
		$sessionBloc .= "<br />--- FIN SESSION ---\n";
	}
	$sessionBloc .= "<br/>";	
	
	/* --------------------- COOKIE -------------*/ 	 	
 $cookieBloc = "--- COOKIE ---";
 if (!isset($_COOKIE)) 
 {
		$cookieBloc .= "\nPAS de variables \$_COOKIE";
	} else
 {
   foreach ( $_COOKIE as $pkey=>$pvalue )
   {
      $cookieBloc .= "\n$pkey:";
      if (is_array($pvalue))
      {
          $cookieBloc .= "&nbsp;&nbsp;&nbsp;(array)";
      } else
      {
          $cookieBloc .= "&nbsp;&nbsp;&nbsp;[$pvalue]";
      }
   }
	} // fin if cookie
	$cookieBloc .= "<br/>";	
	
 /* --------- AFFICHAGE COMPLET FINAL  -------------*/ 	 	
 $message = <<<EOD
 
  <div style="margin-top:20px;margin-left:100px;font-size:10pt;background-color:#EBF8A4;padding:10px;text-align:left">
   <pre>
    {$requestBloc}
    {$postBloc}
    {$getBloc}
    {$sessionBloc}
    {$cookieBloc}
   </pre>
  </div>
  
EOD;
 echo $message;
} // fin function debug_params

function utf8_enforce($str,$encoding='UTF-8')
{
 if($encoding != 'UTF-8')
 {
  $str = utf8_encode($str);
 }
 return $str;
}  // fin function utf8_enforce

function utf8_deforce($str,$encoding='UTF-8')
{
 if($encoding != 'UTF-8')
 {
   $str = utf8_decode($str);
 }
 return $str;
}  // fin function utf8_deforce

?>
