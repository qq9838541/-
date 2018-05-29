var app = angular.module('yadaapp',['ng','ngRoute']);
app.config(function($routeProvider)
{
	$routeProvider
	//.when('/Application/View/admin/index',{controller:"indexController"})
	.when('/Application/View/admin/order',{controller:"orderController"})
	.when('/Application/View/admin/website',{controller:"websiteController"})
	.when('/Application/View/admin/payapi',{controller:"payapiController"})
	.when('/Application/View/admin/login',{controller:"loginController"})
	.when('/Application/View/admin/personal',{controller:"personalController"})
	.when('/website',{templateUrl:'Teampler/website.html',controller:"website"})
})

/** index start **/

//app.controller("indexController",function($scope,$http)
//{
//	$scope.items = [];
//	$scope.metch = [];
//	$scope.ordernum = [];
//
//    //数据源
//    $http.get('/Application/View/api.php?index_merch')
//    .success(function (data){
//
//            //数据绑定
//            $scope.data = data;
//            console.log($scope.data);
//            $scope.metch = $scope.data;
//        })
//
//    $http.get('/Application/Controller/index.php?OrderNum')
//
//    .success(function (data) {
//    	$scope.data = data;
//    	$scope.ordernum = $scope.data;
//    })
//})

/** index the end **/


/** order start **/

app.controller("orderController",function($scope,$http)
{
	$scope.items = [];
	$scope.tablelist = [];
	$scope.tablelist1 = [];
	$scope.total = [];
	$scope.time = [];
	//数据源
	$http.get('/Application/View/api.php?orderlist')
	.success(function (data){

			//数据绑定
			$scope.data = data;
			$scope.tablelist = $scope.data;
			
			
			//列表中的时间 未完成
			for(var i=1;i<data.length;i++)
			{
				var t = $scope.time += getDate($scope.data[i]['starttime']).toString();
				var d = t.split("}");
				// $scope.t = new Array[$scope.time];
				
				$scope.tablelist['time'] = d[0];
				i++;
				console.log($scope.tablelist['time']);
				
			}
			function getDate(tm){ 
				var tt=new Date(parseInt(tm) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, ",")
				return tt+"}"; 
			}

			$("#so").click(function () {
				var key = $("#oid").val();
				$http.post('/Application/View/api.php?orderserch&key='+key+'')
					.success(function(data){
						$scope.tablelist = data;
					})
			})
		})
})

/** order the end **/

/** order start **/
app.controller("websiteController",function($scope,$http)
{
	//$scope.website = [];
	//主体的input值

	$http.get('/Application/View/api.php?website')
		.success(function(data){
			$scope.data = data;
			$scope.website = $scope.data;

		})
	var wename = $('#webname').val();
	var wedo = $('#webdomain').val();
	var weem = $('#webemail').val();
	var weco = $('#webcopyright').val();
	var werpc = $('#webrpc').val();
	var wekey = $('#webkeyword').val();
	var wedes = $('#webdescription').val();
	var weqq = $('#webqq').val();

	$('#webname').bind('input propertychange', function() {
		$('#wname').val($(this).val());
	});
	$('#webdomain').bind('input propertychange', function() {
		$('#wdo').val($(this).val());
	});
	$('#webemail').bind('input propertychange', function() {
		$('#wem').val($(this).val());
	});
	$('#webcopyright').bind('input propertychange', function() {
		$('#wcop').val($(this).val());
	});
	$('#webrpc').bind('input propertychange', function() {
		$('#wrpc').val($(this).val());
	});
	$('#webkeyword').bind('input propertychange', function() {
		$('#wkey').val($(this).val());
	});
	$('#webdescription').bind('input propertychange', function() {
		$('#wdes').val($(this).val());
	});
	$('#webqq').bind('input propertychange', function() {
		$('#wqq').val($(this).val());
	});




	//一个垃圾大坑 不能识别出实时输入的值
	$("#xiugai").click(function(){
		//隐藏的input值
		var webname = $('#wname').val();
		var webdomain = $('#wdo').val();
		var webemail = $('#wem').val();
		var webcopyright = $('#wcop').val();
		var webrpc = $('#wrpc').val();
		var webkeyword = $('#wkey').val();
		var webdescription = $('#wdes').val();
		var webqq = $('#wqq').val();

		if(wename !== webname )
		{
			webname = $('#webname').val();
		}
		if(wedo !== webdomain)
		{
			webdomain = $('#webdomain').val();
		}
		if(weem !== webemail)
		{
			webemail = $('#webemail').val();
		}
		if(weco !== webcopyright)
		{
			webcopyright = $('#webcopyright').val();
		}
		if(werpc !== webrpc)
		{
			webrpc = $('#webrpc').val();
		}
		if(wekey !== webkeyword)
		{
			webkeyword = $('#webkeyword').val();
		}
		if(wedes !== webdescription)
		{
			webdescription = $('#webdescription').val();
		}
		if(weqq !== webqq)
		{
			webqq = $('#webqq').val();
		}

			$.ajax({
				url:'../../View/post.php',
				type:'post',
				datatype: 'json',
				data:{'websitesave':true,'webname':webname,'webdomain':webdomain,'webemail':webemail,'webcopyright':webcopyright,'webrpc':webrpc,'webkeyword':webkeyword,'webdescription':webdescription,'webqq':webqq},
				success:function(data){
					alert('修改成功')
				}
			})
	})
})
/** order the end **/

