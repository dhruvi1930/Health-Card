<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php 
include "connection.php";
    

                


if(!empty($_POST["diag"])){ 
	$diag = $_POST["diag"];
	$query = "SELECT * FROM prescription where diagnosis='$diag'";
			
                $result = mysqli_query($con,$query);
               
                $count = 1;
                $arr = [];
                if( mysqli_num_rows($result)>0)
                {while($row = mysqli_fetch_array($result) )
                {
                    
                    $med = $row['medicine']; 
                    $med_arr = explode (",", $med); 
                 	$ite=0;
                 	$var=sizeof($med_arr);
                    while($ite!=$var) 
                    { 
                     	array_push($arr, $med_arr[$ite]);
                        $ite=$ite+1;
                    } 
                    $count++;
                }
                $narr=array();
				foreach($arr as $k=>$v)
				{
        		if(!in_array($v, $narr))
        		{
        				$narr[]=$v;
        		}
    			}
    			$carr=array();
    			$c=0;
    			foreach ($narr as $key => $value)
    			{
    				foreach ($arr as $key1 => $value1)
    				{
    					if($value1==$value)
    					{
    						$c=$c+1;
    					}
    				}
    				$carr[]=$c;
    				$c=0;
    			}
				$s=sizeof($narr);
				$t=0;
				$p=array();
				while ( $t<$s)
				{
						$p[$narr[$t]] = $carr[$t];
						$t=$t+1;
				}
				$t=0;
				$r="";
				arsort($p);
				foreach ($p as $key => $value)
				{
					if($t<2)
					{
						$r=$r.$key.",";
					}
					elseif($t==2)
					{
						$r=$r.$key;
						
					}
					
					$t=$t+1;
				}
				echo $r;}
				else{
					echo "No suggestion";
				}
                
				
     
    
}else
{
	echo "No suggestion";
}
?>