<?php
Globals::requireClass('Controller');
Globals::requireTable('Pinxiu');
Globals::requireTable('Pxitems');
Globals::requireTable('Pxtag');
Globals::requireTable('Myitem');
Globals::requireTable('Brand');

class PxgroupController extends Controller
{
	protected $pinxiu;
	protected $myitem;
	protected $pxitems;
	protected $pxtag;
	protected $brand;
	
	//用户单品分类
	protected $mt_cat_1 		= array("5" => "底纹","6" => "装饰","1" => "明星","2" => "海报","3" => "秀场","4" => "街拍","0" => "其他");
	
	//单品分类配置
	protected $product_cat_1 		= array("1" => "女装","2" => "男装", "3" => "其他" , "4" => "童装");
	//二级分类
	protected $product_cat_2_1 	= array("11" => "上装","12" => "下装","13" => "裙装", "14"=>"箱包",/* "15" => "中性款箱包", */ "16" => "女鞋","17" => "配饰", "18" => "内衣",);
	//
	protected $product_cat_3_11 	= array("1101"=>"大衣","1102"=>"风衣","1103"=>"夹克","1104"=>"西装","1105"=>"开衫","1106"=>"衬衫","1107"=>"卫衣","1108"=>"毛衣","1109"=>"针织衫","1110"=>"雪纺衫","1111"=>"T恤","1112"=>"吊带","1113"=>"比基尼/内衣","1114"=>"运动",);
	protected $product_cat_3_12 	= array("1201"=>"长裤","1202"=>"中裤","1203"=>"短裤","1204"=>"牛仔裤","1205"=>"连身裤","1206"=>"运动","1207"=>"legging",);
	protected $product_cat_3_13 	= array("1301"=>"连衣裙","1302"=>"半身裙","1303"=>"礼服/旗袍",);
	protected $product_cat_3_14 	= array("1401"=>"挎包","1402"=>"手提包","1403"=>"单肩包","1404"=>"手包","1405"=>"钱包/皮夹","1406"=>"零钱包","1407"=>"多功能包",);
	//$product_cat_3_15 = array("1501"=>"旅行包/拉杆箱","1502"=>"腰包","1503"=>"电脑包/商务包",);
	protected $product_cat_3_16 	= array("1601"=>"高跟鞋","1602"=>"平跟鞋","1603"=>"跛跟鞋","1604"=>"凉鞋","1605"=>"单鞋","1606"=>"短靴","1607"=>"中筒靴","1608"=>"长筒靴","1609"=>"休闲鞋","1610"=>"运动","1611"=>"厚底鞋",);
	protected $product_cat_3_17 	= array("1701"=>"项链","1702"=>"耳环","1703"=>"戒指","1704"=>"手镯/手链","1705"=>"脚链","1706"=>"帽子","1707"=>"皮带/腰带","1708"=>"围巾","1709"=>"领带","1710"=>"手套","1711"=>"手表","1712"=>"眼镜","1714"=>"发饰","1713"=>"其他",);
	protected $product_cat_3_18 	= array("1801"=>"内裤",'1802'=>'文胸','1803'=>'文胸套装','1804'=>'袜子','1805'=>'保暖内衣','1806'=>'家居服','1807'=>'睡衣','1808'=>'塑身衣','1809'=>'浴袍');
	
	protected $product_cat_2_2 	= array("21" => "上装","22" => "下装","23" => "箱包","24" => "男鞋","25" => "配饰","26" => "内衣");
	protected $product_cat_3_21 	= array("2101"=>"大衣","2102"=>"风衣","2103"=>"夹克","2104"=>"西装","2105"=>"卫衣","2106"=>"衬衫","2107"=>"开衫","2108"=>"毛衣","2109"=>"针织衫","2110"=>"T恤","2111"=>"POLO衫","2112"=>"马夹","2113"=>"背心","2114"=>"内衣","2115"=>"运动",);
	protected $product_cat_3_22 	= array("2201"=>"长裤","2202"=>"短裤","2203"=>"牛仔裤","2204"=>"休闲裤","2205"=>"西裤","2206"=>"运动",);
	protected $product_cat_3_23 	= array("2301"=>"手提包","2302"=>"单肩包","2303"=>"手包","2304"=>"钱包/皮夹","2305"=>"多功能包","2306"=>"公文包",);
	protected $product_cat_3_24 	= array("2401"=>"皮鞋","2402"=>"凉鞋","2403"=>"短靴","2404"=>"中筒靴","2405"=>"长筒靴","2406"=>"休闲鞋","2407"=>"运动",);
	protected $product_cat_3_25 	= array("2501"=>"项链","2502"=>"耳环","2503"=>"戒指","2504"=>"手镯/手链","2505"=>"帽子","2506"=>"皮带","2507"=>"围巾","2508"=>"领带","2509"=>"手套","2510"=>"手表","2511"=>"眼镜",);
	protected $product_cat_3_26 	= array("2601"=>"内裤","2602"=>"袜子","2603"=>"保暖内衣","2604"=>"家居服","2605"=>"睡衣","2606"=>"浴袍");
	
