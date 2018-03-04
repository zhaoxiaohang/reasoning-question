<?php

//验证答案

function check($arr){

    //第一题

    //第二题
    if(!(($arr[1]==0 && $arr[4]==2)
        || ($arr[1]==1 && $arr[4]==3)
        || ($arr[1]==2 && $arr[4]==0)
        || ($arr[1]==3 && $arr[4]==1))
    ){
        return false;
    }

    //第三题
    if(!(($arr[2]==0 && $arr[5]==$arr[1] && $arr[1]==$arr[3])
        || ($arr[2]==1 && $arr[2]==$arr[1] && $arr[1]==$arr[3])
        || ($arr[2]==2 && $arr[2]==$arr[5] && $arr[5]==$arr[3])
        || ($arr[2]==3 && $arr[2]==$arr[5] && $arr[5]==$arr[1]))
    ){
        return false;
    }

    //第四题
    if(!(($arr[3]==0 && $arr[0]==$arr[4])
        || ($arr[3]==1 && $arr[1]==$arr[6])
        || ($arr[3]==2 && $arr[0]==$arr[8])
        || ($arr[3]==3 && $arr[5]==$arr[9]))
    ){
        return false;
    }

    //第五题
    if(!(($arr[4]==0 && $arr[7]==0)
        || ($arr[4]==1 && $arr[3]==1)
        || ($arr[4]==2 && $arr[8]==2)
        || ($arr[4]==3 && $arr[6]==3))
    ){
        return false;
    }

    //第六题
    if(!(($arr[5]==0 && $arr[7]==$arr[1] && $arr[7]==$arr[3])
        || ($arr[5]==1 && $arr[7]==$arr[0] && $arr[7]==$arr[5])
        || ($arr[5]==2 && $arr[7]==$arr[2] && $arr[7]==$arr[9])
        || ($arr[5]==3 && $arr[7]==$arr[4] && $arr[7]==$arr[8]))
    ){
        return false;
    }

    //第七题
    $arr_count = array(0,0,0,0);
    foreach ($arr as $item){
        switch ($item){
            case 0:
                $arr_count[0] ++;
                break;
            case 1:
                $arr_count[1] ++;
                break;
            case 2:
                $arr_count[2] ++;
                break;
            case 3:
                $arr_count[3] ++;
                break;
            default:
                break;
        }
    }
    $count_min = array_search(min($arr_count),$arr_count);
    if(!(($arr[6]==0 && $count_min==2)
        || ($arr[6]==1 && $count_min==1)
        || ($arr[6]==2 && $count_min==0)
        || ($arr[6]==3 && $count_min==3))
    ){
        return false;
    }
    
    //第八题
    if(!(($arr[7]==0 && abs($arr[0]-$arr[6])!=1 && abs($arr[0]-$arr[4])==1 && abs($arr[0]-$arr[1])==1 && abs($arr[0]-$arr[9])==1)
        || ($arr[7]==1 && abs($arr[0]-$arr[4])!=1 && abs($arr[0]-$arr[6])==1 && abs($arr[0]-$arr[1])==1 && abs($arr[0]-$arr[9])==1)
        || ($arr[7]==2 && abs($arr[0]-$arr[1])!=1 && abs($arr[0]-$arr[4])==1 && abs($arr[0]-$arr[6])==1 && abs($arr[0]-$arr[9])==1)
        || ($arr[7]==3 && abs($arr[0]-$arr[9])!=1 && abs($arr[0]-$arr[4])==1 && abs($arr[0]-$arr[1])==1 && abs($arr[0]-$arr[6])==1))
    ){
        return false;
    }
    
    //第九题
    if(!(($arr[8]==0 && ($arr[0]==$arr[5] xor $arr[4]==$arr[5]))
        || ($arr[8]==1 && ($arr[0]==$arr[5] xor $arr[4]==$arr[9]))
        || ($arr[8]==2 && ($arr[0]==$arr[5] xor $arr[4]==$arr[1]))
        || ($arr[8]==3 && ($arr[0]==$arr[5] xor $arr[4]==$arr[8])))
    ){
        return false;
    }

    //第十题
    $max = max($arr_count);
    $min = min($arr_count);
    if(!(($arr[9]==0 && $max-$min==3)
        || ($arr[9]==1 && $max-$min==2)
        || ($arr[9]==2 && $max-$min==4)
        || ($arr[9]==3 && $max-$min==1))
    ){
        return false;
    }

    return true;
}

//格式化答案
function formatABCD($arr){
    $return = array();
    foreach ($arr as $key => $item){
        switch ($item){
            case 0:
                $return[$key] = 'A';
                break;
            case 1:
                $return[$key] = 'B';
                break;
            case 2:
                $return[$key] = 'C';
                break;
            case 3:
                $return[$key] = 'D';
                break;
        }
    }
    return implode(',',$return);
}

//生成答案数组
for($i=0;$i<pow(4,10);$i++){
    //10进制 转 4进制
    $result = base_convert($i,10,4);
    $result = str_split($result);
    $arr_result = array_merge(array_fill(0,10-count($result),'0'),$result);
    if(check($arr_result)){
        echo formatABCD($arr_result);
        echo "\n";
        break;
    }else{
        continue;
    }
}
