<?php
define('TUOLAR_DOMAIN' , 'http://www.tuolar.com/');

define('USER_LOGIN_STAT' , 1);
define('REWRITE_OPEN' , 0);

define('FRIEND_STATUS_NO' , 0); //非好友
define('FRIEND_STATUS_YES' , 1); //好友

//定义用户动作
define('USER_ACT_TYPE_TWEET' , 0); //微博
define('USER_ACT_TYPE_PX' , 1); //搭配
define('USER_ACT_TYPE_PROD' , 2); //单品
define('USER_ACT_TYPE_PIC' , 3); //图片
define('USER_ACT_TYPE_SHOP' , 4); //店铺
define('USER_ACT_TYPE_GOODS' , 5); // 店铺宝贝

//用户消息类型
define('USER_MSG_TYPE_NORMAL' , 0);  //一般消息
define('USER_MSG_TYPE_FOLLOWS' , 1); // 相互关注
define('USER_MSG_TYPE_AT' , 2); //@用户的
define('USER_MSG_TYPE_ALL' , 3); //推荐用户

//新浪微博省份城市
$WB_CITY_ARR = array(
	34	=> array(
				'province' => '安徽',
		  		'city' => array(1 => "合肥", 2 => "芜湖", 3 => "蚌埠", 4 => "淮南",5 => "马鞍山", 6 => "淮北",7 => "铜陵", 8 => "安庆",10 => "黄山", 11 => "滁州", 12 => "阜阳", 13 => "宿州",14 => "巢湖", 15 => "六安", 16 => "亳州", 17 => "池州", 18 => "宣城")
		  	),
	11  => array(
				'province' => '北京',
				'city' => array(1 => "东城区", 2 => "西城区", 3 => "崇文区", 4 => "宣武区", 5 => "朝阳区",6 => "丰台区", 7 => "石景山区", 8 => "海淀区", 9 => "门头沟区", 11 => "房山区",12 => "通州区", 13 => "顺义区", 14 => "昌平区", 15 => "大兴区", 16 => "怀柔区",17 => "平谷区", 28 => "密云县", 29 => "延庆县")
			),
	50  => array(
				'province' => '重庆',
				'city' => array(1 =>"万州区", 2 => "涪陵区", 3 => "渝中区", 4 => "大渡口区", 5 => "江北区",6 => "沙坪坝区", 7 => "九龙坡区", 8 => "南岸区", 9 => "北碚区", 10 => "万盛区",11 => "双桥区", 12 => "渝北区", 13 => "巴南区", 14 => "黔江区", 15 => "长寿区",22 => "綦江县", 23 => "潼南县", 24 => "铜梁县", 25 => "大足县", 26 => "荣昌县",27 => "璧山县", 28 => "梁平县", 29 => "城口县", 30 => "丰都县", 31 => "垫江县",32 => "武隆县", 33 => "忠县", 34 => "开县", 35 => "云阳县", 36 => "奉节县",37 => "巫山县", 38 => "巫溪县", 40 => "石柱土家族自治县", 41 => "秀山土家族苗族自治县", 42 => "酉阳土家族苗族自治县",43 => "彭水苗族土家族自治县", 81 => "江津市", 82 => "合川市", 83 => "永川市", 84 => "南川市" )
			),
	35  => array(
				'province' => '福建',
				'city' => array(1 => "福州", 2 => "厦门", 3 => "莆田", 4 => "三明", 5 => "泉州", 6 => "漳州",7 => "南平", 8 => "龙岩", 9 => "宁德")
			),
 	62  => array(
				'province' => '甘肃',
				'city' => array(1 => "兰州", 2 => "嘉峪关", 3 => "金昌", 4 => "白银", 5 => "天水", 6 => "武威",7 => "张掖", 8 => "平凉", 9 => "酒泉", 10 => "庆阳", 24 => "定西", 26 => "陇南", 29 => "临夏", 30 => "甘南")
			),
	44  => array(
				'province' => '广东',
				'city' => array(1 => "广州", 2 => "韶关", 3 => "深圳", 4 => "珠海", 5 => "汕头", 6 => "佛山",7 => "江门", 8 => "湛江", 9 => "茂名", 12 => "肇庆", 13 => "惠州", 14 => "梅州", 15 => "汕尾", 16 => "河源", 17 => "阳江", 18 => "清远", 19 => "东莞", 20 => "中山",51 => "潮州", 52 => "揭阳", 53 => "云浮")
			),		
 	45  => array(
				'province' => '广西',
				'city' => array(1 => "南宁", 2 => "柳州", 3 => "桂林", 4 => "梧州", 5 => "北海", 6 => "防城港", 7 => "钦州", 8 => "贵港", 9 => "玉林", 10 => "百色", 11 => "贺州", 12 => "河池",21 => "南宁", 22 => "柳州" )
			),
	52  => array(
				'province' => '贵州',
				'city' => array(1 => "贵阳", 2 => "六盘水", 3 => "遵义", 4 => "安顺", 22 => "铜仁", 23 => "黔西南",24 => "毕节", 26 => "黔东南", 27 => "黔南" )
			),
	46  => array(
				'province' => '海南',
				'city' => array(1 => "海口", 2 => "三亚", 90 => "其他")
			),
	13  => array(
				'province' => '河北',
				'city' => array(1 => "石家庄", 2 => "唐山", 3 => "秦皇岛", 4 => "邯郸", 5 => "邢台", 6 => "保定",7 => "张家口", 8 => "承德", 9 => "沧州", 10 => "廊坊", 11 => "衡水")
			),		
	23  => array(
				'province' => '黑龙江',
				'city' => array(1 => "哈尔滨", 2 => "齐齐哈尔", 3 => "鸡西", 4 => "鹤岗", 5 => "双鸭山", 6 => "大庆",7 => "伊春", 8 => "佳木斯", 9 => "七台河", 10 => "牡丹江", 11 => "黑河", 12 => "绥化",27 => "大兴安岭")
			),
	41  => array(
				'province' => '河南',
				'city' => array(1 => "郑州", 2 => "开封", 3 => "洛阳", 4 => "平顶山", 5 => "安阳", 6 => "鹤壁",7 => "新乡", 8 => "焦作", 9 => "濮阳", 10 => "许昌", 11 => "漯河", 12 => "三门峡", 13 => "南阳", 14 => "商丘", 15 => "信阳", 16 => "周口", 17 => "驻马店")
			),
	42  => array(
				'province' => '湖北',
				'city' => array(1 => "武汉", 2 => "黄石", 3 => "十堰", 5 => "宜昌", 6 => "襄樊", 7 => "鄂州",8 => "荆门", 9 => "孝感", 10 => "荆州", 11 => "黄冈", 12 => "咸宁", 13 => "随州",28 => "恩施土家族苗族自治州")
			),		 
 	43  => array(
				'province' => '湖南',
				'city' => array(1 => "长沙", 2 => "株洲", 3 => "湘潭", 4 => "衡阳", 5 => "邵阳", 6 => "岳阳", 7 => "常德", 8 => "张家界", 9 => "益阳", 10 => "郴州", 11 => "永州", 12 => "怀化", 13 => "娄底", 31 => "湘西土家族苗族自治州")
			),	
	15  => array(
				'province' => '内蒙古',
				'city' => array(1 => "呼和浩特", 2 => "包头", 3 => "乌海", 4 => "赤峰", 5 => "通辽", 6 => "鄂尔多斯",7 => "呼伦贝尔", 22 => "兴安盟", 25 => "锡林郭勒盟", 26 => "乌兰察布盟",28 => "巴彦淖尔盟", 29 => "阿拉善盟")
			),
	32  => array(
				'province' => '江苏',
				'city' => array(1 => "南京", 2 => "无锡", 3 => "徐州", 4 => "常州", 5 => "苏州", 6 => "南通", 7 => "连云港", 8 => "淮安", 9 => "盐城", 10 => "扬州", 11 => "镇江", 12 => "泰州", 13 => "宿迁")
			),
	36  => array(
				'province' => '江西',
				'city' => array(1 => "南昌", 2 => "景德镇", 3 => "萍乡", 4 => "九江", 5 => "新余", 6 => "鹰潭", 7 => "赣州", 8 => "吉安", 9 => "宜春", 10 => "抚州", 11 => "上饶")
			),
	22  => array(
				'province' => '吉林',
				'city' => array(1 => "长春", 2 => "吉林", 3 => "四平", 4 => "辽源", 5 => "通化", 6 => "白山", 7 => "松原", 8 => "白城", 24 => "延边朝鲜族自治州")
			),
	21  => array(
				'province' => '辽宁',
				'city' => array(1 => "沈阳", 2 => "大连", 3 => "鞍山", 4 => "抚顺", 5 => "本溪", 6 => "丹东", 7 => "锦州", 8 => "营口", 9 => "阜新", 10 => "辽阳", 11 => "盘锦", 12 => "铁岭",13 => "朝阳", 14 => "葫芦岛")
			),
	64  => array(
				'province' => '宁夏',
				'city' => array(1 => "银川", 2 => "石嘴山", 3 => "吴忠", 4 => "固原")
			),
	63  => array(
				'province' => '青海',
				'city' => array(1 => "西宁", 21 => "海东", 22 => "海北", 23 => "黄南", 25 => "海南", 26 => "果洛", 27 => "玉树", 28 => "海西")
			),
    14  => array(
				'province' => '山西',
				'city' => array(1 => "太原", 2 => "大同", 3 => "阳泉", 4 => "长治", 5 => "晋城", 6 => "朔州", 7 => "晋中", 8 => "运城", 9 => "忻州", 10 => "临汾", 23 => "吕梁")
			),
	37  => array(
				'province' => '山东',
				'city' => array(1 => "济南", 2 => "青岛", 3 => "淄博", 4 => "枣庄", 5 => "东营", 6 => "烟台", 7 => "潍坊", 8 => "济宁", 9 => "泰安", 10 => "威海", 11 => "日照", 12 => "莱芜",13 => "临沂", 14 => "德州", 15 => "聊城", 16 => "滨州", 17 => "菏泽")
			),
	31  => array(
				'province' => '上海',
				'city' => array(1 => "黄浦区", 3 => "卢湾区", 4 => "徐汇区", 5 => "长宁区", 6 => "静安区", 7 => "普陀区", 8 => "闸北区", 9 => "虹口区", 10 => "杨浦区", 12 => "闵行区",13 => "宝山区", 14 => "嘉定区", 15 => "浦东新区", 16 => "金山区", 17 => "松江区",18 => "青浦区", 19 => "南汇区", 20 => "奉贤区", 30 => "崇明县")
			),
	51  => array(
				'province' => '四川',
				'city' => array(1 => "成都", 3 => "自贡", 4 => "攀枝花", 5 => "泸州", 6 => "德阳", 7 => "绵阳",8 => "广元", 9 => "遂宁", 10 => "内江", 11 => "乐山", 13 => "南充", 14 => "眉山",15 => "宜宾", 16 => "广安", 17 => "达州", 18 => "雅安", 19 => "巴中", 20 => "资阳",32 => "阿坝", 33 => "甘孜", 34 => "凉山")
			),
	12  => array(
				'province' => '天津',
				'city' => array(1 => "和平区", 2 => "河东区", 3 => "河西区", 4 => "南开区", 5 => "河北区", 6 => "红桥区", 7 => "塘沽区", 8 => "汉沽区", 9 => "大港区", 10 => "东丽区",11 => "西青区", 12 => "津南区", 13 => "北辰区", 14 => "武清区", 15 => "宝坻区",21 => "宁河县", 23 => "静海县", 25 => "蓟县")
			),
	54  => array(
				'province' => '西藏',
				'city' => array(1 => "拉萨", 21 => "昌都", 22 => "山南", 23 => "日喀则", 24 => "那曲",25 => "阿里", 26 => "林芝")
			),
	65  => array(
				'province' => '新疆',
				'city' => array(1 => "乌鲁木齐", 2 => "克拉玛依", 21 => "吐鲁番", 22 => "哈密", 23 => "昌吉",27 => "博尔塔拉", 28 => "巴音郭楞", 29 => "阿克苏", 30 => "克孜勒苏",31 => "喀什", 32 => "和田", 40 => "伊犁", 42 => "塔城", 43 => "阿勒泰")
			),
 	53  => array(
				'province' => '云南',
				'city' => array(1 => "昆明", 3 => "曲靖", 4 => "玉溪", 5 => "保山", 6 => "昭通",23 => "楚雄", 25 => "红河", 26 => "文山", 27 => "思茅", 28 => "西双版纳",29 => "大理", 31 => "德宏", 32 => "丽江", 33 => "怒江", 34 => "迪庆", 35 => "临沧")
			),
	33  => array(
				'province' => '浙江',
				'city' => array(1 => "杭州", 2 => "宁波", 3 => "温州", 4 => "嘉兴", 5 => "湖州", 6 => "绍兴",7 => "金华", 8 => "衢州", 9 => "舟山", 10 => "台州", 11 => "丽水")
			),
	61  => array(
				'province' => '陕西',
				'city' => array(1 => "西安", 2 => "铜川", 3 => "宝鸡", 4 => "咸阳", 5 => "渭南", 6 => "延安",7 => "汉中", 8 => "榆林", 9 => "安康", 10 => "商洛")
			),
	71  => array(
				'province' => '台湾',
				'city' => array(1 => "台北", 2 => "高雄", 90 => "其他")
			),
	81  => array(
				'province' => '香港',
				'city' => array(1 => "香港")
			),
	82  => array(
				'province' => '澳门',
				'city' => array(1 => "澳门")
			),
	400  => array(
				'province' => '海外',
				'city' => array(1 => "美国", 2 => "英国", 3 => "法国", 4 => "俄罗斯", 5 => "加拿大", 6 => "巴西", 7 => "澳大利亚", 8 => "印尼", 9 => "泰国", 10 => "马来西亚",11 => "新加坡", 12 => "菲律宾", 13 => "越南", 14 => "印度", 15 => "日本", 16 => "其他")
			),
	82  => array(
				'province' => '其他',
				'city' => array(1 => " ")
			)
);
//会员默认的抽奖次数
$LOTTERY_FREQUENCY = 300;
//试用品的图片地址
$TRYOUT_IMG_URL = "http://image.tuolar.com/";
//会员分享和转发,一天内获取最多几次的抽奖次数
$LOTTERY_NUMBER = 100;
//推荐单品风格分类
//$recommend_tag_cat = array("0" => "时尚摩登","1" => "夜场", "2" => "男士正装", "3" => "气场女王", "4" => "派对", "5" => "休闲格调", "6" => "清新森系", "7" => "闺蜜", "8" => "品位IT男", "9" => "休闲星期五", "10" => "约会", "11" => "英伦风范");
$recommend_tag_cat = array(
	"4" => "气场女王",
	"1" => "职场摩登",
	"7" => "清新森系",
	"10" => "休闲星期五",
	"11" => "约会达人",
	"2" => "夜场秀",
	"8" => "闺蜜逛街",
	"5" => "派对女王",
	"3" => "男士正装",
	"6" => "休闲格调",
	"9" => "品位IT男",
	"12" => "英伦风范"
);