	protected $product_cat_2_3 	= array("31" => "背景");
	protected $product_cat_3_31 	= array("3105" => "底纹","3106" => "装饰","3101" => "明星","3102" => "海报","3103" => "秀场","3104" => "街拍","3107" => "价格");
	
	protected $product_cat_2_4 	= array("41" => "婴儿" , '42' => '上装' , '43' => '下装' , '44' => '套装' , '45' => '亲子装' , '46' => '童鞋' , '47' => '配饰' , '48' => '玩具');
	protected $product_cat_3_41 	= array('4101' => '新生儿礼盒', '4102' => '连身衣', '4103' => '内衣裤', '4104' => '婴儿袜', '4105' => '婴儿鞋', '4106' => '披风', '4107' => '外出服', '4108' => '护脐带', '4109' => '防抓手套', '4110' => '肚兜', '4111' => '大PP裤', '4112' => '学步鞋');
	protected $product_cat_3_42 	= array('4201' => '秋款外套','4202' => '夹克/皮衣 ','4203' => '卫衣', '4204' => '衬衫', '4205' => '长袖T恤 ', '4206' => '毛衣/针织', '4207' => '大衣', '4208' => '风衣 ', '4209' => '马甲/背心', '4210' => '棉袄', '4211' => '小西装', '4212' => '羽绒服');
	protected $product_cat_3_43 	= array('4301' => '牛仔裤','4302' => '打底裤','4303' => '哈伦裤','4304' => '背带裤','4305' => '连衣裙','4306' => '背带裙');
	protected $product_cat_3_44 	= array('4401' => '儿童套装','4402' => '秋衣/棉毛衫裤','4403' => '运动套装','4404' => '儿童校服','4405' => '舞蹈服','4406' => '儿童睡衣','4407' => '儿童礼服','4408' => '儿童泳衣');
	protected $product_cat_3_45 	= array('4501' => '全家装','4502' => '母女装','4503' => '母子装');
	protected $product_cat_3_46 	= array('4601' => '运动/帆布鞋','4602' => '皮鞋','4603' => '棉鞋','4604' => '舞蹈鞋','4605' => '靴子/雪地靴','4606' => '鞋垫','4607' => '拖鞋','4608' => '凉鞋','4609' => '雨鞋/雨靴');
	protected $product_cat_3_47 	= array('4701' => '帽子','4702' => '围巾','4703' => '手套','4704' => '脚套','4705' => '口罩','4706' => '袜子','4707' => '发饰','4708' => '首饰','4709' => '耳套','4710' => '腰带');
	protected $product_cat_3_48 	= array('4801' => '0-3岁','4802' => '3-7岁','4803' => '7岁以上');

	
	public static $defaultConfig = array(
		'viewEnabled'	=> true,
		'layoutEnabled'	=> true,
		'title'			=> null
	);

