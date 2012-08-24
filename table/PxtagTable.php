<?php
Globals::requireClass('Table');

class PxtagTable extends Table
{
	public static $defaultConfig = array(
		'table' => 'tb_pxtag'
	);
	
	public function getPxTags($pxid)
	{
		$sql = "select pt.*,t.* from tb_pxtag pt left join tb_tag t on pt.tag_id=t.id where px_id = $pxid";
		
		$res 	= $this->database->query($sql);
		$data	= $this->database->getList($res);
		
		return $data;
	}
	
	public function getPxLists($n_where, $pageSize=0, $pageId=0)
	{
	
		if(!isset($n_where['tag'])) {
			$sql = "SELECT * FROM `tb_pinxiu` WHERE status = 1 " ;
			if (!empty($n_where)) {
				if(isset($n_where['pcat']) && !empty($n_where['pcat'])) {
					switch ($n_where['pcat']) {
						case 1:
							$sql .= " AND maincat_id in (1,  4, 7, 8)";
							break;
						case 2:
							$sql .= " AND maincat_id in (2, 5, 10, 11)";
							break;	
						case 3:
							$sql .= " AND maincat_id = 14";
							break;	
						case 4:
							$sql .= " AND maincat_id in (3, 6, 9, 12)";
							break;
						case 5:
							$sql .= " AND maincat_id = 13";
							break;	
					}															
				}
				if (isset($n_where['sex'])) {
					$sql .= " AND sex = " . $n_where['sex'];
				}
//				$sql .= " AND istop = 1";
				if (isset($n_where['order'])) {
					if ($n_where['order'] == "fashion") {
						$sql .= " ORDER BY comment DESC, id DESC ";
					} elseif ($n_where['order'] == "new") {
						$sql .= " ORDER BY id DESC ";
					} elseif ($n_where['order'] == "top") {
						$sql .= " ORDER BY istop DESC, id DESC ";
					}	
				}				
			}
		} else {
			$sql = "SELECT p.* FROM `tb_pxtag` t LEFT JOIN `tb_pinxiu` p ON t.px_id = p.id WHERE p.status = 1 " ;
			if (!empty($n_where)) {
				if(isset($n_where['pcat']) && !empty($n_where['pcat'])) {
					switch ($n_where['pcat']) {
						case 1:
							$sql .= " AND p.maincat_id in (1,  4, 7, 8)";
							break;
						case 2:
							$sql .= " AND p.maincat_id in (2, 5, 10, 11)";
							break;	
						case 3:
							$sql .= " AND p.maincat_id = 14";
							break;	
						case 4:
							$sql .= " AND p.maincat_id in (3, 6, 9, 12)";
							break;
						case 5:
							$sql .= " AND p.maincat_id = 13";
							break;	
					}														
				}		
				if (isset($n_where['sex'])) {
					$sql .= " AND p.sex = " . $n_where['sex'];
				}
				$sql .= " AND t.tag_id = " . $n_where['tag'];
//				$sql .= " AND p.istop = 1";
				if (isset($n_where['order'])) {
					if ($n_where['order'] == "fashion") {
						$sql .= " ORDER BY p.comment DESC, p.id DESC ";
					} elseif ($n_where['order'] == "new") {
						$sql .= " ORDER BY p.id DESC ";
					} elseif ($n_where['order'] == "top") {
						$sql .= " ORDER BY p.istop DESC, p.id DESC ";
					}	
				}					
			}
		}
		if(is_numeric($pageSize)&&$pageSize){
        	//瀑布流加载时候
			$offsetInt=($pageId -1)*$pageSize;
        	$sql.=" LIMIT ".$offsetInt.",".$pageSize;
        }
		$res=$this->database->query($sql);
		$res=$this->database->getList($res);
        return $res;        		
	}
	public function getPxListsCount($n_where)
	{
		if(!isset($n_where['tag'])) {
			$sql = "SELECT count(*) AS C FROM `tb_pinxiu` WHERE status = 1 " ;
			if (!empty($n_where)) {
				if(isset($n_where['pcat']) && !empty($n_where['pcat'])) {
					switch ($n_where['pcat']) {
						case 1:
							$sql .= " AND maincat_id in (1,  4, 7, 8)";
							break;
						case 2:
							$sql .= " AND maincat_id in (2, 5, 10, 11)";
							break;	
						case 3:
							$sql .= " AND maincat_id = 14";
							break;	
						case 4:
							$sql .= " AND maincat_id in (3, 6, 9, 12)";
							break;
						case 5:
							$sql .= " AND maincat_id = 13";
							break;	
					}														
				}
				if (isset($n_where['sex'])) {
					$sql .= " AND sex = " . $n_where['sex'];
				}
//				$sql .= " AND istop = 1";
				if (isset($n_where['order'])) {
					if ($n_where['order'] == "fashion") {
						$sql .= " ORDER BY comment DESC, id DESC ";
					} elseif ($n_where['order'] == "new") {
						$sql .= " ORDER BY id DESC ";
					} elseif ($n_where['order'] == "top") {
						$sql .= " ORDER BY istop DESC, id DESC ";
					}	
				}				
			}
		} else {
			$sql = "SELECT count(*) AS C FROM `tb_pxtag` t LEFT JOIN `tb_pinxiu` p ON t.px_id = p.id WHERE p.status = 1 " ;
			if (!empty($n_where)) {
				if(isset($n_where['pcat']) && !empty($n_where['pcat'])) {
					switch ($n_where['pcat']) {
						case 1:
							$sql .= " AND p.maincat_id in (1,  4, 7, 8)";
							break;
						case 2:
							$sql .= " AND p.maincat_id in (2, 5, 10, 11)";
							break;	
						case 3:
							$sql .= " AND p.maincat_id = 14";
							break;	
						case 4:
							$sql .= " AND p.maincat_id in (3, 6, 9, 12)";
							break;
						case 5:
							$sql .= " AND p.maincat_id = 13";
							break;	
					}															
				}		
				if (isset($n_where['sex'])) {
					$sql .= " AND p.sex = " . $n_where['sex'];
				}	
				$sql .= " AND t.tag_id = " . $n_where['tag'];
//				$sql .= " AND p.istop = 1";
				if (isset($n_where['order'])) {
					if ($n_where['order'] == "fashion") {
						$sql .= " ORDER BY p.comment DESC, p.id DESC ";
					} elseif ($n_where['order'] == "new") {
						$sql .= " ORDER BY p.id DESC ";
					} elseif ($n_where['order'] == "top") {
						$sql .= " ORDER BY p.istop DESC, p.id DESC ";
					}	
				}					
			}
		}
		if(is_numeric($pageSize)&&$pageSize){
        	//瀑布流加载时候
			$offsetInt=($pageId -1)*$pageSize;
        	$sql.=" LIMIT ".$offsetInt.",".$pageSize;
        }
		$res=$this->database->query($sql);
		$res=$this->database->getList($res);
        return $res[0]['C'];      		
	}	
}

Config::extend('PxtagTable', 'Table');
