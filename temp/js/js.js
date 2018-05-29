var app = angular.module('yadamusic',['ng','ngRoute']);
app.config(function($routeProvider)
{
    $routeProvider
    .when('/#/index',{controller:"indexController"})
})

app.controller('indexController',function($http,$scope,$timeout){
    $scope.musiclist = [];
    $scope.songlist = [];
    var dbnum = 0;
    var dbl = new Array();
    $http.get('/#/index')
    .success(function(){
        $scope.ting=function()
        {
//歌曲列表
$.ajax({
    type:"post",
    url:"../../App/api/api.php",
    data:({'music':true,'musicname':$("#musicname").val()})
})
.success(function(data){
    $scope.data = data;
    $scope.musiclist = $scope.data;
    $("#mulist").fadeIn();
    db = JSON.parse($scope.musiclist,"song","song");
    $timeout(()=>{ $scope.songlist = db["song"];});
//下载歌曲        
$.ajax({
    type:"get",
    url:"../../App/api/api.php?musicdownload=true",
    datatype:'jsonp',
})
.success(function(data){
    dbnum = db["song"].length;
    for (var i = 0; i < dbnum; i++) {
        dbl = db["song"][i]['songid'];
        var songid = dbl+',';

        /**音乐下载 开始**/
        $scope.download= function(id)
        {
            $.ajax({
                type:'post',
                url:'../../App/api/musicdown.php',
                data: ({'musicdownload':true,'musicdown':true,'sid':id})
            })
            .success(function(data){
             // $timeout(()=>{ $scope.musicurl = data;});
             console.log(data);
            //自定页

            layer.open({
              title:'音乐下载',
              type: 1,
              skin: 'layui-layer-demo', //样式类名
              closeBtn: 0, //不显示关闭按钮
              area: ['359px', '200px'],
              anim: 2,
              shadeClose: true, //开启遮罩关闭
              content: '<label style="padding-top:18px;padding-left:30px;">下载地址：</label><br><input type="text" id="t3" class="form-control" value="'+ data +'" readonly style="max-width:80%;margin-left:30px;margin-top:7px;"><br><button class="btn3 btn btn-info" data-clipboard-action="copy" data-clipboard-target="#t3" style="margin-left:30px;">点击复制</button>'
            });

            $(document).ready(function(){    
                var clipboard = new Clipboard('.btn3');   
                clipboard.on('success', function(e) {   
                    layer.msg('复制成功'); 
                });  
                clipboard.on('error', function(e) {   
                    layer.msg('复制失败！请手动复制'); 
                });  
            })      
         })
        }
        /**音乐下载 结束**/

        /**歌词下载 开始**/
        $scope.dllrc=function(id)
        {
            $.ajax({
                type:'post',
                url:'../../App/api/musiclrc.php',
                data:({'musiclrc':true,'sid':id})
            })
            .success(function(data){
            //自定页

            layer.open({
              title:'歌词下载',
              type: 1,
              skin: 'layui-layer-demo', //样式类名
              closeBtn: 0, //不显示关闭按钮
              area: ['359px', '200px'],
              anim: 2,
              shadeClose: true, //开启遮罩关闭
              content: '<label style="padding-top:18px;padding-left:30px;">下载地址：</label><br><input type="text" id="t4" class="form-control" value="'+ data +'" readonly style="max-width:80%;margin-left:30px;margin-top:7px;"><br><button class="btn4 btn btn-info" data-clipboard-action="copy" data-clipboard-target="#t4" style="margin-left:30px;">点击复制</button>'
            });

            $(document).ready(function(){    
                var clipboard = new Clipboard('.btn4');   
                clipboard.on('success', function(e) {   
                    layer.msg('复制成功'); 
                });  
                clipboard.on('error', function(e) {   
                    layer.msg('复制失败！请手动复制'); 
                });  
            })      
         })
        }
        /**歌词下载 结束**/
    }
})
})
}
})
})