	public function __construct($config = null)
	{
		parent::__construct($config);
		$this->pinxiu			= new PinxiuTable($config);
		$this->myitem			= new MyitemTable($config);
		$this->pxitems			= new PxitemsTable($config);
		$this->pxtag			= new PxtagTable($config);
		$this->brand			= new BrandTable($config);
		
	}
	/*
	 * 穿什么
	 * ?m=pxgroup&a=index&s=0&k=0&c=2&page=2
	 * 参数：
	 * 		s	性别
	 * 		k	风格
	 * 		c	场合
	 * 		page	页数
	 * 
	 */
	public function indexAction()
	{
		$this->config['layoutEnabled'] = false;
		$this->config['viewEnabled'] = false;
		
		header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
		header("Content-Type: text/html; charset=UTF-8");		
		
		//获取地址参数
		$data = $this->getParams('c, s, k');		
		
		$cur_occasion = $data['c'] ? $data['c'] : '0';
		$cur_sex =  $data['s'] ? $data['s'] : '0';
		$cur_kind =  $data['k'] ? $data['k'] : '0';	

		
		//获取where
		$where = '';
		$where .= " isgroup > 0 AND  sex = " . $cur_sex . " AND status = 1";
		//场合
		if($cur_occasion > 0){
			if($cur_occasion == 1){
				$where .= " AND occasion in (0,1,3,5,7) ";
			}else if($cur_occasion == 2){
				$where .= " AND occasion in (0,2,3,6,7) ";
			}else if($cur_occasion == 4){
				$where .= " AND occasion in (0,4,5,6,7) ";
			}
		}

		if ($cur_kind > 0) {
			$where .= " AND maincat_id = " . $cur_kind;
		}		
		
		//分页
		$count 		= $this->pinxiu->listCount($where);
		$pageSize 	= 5;
		$pagecount = ceil($count/$pageSize);
		$page = $this->getIntParam("page");
		if($pagecount < $page){
			echo "";exit;
		}
		$order 		= array('id desc');
		$fieldsPinxiu = "id,uid,px_pic,title,maincat_id,head_pic,occasion,reason,likenum,sum_price,p_num";
		
		$this->view->paging = $this->getPaging($count , $pageSize , $pageId);
		//得到搭配
		$data = $this->pinxiu->listPageWithFields($fieldsPinxiu, $where , $order , $pageSize , $pageId);
		
		foreach($data as $kd=>$vd)
		{
			$data[$kd]['head_pic'] = IMAGE_DOMAIN.$data[$kd]['head_pic'];
			$data[$kd]['px_pic'] = IMAGE_DOMAIN.getPropath($data[$kd]['px_pic'],320);
		}
		//查单品
		if ($data) {
			foreach ($data as $k => $v) {
				$pxIds[] = $v['id'];
			}
		}
		unset($k, $v);
		
		if ($pxIds) {
			$fieldsPxItems = "id, px_id, type, item_id, img_url, b_id, sec_word, d_price";
			$pxItems = $this->pxitems->listAllWithFields($fieldsPxItems," del = 0 AND px_id in (".implode(',',$pxIds).")", "item_id desc");
		}

		if ($pxItems) {
			foreach ($pxItems as $v) {
				$v_itme_id = $v['item_id'];
				foreach ($data as $k => $px) {
					if ($v['px_id'] == $px['id']) {
						$data[$k]['itemsid'][] = $v['item_id'];
						$data[$k]['d_price']["p$v_itme_id"] = $v['d_price'];
						$data[$k]['sec_word']["p$v_itme_id"] = $v['sec_word'];
						
						$pxItemsPrice["$v_itme_id"]=$v['d_price'];
					}
				}
				$prodIds[] = $v['item_id'];
			}
		}
		
		//获取单品信息
		$prodData = $this->myitem->getPriceItemByIds($prodIds);

		//单品优惠价
		foreach($pxItemsPrice as $i=>$v)
		{
			if($v!=0.00)
			{
				$privilege[$i]=$v;
			}
			else
			{
				foreach ($prodData as $iprod=>$vprod)
				{
					if($i == $iprod)
					{
						if(!$vprod['discount']==0.00)
						{
							$privilege[$i]=$vprod['discount'];
						}
						else 
						{
							$privilege[$i]=$vprod['price'];
						} 
					}
				}
			}
				
		}
		
		//获取单品品牌商信息
		$b_IDs = array();
		foreach ($prodData as $k => $dp) {
			if (!empty($dp['bid'])) {
				$b_IDs[] = $dp['bid'];
			}
		}
		$brands = $this->brand->getBrandByIds($b_IDs);
		foreach($brands as $i=>$v)
		{
			$brands[$i]['pic']=IMAGE_DOMAIN.$brands[$i]['pic'];
		}
		
		foreach ($prodData as $i=>$val)
		{
			$prodData[$i]['img_url']=IMAGE_DOMAIN.getPropath($prodData[$i]['img_url'],300);
			$prodData[$i]['url'] = "http://appleapi.tuolar.com/iphoneweibo/?m=go&id=".$prodData[$i]['id'];
			//$totalprice=(int)$prodData[$i]['price'];
			foreach ($privilege as $ipri=>$vpri)
			{
				if($ipri==$i)
				{
					$prodData[$i]['privilege'] = $vpri;
				}
			}
			//为单品加入品牌中文
			if(count($brands) > 0){
			foreach ($brands as $ib=>$iv)
			{
				if($val['bid']==$ib)
				{
					$prodData[$i]['brand_name']=$iv['name'];
				}else{
					$prodData[$i]['brand_name']="木有哦";
				}
			}
			}else{
				$prodData[$i]['brand_name']="木有哦";
			}
			//一级
			if(isset($this->product_cat_1[$prodData[$i]['maincat_id']]))
				$prodData[$i]['maincat_id_name'] = $this->product_cat_1[$prodData[$i]['maincat_id']];
			//二级
			//if(isset($this->product_cat_2_1[$prodData[$i]['subcat_id']])){
				//三级分类衣服[11,13,18,21.26]，裤子[12,22]，鞋子[16,24]，包包[14,23]，配饰[17,25]，其他
//				$prodData[$i]['subcat_id_name'] = $this->product_cat_2_1[$prodData[$i]['subcat_id']];
				if(($prodData[$i]['subcat_id'] == '11') || ($prodData[$i]['subcat_id'] == '13') || ($prodData[$i]['subcat_id'] == '18') || ($prodData[$i]['subcat_id'] == '21') || ($prodData[$i]['subcat_id'] == '26')){
					$prodData[$i]['subcat_id_name'] = "衣服";
				}else if(($prodData[$i]['subcat_id'] == '12') || ($prodData[$i]['subcat_id'] == '22')){
					$prodData[$i]['subcat_id_name'] = "裤子";
				}else if(($prodData[$i]['subcat_id'] == '16') || ($prodData[$i]['subcat_id'] == '24')){
					$prodData[$i]['subcat_id_name'] = "鞋子";
				}else if(($prodData[$i]['subcat_id'] == '14') || ($prodData[$i]['subcat_id'] == '23')){
					$prodData[$i]['subcat_id_name'] = "包包";
				}else if(($prodData[$i]['subcat_id'] == '17') || ($prodData[$i]['subcat_id'] == '25')){
					$prodData[$i]['subcat_id_name'] = "配饰";
				}else if($prodData[$i]['maincat_id'] == '3'){
					$prodData[$i]['subcat_id_name'] = "其他";
				}
		//	}
			//三级
//			if(isset($this->product_cat_2_1[$prodData[$i]['subcat_id']]))
//			{
				$thirdArr="product_cat_3_".$prodData[$i]['subcat_id'];
					
				$third=$prodData[$i]['third_id'];
			
				$arr_cat_3 = $this->$thirdArr;
				if(isset($arr_cat_3[$third]))
				{
					$prodData[$i]['third_id_name']=$arr_cat_3[$third];
				}
					
//			}
		}
		
		foreach ($data as $k => $px) {
			$totalprice = 0;
			$privilege = 0;
			foreach ($px['itemsid'] as $dp_k => $id) {
				if (!isset($prodData[$id]))	{
					continue;
				}
				$data[$k]['items'][] = $prodData[$id];

				if(!isset($data[$k]['totalprice']))
				{
					$data[$k]['totalprice']=0;
				}
				if(!isset($data[$k]['privilege']))
				{
					$data[$k]['privilege']=0;
				}
				$totalprice+=(int)$prodData[$id]['price'];
				$data[$k]['brand'][] = $prodData[$id]['bid'];
				$privilege+=(int)$prodData[$id]['privilege'];
				
			}
			$data[$k]['totalprice'] = "p".$totalprice;
			$data[$k]['privilege'] = "p".$privilege;
			$data[$k]["itmecount"] = "p".count($data[$k]['items']);
			unset($totalprice,$privilege);
		}
		
		echo $this->customJsonEncode($data);
		exit;
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

Config::extend('PxgroupController', 'Controller');


