<?php
/*
*2012年4月16日增加getClothesList方法
*2012年4月16日增加getClothesListCount方法
*2012年4月16日增加getWhere方法
*2012年4月16日增加getOrder方法
*/
Globals::requireClass('Table');

class MytagTable extends Table{
	protected $cascade=7;//瀑布流可以下拉多少屏
	public static $defaultConfig=array(
		'table' => 'tb_mytag'
	);
	
	public function getClothesList($where,$order,$pageSize=0,$pageId=0,$togo=0){
		$sql="SELECT A.* FROM `tb_myitem` AS A LEFT JOIN `tb_mytag` AS B ON A.`id`=B.`my_id`";
		$sql.=$this->getWhere($where,$order);
		if(!empty($order)){
			$sql.=' ORDER BY '.$this->getOrder($order);	
		}
		if(is_numeric($pageSize)&&$pageSize){
        	if(!$togo){//点击分页按钮时候
				$offsetInt=is_numeric($pageId)&&$pageId?($pageId-1)*$pageSize*$this->cascade:0;
			}else{//瀑布流加载时候
				$offsetInt=(($pageId-1)*$this->cascade+($togo-1))*$pageSize;
			}
        	$sql.=" LIMIT ".$offsetInt.",".$pageSize;
        }
		$res=$this->database->query($sql);
		$res=$this->database->getList($res);
		if($order!='new'){
			shuffle($res);
		}
        return $res;
	}
	public function getClothesListCount($where,$order=''){
		$sql="SELECT count(*) AS C FROM `tb_myitem` AS A LEFT JOIN `tb_mytag` AS B ON A.`id`=B.`my_id`";
		$sql.=$this->getWhere($where,$order);
		$res=$this->database->query($sql);
        $res=$this->database->getList($res);
        return $res[0]['C'];
	}
	function getWhere($where,$order=''){
		$sql=" WHERE A.`del`=0 AND A.`flag`=1";
		if(!isset($where['c_id'])){
//			$sql.=" AND ((A.cat_1>=1000 AND A.cat_1<1900) OR (A.cat_2>=1000 AND A.cat_2<1900) OR (A.cat_3>=1000 AND A.cat_3<1900))";
			$sql.=" AND ((A.cat_1>=1000 AND A.cat_1<1900))";
		}else{
			switch($where['c_id']){
				case 1://衣服
//					$sql.=" AND ((A.`cat_1`>=1100 AND A.`cat_1`<1400) OR (A.`cat_2`>=1100 AND A.`cat_2`<1400) OR (A.`cat_3`>=1100 AND A.`cat_3`<1400))";
					$sql.=" AND ((A.`cat_1`>=1100 AND A.`cat_1`<1400))";
				break;
				case 2://鞋子
//					$sql.=" AND ((A.`cat_1`>=1600 AND A.`cat_1`<1700) OR (A.`cat_2`>=1600 AND A.`cat_2`<1700) OR (A.`cat_3`>=1600 AND A.`cat_3`<1700))";
					$sql.=" AND ((A.`cat_1`>=1600 AND A.`cat_1`<1700))";
				break;
				case 3://包包
//					$sql.=" AND ((A.`cat_1`>=1400 AND A.`cat_1`<1600) OR (A.`cat_2`>=1400 AND A.`cat_2`<1600) OR (A.`cat_3`>=1400 AND A.`cat_3`<1600))";
					$sql.=" AND ((A.`cat_1`>=1400 AND A.`cat_1`<1600))";
				break;
				case 4://配饰
//					$sql.=" AND ((A.`cat_1`>=1700 AND A.`cat_1`<1800) OR (A.`cat_2`>=1700 AND A.`cat_2`<1800) OR (A.`cat_3`>=1700 AND A.`cat_3`<1800))";
					$sql.=" AND ((A.`cat_1`>=1700 AND A.`cat_1`<1800))";
				break;
				case 5://内衣
//					$sql.=" AND ((A.`cat_1`>=1800 AND A.`cat_1`<1900) OR (A.`cat_2`>=1800 AND A.`cat_2`<1900) OR (A.`cat_3`>=1800 AND A.`cat_3`<1900))";
					$sql.=" AND ((A.`cat_1`>=1800 AND A.`cat_1`<1900))";
				break;
				case 6://婚庆
					$sql.="";
				break;
				case 7://男士
//					$sql.=" AND ((A.`cat_1`>=2000 AND A.`cat_1`<3000) OR (A.`cat_2`>=2000 AND A.`cat_2`<3000) OR (A.`cat_3`>=2000 AND A.`cat_3`<3000))";
					$sql.=" AND ((A.`cat_1`>=2000 AND A.`cat_1`<3000))";
				break;
				case 8://童装
//					$sql.=" AND ((A.`cat_1`>=4000 AND A.`cat_1`<5000) OR (A.`cat_2`>=4000 AND A.`cat_2`<5000) OR (A.`cat_3`>=4000 AND A.`cat_3`<5000))";
					$sql.=" AND ((A.`cat_1`>=4000 AND A.`cat_1`<5000))";
				break;
				default:
//					$sql.=" AND ((A.cat_1>=1000 AND A.cat_1<1900) OR (A.cat_2>=1000 AND A.cat_2<1900) OR (A.cat_3>=1000 AND A.cat_3<1900))";
					$sql.=" AND ((A.cat_1>=1000 AND A.cat_1<1900))";
				break;
			}
		}
		if(isset($where['tag_id'])&&is_numeric($where['tag_id'])&&$where['tag_id']){
			$sql.=" AND B.`tag_id`=".$where['tag_id'];
		}
		if(isset($where['price'])){
			switch($where['price']){
				case '1'://100元以下
					$sql.=" AND A.`price`<=100";
				break;
				case '12'://100元-200元
					$sql.=" AND A.`price`>100 AND A.`price`<=200";
				break;
				case '25'://200元-500元
					$sql.=" AND A.`price`>200 AND A.`price`<=500";
				break;
				case '5'://500元以上
					$sql.=" AND A.`price`>500";
				break;
			}
		}
		switch($order){
			case 'tide':
				//$sql.=" AND A.`time_created`>'".strtotime('-7 day')."'";
				$sql.="";
			break;
			default:
				$sql.="";
			break;
		}
		return $sql;
	}
	public function getOrder($order){
		switch($order){
			case 'hot':
//				$order=array('A.`rank` DESC','A.`likenum` DESC');
				$order=array('A.`rank` DESC');
			break;
			case 'new':
				$order=array('A.`id` DESC');
			break;
			case 'tide'://潮流排序，延续以前的最热的算法
				$order=array('`rank` DESC','`id` DESC');
			break;
			default://潮流排序，延续以前的最热的算法
				$order=array('`rank` DESC','`id` DESC');
			break;
		}
		return $this->database->getOrder($order);
	}
}

Config::extend('MytagTable', 'Table');