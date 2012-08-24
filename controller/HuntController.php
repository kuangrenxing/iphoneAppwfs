<?php
Globals::requireClass('Controller');
Globals::requireTable('Myitem');
Globals::requireTable('Mytag');
Globals::requireTable('Tag');
Globals::requireTable('User');
Globals::requireTable('Prodcomm');

class HuntController extends Controller
{
	
	protected $myitem;
	protected $tag;
	protected $mytag;
	protected $user;
	protected $prodcomm;
	
	public static $defaultConfig = array(
		'viewEnabled'	=> false,
		'layoutEnabled'	=> false,
		'title'			=> null
	);
	
	public function __construct($config = null)
	{
		parent::__construct($config);
		$this->myitem		= new MyitemTable($config);
		$this->tag			= new TagTable($config);
		$this->mytag		= new MytagTable($config);
		$this->user			= new UserTable($config);
		$this->prodcomm		= new ProdcommTable($config);
	}
	
	
	/**
	 * 根据tagID获取相关的单品列表
	 * tagid			tagID
	 * 
	 */
	public function tagmyitemAction(){
		$this->config['layoutEnabled'] = false;
		$this->config['viewEnabled'] = false;
		
		header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
		header("Content-Type: text/html; charset=UTF-8");
		
		$params = $this->getParams('tagid,page');
		$pageId = $params["page"];
		if(empty($pageId) && !$pageId){
			$pageId = 1;
		}
		$showPageSize = $this->pageSize*$this->cascade;
		
		$host 	= "192.168.100.14";
		$port 	= 3312;
		Globals::requireClass('SphinxApi');
		$cl = new SphinxClient ();
		$cl->SetServer ( $host, $port );
		$conf = array();
		
		$d  = 'up';
		$sort 	= 'tide';
		
		$sort_type	= array(
			'tide'	=>'rank desc , @id desc',
			'new'	=>'time_created DESC',
			'hot'	=>'rank desc , likenum DESC'
		);
		$conf	= array(
			'mode' 		=> SPH_MATCH_ALL,
			'index'		=> 'prod;d_prod',
//			'sortflag'	=> $d == "down" ? SPH_SORT_ATTR_ASC:SPH_SORT_ATTR_DESC,
			'sortflag'	=> SPH_SORT_EXTENDED,
			'sortmode'	=> $sort_type[$sort],
			'limit' 	=> 12,
			'ranker' 	=> SPH_RANK_PROXIMITY_BM25
		);
		
		$cl->ResetFilters();
		$cl->ResetGroupBy();
		$cl->SetMatchMode( $conf['mode'] );
		$cl->SetLimits(($pageId)*$conf['limit'] , $conf['limit']);
		$cl->SetRankingMode( $conf['ranker'] );
		$cl->SetArrayResult( true );
		$cl->SetSortMode( $conf['sortflag'] , $conf['sortmode']);
		
		$cl->SetFilter('tag_id' , array($params["tagid"]));
		$cl->SetFilter('del' , array(0));
//		$cl->SetFilter('flag' , array(1));

		$q = '';
		$res 	= $cl->Query($q, $conf['index']);
		$list = array();
		if($res !== false){
			if(is_array($res["matches"])){
				foreach($res["matches"] as $val)
				$docids[] = $val['id'];
			}

			if (count($docids)){
				$list	= $this->myitem->listAll("id in (".implode(',' , $docids).")" , 'id desc');
				$uid_arr = array();
		    	for($i=0;$i<count($list);$i++){
					
		        	$val = $list[$i];
					$uid_arr[] = $val['uid'];	
		       	 	$val['msrc'] = IMAGE_DOMAIN.getPropath($val['img_url'],200);
		        	$val['link'] = "/?m=mt&detail.php?id=".$val['id'];
		        	$val['wh'] = getWH(array($val['ow'],$val['oh']),95);
		        	$list[$i]=$val;
		        	unset($val);
		    	}
				
				//获取用户数据
				if (count($uid_arr)){
					$userList = $this->user->getUserByIds($uid_arr);
					unset($userList);
				}
			}
			$count		= $res['total_found'];
			$this->view->paging = $this->getPaging($count, $pageSize, $pageId , 3);
		}
		global $BUY_URL,$TRYOUT_IMG_URL;
	  	if(count($list) > 0){
		  	foreach ($list as $key => $value){
		  		$list[$key]["source_site_url"] = $BUY_URL."?m=go&id=".$value['id'];
				
				$list[$key]['img_url_200'] = $TRYOUT_IMG_URL.getPropath($value['img_url'],200);
				
				$list[$key]['img_url_400'] = $TRYOUT_IMG_URL.$value['img_url'];
				$list[$key]['width'] = 200;
				$list[$key]['height'] = floor($value["oh"]*(200/$value["ow"]));
				if(!isset($value["summary"])){
					$list[$key]["summary"] = '';
				}
				$list[$key]['img_url'] = $TRYOUT_IMG_URL.$value['img_url'];
		  	}
		  	echo $this->customJsonEncode($list);
	  	}else{
	  		echo "";
	  	}
	}
	
