$(function(){
    var map;
    var currentCity = "北京市";
    initMap();
    //初始化地图
    function initMap() {
        map = new BMap.Map("map");
        //地图中心位置  地图级别
        ////设置地图的中点和绽放级别  级别越高，显示信息越少，放大越大
        map.centerAndZoom("北京", 10);

        //添加控件
        //在地图上下左右四个方向进行平衡与缩放
        var NavigationControl = new BMap.NavigationControl();
        map.addControl(NavigationControl)
        //缩略图控件
        var OverviewMapControl = new BMap.OverviewMapControl();
        map.addControl(OverviewMapControl);
        //比例尺控件
        var ScaleControl = new BMap.ScaleControl();
        map.addControl(ScaleControl);
        //版权控件
        var CopyrightControl = new BMap.CopyrightControl();
        map.addControl(CopyrightControl);
        //切换地图类型控件
        var MapTypeControl = new BMap.MapTypeControl();
        map.addControl(MapTypeControl);

        var PanoramaControl = new BMap.PanoramaControl();
        map.addControl(PanoramaControl);


    }
    //点击按钮搜索指定地点
    $("#search_btn").click(function() {
        //判断搜索的类型
        var place = $("#place_input").val();
        //创建地址解析器
        var geocoder = new BMap.Geocoder();
        //将地址解析为坐标
        geocoder.getPoint(place, function(point) {
            console.log(point);
            //设置地图的中点
            map.centerAndZoom(point, 15);
            //添加标注
            //创建新的图标对象和尺寸对象
            var myIcon = new BMap.Icon("img/location_logo.png", new BMap.Size(100,100));
            var marker = new BMap.Marker(point,{icon:myIcon});
            map.addOverlay(marker);

        }, currentCity);


    });
    //点击图标定位
    $(".map_img").click(function () {
        //创建定位对象 html5自带的定位对象
        var geolocation = new BMap.Geolocation();
        geolocation.getCurrentPosition(function(position) {
            if (position) {
                //获取经度和纬度
                var longitude = position.longitude;
                //拿到定位的坐标对象
                var point = position.point;
                var myGeo = new BMap.Geocoder();

                //逆解析坐标点
                myGeo.getLocation(point,function(result){
                    console.log(result);
                    //将解析结果组合
                    var addComp = result.address;
                    map.centerAndZoom(point, 50);
                    var longitude = result.point.lng;
                    var latitude = result.point.lat;
                    var opts = {
                        width: 250, // 信息窗口宽度
                        height: 100, // 信息窗口高度
                        title: "当前店铺位置:" // 信息窗口标题
                    }
                    var infoWindow = new BMap.InfoWindow("地址："+addComp+"<br>经度："+longitude+"<br>纬度："+latitude, opts); // 创建信息窗口对象
                    map.openInfoWindow(infoWindow, map.getCenter()); // 打开信息窗口
                });

            }

        });
    });

})