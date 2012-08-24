<?php
Globals::requireClass('Table');

class MyitemTable extends Table
{
	public static $defaultConfig = array(
		'table' => 'tb_myitem'
	);
	
	public function getItemByIds($idArr)
	{
		$ids 	= '';
		$idArr 	= array_unique($idArr);
		$ids 	= implode(',' , $idArr);
		$ids   	= trim($ids , ',');
		
		$data   = array();
		if (count($idArr) && '' != $ids){
        	$list  	= $this->listAll("id in (".$ids.")" , 'id desc');
        	if (is_array($list) && count($list)){
        		foreach ($list as $row){ $data[$row['id']] = $row;}
        	}
		}
		
		return $data;
	}
	
	public function getPriceItemByIds($idArr){
		$ids 	= '';
		$idArr 	= array_unique($idArr);
		$ids 	= implode(',' , $idArr);
		$ids   	= trim($ids , ',');
	
		$data   = array();
		if (count($idArr) && '' != $ids){
			$list  	= $this->listAll("id in (".$ids.") " , 'id desc');
			if (is_array($list) && count($list)){
				foreach ($list as $row){ $data[$row['id']] = $row;}
			}
		}
	
		return $data;
	}
}

Config::extend('MyitemTable', 'Table');