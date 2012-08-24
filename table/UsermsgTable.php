<?php
/**
 * 推送给用户的信息
 * zz@09.14
 */
Globals::requireClass('Table');

class UsermsgTable extends Table
{
	public static $defaultConfig = array(
		'table' => 'tb_usermsg'
	);
	
	//推送消息
	public function pushMsg($pushUid , $actId)
	{
		//获取用户好友
		$sql = "select * from tb_friend where friend_uid = $pushUid";
		
		$res  	= $this->database->query($sql);
        $data  	= $this->database->getList($res);
        
        $mutFriend = $fans = array($pushUid);
        if (count($data) > 0){
        	foreach ($data as $row)
        	{
        		if ($row['status'] == FRIEND_STATUS_YES){
        			//相互关注
        			$mutFriend[] = $row['uid'];
        		}
        		
        		//关注该用户的粉丝
        		$fans[] = $row['uid'];
        	}
        }
        
        $mutFriend = array_unique($mutFriend);
        $fans	= array_unique($fans);
        
        //分表sql
        $sql_insert_1 = $sql_insert_2 = $sql_insert_3 = $sql_insert_4 = $sql_insert_5 = $sql_insert_6 = $sql_insert_7 = $sql_insert_8 = $sql_insert_9 = $sql_insert_10 = "";
        $ins_time = time();
        
        //push 消息(相互关注)
        if (count($mutFriend) > 0){
        	foreach ($mutFriend as $mid){
        		//处理分表
        		$tb_id = $mid % 10 + 1;
        		${"sql_insert_".$tb_id} .= "($pushUid , $mid , 0 , $actId , ".USER_MSG_TYPE_FOLLOWS." , $ins_time),";
        		unset($tb_id);
        	}
        	for($i = 1 ; $i < 11 ; $i ++){
	        	if ('' != ${"sql_insert_".$i}){
	        		$insertSQL = "insert into tb_usermsg_$i (p_uid , receive_uid , ugroup , act_id , type , createtime) values ".trim(${"sql_insert_".$i} , ',');
	        		$this->database->query($insertSQL);
	        		unset($insertSQL);
	        	}
        	}
        	unset($i , $mid);
        }
        
        //push 消息(一般)
        if (count($fans) > 0){
        	foreach ($fans as $fid){
        		//处理分表
        		$tb_id = $fid % 10 + 1;
        		${"sql_insert_".$tb_id} .= "($pushUid , $fid , 0 , $actId , ".USER_MSG_TYPE_NORMAL." , $ins_time),";
        		unset($tb_id);
        	}
        	for($i = 1 ; $i < 11 ; $i ++){
	        	if ('' != ${"sql_insert_".$i}){
	        		$insertSQL = "insert into tb_usermsg_$i (p_uid , receive_uid , ugroup , act_id , type , createtime) values ".trim(${"sql_insert_".$i} , ',');
	        		$this->database->query($insertSQL);
	        		unset($insertSQL);
	        	}
        	}
        	unset($i , $ins_time , $fid);
        }
	}
	
	//拉消息
	public function findUserMsg($uid = 0, $pageSize = 0 , $pageId = 0)
	{
		
	}
	
	// zz @04.11
	public function getlistCount($where = null)
	{
		//处理分表
		if (isset($where['receive_uid']) && $where['receive_uid']){
			$this->setTable("tb_usermsg_".($where['receive_uid'] % 10 + 1));
		}
		
		return $this->listCount($where);
	}
	
	// zz @04.11
	public function getlistPage($where = null, $order = null, $pageSize = null, $pageId = 1, $group = null)
	{
		//处理分表
		if (isset($where['receive_uid']) && $where['receive_uid']){
			$this->setTable("tb_usermsg_".($where['receive_uid'] % 10 + 1));
		}
		
		return $this->listPage($where, $order, $pageSize, $pageId, $group);
	}
}

Config::extend('UsermsgTable', 'Table');