/** payapi start **/
app.controller("payapiController",function($scope,$http)
{
	$http.get('/Application/View/api.php?payapi')
		.success(function(data){
			console.log(data);
		})
		
	//主体的input值
	var api = $("#api").val();
	var apiid = $("#apiid").val();
	var apikey = $("#apikey").val();
	
	$('#api').bind('input propertychange', function() {
		$('#ap').val($(this).val());
	});
	$('#apiid').bind('input propertychange', function() {
		$('#apid').val($(this).val());
	});
	$('#apikey').bind('input propertychange', function() {
		$('#apkey').val($(this).val());
	});
	

	$("#tijiao").click(function(){
	//隐藏的input值
	var ap = $("#ap").val();
	var apid = $("#apid").val();
	var apkey = $("#apkey").val();
	
		if(ap !== api)
		{
			api = $('#api').val();
		}
		if(apid !== apiid)
		{
			apiid = $('#apiid').val();
		}
		if(apkey !== apikey)
		{
			apikey = $('#apikey').val();
		}
		
			$.ajax({
				url:'../../View/post.php',
				type:'post',
				datatype: 'json',
				data:{'payapisave':true,'api':api,'apiid':apiid,'apikey':apikey},
				success:function(data){
					alert('修改成功')
				}

			})
	})
})
/** payapi the end **/


/** login start **/
app.controller("loginController",function($scope,$http){
	var user = $("#user").val();
	var pass = $("#pass").val();
	$http.get('/Application/View/admin/login')
	.success(function(data){
		console.log(data);
		console.log(0);
	})
	$("#adminlogin").click(function(){
		
		$.ajax({
			url:'../../View/post',
			datatype: 'json',
			data: {'loginin':true,'user':user,'pass':pass},
			success:function(data)
			{
				console.log(data);
			}
		});		
	})

})
/** login the end**/

/** personal start **/
app.controller("personalController",function($scope,$http){
    //主体的input值
    var pass = $("#pass").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var account = $("#account").val();
    var address = $("#address").val();
	var name = $("#sess").text();
    $('#pass').bind('input propertychange', function() {
        $('#ps').val($(this).val());
    });
    $('#email').bind('input propertychange', function() {
        $('#em').val($(this).val());
    });
    $('#phone').bind('input propertychange', function() {
        $('#ph').val($(this).val());
    });
    $('#account').bind('input propertychange', function() {
        $('#ac').val($(this).val());
    });
    $('#address').bind('input propertychange', function() {
        $('#add').val($(this).val());
    });

    $("#qdxg").click(function(){
        //隐藏的input值
        var ps = $("#ps").val();
        var em = $("#em").val();
        var ph = $("#ph").val();
        var ac = $("#ac").val();
        var add = $("#add").val();

        if(ps !== pass)
        {
            pass = $('#pass').val();
        }
        if(em !== email)
        {
            email = $('#email').val();
        }
        if(ph !== phone)
        {
            phone = $('#phone').val();
        }
        if(ac !== account)
        {
            account = $('#account').val();
        }
        if(add !== address)
        {
            address = $('#address').val();
        }
        $.ajax({
            url:'../../View/post.php',
            type:'post',
            datatype: 'json',
            data:{'personalsave':true,'pass':pass,"address":address,'email':email,'account':account,'phone':phone,'name':name},
            success:function(data){
                alert('修改成功')
            }

        })
    })
})



/** personal the end **/

