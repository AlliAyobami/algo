<?php
   function trader ($prices){   
      $n = count($prices);
    foreach ($prices as $key => $price){         
       $leftOver=array_slice($prices,($key+1),$n);      
       $ln = count($leftOver);                     
        if ($ln >= 1){                            
            for($i=1; $i<=$ln; $i++){   
                   if($price<$prices[$key+$i]){      
                      $gains[] = [ 
                         'stindex' => $price,
                         'profit' => $prices[$key+$i]-$price,
                         'ltindex' => $prices[$key+$i]
                         ];
                   }
            }
         }
    }
       $maxProfit = max(array_column($gains, 'profit'));   
       foreach ($gains as $gain) {
          if ($gain['profit'] == $maxProfit) {
             echo "The best time to buy is at $gain[stindex], and the best time to sell is at $gain[ltindex] your profit will be $gain[profit]"; 
          }
       }
   }
   
  trader ([12, 13, 11, 10, 14, 17]);