//男性用户默认Logo
define('DEFAULT_NAN_LOGO','./img/user/default/male.jpg');

//女性用户默认Logo
define('DEFAULT_NV_LOGO','./img/user/default/female.jpg');

//12专题控的分类图片
$TC_IMAGE = "http://appleapi.tuolar.com/iphoneAppwfs/";

//图片域名
define("IMAGE_DOMAIN" ,"http://image.tuolar.com/");

//购买链接域名
define("SOURCE_DOMAIN" ,"http://appleapi.tuolar.com/iphoneAppwfs/");

//购买链接的url
$BUY_URL = "http://appleapi.tuolar.com/iphoneAppwfs/";
//app单品类型
$ITEM_TYPE = array(
	"1"=>"衣服",
	"2"=>"鞋子",
	"3"=>"包包",
	"4"=>"配饰"
);
//用于获取天气城市编码
$PROVINCE_CITY_WEATHER = array(
	0 => array('city_code' => '101020100' , 'city_pinyin' => 'shanghai' , 'city_name' => '上海'),
	1 => array('city_code' => '101010100' , 'city_pinyin' => 'beijing' , 'city_name' => '北京'),
	2 => array('city_code' => '101210101' , 'city_pinyin' => 'hangzhou' , 'city_name' => '杭州'),
	3 => array('city_code' => '101190101' , 'city_pinyin' => 'nanjing' , 'city_name' => '南京'),
	4 => array('city_code' => '101110101' , 'city_pinyin' => 'xian' , 'city_name' => '西安'),
	5 => array('city_code' => '101190401' , 'city_pinyin' => 'suzhou' , 'city_name' => '苏州'),
	6 => array('city_code' => '101030100' , 'city_pinyin' => 'tianjin' , 'city_name' => '天津'),
	7 => array('city_code' => '101070101' , 'city_pinyin' => 'shenyang' , 'city_name' => '沈阳'),
	8 => array('city_code' => '101190201' , 'city_pinyin' => 'wuxi' , 'city_name' => '无锡'),
	9 => array('city_code' => '101120101' , 'city_pinyin' => 'jinan' , 'city_name' => '济南'),
	10 => array('city_code' => '101280101' , 'city_pinyin' => 'guangzhou' , 'city_name' => '广州'),
	11 => array('city_code' => '101210401' , 'city_pinyin' => 'ningbo' , 'city_name' => '宁波'),
	12 => array('city_code' => '101190501' , 'city_pinyin' => 'nantong' , 'city_name' => '南通'),
	13 => array('city_code' => '101070201' , 'city_pinyin' => 'dalian' , 'city_name' => '大连'),
	14 => array('city_code' => '101100101' , 'city_pinyin' => 'taiyuan' , 'city_name' => '太原'),
	15 => array('city_code' => '101120201' , 'city_pinyin' => 'qingdao' , 'city_name' => '青岛'),
	16 => array('city_code' => '101270101' , 'city_pinyin' => 'chengdu' , 'city_name' => '成都'),
	17 => array('city_code' => '101220101' , 'city_pinyin' => 'hefei' , 'city_name' => '合肥'),
	18 => array('city_code' => '101230201' , 'city_pinyin' => 'xiamen' , 'city_name' => '厦门'),
	19 => array('city_code' => '101090101' , 'city_pinyin' => 'shijiazhuang' , 'city_name' => '石家庄'),
	20 => array('city_code' => '101050101' , 'city_pinyin' => 'haerbin' , 'city_name' => '哈尔滨'),
	21 => array('city_code' => '101040100' , 'city_pinyin' => 'chongqing' , 'city_name' => '重庆'),
	22 => array('city_code' => '101200101' , 'city_pinyin' => 'wuhan' , 'city_name' => '武汉'),
	23 => array('city_code' => '101250101' , 'city_pinyin' => 'changsha' , 'city_name' => '长沙'),
	24 => array('city_code' => '101180101' , 'city_pinyin' => 'zhengzhou' , 'city_name' => '郑州'),
	25 => array('city_code' => '101280601' , 'city_pinyin' => 'shenzhen' , 'city_name' => '深圳'),
	26 => array('city_code' => '101240101' , 'city_pinyin' => 'nanchang' , 'city_name' => '南昌'),
	27 => array('city_code' => '101160101' , 'city_pinyin' => 'lanzhou' , 'city_name' => '兰州'),
	28 => array('city_code' => '101191101' , 'city_pinyin' => 'changzhou' , 'city_name' => '常州'),
	29 => array('city_code' => '101190601' , 'city_pinyin' => 'yangzhou' , 'city_name' => '扬州'),
	30 => array('city_code' => '101090601' , 'city_pinyin' => 'langfang' , 'city_name' => '廊坊'),
	31 => array('city_code' => '101190801' , 'city_pinyin' => 'xuzhou' , 'city_name' => '徐州'),
	32 => array('city_code' => '101060101' , 'city_pinyin' => 'changchun' , 'city_name' => '长春'),
	33 => array('city_code' => '101220301' , 'city_pinyin' => 'wuhu' , 'city_name' => '芜湖'),
	34 => array('city_code' => '101290101' , 'city_pinyin' => 'kunming' , 'city_name' => '昆明'),
	35 => array('city_code' => '101120301' , 'city_pinyin' => 'zibo' , 'city_name' => '淄博'),
	36 => array('city_code' => '101120901' , 'city_pinyin' => 'linyin' , 'city_name' => '临沂'),
	37 => array('city_code' => '101120801' , 'city_pinyin' => 'taian' , 'city_name' => '泰安'),
	38 => array('city_code' => '101121301' , 'city_pinyin' => 'weihai' , 'city_name' => '威海'),
	39 => array('city_code' => '101300501' , 'city_pinyin' => 'guilin' , 'city_name' => '桂林'),
	40 => array('city_code' => '101120501' , 'city_pinyin' => 'yantai' , 'city_name' => '烟台'),
	41 => array('city_code' => '101150101' , 'city_pinyin' => 'xining' , 'city_name' => '西宁'),
	42 => array('city_code' => '101190301' , 'city_pinyin' => 'zhenjiang' , 'city_name' => '镇江'),
	43 => array('city_code' => '101190404' , 'city_pinyin' => 'kunshan' , 'city_name' => '昆山'),
	44 => array('city_code' => '101190202' , 'city_pinyin' => 'jiangyin' , 'city_name' => '江阴'),
	45 => array('city_code' => '101190407' , 'city_pinyin' => 'wujiang' , 'city_name' => '吴江'),
	46 => array('city_code' => '101190402' , 'city_pinyin' => 'changshu' , 'city_name' => '常熟'),
	47 => array('city_code' => '101091001' , 'city_pinyin' => 'handan' , 'city_name' => '邯郸'),
	48 => array('city_code' => '101090301' , 'city_pinyin' => 'zhangjiakou' , 'city_name' => '张家口'),
	49 => array('city_code' => '101100201' , 'city_pinyin' => 'datong' , 'city_name' => '大同'),
	50 => array('city_code' => '101080101' , 'city_pinyin' => 'huhehaote' , 'city_name' => '呼和浩特'),
	51 => array('city_code' => '101080201' , 'city_pinyin' => 'baotou' , 'city_name' => '包头'),
	52 => array('city_code' => '101070801' , 'city_pinyin' => 'yingkou' , 'city_name' => '营口'),
	53 => array('city_code' => '101191201' , 'city_pinyin' => 'taizhou' , 'city_name' => '泰州'),
	54 => array('city_code' => '101190508' , 'city_pinyin' => 'haimen' , 'city_name' => '海门'),
	55 => array('city_code' => '101191001' , 'city_pinyin' => 'lianyungang' , 'city_name' => '连云港'),
	56 => array('city_code' => '101220201' , 'city_pinyin' => 'bengbu' , 'city_name' => '蚌埠'),
	57 => array('city_code' => '101220401' , 'city_pinyin' => 'huainan' , 'city_name' => '淮南'),
	58 => array('city_code' => '101190701' , 'city_pinyin' => 'yancheng' , 'city_name' => '盐城'),
	59 => array('city_code' => '101210501' , 'city_pinyin' => 'shaoxing' , 'city_name' => '绍兴'),
	60 => array('city_code' => '101170101' , 'city_pinyin' => 'yinchuan' , 'city_name' => '银川'),
	61 => array('city_code' => '101260101' , 'city_pinyin' => 'guiyang' , 'city_name' => '贵阳'),
	62 => array('city_code' => '101110801' , 'city_pinyin' => 'hanzhong' , 'city_name' => '汉中'),
	63 => array('city_code' => '101110401' , 'city_pinyin' => 'yulin' , 'city_name' => '榆林'),
	64 => array('city_code' => '101120601' , 'city_pinyin' => 'weifang' , 'city_name' => '潍坊'),
	65 => array('city_code' => '101120701' , 'city_pinyin' => 'jining' , 'city_name' => '济宁'),
	66 => array('city_code' => '101120401' , 'city_pinyin' => 'dezhou' , 'city_name' => '德州'),
	67 => array('city_code' => '101121401' , 'city_pinyin' => 'zaozhuang' , 'city_name' => '枣庄'),
	68 => array('city_code' => '101230101' , 'city_pinyin' => 'fuzhou' , 'city_name' => '福州'),
	69 => array('city_code' => '101180901' , 'city_pinyin' => 'luoyang' , 'city_name' => '洛阳'),
	70 => array('city_code' => '101280701' , 'city_pinyin' => 'zhuhai' , 'city_name' => '珠海'),
	71 => array('city_code' => '101121501' , 'city_pinyin' => 'rizhao' , 'city_name' => '日照'),
	72 => array('city_code' => '101180801' , 'city_pinyin' => 'kaifeng' , 'city_name' => '开封'),
	73 => array('city_code' => '101250301' , 'city_pinyin' => 'zhuzhou' , 'city_name' => '株洲'),
	74 => array('city_code' => '101250201' , 'city_pinyin' => 'xiangtan' , 'city_name' => '湘潭'),
	75 => array('city_code' => '101250401' , 'city_pinyin' => 'hengyang' , 'city_name' => '衡阳'),
	76 => array('city_code' => '101251001' , 'city_pinyin' => 'yueyang' , 'city_name' => '岳阳'),
	77 => array('city_code' => '101280501' , 'city_pinyin' => 'shantou' , 'city_name' => '汕头'),
	78 => array('city_code' => '101300101' , 'city_pinyin' => 'nanning' , 'city_name' => '南宁'),
	79 => array('city_code' => '101310101' , 'city_pinyin' => 'haikou' , 'city_name' => '海口'),
	80 => array('city_code' => '101240801' , 'city_pinyin' => 'jingdezhen' , 'city_name' => '景德镇'),
	81 => array('city_code' => '101240301' , 'city_pinyin' => 'shangrao' , 'city_name' => '上饶'),
	82 => array('city_code' => '101240303' , 'city_pinyin' => 'wuyuan' , 'city_name' => '婺源'),
	83 => array('city_code' => '101121701' , 'city_pinyin' => 'liaocheng' , 'city_name' => '聊城'),
	84 => array('city_code' => '101121101' , 'city_pinyin' => 'binzhou' , 'city_name' => '滨州'),
	85 => array('city_code' => '101120710' , 'city_pinyin' => 'qufu' , 'city_name' => '曲阜'),
	86 => array('city_code' => '101110200' , 'city_pinyin' => 'xianyang' , 'city_name' => '咸阳'),
	87 => array('city_code' => '101210503' , 'city_pinyin' => 'shangyu' , 'city_name' => '上虞'),
	88 => array('city_code' => '101210504' , 'city_pinyin' => 'xinchang' , 'city_name' => '新昌'),
	89 => array('city_code' => '101210502' , 'city_pinyin' => 'zhuji' , 'city_name' => '诸暨'),
	90 => array('city_code' => '101210904' , 'city_pinyin' => 'yiwu' , 'city_name' => '义乌'),
	91 => array('city_code' => '101211001' , 'city_pinyin' => 'quzhou' , 'city_name' => '衢州'),
	92 => array('city_code' => '101211101' , 'city_pinyin' => 'zhoushan' , 'city_name' => '舟山'),
	93 => array('city_code' => '101210105' , 'city_pinyin' => 'jiande' , 'city_name' => '建德'),
	94 => array('city_code' => '101221201' , 'city_pinyin' => 'huaibei' , 'city_name' => '淮北'),
	95 => array('city_code' => '101221101' , 'city_pinyin' => 'chuzhou' , 'city_name' => '滁州'),
	96 => array('city_code' => '101221107' , 'city_pinyin' => 'tianchang' , 'city_name' => '天长'),
	97 => array('city_code' => '101230401' , 'city_pinyin' => 'putian' , 'city_name' => '莆田'),
	98 => array('city_code' => '101230601' , 'city_pinyin' => 'zhangzhou' , 'city_name' => '漳州'),
	99 => array('city_code' => '101210403' , 'city_pinyin' => 'cixi' , 'city_name' => '慈溪'),
	100 => array('city_code' => '101210301' , 'city_pinyin' => 'jiaxing' , 'city_name' => '嘉兴'),
	101 => array('city_code' => '101190901' , 'city_pinyin' => 'huaian' , 'city_name' => '淮安'),
	102 => array('city_code' => '101191304' , 'city_pinyin' => 'sihong' , 'city_name' => '泗洪'),
	103 => array('city_code' => '101190502' , 'city_pinyin' => 'haian' , 'city_name' => '海安'),
	104 => array('city_code' => '101190507' , 'city_pinyin' => 'qidong' , 'city_name' => '启东'),
	105 => array('city_code' => '101190503' , 'city_pinyin' => 'rugao' , 'city_name' => '如皋'),
	106 => array('city_code' => '101191202' , 'city_pinyin' => 'xinghua' , 'city_name' => '兴化'),
	107 => array('city_code' => '101191205' , 'city_pinyin' => 'jingjiang' , 'city_name' => '靖江'),
	108 => array('city_code' => '101191203' , 'city_pinyin' => 'taixing' , 'city_name' => '泰兴'),
	109 => array('city_code' => '101191301' , 'city_pinyin' => 'suqian' , 'city_name' => '宿迁'),
	110 => array('city_code' => '101190302' , 'city_pinyin' => 'danyang' , 'city_name' => '丹阳'),
	111 => array('city_code' => '101190601' , 'city_pinyin' => 'yangzhong' , 'city_name' => '扬州'),
	112 => array('city_code' => '101190304' , 'city_pinyin' => 'jurong' , 'city_name' => '句容'),
	113 => array('city_code' => '101071101' , 'city_pinyin' => 'tieling' , 'city_name' => '铁岭'),
	114 => array('city_code' => '101070601' , 'city_pinyin' => 'dandong' , 'city_name' => '丹东'),
	115 => array('city_code' => '101090701' , 'city_pinyin' => 'cangzhou' , 'city_name' => '沧州'),
	116 => array('city_code' => '101090201' , 'city_pinyin' => 'baoding' , 'city_name' => '保定'),
	117 => array('city_code' => '101090501' , 'city_pinyin' => 'tangshan' , 'city_name' => '唐山'),
	118 => array('city_code' => '101091101' , 'city_pinyin' => 'qinhuangdao' , 'city_name' => '秦皇岛'),
	119 => array('city_code' => '101190403' , 'city_pinyin' => 'zhangjiagang' , 'city_name' => '张家港'),
	120 => array('city_code' => '101190408' , 'city_pinyin' => 'taicang' , 'city_name' => '太仓'),
	121 => array('city_code' => '101060201' , 'city_pinyin' => 'jiling' , 'city_name' => '吉林'),
	122 => array('city_code' => '101190203' , 'city_pinyin' => 'yixing' , 'city_name' => '宜兴'),
	123 => array('city_code' => '101050201' , 'city_pinyin' => 'qiqihaer' , 'city_name' => '齐齐哈尔'),
	124 => array('city_code' => '101051201' , 'city_pinyin' => 'hegang' , 'city_name' => '鹤岗'),
	125 => array('city_code' => '101050401' , 'city_pinyin' => 'jiamusi' , 'city_name' => '佳木斯'),
	126 => array('city_code' => '101050301' , 'city_pinyin' => 'mudanjiang' , 'city_name' => '牡丹江')
);
?>