	/**
	 * 单品详情
	 * id		单品ID
	 */
	public function huntinfoAction(){
		$this->config['layoutEnabled'] = false;
		$this->config['viewEnabled'] = false;
		
		header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
		header("Content-Type: text/html; charset=UTF-8");
		
		$id = $this->getIntParam("id");
		global $BUY_URL,$TRYOUT_IMG_URL;
		$huntinfo = $this->myitem->getRow($id);
		if($huntinfo){
			$huntinfo["source_site_url"] = $BUY_URL."?m=go&id=".$huntinfo['id'];
			$huntinfo['img_url_200'] = $TRYOUT_IMG_URL.getPropath($huntinfo['img_url'],200);
			$huntinfo['img_url_400'] = $TRYOUT_IMG_URL.$huntinfo['img_url'];
			$huntinfo['img_url'] = $TRYOUT_IMG_URL.$huntinfo['img_url'];
			$huntinfo['width'] = 200;
			$huntinfo['height'] = floor($huntinfo["oh"]*(200/$huntinfo["ow"]));
			
			$where 		= array('item_id' => $huntinfo['id'] , 'zf_id' => 0 , 'pl_id' => 0);
			$prodcomm	= $this->prodcomm->listAll($where, 'id desc');
			foreach ($prodcomm as $key => $value){
				$prodcomm[$key]["head_pic"] = $TRYOUT_IMG_URL.$value["head_pic"];
			}
			$huntinfo["prodcomm"] = $prodcomm;
			
			$userInfo = $this->user->getRow($huntinfo['uid']);
			$userInfo["head_pic"] = $TRYOUT_IMG_URL.$userInfo["head_pic"];
			$huntinfo["userinfo"] = $userInfo;
			
			echo $this->customJsonEncode($huntinfo);
		}else{
			echo "";exit();
		}
	}
	
	/**
	 * 根据风格分类获取单品列表
	 * typeid			风格分类ID[不可以为空]	气场女王[4],职场摩登[1],清新森系[7],休闲星期五[10],约会达人[11],夜场秀[2],闺蜜逛街[8],派对女王[5],男士正装[3],休闲格调[6],品位IT男[9],英伦风范[12]
	 * pageid			页码
	 */
	public function stylemyitemsAction(){
		$this->config['layoutEnabled'] = false;
		$this->config['viewEnabled'] = false;
		
		header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
		header("Content-Type: text/html; charset=UTF-8");
		
		$pxid = $this->getIntParam("typeid");
		
		$where = array();
		$where[] = "style = $pxid";
		Globals::requireTable('HomeProd');
		$homeprod = new HomeProdTable($this->config);
		$count		= $homeprod->listCount($where);
		$pageSize	= 12;
		$this->view->paging		= $this->getPaging($count, $pageSize, $pageId);
		$data	= $homeprod->listPage($where, 'id desc', $pageSize, $pageId);
		
		foreach ($data as $key_0 => $value_0){
			$arr_itemid[] = $value_0["connid"];
		}
		Globals::requireTable('Myitem');
		$homemyitem = new MyitemTable($this->config);
		$itemsArr = $homemyitem->listAll("id in (".implode(',' , $arr_itemid).")" , 'id desc');
		foreach ($itemsArr as $key => $value){
			$itemsArr[$key]["source_site_url"] = $BUY_URL."?m=go&id=".$value['id'];
			$itemsArr[$key]['img_url_200'] = $TRYOUT_IMG_URL.getPropath($value['img_url'],200);
			$itemsArr[$key]['img_url_400'] = $TRYOUT_IMG_URL.$value['img_url'];
			$itemsArr[$key]['img_url'] = $TRYOUT_IMG_URL.$value['img_url'];
			$itemsArr[$key]['width'] = 200;
			$itemsArr[$key]['height'] = floor($value["oh"]*(200/$value["ow"]));
		}
		echo $this->customJsonEncode($itemsArr);
		exit();
	}
	
	/**
	 * 单品搜索
	 */
	public function searcheitmeAction(){
		$this->config['layoutEnabled'] = false;
		$this->config['viewEnabled'] = false;
		
		header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
		header("Content-Type: text/html; charset=UTF-8");
		
		$query 	= $this->getParam('q');
		$query  = urldecode($query);
		
		$q	= '';
		if($query){
			$q 	= trim($query) ? '*'.trim($query).'*' : '';
		}
		
		$host 	= "192.168.100.14";
		$port 	= 3312;
		Globals::requireClass('SphinxApi');
		$cl = new SphinxClient();
		$cl->SetServer ( $host, $port );
		
		$page 	= $this->getIntParam('page');
		$page 	= $page <= 0 ? 1 : $page;
		
		$d 		= in_array($this->getParam('d') , array('up','down')) ? $this->getParam('d') : 'up';
		$sort 	= "time";
		$sort 	= in_array($sort , array('view','time','favor','price')) ? $sort : 'view';
		$sort_type	= array(
	        'view'=>'view',
	        'favor'=>'favor',
	        'price'=>'price',
	        'time'=>'time_created'
        );
	  	$conf	= array(
	  		'mode' 		=> SPH_MATCH_ALL,
	  		'index'		=>'prod;d_prod',
	  		'sortflag'	=> $d=="down" ? SPH_SORT_ATTR_ASC:SPH_SORT_ATTR_DESC,
	  		'sortmode'	=> $sort_type[$sort],
	  		'limit' 	=>12,
	  		'ranker' 	=> SPH_RANK_PROXIMITY_BM25
	  	);
		$cl->ResetFilters();
	  	$cl->ResetGroupBy();
	  	$cl->SetMatchMode( $conf['mode'] );
	  	$cl->SetLimits(($page-1)*$conf['limit'],$conf['limit']);
	  	$cl->SetRankingMode( $conf['ranker'] );
	  	$cl->SetArrayResult( true );
	  	$cl->SetSortMode( $conf['sortflag'] , $conf['sortmode']);
	  	$res 	= $cl->Query($q, $conf['index']); 
	  	//print_r($conf);die;
		if($res !== false){
	    	if(is_array($res["matches"])){
	      		foreach($res["matches"] as $val)
	        		$docids[] = $val['id'];
	    	}

	    	if (count($docids)){
		    	$list	= $this->myitem->listAll("id in (".implode(',' , $docids).")" , 'id desc');
				$uid_arr = array();
		    	for($i=0;$i<count($list);$i++){
					
		        	$val = $list[$i];
					$uid_arr[] = $val['uid'];	
		       	 	$val['msrc'] = IMAGE_DOMAIN.getPropath($val['img_url'],200);
		        	$val['link'] = "/?m=mt&detail.php?id=".$val['id'];
		        	$val['wh'] = getWH(array($val['ow'],$val['oh']),95);
		        	$list[$i]=$val;
		        	unset($val);
		    	}
				
				//获取用户数据
				if (count($uid_arr)){
					$userList = $this->user->getUserByIds($uid_arr);
					unset($userList);
				}
	    	}
	    	
	    	$pageSize 	= $conf['limit'];
	    	$count		= $res['total_found'];
	    	$this->view->paging = $this->getPaging($count, $pageSize, $pageId);
	  	}
	  	global $BUY_URL,$TRYOUT_IMG_URL;
	  	if(count($list) > 0){
		  	foreach ($list as $key => $value){
		  		$list[$key]["source_site_url"] = $BUY_URL."?m=go&id=".$value['id'];
				
				$list[$key]['img_url_200'] = $TRYOUT_IMG_URL.getPropath($value['img_url'],200);
				
				$list[$key]['img_url_400'] = $TRYOUT_IMG_URL.$value['img_url'];
				$list[$key]['width'] = 200;
				$list[$key]['height'] = floor($value["oh"]*(200/$value["ow"]));
				if(!isset($value["summary"])){
					$list[$key]["summary"] = '';
				}
				$list[$key]['img_url'] = $TRYOUT_IMG_URL.$value['img_url'];
		  	}
		  	echo $this->customJsonEncode($list);
	  	}else{
	  		echo "";
	  	}
	}
	
	/**
	 * 由于php的json扩展自带的函数json_encode会将汉字转换成unicode码
	 * 所以我们在这里用自定义的json_encode，这个函数不会将汉字转换为unicode码
	*/
	public function customJsonEncode($a = false) {
		if(is_null($a)) return 'null';
		if($a === false) return 'false';
		if($a === true) return 'true';
		if(is_scalar($a)){
			if(is_float($a)){
				//Always use "." for floats.
				return floatval(str_replace(",", ".", strval($a)));
			}
			if(is_string($a)){
				static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\', '/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
				return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
			}else{
				return $a;
			}
		}
		$isList = true;
		for($i = 0,reset($a);$i < count($a);$i++,next($a)){
			if(key($a) !== $i){
				$isList = false;
				break;
			}
		}
		$result = array();
		if($isList){
			foreach($a as $v) $result[] = $this->customJsonEncode($v);
			return '[' . join(',', $result) . ']';
		}else{
			foreach ($a as $k => $v) $result[] = $this->customJsonEncode($k).':'.$this->customJsonEncode($v);
			return '{' . join(',', $result) . '}';
		}
	}
	
}

Config::extend('HuntController', 'Controller');
